# TEMARA (Temani Merawat)
## Product Requirements Document
**Versi Web | Revisi 1.1**  
**Tugas Kelompok Mata Kuliah Pemrograman 2**  
**Tanggal dokumen:** 11 November 2026  
**Slogan:** Menemani dengan Peduli, Merawat dengan Hati  
**Fokus pengerjaan:** MVP yang realistis diselesaikan dalam 14 hari

> Dokumen ini merupakan konversi Markdown dari PRD TEMARA Revisi 1.1 yang diberikan dan disetujui tim. Isi kebutuhan, prioritas, tabel, dan keputusan produk dipertahankan dari dokumen sumber.


## Informasi Dokumen


| Elemen | Keterangan |
| --- | --- |
| Nama produk | TEMARA (Temani Merawat) Versi Web |
| Jenis dokumen | Product Requirements Document (PRD) |
| Versi | 1.1, revisi ruang lingkup dan teknis untuk pengerjaan dua minggu |
| Mata kuliah | Pemrograman 2 |
| Arsitektur | Laravel dengan Blade dan MySQL |
| Target implementasi | MVP untuk demonstrasi dan penilaian tugas kelompok |
| Batasan utama | Satu akun mengelola satu profil lansia; tidak ada akun admin atau pendamping pada MVP. |

> **Catatan:** Catatan revisi: Dokumen ini mempertahankan tujuan dan identitas TEMARA, tetapi memangkas fitur yang tidak menjadi prioritas agar tim dapat menyelesaikan alur inti, melakukan pengujian, dan menyiapkan demo dalam waktu 14 hari.

## 1. Ringkasan Produk

TEMARA (Temani Merawat) adalah aplikasi web pendamping perawatan lansia yang membantu anggota keluarga mengelola kebutuhan perawatan orang tua. Aplikasi berfokus pada tiga aktivitas utama, yaitu mengatur jadwal kontrol dokter, mengelola pengingat minum obat, dan mengajukan permintaan pendamping lansia.

Versi web dikembangkan sebagai proyek kelompok mata kuliah Pemrograman 2 menggunakan Laravel, Blade, dan MySQL. Data disimpan pada database server dan diakses melalui akun pengguna. MVP ditujukan sebagai prototype fungsional untuk demonstrasi akademik, bukan sebagai layanan kesehatan atau marketplace pendamping yang sudah beroperasi secara komersial.

Fitur booking pada MVP merupakan pencatatan permintaan layanan. Karena belum tersedia akun pendamping atau admin untuk memverifikasi ketersediaan, status booking tidak boleh ditafsirkan sebagai konfirmasi bahwa pendamping benar-benar tersedia.


## 2. Latar Belakang dan Masalah

Merawat orang tua lanjut usia sering dilakukan oleh anggota keluarga yang juga bekerja, tinggal berjauhan, atau memiliki waktu terbatas. Beberapa masalah yang ingin dibantu oleh TEMARA adalah:

- Jadwal kontrol dokter terlewat karena tidak tercatat di satu tempat.
- Obat terlambat atau lupa diminum karena jadwal konsumsi tidak terdokumentasi.
- Keluarga membutuhkan cara sederhana untuk mencatat kebutuhan pendamping lansia.
- Informasi perawatan tersebar dan sulit dirangkum ketika anggota keluarga membutuhkannya.
TEMARA mengumpulkan informasi dasar perawatan tersebut dalam satu aplikasi yang sederhana dan mudah digunakan keluarga.


## 3. Tujuan dan Indikator Keberhasilan


### 3.1 Tujuan Produk

1.  Membantu keluarga mencatat dan memantau jadwal kontrol dokter.

2.  Membantu keluarga mengelola jadwal minum obat dan menandai obat yang sudah diminum pada hari berjalan.

3.  Memudahkan keluarga mengajukan permintaan pendamping lansia dan melihat riwayat permintaan.

4.  Menyediakan ringkasan informasi lansia pada dashboard.


### 3.2 Tujuan Tugas Kelompok

