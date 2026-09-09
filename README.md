# Jara

Aplikasi web untuk mengelola tugas pribadi maupun tim. Pengguna dapat membuat dan mengelompokkan tugas ke dalam beberapa daftar, menentukan prioritas dan tenggat waktu, serta menandai tugas sebagai selesai. Pemilik daftar dapat mengundang pengguna lain untuk berkolaborasi mengerjakan tugas dalam daftar tersebut dan memantau progresnya. Admin bertanggung jawab mengelola akun pengguna dalam sistem.

## User Story

Sebagai pengguna, saya ingin mengelola tugas saya dalam daftar-daftar yang terorganisir dengan prioritas dan tenggat waktu yang jelas, serta dapat mengajak orang lain berkolaborasi dalam satu daftar tugas, sehingga pekerjaan tim maupun pribadi dapat dipantau dengan lebih mudah.

## Demo

_(isi link demo/screenshot kalau ada)_

## Daftar SRS

| Kode | Deskripsi | Acceptance Criteria |
|------|-----------|----------------------|
| SRS-001 | Autentikasi & manajemen akun oleh admin. | - Admin dapat login ke sistem<br>- Admin dapat menambah akun pengguna baru<br>- Admin dapat menghapus akun pengguna<br>- Admin dapat melihat daftar seluruh pengguna |
| SRS-002 | Autentikasi pengguna (user). | - User dapat login menggunakan email & password<br>- User dapat logout<br>- Sesi login tetap aktif sampai logout |
| SRS-003 | Manajemen daftar tugas (list). | - User dapat membuat daftar tugas baru<br>- User dapat mengganti nama daftar<br>- User dapat menghapus daftar<br>- User dapat melihat seluruh daftar miliknya |
| SRS-004 | Manajemen tugas (task) dalam suatu daftar. | - User dapat menambahkan tugas ke dalam daftar<br>- User dapat menentukan prioritas tugas (low/medium/high)<br>- User dapat menentukan tenggat waktu tugas<br>- User dapat mengedit tugas<br>- User dapat menghapus tugas<br>- User dapat menandai tugas selesai/belum selesai |
| SRS-005 | Kolaborasi dalam daftar tugas. | - Pemilik daftar dapat menambahkan user lain ke dalam daftarnya<br>- Pemilik daftar dapat menghapus anggota dari daftar<br>- Anggota yang ditambahkan dapat melihat dan mengerjakan tugas dalam daftar tersebut<br>- Pemilik daftar dapat memantau progres pengerjaan tugas anggotanya |
| SRS-006 | Dashboard / ringkasan tugas pengguna. | - User dapat melihat ringkasan seluruh tugas dari semua daftar miliknya<br>- User dapat memfilter/mengurutkan tugas berdasarkan prioritas atau tenggat waktu |

## Menjalankan Proyek

Proyek ini dibangun menggunakan **Laravel** dan membutuhkan PHP, Composer, serta database MySQL/MariaDB.

```bash
# Clone repository
git clone https://github.com/eileenalbertt123-afk/prakppkpertemuan1.git
cd prakppkpertemuan1

# Install dependency
composer install

# Salin file environment & sesuaikan konfigurasi database
cp .env.example .env
php artisan key:generate

# Jalankan migration untuk membentuk struktur tabel
php artisan migrate

# Jalankan server lokal
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

## Struktur Folder

```
prakppkpertemuan1/
├── app/
│   ├── Http/Controllers/   # Logic aplikasi (controller)
│   └── Models/             # Model Eloquent (User, TaskList, Task, dll)
├── database/
│   └── migrations/         # Struktur tabel database
├── resources/
│   └── views/              # Tampilan (Blade template)
├── routes/
│   └── web.php             # Definisi route aplikasi
├── .env.example             # Contoh konfigurasi environment
├── .gitignore               # File yang di-ignore oleh Git
└── README.md                 # Dokumentasi proyek
```