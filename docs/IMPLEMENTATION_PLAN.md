# TEMARA — Implementation Plan

> Rencana pelaksanaan teknis berdasarkan PRD Revisi 1.1. Dokumen ini mengatur urutan kerja, pemilik tugas, dependensi, dan checkpoint. Status aktual harian tetap dicatat di [`TODO.md`](TODO.md).

## 1. Objectives

Deliver a working TEMARA web MVP within the academic project window, focusing on the P0 workflows:

1. Register, login, logout, and private-page protection.
2. One elder profile per account.
3. Dashboard summary.
4. Medication schedule CRUD and daily taken status.
5. Doctor control schedule CRUD and completion status.
6. Caregiver directory/detail from seeded data, booking request, cancellation/completion, and history.

P1 modules (doctor notes, health summary, educational articles) may begin only after all P0 flows are integrated and tested.

## 2. Team Ownership

| Owner | Primary responsibility | Deliverables |
|---|---|---|
| Marseal — Project Lead + Backend | Scope/technical decisions, migration, Eloquent, seeder, routes, controllers, authentication, validation, authorization, review and release | Working backend and controlled integration |
| Teammate 1 — UI/UX | User flow, wireframes, design system, prototype, design handoff, UX review and usability feedback | Approved screen designs and UX review |
| Teammate 2 — Frontend | Blade layouts/views, Bootstrap 5, JavaScript interactions, forms, navigation, responsive implementation | Functional Blade interface |
| All members | Requirement review, handoff, integration, testing, documentation, demo and submission | Integrated MVP |

The responsibilities are focus areas, not silos. Every member participates in reviews and testing.

## 3. Delivery Principles

- Use one Laravel monolith; do not create a separate React/Node API application for the MVP.
- Backend and UI work can proceed in parallel after the user flow, schema, and data contract are clear.
- Frontend may use mock data while backend endpoints/routes are being implemented.
- Integrate per feature; do not wait until all modules are complete.
- Only start P1 after P0 is working and tested.
- Keep all work on feature branches and merge through Pull Requests into `dev`.
- Release `dev` to `main` only after Project Lead approval.

## 4. Milestones and Work Packages

### M0 — Product and Technical Baseline

**Status:** Completed / approved baseline.

- [x] PRD Revisi 1.1 accepted.
- [x] P0/P1 scope selected.
- [x] Laravel 13 + Blade + Bootstrap 5 + MySQL selected.
- [x] Core ERD/schema baseline agreed.
- [x] Three-person ownership model agreed.

**Exit criteria:** team has one agreed product scope, architecture direction, and technology stack.

### M1 — Project and Team Setup

**Status:** Mostly completed; remaining onboarding checks are in `TODO.md`.

**Marseal**
- [x] Create Laravel project and configure local MySQL.
- [x] Initialize Git and publish `main`.
- [x] Create/publish `dev` (reported complete).
- [x] Invite collaborators (reported accepted).
- [ ] Verify remote branches and clean working tree.
- [ ] Add shared team guidelines to `docs/`.

**Teammate 1**
- [ ] Confirm repository access and local design workspace.
- [ ] Prepare P0 user flow and design handoff.

**Teammate 2**
- [ ] Confirm repository access and run the Laravel project locally.
- [ ] Prepare Blade/Bootstrap implementation workspace.

**All members**
- [ ] Each member clones the same repository, configures their own `.env`, and verifies the application runs locally.

**Exit criteria:** all three members have repository access and can run the shared project locally.

### M2 — Database Foundation

**Owner:** Marseal (Backend)

#### DB-001A — Apply reviewed migrations

- [x] Five TEMARA migration files implemented.
- [x] Syntax and `migrate --pretend` checks passed according to Codex report.
- [x] Migration code audit passed with warnings.
- [ ] Run actual `php artisan migrate` on the agreed local database.
- [ ] Verify all expected migration statuses and tables.

**Safety:** do not run `migrate:fresh`, `migrate:reset`, or destructive rollback commands for this task.

