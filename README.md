# Morph Space (`morph-03`)

Morph Space is being developed as a PHP Native modular monolith with PostgreSQL, Twig, Datastar and TypeScript. The product architecture, tenant/data invariants, and current milestones are documented under `docs/`—see [`docs/PROJECT-STATUS.md`](docs/PROJECT-STATUS.md) for progress and verification evidence.

## Current implementation slice

The Application Foundation provides an explicit composition root and module manifest, a small HTTP kernel/router, a dependency container, Twig rendering, a PostgreSQL PDO factory, and generic liveness/readiness routes. The root page has a Morph-authored responsive Twig shell and an explicitly non-authenticated foundation preview, informed by the retained UI references. A small TypeScript module builds to an ES module for mobile navigation. The app does **not** yet implement authentication, workspace membership, schema migrations, logical Databases, templates, records, linked relations, Datastar interactions, or the Rocket bundle.

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
- Laragon web-SAPI PHP, Twig rendering, responsive browser behavior, and HTTP integration: pending local verification.
- PHP/Composer commands are not available in the agent's Linux sandbox; code/runtime tests must be executed in the Windows PHP environment before claiming runtime parity.
- No application schema DDL, role grant, or migration has been applied by this UI change.
