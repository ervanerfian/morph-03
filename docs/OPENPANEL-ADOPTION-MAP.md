# OpenPanel-to-Morph Adoption Map

**Status:** user scope confirmed 2026-11-03; first server-rendered dashboard-builder preview added. Full product implementation remains pending.

## Confirmed scope

OpenPanel remains the normative UI/UX reference for all Morph UI, blocks, elements, and interactions. The user clarified that Morph should adopt OpenPanel's discoverable dashboard composition, options, and settings **for Morph's own Workspace/Database domain**.

- Keep the existing Morph stack: PHP Native/PDO, PostgreSQL 18, Twig, Datastar, and browser TypeScript compiled to native ESM. Node/npm remain development tools; no SPA runtime or bundler is added.
- Do not import or fork OpenPanel source/assets. Build Morph-owned implementation. OpenPanel's repository reports AGPL-3.0; code/asset reuse would require a separate license/provenance review.
- This is not a request to turn Morph into an analytics product. OpenPanel-specific event ingestion, analytics SDKs, funnels/cohorts, user/session analytics, session replay, A/B testing, analytics alerts, revenue analytics, and analytics integrations are outside the confirmed Morph scope unless the user reopens it.
- Morph's own authorization, Data Source identity, Field definitions, Table View presentation, and disclosure boundaries remain authoritative. A dashboard block or filter never grants data access.
- User-editable workspace design-token preferences remain a separate target capability. The preview reuses Morph's existing color/surface variables where available; it does not store or apply persistent theme preferences, and no database change is authorized.

## Reference snapshot and observed patterns

Reference snapshot: [OpenPanel `0d9a8970cd2f14e59337efb0da127e823fa5cc25`](https://github.com/Openpanel-dev/openpanel/tree/0d9a8970cd2f14e59337efb0da127e823fa5cc25), checked 2026-11-03.

The dashboard surface was reviewed through the upstream [dashboard list](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/apps/start/src/routes/_app.$organizationId.$projectId.dashboards.tsx), [dashboard detail](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/apps/start/src/routes/_app.$organizationId.$projectId.dashboards_.$dashboardId.tsx), [dashboard grid](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/apps/start/src/components/dashboard-grid.tsx), and [widget settings](https://github.com/Openpanel-dev/openpanel/blob/0d9a8970cd2f14e59337efb0da127e823fa5cc25/apps/start/src/routes/_app.$organizationId.$projectId.settings._tabs.widgets.tsx). The patterns to carry over are clear empty states with a next action, composable dashboard blocks, explicit presentation/options, filters and time controls, reorder/remove actions, contextual settings, and honest loading/empty/error/permission states.

## Morph mapping

| OpenPanel interaction pattern | Morph adaptation | Current status / boundary |
| --- | --- | --- |
| Dashboard list with an obvious create action and useful empty state | Workspace dashboards composed from registered Morph block capabilities | Builder UI preview exists; authenticated dashboard catalog and persistence do not. |
| Add, remove, and reorder dashboard reports | Add, remove, and reorder typed blocks that reference authorized Morph Data Sources and Table Views | Preview changes use allowlisted URL state only; they are not saved. |
| Report type, interval, breakdown, and display configuration | A block capability exposes a versioned configuration contract for its supported Data Source, Fields, filters, and presentation | Initial catalog metadata is present; there are no live Data Source/Field choices or query execution yet. |
| Date range and global filters | Morph date/window and Field filters, with server validation and authorization before querying | Preview period selection changes UI state only. Filter application awaits the data and authorization modules. |
| Widget settings with toggles and optional settings | Settings are derived from trusted registered capabilities; unsupported options are not rendered as active controls | Requirements are shown as pending until a workspace and source exist; no setting is persisted. |
| Share, embed, delete, success/error feedback | Morph-specific policy: explicit recipient/share permission; destructive confirmations; feedback only after a real server result | Not implemented. Do not claim a save/share/delete succeeded in a preview. |

Block definitions are trusted server-side metadata contributed through `DashboardBlockCatalog`. The registry is extensible by application modules; user configuration may select registered capability IDs and validated settings, but cannot register executable handlers, supply SQL, or override permission checks.

## First implementation slice

`GET /dashboards` renders a clear empty catalog and links to `GET /dashboards/preview`, the Morph-owned builder preview. The user can add blocks from the trusted catalog, change their presentation, reorder/remove them, and choose preview period/card density. The state is accepted only from known IDs and enums and is encoded in the URL. The provided controls collect no free text, credentials, workspace data, or record data; they only submit registered block/presentation IDs and preview enums. A preview-only block-count bound protects the builder route and is not a Morph product limit.

This route is not authenticated and has no persistence or data source. Its blocks intentionally show empty/configuration-required states rather than invented metrics. “Save dashboard” and source-dependent filters remain unavailable until server-side Identity/Workspace, Data Source access, and dashboard persistence are implemented. The route is a first UI slice, not a claim of complete OpenPanel parity.
