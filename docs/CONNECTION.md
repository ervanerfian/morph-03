---
title: "CONNECTION - Local Development Connection Standard"
category: "Operasional"
order: 8
icon: "plug"
summary: "Kontrak operasional sumber kebenaran untuk koneksi Postgres lokal (Windows + Docker Desktop) - discovery, verification, dan change management."
updated: "2026-10-25"
---

# Local Development Connection Standard

## Windows + Docker Desktop + PostgreSQL

**Status:** Canonical
**Purpose:** Operational source of truth for AI coding agents and developers
**Scope:** PHP, Laravel, Nuxt, Node.js and other local web projects
**Environment:** Windows + Docker Desktop + PostgreSQL

> **Flexibility Note:** Contoh `nexaflow` di dokumen ini HANYA placeholder. Ganti dengan nama project aktual kamu (`morph-01`, `crm`, `erp`, `pm`, dll.). Prinsip `HOST+PORT+DATABASE+USER+PASSWORD` berlaku universal - bukan terikat ke `nexaflow`.
> Konvensi penamaan project-spesifik: `database: <project>`, `app role: <project>_app`, `container: <project>-db` - lihat §24.

---

## HOW TO USE THIS DOCUMENT

This document has two layers:

- **PART I - THE CORE CONTRACT** is short and MUST always be applied, in full, for every database-related task. It contains the mental model, the source-of-truth priority and the non-negotiable MUST / MUST NOT rules.
- **PARTS II–IX** are the operational runbook. Consult them for the concrete commands, procedures, standards and error catalog that implement the contract.

An AI coding agent MUST treat this document as an operational contract. It MUST NOT guess the environment and MUST NOT begin work by randomly attempting commands such as `npm run migrate`, `php artisan migrate`, `psql ...`, or `docker exec ...` before establishing which exact PostgreSQL instance the project uses.

Throughout this document, **MUST / MUST NOT** denote absolute requirements and **SHOULD** denotes a strong recommendation that may be deviated from only with a stated reason.

---

# PART I - THE CORE CONTRACT

## 1. Purpose

This document is the mandatory standard operating procedure for local development projects that use PostgreSQL on Windows. It exists to prevent recurring failures caused by ambiguity between:

Windows-native PostgreSQL, Docker PostgreSQL, Docker Desktop, Docker Engine, Docker containers, Docker Compose services, host ports, container ports, PostgreSQL roles/users, PostgreSQL passwords, databases, schemas, application credentials, `.env`, migrations and application runtime.

## 2. The Fundamental Rule

Every database operation MUST follow:

```text
DISCOVER -> IDENTIFY -> VERIFY -> DECLARE -> CONNECT -> CREATE / CHANGE -> VERIFY AGAIN
```

Never:

```text
GUESS -> TRY -> FAIL -> CHANGE RANDOM THING -> TRY AGAIN
```

An AI agent is expected to behave like an experienced system administrator, not like a trial-and-error script. When in doubt: do not guess, do not try randomly, do not reset, do not delete, do not migrate. Instead: inspect, identify, verify, report, then act.

## 3. The Connection Identity Model

The question is never _"Is PostgreSQL installed?"_ The question is always:

```text
"Which exact PostgreSQL instance does this project use?"
```

A PostgreSQL connection is identified by exactly one identity:

```text
HOST + PORT + DATABASE + USER + PASSWORD
```

One Windows machine can contain multiple independent PostgreSQL instances (see Part II). Never reason about "PostgreSQL" in the abstract.

### The canonical identity query

Referred to throughout this document as **the identity query**:

```sql
SELECT
    current_database(),
    current_user,
    inet_server_addr(),
    inet_server_port(),
    version();
```

It answers: which database, which user, which server, which port, which PostgreSQL version. Any verification step below that says "run the identity query" means this exact query.

## 4. Source of Truth Priority

When information conflicts, use this priority:

1. Actual PostgreSQL server identity (the identity query)
2. Actual Docker container/configuration
3. Actual project `.env`
4. Actual Compose configuration (`docker compose config`)
5. Application configuration
6. Project documentation (including this file and port registries)
7. Agent assumptions - **which must never override actual evidence**

Documentation describes intended state. The operating system, Docker and PostgreSQL itself provide actual state.

## 5. AI Agent Prohibitions

The AI MUST NOT:

- guess a password, username, database name, port, container name, or Compose service name
- guess whether PostgreSQL runs in Docker or Windows, or that `localhost` means Docker
- guess that host port 5432 is available
- guess that `POSTGRES_PASSWORD` in Compose is the current password of an initialized cluster
- guess that a running container means PostgreSQL is ready
- delete volumes to fix connection problems
- change PostgreSQL major versions without explicit intent
- stop unrelated Windows PostgreSQL services
- kill unknown processes occupying ports
- run migrations against an unverified database
- change credentials merely to make a connection attempt work
- switch package managers arbitrarily
- invent migration commands
- blindly grant superuser privileges
- print real secrets into logs, diagnostics, documentation, or chat output

## 6. AI Agent Obligations

The AI MUST:

- inspect before modifying
- identify before connecting
- verify before migrating
- preserve existing state
- use existing credentials and project configuration when valid
- use the existing migration workflow
- verify port ownership before assigning or changing ports
- verify PostgreSQL identity and application identity
- verify again after every change
- redact secrets in all output
- ask the developer when required information cannot be established from evidence

## 7. The One-Sentence Contract

> **Never guess which PostgreSQL is being used; prove the exact Docker/container/service/host-port/database/user/credential identity first, connect to that verified identity, perform the requested operation and verify the result against the same identity afterward.**

