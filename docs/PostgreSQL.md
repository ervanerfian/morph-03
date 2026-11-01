# DEVELOPMENT INFRASTRUCTURE — MASTER CONFIGURATION

**Status:** ACTIVE  
**Platform:** Windows 11  
**Container Runtime:** Docker Desktop  
**Primary Database Standard:** PostgreSQL 18  
**Infrastructure Ownership:** Developer  
**Applies To:** ALL AI coding agents, IDE assistants, CLI agents and development tools.

---

# 1. ADMINISTRATIVE DATABASE CREDENTIALS

## PostgreSQL Docker — Existing Morph Infrastructure

This is the administrator account that has already been verified.

| Configuration | Value |
|---|---|
| Database Superuser | `morph_admin` |
| Password | `morph123` |
| Privilege | SUPERUSER |
| CREATEDB | YES |
| CREATEROLE | YES |
| REPLICATION | YES |
| BYPASSRLS | YES |
| Database | `morph` |
| Host | `127.0.0.1` |
| Port | `5434` |
| Container | `morph-db` |
| Container ID | `821f0166aa8a` |
| Image | `postgres:16-alpine` |

**IMPORTANT:** `morph_admin` is the actual PostgreSQL SUPERUSER. The role `postgres` DOES NOT EXIST in this container.

Do not assume the default PostgreSQL username is `postgres`.

### Administrator login

From Windows PowerShell:

```powershell
docker exec -it morph-db psql -U morph_admin -d morph
```

From external database clients:

```text
Host:     127.0.0.1
Port:     5434
Database: morph
Username: morph_admin
Password: morph123
```

### Application account

| Configuration | Value |
|---|---|
| Username | `morph_app` |
| Password | `morph_app123` |
| Database | `morph` |
| Host | `127.0.0.1` |
| Port | `5434` |

Application account is NOT a superuser.

Use `morph_admin` for authorized database administration and `morph_app` for application operations.

These credentials are for the existing local development environment only. Do not reuse them in production.

---

# 2. PHYSICAL POSTGRESQL INSTALLATION PATHS

The following Windows PostgreSQL installations have been identified.

## PostgreSQL 17

```text
Installation:
C:\Program Files\PostgreSQL\17

Binary:
C:\Program Files\PostgreSQL\17\bin

Data Directory:
C:\Program Files\PostgreSQL\17\data

Configuration:
C:\Program Files\PostgreSQL\17\data\postgresql.conf

Authentication:
C:\Program Files\PostgreSQL\17\data\pg_hba.conf

Windows Service:
postgresql-x64-17

Port:
5432
```

## PostgreSQL 18

```text
Installation:
C:\Program Files\PostgreSQL\18

Binary:
C:\Program Files\PostgreSQL\18\bin

Data Directory:
C:\Program Files\PostgreSQL\18\data

Configuration:
C:\Program Files\PostgreSQL\18\data\postgresql.conf

Authentication:
C:\Program Files\PostgreSQL\18\data\pg_hba.conf

Windows Service:
postgresql-x64-18

Port:
5433
```

Both Windows services were verified as RUNNING during the infrastructure inspection.

**IMPORTANT:** PostgreSQL 17 and PostgreSQL 18 are separate installations with independent databases, roles, passwords and configurations.

Do not confuse these installations with the Docker PostgreSQL instance.

---

# 3. DOCKER POSTGRESQL INFRASTRUCTURE

Existing Docker database:

```text
Container Name:
morph-db

Container ID:
821f0166aa8a

Image:
postgres:16-alpine

Host Port:
5434

Container Port:
5432

Database:
morph

Superuser:
morph_admin

Application User:
morph_app
```

### Docker commands

Inspect container:

```powershell
docker ps -a
```

Inspect configuration:

```powershell
docker inspect morph-db
```

Open administrator shell:

```powershell
docker exec -it morph-db psql -U morph_admin -d morph
```

Check PostgreSQL version:

```powershell
docker exec morph-db psql -U morph_admin -d morph -c "SELECT version();"
```

### Physical storage warning

The Docker container uses Docker Desktop storage.

The exact physical Windows path of its PostgreSQL data volume has NOT YET BEEN VERIFIED.

Do not invent a Windows filesystem path for this database.

Inspect actual mounts using:

```powershell
docker inspect morph-db --format '{{json .Mounts}}'
```

Inspect Docker storage configuration using:

