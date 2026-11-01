# Morph Space (`morph-03`)

Morph Space is being developed as a PHP Native modular monolith with PostgreSQL, Twig, Datastar and TypeScript. The product architecture and tenant/data invariants are documented under `docs/`.

## Current implementation slice

The initial Application Foundation provides an explicit composition root and module manifest, a small HTTP kernel/router, a dependency container, Twig rendering, a PostgreSQL PDO factory, and generic liveness/readiness routes. It does **not** yet implement authentication, workspace membership, schema migrations, logical Databases, templates, records, linked relations, Datastar interactions, the Rocket bundle, or the TypeScript build.

The readiness check uses the configured application database identity and PostgreSQL major version; it does not disclose database identity in its HTTP response. `/healthz` is process liveness only. `/readyz` is expected to remain not-ready until a project application role is provisioned and configured.

## Local setup

1. Use PHP 8.2 or newer with `pdo_pgsql` enabled and Composer installed. The currently observed Windows CLI is PHP 8.4.10 at `C:\php\php.exe`; Laragon's web-SAPI version still needs verification.
2. Install dependencies from the repository root:

   ```powershell
   composer install
   ```

   The first install will resolve and create `composer.lock`; review and retain that lockfile for reproducible setup.
3. Copy `.env.example` to an untracked `.env` and set a local password for the project application role. Never put real credentials in Git.
4. Configure Laragon's web document root to this project's `public/` directory. `public/.htaccess` provides Apache front-controller routing. Do not expose the repository root as the public document root.
5. Until the `morph03_app` role is created with reviewed project-scoped grants and the role is configured in `.env`, the root page and `/healthz` can boot, while `/readyz` returns `503`.

The verified local PostgreSQL identity is recorded in [`docs/LOCAL-DEVELOPMENT.md`](docs/LOCAL-DEVELOPMENT.md). Do not point this project at the `morph-01` database or its PostgreSQL 16 container.

## Verification status

- PostgreSQL 18.3 identity and `morph03_admin` superuser flags: verified by the developer with `psql`.
- PDO connection from `C:\php\php.exe` PHP 8.4.10 to `morph_03` at port `5433`: verified by the developer.
- Laragon web-SAPI PHP and HTTP integration: pending.
- PHP/composer commands are not available in the agent's Linux sandbox; code/runtime tests must be executed in the Windows PHP environment before claiming runtime parity.
- No application schema DDL or migration has been applied by this repository change.