---

# PART II - ENVIRONMENT MODEL

## 8. Docker Is Not PostgreSQL

This distinction is mandatory:

```text
Docker Desktop -> Docker Engine -> Container -> PostgreSQL server -> roles -> databases
```

Docker manages the container. PostgreSQL manages users/roles, passwords, databases, schemas, tables and permissions. Docker credentials and PostgreSQL credentials are NOT the same concept and they live behind separate authentication boundaries.

## 9. The Three Access Layers

The agent MUST distinguish these layers and never use success at one layer as proof of another:

| Layer                                | Example                                                             | Question answered                       |
| ------------------------------------ | ------------------------------------------------------------------- | --------------------------------------- |
| 1 - Docker access                    | `docker ps`                                                         | Can this machine talk to Docker Engine? |
| 2 - PostgreSQL administrative access | `docker compose exec db psql -U <ADMIN_USER> -d postgres`           | Can we administer PostgreSQL?           |
| 3 - Application database access      | `DATABASE_URL=postgresql://app_user:password@localhost:5434/app_db` | Can the application reach its database? |

Layer 1 needs no PostgreSQL password. Layer 3 SHOULD use an application-specific role, never a superuser (see §27).

## 10. Standard Local Architecture

The preferred architecture for new projects:

```text
Windows
├── Docker Desktop -> Docker Engine -> Project PostgreSQL container (internal port 5432, project volume)
├── Project application (PHP Native / Laravel / Nuxt / Node.js)
└── Optional Windows-native PostgreSQL (may exist independently)
```

The project PostgreSQL MUST be isolated inside Docker unless the project explicitly requires another architecture.

## 11. Multiple Instances Are Normal - Identity Is Not

A valid machine may run, simultaneously:

```text
Windows PostgreSQL 17 -> localhost:5432
Windows PostgreSQL 18 -> localhost:5433
Docker PostgreSQL     -> localhost:5434 -> container:5432
```

There is nothing wrong with this. The problem is never the number of instances; the problem is not knowing which one the application uses.

Two consequences:

- **Same username ≠ same user.** `postgres` (or `<project>_app` - contoh `nexaflow_app`) on the Windows cluster and on the Docker cluster are unrelated accounts with unrelated passwords. Roles belong to a specific cluster.
- **Same database name ≠ same database.** `<project>` (contoh `nexaflow`/`morph`) on Windows PostgreSQL and `<project>` inside Docker are two completely different databases. Identity always means the full HOST + PORT + DATABASE + USER tuple.

## 12. Host Port vs Container Port

Given:

```yaml
ports:
  - "5434:5432"
```

the mapping is `localhost:5434` (Windows host) -> `PostgreSQL:5432` (container). Therefore:

- An application running **directly on Windows** connects to `localhost:5434`.
- An application running **inside the same Compose network** connects to `db:5432` (service name + internal port). It MUST NOT use `localhost:5434` - inside a container, `localhost` means that container itself.

**Windows hostname caveat:** on Windows, `localhost` may resolve to IPv6 `::1` while Docker publishes on IPv4 `127.0.0.1` (or vice versa). If a correct-looking `DATABASE_URL` still fails, test `127.0.0.1` explicitly and compare with `localhost` before changing anything else.

## 13. Containers Are Disposable; Volumes Are the State

PostgreSQL data normally lives in a Docker volume:

```yaml
volumes:
  - project-postgres-data:/var/lib/postgresql/data
```

Therefore `docker compose down` followed by `docker compose up -d` does NOT produce a fresh database: the volume preserves databases, roles, passwords, tables, data and migration state.

**Version caveat:** the official `postgres` image for PostgreSQL 18+ changed its data layout (the data directory moved under `/var/lib/postgresql` with a versioned `PGDATA` subdirectory). Always check the image documentation for the project's pinned major version before choosing the volume mount path and never change an existing project's PostgreSQL major version without explicit intent.

### `POSTGRES_*` variables are bootstrap-only

The official image accepts `POSTGRES_DB`, `POSTGRES_USER`, `POSTGRES_PASSWORD`. These initialize the cluster **on first container start with an empty data directory only**. Changing `POSTGRES_PASSWORD` in Compose does NOT change the password of an already-initialized cluster. Compose environment and current PostgreSQL credentials must never be assumed identical merely because the variable exists.

Also note: the role named by `POSTGRES_USER` becomes the cluster **superuser**. In this standard's examples, `nexaflow_admin` is therefore a superuser - it is an administrative role, not a least-privilege role.

---

# PART III - DISCOVERY PROCEDURES

## 14. Discovery Order

Before creating, connecting, or changing anything, discover in this order: Docker Engine -> Compose configuration -> containers -> Windows PostgreSQL services -> listening ports and their owners -> credentials (from project files, never guessed). Record the results as a port/instance mapping, for example:

```text
5432 -> Windows PostgreSQL 17
5433 -> Windows PostgreSQL 18
5434 -> Docker project A
5435 -> Docker project B
```

That mapping is evidence. Everything after it builds on it.

## 15. Discover Docker

```powershell
docker --version
docker compose version
docker info
```

If `docker info` fails, stop database troubleshooting - Docker itself must be repaired first.

## 16. Discover Containers

```powershell
docker ps -a --format "table {{.Names}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}"
docker ps -a | Select-String -Pattern "postgres|postgis"
```

Do NOT assume the container is named `postgres`. It may be `nexaflow-db`, `native-postgres-1`, `project-postgres`, `crm-db`, etc. The actual name MUST be discovered.