1.  Menghasilkan aplikasi web yang memiliki frontend, backend, dan database yang terhubung.

2.  Menerapkan routing, MVC, autentikasi berbasis sesi, operasi CRUD, validasi form, relasi database, dan pengelolaan data menggunakan Laravel.

3.  Membagi tanggung jawab anggota secara jelas dan menghasilkan fitur yang dapat diuji serta didemonstrasikan.


### 3.3 Indikator Keberhasilan


| Indikator | Kriteria penerimaan |
| --- | --- |
| Autentikasi | Pengguna dapat mendaftar, masuk, dan keluar. Halaman privat tidak dapat diakses tanpa login. |
| Profil lansia | Pengguna dapat menyimpan dan memperbarui satu profil lansia. |
| Jadwal kontrol | Pengguna dapat menambah, melihat, mengubah, menghapus, dan menandai jadwal sebagai selesai. |
| Pengingat obat | Pengguna dapat mengelola jadwal obat dan menandai jadwal sudah diminum pada hari berjalan. |
| Booking | Pengguna dapat memilih pendamping dari data seed, membuat permintaan, dan melihat riwayatnya. |
| Privasi | Dua akun berbeda tidak dapat saling membaca atau mengubah data privat. |
| Responsif | Halaman utama tetap dapat digunakan pada lebar 360 px dan 1280 px. |
| Validasi | Input tidak valid ditolak dan pesan kesalahan ditampilkan dengan jelas. |


## 4. Target Pengguna


### 4.1 Keluarga Pengelola

Pengguna utama adalah anak atau anggota keluarga yang bertanggung jawab mengelola jadwal, obat, dan informasi perawatan lansia. Pengguna mengoperasikan aplikasi melalui browser pada ponsel atau laptop.


### 4.2 Lansia yang Dirawat

Lansia merupakan penerima manfaat. Pada MVP, lansia tidak menggunakan aplikasi secara langsung. Informasi lansia dikelola oleh anggota keluarga melalui akun miliknya.


### 4.3 Di Luar Cakupan MVP

Pendamping dan admin tidak memiliki akun atau dashboard pada MVP. Data pendamping disediakan melalui database seeder. Pengelolaan data pendamping secara langsung melalui panel admin menjadi pengembangan lanjutan.


## 5. Ruang Lingkup


### 5.1 Termasuk dalam MVP, Prioritas P0


| Modul | Cakupan implementasi |
| --- | --- |
| Autentikasi | Register, login, logout, password hashing, dan proteksi halaman privat. |
| Profil lansia | Menyimpan, menampilkan, dan mengubah data satu lansia untuk setiap akun. |
| Dashboard | Sapaan pengguna, ringkasan profil lansia, jadwal kontrol terdekat, dan status obat hari ini. |
| Pengingat obat | CRUD jadwal obat dan aksi menandai jadwal sudah diminum hari ini. |
| Jadwal kontrol dokter | CRUD jadwal kontrol serta aksi menandai jadwal selesai. |
| Booking pendamping | Daftar dan detail pendamping dari seed data, pembuatan permintaan booking, pembatalan, dan riwayat booking. |


### 5.2 Prioritas P1, Dikerjakan Setelah P0 Stabil

- Catatan dokter sederhana: tambah, lihat, ubah, dan hapus catatan pemeriksaan.
- Ringkasan laporan kesehatan sederhana yang mengambil data dari jadwal kontrol, obat, dan catatan dokter. Tidak termasuk unggah foto resep.
- Edukasi kesehatan: daftar artikel dari database seed, halaman detail, dan pencarian atau filter sederhana.

### 5.3 Di Luar MVP atau Ditunda

