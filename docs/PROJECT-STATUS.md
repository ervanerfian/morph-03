# Morph Space Project Status

- **Last updated:** 2026-11-01
- **Active branch:** `arena/4800f4c2-morph-03`
- **Pull request:** [#1 — keep open](https://github.com/ervanerfian/morph-03/pull/1)

This file is the durable milestone and verification summary. Update it when a meaningful implementation or verification milestone changes; do not treat an uncommitted idea as delivered.

## Current milestone

The PHP Native application foundation is in the open PR. A Morph-authored Twig application shell and an explicitly non-authenticated foundation preview are now implemented. The UI uses original Morph markup/styles and a small TypeScript ES module for responsive navigation; all supplied HTML, PHP, and Symfony UI variants remain untouched as reference material. Data-engine work remains design-only; the relation docs now distinguish per-field configuration, a single radio-selected Display Field, and per-record immutable relation edges, while recording unresolved value-identity/cardinality decisions.

## Progress

| Area | State | Notes |
| --- | --- | --- |
| UI reference variants | Received and retained | `ui/HTML`, `ui/PHP`, and `ui/Symfony`; reference only, not runtime dependencies. |
| PHP application foundation | Implemented in source | Router, module manifest, Twig renderer, PDO factory, and health/readiness routes. Native PHP/Laragon HTTP integration remains unverified. |
| Morph UI shell | Implemented as preview | Shared Twig shell, responsive navigation, Morph-owned CSS, and TypeScript ESM build. No real account, workspace, or product data is shown. |
| Datastar interactions | Not implemented | Follow `DATASTAR-NATIVE-WEB-GUIDANCE.md`: evaluate Datastar first, keep JS thin, and treat cross-tab signals only as invalidation hints requiring server revalidation. No cross-tab adapter is implemented. |
| Datastar Rocket | Not integrated | Bundle/source and distribution must be verified and pinned first. |
| Identity & Workspace | Not implemented | Needs reviewed contracts, server-side session/auth and membership policies. |
| Logical Database Builder | Design only | No data engine/runtime or approved schema. Relation config, one Display Field radio choice, immutable per-record edge identity, and Table View placement are now separated in docs; stable field-value identity and relation cardinality remain open. No migration is authorized. |
| Field-type contracts | Roadmap/design only | Target catalog is explicitly non-exhaustive; future type handlers use a trusted, versioned, extensible registry. No runtime type registry is implemented. |
| PostgreSQL schema / role grants | Not changed | No DDL or grants have been run by this work. Runtime-role policy is unresolved. |

## Verification evidence

- Node.js `v22.22.3`, locked TypeScript toolchain: `npm ci`, `npm run typecheck`, and `npm run build` passed in the agent sandbox.
- Generated `public/assets/build/` files are ignored by Git; build them after checkout/pull.
- PostgreSQL 18.3 identity and CLI PDO connectivity were verified by the developer on Windows, as recorded in `LOCAL-DEVELOPMENT.md`; no DDL or grants were applied by this work.
- Developer confirmed the Morph shell rendered in a browser at `http://127.0.0.1:8080/` via PHP's built-in CLI server after Composer/npm setup (screenshot). This verifies that preview route only. An earlier Apache URL served the repository root as a directory listing (including `.env`); there is no evidence that vhost was corrected. Keep the document root at `public/`. Apache/vhost configuration, Laragon web-SAPI behavior, health/readiness routes, DB-backed requests, and product interactions remain unverified.
- The developer reported `composer install` generated `composer.lock` locally; that file is not present in the current branch and still needs review/synchronization for reproducible Composer installs.
- PHP/Composer are unavailable in the agent sandbox, so native runtime parity must be checked in the Windows environment.

## Decisions and blockers

The repository connection guidance calls for a scoped, non-superuser application role, while another target note shows a superuser URL and the developer requested full-superuser development access. `morph03_admin` is a superuser and bypasses RLS. Do not silently use it for PHP or create/grant `morph03_app`; obtain an explicit runtime-role decision before configuring application access or applying DDL.

Relation semantics confirmed by the developer: the radio chooses exactly one target Display Field; the actual immutable target `record_id` belongs to each edge, not Relation config. Table/View placement checkboxes are separate; Multi-field Projection is future scope. Single-versus-multiple target cardinality remains open. A related schema identity question is now explicit: values/edges must not be keyed by a Table View's presentation binding; `field_definition_id` is a candidate, but the canonical field identity needs review before DDL.

`DATASTAR-NATIVE-WEB-GUIDANCE.md` is now the source of truth for Datastar-first and native-browser interaction policy. It says native ESM/no-build, while the current foundation uses `tsc` to emit browser ESM (without a bundler). This wording needs clarification before changing the existing TypeScript pipeline: it may mean no bundler/runtime build, or it may prohibit the current compile step. No tooling change was made. The guide's external references also have not been independently reviewed from the sandbox.

## Next steps

1. Review the reconciled data-model docs and decide the canonical Field/value identity (Field Definition vs. Data Source-scoped Field), plus relation cardinality and edge lifecycle. No DDL until these boundaries are settled.
2. Resolve the runtime-role policy before database-backed application work; do not silently use a superuser or grant `morph03_app`.
3. Verify Apache is rooted at `public/` and separately test Laragon web-SAPI, `/healthz`, and expected `/readyz` behavior. The PHP CLI built-in preview is not that verification.
4. Implement Identity & Workspace contracts and reviewed persistence, then build the data engine around the versioned extensible Field registry.

## How to follow progress

- The open PR is the reviewable source of pushed commits and changed files.
- This file records the latest milestone, evidence, blockers, and next step.
- Progress reports in chat will separate **done**, **tested**, **pending**, and **blocked**; a claim is not marked done merely because files were drafted.