## 17. Discover Compose Configuration

Look for `compose.yml`, `compose.yaml`, `docker-compose.yml`, or `docker-compose.yaml` in the project. Inspect the effective configuration - after variable substitution - with:

```powershell
docker compose config
```

Prefer this over reading the raw file, because it reveals what Compose will actually do.

## 18. Discover Windows PostgreSQL

```powershell
Get-Service |
    Where-Object { $_.Name -match "postgres" -or $_.DisplayName -match "postgres" } |
    Format-Table Status,Name,DisplayName
```

Results such as `postgresql-x64-17` or `postgresql-x64-18` indicate Windows-native PostgreSQL services. DO NOT stop them merely because they exist - they may belong to other applications or projects.

## 19. Discover Listeners and Port Owners

List all listeners in the PostgreSQL range:

```powershell
Get-NetTCPConnection -State Listen |
    Where-Object { $_.LocalPort -ge 5432 -and $_.LocalPort -le 5500 } |
    Sort-Object LocalPort |
    Format-Table LocalAddress,LocalPort,OwningProcess
```

For a specific port and its owner:

```powershell
Get-NetTCPConnection -LocalPort 5434 -State Listen -ErrorAction SilentlyContinue
Get-Process -Id <PID>
netstat -ano | findstr :5434
```

The agent MUST determine who owns a port before assigning, using, or freeing it. Do not simply change ports until something works and never kill an unknown process.

## 20. Credential Discovery Order

When credentials are unknown, search in this order:

1. `.env`
2. `.env.local`
3. `.env.development`
4. Compose files
5. Docker environment configuration
6. Project documentation
7. Framework configuration
8. Existing setup scripts
9. PostgreSQL role inspection (`\du` via an administrative connection)
10. Ask the developer

Never guess `postgres/postgres`, `password`, `admin`, `123456`, or similar. Never randomly reset a password (for the sanctioned reset procedure, see §54).

If credentials cannot be established from any of the above, the agent MUST report:

```text
The PostgreSQL credentials for the intended project could not be
established from the available configuration.
```

and then ask the developer for the missing information OR obtain explicit permission to establish new local-development credentials.

## 21. Required Diagnostic Snapshot

When a database problem occurs, collect:

```powershell
Write-Host "=== SYSTEM ==="
node --version
npm --version

Write-Host "=== PHP ==="
php --version

Write-Host "=== COMPOSER ==="
composer --version

Write-Host "=== DOCKER ==="
docker --version
docker compose version
docker info

Write-Host "=== CONTAINERS ==="
docker ps -a --format "table {{.Names}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}"

Write-Host "=== POSTGRES WINDOWS SERVICES ==="
Get-Service |
    Where-Object { $_.Name -match "postgres" -or $_.DisplayName -match "postgres" } |
    Format-Table Status,Name,DisplayName

Write-Host "=== POSTGRES PORTS ==="
Get-NetTCPConnection -State Listen |
    Where-Object { $_.LocalPort -ge 5432 -and $_.LocalPort -le 5500 } |
    Sort-Object LocalPort |
    Format-Table LocalAddress,LocalPort,OwningProcess

Write-Host "=== PROJECT FILES ==="
Get-ChildItem -Force
```

Then inspect, as applicable: `.env`, `.env.example`, `compose.yml` / `compose.yaml` / `docker-compose.yml` / `docker-compose.yaml`, `package.json`, `composer.json`, `drizzle.config.ts`, `prisma/schema.prisma`, `config/database.php`, `database/migrations`.

Inspect secrets locally only. Never print actual passwords into diagnostic reports - always redact (§22).

## 22. Secret-Redacted Reporting

Bad:

```text
DATABASE_URL=postgresql://nexaflow_app:MyRealPassword@localhost:5434/nexaflow
```

Correct:

```text
DATABASE_URL=postgresql://nexaflow_app:[REDACTED]@localhost:5434/nexaflow
Credential source: .env
Credential value: verified
Credential: [REDACTED]
```

---

# PART IV - PROJECT STANDARD

## 23. One Project = One Declared Database Environment

For new projects, the default rule is:

```text
ONE PROJECT -> ONE PostgreSQL Docker service -> ONE database -> ONE application role -> ONE project-specific credential
```

Example (used throughout this document):

```text
Project: <project> (contoh: nexaflow/morph-01)  Docker service: db  Container: <project>-db (contoh: nexaflow-db/morph-pg)
Database: <project> (contoh: nexaflow/morph)  Application role: <project>_app (contoh: nexaflow_app/morph_app)
Host port: 5434       Container port: 5432  ← ganti host port per project, container port tetap 5432
```

Project lain pakai nama & host port sendiri (contoh: `crm` -> `crm-db`/`crm_app` :5435, `morph-01` -> `morph-pg`/`morph_app` :5434 - pilih yang free via §19). The internal PostgreSQL port stays 5432 for every project; only the host port changes.

## 24. Naming Standard

Untuk project `<project>` (contoh `nexaflow`, `morph-01`, `crm`), prefer: `database: <project>`, `application role: <project>_app`, `service: db`, `container: <project>-db` (contoh: `nexaflow`->`nexaflow-db`, `morph`->`morph-pg`). Avoid generic names such as `database`, `postgres`, `user`, `admin`, or `test` when multiple projects coexist - project-specific naming prevents ambiguity.

## 25. Port Policy and Registry

Port 5432 is PostgreSQL's conventional default; it is NOT a mandatory project port and a new Docker project MUST NOT assume `localhost:5432` is available. Each project MUST have a declared host port, allocated only after the discovery procedure in §19 proves it free (recommended scheme: 5434, 5435, 5436, ...).