- Pembayaran online, penentuan harga layanan, dan transaksi keuangan.
- Konfirmasi ketersediaan pendamping secara real-time, akun pendamping, dan dashboard admin.
- Chat, video call, notifikasi push, alarm browser, dan pengiriman email otomatis.
- Upload foto resep atau dokumen medis.
- Pengelolaan anggota keluarga dengan akun masing-masing dan pengiriman laporan ke banyak penerima.
- Banyak profil lansia dalam satu akun.
- CRUD artikel melalui panel admin dan sistem rating atau ulasan yang dibuat pengguna.
> **Catatan:** Aturan prioritas: pengerjaan P1 hanya dimulai setelah seluruh alur P0 berjalan dan telah diuji. Fitur di luar MVP tidak boleh ditambahkan tanpa kesepakatan ulang tim.

## 6. Kebutuhan Fungsional

> **Catatan:** Prioritas P0 berarti wajib selesai untuk demo. Prioritas P1 berarti dikerjakan setelah P0 stabil dan hanya apabila waktu tersedia.

### 6.1 Autentikasi (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| AUTH-01 | Pengguna dapat mendaftar menggunakan nama, email, dan kata sandi. | P0 |
| AUTH-02 | Email harus unik. Sistem menampilkan pesan yang jelas apabila email sudah digunakan. | P0 |
| AUTH-03 | Kata sandi divalidasi dan disimpan menggunakan mekanisme hashing Laravel, bukan teks biasa. | P0 |
| AUTH-04 | Pengguna dapat login menggunakan email dan kata sandi. | P0 |
| AUTH-05 | Halaman dashboard dan modul privat hanya dapat diakses setelah login melalui middleware auth. | P0 |
| AUTH-06 | Pengguna dapat logout dan sesi login diakhiri. | P0 |


### 6.2 Profil Lansia (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| ELD-01 | Setiap akun memiliki maksimal satu profil lansia. | P0 |
| ELD-02 | Pengguna dapat mengisi nama, usia, dan kondisi kesehatan lansia. | P0 |
| ELD-03 | Pengguna dapat melihat dan mengubah data lansia miliknya. | P0 |
| ELD-04 | Pengguna tidak dapat melihat atau mengubah profil lansia milik akun lain. | P0 |


### 6.3 Dashboard (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| HOME-01 | Dashboard menyapa pengguna berdasarkan nama akun. | P0 |
| HOME-02 | Dashboard menampilkan ringkasan nama dan informasi dasar lansia. | P0 |
| HOME-03 | Dashboard menampilkan jadwal kontrol terdekat yang belum selesai. | P0 |
| HOME-04 | Dashboard menampilkan ringkasan status jadwal obat hari ini. | P0 |
| HOME-05 | Dashboard menyediakan navigasi ke Booking, Jadwal Kontrol, dan Pengingat Obat. | P0 |


### 6.4 Pengingat Minum Obat (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| MED-01 | Pengguna dapat menambahkan jadwal obat yang berisi nama obat, dosis, periode, dan jam konsumsi. | P0 |
| MED-02 | Pengguna dapat melihat seluruh jadwal obat milik lansia yang dikelolanya. | P0 |
| MED-03 | Pengguna dapat mengubah dan menghapus jadwal obat. | P0 |
| MED-04 | Pengguna dapat menandai setiap jadwal obat sudah diminum pada hari berjalan. | P0 |
| MED-05 | Status sudah diminum dihitung per jadwal dan tanggal. Pada hari berikutnya status kembali belum diminum. | P0 |
| MED-06 | Satu record obat mewakili satu jadwal konsumsi. Obat yang diminum beberapa kali sehari dibuat sebagai beberapa jadwal. | P0 |

> **Catatan:** Batasan: MVP hanya menampilkan pengingat di dalam halaman aplikasi. Notifikasi push, alarm, dan bunyi otomatis tidak termasuk.

### 6.5 Jadwal Kontrol Dokter (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| CTL-01 | Pengguna dapat menambahkan jadwal dengan tanggal dan tempat kontrol. | P0 |
| CTL-02 | Pengguna dapat melihat jadwal mendatang dan riwayat kontrol yang selesai. | P0 |
| CTL-03 | Pengguna dapat mengubah dan menghapus jadwal kontrol. | P0 |
| CTL-04 | Pengguna dapat menandai jadwal sebagai selesai. | P0 |
| CTL-05 | Tanggal kontrol divalidasi agar tidak kosong dan sesuai aturan input aplikasi. | P0 |


