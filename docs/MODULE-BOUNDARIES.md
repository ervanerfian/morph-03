# Morph Space Module Boundaries

**Status:** target ownership map for the modular monolith; modules are not claimed to be implemented by this document.

## Platform core

The Core owns application startup and cross-cutting technical mechanisms, not product policy:

- composition root and trusted module manifest;
- HTTP request/response abstractions, routing, middleware and error mapping;
- dependency container and event dispatch contracts;
- configuration loading and secret handling;
- PDO connection lifecycle and transaction coordination;
- Twig environment and shared presentation infrastructure;
- security primitives such as CSRF/session interfaces, request IDs and safe diagnostics;
- asset manifest and Datastar/SSE transport infrastructure.

Core does not decide workspace membership, who may edit a record, what a field type means, or whether a user can view a linked target.

## Product modules and ownership

| Module | Owns | Public contracts offered to other modules | Status |
| --- | --- | --- | --- |
| **Identity** | User identity, credentials, authentication flows, opaque server-side sessions and account lifecycle | Authenticated principal, authentication/session interfaces | Planned |
| **Workspace** | Workspace identity, membership, active workspace resolution and workspace-level authorization policy | Verified workspace context, membership lookup and policy capabilities | Planned |
| **Database Builder** | Template catalog/version resolution; logical Database instances; Data Sources; Table Views; Field definitions/bindings; Records; relation edges; lookup definitions; lifecycle/versioning | Authorized table/record queries and commands, field/type registry and database-definition contracts | Planned |
| **Pages** | Page identity, page configuration and section placement, only after composition and visibility rules are approved | Page/section read and placement contracts | Deferred pending product/policy decisions |
| **File resources** | File identity, storage lifecycle and creator/resource policy | Authorized file references and storage operations | Deferred |
| **CRM / Projects / other apps** | Their application-specific workflows and policies | App-specific public capabilities | Future consumers; must not duplicate the generic data engine |

A module owns the schema objects it introduces and its migrations. A shared physical database does not mean shared write ownership. Another module must not issue ad-hoc SQL against those objects; it consumes the owning module's public contract or an explicitly reviewed cross-module use case.

## Database Builder conceptual ownership

The Database Builder must preserve the following distinct identities:

```text
Workspace
  -> logical Database instance(s)
      -> Table references / composition
          -> Data Source(s) and Table View(s)
              -> Field definitions + Field bindings
                  -> Record(s) with immutable identity
                      -> Relation edge(s) to authorized target Record(s)
```

The exact registry/snapshot tables and publication strategy are still subject to schema review. Do not treat `modelGroups` in a legacy canonical graph as authoritative Database ownership; do not implement a physical SQL table per user-defined Table; do not duplicate records when creating another view.

## Module collaboration rules

- Cross-module imports target public `Contracts` only, never another module's `Domain`, `Infrastructure` or `Presentation` internals.
- A shared transaction spanning module-owned data is coordinated by an application use case with explicit ports; it is not implemented by hidden cross-module repository calls.
- Domain events communicate committed facts. Events are not a substitute for an atomic invariant that must hold in one transaction.
- A module manifest is trusted application configuration. User JSON cannot load PHP classes, register arbitrary handlers, declare service IDs, or execute code.
- Module enablement must be deterministic and auditable; disabling a module must not silently delete its data or grant/revoke unrelated permissions.

## Deferred product decisions

Until explicitly designed, modules must not assume: shared Table/Field edit rights across logical Databases; Page placement grants resource access; Owner bypasses creator-configured View/Comment; cross-workspace relations; automatic bidirectional relations; cascade deletion of linked records; a default Trash retention period; or general Page composition through extensions.
