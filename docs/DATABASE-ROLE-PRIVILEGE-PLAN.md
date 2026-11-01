# Morph-03 Runtime Database Role & Privilege Plan

**Status:** proposed access boundary for review; no SQL, role creation, grants, or DDL have been executed.
**Updated:** 2026-11-02
**Scope:** Morph-03 only — Windows-native PostgreSQL 18 at `127.0.0.1:5433`, database `morph_03`. This plan does not apply to the separate Morph-01 PostgreSQL 16 container.

## Selected role boundary

- PHP runtime uses `morph03_app`, a scoped non-superuser role.
- `morph03_admin` is reserved for administration/provisioning. It is a cluster superuser and bypasses RLS; never put it in the PHP runtime environment.
- The existence, membership, attributes, and current privileges of `morph03_app` have not been queried. The plan below is not a claim that the role exists or is correctly configured.

## Minimum privileges for the current foundation

The current `SystemModule` exposes `/readyz`, whose `DatabaseHealthCheck` runs only a read-only query of built-in PostgreSQL identity/version functions. The current application has no business tables, migrations, or database writes. For this slice, the runtime role needs:

- `LOGIN` and effective `CONNECT` to `morph_03`.
- No schema `CREATE`, table DML, sequence, or function grants for the health check.
- No `SUPERUSER`, `CREATEDB`, `CREATEROLE`, `REPLICATION`, or `BYPASSRLS` attributes, and no membership path that grants administrative capability.
- It should not own the database, application schema, or application tables. Ownership and provisioning stay outside the PHP runtime process.

PostgreSQL may grant `CONNECT` through `PUBLIC`; inspect effective privilege first. If `morph03_app` already has the needed access, do not add a redundant grant. Do not grant schema/table access merely to make `/readyz` pass.

## Later application tables

No Identity/Workspace schema has been approved. Once its schema and RLS policy are reviewed, define the runtime grants against the exact objects: schema `USAGE` and only the required table DML, sequence, and function privileges. Do not grant runtime `CREATE`, `ALTER`, `DROP`, database ownership, or `BYPASSRLS`. Keep schema migration/provisioning in the approved administration channel, separate from PHP requests. Revisit this plan if a future capability demonstrates a concrete additional need.

## Read-only verification queries

Run these only after connecting to the declared `morph_03` database using the developer's authorized local administration session. They inspect catalog state and do not modify it. Do not include passwords or `.env` values in a report.

```sql
WITH expected_roles(role_name) AS (
    VALUES ('morph03_app'::name), ('morph03_admin'::name)
), target_database AS (
    SELECT oid, datname
    FROM pg_database
    WHERE datname = 'morph_03'
)
SELECT
    expected_roles.role_name,
    roles.rolname IS NOT NULL AS role_exists,
    roles.rolcanlogin,
    roles.rolsuper,
    roles.rolcreatedb,
    roles.rolcreaterole,
    roles.rolreplication,
    roles.rolbypassrls,
    target_database.datname AS database_name,
    CASE
        WHEN roles.oid IS NOT NULL AND target_database.oid IS NOT NULL
        THEN has_database_privilege(roles.oid, target_database.oid, 'CONNECT')
    END AS can_connect,
    CASE
        WHEN roles.oid IS NOT NULL AND target_database.oid IS NOT NULL
        THEN has_schema_privilege(roles.oid, 'public', 'USAGE')
    END AS public_schema_usage,
    CASE
        WHEN roles.oid IS NOT NULL AND target_database.oid IS NOT NULL
        THEN has_schema_privilege(roles.oid, 'public', 'CREATE')
    END AS public_schema_create
FROM expected_roles
LEFT JOIN pg_roles AS roles
    ON roles.rolname = expected_roles.role_name
LEFT JOIN target_database
    ON TRUE
ORDER BY expected_roles.role_name;
```

Inspect memberships and any table grants separately:

```sql
SELECT member.rolname AS member_role, granted.rolname AS granted_role, membership.admin_option
FROM pg_auth_members AS membership
JOIN pg_roles AS member ON member.oid = membership.member
JOIN pg_roles AS granted ON granted.oid = membership.roleid
WHERE member.rolname = 'morph03_app'
ORDER BY granted.rolname;

SELECT table_schema, table_name, privilege_type
FROM information_schema.role_table_grants
WHERE grantee = 'morph03_app'
ORDER BY table_schema, table_name, privilege_type;
```

If `morph03_app` does not exist, the first query reports `role_exists = false` and effective privileges as `NULL`; that is an observation, not authorization to create the role. Review the actual output and the approved schema before proposing any change.

## Verification boundary

No query above has been run by the agent. No local database connection, credential, role, grant, schema, or `.env` has been changed. PHP's current PDO identity remains configured from the developer's untracked local environment and has not been re-verified as `morph03_app`.