### 6.6 Booking Pendamping (P0)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| BKG-01 | Sistem menampilkan daftar pendamping yang disediakan melalui database seeder. | P0 |
| BKG-02 | Setiap pendamping menampilkan nama, foto, jenis layanan, pengalaman, bahasa, dan area layanan jika tersedia. | P0 |
| BKG-03 | Pengguna dapat melihat detail pendamping. | P0 |
| BKG-04 | Pengguna dapat membuat permintaan booking dengan memilih pendamping, tanggal, jam mulai, dan jam selesai. | P0 |
| BKG-05 | Tanggal booking tidak boleh berada di masa lalu dan jam selesai harus lebih besar dari jam mulai. | P0 |
| BKG-06 | Setelah disimpan, permintaan booking muncul dalam riwayat dengan status Diajukan. | P0 |
| BKG-07 | Pengguna dapat membatalkan permintaan yang belum selesai. | P0 |
| BKG-08 | Pengguna dapat menandai booking sebagai selesai setelah layanan dianggap terlaksana dalam simulasi. | P0 |

> **Catatan:** Definisi status: Diajukan berarti permintaan telah dicatat oleh aplikasi dan belum diverifikasi oleh penyedia layanan. Selesai berarti pengguna menandai layanan telah terlaksana. Dibatalkan berarti pengguna membatalkan permintaan. Status Diajukan bukan konfirmasi ketersediaan pendamping.

### 6.7 Catatan Dokter (P1)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| NOTE-01 | Pengguna dapat menambahkan catatan pemeriksaan yang berisi tanggal konsultasi, nama dokter atau fasilitas, dan isi catatan. | P1 |
| NOTE-02 | Pengguna dapat melihat, mengubah, dan menghapus catatan miliknya. | P1 |


### 6.8 Laporan Kesehatan Sederhana (P1)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| RPT-01 | Halaman laporan merangkum jadwal kontrol, status jadwal obat hari ini, dan catatan dokter jika modul catatan telah dibuat. | P1 |
| RPT-02 | Informasi laporan dihitung dari data yang tersimpan, bukan diketik ulang secara manual. | P1 |


### 6.9 Edukasi Kesehatan (P1)


| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| EDU-01 | Sistem menampilkan daftar artikel edukasi yang tersedia di database seed. | P1 |
| EDU-02 | Pengguna dapat membuka halaman detail artikel. | P1 |
| EDU-03 | Pengguna dapat mencari artikel berdasarkan judul atau memfilter kategori jika waktu memungkinkan. | P1 |


## 7. Alur Pengguna Utama

1.  Pengguna baru membuka halaman awal, melakukan registrasi, lalu login.

2.  Setelah login, pengguna mengisi profil lansia apabila profil belum tersedia.

3.  Pengguna masuk ke dashboard untuk melihat ringkasan lansia, jadwal kontrol terdekat, dan status obat hari ini.

4.  Untuk mengelola obat, pengguna membuka Pengingat Obat, menambah atau mengubah jadwal, lalu menandai jadwal yang sudah diminum.

5.  Untuk mengelola pemeriksaan, pengguna membuka Jadwal Kontrol, menambah atau mengubah jadwal, lalu menandai kontrol sebagai selesai setelah kunjungan.

6.  Untuk meminta pendamping, pengguna membuka daftar pendamping, melihat detail, mengisi tanggal dan jam, lalu menyimpan permintaan booking. Permintaan muncul di riwayat dengan status Diajukan.

7.  Pengguna dapat membatalkan permintaan atau menandai layanan selesai sesuai kondisi simulasi.

8.  Pengguna logout melalui menu akun. Data tetap tersimpan dan dapat dilihat kembali setelah login.


## 8. Kebutuhan Non-Fungsional