#### DB-002 — Eloquent Models & Relationships

Create/complete:
- `User` (existing Laravel model; add agreed relationship methods only).
- `Elder`.
- `Caregiver`.
- `Booking`.
- `Control`.
- `Medication`.

Relationships:
- User hasOne Elder; Elder belongsTo User.
- User hasMany Bookings; Booking belongsTo User.
- Elder hasMany Bookings, Controls, and Medications.
- Booking belongsTo Elder and Caregiver.
- Caregiver hasMany Bookings.
- Control belongsTo Elder.
- Medication belongsTo Elder.

Verify relationship names, foreign-key naming, fillable/guarded strategy, and casts. Do not add unapproved schema changes.

#### DB-003 — Caregiver Seeder

- Create synthetic caregiver seed data.
- Ensure `DatabaseSeeder` calls the intended seeder.
- Seed idempotently where practical (for example, stable `updateOrCreate` keys).
- Verify caregivers display correctly from the database.

**Exit criteria for M2:** migrations applied; models and relationships verified; caregiver records seeded.

### M3 — Authentication and Application Foundation

**Owners:** Marseal (Backend), Teammate 2 (Frontend), Teammate 1 (UX review)

**Backend tasks**
- Register with name/email/password and unique email validation.
- Hash passwords using Laravel hashing.
- Login/logout using Laravel session authentication.
- Protect private routes with `auth` middleware.
- Ensure session lifecycle is handled correctly.

**Frontend tasks**
- Implement login and registration Blade views.
- Prepare master layout and navigation using Bootstrap 5.
- Build reusable form, alert, card, modal and navigation patterns.

**UI/UX tasks**
- Hand off registration/login, dashboard and profile designs.
- Review readability, form labels, error states and navigation.

**Integration gate:** form field names, route names, validation error rendering, and successful redirect behavior are agreed before the feature is merged.

**Exit criteria:** a user can register, log in, log out, and access protected pages correctly.

### M4 — Elder Profile and Dashboard

**Backend — Marseal**
- Implement create/read/update for the single elder profile.
- Resolve the elder through the authenticated user relationship; never trust an owner ID from the form.
- Build dashboard queries for elder summary, next unfinished control, and today's medication status.

**Frontend — Teammate 2**
- Implement elder profile form/view and dashboard cards/navigation.
- Use mock data until controller data is available.

**UI/UX — Teammate 1**
- Review profile completion flow and dashboard information hierarchy.

**Integration gate:** one account can create/update only its own elder profile; dashboard displays that profile and relevant summary.

### M5 — Medication Module

**Backend — Marseal**
- CRUD medication schedules.
- Validate period against `Pagi`, `Siang`, `Sore`, `Malam`.
- Implement per-schedule daily taken status using `last_taken_date`.
- Scope all queries through the authenticated user's elder.

**Frontend — Teammate 2**
- Medication list, add/edit form, delete interaction, and mark-as-taken action.

**UI/UX — Teammate 1**
- Review daily status clarity and form simplicity.

**Integration gate:** one medication schedule's status does not affect another; status is considered taken only when `last_taken_date` equals the current application date.

### M6 — Doctor Control Module

**Backend — Marseal**
- CRUD controls.
- Mark a control as completed.
- Sort upcoming and completed records as required.
- Scope all queries through the authenticated user's elder.

**Frontend — Teammate 2**
- Upcoming schedule and history views, form, edit/delete, completion action.

**UI/UX — Teammate 1**
- Review schedule cards, date labels, empty states and confirmation feedback.

**Integration gate:** a user cannot read or change another user's control records.

### M7 — Caregiver Directory and Booking

**Backend — Marseal**
- List/show caregiver records from seed data.
- Create booking request with date/time validation.
- Store status `submitted`, `completed`, or `cancelled`.
- Support cancellation and completion actions.
- Scope booking by authenticated user and verify the selected elder belongs to that user.