```powershell
docker info
```

Do not delete or recreate its persistent storage without explicit authorization.

---

# 4. CURRENT PROJECT CONFIGURATION

Morph-DB project location:

```text
C:\laragon\www\morph-01
```

Environment file:

```text
C:\laragon\www\morph-01\.env
```

Currently verified database connection:

```ini
DATABASE_URL=postgresql://morph_app:morph_app123@localhost:5434/morph?sslmode=disable
```

Example environment file:

```text
C:\laragon\www\morph-01\.env.example
```

The actual `.env` configuration takes precedence over `.env.example`.

Never assume `.env.example` reflects the currently running infrastructure.

---

# 5. DATABASE VERSION POLICY

Approved target database standard:

**PostgreSQL 18**

All new development projects must target PostgreSQL 18 unless explicitly authorized otherwise.

Existing PostgreSQL 16 Morph-DB infrastructure must not be silently replaced.

Migration from PostgreSQL 16 to PostgreSQL 18 requires:

1. Verified backup.
2. Schema compatibility inspection.
3. Role and privilege migration.
4. Data migration.
5. Application connection verification.
6. Migration and test suite verification.

Do not uninstall existing Windows PostgreSQL installations before dependency and database audits.

---

# 6. UUID POLICY

Use PostgreSQL native UUID generation.

Approved:

```sql
id UUID PRIMARY KEY DEFAULT gen_random_uuid()
```

Prohibited unnecessary dependency:

```sql
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
```

Do not use:

```sql
uuid_generate_v4()
```

PostgreSQL 16 and PostgreSQL 18 already support native `gen_random_uuid()`.

Do not require CREATE EXTENSION privilege for ordinary UUID v4 generation.

---

# 7. PERMISSION AND ROLE POLICY

The verified administrative role is:

```text
morph_admin
```

It is a SUPERUSER.

The application role is:

```text
morph_app
```

It is NOT a SUPERUSER.

For authorized administration, use `morph_admin`.

For application operations, use the dedicated application role.

Never assume that the application role has administrative privileges.

Do not repeatedly attempt administrative operations using `morph_app` when the operation requires elevated privileges.

Example administrative verification:

```sql
SELECT
    current_user,
    current_database(),
    rolsuper
FROM pg_roles
WHERE rolname = current_user;
```

---

# 8. AI AGENT MANDATORY RULES

Every AI agent must read this document before performing database or infrastructure operations.

AI agents MUST:

1. Inspect existing infrastructure before creating anything.
2. Use the documented administrator account for authorized administration.
3. Use the actual verified database endpoint.
4. Inspect actual `.env` configuration.
5. Use the physical paths documented here when accessing Windows PostgreSQL installations.
6. Distinguish Windows PostgreSQL services from Docker PostgreSQL.
7. Verify database version before executing version-dependent SQL.
8. Use `gen_random_uuid()` instead of introducing unnecessary UUID extensions.
9. Verify privileges before attempting administrative operations.
10. Report actual results instead of assuming successful execution.

AI agents MUST NOT:

- Assume a `postgres` role exists in the Docker container.
- Assume all PostgreSQL instances use the same credentials.
- Invent installation directories or data paths.
- Create additional PostgreSQL instances without approval.
- Change ports without approval.
- Delete containers or persistent volumes without approval.
- Reset credentials without approval.
- Run destructive migrations without approval.
- Silently modify database authentication policies.
- Grant SUPERUSER to ordinary application accounts.

---

# 9. INFRASTRUCTURE AUTHORITY

The developer owns all infrastructure decisions.

AI agents may inspect, develop, configure and operate authorized resources.

AI agents must not independently expand or replace the infrastructure.

If a permission error occurs:

1. Identify the actual connected database.
2. Identify the current database role.
3. Determine the missing privilege.
4. Identify the documented administrator.
5. Explain the required operation.
6. Use the administrator only when authorized.

Do not repeatedly ask the developer to discover information already documented in this file.

Do not ask the developer to repeat database credentials or installation paths already provided here.

---

# 10. FINAL AUTHORITY

This document is the operational reference for local development infrastructure.

When project-specific instructions conflict with this document, stop and report the conflict.

Do not silently invent alternative infrastructure.

**One infrastructure standard. Known administrator credentials. Known installation paths. Explicit permissions. No unnecessary infrastructure duplication.**

---

**END OF MASTER CONFIGURATION**