| Aspek | Kebutuhan |
| --- | --- |
| Responsif | Mobile-first. Halaman dapat digunakan pada lebar 360 px sampai desktop 1280 px. |
| Kinerja | Halaman utama ditargetkan termuat dalam 3 detik pada lingkungan demo dan koneksi normal. Gambar seed dioptimalkan. |
| Keamanan autentikasi | Gunakan hashing kata sandi bawaan Laravel, validasi request, dan session management Laravel. |
| Keamanan aplikasi | Gunakan CSRF protection pada form, output escaping Blade, dan Eloquent ORM atau query binding. |
| Privasi | Data profil lansia, obat, kontrol, booking, dan catatan hanya dapat diakses pemilik akun. |
| Validasi | Setiap form memiliki validasi sisi server dan pesan kesalahan yang dapat dipahami. |
| Aksesibilitas dasar | Teks mudah dibaca, kontras memadai, label form jelas, dan tombol nyaman digunakan pada layar sentuh. |
| Kompatibilitas | Uji pada Chrome atau Edge versi terbaru. Browser lain dapat diuji jika waktu memungkinkan. |
| Bahasa | Seluruh antarmuka menggunakan Bahasa Indonesia. |
| Pemeliharaan | Kode dipisahkan menggunakan pola MVC Laravel, menggunakan Git, migration, seeder, dan README. |


## 9. Model Data

Database menggunakan MySQL. Setiap data operasional harus memiliki relasi kepemilikan yang dapat ditelusuri ke akun pengguna. Relasi utama untuk profil lansia adalah satu pengguna memiliki maksimal satu lansia.


| Tabel | Kolom utama dan catatan |
| --- | --- |
| users | id, name, email (unik), password, created_at, updated_at. Password disimpan dalam bentuk hash oleh Laravel. |
| elders | id, user_id (unik dan foreign key), name, age, condition, created_at, updated_at. |
| caregivers | id, name, service_type, experience, languages, service_area, certification, photo, rating, review_count. Data awal berasal dari seeder. |
| bookings | id, user_id, elder_id, caregiver_id, booking_date, start_time, end_time, status, created_at, updated_at. |
| controls | id, elder_id, control_date, place, is_done, created_at, updated_at. |
| medications | id, elder_id, name, dosage, period, time, last_taken_date, created_at, updated_at. Satu record mewakili satu jadwal konsumsi. |
| doctor_notes (P1) | id, elder_id, consultation_date, doctor_name, facility, note, created_at, updated_at. |
| articles (P1) | id, title, category, summary, body, image, created_at, updated_at. Data awal berasal dari seeder. |


### 9.1 Relasi Utama

- users memiliki relasi one-to-one dengan elders. Kolom elders.user_id diberi unique constraint.
- elders memiliki relasi one-to-many dengan controls, medications, dan doctor_notes.
- users memiliki relasi one-to-many dengan bookings.
- caregivers memiliki relasi one-to-many dengan bookings.
- articles tidak terhubung dengan akun pengguna pada MVP karena kontennya bersifat umum.

### 9.2 Aturan Data dan Kepemilikan

- ID pemilik data tidak boleh diambil begitu saja dari input form. Pemilik harus ditentukan dari pengguna yang sedang login dan relasi modelnya.
- Setiap operasi baca, ubah, dan hapus harus memastikan data terkait dengan akun pengguna aktif.
- Gunakan foreign key dan aturan penghapusan yang konsisten agar tidak meninggalkan data yatim.
- Gunakan data sintetis untuk profil, obat, dan catatan kesehatan saat demo.
> **Catatan:** Tabel prescription_photos, family_members, dan report_logs tidak dimasukkan ke database MVP karena fitur foto resep dan pengiriman laporan keluarga ditunda.

## 10. Struktur Halaman dan Routing Laravel


### 10.1 Peta Halaman P0


