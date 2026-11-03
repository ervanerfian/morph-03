# Morph Space UI Implementation

**Status:** server-rendered application shell and first custom dashboard-builder UI preview implemented. OpenPanel is the full-surface UI/UX reference; complete adaptation, authentication, workspace data, and persistent product pages are **not yet implemented**.

## Canonical UI/UX reference and adaptation mandate

**User decision (2026-11-03):** OpenPanel is the canonical, end-to-end UI/UX reference for Morph. The adaptation target covers **all** product UI, blocks, elements, and interactions—not inspiration alone and not a mix of unrelated design systems.

**Clarification (2026-11-03):** the user chose to keep Morph's PHP/Twig/Datastar/TypeScript architecture and apply OpenPanel's configurable dashboard interactions to Morph's Workspace/Database domain. This does not adopt OpenPanel's application runtime or analytics product, and does not authorize copying upstream source/assets. See the [OpenPanel-to-Morph adoption map](OPENPANEL-ADOPTION-MAP.md).

- **Upstream:** [OpenPanel](https://github.com/Openpanel-dev/openpanel), pinned reference snapshot [`0d9a8970cd2f14e59337efb0da127e823fa5cc25`](https://github.com/Openpanel-dev/openpanel/tree/0d9a8970cd2f14e59337efb0da127e823fa5cc25), checked 2026-11-03. Review upstream changes deliberately rather than silently following mutable `main`.
- **Coverage:** map and adapt page layouts, navigation, design tokens, typography, color, spacing, surfaces, blocks/components/elements, controls, interaction patterns and states (including focus, loading, empty, error, and disabled), responsive behavior, motion, and accessibility.
- **Product boundary:** Morph keeps its own name, business concepts, data, workflows, server authorization, and disclosure rules. Where a Morph-specific flow has no direct OpenPanel analogue, compose it from the closest OpenPanel patterns and record the mapping; do not invent a competing visual language by default.
- **Implementation boundary:** translate the reference into Morph-owned Twig, CSS, Datastar, and native-browser/TypeScript ESM code. This design decision does not add OpenPanel's application runtime, SPA framework, bundler, or dependencies, and does not override the existing PHP/PostgreSQL/Datastar architecture.
- **Retained references:** supplied `ui/HTML`, `ui/PHP`, and `ui/Symfony` variants remain untouched and available as secondary reference material; they are no longer the primary UI/UX authority.
- **License/provenance gate:** GitHub repository metadata and its `LICENSE.md` report AGPL-3.0 ([license](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/LICENSE.md), checked 2026-11-03). This mandate is for full UI/UX adaptation, not blanket authorization to copy upstream source, branding, fonts, icons, screenshots, or other assets. Before reusing code/assets, review license compatibility and file-level asset terms, retain required notices, and document provenance. If reuse is not cleared, implement the adapted experience with Morph-owned code/assets. The dashboard-builder slice is Morph-authored; no OpenPanel code or assets were copied.

## Current UI slice

- `templates/layouts/app.twig` provides the shared responsive shell and navigation, including the dashboard-builder preview route.
- `templates/system/home.twig` remains an honest foundation preview, not an authenticated dashboard. It contains no user, workspace, or live database data and links to the builder preview.
- `GET /dashboards` renders an honest, empty dashboard catalog; `GET /dashboards/preview` renders `templates/dashboard/builder-preview.twig` from a trusted, extensible `DashboardBlockCatalog`. `DashboardPreviewState` validates block/presentation IDs and preview controls from the untrusted query string.
- The builder preview supports adding, removing, reordering, and changing block presentation, plus preview period and card-density settings. State is URL-only; saving, data-source selection, live filters, and record queries are not implemented.
- `public/assets/css/app.css` contains Morph-owned design tokens, layout styles, responsive behavior, focus treatments, and the builder's component states.
- `assets/ts/app.ts` provides the local mobile-navigation behavior. TypeScript compiles to an ES module in ignored `public/assets/build/`.
- Only the Dashboards link opens the clearly marked preview; navigation to modules not implemented yet remains non-interactive.

The foundation shell predates the OpenPanel decision and remains provisional. The new builder route is the first partial Morph-owned UX slice, not a claim that the full UI is 100% adapted. Its state comes only from allowlisted URL options; it shows explicit empty/configuration-required states instead of mock data. No OpenPanel code or assets were copied. Continue mapping and adapting the pinned reference while keeping Morph-owned implementation, content, authorization, and data contracts.

## Asset workflow

Install the pinned development toolchain and build the browser module from the repository root:

```powershell
npm ci
npm run typecheck
npm run build
```

The generated `public/assets/build/` directory is ignored by Git and must be built locally/deployed as part of the asset step. The checked-in CSS is served from `public/assets/css/app.css`. Node/npm are development tooling only; they are not a production application runtime.

The dashboard-builder preview uses native GET forms and disclosures; no Datastar or Datastar Rocket bundle is loaded, and no client-side state store was added. Follow [DATASTAR-NATIVE-WEB-GUIDANCE.md](DATASTAR-NATIVE-WEB-GUIDANCE.md) for real server-driven interactions, thin JavaScript adapters, and lifecycle/accessibility requirements. Add Datastar to a feature slice when it has an authoritative server-side use case; add Rocket only after its official source, version, and distribution path have been verified and pinned. Do not use an unpinned CDN or assume an unavailable npm package name.

## Product and security progression

1. Extend the mapping in [OPENPANEL-ADOPTION-MAP.md](OPENPANEL-ADOPTION-MAP.md) from the first dashboard slice to all Morph surfaces, blocks, elements, and interaction states. Review exact license/provenance terms before any future source/asset reuse; current implementation is Morph-owned.
2. Complete Identity and Workspace contracts and verify the Laragon web-SAPI before presenting an authenticated workspace context or persisting a dashboard.
3. Build the Database Builder views incrementally: logical Database catalog, table/view navigation, then data grid and record details. A logical Database is not a physical PostgreSQL database; use OpenPanel patterns for each view and interaction.
4. Turn the builder preview into an authorized, persisted Morph dashboard only after its server-side use cases, Data Source/Field capability contracts, validation, access policy, and storage design are reviewed. No database DDL or runtime persistence is approved by this preview.
5. Use Twig for server-rendered HTML; Datastar for appropriate server-driven state and HTML/SSE updates; TypeScript/Rocket only for browser behavior that benefits from a reusable client component.

The UI never grants access. Authentication, workspace membership, resource policy, validation, and persistence remain server-side. Client signals, route IDs, and DOM state are not authorization.

## Verification boundary

The TypeScript typecheck/build can be run with Node/npm. PHP/Composer and the Laragon web-SAPI are not available in the agent sandbox, so the Twig/PHP page still requires verification through the developer's local PHP runtime. The developer selected scoped non-superuser `morph03_app` for PHP runtime and `morph03_admin` for administration/provisioning; a read-only catalog check found `morph03_app` absent, so the intended runtime role is not yet available. This UI work does not configure credentials, create roles, change grants, or run schema DDL.