**Frontend — Teammate 2**
- Caregiver list and detail, booking form/summary, booking history and status actions.

**UI/UX — Teammate 1**
- Review caregiver comparison, booking journey, date/time form and status wording.

**Important product constraint:** booking is a recorded request, not confirmation of caregiver availability. No real-time schedule or provider-side confirmation exists in MVP.

**Integration gate:** date in the past is rejected; end time must be later than start time; request appears in history as Diajukan.

### M8 — Integration and Quality Assurance

**All members; Project Lead coordinates**

- Review and merge feature PRs into `dev`.
- Test full user journey from registration through booking.
- Test data isolation with at least two accounts.
- Test server-side validation and authorization.
- Test mobile width 360 px and desktop width 1280 px.
- Fix critical UI, data, and integration defects.
- Run regression checks after fixes.

**Exit criteria:** all P0 acceptance criteria in PRD are met; no blocker remains for the demo.

### M9 — Optional P1, Release and Submission

Start P1 only after M8 is complete and sufficient time remains.

P1 order:
1. Doctor notes.
2. Simple health summary derived from stored control/medication/doctor-note data.
3. Seeded educational articles with detail and simple search/filter.

Release/submission:
- Update README setup instructions and demo credentials/data.
- Review final `dev` state.
- Merge approved `dev` into `main`.
- Prepare demo script and presentation.
- Keep a final regression-test buffer.

## 5. 14-Day Reference Schedule

This is the relative schedule from PRD Revisi 1.1, not a claim that the current project is on a particular numbered day. Re-anchor the dates to the team's confirmed submission deadline.

| Day | Backend / Project Lead | UI/UX | Frontend | Shared output |
|---|---|---|---|---|
| 1 | Scope, ERD, repository | User flow | Repository/setup review | Requirements and technical baseline |
| 2 | MySQL and migrations | Initial design | Blade layout baseline | All members can run project |
| 3–4 | Auth, profile, models/relations | Main-page designs | Login, registration, profile | Login and elder profile work |
| 5–7 | Dashboard, medication, controls | Feature UX review | Dashboard, medication, controls views | Core care modules work |
| 8–9 | Caregiver seed and booking | Booking UX review | Caregiver and booking views | Booking flow works |
| 10 | Backend/Blade integration | UI review | Controller data integration | All P0 flows connected |
| 11–12 | Validation, authorization, fixes | Usability review | Responsive and UI fixes | P0 stable |
| 13 | Optional P1, docs, demo data | Visual polish | Final UI polish | Documentation and demo ready |
| 14 | Regression and release | Demo support | Demo support | Submission-ready version |

## 6. Integration and Waiting Gates

| Gate | Work that can continue | What must be received before moving on |
|---|---|---|
| Database → Models | UI/UX and Blade skeleton can continue in parallel | Actual migration applied and schema verified before model integration tests |
| UX → Frontend | Backend implementation can proceed | Approved wireframe/design handoff before final visual implementation |
| Backend → Blade integration | Frontend may use mock data before backend is ready | Agreed route, field names, validation keys, and view data contract |
| Feature → QA | Other independent modules can continue | Feature branch passes local checks and PR is ready for review |
| QA → Release | Documentation/demo prep can continue | All P0 acceptance criteria pass and Project Lead approves release |

## 7. Change Control

- Any new feature must be assessed against deadline and P0 scope.
- P1 cannot displace unfinished P0 work.
- Schema changes require Backend/Project Lead review and migration plan.
- Shared layout, `routes/web.php`, global styles, dependency manifests and app configuration require team coordination.
- No destructive migration/database command without explicit approval and a verified backup/safe local state.

## 8. Definition of Done

A work package is done when:
- It meets its acceptance criteria.
- Data is stored/read correctly where applicable.
- Server-side validation and ownership checks are implemented.
- Relevant tests or manual verification are recorded.
- No unrelated files are changed unnecessarily.
- The feature branch is pushed and a PR to `dev` is opened.
- Project Lead review is complete and merge is approved.