| Halaman | Route yang disarankan | Akses |
| --- | --- | --- |
| Halaman awal | / | Publik |
| Registrasi | /register | Publik |
| Login | /login | Publik |
| Dashboard | /dashboard | Login |
| Profil lansia | /elder-profile | Login |
| Pengingat obat | /medications | Login |
| Jadwal kontrol | /controls | Login |
| Daftar pendamping | /caregivers | Login |
| Detail pendamping | /caregivers/{caregiver} | Login |
| Riwayat booking | /bookings | Login |
| Profil akun | /profile | Login |


### 10.2 Contoh Routing Web


| Method | Route | Fungsi |
| --- | --- | --- |
| GET | /dashboard | Menampilkan dashboard. |
| GET, POST | /medications | Menampilkan dan menyimpan jadwal obat. |
| PUT/PATCH, DELETE | /medications/{medication} | Mengubah atau menghapus jadwal obat. |
| PATCH | /medications/{medication}/taken | Menandai jadwal obat sudah diminum hari ini. |
| GET, POST | /controls | Menampilkan dan menyimpan jadwal kontrol. |
| PUT/PATCH, DELETE | /controls/{control} | Mengubah atau menghapus jadwal kontrol. |
| PATCH | /controls/{control}/complete | Menandai jadwal kontrol selesai. |
| GET | /caregivers | Menampilkan daftar pendamping. |
| GET | /caregivers/{caregiver} | Menampilkan detail pendamping. |
| GET, POST | /bookings | Menampilkan riwayat dan membuat booking. |
| PATCH | /bookings/{booking}/cancel | Membatalkan permintaan booking. |
| PATCH | /bookings/{booking}/complete | Menandai booking selesai. |

> **Catatan:** Implementasi menggunakan routes/web.php dan controller Laravel. Form Blade menggunakan method spoofing untuk PUT, PATCH, atau DELETE serta token CSRF. Proyek tidak membutuhkan REST API terpisah untuk MVP.

### 10.3 Route P1

Jika modul P1 dikerjakan, route tambahan dapat mencakup /notes, /reports, dan /articles serta /articles/{article}. Route P1 tidak menjadi penghambat penyelesaian P0.


## 11. Teknologi dan Arsitektur


| Komponen | Keputusan | Tanggung jawab |
| --- | --- | --- |
| Backend | Laravel | Routing web, Controller, Model, validasi, autentikasi, dan business logic. |
| Frontend | Blade, HTML, CSS, JavaScript | Rendering halaman dan interaksi antarmuka. |
| CSS framework | Bootstrap 5 | Komponen dasar, grid, form, modal, dan responsive layout. |
| Database | MySQL | Penyimpanan data relasional. |
| ORM | Eloquent | Relasi model dan operasi database. |
| Version control | Git dan GitHub | Branch per fitur, commit, dan penggabungan kode. |

Arsitektur yang digunakan adalah aplikasi Laravel monolitik dengan Blade. Frontend dan backend berada dalam satu proyek. React, Node.js/Express, dan API terpisah tidak digunakan pada MVP agar kompleksitas integrasi tetap terkendali.


### 11.1 Pola Implementasi

1.  Route menerima request melalui routes/web.php.

2.  Controller memvalidasi input dan menjalankan alur aplikasi.

3.  Model Eloquent mengelola data dan relasi database.

4.  Blade menampilkan data dan form kepada pengguna.

5.  Migration digunakan untuk membuat struktur database dan seeder untuk data awal seperti pendamping.


## 12. Panduan Desain Antarmuka


| Elemen | Nilai |
| --- | --- |
| Warna utama | #6B7BD6 (periwinkle) |
| Latar halaman | #F5F6FC |
| Teks utama | #2B2F52 |
| Latar lembut | #E8EBFA |
| Aksen kuning | #FFF0CC dan #FFC857 |
| Font | Roboto atau sans-serif sejenis |
| Bentuk | Kartu putih dengan sudut membulat 16 px dan tombol dengan area klik yang cukup. |
| Navigasi | Navigasi sederhana. Pada layar kecil dapat menggunakan bottom navigation; pada layar lebar dapat menggunakan sidebar atau header. |

