# Morph Space Project Status

- **Last updated:** 2026-11-02
- **Active branch:** `arena/4800f4c2-morph-03`
- **Pull request:** [#1 — keep open](https://github.com/ervanerfian/morph-03/pull/1)

This file is the durable milestone and verification summary. Update it when a meaningful implementation or verification milestone changes; do not treat an uncommitted idea as delivered.

## Current milestone

The PHP Native application foundation is in the open PR. A Morph-authored Twig application shell and an explicitly non-authenticated foundation preview are now implemented. The UI uses original Morph markup/styles and a small TypeScript ES module for responsive navigation; all supplied HTML, PHP, and Symfony UI variants remain untouched as reference material. Data-engine work remains design-only. The developer has selected schema-level Field Binding (Table/Data Source), separate Table View presentation, `field_definition_id` as the canonical V1 Field-value identity, single-target Relation per source Record/Field, no reverse Relation Field in V1, target Trash blocked by incoming edges, permanent delete blocked until all incident edges are resolved, and scoped non-superuser `morph03_app` for PHP runtime. These decisions are documented; they do not approve or imply schema DDL, role creation, grants, or local credential changes.

## Progress

| Area | State | Notes |
| --- | --- | --- |
| UI reference variants | Received and retained | `ui/HTML`, `ui/PHP`, and `ui/Symfony`; reference only, not runtime dependencies. |
| PHP application foundation | Implemented in source | Router, module manifest, Twig renderer, PDO factory, and health/readiness routes. Native PHP/Laragon HTTP integration remains unverified. |
| Morph UI shell | Implemented as preview | Shared Twig shell, responsive navigation, Morph-owned CSS, and TypeScript ESM build. No real account, workspace, or product data is shown. |
| Datastar interactions | Not implemented | Follow `DATASTAR-NATIVE-WEB-GUIDANCE.md`: evaluate Datastar first, keep JS thin, and treat cross-tab signals only as invalidation hints requiring server revalidation. No cross-tab adapter is implemented. |
| Datastar Rocket | Not integrated | Bundle/source and distribution must be verified and pinned first. |
| Identity & Workspace | Not implemented | Needs reviewed contracts, server-side session/auth and membership policies. |
| Logical Database Builder | Design only | No data engine/runtime or approved schema. V1 uses `field_definition_id` values and single-target Relation per source Record/Field. Field binding is schema-level (Table/Data Source); Table View only controls presentation. Target Trash is blocked with incoming edges; permanent delete is blocked until all incident edges are explicitly resolved. Source/Database Trash details remain open; no migration is authorized. |
| Field-type contracts | Roadmap/design only | Target catalog is explicitly non-exhaustive; future type handlers use a trusted, versioned, extensible registry. No runtime type registry is implemented. |
| PostgreSQL schema / role grants | Not changed | No DDL or grants have been run. `morph03_app` is selected for scoped PHP runtime; `morph03_admin` is for administration/provisioning. A read-only privilege-check plan is documented, but `morph03_app` existence and privileges remain unverified. |

## Verification evidence

- Node.js `v22.22.3`, locked TypeScript toolchain: `npm ci`, `npm run typecheck`, and `npm run build` passed in the agent sandbox.
- Generated `public/assets/build/` files are ignored by Git; build them after checkout/pull.
- PostgreSQL 18.3 identity and CLI PDO connectivity were verified by the developer on Windows, as recorded in `LOCAL-DEVELOPMENT.md`; no DDL or grants were applied by this work.
- Developer confirmed the Morph shell rendered in a browser at `http://127.0.0.1:8080/` via PHP's built-in CLI server after Composer/npm setup (screenshot). This verifies that preview route only. An earlier Apache URL served the repository root as a directory listing (including `.env`); there is no evidence that vhost was corrected. Keep the document root at `public/`. Apache/vhost configuration, Laragon web-SAPI behavior, health/readiness routes, DB-backed requests, and product interactions remain unverified.
- `composer.lock` is tracked in commit `4475a17` (8 production packages, no dev packages). The developer ran `composer validate --strict` in Windows; output reported `./composer.json is valid` with no lock-file warning. PHP/Composer remain unavailable in the agent sandbox.
- PHP/Composer are unavailable in the agent sandbox, so native runtime parity must be checked in the Windows environment.

## Decisions and blockers

The developer selected `morph03_app` as the scoped, non-superuser PHP runtime role; `morph03_admin` remains the administrative/provisioning role. `morph03_admin` is a superuser and bypasses RLS, so it must not be used in PHP's `DATABASE_URL`. The existence and privileges of `morph03_app` have not been queried or verified. No role creation, grants, DDL, or credential configuration has been performed; inspect current state read-only and review a least-privilege grant plan before any provisioning.

Relation semantics confirmed by the developer: each config chooses exactly one target Display Field, and each source Record/Relation Field has at most one target Record in V1. Different source Records may reference the same target; target uniqueness is not implied. The target `record_id` is immutable and belongs to each edge, not Relation config. Field Binding belongs to the Table/Data Source schema; Table View controls only visibility, order, and label. Multi-field Projection, multi-target Relation, and reverse Relation Fields are not part of V1. The canonical key for scalar values and Relation edges is `field_definition_id`; a reused Field Definition means the same semantics/config, while different per-Data-Source semantics require explicit distinct identity/config. A target Record with incoming edges cannot be trashed; permanent delete is blocked while any incoming/outgoing edge remains, with no implicit cascade. Source Record/Database Trash, retention, and inaccessible-target UI remain open.

`DATASTAR-NATIVE-WEB-GUIDANCE.md` is the source of truth for Datastar-first and native-browser interaction policy. The developer's Modern PHP Super Apps Stack explicitly includes Node/npm for TypeScript compilation and testing; current `tsc` output is native browser ESM with no bundler. Working interpretation: “native ESM/no-build” means no bundled SPA/client runtime, while the TypeScript-to-ESM compile step remains allowed. No tooling change was made. The developer clarified the stack list is a general picture and Morph continues with PostgreSQL 18; do not infer a MySQL/SQLite multi-driver requirement from that overview. `INTRODUCTION.md`'s older PostgreSQL/SQLite runtime examples have been aligned to this project decision. The guide's external references have not been independently reviewed from the sandbox.

## Next steps

1. Review remaining data-model boundaries: mapping the selected schema-level binding to canonical Table/Data Source identities, shared Field/Table revision behavior, source/Database Trash and retention, inaccessible-target UI, and physical constraints consistent with the chosen `field_definition_id`/single-target contract. No DDL until the design and impact are reviewed.
2. Review [DATABASE-ROLE-PRIVILEGE-PLAN.md](DATABASE-ROLE-PRIVILEGE-PLAN.md) and run its read-only checks in the authorized local `morph_03` admin session; record only role flags/privileges, never credentials. Do not create roles, grant privileges, or change PHP configuration until the results and exact object scope are reviewed. Keep `morph03_admin` out of PHP runtime configuration.
3. Verify Apache is rooted at `public/` and separately test Laragon web-SAPI, `/healthz`, and expected `/readyz` behavior. The PHP CLI built-in preview is not that verification.
4. Implement Identity & Workspace contracts and reviewed persistence, then build the data engine around the versioned extensible Field registry.

## How to follow progress

- The open PR is the reviewable source of pushed commits and changed files.
- This file records the latest milestone, evidence, blockers, and next step.
- Progress reports in chat will separate **done**, **tested**, **pending**, and **blocked**; a claim is not marked done merely because files were drafted.