For a multi-project machine, maintain a registry:

```text
Project        PostgreSQL Host Port   ← contoh, ganti dengan project kamu
------------------------------------
<project> (nexaflow)  5434
morph-01       5434   # contoh lokal kita
crm            5435
crm            5435
erp            5436
pm             5437
native-core    5438
```

The registry is an organizational convention, not evidence. The actual mapping (`docker port <container>`) and the actual listener (`Get-NetTCPConnection`) remain authoritative (§4).

## 26. Compose Standard

A new project SHOULD follow this structure:

```yaml
services:
  db:
    image: postgres:16 # major version chosen deliberately and recorded
    container_name: ${PROJECT_NAME}-db # contoh: nexaflow-db / morph-pg - jangan hardcode
    restart: unless-stopped
    environment:
      POSTGRES_DB: ${POSTGRES_DB}
      POSTGRES_USER: ${POSTGRES_ADMIN_USER}
      POSTGRES_PASSWORD: ${POSTGRES_ADMIN_PASSWORD}
    ports:
      - "${POSTGRES_HOST_PORT}:5432"
    volumes:
      - project-postgres-data:/var/lib/postgresql/data # see §13 for postgres:18+ layout
    healthcheck:
      test: ["CMD-SHELL", "pg_isready -U ${POSTGRES_ADMIN_USER} -d ${POSTGRES_DB}"]
      interval: 5s
      timeout: 3s
      retries: 12

volumes:
  project-postgres-data:
```

Rules:

- Prefer `"5434:5432"` over `"5434:5434"` - PostgreSQL inside the official container stays on 5432; only the Windows host port changes.
- Include the healthcheck: this standard insists "container Up ≠ PostgreSQL ready", so the template must model readiness, not just process existence.
- Do not silently change an existing project's PostgreSQL major version.

## 27. The `.env` Contract

A project's configuration SHOULD be internally consistent and explicit, conceptually:

```env
POSTGRES_DB=<project>            # contoh: nexaflow / morph
POSTGRES_ADMIN_USER=<project>_admin  # contoh: nexaflow_admin / morph_admin
POSTGRES_ADMIN_PASSWORD=<local-secret>

POSTGRES_HOST=localhost
POSTGRES_HOST_PORT=<project_port>     # contoh: 5434 (cek free via §19)

APP_DB_USER=<project>_app            # contoh: nexaflow_app / morph_app
APP_DB_PASSWORD=<local-secret>

DATABASE_URL=postgresql://<project>_app:<encoded-secret>@localhost:<port>/<project>  # contoh: postgresql://nexaflow_app:***@localhost:5434/nexaflow
```

Exact variable names may differ by framework; internal consistency is what matters. The underlying identity must be explicit and reproducible even if the framework only reads `DATABASE_URL`.

### `DATABASE_URL` is derived, never invented

```text
DATABASE_URL = postgresql://APP_DB_USER:APP_DB_PASSWORD@POSTGRES_HOST:POSTGRES_HOST_PORT/POSTGRES_DB
```

Deriving it from the components prevents contradictory configuration. Canonical format:

```text
postgresql://USERNAME:PASSWORD@HOST:PORT/DATABASE
```

### URL-encode passwords

If the password contains URL-special characters (`@ : / ? # %`), it MUST be URL-encoded inside `DATABASE_URL`. Do not change the password merely because the URL was constructed incorrectly - encode the credential correctly.

### `.env.example` and secret hygiene

- The repository contains `.env.example` with the same keys and **empty values**; it MUST NOT contain real credentials.
- `.env` contains real local secrets and MUST NOT be committed, pasted into diagnostic output, included in documentation (including this file and README), or exposed through client-side configuration.

## 28. Credential Generation

For a NEW project, generate credentials deliberately - never depend on `postgres/postgres` or other universal passwords. Example (cryptographically secure, PowerShell):

```powershell
$bytes = New-Object byte[] 32
[Security.Cryptography.RandomNumberGenerator]::Create().GetBytes($bytes)
[Convert]::ToBase64String($bytes)
```

Store the result only in the local, untracked `.env`.

## 29. Database and Role Model

The application SHOULD NOT connect as `postgres` (or any superuser). Use a project-specific application role; the administrative role stays separate:

```text
PostgreSQL
├── <project>_admin   (superuser dari POSTGRES_USER - contoh: nexaflow_admin/morph_admin)
└── <project>_app     (application - contoh: nexaflow_app/morph_app)
```

Create the application role with its password taken from the project's local secret configuration:

```sql
CREATE ROLE <project>_app LOGIN PASSWORD 'REDACTED';  -- contoh: nexaflow_app / morph_app
```

Grant only the privileges the project actually needs:

```sql
GRANT CONNECT ON DATABASE <project> TO <project>_app;
-- inside the <project> database (contoh: nexaflow/morph):
GRANT USAGE, CREATE ON SCHEMA public TO <project>_app;
```

PostgreSQL versions and pre-existing databases differ in default ownership/privilege state - inspect before granting and never blindly grant every privilege to every role. Two acceptable ownership models:

- **Clean model:** `<project>_admin` (contoh: nexaflow_admin) owns/administers; `<project>_app` connects non-owner dengan grants.
- **Simple local-only model:** the application role owns the database.

Absolute rule: do not make the application a PostgreSQL superuser merely to make a migration error disappear.

## 30. The Project Must Be Bootstrappable