> **Catatan:** Desain harus mengutamakan keterbacaan, label yang jelas, dan alur input yang sederhana. Animasi dekoratif bukan prioritas sebelum seluruh fungsi P0 selesai.

## 13. Perbedaan Versi Android dan Web


| Aspek | Android sebelumnya | Web MVP |
| --- | --- | --- |
| Penyimpanan | Lokal di perangkat. | Database MySQL melalui server Laravel. |
| Akun | Penggunaan lokal per perangkat. | Registrasi dan login dengan session. |
| Perangkat | Aplikasi Android. | Browser desktop dan mobile. |
| Pengingat obat | Mengikuti kemampuan versi Android. | Status ditampilkan di halaman aplikasi; tidak ada alarm browser pada MVP. |
| Booking | Mengikuti rancangan versi aplikasi sebelumnya. | Pencatatan permintaan booking; belum mengonfirmasi ketersediaan pendamping. |


## 14. Rencana Pengerjaan Kelompok


### 14.1 Pembagian Tanggung Jawab


| Peran | Tanggung jawab utama | Output |
| --- | --- | --- |
| UI/UX | Menetapkan user flow, wireframe, komponen visual, dan meninjau konsistensi desain. | Wireframe, prototype, panduan warna dan komponen. |
| Frontend | Membangun layout Blade, halaman, form, navigasi, responsive design, dan interaksi JavaScript. | Blade views dan styling halaman. |
| Backend | Membangun migration, model, relasi, seeder, route, controller, autentikasi, validasi, dan pembatasan akses data. | Fitur backend dan database yang berfungsi. |
| Bersama | Menyepakati requirement, integrasi, pengujian, dokumentasi, dan persiapan demo. | Aplikasi terintegrasi dan README. |

> **Catatan:** Pembagian peran merupakan pembagian fokus, bukan alasan untuk bekerja terpisah. Semua anggota wajib memahami alur utama dan melakukan review bersama.

### 14.2 Timeline 14 Hari


| Hari | Kegiatan | Hasil yang diharapkan |
| --- | --- | --- |
| 1 | Finalisasi PRD, scope, ERD, user flow, pembagian tugas, dan repository Git. | Kesepakatan kebutuhan dan rancangan awal. |
| 2 | Setup Laravel, konfigurasi MySQL, migration dasar, layout Blade, dan desain awal. | Proyek dapat dijalankan seluruh anggota. |
| 3–4 | Authentication, profil lansia, model dan relasi inti. UI/UX menyelesaikan desain halaman utama. | Login dan profil lansia berfungsi. |
| 5–7 | Dashboard, CRUD obat, CRUD jadwal kontrol, serta tampilan halaman terkait. | Fitur perawatan inti berjalan. |
| 8–9 | Seed data pendamping, daftar dan detail pendamping, booking, serta riwayat booking. | Alur booking berjalan. |
| 10 | Integrasi seluruh modul P0 dan perbaikan kontrak data antara Controller dan Blade. | Semua alur P0 terhubung. |
| 11–12 | Pengujian, validasi, otorisasi data, responsive check, dan perbaikan bug. | P0 stabil dan siap diuji. |
| 13 | P1 jika P0 stabil, README, data demo, dan persiapan presentasi. | Dokumentasi serta demo. |
| 14 | Regression test, final review, dan buffer perbaikan. | Versi final siap dikumpulkan. |

> **Catatan:** Pekerjaan UI/UX dan backend berjalan paralel setelah requirement dasar disepakati. Frontend dapat mulai membangun layout dan halaman menggunakan data contoh sebelum seluruh backend selesai. Integrasi dilakukan bertahap, bukan menunggu semua fitur selesai.

## 15. Risiko dan Mitigasi


