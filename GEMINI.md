Project guidelines for OAL Compiler for Laravel

Purpose
- Provide a concise, project-specific reference for contributing and maintaining this repository.
- Clarify how grammar changes (ANTLR) flow into generated PHP code and Laravel template output.

Project overview
- Language/Framework: PHP 8.1+, Laravel (template directory contains a scaffolded Laravel app)
- Parsing: ANTLR v4 with grammar defined in OAL.g4
- Code generation entrypoint: generate.php reads an .oal file and produces Laravel artifacts under template/
- Generated artifacts:
    - Models → template/app/Models/*.php
    - Migrations → template/database/migrations/*.php
    - Controllers → template/app/Http/Controllers/*.php
    - Middleware → template/app/Http/Middleware/*.php
    - Routes → template/routes/web.php

Local setup
- Install dependencies: composer install
- Optional: Ensure ANTLR v4 is installed and on PATH if you plan to modify OAL.g4 and regenerate parser code.
- PHP quality tools: composer format is used by generate.php to prettify generated code under template/.

Typical workflow
1) Edit examples/*.oal or your own .oal file.
2) Run code generation:
    - php generate.php path/to/file.oal
    - If no argument is provided, it defaults to examples/library.oal
3) Generated Laravel code will be written under template/ (existing migrations in template/database/migrations are cleared before regeneration).
4) Inspect and run the Laravel app from template/ as needed.

Modifying the grammar (OAL.g4)
- Update OAL.g4 at repo root for syntax changes.
- Regenerate parser/lexer/visitor classes into src/OalLib/ using:
    - antlr4 -Dlanguage=PHP -visitor OAL.g4 -o src/OalLib
- Commit both grammar and generated src/OalLib changes when the grammar evolves.
- Keep Compiler* visitors (e.g., src/CompilerModel.php, src/CompilerController.php, src/CompilerMiddleware.php, src/CompilerRoute.php) in sync with grammar changes; adjust visit* methods as necessary.

Coding standards
- Follow PSR-12 for PHP source under src/ and template/ app code.
- Naming:
    - Classes: StudlyCase
    - Methods/variables: camelCase
    - Constants: UPPER_SNAKE_CASE
    - Files: One class per file, filename matches class name
- Namespaces: Use Wahyurejeki\Oalcompiler for compiler classes under src/.
- Type declarations: Prefer scalar/return types and nullable types where applicable.
- Error handling: Throw informative exceptions in compiler/visitor code; avoid suppressing errors except where deliberate (e.g., safe unlink) and document with comments.
- Logging/debug: Avoid stray echo/var_dump in library code; use exceptions or structured messages.

Generated code quality
- generate.php runs composer format on the template/ directory. Ensure composer.json provides a format script (e.g., using friendsofphp/php-cs-fixer or pint) and that it is idempotent.
- Generated code should be valid Laravel code targeting the version expected by template/vendor.

Testing and verification
- Add or update example .oal programs in examples/ to exercise new grammar features.
- After changes:
    - Run php generate.php examples/your_example.oal
    - Review generated controllers, models, middleware, and routes under template/
    - If using Laravel’s test suite in template/tests, run it via phpunit or artisan from within template/ if configured.

Commit and PR guidelines
- Branching: feature/<short-name>, fix/<short-name>, chore/<short-name>
- Commit messages (conventional style preferred):
    - feat: add X in grammar and visitor
    - fix: correct Y in CompilerController visit* method
    - chore/docs/refactor/test: as appropriate
- Include: rationale, before/after behavior, and any migration notes for OAL programs.
- Keep diffs minimal and focused; update README or this guidelines file when workflows change.

Review checklist (for authors and reviewers)
- Grammar changes accompanied by regenerated src/OalLib outputs.
- Visitor methods updated to handle new/changed contexts.
- generate.php paths and cleanup behavior still correct (especially migrations clearing logic).
- composer format runs successfully locally.
- examples/ updated to showcase new features or cover bugfixes.
- No unintended changes under template/vendor or vendor/ directories.

Performance and safety
- Avoid O(n^2) string concatenations in visitors for large trees; prefer buffered building when needed.
- Validate inputs in visitors to prevent generating insecure Laravel code (e.g., ensure where/builders only allow intended operations, sanitize raw values where applicable).
- Do not execute arbitrary code from OAL input; generation should be purely declarative.

Release/versioning notes
- Tag grammar-affecting releases and note breaking changes in README.
- If output Laravel version expectations change, document in README and possibly add upgrade notes.

Contacts and support
- File issues with clear reproduction using a minimal .oal example in examples/.
- PRs welcome; adhere to these guidelines.