A new developer or AI agent should never need to guess credentials. The repository provides: `.env.example`, `compose.yaml`, a database initialization procedure, a migration procedure and this `CONNECTION.md`. Intended workflow:

```text
clone project -> copy .env.example -> .env -> generate/fill local credentials ->
validate port -> docker compose up -d -> verify PostgreSQL -> create/verify
application role -> create/verify database -> run migrations -> verify schema ->
run application
```

## 31. The Universal Connection Contract

Every project using PostgreSQL MUST ultimately be able to answer, in full:

```text
PROJECT:            <project> (contoh: morph-01 / nexaflow)
APPLICATION:        PHP Native / Nuxt / Laravel
RUNTIME:            Windows host | Docker | WSL
DOCKER SERVICE:     db
CONTAINER:          <project>-db (contoh: nexaflow-db / morph-pg)
POSTGRES VERSION:   16
HOST:               localhost
HOST PORT:          <port> (contoh: 5434)
CONTAINER PORT:     5432
DATABASE:           <project> (contoh: nexaflow / morph)
APPLICATION USER:   <project>_app
CREDENTIAL SOURCE:  .env
DATABASE URL:       postgresql://<project>_app:[REDACTED]@localhost:<port>/<project>
MIGRATION SYSTEM:   Drizzle
MIGRATION DIRECTORY:<verified project path>
```

---

# PART V - VERIFICATION

## 32. Starting Docker Is Not Authentication

`docker compose up -d` starts containers; it does not mean PostgreSQL authentication succeeded. `docker ps` means Docker sees the container; it does not mean PostgreSQL is ready, the database exists, the role exists, the password works, or the application can connect. Each of these is verified separately.

## 33. Readiness

After starting, check `docker ps`, then the logs:

```powershell
docker logs <container>
docker compose logs -f db    # to follow
```

Look for `database system is ready to accept connections`. If a healthcheck exists (the §26 template provides one):

```powershell
docker inspect <container> --format "{{json .State.Health}}"
```

A container being `Up` is not equivalent to PostgreSQL being ready.

## 34. Database Existence and Creation

Once the intended server is identified (Layer 2 access):

```powershell
docker compose exec db psql -U <ADMIN_USER> -d postgres
```

```sql
\l
-- or:
SELECT datname FROM pg_database ORDER BY datname;
```

Create the database only after server identity is verified:

```sql
CREATE DATABASE nexaflow;
```

Never create a database merely because "the name does not exist" on an unverified server - `nexaflow` on Windows PostgreSQL and `nexaflow` inside Docker are different databases (§11).

## 35. Role Verification

Inside `psql`:

```sql
\du
SELECT current_user;
```

The role must exist and the current user must correspond to the intended role.

## 36. Identity Verification

Run the identity query (§3) on every connection you rely on. When two PostgreSQL installations are difficult to distinguish, additionally:

```sql
SHOW data_directory;
```

to establish which cluster is actually being accessed.

## 37. Identify the Application Runtime First

Before writing `DATABASE_URL`, determine where the application process runs: Windows host, Docker container, WSL, or a remote service. The connection host depends on the answer:

- **Windows host (PHP Native, Laravel, Nuxt/Node running on Windows):**
  `DATABASE_URL=postgresql://<project>_app:SECRET@localhost:<port>/<project>` (contoh: nexaflow_app@5434/nexaflow)
- **Inside the same Compose network:**
  `DATABASE_URL=postgresql://<project>_app:SECRET@db:5432/<project>`

Do not use the Windows host port for container-to-container communication unless explicitly required. This determination MUST happen before configuring the connection.

## 38. TCP Testing - Necessary but Insufficient

For a Windows-host application:

```powershell
Test-NetConnection localhost -Port 5434
```

`TcpTestSucceeded : True` proves only that a TCP path exists. It does NOT prove the username, password, database, or privileges are correct, or that the application uses this connection. (See §12 for the `localhost` vs `127.0.0.1` caveat.)

## 39. Authentication Testing

If Windows has `psql`:

```powershell
psql -h localhost -p <port> -U <project>_app -d <project>  # contoh: -p 5434 -U nexaflow_app -d nexaflow
```

Enter the password interactively, then run the identity query.

If Windows does NOT have `psql`: do not install random software. The PostgreSQL Docker image contains `psql`, so use `docker compose exec db psql -U <USER> -d <DATABASE>`. To test the exact host TCP path, use the application's own database driver or an installed PostgreSQL client.

Note that these are different paths:

- `docker compose exec db psql ...` tests PostgreSQL from **inside** the container.
- `localhost:5434` tests PostgreSQL through the **host-published port**.

A successful `docker exec -> psql` does NOT prove `Windows application -> localhost:5434` works.

## 40. The Golden Connection Test

For a Windows-hosted application, the strongest validation is a full-chain test:

```text
Windows application -> DATABASE_URL -> localhost:<host-port> ->
Docker port mapping -> PostgreSQL -> database -> application role
```

executing the identity query and returning the expected identity.

### Proving two connections are the same

Run the identity query on connection A and on connection B and compare. If results differ, they are not the same PostgreSQL connection - regardless of both saying `localhost`.

## 41. Never Trust a Single Success Message

Each statement below proves exactly one thing and nothing more:

| Statement                | Proves                            |
| ------------------------ | --------------------------------- |
| Docker is running        | Docker works                      |
| Container is Up          | Container process exists          |
| PostgreSQL is ready      | Server accepts connections        |
| TCP connection succeeded | Network path works                |
| Authentication succeeded | User/password accepted            |
| Migration succeeded      | The migration operation completed |

None alone proves the complete application connection is correct.

