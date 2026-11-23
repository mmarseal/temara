# TEMARA — TODO / Project Tracker

> **Dokumen hidup:** perbarui setiap kali satu task selesai, direview, atau tertahan. Checklist ini mencerminkan progres yang sudah dilaporkan sampai 23 November 2026; item yang belum ada bukti penyelesaiannya tidak ditandai selesai.

**Repository:** https://github.com/mmarseal/temara  
**Branch utama:** `main`  
**Branch integrasi:** `dev`  
**Tech stack:** Laravel 13 · PHP 8.5 · Blade · Bootstrap 5 · MySQL · Eloquent  
**Team:** Marseal (Project Lead + Backend), Teman 1 (UI/UX), Teman 2 (Frontend)

## Status Legend

- `[x]` Selesai dan sudah dikonfirmasi.
- `[ ]` Belum dikerjakan atau belum dikonfirmasi.
- `WAITING` Menunggu output/dependensi anggota lain.
- `BLOCKED` Terhambat oleh masalah yang harus diselesaikan.

---

## 1. Product & Technical Planning

- [x] PRD TEMARA Revisi 1.1 disepakati sebagai baseline kebutuhan.
- [x] Scope MVP P0 dan P1 ditetapkan.
- [x] Tech stack diputuskan: Laravel 13, PHP 8.5, Blade, Bootstrap 5, MySQL, Eloquent.
- [x] Arsitektur Laravel Monolith dengan session-based authentication dipilih.
- [x] Rancangan ERD / schema inti disetujui sebagai baseline.
- [x] Pembagian peran tim disepakati.

## 2. Project Initialization & Environment

- [x] Project Laravel berhasil dibuat di lingkungan lokal.
- [x] PHP, Composer, dan Laravel version telah diverifikasi.
- [x] Database `temara_db` dibuat dan koneksi Laravel ke MySQL berhasil.
- [x] Tiga migration bawaan Laravel (`users`, `cache`, `jobs`) berhasil dijalankan.
- [x] Lima file migration TEMARA dibuat.
- [x] Lima migration TEMARA lulus `php -l` dan `migrate --pretend` menurut laporan Codex.
- [x] Lima migration TEMARA direview dengan verdict **PASS WITH WARNINGS**.
- [ ] Migration aktual lima tabel TEMARA dijalankan pada database lokal.
- [ ] `migrate:status` menunjukkan seluruh migration yang dibutuhkan berstatus `Ran`.

## 3. GitHub & Team Setup

- [x] Git repository lokal diinisialisasi pada branch `main`.
- [x] Git `safe.directory` dikonfigurasi untuk folder project.
- [x] `.env` terverifikasi di-ignore.
- [x] `.env.example` tidak di-ignore.
- [x] `.npmrc` diperiksa dan tidak ditemukan pola kredensial oleh pemeriksaan awal.
- [x] Staging review selesai; `git diff --cached --check` bersih.
- [x] Initial commit dibuat dan branch `main` berhasil di-push ke GitHub.
- [x] Remote `origin` menunjuk ke repository TEMARA.
- [x] Branch `dev` dilaporkan berhasil dibuat dan di-push.
- [x] Undangan collaborator GitHub dilaporkan sudah diterima anggota.
- [ ] Verifikasi akhir branch lokal dan remote dengan `git branch -vv`.
- [ ] Semua anggota berhasil clone repository.
- [ ] Semua anggota berhasil menyiapkan `.env` lokal dan menjalankan Laravel.
- [ ] Semua anggota memahami `docs/TEAM_DEVELOPMENT_GUIDELINES.md`.
- [ ] Team Development Guidelines disimpan di repository.

## 4. Backend — Marseal (Project Lead + Backend)

### Database Foundation

- [x] DB-001: implementasi lima migration TEMARA.
- [x] DB-001 Review: audit migration selesai, **PASS WITH WARNINGS**.
- [ ] DB-001A: jalankan migration aktual.
- [ ] DB-002: buat Eloquent Models (`Elder`, `Caregiver`, `Booking`, `Control`, `Medication`) dan update model `User` bila diperlukan.
- [ ] DB-002: definisikan seluruh Eloquent relationships.
- [ ] DB-002: verifikasi relasi dengan test/tinker atau pemeriksaan aplikasi.
- [ ] DB-003: buat `CaregiverSeeder` dengan data sintetis.
- [ ] DB-003: panggil seeder dari `DatabaseSeeder`.
- [ ] DB-003: jalankan seeder dan verifikasi data caregiver.

### Authentication & Core Backend

