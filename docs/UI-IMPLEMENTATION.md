# Morph Space UI Implementation

**Status:** server-rendered application-shell preview implemented; OpenPanel selected for full UI/UX adaptation, which is **not yet implemented**. Authentication, workspace data, and product pages are also not yet implemented.

## Canonical UI/UX reference and adaptation mandate

**User decision (2026-11-03):** OpenPanel is the canonical, end-to-end UI/UX reference for Morph. The adaptation target covers **all** product UI, blocks, elements, and interactions—not inspiration alone and not a mix of unrelated design systems.

- **Upstream:** [OpenPanel](https://github.com/Openpanel-dev/openpanel), pinned reference snapshot [`0d9a8970cd2f14e59337efb0da127e823fa5cc25`](https://github.com/Openpanel-dev/openpanel/tree/0d9a8970cd2f14e59337efb0da127e823fa5cc25), checked 2026-11-03. Review upstream changes deliberately rather than silently following mutable `main`.
- **Coverage:** map and adapt page layouts, navigation, design tokens, typography, color, spacing, surfaces, blocks/components/elements, controls, interaction patterns and states (including focus, loading, empty, error, and disabled), responsive behavior, motion, and accessibility.
- **Product boundary:** Morph keeps its own name, business concepts, data, workflows, server authorization, and disclosure rules. Where a Morph-specific flow has no direct OpenPanel analogue, compose it from the closest OpenPanel patterns and record the mapping; do not invent a competing visual language by default.
- **Implementation boundary:** translate the reference into Morph-owned Twig, CSS, Datastar, and native-browser/TypeScript ESM code. This design decision does not add OpenPanel's application runtime, SPA framework, bundler, or dependencies, and does not override the existing PHP/PostgreSQL/Datastar architecture.
- **Retained references:** supplied `ui/HTML`, `ui/PHP`, and `ui/Symfony` variants remain untouched and available as secondary reference material; they are no longer the primary UI/UX authority.
- **License/provenance gate:** GitHub repository metadata and its `LICENSE.md` report AGPL-3.0 ([license](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/LICENSE.md), checked 2026-11-03). This mandate is for full UI/UX adaptation, not blanket authorization to copy upstream source, branding, fonts, icons, screenshots, or other assets. Before reusing code/assets, review license compatibility and file-level asset terms, retain required notices, and document provenance. If reuse is not cleared, implement the adapted experience with Morph-owned code/assets. No OpenPanel code or assets were copied by this documentation change.

## Current UI slice

- `templates/layouts/app.twig` provides the shared responsive shell and navigation.
- `templates/system/home.twig` is an honest foundation preview, not an authenticated dashboard. It contains no user, workspace, or live database data.
- `public/assets/css/app.css` contains Morph-owned design tokens, layout styles, responsive behavior, and focus treatments.
- `assets/ts/app.ts` provides the local mobile-navigation behavior. TypeScript compiles to an ES module in ignored `public/assets/build/`.
- Navigation items for modules not implemented yet are intentionally non-links.

This foundation shell predates the OpenPanel decision. It is a Morph-authored preview, not yet a 100%-adapted product UI; this documentation update adds no OpenPanel code or assets. Do not treat its existing layout/styles as the target system. The next UI work must map and adapt the pinned OpenPanel reference while keeping Morph-owned implementation, content, and authorization.

## Asset workflow

Install the pinned development toolchain and build the browser module from the repository root:

```powershell
npm ci
npm run typecheck
npm run build
```

The generated `public/assets/build/` directory is ignored by Git and must be built locally/deployed as part of the asset step. The checked-in CSS is served from `public/assets/css/app.css`. Node/npm are development tooling only; they are not a production application runtime.

No Datastar bundle or Datastar Rocket bundle is loaded by this preview. Follow [DATASTAR-NATIVE-WEB-GUIDANCE.md](DATASTAR-NATIVE-WEB-GUIDANCE.md) for Datastar-first interaction design, thin JavaScript adapters, and lifecycle/accessibility requirements. Add Datastar to real server-driven interactions in the relevant feature slice, and add Rocket only after its official source, version, and distribution path have been verified and pinned. Do not use an unpinned CDN or assume an unavailable npm package name.

## Product and security progression

1. Inventory the pinned OpenPanel reference and create a UI mapping that covers all Morph layouts, blocks, elements, and interaction states. Review and record source/asset license terms before reusing any upstream code or assets; this design decision does not authorize copying.
2. Complete Identity and Workspace contracts and verify the Laragon web-SAPI before presenting an authenticated workspace context.
3. Add workspace-scoped navigation and overview only when those values come from trusted server-side services, adapting them to the OpenPanel reference.
4. Build the Database Builder views incrementally: logical Database catalog, table/view navigation, then data grid and record details. A logical Database is not a physical PostgreSQL database; use OpenPanel patterns for each view and interaction.
5. Use Twig for server-rendered HTML; Datastar for server-driven state and HTML/SSE updates; TypeScript/Rocket only for browser behavior that benefits from a reusable client component.

The UI never grants access. Authentication, workspace membership, resource policy, validation, and persistence remain server-side. Client signals, route IDs, and DOM state are not authorization.

## Verification boundary

The TypeScript typecheck/build can be run with Node/npm. PHP/Composer and the Laragon web-SAPI are not available in the agent sandbox, so the Twig/PHP page still requires verification through the developer's local PHP runtime. The developer selected scoped non-superuser `morph03_app` for PHP runtime and `morph03_admin` for administration/provisioning; a read-only catalog check found `morph03_app` absent, so the intended runtime role is not yet available. This UI work does not configure credentials, create roles, change grants, or run schema DDL.