## 42. Connection Verification Levels

| Level | Name                    | Meaning                                                |
| ----- | ----------------------- | ------------------------------------------------------ |
| 0     | Unknown                 | No evidence                                            |
| 1     | Docker verified         | Docker Engine available                                |
| 2     | PostgreSQL verified     | Container running, PostgreSQL ready                    |
| 3     | Network verified        | Host port reachable                                    |
| 4     | Authentication verified | PostgreSQL accepted credentials                        |
| 5     | Database verified       | Correct database exists                                |
| 6     | Application verified    | Application successfully queries the intended database |

Only LEVEL 6 means: **PROJECT DATABASE CONNECTION VERIFIED**.

## 43. Required AI Report Format

After diagnosing a database environment, the AI SHOULD report:

```text
DATABASE CONNECTION STATE
=========================

Project:            <project>
Application runtime: Windows host / Docker / WSL

Docker:
  Engine: AVAILABLE
  Compose: AVAILABLE

PostgreSQL:
  Container: <container>
  Image: <image>
  Status: RUNNING
  Readiness: READY

Connection:
  Host: localhost
  Host port: <port>
  Container port: 5432
  Service: db

PostgreSQL identity:
  Database: <database>
  User: <user>
  Server port: <port>
  Version: <version>

Credentials:
  Source: <.env / other>
  Status: VERIFIED
  Password: [REDACTED]

Application:
  DATABASE_URL: VERIFIED
  Driver/framework: <driver>

Schema:
  Migration system: <system>
  Migration state: VERIFIED
  Tables: VERIFIED

Overall: DATABASE CONNECTION VERIFIED
```

---

# PART VI - MIGRATIONS

## 44. Migration Is the Last Step, Not the First

Never begin troubleshooting with `php artisan migrate`, `npx drizzle-kit migrate`, or `npm run db:migrate`. First establish, in order: Docker -> container -> PostgreSQL -> port -> database -> role -> credentials -> DATABASE_URL -> application runtime. Only then run migrations.

## 45. Determine the Migration System

Inspect the project before running anything:

- **Node/Nuxt:** read `package.json`; inspect `drizzle.config.ts`, `prisma/schema.prisma`, migration directories.
- **Laravel:** read `composer.json`; inspect `database/migrations`, `config/database.php`, `.env`.
- **PHP Native:** inspect the project's own migration scripts, database bootstrap scripts, CLI tools.

Never invent migration commands.

## 46. Discover the Package Manager

For Node projects:

```powershell
Get-ChildItem package-lock.json, pnpm-lock.yaml, yarn.lock, bun.lock, bun.lockb -ErrorAction SilentlyContinue
```

Use the package manager established by the repository. Do not randomly switch between npm, pnpm, yarn, or bun.

## 47. Migration States Are Distinct

Distinguish: schema definition -> migration generation -> migration execution -> database schema -> migration history. A successful migration command does NOT by itself mean the expected schema exists in the database.

## 48. Verify After Migration

```sql
\dt
-- or:
SELECT table_schema, table_name
FROM information_schema.tables
WHERE table_schema NOT IN ('pg_catalog', 'information_schema')
ORDER BY table_schema, table_name;
```

Verify the expected tables and, if present, the migration history.

## 49. Never Re-run Migrations to Solve an Unknown Error

If migration succeeded but the application cannot see the table, DO NOT migrate again. Suspect first: wrong host, wrong port, wrong PostgreSQL instance, wrong database, wrong user, wrong schema, wrong DATABASE_URL. This is the most common "wrong PostgreSQL" failure pattern.

## 50. Pre-Migration Checklist

```text
[ ] Docker Engine available
[ ] Compose available
[ ] Intended PostgreSQL container identified
[ ] Intended Compose service identified
[ ] Container running
[ ] PostgreSQL ready
[ ] PostgreSQL version identified
[ ] Host port identified
[ ] Container port identified
[ ] Host port ownership verified
[ ] Windows PostgreSQL services inspected
[ ] Application runtime identified
[ ] Database name verified
[ ] Application role verified
[ ] Credential source verified
[ ] Password not guessed
[ ] DATABASE_URL verified (derived from components, URL-encoded)
[ ] TCP connectivity verified
[ ] PostgreSQL authentication verified
[ ] Database exists
[ ] Required privileges verified
[ ] Migration system identified
[ ] Migration command identified from project configuration
[ ] Migration directory identified
```

Only after all relevant checks pass: RUN MIGRATION.

## 51. Post-Migration Checklist

```text
[ ] Migration command completed
[ ] Expected database still selected
[ ] Expected PostgreSQL user confirmed
[ ] Expected PostgreSQL server confirmed
[ ] Expected tables exist
[ ] Expected schema exists
[ ] Migration history verified
[ ] Application can execute a database query
[ ] Application sees the same database that migration modified
```

---

# PART VII - OPERATIONS AND RECOVERY

## 52. Standard Start/Resume Procedure

When returning to a project (e.g. after shutting down the laptop):

```text
1. Open project
2. Read CONNECTION.md
3. Inspect Docker
4. Inspect Compose
5. Inspect PostgreSQL container
6. Verify volume
7. Verify host port
8. Verify Windows PostgreSQL listeners if relevant
9. Start required services (docker compose up -d)
10. Verify PostgreSQL readiness
11. Verify database
12. Verify role
13. Verify application connection
14. Start application
```

A restart is not a new project. Do NOT recreate the database, recreate the password, or delete the volume merely because Windows or Docker Desktop restarted.

## 53. Standard New-Project Procedure

