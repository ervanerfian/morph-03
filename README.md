# Morph Space (`morph-03`)

Morph Space is being developed as a PHP Native modular monolith with PostgreSQL, Twig, Datastar and TypeScript. The product architecture, tenant/data invariants, and current milestones are documented under `docs/`—see [`docs/PROJECT-STATUS.md`](docs/PROJECT-STATUS.md) for progress and verification evidence.

## Current implementation slice

The Application Foundation provides an explicit composition root and module manifest, a small HTTP kernel/router, a dependency container, Twig rendering, a PostgreSQL PDO factory, and generic liveness/readiness routes. The root page remains a Morph-authored, non-authenticated foundation preview. OpenPanel is the canonical reference for full UI/UX adaptation across all Morph UI, blocks, elements, and interactions; the user chose to retain Morph's PHP/Twig/Datastar/TypeScript stack and apply OpenPanel's configurable dashboard patterns to Morph's Workspace/Database domain, not to copy its analytics product or runtime. The first Morph-owned UI slice is an empty catalog at `/dashboards` and a builder at `/dashboards/preview` (see the [adoption map](docs/OPENPANEL-ADOPTION-MAP.md)); the builder can add, remove, reorder, and change block presentation in URL-only preview state. It has no workspace, live data, or persistence, and is not full UI parity. The supplied `ui/HTML`, `ui/PHP`, and `ui/Symfony` variants remain secondary references. OpenPanel reports AGPL-3.0; no source/assets were copied, and any future reuse requires a separate license/provenance review. See [`docs/UI-IMPLEMENTATION.md`](docs/UI-IMPLEMENTATION.md) and the [adoption map](docs/OPENPANEL-ADOPTION-MAP.md). A small TypeScript module builds to an ES module for mobile navigation. The app does **not** yet implement authentication, workspace membership, schema migrations, logical Databases, templates, records, linked relations, Datastar interactions, or the Rocket bundle.

The readiness check uses the configured application database identity and PostgreSQL major version; it does not disclose database identity in its HTTP response. `/healthz` is process liveness only. `/readyz` is expected to remain not-ready until a project application role is provisioned and configured.

## Local setup

1. Use PHP 8.2 or newer with `pdo_pgsql` enabled and Composer installed. The currently observed Windows CLI is PHP 8.4.10 at `C:\php\php.exe`; Laragon's web-SAPI version still needs verification.
2. Install dependencies from the repository root:

   ```powershell
   composer install
   ```

   The first install will resolve and create `composer.lock`; review and retain that lockfile for reproducible setup.
3. Install the pinned front-end tooling and build the TypeScript ES module:

   ```powershell
   npm ci
   npm run typecheck
   npm run build
   ```

   The build writes to ignored `public/assets/build/`; rebuild after pulling source changes. Node/npm are development tools, not the application runtime.
4. Copy `.env.example` to an untracked `.env` and configure credentials only after the application-role policy is resolved. Never put real credentials in Git.
5. Configure Laragon's web document root to this project's `public/` directory. `public/.htaccess` provides Apache front-controller routing. Do not expose the repository root as the public document root.
6. Until a project runtime role is reviewed, provisioned, and configured in `.env`, `/readyz` is expected to return `503`. Do not use the superuser for application PHP without an explicit policy decision.

The verified local PostgreSQL identity is recorded in [`docs/LOCAL-DEVELOPMENT.md`](docs/LOCAL-DEVELOPMENT.md). Do not point this project at the `morph-01` database or its PostgreSQL 16 container.

## Verification status

- PostgreSQL 18.3 identity and `morph03_admin` superuser flags: verified by the developer with `psql`.
- PDO connection from `C:\php\php.exe` PHP 8.4.10 to `morph_03` at port `5433`: verified by the developer.
- TypeScript `typecheck` and ES-module build: verified in the agent sandbox with Node.js `v22.22.3` and the locked toolchain. The generated `public/assets/build/` output is ignored by Git.
- The root Morph shell was rendered in the browser at `http://127.0.0.1:8080/` through PHP's built-in CLI server (developer screenshot). This verifies the root preview only; Apache/vhost configuration, Laragon web-SAPI, health/readiness routes, and DB-backed HTTP behavior remain pending.
- PHP/Composer commands are not available in the agent's Linux sandbox; code/runtime tests must be executed in the Windows PHP environment before claiming runtime parity.
- No application schema DDL, role grant, or migration has been applied by this project work.
