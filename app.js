document.addEventListener('DOMContentLoaded', () => {
    // === App State ===
    let state = {
        models: [],
        routes: [],
        middlewares: [],
        controllers: [] // Custom controller actions
    };

    // Zoom and pan state
    let zoomLevel = 1.0;
    let panX = 0;
    let panY = 0;
    let isPanning = false;
    let startPanX = 0;
    let startPanY = 0;

    // Line drawing state (between models)
    let isDrawingLine = false;
    let lineStartModelId = null;
    let tempLine = null;

    // Dragging model node state
    let activeDragNode = null;
    let dragOffsetX = 0;
    let dragOffsetY = 0;

    // DOM Elements
    const canvasContainer = document.getElementById('canvas-container');
    const canvasSvg = document.getElementById('canvas-svg');
    const btnAddModel = document.getElementById('btn-add-model');
    const btnAddMiddleware = document.getElementById('btn-add-middleware');
    const middlewareList = document.getElementById('middleware-list');
    const routesTableBody = document.getElementById('routes-table-body');
    const btnAddRoute = document.getElementById('btn-add-route');
    const oalCodePreview = document.getElementById('oal-code-preview');
    const oalCodeContent = document.getElementById('oal-code-content');
    const oalCodeHighlight = document.getElementById('oal-code-highlight');
    const compilerConsoleLog = document.getElementById('compiler-console-log');
    const compilerStatusBadge = document.getElementById('compiler-status-badge');
    const btnSave = document.getElementById('btn-save');
    const btnCompile = document.getElementById('btn-compile');
    const btnLoadSample = document.getElementById('btn-load-sample');
    const btnCopyOal = document.getElementById('btn-copy-oal');
    const btnImport = document.getElementById('btn-import');
    const btnExport = document.getElementById('btn-export');
    const fileImport = document.getElementById('file-import');
    
    // Zoom Buttons
    const btnZoomIn = document.getElementById('btn-zoom-in');
    const btnZoomOut = document.getElementById('btn-zoom-out');
    const btnResetZoom = document.getElementById('btn-reset-zoom');

    // Modals
    const modalRel = document.getElementById('modal-relationship');
    const btnRelCancel = document.getElementById('btn-rel-cancel');
    const btnRelSave = document.getElementById('btn-rel-save');
    const modalRelClose = document.getElementById('modal-rel-close');
    
    const modalMw = document.getElementById('modal-middleware');
    const btnMwCancel = document.getElementById('btn-mw-cancel');
    const btnMwSave = document.getElementById('btn-mw-save');
    const modalMwClose = document.getElementById('modal-mw-close');
    const contextMenu = document.getElementById('context-menu');
    const contextMenuList = document.getElementById('context-menu-list');
    const mwCustomCode = document.getElementById('mw-custom-code');
    const mwCustomCodeContent = document.getElementById('mw-custom-code-content');
    const mwCustomCodeHighlight = document.getElementById('mw-custom-code-highlight');

    // Method Modal Elements
    const modalMethod = document.getElementById('modal-method');
    const btnMethodCancel = document.getElementById('btn-method-cancel');
    const btnMethodSave = document.getElementById('btn-method-save');
    const modalMethodClose = document.getElementById('modal-method-close');
    const methodNameInput = document.getElementById('method-name');
    const methodParamsInput = document.getElementById('method-params');
    const methodCodeBody = document.getElementById('method-code-body');
    const methodCodeContent = document.getElementById('method-code-content');
    const methodCodeHighlight = document.getElementById('method-code-highlight');

    // Initialize Lucide icons
    lucide.createIcons();

    // === OAL Syntax Highlighter Logic ===
    function escapeHTML(str) {
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    function highlightOAL(code) {
        const rules = [
            { type: 'comment', regex: /^\/\/.*|^\/\*[\s\S]*?\*\// },
            { type: 'string', regex: /^"[^"\\]*(?:\\.[^"\\]*)*"/ },
            { type: 'number', regex: /^\d+(?:\.\d+)?\b/ },
            { type: 'keyword', regex: /^(?:model|controller|middleware|route|function|return|if|elseif|else|for|while|break|continue|try|catch|throw|validate|require|new|in)\b/ },
            { type: 'type', regex: /^(?:string|text|integer|bigInteger|float|double|decimal|boolean|date|datetime|time|timestamp)\b/ },
            { type: 'modifier', regex: /^(?:primary|unique|nullable|default|hasOne|hasMany|belongsTo|belongsToMany)\b/ },
            { type: 'builtin', regex: /^(?:modelFindAll|modelFindOne|modelCreate|modelUpdate|modelDelete|modelCount|modelDataTable|setSession|getSession|removeSession|setCookie|getCookie|removeCookie|fetchGet|fetchPost|json|html|redirect|print|render|split)\b/ },
            { type: 'variable', regex: /^[a-zA-Z_][a-zA-Z0-9_]*\b/ },
            { type: 'operator', regex: /^(?:==|!=|<=|>=|=>|->|[+\-*\/%!=<>|&])+/ },
            { type: 'punctuation', regex: /^[{}[\]();,.:]/ },
            { type: 'whitespace', regex: /^\s+/ },
            { type: 'text', regex: /^./ }
        ];

        let input = code;
        let output = '';

        while (input.length > 0) {
            let matched = false;
            for (const rule of rules) {
                const match = input.match(rule.regex);
                if (match) {
                    let val = match[0];
                    let escaped = escapeHTML(val);
                    
                    if (rule.type === 'whitespace') {
                        output += escaped;
                    } else if (rule.type === 'text') {
                        output += escaped;
                    } else {
                        output += `<span class="token-${rule.type}">${escaped}</span>`;
                    }
                    
                    input = input.substring(val.length);
                    matched = true;
                    break;
                }
            }
            if (!matched) {
                output += escapeHTML(input.charAt(0));
                input = input.substring(1);
            }
        }
        return output;
    }

    function updateHighlight() {
        const code = oalCodePreview.value;
        oalCodeContent.innerHTML = highlightOAL(code);
    }

    // === Event Listeners ===
    
    // OAL Editor Event Listeners (Typing & Scroll Sync)
    oalCodePreview.addEventListener('input', () => {
        updateHighlight();
    });

    oalCodePreview.addEventListener('scroll', () => {
        oalCodeHighlight.scrollTop = oalCodePreview.scrollTop;
        oalCodeHighlight.scrollLeft = oalCodePreview.scrollLeft;
    });

    oalCodePreview.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = oalCodePreview.selectionStart;
            const end = oalCodePreview.selectionEnd;
            
            // Insert 4 spaces
            oalCodePreview.value = oalCodePreview.value.substring(0, start) + '    ' + oalCodePreview.value.substring(end);
            oalCodePreview.selectionStart = oalCodePreview.selectionEnd = start + 4;
            updateHighlight();
        }
    });

    // Method logic typing and scroll sync inside modal
    methodCodeBody.addEventListener('input', () => {
        methodCodeContent.innerHTML = highlightOAL(methodCodeBody.value);
    });
    methodCodeBody.addEventListener('scroll', () => {
        methodCodeHighlight.scrollTop = methodCodeBody.scrollTop;
        methodCodeHighlight.scrollLeft = methodCodeBody.scrollLeft;
    });
    methodCodeBody.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = methodCodeBody.selectionStart;
            const end = methodCodeBody.selectionEnd;
            methodCodeBody.value = methodCodeBody.value.substring(0, start) + '    ' + methodCodeBody.value.substring(end);
            methodCodeBody.selectionStart = methodCodeBody.selectionEnd = start + 4;
            methodCodeContent.innerHTML = highlightOAL(methodCodeBody.value);
        }
    });

    // Middleware custom code typing and scroll sync
    mwCustomCode.addEventListener('input', () => {
        mwCustomCodeContent.innerHTML = highlightOAL(mwCustomCode.value);
    });
    mwCustomCode.addEventListener('scroll', () => {
        mwCustomCodeHighlight.scrollTop = mwCustomCode.scrollTop;
        mwCustomCodeHighlight.scrollLeft = mwCustomCode.scrollLeft;
    });
    mwCustomCode.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = mwCustomCode.selectionStart;
            const end = mwCustomCode.selectionEnd;
            mwCustomCode.value = mwCustomCode.value.substring(0, start) + '    ' + mwCustomCode.value.substring(end);
            mwCustomCode.selectionStart = mwCustomCode.selectionEnd = start + 4;
            mwCustomCodeContent.innerHTML = highlightOAL(mwCustomCode.value);
        }
    });

    // Method modal save/cancel listeners
    btnMethodCancel.addEventListener('click', hideMethodModal);
    modalMethodClose.addEventListener('click', hideMethodModal);

    btnMethodSave.addEventListener('click', () => {
        const modelId = document.getElementById('method-model-id').value;
        const methodIndex = parseInt(document.getElementById('method-index').value);
        const nameInput = methodNameInput.value.trim().replace(/[^a-zA-Z0-9_]/g, '');
        
        if (!nameInput) return;
        let cleanName = nameInput;
        if (cleanName.endsWith('Action')) {
            cleanName = cleanName.slice(0, -6);
        }
        cleanName += 'Action';

        const model = state.models.find(m => m.id === modelId);
        if (model) {
            const method = model.methods[methodIndex];
            if (method) {
                method.name = cleanName;
                method.params = methodParamsInput.value.trim() || 'Request req';
                method.body = methodCodeBody.value;
            }
            renderMethods(model);
        }

        hideMethodModal();
        generateOAL();
        updateControllerDropdownsInRoutes();
    });

    function showMethodModal(modelId, methodIndex) {
        const model = state.models.find(m => m.id === modelId);
        if (!model) return;
        const method = model.methods[methodIndex];
        if (!method) return;

        document.getElementById('method-model-id').value = modelId;
        document.getElementById('method-index').value = methodIndex;
        
        // Strip 'Action' suffix for visual input
        let displayName = method.name;
        if (displayName.endsWith('Action')) {
            displayName = displayName.slice(0, -6);
        }
        methodNameInput.value = displayName;
        
        methodParamsInput.value = method.params || 'Request req';
        methodCodeBody.value = method.body || '';
        
        // update highlighter
        methodCodeContent.innerHTML = highlightOAL(methodCodeBody.value);

        modalMethod.classList.add('active');
    }

    function hideMethodModal() {
        modalMethod.classList.remove('active');
    }

    function renderMethods(model) {
        const area = document.getElementById(`methods-${model.id}`);
        if (!area) return;
        area.innerHTML = '';
        
        if (!model.methods) model.methods = [];

        model.methods.forEach((method, index) => {
            const row = document.createElement('div');
            row.className = 'method-row';
            
            const info = document.createElement('div');
            info.className = 'method-info';
            
            const nameSpan = document.createElement('span');
            nameSpan.className = 'method-fn-name';
            nameSpan.textContent = method.name;

            const paramsSpan = document.createElement('span');
            paramsSpan.className = 'method-fn-params';
            paramsSpan.textContent = `(${method.params || ''})`;

            info.appendChild(nameSpan);
            info.appendChild(paramsSpan);
            row.appendChild(info);

            // Click method row to open modal
            row.addEventListener('click', (e) => {
                if (e.target.closest('button')) return;
                showMethodModal(model.id, index);
            });

            // Delete Method button
            const btnDelMethod = document.createElement('button');
            btnDelMethod.innerHTML = `<i data-lucide="x" style="width: 10px; height: 10px;"></i>`;
            btnDelMethod.addEventListener('click', (e) => {
                e.stopPropagation();
                Swal.fire({
                    title: 'Remove Method?',
                    text: `Are you sure you want to remove method "${method.name}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        model.methods.splice(index, 1);
                        renderMethods(model);
                        generateOAL();
                        updateControllerDropdownsInRoutes();
                        Swal.fire({
                            title: 'Removed!',
                            text: 'Method has been removed.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            });
            row.appendChild(btnDelMethod);

            area.appendChild(row);
        });
        
        lucide.createIcons();
    }
    
    // Canvas Pan & Zoom
    canvasContainer.addEventListener('mousedown', (e) => {
        if (e.target === canvasContainer || e.target === canvasSvg) {
            isPanning = true;
            canvasContainer.style.cursor = 'grabbing';
            startPanX = e.clientX - panX;
            startPanY = e.clientY - panY;
        }
    });

    window.addEventListener('mousemove', (e) => {
        if (isPanning) {
            panX = e.clientX - startPanX;
            panY = e.clientY - startPanY;
            updateCanvasTransform();
        } else if (activeDragNode) {
            const rect = canvasContainer.getBoundingClientRect();
            const x = (e.clientX - rect.left - panX) / zoomLevel - dragOffsetX;
            const y = (e.clientY - rect.top - panY) / zoomLevel - dragOffsetY;
            activeDragNode.style.left = `${Math.max(0, x)}px`;
            activeDragNode.style.top = `${Math.max(0, y)}px`;
            
            // Update node coordinates in state
            const modelId = activeDragNode.dataset.id;
            const model = state.models.find(m => m.id === modelId);
            if (model) {
                model.x = Math.max(0, x);
                model.y = Math.max(0, y);
            }
            updateLines();
        } else if (isDrawingLine && tempLine) {
            const rect = canvasContainer.getBoundingClientRect();
            const mouseX = (e.clientX - rect.left - panX) / zoomLevel;
            const mouseY = (e.clientY - rect.top - panY) / zoomLevel;
            tempLine.setAttribute('x2', mouseX);
            tempLine.setAttribute('y2', mouseY);
        }
    });

    window.addEventListener('mouseup', () => {
        if (isPanning) {
            isPanning = false;
            canvasContainer.style.cursor = 'grab';
        }
        activeDragNode = null;
        if (isDrawingLine) {
            isDrawingLine = false;
            if (tempLine) {
                tempLine.remove();
                tempLine = null;
            }
        }
    });

    // Zoom Handlers
    btnZoomIn.addEventListener('click', () => {
        zoomLevel = Math.min(zoomLevel + 0.1, 2.0);
        updateCanvasTransform();
    });

    btnZoomOut.addEventListener('click', () => {
        zoomLevel = Math.max(zoomLevel - 0.1, 0.5);
        updateCanvasTransform();
    });

    btnResetZoom.addEventListener('click', () => {
        zoomLevel = 1.0;
        panX = 0;
        panY = 0;
        updateCanvasTransform();
    });

    function updateCanvasTransform() {
        canvasContainer.style.transform = `translate(${panX}px, ${panY}px) scale(${zoomLevel})`;
    }

    // Double click canvas to add model
    canvasContainer.addEventListener('dblclick', (e) => {
        if (e.target === canvasContainer || e.target === canvasSvg) {
            const rect = canvasContainer.getBoundingClientRect();
            const x = (e.clientX - rect.left - panX) / zoomLevel;
            const y = (e.clientY - rect.top - panY) / zoomLevel;
            addNewModel(x, y);
        }
    });

    // Add Model Button
    btnAddModel.addEventListener('click', () => {
        // Add to center of visible area
        const x = 150 + Math.random() * 100;
        const y = 150 + Math.random() * 100;
        addNewModel(x, y);
    });

    // Save & Compile Events
    btnSave.addEventListener('click', saveDiagram);
    btnCompile.addEventListener('click', compileDiagram);
    btnLoadSample.addEventListener('click', () => {
        Swal.fire({
            title: 'Load Library Sample?',
            text: 'This will overwrite your current canvas and reset the diagram.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4f46e5',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Yes, load it!'
        }).then((result) => {
            if (result.isConfirmed) {
                loadLibrarySample();
            }
        });
    });

    // Import & Export Events
    btnExport.addEventListener('click', exportOALFile);
    btnImport.addEventListener('click', () => fileImport.click());
    fileImport.addEventListener('change', importOALFile);
    
    // Copy OAL Code
    btnCopyOal.addEventListener('click', () => {
        oalCodePreview.select();
        document.execCommand('copy');
        
        Swal.fire({
            title: 'Copied!',
            text: 'OAL Code copied to clipboard.',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false
        });
    });

    // Tab Switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            
            btn.classList.add('active');
            const targetPane = document.getElementById(btn.dataset.tab);
            if (targetPane) targetPane.classList.add('active');
        });
    });

    // Hide context menu on left click anywhere
    document.addEventListener('click', hideContextMenu);
    
    // Prevent default context menu on right click on canvas/models
    document.addEventListener('contextmenu', (e) => {
        // If clicking the canvas background
        if (e.target === canvasContainer || e.target === canvasSvg || e.target.classList.contains('canvas-wrapper')) {
            e.preventDefault();
            e.stopPropagation();
            showContextMenu(e, [
                {
                    label: 'Add New Model',
                    icon: 'plus-circle',
                    action: () => {
                        const rect = canvasContainer.getBoundingClientRect();
                        const x = (e.clientX - rect.left - panX) / zoomLevel;
                        const y = (e.clientY - rect.top - panY) / zoomLevel;
                        addNewModel(x, y);
                    }
                },
                {
                    label: 'Reset Zoom (100%)',
                    icon: 'zoom-in',
                    action: () => {
                        zoomLevel = 1.0;
                        panX = 0;
                        panY = 0;
                        updateCanvasTransform();
                    }
                },
                {
                    label: 'Load Sample',
                    icon: 'book-open',
                    action: () => {
                        btnLoadSample.click();
                    }
                }
            ]);
        }
    });

    // === Model / Entity Logic ===
    
    function addNewModel(x, y) {
        Swal.fire({
            title: 'Create New Model',
            input: 'text',
            inputLabel: 'Model Name (e.g. Product, Category)',
            inputPlaceholder: 'Enter model name...',
            showCancelButton: true,
            confirmButtonColor: '#4f46e5',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Create Model',
            inputValidator: (value) => {
                if (!value) {
                    return 'Model name cannot be empty!';
                }
                const clean = value.trim().replace(/[^a-zA-Z0-9_]/g, '');
                if (!clean) {
                    return 'Invalid characters in model name!';
                }
                if (state.models.find(m => m.name.toLowerCase() === clean.toLowerCase())) {
                    return 'Model name already exists!';
                }
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                const cleanName = result.value.trim().replace(/[^a-zA-Z0-9_]/g, '');
                const newModel = {
                    id: 'm_' + Date.now(),
                    name: cleanName,
                    x: x || 100,
                    y: y || 100,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] }
                    ],
                    relations: [],
                    methods: [
                        {
                            name: `list${cleanName}sAction`,
                            params: 'Request req',
                            body: `var result = ${cleanName}.modelFindAll();\nreturn json(result);`
                        },
                        {
                            name: `create${cleanName}Action`,
                            params: 'Request req',
                            body: `var result = ${cleanName}.modelCreate([\n    // TODO: Map request parameters to model columns\n]);\nreturn json(["success" => true]);`
                        }
                    ]
                };

                state.models.push(newModel);
                addCrudRoutesForModel(cleanName);
                renderModelNode(newModel);
                updateLines();
                generateOAL();
                updateControllerDropdownsInRoutes();

                Swal.fire({
                    title: 'Created!',
                    text: `Model "${cleanName}" created successfully.`,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function renderModelNode(model) {
        const node = document.createElement('div');
        node.className = 'model-node';
        node.id = model.id;
        node.dataset.id = model.id;
        node.style.left = `${model.x}px`;
        node.style.top = `${model.y}px`;

        // Create Header
        const header = document.createElement('div');
        header.className = 'model-header';
        
        const title = document.createElement('h4');
        title.innerHTML = `<i data-lucide="table"></i> ${model.name}`;
        
        const actions = document.createElement('div');
        actions.className = 'node-actions';
        
        const btnDelete = document.createElement('button');
        btnDelete.innerHTML = `<i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>`;
        btnDelete.title = "Delete Model";
        btnDelete.addEventListener('click', (e) => {
            e.stopPropagation();
            Swal.fire({
                title: 'Delete Model?',
                text: `Are you sure you want to delete model "${model.name}"? This will remove all its attributes, relations, and default routes.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteModel(model.id);
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Model has been deleted.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });
        
        actions.appendChild(btnDelete);
        header.appendChild(title);
        header.appendChild(actions);
        node.appendChild(header);

        // Header drag listener
        header.addEventListener('mousedown', (e) => {
            if (e.target.closest('button')) return; // Avoid drag on delete button
            activeDragNode = node;
            const containerRect = canvasContainer.getBoundingClientRect();
            dragOffsetX = (e.clientX - containerRect.left - panX) / zoomLevel - model.x;
            dragOffsetY = (e.clientY - containerRect.top - panY) / zoomLevel - model.y;
            
            // Mark selected
            document.querySelectorAll('.model-node').forEach(n => n.classList.remove('selected'));
            node.classList.add('selected');
        });

        // Create Attributes Area
        const attributesArea = document.createElement('div');
        attributesArea.className = 'model-attributes';
        attributesArea.id = `attrs-${model.id}`;
        node.appendChild(attributesArea);

        // Add Attributes Button/Input
        const addAttrDiv = document.createElement('div');
        addAttrDiv.className = 'node-add-attr';
        
        const attrInput = document.createElement('input');
        attrInput.type = 'text';
        attrInput.placeholder = '+ attribute';
        
        const typeSelect = document.createElement('select');
        const types = ['string', 'text', 'integer', 'bigInteger', 'float', 'double', 'decimal', 'boolean', 'date', 'datetime', 'time', 'timestamp'];
        types.forEach(t => {
            const opt = document.createElement('option');
            opt.value = t;
            opt.textContent = t;
            typeSelect.appendChild(opt);
        });

        const btnAddAttr = document.createElement('button');
        btnAddAttr.innerHTML = `<i data-lucide="plus" style="width: 12px; height: 12px;"></i>`;
        btnAddAttr.addEventListener('click', () => {
            const attrName = attrInput.value.trim().replace(/[^a-zA-Z0-9_]/g, '');
            if (!attrName) return;
            
            // Add attribute
            model.attributes.push({
                name: attrName,
                type: typeSelect.value,
                modifiers: []
            });
            
            attrInput.value = '';
            renderAttributes(model);
            generateOAL();
        });

        addAttrDiv.appendChild(attrInput);
        addAttrDiv.appendChild(typeSelect);
        addAttrDiv.appendChild(btnAddAttr);
        node.appendChild(addAttrDiv);

        // Create Methods Compartment Divider
        const methodsDivider = document.createElement('div');
        methodsDivider.className = 'model-methods-divider';
        methodsDivider.innerHTML = `<i data-lucide="code"></i> Methods`;
        node.appendChild(methodsDivider);

        // Create Methods Area
        const methodsArea = document.createElement('div');
        methodsArea.className = 'model-methods';
        methodsArea.id = `methods-${model.id}`;
        node.appendChild(methodsArea);

        // Add Methods Button/Input
        const addMethodDiv = document.createElement('div');
        addMethodDiv.className = 'node-add-method';
        
        const methodInput = document.createElement('input');
        methodInput.type = 'text';
        methodInput.placeholder = '+ method';
        
        const btnAddMethod = document.createElement('button');
        btnAddMethod.innerHTML = `<i data-lucide="plus" style="width: 12px; height: 12px;"></i>`;
        btnAddMethod.addEventListener('click', () => {
            let methodName = methodInput.value.trim().replace(/[^a-zA-Z0-9_]/g, '');
            if (!methodName) return;
            
            // Strip 'Action' if typed, then append it automatically
            if (methodName.endsWith('Action')) {
                methodName = methodName.slice(0, -6);
            }
            methodName += 'Action';

            // check duplicate method name
            if (!model.methods) model.methods = [];
            if (model.methods.some(m => m.name === methodName)) {
                Swal.fire({
                    title: 'Duplicate Method',
                    text: `Method "${methodName}" already exists on model "${model.name}".`,
                    icon: 'error',
                    confirmButtonColor: '#4f46e5'
                });
                return;
            }

            // Add method
            model.methods.push({
                name: methodName,
                params: 'Request req',
                body: '// Write OAL logic here'
            });
            
            methodInput.value = '';
            renderMethods(model);
            generateOAL();
            updateControllerDropdownsInRoutes();
        });

        addMethodDiv.appendChild(methodInput);
        addMethodDiv.appendChild(btnAddMethod);
        node.appendChild(addMethodDiv);

        // Relation Anchor (Output)
        const anchor = document.createElement('div');
        anchor.className = 'node-anchor';
        anchor.title = "Drag to another model to link";
        anchor.addEventListener('mousedown', (e) => {
            e.stopPropagation();
            isDrawingLine = true;
            lineStartModelId = model.id;
            
            // Create temporary drawing line
            tempLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            tempLine.setAttribute('stroke', '#6366f1');
            tempLine.setAttribute('stroke-width', '2');
            tempLine.setAttribute('stroke-dasharray', '5,5');
            
            const startX = model.x + 250;
            const startY = model.y + (node.offsetHeight / 2 || 60);
            tempLine.setAttribute('x1', startX);
            tempLine.setAttribute('y1', startY);
            tempLine.setAttribute('x2', startX);
            tempLine.setAttribute('y2', startY);
            
            canvasSvg.appendChild(tempLine);
        });

        // Click on Anchor (alternative to drag & drop)
        anchor.addEventListener('click', (e) => {
            e.stopPropagation();
            
            // Get all other models
            const otherModels = state.models.filter(m => m.id !== model.id);
            if (otherModels.length === 0) {
                Swal.fire({
                    title: 'No Other Models',
                    text: 'Create another model first before adding a relationship.',
                    icon: 'info',
                    confirmButtonColor: '#4f46e5'
                });
                return;
            }

            const modelOptions = otherModels.map(m => `<option value="${m.id}">${m.name}</option>`).join('');
            
            Swal.fire({
                title: `Link from ${model.name}`,
                html: `
                    <div style="text-align: left; font-family: var(--font-sans); margin-top: 10px;">
                        <div style="margin-bottom: 12px;">
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px;">Target Model</label>
                            <select id="swal-rel-target" class="form-select" style="width: 100%; padding: 8px 12px; font-size: 13px; border: 1px solid var(--border); border-radius: var(--radius-sm); outline: none;">
                                ${modelOptions}
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px;">Relationship Type</label>
                            <select id="swal-rel-type" class="form-select" style="width: 100%; padding: 8px 12px; font-size: 13px; border: 1px solid var(--border); border-radius: var(--radius-sm); outline: none;">
                                <option value="hasMany">hasMany</option>
                                <option value="belongsTo">belongsTo</option>
                                <option value="hasOne">hasOne</option>
                                <option value="belongsToMany">belongsToMany</option>
                            </select>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Create Link',
                preConfirm: () => {
                    return {
                        targetId: document.getElementById('swal-rel-target').value,
                        relType: document.getElementById('swal-rel-type').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = result.value;
                    const targetModel = state.models.find(m => m.id === data.targetId);
                    if (targetModel) {
                        // 1. Add relationship to Source Model
                        const existsSource = model.relations.some(r => r.target === targetModel.name && r.type === data.relType);
                        if (!existsSource) {
                            model.relations.push({
                                type: data.relType,
                                target: targetModel.name
                            });
                        }

                        // 2. Add reciprocal relationship to Target Model
                        let reciprocalType = '';
                        if (data.relType === 'hasMany') {
                            reciprocalType = 'belongsTo';
                        } else if (data.relType === 'belongsTo') {
                            reciprocalType = 'hasMany';
                        } else if (data.relType === 'hasOne') {
                            reciprocalType = 'belongsTo';
                        } else if (data.relType === 'belongsToMany') {
                            reciprocalType = 'belongsToMany';
                        }

                        if (reciprocalType) {
                            const existsTarget = targetModel.relations.some(r => r.target === model.name && r.type === reciprocalType);
                            if (!existsTarget) {
                                targetModel.relations.push({
                                    type: reciprocalType,
                                    target: model.name
                                });
                            }
                        }

                        updateLines();
                        generateOAL();
                    }
                }
            });
        });

        // Mouseup on Model Node (to complete links)
        node.addEventListener('mouseup', (e) => {
            if (isDrawingLine && lineStartModelId && lineStartModelId !== model.id) {
                e.stopPropagation();
                // Trigger Relationship Modal
                showRelationshipModal(lineStartModelId, model.id);
            }
        });

        // Right-click context menu on Model Card
        node.addEventListener('contextmenu', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            showContextMenu(e, [
                {
                    label: 'Add Attribute',
                    icon: 'plus',
                    action: () => {
                        attrInput.focus();
                    }
                },
                {
                    label: 'Add Method',
                    icon: 'code-2',
                    action: () => {
                        methodInput.focus();
                    }
                },
                {
                    label: 'Delete Model',
                    icon: 'trash-2',
                    className: 'delete-item',
                    action: () => {
                        btnDelete.click();
                    }
                }
            ]);
        });

        canvasContainer.appendChild(node);
        lucide.createIcons({ attrs: { class: 'icon-custom' } });
        renderAttributes(model);
        renderMethods(model);
    }

    function renderAttributes(model) {
        const area = document.getElementById(`attrs-${model.id}`);
        area.innerHTML = '';
        
        model.attributes.forEach((attr, index) => {
            const row = document.createElement('div');
            row.className = 'attribute-row';
            
            const info = document.createElement('div');
            info.className = 'attribute-info';
            
            const typeSpan = document.createElement('span');
            typeSpan.className = 'attr-type';
            typeSpan.textContent = attr.type;
            
            const nameSpan = document.createElement('span');
            nameSpan.className = 'attr-name';
            nameSpan.textContent = attr.name;
            
            // Modifier badge / text
            let modText = '';
            if (attr.modifiers.length > 0) {
                modText = ` (${attr.modifiers.join(', ')})`;
            }
            const modSpan = document.createElement('span');
            modSpan.className = 'attr-mods';
            modSpan.textContent = modText;

            info.appendChild(typeSpan);
            info.appendChild(nameSpan);
            info.appendChild(modSpan);
            row.appendChild(info);

            // Double click attribute to edit modifiers
            row.addEventListener('dblclick', (e) => {
                e.stopPropagation();
                editAttributeModifiers(model, index);
            });

            // Delete Attribute (except primary id)
            if (attr.name !== 'id') {
                const btnDelAttr = document.createElement('button');
                btnDelAttr.innerHTML = `<i data-lucide="x" style="width: 10px; height: 10px;"></i>`;
                btnDelAttr.addEventListener('click', (e) => {
                    e.stopPropagation();
                    model.attributes.splice(index, 1);
                    renderAttributes(model);
                    generateOAL();
                });
                row.appendChild(btnDelAttr);
            }

            area.appendChild(row);
        });
        
        lucide.createIcons();
    }

    function editAttributeModifiers(model, index) {
        const attr = model.attributes[index];
        
        // Parse current modifiers
        const isPrimary = attr.modifiers.includes('primary');
        const isUnique = attr.modifiers.includes('unique');
        const isNullable = attr.modifiers.includes('nullable');
        const isIndex = attr.modifiers.includes('index');
        
        let defaultValue = '';
        const defaultMod = attr.modifiers.find(m => m.startsWith('default('));
        if (defaultMod) {
            const match = defaultMod.match(/default\(([^)]+)\)/);
            if (match) defaultValue = match[1];
        }

        Swal.fire({
            title: `Modifiers for "${attr.name}"`,
            html: `
                <div style="text-align: left; font-family: var(--font-sans); margin-top: 10px;">
                    <div style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="swal-mod-primary" ${isPrimary ? 'checked' : ''} style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="swal-mod-primary" style="margin: 0; font-size: 14px; font-weight: 500; cursor: pointer;">Primary Key</label>
                    </div>
                    <div style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="swal-mod-unique" ${isUnique ? 'checked' : ''} style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="swal-mod-unique" style="margin: 0; font-size: 14px; font-weight: 500; cursor: pointer;">Unique</label>
                    </div>
                    <div style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="swal-mod-nullable" ${isNullable ? 'checked' : ''} style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="swal-mod-nullable" style="margin: 0; font-size: 14px; font-weight: 500; cursor: pointer;">Nullable</label>
                    </div>
                    <div style="margin-bottom: 16px; display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="swal-mod-index" ${isIndex ? 'checked' : ''} style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="swal-mod-index" style="margin: 0; font-size: 14px; font-weight: 500; cursor: pointer;">Index</label>
                    </div>
                    <div style="margin-bottom: 6px;">
                        <label for="swal-mod-default" style="display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px;">Default Value (Optional)</label>
                        <input type="text" id="swal-mod-default" class="form-control" value="${defaultValue}" placeholder="e.g. true, 'active', 0.00" style="width: 100%; padding: 8px 12px; font-size: 13px; border: 1px solid var(--border); border-radius: var(--radius-sm); outline: none;">
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#4f46e5',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Save Modifiers',
            preConfirm: () => {
                return {
                    primary: document.getElementById('swal-mod-primary').checked,
                    unique: document.getElementById('swal-mod-unique').checked,
                    nullable: document.getElementById('swal-mod-nullable').checked,
                    index: document.getElementById('swal-mod-index').checked,
                    defaultValue: document.getElementById('swal-mod-default').value.trim()
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const data = result.value;
                const newMods = [];
                
                if (data.primary) newMods.push('primary');
                if (data.unique) newMods.push('unique');
                if (data.nullable) newMods.push('nullable');
                if (data.index) newMods.push('index');
                if (data.defaultValue) {
                    newMods.push(`default(${data.defaultValue})`);
                }
                
                attr.modifiers = newMods;
                renderAttributes(model);
                generateOAL();
            }
        });
    }

    function deleteModel(modelId) {
        const model = state.models.find(m => m.id === modelId);
        if (!model) return;
        
        // Remove relationships involving this model
        state.models.forEach(m => {
            m.relations = m.relations.filter(r => r.target !== model.name);
        });

        // Remove default routes
        state.routes = state.routes.filter(r => r.controller !== `${model.name}Controller`);

        // Remove node from DOM
        const element = document.getElementById(modelId);
        if (element) element.remove();

        // Remove from state
        state.models = state.models.filter(m => m.id !== modelId);
        
        updateLines();
        generateOAL();
        renderRoutesTable();
        updateControllerDropdownsInRoutes();
    }

    // === Relationships Logic ===
    
    let pendingRelSourceId = null;
    let pendingRelTargetId = null;

    function showRelationshipModal(sourceId, targetId) {
        pendingRelSourceId = sourceId;
        pendingRelTargetId = targetId;
        
        const sourceModel = state.models.find(m => m.id === sourceId);
        const targetModel = state.models.find(m => m.id === targetId);
        
        document.getElementById('rel-source').value = sourceModel.name;
        document.getElementById('rel-target').value = targetModel.name;
        
        modalRel.classList.add('active');
    }

    function hideRelationshipModal() {
        modalRel.classList.remove('active');
        pendingRelSourceId = null;
        pendingRelTargetId = null;
    }

    btnRelCancel.addEventListener('click', hideRelationshipModal);
    modalRelClose.addEventListener('click', hideRelationshipModal);
    
    btnRelSave.addEventListener('click', () => {
        const sourceModel = state.models.find(m => m.id === pendingRelSourceId);
        const targetModel = state.models.find(m => m.id === pendingRelTargetId);
        const relType = document.getElementById('rel-type').value;

        if (sourceModel && targetModel) {
            // 1. Add relationship to Source Model
            const existsSource = sourceModel.relations.some(r => r.target === targetModel.name && r.type === relType);
            if (!existsSource) {
                sourceModel.relations.push({
                    type: relType,
                    target: targetModel.name
                });
            }

            // 2. Add reciprocal relationship to Target Model
            let reciprocalType = '';
            if (relType === 'hasMany') {
                reciprocalType = 'belongsTo';
            } else if (relType === 'belongsTo') {
                reciprocalType = 'hasMany';
            } else if (relType === 'hasOne') {
                reciprocalType = 'belongsTo';
            } else if (relType === 'belongsToMany') {
                reciprocalType = 'belongsToMany';
            }

            if (reciprocalType) {
                const existsTarget = targetModel.relations.some(r => r.target === sourceModel.name && r.type === reciprocalType);
                if (!existsTarget) {
                    targetModel.relations.push({
                        type: reciprocalType,
                        target: sourceModel.name
                    });
                }
            }
        }

        hideRelationshipModal();
        updateLines();
        generateOAL();

        Swal.fire({
            title: 'Relationship Added!',
            text: `Connected ${sourceModel.name} and ${targetModel.name} successfully.`,
            icon: 'success',
            timer: 1800,
            showConfirmButton: false
        });
    });

    // Redraw SVG relationship lines
    function updateLines() {
        // Clear old paths and labels
        const oldElements = canvasSvg.querySelectorAll('.relationship-line, .relationship-label');
        oldElements.forEach(el => el.remove());

        const drawnPairs = new Set();

        // Redraw lines
        state.models.forEach(model => {
            const sourceEl = document.getElementById(model.id);
            if (!sourceEl) return;

            model.relations.forEach(rel => {
                const targetModel = state.models.find(m => m.name === rel.target);
                if (!targetModel) return;

                const targetEl = document.getElementById(targetModel.id);
                if (!targetEl) return;

                // Ensure we only draw one line per pair of models to avoid overlapping lines/labels
                const pairKey = [model.name, targetModel.name].sort().join('--');
                if (drawnPairs.has(pairKey)) {
                    return;
                }
                drawnPairs.add(pairKey);

                // Determine cardinality labels
                let sourceLabel = '';
                let targetLabel = '';
                
                // Direct relationship (model -> targetModel)
                const directRel = model.relations.find(r => r.target === targetModel.name);
                // Inverse relationship (targetModel -> model)
                const inverseRel = targetModel.relations.find(r => r.target === model.name);

                if (directRel) {
                    if (directRel.type === 'hasMany') {
                        sourceLabel = '1';
                        targetLabel = '*';
                    } else if (directRel.type === 'belongsTo') {
                        sourceLabel = '*';
                        targetLabel = '1';
                    } else if (directRel.type === 'hasOne') {
                        sourceLabel = '1';
                        targetLabel = '1';
                    } else if (directRel.type === 'belongsToMany') {
                        sourceLabel = '*';
                        targetLabel = '*';
                    }
                } else if (inverseRel) {
                    // Reverse the labels since targetModel is the source of inverseRel
                    if (inverseRel.type === 'hasMany') {
                        sourceLabel = '*';
                        targetLabel = '1';
                    } else if (inverseRel.type === 'belongsTo') {
                        sourceLabel = '1';
                        targetLabel = '*';
                    } else if (inverseRel.type === 'hasOne') {
                        sourceLabel = '1';
                        targetLabel = '1';
                    } else if (inverseRel.type === 'belongsToMany') {
                        sourceLabel = '*';
                        targetLabel = '*';
                    }
                }

                // Coordinates
                const x1 = model.x + 250; // output anchor right side
                const y1 = model.y + (sourceEl.offsetHeight / 2 || 60);

                const x2 = targetModel.x; // input anchor left side
                const y2 = targetModel.y + (targetEl.offsetHeight / 2 || 60);

                // Bezier curve
                const controlOffset = Math.abs(x2 - x1) / 2;
                const d = `M ${x1} ${y1} C ${x1 + controlOffset} ${y1}, ${x2 - controlOffset} ${y2}, ${x2} ${y2}`;

                const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                path.setAttribute('d', d);
                path.setAttribute('class', 'relationship-line');
                path.setAttribute('stroke', '#6366f1');
                path.setAttribute('stroke-width', '2');
                path.setAttribute('fill', 'none');
                
                // Right click to delete via Context Menu
                path.addEventListener('contextmenu', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    showContextMenu(e, [
                        {
                            label: 'Delete Relationship',
                            icon: 'trash-2',
                            className: 'delete-item',
                            action: () => {
                                Swal.fire({
                                    title: 'Delete Relationship?',
                                    text: `Are you sure you want to remove the relationship between ${model.name} and ${targetModel.name}?`,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#ef4444',
                                    cancelButtonColor: '#94a3b8',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Remove relationship from both models
                                        model.relations = model.relations.filter(r => r.target !== targetModel.name);
                                        targetModel.relations = targetModel.relations.filter(r => r.target !== model.name);
                                        
                                        updateLines();
                                        generateOAL();

                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'Relationship has been deleted.',
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    }
                                });
                            }
                        }
                    ]);
                });

                canvasSvg.appendChild(path);

                // Add source cardinality text label
                if (sourceLabel) {
                    const textX1 = x2 > x1 ? x1 + 15 : x1 - 25;
                    const textY1 = y1 - 8;
                    const labelElement1 = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                    labelElement1.setAttribute('x', textX1);
                    labelElement1.setAttribute('y', textY1);
                    labelElement1.setAttribute('class', 'relationship-label');
                    labelElement1.textContent = sourceLabel;
                    canvasSvg.appendChild(labelElement1);
                }

                // Add target cardinality text label
                if (targetLabel) {
                    const textX2 = x2 > x1 ? x2 - 25 : x2 + 15;
                    const textY2 = y2 - 8;
                    const labelElement2 = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                    labelElement2.setAttribute('x', textX2);
                    labelElement2.setAttribute('y', textY2);
                    labelElement2.setAttribute('class', 'relationship-label');
                    labelElement2.textContent = targetLabel;
                    canvasSvg.appendChild(labelElement2);
                }
            });
        });
    }

    // === Middlewares Logic ===
    let currentEditMwId = null;

    btnAddMiddleware.addEventListener('click', () => {
        currentEditMwId = null;
        document.getElementById('mw-modal-title').textContent = 'Create Middleware';
        document.getElementById('mw-id').value = '';
        document.getElementById('mw-name').value = '';
        document.getElementById('mw-template').value = 'token_check';
        
        toggleMiddlewareTemplatePanels('token_check');
        modalMw.classList.add('active');
    });

    function toggleMiddlewareTemplatePanels(template) {
        document.getElementById('mw-template-token').style.display = template === 'token_check' ? 'block' : 'none';
        document.getElementById('mw-template-session').style.display = template === 'session_check' ? 'block' : 'none';
        document.getElementById('mw-template-custom').style.display = template === 'custom' ? 'block' : 'none';
    }

    document.getElementById('mw-template').addEventListener('change', (e) => {
        toggleMiddlewareTemplatePanels(e.target.value);
    });

    function hideMiddlewareModal() {
        modalMw.classList.remove('active');
        currentEditMwId = null;
    }

    btnMwCancel.addEventListener('click', hideMiddlewareModal);
    modalMwClose.addEventListener('click', hideMiddlewareModal);

    btnMwSave.addEventListener('click', () => {
        const nameInput = document.getElementById('mw-name').value.trim();
        const cleanName = nameInput.replace(/[^a-zA-Z0-9_]/g, '');
        if (!cleanName) return;

        const template = document.getElementById('mw-template').value;
        const config = {
            tokenParam: document.getElementById('mw-token-param').value.trim(),
            tokenValue: document.getElementById('mw-token-value').value.trim(),
            sessionKey: document.getElementById('mw-session-key').value.trim(),
            customCode: document.getElementById('mw-custom-code').value
        };

        const mwId = document.getElementById('mw-id').value;
        if (mwId) {
            // Edit existing
            const mw = state.middlewares.find(m => m.id === mwId);
            if (mw) {
                mw.name = cleanName;
                mw.template = template;
                mw.config = config;
            }
        } else {
            // New
            state.middlewares.push({
                id: 'mw_' + Date.now(),
                name: cleanName,
                template,
                config
            });
        }

        hideMiddlewareModal();
        renderMiddlewares();
        generateOAL();
        updateMiddlewareCheckboxesInRoutes();
    });

    function renderMiddlewares() {
        middlewareList.innerHTML = '';
        state.middlewares.forEach(mw => {
            const item = document.createElement('div');
            item.className = 'sidebar-item';
            
            const info = document.createElement('span');
            info.innerHTML = `<strong>${mw.name}</strong> <small style="color:var(--text-muted)">(${mw.template})</small>`;
            
            const actions = document.createElement('div');
            actions.className = 'actions';
            
            const btnEdit = document.createElement('button');
            btnEdit.innerHTML = `<i data-lucide="edit-3" style="width: 14px; height: 14px;"></i>`;
            btnEdit.addEventListener('click', () => {
                editMiddleware(mw.id);
            });

            const btnDel = document.createElement('button');
            btnDel.innerHTML = `<i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>`;
            btnDel.addEventListener('click', () => {
                Swal.fire({
                    title: 'Delete Middleware?',
                    text: `Are you sure you want to delete middleware "${mw.name}"? This will remove it from all protected routes.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteMiddleware(mw.id);
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Middleware has been deleted.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            });

            actions.appendChild(btnEdit);
            actions.appendChild(btnDel);
            item.appendChild(info);
            item.appendChild(actions);
            middlewareList.appendChild(item);
        });

        lucide.createIcons();
    }

    function editMiddleware(id) {
        const mw = state.middlewares.find(m => m.id === id);
        if (!mw) return;

        document.getElementById('mw-modal-title').textContent = 'Configure Middleware';
        document.getElementById('mw-id').value = mw.id;
        document.getElementById('mw-name').value = mw.name;
        document.getElementById('mw-template').value = mw.template;
        
        const config = mw.config || {};
        document.getElementById('mw-token-param').value = config.tokenParam || 'token';
        document.getElementById('mw-token-value').value = config.tokenValue || '';
        mwCustomCode.value = config.customCode || '';
        document.getElementById('mw-session-key').value = config.sessionKey || 'user_id';

        // Update syntax highlighting for custom OAL code
        mwCustomCodeContent.innerHTML = highlightOAL(mwCustomCode.value);

        toggleMiddlewareTemplatePanels(mw.template);
        modalMw.classList.add('active');
    }

    function deleteMiddleware(id) {
        const mw = state.middlewares.find(m => m.id === id);
        if (!mw) return;

        // Remove from routes middleware usage list
        state.routes.forEach(r => {
            r.middlewares = r.middlewares.filter(m => m !== mw.name);
        });

        state.middlewares = state.middlewares.filter(m => m.id !== id);
        renderMiddlewares();
        renderRoutesTable();
        generateOAL();
    }

    // === Routing Logic ===
    
    function addCrudRoutesForModel(modelName) {
        const controllerName = `${modelName}Controller`;
        
        state.routes.push({
            id: 'r_list_' + Date.now() + Math.random(),
            method: 'get',
            path: `/${modelName.toLowerCase()}s`,
            controller: controllerName,
            action: `list${modelName}sAction`,
            middlewares: []
        });

        state.routes.push({
            id: 'r_create_' + Date.now() + Math.random(),
            method: 'post',
            path: `/${modelName.toLowerCase()}s`,
            controller: controllerName,
            action: `create${modelName}Action`,
            middlewares: []
        });
        
        renderRoutesTable();
    }

    btnAddRoute.addEventListener('click', () => {
        state.routes.push({
            id: 'r_' + Date.now() + Math.random(),
            method: 'get',
            path: '/new-route',
            controller: state.models.length > 0 ? `${state.models[0].name}Controller` : '',
            action: 'customAction',
            middlewares: []
        });
        renderRoutesTable();
        generateOAL();
    });

    function renderRoutesTable() {
        routesTableBody.innerHTML = '';
        
        if (state.routes.length === 0) {
            routesTableBody.innerHTML = `<tr><td colspan="5" style="text-align: center; color: var(--text-muted);">No routes defined yet. Add some models or click "Add Route".</td></tr>`;
            return;
        }

        state.routes.forEach((route, index) => {
            const tr = document.createElement('tr');
            
            // 1. HTTP Method select
            const tdMethod = document.createElement('td');
            const selectMethod = document.createElement('select');
            ['get', 'post', 'put', 'delete', 'patch'].forEach(m => {
                const opt = document.createElement('option');
                opt.value = m;
                opt.textContent = m.toUpperCase();
                if (route.method === m) opt.selected = true;
                selectMethod.appendChild(opt);
            });
            selectMethod.addEventListener('change', (e) => {
                route.method = e.target.value;
                generateOAL();
            });
            tdMethod.appendChild(selectMethod);

            // 2. URI Path input
            const tdPath = document.createElement('td');
            const inputPath = document.createElement('input');
            inputPath.type = 'text';
            inputPath.value = route.path;
            inputPath.addEventListener('change', (e) => {
                route.path = e.target.value;
                generateOAL();
            });
            tdPath.appendChild(inputPath);

            // 3. Target Controller@Action selector
            const tdTarget = document.createElement('td');
            const selectTarget = document.createElement('select');
            
            // Build list of options: Controller@Action
            populateControllerActionDropdown(selectTarget, route);
            
            selectTarget.addEventListener('change', (e) => {
                const parts = e.target.value.split('@');
                route.controller = parts[0] || '';
                route.action = parts[1] || '';
                generateOAL();
            });
            tdTarget.appendChild(selectTarget);

            // 4. Middlewares checklist dropdown
            const tdMw = document.createElement('td');
            const dropdown = document.createElement('div');
            dropdown.className = 'mw-checkbox-dropdown';
            dropdown.textContent = route.middlewares.length > 0 
                ? `${route.middlewares.length} active`
                : 'None';
            
            const dropdownMenu = document.createElement('div');
            dropdownMenu.className = 'mw-dropdown-menu';
            
            if (state.middlewares.length === 0) {
                dropdownMenu.innerHTML = '<div style="color:var(--text-muted); font-size:10px;">No middlewares created</div>';
            } else {
                state.middlewares.forEach(mw => {
                    const label = document.createElement('label');
                    label.className = 'mw-item';
                    
                    const chk = document.createElement('input');
                    chk.type = 'checkbox';
                    chk.value = mw.name;
                    if (route.middlewares.includes(mw.name)) chk.checked = true;
                    
                    chk.addEventListener('change', () => {
                        if (chk.checked) {
                            if (!route.middlewares.includes(mw.name)) route.middlewares.push(mw.name);
                        } else {
                            route.middlewares = route.middlewares.filter(m => m !== mw.name);
                        }
                        dropdown.textContent = route.middlewares.length > 0 
                            ? `${route.middlewares.length} active`
                            : 'None';
                        generateOAL();
                    });

                    label.appendChild(chk);
                    label.appendChild(document.createTextNode(` ${mw.name}`));
                    dropdownMenu.appendChild(label);
                });
            }
            
            dropdown.appendChild(dropdownMenu);
            tdMw.appendChild(dropdown);

            // 5. Delete button
            const tdAction = document.createElement('td');
            const btnDel = document.createElement('button');
            btnDel.className = 'btn-delete';
            btnDel.innerHTML = `<i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>`;
            btnDel.addEventListener('click', () => {
                state.routes.splice(index, 1);
                renderRoutesTable();
                generateOAL();
            });
            tdAction.appendChild(btnDel);

            tr.appendChild(tdMethod);
            tr.appendChild(tdPath);
            tr.appendChild(tdTarget);
            tr.appendChild(tdMw);
            tr.appendChild(tdAction);
            routesTableBody.appendChild(tr);
        });

        lucide.createIcons();
    }

    function populateControllerActionDropdown(select, currentRoute) {
        select.innerHTML = '';
        
        // Loop over each Model in state and suggest standard actions
        state.models.forEach(model => {
            const controller = `${model.name}Controller`;
            
            if (model.methods) {
                model.methods.forEach(method => {
                    const opt = document.createElement('option');
                    opt.value = `${controller}@${method.name}`;
                    opt.textContent = `${controller}@${method.name}`;
                    if (currentRoute.controller === controller && currentRoute.action === method.name) {
                        opt.selected = true;
                    }
                    select.appendChild(opt);
                });
            }
        });

        // Add an option for custom controller if no models/methods exist
        if (select.children.length === 0) {
            const opt = document.createElement('option');
            opt.value = 'CustomController@actionName';
            opt.textContent = 'CustomController@actionName';
            select.appendChild(opt);
        }
    }

    function updateControllerDropdownsInRoutes() {
        document.querySelectorAll('#routes-table-body select').forEach((select, idx) => {
            const route = state.routes[idx];
            if (route) {
                populateControllerActionDropdown(select, route);
            }
        });
    }

    function updateMiddlewareCheckboxesInRoutes() {
        renderRoutesTable();
    }

    // === OAL Code Generator ===
    function generateOAL() {
        let code = '';
        
        // 1. Models Section
        code += '// ================= Models =================\n';
        state.models.forEach(model => {
            code += `model ${model.name} {\n`;
            
            // Fields
            model.attributes.forEach(attr => {
                let line = `    ${attr.type} ${attr.name}`;
                if (attr.modifiers.length > 0) {
                    line += ' ' + attr.modifiers.join(' ');
                }
                line += ';\n';
                code += line;
            });
            
            if (model.attributes.length > 0 && model.relations.length > 0) {
                code += '\n';
            }

            // Relations
            model.relations.forEach(rel => {
                code += `    ${rel.type} ${rel.target};\n`;
            });

            code += `}\n\n`;
        });

        // 2. Controllers Section
        code += '// ================= Controllers =================\n';
        state.models.forEach(model => {
            const controllerName = `${model.name}Controller`;
            code += `controller ${controllerName} {\n`;

            if (model.methods && model.methods.length > 0) {
                model.methods.forEach((method, idx) => {
                    if (idx > 0) code += '\n';
                    code += `    function ${method.name}(${method.params || 'Request req'}) {\n`;
                    // Indent method body
                    const bodyLines = method.body.split('\n').map(line => '        ' + line).join('\n');
                    code += bodyLines + '\n';
                    code += `    }\n`;
                });
            }

            code += `}\n\n`;
        });

        // 3. Middleware Section
        if (state.middlewares.length > 0) {
            code += '// ================= Middleware =================\n';
            state.middlewares.forEach(mw => {
                code += `middleware ${mw.name} {\n`;
                code += `    function handleAction(Request req) {\n`;
                
                const config = mw.config || {};
                if (mw.template === 'token_check') {
                    const param = config.tokenParam || 'token';
                    const value = config.tokenValue || '123456';
                    code += `        if (req.${param} != "${value}") {\n`;
                    code += `            return json(["error" => "Token invalid"]);\n`;
                    code += `        }\n`;
                } else if (mw.template === 'session_check') {
                    const key = config.sessionKey || 'user_id';
                    code += `        var sessionVal = getSession("${key}");\n`;
                    code += `        if (sessionVal == null) {\n`;
                    code += `            return json(["error" => "Unauthorized session"]);\n`;
                    code += `        }\n`;
                } else if (mw.template === 'custom') {
                    const body = config.customCode || '// custom middleware logic';
                    const bodyLines = body.split('\n').map(line => '        ' + line).join('\n');
                    code += bodyLines + '\n';
                }

                code += `    }\n`;
                code += `}\n\n`;
            });
        }

        // 4. Routes Section
        if (state.routes.length > 0) {
            code += '// ================= Routes =================\n';
            state.routes.forEach(route => {
                let line = `route ${route.method} "${route.path}" -> ${route.controller}@${route.action}`;
                if (route.middlewares.length > 0) {
                    line += ` middleware ${route.middlewares.join(', ')}`;
                }
                line += ';\n';
                code += line;
            });
        }

        oalCodePreview.value = code;
        updateHighlight();
    }

    // === Import & Export Logic ===
    
    function exportOALFile() {
        const payload = {
            models: state.models,
            routes: state.routes,
            middlewares: state.middlewares,
            controllers: state.controllers
        };
        const jsonState = JSON.stringify(payload);
        const oalCode = oalCodePreview.value;
        
        // Embed state inside a block comment at the top of the OAL file
        const fileContent = `/* OAL_DIAGRAM_STATE:\n${jsonState}\n*/\n\n${oalCode}`;
        
        const blob = new Blob([fileContent], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        
        const defaultName = state.models.length > 0 ? `${state.models[0].name.toLowerCase()}_project.oal` : 'project.oal';
        a.download = defaultName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    function importOALFile(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(evt) {
            const content = evt.target.result;
            
            // Search for the OAL_DIAGRAM_STATE comment block
            const match = content.match(/\/\* OAL_DIAGRAM_STATE:\n([\s\S]*?)\n\*\//);
            if (match) {
                try {
                    const importedState = JSON.parse(match[1]);
                    
                    // Clear current canvas nodes from DOM
                    state.models.forEach(m => {
                        const el = document.getElementById(m.id);
                        if (el) el.remove();
                    });
                    
                    // Load state
                    state = importedState;
                    
                    // Render everything
                    state.models.forEach(m => renderModelNode(m));
                    renderMiddlewares();
                    renderRoutesTable();
                    setTimeout(() => {
                        updateLines();
                    }, 100);
                    generateOAL();
                    
                    Swal.fire({
                        title: 'Imported!',
                        text: 'OAL Project diagram and code imported successfully!',
                        icon: 'success',
                        confirmButtonColor: '#4f46e5'
                    });
                } catch (err) {
                    console.error("Failed to parse visual state", err);
                    Swal.fire({
                        title: 'Import Warning',
                        text: 'Failed to parse visual diagram state. Loaded code in raw text editor.',
                        icon: 'warning',
                        confirmButtonColor: '#4f46e5'
                    });
                    oalCodePreview.value = content;
                    updateHighlight();
                }
            } else {
                // No diagram state (raw OAL file)
                Swal.fire({
                    title: 'Raw OAL File',
                    text: 'Raw OAL file imported. Visual diagram cannot be generated for raw files, but you can edit and compile the code directly.',
                    icon: 'info',
                    confirmButtonColor: '#4f46e5'
                });
                oalCodePreview.value = content;
                updateHighlight();
            }
        };
        reader.readAsText(file);
        
        // Reset file input value
        e.target.value = '';
    }

    // === API Backend Integration ===
    
    function saveDiagram() {
        const payload = {
            models: state.models,
            routes: state.routes,
            middlewares: state.middlewares,
            controllers: state.controllers,
            oal_code: oalCodePreview.value
        };

        fetch('api.php?action=save', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Saved!',
                    text: 'Diagram state and OAL file saved successfully!',
                    icon: 'success',
                    confirmButtonColor: '#4f46e5'
                });
            } else {
                Swal.fire({
                    title: 'Save Failed',
                    text: 'Failed to save diagram: ' + data.error,
                    icon: 'error',
                    confirmButtonColor: '#4f46e5'
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                title: 'Connection Error',
                text: 'Error connecting to backend API.',
                icon: 'error',
                confirmButtonColor: '#4f46e5'
            });
        });
    }

    function compileDiagram() {
        compilerStatusBadge.textContent = 'Running';
        compilerStatusBadge.className = 'badge badge-running';
        compilerConsoleLog.textContent = 'Compiling to Laravel... Running generate.php compiler script...\n';
        
        // Auto scroll to log panel
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
        document.querySelector('[data-tab="tab-compiler"]').classList.add('active');
        document.getElementById('tab-compiler').classList.add('active');

        const payload = {
            models: state.models,
            routes: state.routes,
            middlewares: state.middlewares,
            controllers: state.controllers,
            oal_code: oalCodePreview.value
        };

        fetch('api.php?action=compile', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                compilerStatusBadge.textContent = 'Success';
                compilerStatusBadge.className = 'badge badge-success';
                compilerConsoleLog.textContent = data.output;

                // Auto download zip file if available
                if (data.zip_url) {
                    const link = document.createElement('a');
                    link.href = data.zip_url + '?t=' + Date.now(); // Cache busting
                    link.download = 'project_laravel.zip';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    Swal.fire({
                        title: 'Compilation Success!',
                        text: 'Your Laravel project has been compiled, PANDUAN.md created, and the ZIP package downloaded successfully.',
                        icon: 'success',
                        confirmButtonColor: '#4f46e5'
                    });
                } else {
                    Swal.fire({
                        title: 'Compilation Success!',
                        text: 'Your Laravel project files have been compiled successfully.',
                        icon: 'success',
                        confirmButtonColor: '#4f46e5'
                    });
                }
            } else {
                compilerStatusBadge.textContent = 'Failed';
                compilerStatusBadge.className = 'badge badge-error';
                compilerConsoleLog.textContent = data.output || 'Unknown compilation error.';

                Swal.fire({
                    title: 'Compilation Failed',
                    text: 'There was an error compiling your diagram to Laravel.',
                    icon: 'error',
                    confirmButtonColor: '#4f46e5'
                });
            }
        })
        .catch(err => {
            compilerStatusBadge.textContent = 'Error';
            compilerStatusBadge.className = 'badge badge-error';
            compilerConsoleLog.textContent = 'Error executing compiler: ' + err.toString();
        });
    }

    // === Sample Loader (Library.oal Sample) ===
    
    function loadLibrarySample() {
        // Clear existing nodes from DOM
        state.models.forEach(m => {
            const el = document.getElementById(m.id);
            if (el) el.remove();
        });

        // Set state to match library.oal
        state = {
            models: [
                {
                    id: 'm_category',
                    name: 'Category',
                    x: 80,
                    y: 80,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'name', type: 'string', modifiers: ['unique'] },
                        { name: 'description', type: 'string', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'hasMany', target: 'Book' }
                    ],
                    methods: [
                        {
                            name: 'listCategoriesAction',
                            params: 'Request req',
                            body: 'var cats = Category.modelFindAll();\nreturn json(cats);'
                        }
                    ]
                },
                {
                    id: 'm_publisher',
                    name: 'Publisher',
                    x: 80,
                    y: 420,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'name', type: 'string', modifiers: ['unique'] },
                        { name: 'address', type: 'string', modifiers: ['nullable'] },
                        { name: 'phone', type: 'string', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'hasMany', target: 'Book' }
                    ],
                    methods: []
                },
                {
                    id: 'm_author',
                    name: 'Author',
                    x: 80,
                    y: 780,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'name', type: 'string', modifiers: [] },
                        { name: 'biography', type: 'text', modifiers: ['nullable'] },
                        { name: 'birthDate', type: 'date', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'belongsToMany', target: 'Book' }
                    ],
                    methods: []
                },
                {
                    id: 'm_book',
                    name: 'Book',
                    x: 480,
                    y: 280,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'title', type: 'string', modifiers: [] },
                        { name: 'isbn', type: 'string', modifiers: ['unique'] },
                        { name: 'year', type: 'integer', modifiers: [] },
                        { name: 'Category_id', type: 'integer', modifiers: [] },
                        { name: 'Publisher_id', type: 'integer', modifiers: [] },
                        { name: 'available', type: 'boolean', modifiers: ['default(true)'] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'Category' },
                        { type: 'belongsTo', target: 'Publisher' },
                        { type: 'belongsToMany', target: 'Author' },
                        { type: 'hasMany', target: 'BorrowRecord' },
                        { type: 'hasMany', target: 'Reservation' }
                    ],
                    methods: [
                        {
                            name: 'indexAction',
                            params: 'Request req',
                            body: 'return json(["success" => true]);'
                        },
                        {
                            name: 'listBooksAction',
                            params: 'Request req',
                            body: 'var books = Book.modelFindAll();\nreturn json(books);'
                        },
                        {
                            name: 'createBookAction',
                            params: 'Request req',
                            body: 'var book = Book.modelCreate([\n    "title" => req.title,\n    "isbn" => req.isbn,\n    "year" => req.year,\n    "Category_id" => req.categoryId,\n    "Publisher_id" => req.publisherId,\n    "available" => true\n]);\nreturn json(["success" => true]);'
                        },
                        {
                            name: 'borrowBookAction',
                            params: 'Request req',
                            body: 'var book = Book.modelFindOne(["id" => req.bookId]);\nif (book.available) {\n    var due = req.dueDate;\n    var record = BorrowRecord.modelCreate([\n        "Book_id" => book.id,\n        "Member_id" => req.memberId,\n        "borrowedAt" => req.borrowedAt,\n        "dueDate" => due\n    ]);\n    Book.modelUpdate(["id" => book.id], ["available" => false]);\n    return json(["success" => true, "borrowId" => record.id]);\n} else {\n    return json(["error" => "Book is currently unavailable"]);\n}'
                        },
                        {
                            name: 'returnBookAction',
                            params: 'Request req',
                            body: 'var record = BorrowRecord.modelFindOne(["Book_id" => req.bookId, "returnedAt" => null]);\nif (record) {\n    var returnedTime = req.returnedAt;\n    BorrowRecord.modelUpdate(["id" => record.id], ["returnedAt" => returnedTime]);\n    Book.modelUpdate(["id" => req.bookId], ["available" => true]);\n\n    if (returnedTime > record.dueDate) {\n        var denda = Fine.modelCreate([\n            "BorrowRecord_id" => record.id,\n            "Member_id" => record.Member_id,\n            "amount" => 50000.00,\n            "isPaid" => false\n        ]);\n        return json(["success" => true, "status" => "returned_with_fine", "fineAmount" => 50000.00]);\n    }\n    return json(["success" => true, "status" => "returned_on_time"]);\n} else {\n    return json(["error" => "No active borrow record found"]);\n}'
                        }
                    ]
                },
                {
                    id: 'm_authorbook',
                    name: 'AuthorBook',
                    x: 480,
                    y: 840,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'Book_id', type: 'integer', modifiers: [] },
                        { name: 'Author_id', type: 'integer', modifiers: [] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'Book' },
                        { type: 'belongsTo', target: 'Author' }
                    ],
                    methods: []
                },
                {
                    id: 'm_member',
                    name: 'Member',
                    x: 880,
                    y: 80,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'name', type: 'string', modifiers: [] },
                        { name: 'email', type: 'string', modifiers: ['unique'] },
                        { name: 'phone', type: 'string', modifiers: ['nullable'] },
                        { name: 'membershipDate', type: 'date', modifiers: [] },
                        { name: 'status', type: 'string', modifiers: ['default("active")'] }
                    ],
                    relations: [
                        { type: 'hasMany', target: 'BorrowRecord' },
                        { type: 'hasMany', target: 'Reservation' },
                        { type: 'hasMany', target: 'Fine' }
                    ],
                    methods: [
                        {
                            name: 'registerMemberAction',
                            params: 'Request req',
                            body: 'var m = Member.modelCreate([\n    "name" => req.name,\n    "email" => req.email,\n    "phone" => req.phone,\n    "membershipDate" => req.membershipDate,\n    "status" => "active"\n]);\nreturn json(["success" => true, "memberId" => m.id]);'
                        }
                    ]
                },
                {
                    id: 'm_borrowrecord',
                    name: 'BorrowRecord',
                    x: 880,
                    y: 460,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'Book_id', type: 'integer', modifiers: [] },
                        { name: 'Member_id', type: 'integer', modifiers: [] },
                        { name: 'borrowedAt', type: 'datetime', modifiers: [] },
                        { name: 'dueDate', type: 'datetime', modifiers: [] },
                        { name: 'returnedAt', type: 'datetime', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'Book' },
                        { type: 'belongsTo', target: 'Member' },
                        { type: 'hasOne', target: 'Fine' }
                    ],
                    methods: []
                },
                {
                    id: 'm_reservation',
                    name: 'Reservation',
                    x: 1280,
                    y: 200,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'Book_id', type: 'integer', modifiers: [] },
                        { name: 'Member_id', type: 'integer', modifiers: [] },
                        { name: 'reservedAt', type: 'datetime', modifiers: [] },
                        { name: 'status', type: 'string', modifiers: ['default("pending")'] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'Book' },
                        { type: 'belongsTo', target: 'Member' }
                    ],
                    methods: [
                        {
                            name: 'reserveBookAction',
                            params: 'Request req',
                            body: 'var book = Book.modelFindOne(["id" => req.bookId]);\nif (book) {\n    var res = Reservation.modelCreate([\n        "Book_id" => book.id,\n        "Member_id" => req.memberId,\n        "reservedAt" => req.reservedAt,\n        "status" => "pending"\n    ]);\n    return json(["success" => true, "reservationId" => res.id]);\n}\nreturn json(["error" => "Book not found"]);'
                        }
                    ]
                },
                {
                    id: 'm_fine',
                    name: 'Fine',
                    x: 1280,
                    y: 600,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'BorrowRecord_id', type: 'integer', modifiers: [] },
                        { name: 'Member_id', type: 'integer', modifiers: [] },
                        { name: 'amount', type: 'decimal', modifiers: [] },
                        { name: 'isPaid', type: 'boolean', modifiers: ['default(false)'] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'BorrowRecord' },
                        { type: 'belongsTo', target: 'Member' }
                    ],
                    methods: [
                        {
                            name: 'payFineAction',
                            params: 'Request req',
                            body: 'var fine = Fine.modelFindOne(["id" => req.fineId]);\nif (fine) {\n    Fine.modelUpdate(["id" => fine.id], ["isPaid" => true]);\n    return json(["success" => true]);\n}\nreturn json(["error" => "Fine record not found"]);'
                        }
                    ]
                }
            ],
            middlewares: [
                {
                    id: 'mw_auth',
                    name: 'AuthMiddleware',
                    template: 'custom',
                    config: {
                        customCode: 'if (req.token != "123456") {\n    return json(["error" => "Token invalid"]);\n}'
                    }
                }
            ],
            controllers: [],
            routes: [
                {
                    id: 'r_0',
                    method: 'get',
                    path: '/',
                    controller: 'BookController',
                    action: 'indexAction',
                    middlewares: []
                },
                {
                    id: 'r_1',
                    method: 'get',
                    path: '/books',
                    controller: 'BookController',
                    action: 'listBooksAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_2',
                    method: 'post',
                    path: '/books',
                    controller: 'BookController',
                    action: 'createBookAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_3',
                    method: 'post',
                    path: '/books/borrow',
                    controller: 'BookController',
                    action: 'borrowBookAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_4',
                    method: 'post',
                    path: '/books/return',
                    controller: 'BookController',
                    action: 'returnBookAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_5',
                    method: 'post',
                    path: '/members',
                    controller: 'MemberController',
                    action: 'registerMemberAction',
                    middlewares: []
                },
                {
                    id: 'r_6',
                    method: 'post',
                    path: '/reservations',
                    controller: 'ReservationController',
                    action: 'reserveBookAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_7',
                    method: 'post',
                    path: '/fines/pay',
                    controller: 'FineController',
                    action: 'payFineAction',
                    middlewares: ['AuthMiddleware']
                },
                {
                    id: 'r_8',
                    method: 'get',
                    path: '/categories',
                    controller: 'CategoryController',
                    action: 'listCategoriesAction',
                    middlewares: []
                }
            ]
        };

        // Render everything
        state.models.forEach(m => renderModelNode(m));
        renderMiddlewares();
        renderRoutesTable();
        updateLines();
        generateOAL();
        
        // Reset zoom
        zoomLevel = 1.0;
        panX = 0;
        panY = 0;
        updateCanvasTransform();
    }



    // === Startup Initialization ===
    
    // Attempt to load previously saved diagram
    fetch('api.php?action=load')
        .then(res => res.json())
        .then(data => {
            if (data.models && data.models.length > 0) {
                state = data;
                state.models.forEach(m => renderModelNode(m));
                renderMiddlewares();
                renderRoutesTable();
                setTimeout(() => {
                    updateLines();
                }, 100);
                generateOAL();
            } else {
                // If empty, keep it empty
                generateOAL();
            }
        })
        .catch(err => {
            console.warn('Failed to load saved state.', err);
            generateOAL();
        });

    // === Context Menu Helper Functions ===
    function showContextMenu(e, items) {
        e.preventDefault();
        e.stopPropagation();

        contextMenuList.innerHTML = '';
        items.forEach(item => {
            const li = document.createElement('li');
            if (item.className) li.className = item.className;
            li.innerHTML = `${item.icon ? `<i data-lucide="${item.icon}"></i>` : ''} <span>${item.label}</span>`;
            li.addEventListener('click', (ev) => {
                ev.stopPropagation();
                hideContextMenu();
                item.action();
            });
            contextMenuList.appendChild(li);
        });

        // Initialize lucide icons in the menu
        lucide.createIcons();

        // Position the menu at mouse coordinates
        contextMenu.style.left = `${e.pageX}px`;
        contextMenu.style.top = `${e.pageY}px`;
        contextMenu.style.display = 'block';

        // Boundary safety check (keep menu on-screen)
        const rect = contextMenu.getBoundingClientRect();
        if (rect.right > window.innerWidth) {
            contextMenu.style.left = `${e.pageX - rect.width}px`;
        }
        if (rect.bottom > window.innerHeight) {
            contextMenu.style.top = `${e.pageY - rect.height}px`;
        }
    }

    function hideContextMenu() {
        contextMenu.style.display = 'none';
    }
});