| Risiko | Dampak | Mitigasi |
| --- | --- | --- |
| Scope bertambah di tengah pengerjaan | Fitur inti tidak selesai. | Tahan penambahan fitur. P1 dimulai hanya setelah P0 stabil. |
| Frontend menunggu backend selesai | Waktu pengerjaan terbuang. | Sepakati nama field, route, dan bentuk data lebih awal. Gunakan data contoh untuk layout. |
| Struktur database berubah terlambat | Migration dan kode perlu diperbaiki berulang. | Review ERD dan relasi sebelum implementasi modul. |
| Data pengguna bocor antar akun | Pelanggaran privasi dan kegagalan kriteria penerimaan. | Batasi query berdasarkan relasi pengguna aktif dan uji dengan dua akun berbeda. |
| Konflik kode antaranggota | Merge conflict dan kehilangan waktu. | Gunakan branch per fitur, commit teratur, dan pull sebelum mulai bekerja. |
| Booking disalahartikan sebagai konfirmasi layanan | Ekspektasi pengguna tidak sesuai kemampuan prototype. | Gunakan label permintaan booking dan jelaskan bahwa ketersediaan belum diverifikasi. |
| Waktu testing terlalu sedikit | Bug ditemukan saat demo. | Sisihkan hari 11–14 untuk pengujian, perbaikan, dan buffer. |


## 16. Kriteria Penerimaan dan Definition of Done

MVP dinyatakan selesai apabila seluruh kriteria P0 berikut telah dipenuhi:

1.  Pengguna dapat mendaftar, login, dan logout tanpa error pada alur normal.

2.  Pengguna yang belum login tidak dapat mengakses dashboard dan modul privat.

3.  Pengguna dapat membuat dan memperbarui satu profil lansia.

4.  Pengguna dapat melakukan CRUD jadwal obat dan menandai masing-masing jadwal sudah diminum pada hari berjalan.

5.  Satu jadwal obat tidak memengaruhi status jadwal obat lain. Status harian kembali belum diminum pada tanggal berikutnya.

6.  Pengguna dapat melakukan CRUD jadwal kontrol dan menandai kontrol selesai.

7.  Pengguna dapat melihat daftar pendamping seed, membuka detail, membuat permintaan booking, dan melihat riwayat booking.

8.  Validasi booking menolak tanggal masa lalu dan jam selesai yang tidak lebih besar daripada jam mulai.

9.  Dua akun pengujian yang berbeda tidak dapat mengakses atau mengubah data satu sama lain.

10.  Data tetap tersimpan setelah halaman dimuat ulang dan setelah pengguna logout lalu login kembali.

11.  Form menampilkan validasi untuk input kosong atau tidak sesuai aturan.

12.  Tampilan utama dapat digunakan pada lebar 360 px dan 1280 px.

13.  Repository memiliki migration, seeder, dan README berisi langkah instalasi, konfigurasi database, cara menjalankan aplikasi, serta akun demo.


### 16.1 Skenario Demo Minimum

1.  Registrasi akun baru dan login.

2.  Melengkapi profil lansia.

3.  Menambahkan jadwal obat dan menandainya sudah diminum.

4.  Menambahkan jadwal kontrol dan menandainya selesai.

5.  Memilih pendamping, membuat permintaan booking, lalu melihat riwayat booking.

6.  Logout, login kembali, dan menunjukkan bahwa data tersimpan.


## 17. Asumsi dan Keputusan yang Perlu Dijaga

- MVP hanya mendukung satu profil lansia untuk setiap akun.
- Data pendamping bersifat statis dan dimasukkan melalui database seeder.
- Booking adalah simulasi pencatatan permintaan, bukan layanan yang telah dikonfirmasi.
- Pengingat obat hanya ditampilkan di dalam aplikasi dan tidak mengirim notifikasi di luar browser.
- Catatan dokter, laporan kesehatan, dan edukasi merupakan P1, bukan syarat agar MVP dinyatakan selesai.
- Gunakan data sintetis selama pengembangan dan demonstrasi. Jangan memasukkan data kesehatan pribadi yang sebenarnya.
- Perubahan scope harus disepakati seluruh anggota dan mempertimbangkan sisa waktu pengerjaan.
