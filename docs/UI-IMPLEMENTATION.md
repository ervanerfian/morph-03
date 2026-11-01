# Morph Space UI Implementation

**Status:** first server-rendered application-shell preview implemented; authentication, workspace data, and product pages are not yet implemented.

## Reference material

The developer is retaining the supplied `ui/HTML`, `ui/PHP`, and `ui/Symfony` variants as potential sources of ideas and examples. They remain reference material, not application runtime or a package dependency. For Twig layout patterns, `ui/Symfony/paces` is the closest example; the HTML and PHP versions may still be consulted where they offer a useful comparison.

Morph UI is authored in the application stack under `templates/`, `public/assets/css/`, and `assets/ts/`. Do not copy a complete reference project into the application, run its Symfony or Gulp project as Morph, or add its large vendor/plugin set without a separately reviewed need. Symfony-specific Twig helpers, routes, assets, and extensions must be replaced with Morph-owned equivalents. Keep reference assets and code out of public runtime paths.

Use only visual patterns and implementation material covered by the developer's license. Do not redistribute or deploy reference images, fonts, compiled bundles, or other proprietary assets without confirming their license terms.

## Current UI slice

- `templates/layouts/app.twig` provides the shared responsive shell and navigation.
- `templates/system/home.twig` is an honest foundation preview, not an authenticated dashboard. It contains no user, workspace, or live database data.
- `public/assets/css/app.css` contains Morph-owned design tokens, layout styles, responsive behavior, and focus treatments.
- `assets/ts/app.ts` provides the local mobile-navigation behavior. TypeScript compiles to an ES module in ignored `public/assets/build/`.
- Navigation items for modules not implemented yet are intentionally non-links.

The shell draws on common dashboard conventions (topbar, contextual sidebar, page heading, cards, and status chips) while using Morph-specific content and styles. It does not copy the Paces logo or wire its JavaScript, CSS, or plugins into the app.

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

1. Complete Identity and Workspace contracts and verify the Laragon web-SAPI before presenting an authenticated workspace context.
2. Add workspace-scoped navigation and overview only when those values come from trusted server-side services.
3. Build the Database Builder views incrementally: logical Database catalog, table/view navigation, then data grid and record details. A logical Database is not a physical PostgreSQL database.
4. Use Twig for server-rendered HTML; Datastar for server-driven state and HTML/SSE updates; TypeScript/Rocket only for browser behavior that benefits from a reusable client component.

The UI never grants access. Authentication, workspace membership, resource policy, validation, and persistence remain server-side. Client signals, route IDs, and DOM state are not authorization.

## Verification boundary

The TypeScript typecheck/build can be run with Node/npm. PHP/Composer and the Laragon web-SAPI are not available in the agent sandbox, so the Twig/PHP page still requires verification through the developer's local PHP runtime. The developer selected scoped non-superuser `morph03_app` for PHP runtime and `morph03_admin` for administration/provisioning; role existence and privileges remain unverified. This UI work does not configure credentials, create roles, change grants, or run schema DDL.