- [ ] AUTH-001: register, login, logout berbasis session.
- [ ] AUTH-001: middleware melindungi halaman privat.
- [ ] AUTH-001: validasi dan hashing password.
- [ ] ELDER-001: profil lansia — create/update/read sesuai pemilik akun.
- [ ] HOME-001: query ringkasan dashboard.
- [ ] MED-001: CRUD jadwal obat.
- [ ] MED-001: aksi tandai sudah diminum per jadwal dan per tanggal.
- [ ] CTL-001: CRUD jadwal kontrol dan aksi tandai selesai.
- [ ] BKG-001: daftar dan detail caregiver.
- [ ] BKG-001: buat permintaan booking, batalkan, tandai selesai, dan riwayat.
- [ ] Validasi kepemilikan `bookings.user_id` terhadap `bookings.elder_id`.
- [ ] Validasi status booking dan nilai periode obat pada application layer.
- [ ] Uji isolasi data setidaknya menggunakan dua akun berbeda.

## 5. UI/UX — Teman 1

- [ ] User flow P0 difinalisasi.
- [ ] Design system dan komponen visual disiapkan.
- [ ] Wireframe/prototype halaman P0 diserahkan.
- [ ] Design handoff untuk Frontend diselesaikan.
- [ ] Review UX pada integrasi setiap fitur.
- [ ] Usability dan konsistensi desain direview saat QA.

## 6. Frontend — Teman 2

- [ ] Setup Bootstrap 5 pada Laravel/Vite sesuai keputusan tim.
- [ ] Master Blade layout dan navigasi.
- [ ] Komponen reusable: form, alert, modal, card, table, badge.
- [ ] View login/register.
- [ ] Dashboard view.
- [ ] Profil lansia view.
- [ ] Pengingat obat views.
- [ ] Jadwal kontrol views.
- [ ] Daftar/detail pendamping views.
- [ ] Booking dan riwayat views.
- [ ] Responsive layout pada lebar 360 px dan 1280 px.
- [ ] Integrasi seluruh view dengan route dan data Controller.

## 7. Integration & Quality Assurance — Bersama

- [ ] Kontrak route, field form, dan data Controller–Blade disepakati.
- [ ] Integrasi bertahap per modul selesai.
- [ ] Register/login/logout diuji.
- [ ] CRUD profil lansia diuji.
- [ ] CRUD obat dan status harian diuji.
- [ ] CRUD jadwal kontrol diuji.
- [ ] Booking dan riwayat diuji.
- [ ] Authorization dan isolasi data antarakun diuji.
- [ ] Validasi form dan pesan error diuji.
- [ ] Responsive testing dilakukan.
- [ ] Regression testing seluruh alur P0 selesai.
- [ ] Tidak ada bug blocker untuk demo.

## 8. Release & Submission — Bersama

- [ ] README instalasi, konfigurasi, dan cara menjalankan aplikasi diperbarui.
- [ ] Data demo sintetis disiapkan.
- [ ] Dokumentasi dan screenshot aplikasi disiapkan bila dibutuhkan.
- [ ] Semua Pull Request P0 sudah direview dan masuk `dev`.
- [ ] `dev` direview dan dirilis ke `main`.
- [ ] Demo/rehearsal dilakukan.
- [ ] Final submission selesai.

---

## Current Checkpoint

**Task berikutnya:** `DB-001A — Actual Database Migration`  
**Owner:** Marseal (Backend)  
**Status:** READY TO EXECUTE setelah memastikan berada di branch `dev` dan working tree bersih.  
**Effort:** Low; jalankan perintah Artisan langsung, tidak membutuhkan Codex.

```powershell
 git switch dev
 git pull origin dev
 git status --short --branch
 php artisan migrate
 php artisan migrate:status
```

Jangan gunakan `migrate:fresh`, `migrate:reset`, atau `migrate:rollback` untuk checkpoint ini.

## Waiting Gates

- **Gate A — Team environment:** Backend dapat melanjutkan database dan model tanpa menunggu UI/UX. Frontend dapat menyiapkan layout memakai mock data. Integrasi autentikasi menunggu form/view Frontend siap.
- **Gate B — Design handoff:** Frontend menunggu wireframe/komponen dari Teman 1 untuk menyelesaikan tampilan final; layout dasar tetap dapat dikerjakan lebih awal.
- **Gate C — Backend/Frontend integration:** Integrasi modul dilakukan setelah route, field form, dan bentuk data Controller tersedia; tidak harus menunggu semua modul selesai.
- **Gate D — Release:** `dev` hanya masuk `main` setelah QA P0 disetujui Project Lead.

## Update Log

| Tanggal | Update | Status |
|---|---|---|
| 2026-11-17 | Laravel project, koneksi MySQL, migration awal, review DB-001, GitHub main dan dev disiapkan. | Selesai sesuai laporan |
| 2026-11-23 | PRD Revisi 1.1 dijadikan basis dokumentasi repo; invitation collaborator dilaporkan diterima. | Selesai sesuai laporan |
| 2026-11-23 | Dokumen `PRD.md`, `TODO.md`, `IMPLEMENTATION_PLAN.md`, dan `ARCHITECTURE.md` disiapkan. | Siap ditambahkan ke repository |

> **Update rule:** setiap kali sebuah task selesai, ubah checkbox dan tambahkan satu baris pada Update Log. Jika task menunggu anggota lain, tuliskan nama role, artefak yang ditunggu, dan kondisi untuk melanjutkan.