```text
Create project -> choose PostgreSQL version -> choose database name ->
choose application role name -> generate local credentials (§28) ->
inspect Windows PostgreSQL services -> inspect available ports ->
allocate project host port -> create compose.yml (§26) -> create .env ->
start Docker PostgreSQL -> verify container -> verify readiness ->
verify database -> create/verify application role -> verify application
connection -> install/configure framework -> run migration ->
verify schema -> start application
```

## 54. Existing Projects and Credential Reset

If the project already has `.env`, `compose.yml`, a Docker volume, a database and migrations: do NOT treat it as a new project. Do not automatically change the database name, password, host port, PostgreSQL version, or volume. Existing configuration is authoritative unless there is a deliberate, declared change.

If credentials are genuinely lost and recovery through §20 fails, the sanctioned reset is a deliberate change under the change-management rules (§58), with the developer's explicit confirmation:

```powershell
docker compose exec db psql -U <ADMIN_USER> -d postgres
```

```sql
ALTER ROLE <project>_app WITH LOGIN PASSWORD 'NEW-GENERATED-SECRET';  -- contoh: nexaflow_app
```

Then update `.env`, re-derive `DATABASE_URL` and verify the application connection end-to-end (§40). This is a controlled change - never an improvised troubleshooting step.

## 55. Recovery Decision Ladder

When something fails, walk the ladder without skipping levels:

```text
Is Docker available? -> Is the intended container present? -> Is it running? ->
Is PostgreSQL ready? -> What host port is mapped? -> Who owns that port? ->
Where does the application run? -> What host should it use? -> What database? ->
What role? -> What credential? -> Can PostgreSQL authenticate? ->
Does the database exist? -> Does the role have privileges? -> Does the schema
exist? -> Does the application use the same identity?
```

## 56. Port Conflicts

If Docker reports `port is already allocated`: do NOT kill random processes. Identify the owner (§19), determine why it runs and whether another project depends on it and only then act.

Preferred solution when `localhost:5432` is occupied by an existing PostgreSQL installation: keep it and map the Docker project to a different host port (`"5434:5432"`). This is preferred over stopping unrelated services. Do not change the container's internal port unnecessarily.

## 57. Messy Machines Are Allowed

A machine with PostgreSQL 17, PostgreSQL 18, Docker PostgreSQL, old containers, old volumes and other projects is NOT a reason to clean everything. The first objective is UNDERSTAND, not DELETE: establish which project uses what before removing anything. The machine does not have to be clean - the project must have a deterministic, declared connection.

## 58. Change Management

Before changing any of: port, credential, database name, database user, PostgreSQL version, Docker volume, Compose configuration, or migration state - the agent MUST explain:

```text
CURRENT STATE -> INTENDED STATE -> REASON -> IMPACT -> VERIFICATION
```

and then follow the standard change pattern:

```text
CAPTURE CURRENT STATE -> MAKE ONE CONTROLLED CHANGE -> VERIFY ->
UPDATE PROJECT CONFIGURATION -> VERIFY APPLICATION
```

Do not silently make infrastructure changes. Do not change five variables simultaneously.

## 59. Destruction Policy and Backup

Any operation equivalent to the following is destructive and requires explicit confirmation whenever existing data may matter:

```text
DROP DATABASE
DROP SCHEMA ... CASCADE
docker compose down -v
docker volume rm
deleting the PostgreSQL data directory
```

NEVER use destructive operations as a generic troubleshooting technique and NEVER run `docker compose down -v` merely because a connection, migration, password, or table check failed. Before deleting a volume:

```text
IDENTIFY -> CHECK DATA -> BACKUP IF REQUIRED -> CONFIRM DESTRUCTIVE OPERATION -> DELETE
```

Concrete backup (run before any destructive step):

```powershell
# Single database, from the container:
docker compose exec db pg_dump -U <ADMIN_USER> -Fc <project> > <project>-backup.dump  # contoh: nexaflow

# Whole cluster (all roles + databases):
docker compose exec db pg_dumpall -U <ADMIN_USER> > cluster-backup.sql
```

Verify the backup file exists and is non-empty before proceeding.

---

# PART VIII - ERROR CATALOG

For every error: investigate first, change nothing until identity is proven (§55 ladder). The identity query (§3) is the primary tool.

## 60. Connection Refused

Investigate: container stopped, PostgreSQL not ready, wrong host, wrong port, wrong port mapping, port conflict, Docker unavailable, `localhost` vs `127.0.0.1` resolution (§12).

```powershell
docker ps
docker logs <container>
docker port <container>
Test-NetConnection localhost -Port <PORT>
```

## 61. Port Already Allocated

Follow §56: identify the owner, understand it, then act. Never kill blindly.

## 62. Password Authentication Failed

DO NOT immediately change the password. First verify host, port, database, user and which PostgreSQL instance answers (identity query, `\du`). A very common cause: the password belongs to a different PostgreSQL instance (§11). If reset is truly required, use the sanctioned procedure in §54.

## 63. Database Does Not Exist

Run the identity query, then `\l`. If the intended database genuinely does not exist on the verified server, create it with the administrative role (§34). Never create it on an unverified server.

## 64. Permission Denied

Check `SELECT current_user;` and `\du`, then inspect database-, schema-, table- and sequence-level privileges and ownership (§29). Do NOT solve this by switching the application user to `postgres`.

## 65. Table Does Not Exist

Do NOT immediately re-run migrations. Establish which instance, database, schema and user the application actually uses (identity query), then `\dt`. If the table exists in another database, the application is connected to the wrong database.

## 66. Migration Succeeded but the Application Sees Nothing

