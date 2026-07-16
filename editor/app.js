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
                if (confirm(`Remove method ${method.name}?`)) {
                    model.methods.splice(index, 1);
                    renderMethods(model);
                    generateOAL();
                    updateControllerDropdownsInRoutes();
                }
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
            const x = (e.clientX - dragOffsetX - panX) / zoomLevel;
            const y = (e.clientY - dragOffsetY - panY) / zoomLevel;
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
    btnLoadSample.addEventListener('click', loadLibrarySample);

    // Import & Export Events
    btnExport.addEventListener('click', exportOALFile);
    btnImport.addEventListener('click', () => fileImport.click());
    fileImport.addEventListener('change', importOALFile);
    
    // Copy OAL Code
    btnCopyOal.addEventListener('click', () => {
        oalCodePreview.select();
        document.execCommand('copy');
        alert('OAL Code copied to clipboard!');
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

    // === Model / Entity Logic ===
    
    function addNewModel(x, y) {
        const name = prompt("Enter model name (e.g. Product, Category):");
        if (!name) return;
        
        // Check for duplicate name
        const cleanName = name.trim().replace(/[^a-zA-Z0-9_]/g, '');
        if (!cleanName) return;
        if (state.models.find(m => m.name.toLowerCase() === cleanName.toLowerCase())) {
            alert("Model name already exists!");
            return;
        }

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
        
        // Auto create standard routes for this model
        addCrudRoutesForModel(cleanName);
        
        renderModelNode(newModel);
        updateLines();
        generateOAL();
        updateControllerDropdownsInRoutes();
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
            if (confirm(`Delete model ${model.name}? This will remove its relations and default routes.`)) {
                deleteModel(model.id);
            }
        });
        
        actions.appendChild(btnDelete);
        header.appendChild(title);
        header.appendChild(actions);
        node.appendChild(header);

        // Header drag listener
        header.addEventListener('mousedown', (e) => {
            if (e.target.closest('button')) return; // Avoid drag on delete button
            activeDragNode = node;
            const rect = node.getBoundingClientRect();
            dragOffsetX = e.clientX - rect.left;
            dragOffsetY = e.clientY - rect.top;
            
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
                alert("Method already exists!");
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

        // Mouseup on Model Node (to complete links)
        node.addEventListener('mouseup', (e) => {
            if (isDrawingLine && lineStartModelId && lineStartModelId !== model.id) {
                e.stopPropagation();
                // Trigger Relationship Modal
                showRelationshipModal(lineStartModelId, model.id);
            }
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
        const modifiers = ['primary', 'unique', 'nullable'];
        const input = prompt(
            `Edit Modifiers for attribute "${attr.name}".\nEnter comma-separated options (${modifiers.join(', ')}):\nLeave empty for none.`,
            attr.modifiers.join(', ')
        );
        
        if (input !== null) {
            const rawMods = input.split(',').map(m => m.trim().toLowerCase());
            attr.modifiers = rawMods.filter(m => modifiers.includes(m));
            
            // check for default(value) format
            const defaultMatch = input.match(/default\(([^)]+)\)/);
            if (defaultMatch) {
                attr.modifiers.push(`default(${defaultMatch[1].trim()})`);
            }
            
            renderAttributes(model);
            generateOAL();
        }
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
            // Check if relation already exists
            const exists = sourceModel.relations.some(r => r.target === targetModel.name && r.type === relType);
            if (!exists) {
                sourceModel.relations.push({
                    type: relType,
                    target: targetModel.name
                });
                
                // Add reciprocal relation if fits
                if (relType === 'belongsTo') {
                    // Check if hasMany/hasOne target reciprocal exists, if not maybe suggest or automatically create it?
                    // Let's just create relationships declared explicitly.
                }
            }
        }

        hideRelationshipModal();
        updateLines();
        generateOAL();
    });

    // Redraw SVG relationship lines
    function updateLines() {
        // Clear old paths
        const oldPaths = canvasSvg.querySelectorAll('.relationship-line');
        oldPaths.forEach(p => p.remove());

        // Redraw lines
        state.models.forEach(model => {
            const sourceEl = document.getElementById(model.id);
            if (!sourceEl) return;

            model.relations.forEach(rel => {
                const targetModel = state.models.find(m => m.name === rel.target);
                if (!targetModel) return;

                const targetEl = document.getElementById(targetModel.id);
                if (!targetEl) return;

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
                
                // Add marker arrow or hover behavior if needed
                path.addEventListener('dblclick', () => {
                    if (confirm(`Remove relationship: ${model.name} ${rel.type} ${rel.target}?`)) {
                        model.relations = model.relations.filter(r => !(r.target === rel.target && r.type === rel.type));
                        updateLines();
                        generateOAL();
                    }
                });

                canvasSvg.appendChild(path);
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
                if (confirm(`Delete middleware ${mw.name}?`)) {
                    deleteMiddleware(mw.id);
                }
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
                    
                    alert("OAL Project diagram and code imported successfully!");
                } catch (err) {
                    console.error("Failed to parse visual state", err);
                    alert("Failed to parse visual diagram state. Loaded code in raw text editor.");
                    oalCodePreview.value = content;
                    updateHighlight();
                }
            } else {
                // No diagram state (raw OAL file)
                alert("Raw OAL file imported. Visual diagram cannot be generated for raw files, but you can edit and compile the code directly.");
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
                alert('Diagram state and OAL file saved successfully!');
            } else {
                alert('Failed to save diagram: ' + data.error);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error connecting to backend API.');
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
            } else {
                compilerStatusBadge.textContent = 'Failed';
                compilerStatusBadge.className = 'badge badge-error';
                compilerConsoleLog.textContent = data.output || 'Unknown compilation error.';
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
        if (!confirm("Load the Library sample? This will overwrite your current canvas.")) return;

        // Clear existing nodes from DOM
        state.models.forEach(m => {
            const el = document.getElementById(m.id);
            if (el) el.remove();
        });

        // Set state to match library.oal
        state = {
            models: [
                {
                    id: 'm_book',
                    name: 'Book',
                    x: 100,
                    y: 80,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'title', type: 'string', modifiers: [] },
                        { name: 'author', type: 'string', modifiers: [] },
                        { name: 'year', type: 'integer', modifiers: [] },
                        { name: 'isbn', type: 'string', modifiers: ['unique'] },
                        { name: 'available', type: 'boolean', modifiers: ['default(true)'] }
                    ],
                    relations: [
                        { type: 'hasMany', target: 'BorrowRecord' }
                    ],
                    methods: [
                        {
                            name: 'listBooksAction',
                            params: 'Request req',
                            body: 'var books = Book.modelFindAll();\nreturn json(books);'
                        },
                        {
                            name: 'createBookAction',
                            params: 'Request req',
                            body: 'var book = Book.modelCreate([\n    "title" => req.title,\n    "author" => req.author,\n    "year" => req.year,\n    "isbn" => req.isbn,\n    "available" => true\n]);\nreturn json(["success" => true]);'
                        },
                        {
                            name: 'borrowBookAction',
                            params: 'Request req',
                            body: 'var book = Book.modelFindOne(["isbn" => req.isbn]);\nif (book.available) {\n    var pinjam = BorrowRecord.modelCreate([\n        "Book_id" => book.id,\n        "Member_id" => req.memberId,\n        "borrowedAt" => req.borrowedAt\n    ]);\n    var updatePinjam = Book.modelUpdate(["id" => book.id], ["available" => false]);\n    return json(["success" => true]);\n} else {\n    return json(["error" => "Book not available"]);\n}'
                        },
                        {
                            name: 'returnBookAction',
                            params: 'Request req',
                            body: 'var record = BorrowRecord.modelFindOne([\n    "Book_id" => req.bookId,\n    "Member_id" => [">",req.memberId],\n    "returnedAt" => null\n]);\nif (record) {\n    var update = BorrowRecord.modelUpdate(["id" => record.id], ["returnedAt" => req.returnedAt]);\n    Book.modelUpdate(["id" => req.bookId], ["available" => true]);\n    return json(["success" => true]);\n} else {\n    return json(["error" => "No active borrow record"]);\n}'
                        }
                    ]
                },
                {
                    id: 'm_member',
                    name: 'Member',
                    x: 100,
                    y: 420,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'name', type: 'string', modifiers: [] },
                        { name: 'email', type: 'string', modifiers: ['unique'] },
                        { name: 'phone', type: 'string', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'hasMany', target: 'BorrowRecord' }
                    ],
                    methods: [
                        {
                            name: 'listMembersAction',
                            params: 'Request req',
                            body: 'var members = Member.modelFindAll();\nreturn json(members);'
                        },
                        {
                            name: 'createMemberAction',
                            params: 'Request req',
                            body: 'var member = Member.modelCreate([\n    "name" => req.name,\n    "email" => req.email,\n    "phone" => req.phone\n]);\nreturn json(["success" => true]);'
                        }
                    ]
                },
                {
                    id: 'm_record',
                    name: 'BorrowRecord',
                    x: 520,
                    y: 220,
                    attributes: [
                        { name: 'id', type: 'integer', modifiers: ['primary'] },
                        { name: 'borrowedAt', type: 'datetime', modifiers: [] },
                        { name: 'returnedAt', type: 'datetime', modifiers: ['nullable'] }
                    ],
                    relations: [
                        { type: 'belongsTo', target: 'Book' },
                        { type: 'belongsTo', target: 'Member' }
                    ],
                    methods: [
                        {
                            name: 'listBorrowRecordsAction',
                            params: 'Request req',
                            body: 'var records = BorrowRecord.modelFindAll();\nreturn json(records);'
                        },
                        {
                            name: 'createBorrowRecordAction',
                            params: 'Request req',
                            body: 'var record = BorrowRecord.modelCreate([\n    "Book_id" => req.bookId,\n    "Member_id" => req.memberId,\n    "borrowedAt" => req.borrowedAt,\n    "returnedAt" => req.returnedAt\n]);\nreturn json(["success" => true]);'
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
                // If empty, auto load sample as starting point
                loadLibrarySample();
            }
        })
        .catch(err => {
            console.warn('Failed to load saved state, loading default sample.', err);
            loadLibrarySample();
        });
});
