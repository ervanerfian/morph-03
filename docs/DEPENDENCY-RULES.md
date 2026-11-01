# Morph Space Dependency Rules

**Status:** architecture contract for new code; automated enforcement is planned.

For browser-side interaction, native APIs and lifecycle policy, follow the user's
[Datastar-first & Native Web Platform guidance](DATASTAR-NATIVE-WEB-GUIDANCE.md).

## Layer direction

```text
Presentation -> Application -> Domain
                    ^            ^
                    |            |
                Contracts / Ports
                    ^
                    |
Infrastructure ------+

Bootstrap / Composition Root wires trusted implementations to ports.
```

The diagram expresses allowed source dependencies, not runtime call order:

1. **Domain** contains business rules, entities/value objects and domain policies. It does not import HTTP, Twig, Datastar, PDO, environment loaders, filesystem adapters or another module's internals.
2. **Application** contains commands, queries and use cases. It may use its own Domain and explicit contracts/ports. It does not construct PDO, parse HTTP globals, render Twig, or make browser state authoritative.
3. **Contracts / Ports** define stable module-owned capabilities and adapter boundaries. They do not expose database-specific records as the only contract unless the contract explicitly represents persistence.
4. **Infrastructure** implements ports using PDO/PostgreSQL, filesystem, session stores, mail or other external systems. SQL and transaction details stay here or in an explicitly designated persistence adapter.
5. **Presentation** adapts HTTP/Datastar requests to Application input and maps results to Twig/HTML/SSE/JSON. It performs input-shape parsing, not domain authorization or direct SQL.
6. **Bootstrap / Composition Root** is the only place that knows concrete implementations and assembles enabled modules, routes, middleware and dependencies.

## Module dependency rules

- A module may depend on another module's published Contracts, never its internal classes or tables.
- No circular module dependencies. If two modules require each other's internal data, extract a narrow, policy-safe contract or move the invariant into a coordinating application use case.
- Domain and Application code must not read `$_GET`, `$_POST`, `$_SESSION`, `$_SERVER`, request headers, or global environment directly.
- Presentation must not bypass a use case by constructing SQL or mutating a repository directly.
- All SQL uses PDO prepared statements for values. Dynamic identifiers are selected only through trusted schema/type metadata and safe identifier resolution; client input is never concatenated into SQL.
- Browser code may improve interaction but cannot grant permissions, choose the trusted actor/workspace, determine a record's authoritative schema, or skip server validation.

## Tenant and authorization flow

- Authentication resolves a server-trusted principal before application commands run.
- Workspace resolution verifies membership and yields an explicit context object; a requested workspace identifier is only a selector to validate.
- Application use cases receive principal and workspace context explicitly. They must not infer either from form values or component props.
- Database Builder reads and writes scope source and target records, field definitions, relations and derived projections to the same verified workspace and apply resource/field policies.
- Lookups, autocomplete, filtering, sorting, counts and errors must not disclose unauthorized target records or fields.

## Configuration and extensibility

- The enabled-module manifest is trusted, version-controlled application configuration. It is explicit and deterministic.
- Templates and user-defined schema are data validated by server-side contracts and registries. They cannot choose arbitrary classes, SQL, executable expressions, files, URLs to fetch, or service implementations.
- Field types are registered capabilities with versioned configuration, validation, normalization, codec, rendering, compatibility and query/index contracts. Unsupported type/version fails closed; do not silently coerce it.
- Client state is a projection of server-approved state. Datastar/Rocket components do not establish a second source of truth.

## Enforcement and review

- Add automated architecture tests for module ownership, forbidden imports and dependency cycles when the test harness is established.
- Each module migration declares its owner and dependencies. A migration must not alter another module's objects without a reviewed coordinated change.
- Integration tests must state their evidence level. Real PostgreSQL tests are required for database behavior, role privileges, transactions, relation integrity and concurrency; mocks/SQLite do not establish PostgreSQL behavior.
- Any intentional exception to these rules needs a short Architecture Decision Record stating scope, reason, impact and removal/compatibility plan.