High-priority diagnostic condition. Compare the migration connection against the application connection using the identity query on both (§40). The identities MUST match the intended project. This symptom and its siblings below, form the **wrong-PostgreSQL detector** - whenever facts contradict each other:

- migration says success, but the table is missing
- `psql` sees the database, but the application says it does not exist
- the password works manually, but the application reports authentication failure
- the database exists, but the application cannot access it

- FIRST investigate HOST, PORT, INSTANCE, DATABASE, USER, SCHEMA. Do not change credentials or schema before this check.

---

# PART IX - FRAMEWORK NOTES

## 67. Frameworks Do Not Change the Database Identity

Whether the application is PHP Native, Laravel, Nuxt, or Node.js, the PostgreSQL identity remains HOST + PORT + DATABASE + USER + PASSWORD. Only the framework's method of reading those values changes. This standard is therefore framework-independent.

Likewise, the driver never discovers the server: `pg`, `postgres.js`, PDO, the Laravel database layer, Prisma, Drizzle, or any other client connects exactly where the configuration tells it. A wrong `DATABASE_URL` means the wrong PostgreSQL instance, regardless of driver.

## 68. PHP Native

A PHP Native project should ultimately resolve to `DATABASE_URL` or an equivalent `DB_HOST` / `DB_PORT` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` set. The source of truth must still identify the same PostgreSQL instance.

## 69. Laravel

Laravel normally reads `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`. Verify those values against the project's Docker/PostgreSQL identity - do not assume `DB_HOST=127.0.0.1` / `DB_PORT=5432` is correct merely because it is a common Laravel default.

**Config cache caveat:** if configuration was cached (`php artisan config:cache` / `config:route` caches, or a production-style deploy locally), edits to `.env` will not take effect. When Laravel appears to ignore correct `.env` values, run `php artisan config:clear` and re-test before changing any credentials or ports.

## 70. Nuxt

Nuxt server-side database configuration MUST read credentials from private (server-only) runtime configuration. Never expose `DATABASE_URL` through public client runtime configuration - database credentials are server-side secrets.

---

# APPENDIX A - FINAL DECISION TREE

```text
START
 │
 ▼
Is Docker available?
 ├── NO -> repair Docker
 └── YES
      ▼
Is project Compose configuration present?
 ├── NO -> determine project architecture
 └── YES
      ▼
Is a PostgreSQL service defined?
 ├── NO -> determine whether the project intentionally uses external PostgreSQL
 └── YES
      ▼
Does the PostgreSQL container exist?
 ├── NO -> docker compose up / inspect configuration
 └── YES
      ▼
Is the container running?
 ├── NO -> inspect logs
 └── YES
      ▼
Is PostgreSQL ready?
 ├── NO -> inspect readiness/logs
 └── YES
      ▼
What host port is mapped? -> Who owns that port?
 ├── unexpected process -> resolve conflict (§56)
 └── Docker PostgreSQL
      ▼
Where does the application run?
 ├── Windows -> localhost:<host-port>
 └── Docker  -> db:5432
      ▼
Are credentials known?
 ├── NO -> discover (§20) or ask the developer
 └── YES -> verify
      ▼
Does the database exist?
 ├── NO -> create it on the verified server (§34)
 └── YES
      ▼
Verify role -> verify privileges -> verify DATABASE_URL ->
verify application connection -> identify migration system ->
MIGRATE -> verify schema/tables -> DONE
```

---

# APPENDIX B - THE GOLDEN RULE FOR AI

When in doubt:

```text
DO NOT GUESS.
DO NOT TRY RANDOMLY.
DO NOT RESET.
DO NOT DELETE.
DO NOT MIGRATE.
```

Instead:

```text
INSPECT.
IDENTIFY.
VERIFY.
REPORT.
THEN ACT.
```

This document is the canonical operating contract for local PostgreSQL development.

---

> **Morph-01 specific (2026-10-27):** Docker `morph-pg: postgres:16` `5434:5432` `morph`/`morph_app` — `DATABASE_URL=postgresql://morph_app:[REDACTED]@localhost:5434/morph`. Driver `PostgresDriver` + `TenantMiddleware SET LOCAL app.workspace_id` → RLS; `JsonDriver` fallback `data/collections/*.json`. Verifikasi via `GET /api/debug/session` (trace `sd_session Path=/`) + `GET /api/auth/me` + `psql -h 127.0.0.1 -p 5434 -U morph_app -d morph -c "SELECT current_database(), current_user, inet_server_port(), version()"`.

<!-- datastar-native-web-policy:2026-10-29 -->
## Arahan lintas dokumentasi: Datastar & Native Web Platform

Dalam observasi dan development, prioritaskan kemampuan utama **Datastar** untuk
reaktivitas dan SSE; manfaatkan **API native browser** yang sesuai (termasuk
BroadcastChannel/storage event untuk notifikasi lintas tab) tanpa membuat state
atau renderer tandingan. **PHP tetap otoritas data, transaksi, dan permission.**
Evaluasi lifecycle/cleanup, keamanan, dukungan browser, aksesibilitas, dan bukti
tes dengan merujuk MDN Web APIs serta Chrome Modern Web Guidance.

Pedoman wajib: [arsitektur Morph](ARCHITECTURE.md) dan [PLEASE](PLEASE.md); keduanya mengatur batas Datastar/native-web serta otoritas server-side.
Catatan ini menetapkan kebijakan kerja; bukan klaim bahwa semua API telah
diimplementasikan atau bahwa catatan historis di dokumen ini telah diuji ulang.
