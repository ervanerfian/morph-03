# Morph Space Architecture

**Status:** implementation contract for new application code; the database schema remains a reviewed design artifact, not executable DDL.
**Scope:** the PHP Native + Datastar Super Apps platform in `morph-03`.

## Product and system boundaries

Morph Space is a multi-workspace platform. A physical PostgreSQL database stores platform data; a Morph **logical Database** is tenant-scoped metadata and is not a PostgreSQL database or a user-created physical table. Presets and custom databases are definitions rendered by one shared data engine.

The data model distinguishes:

- **Database instance** — a workspace-owned composition/provenance unit created from a versioned template or a custom definition.
- **Data Source** — the persistent identity and home of records.
- **Table View** — a presentation over a Data Source. Multiple views may show the same record set without copying records.
- **Field definition / schema binding** — reusable field semantics and membership in the canonical Data Source schema (`data_source_id`); each Table View controls visibility, order and label separately.
- **Record** — stable UUID identity plus a separately mutable business key and schema/version context.
- **Relation edge** — the canonical writable link from a source record and its canonical Relation Field (`field_definition_id`) to a target record. Linked display values are projections of the authorized target record; they are not duplicated writable values. V1 has no reverse Relation Field/backlink UI, though incoming edges remain relevant to lifecycle checks.

These concepts follow `DATABASE-FIELD-BINDING-AND-RELATION-EDGE-DESIGN.md`, `DATABASE-RELATION-STORAGE-PLAN.md`, `DATABASE-TEMPLATE-JSON-CONTRACT.md`, and `TARGET-POSTGRESQL-SCHEMA.md`. Those documents contain unresolved decisions and proposed structures; they do not authorize an unreviewed schema migration.

## Application architecture

The production application is a **modular monolith** with one PHP deployment and one application composition root. Modules own their domain rules, use cases, public contracts, persistence adapters, routes and templates. Modules communicate through explicit contracts rather than reaching into another module's tables or internal classes.

Request flow:

```text
Browser
  -> public front controller
  -> HTTP kernel / middleware
  -> authenticated request context
  -> module presentation adapter
  -> application use case
  -> domain rules + ports
  -> infrastructure adapters (PDO, session store, filesystem)
  -> Twig / Datastar HTML or SSE response
```

PHP is authoritative for authentication, workspace membership, authorization, validation, transactions, data identity and persistence. Client signals, DOM attributes, component props, URLs and submitted IDs are untrusted input and never constitute an authorization decision.

## Technology roles

| Technology | Responsibility |
| --- | --- |
| Native PHP + PDO | Application core, use cases, server authorization, transactions, routing and database access; no ORM is required. |
| PostgreSQL 18 | Shared physical persistence with relational identity/integrity and JSONB for validated declarative configuration and record scalar payloads where appropriate. |
| Twig | Server-rendered HTML and escaped presentation. |
| Datastar | Hypermedia interactions, signals, server-driven DOM morphing and SSE. |
| TypeScript + Datastar Rocket | Reusable browser components for genuinely complex interactions; Light DOM is the default. TypeScript is compiled to browser JavaScript. |
| Node.js / npm | Development and asset tooling only; not a production application runtime. |
| CSS / Tailwind | Presentation layer governed by design tokens and configuration; it does not own business state. |

**Dependency discovery:** querying the npm registry for the bare package name `datastar-rocket` returned `E404` on 2026-11-01. The import example in `INTRODUCTION.md` is not proof that this package is installable from npm. Before Phase 3, pin and verify the official Rocket bundle/source and its licensing/build path; do not add an assumed npm dependency or load an unpinned third-party CDN.

For browser interaction policy, use [DATASTAR-NATIVE-WEB-GUIDANCE.md](DATASTAR-NATIVE-WEB-GUIDANCE.md) as the user's source of truth: evaluate Datastar before custom JS, use native browser APIs only as complementary adapters, and keep PHP authoritative. Cross-tab messages, if a real feature later needs them, are untrusted invalidation hints followed by server-side permission/session revalidation—not shared auth state. The guidance is policy, not evidence that any adapter/API is implemented; its external references still require version/browser-specific review.

Do not add SPA frameworks, a parallel client-side data authority, a second reactive engine, an ORM, a per-template CRUD implementation, or a physical PostgreSQL database per logical Database without a reviewed architectural change.

## Persistence and tenancy invariants

1. A request's effective user and workspace context comes from verified server-side authentication and membership. A client-supplied `workspace_id` is not authority.
2. Every tenant-owned query, mutation, relation resolution and derived lookup is scoped to the verified workspace and resource policy.
3. Relations use immutable target record identity, not displayed labels or mutable business keys. A display field selects a projection; it does not redefine the relation.
4. Field/type/configuration definitions are validated, versioned data interpreted by trusted registries. User JSON is never executable PHP, SQL, JavaScript, a class name, or an arbitrary route.
5. Changes to definitions and records use explicit compatibility/version checks and transaction boundaries. Unsupported capability or incompatible data fails closed; it is never silently coerced or discarded.
6. A Table View is not a second record store. Editing a displayed linked value must resolve to the authorized canonical target record or be rejected.
7. Workspace visibility, Page placement and Relation do not implicitly grant access to a record or file.

## Application configuration and operations

The local PostgreSQL identity is recorded, without credentials, in `LOCAL-DEVELOPMENT.md`. The developer has verified PostgreSQL 18.3 through both `psql` and the `C:\php\php.exe` CLI PDO driver. The Laragon web SAPI has not yet been confirmed. Application configuration must fail clearly if the configured PostgreSQL connection cannot be established; there is no silent JSON/in-memory fallback.

Database schema changes require a versioned migration, a reviewed impact/rollback plan and verification against the same declared database identity. Agent sandbox code must not execute DDL against the developer's Windows database. See `CONNECTION.md` and the design-document gates before preparing or applying schema changes.

## Delivery phases

1. **Application Foundation:** composition root, module registry, HTTP kernel, dependency container, configuration, PDO/transaction ports, Twig and safe health/readiness diagnostics.
2. **Identity & Workspace:** users, authentication, server-side sessions, membership, active workspace context and authorization policies.
3. **Component Platform:** Datastar integration, TypeScript build, Datastar Rocket registry, design-token contract and accessible shared components.
4. **Data Platform:** template compiler, logical Database/Table/Data Source/Field/Record, validation, versioning and table views.
5. **Linked Data:** relation-edge integrity and disclosure checks, then read-only Lookup; later lifecycle/import/export capabilities only after their policy decisions.
6. **Composable Applications & Hardening:** project/CRM and other modules over public data-engine contracts, architecture tests, browser/database integration and deployment hardening.

Each phase is incremental but must preserve the invariants above. Current environment verification is evidence for the local server and CLI PDO connection only; it is not browser-to-web-SAPI application integration evidence.
