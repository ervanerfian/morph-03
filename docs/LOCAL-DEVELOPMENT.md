# Morph Space — Local Development Environment

**Status:** PostgreSQL identity and Windows CLI PDO connection verified by the developer; a read-only catalog check found `morph03_app` absent. Laragon web-SAPI integration remains unverified.
**Recorded:** 2026-11-02
**Project:** `morph-03` (`C:\laragon\www\morph-03`)

## Selected PostgreSQL instance

The developer selected the existing Windows-native PostgreSQL 18 service, not the PostgreSQL 16 container used by `morph-01`.

| Property | Verified value |
| --- | --- |
| Service | `postgresql-x64-18` |
| Host | `127.0.0.1` |
| Port | `5433` |
| Server version | PostgreSQL `18.3` |
| Database | `morph_03` |
| Verified login role | `morph03_admin` |
| Database owner | `morph03_admin` |
| `LOGIN` | Yes |
| `SUPERUSER` | Yes |
| `CREATEDB` | Yes |
| `CREATEROLE` | Yes |
| `REPLICATION` | Yes |
| `BYPASSRLS` | Yes |

The identity and role flags were returned by a successful PostgreSQL query run by the developer against `127.0.0.1:5433/morph_03`. This proves the `psql` connection identity; it does **not** yet prove a PHP/PDO connection or application-level integration.

## Application connection status

The developer reports that `pdo_pgsql` and `pgsql` are loaded. The CLI binary discovered on Windows is `C:\php\php.exe`, PHP `8.4.10`; it has not yet been confirmed as Laragon's selected web PHP runtime. A successful PDO connection was verified with this CLI binary to `127.0.0.1:5433/morph_03` as `morph03_admin`; it returned PostgreSQL `18.3`, port `5433`, and exit code `0`. HeidiSQL also connected successfully to the same endpoint. This is CLI/PDO integration evidence, not proof of Laragon's Apache/Nginx web SAPI PHP configuration. The preceding stdin and `php -r` attempts failed before connecting and made no database changes. Verify the actual Laragon web PHP runtime before claiming browser-to-PHP-to-PostgreSQL integration.

The commands shared so far created or updated `morph03_admin` and created `morph_03`; they did not create `morph03_app`. In a later read-only catalog check against `morph_03`, the developer found no `morph03_app` role. The membership and table-grant queries returned no rows; the absent role's effective privilege columns were `NULL`. The queries ran in a `READ ONLY` transaction followed by `ROLLBACK`; no database changes were made.

**Role decision (2026-11-02):** the developer selected `morph03_app` as PHP's scoped, non-superuser runtime role; `morph03_admin` is reserved for administration/provisioning and is a superuser. The read-only check found `morph03_app` absent, so it cannot currently be used or verified as the PHP role. This finding does not authorize role creation or grants. No role creation, grant, DDL, or credential change has been performed; do not configure the superuser in PHP. Any future provisioning requires explicit authorization and review of [DATABASE-ROLE-PRIVILEGE-PLAN.md](DATABASE-ROLE-PRIVILEGE-PLAN.md). Never store local credentials in Git or this document.

## Isolation and safety

- `morph-03` uses the Windows PostgreSQL 18 service at port `5433`.
- `morph-01` and its Docker PostgreSQL 16 instance at port `5434` are out of scope and must remain untouched.
- Do not use a physical PostgreSQL database per Morph logical Database/template; logical data instances live inside the project database.
- Do not execute schema DDL against the local Windows instance from the agent sandbox. Review and verify any schema changes according to `docs/CONNECTION.md` and the database design documents first.
- No password, `.env`, or credential material belongs in tracked files.
