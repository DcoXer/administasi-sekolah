# 🏫 Sistem Administrasi Sekolah

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="100"/>
  <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind Logo" width="120"/>
</p>

<p align="center">
  <b>Sistem Administrasi Sekolah</b><br/>
  <i>Dibangun dengan Laravel + TailwindCSS + bantuan JavaScript ✨</i>
</p>

---

## 📌 Deskripsi

**Sistem Administrasi Sekolah** adalah aplikasi berbasis web untuk mengelola kegiatan sekolah secara terpusat.  
Mulai dari manajemen **siswa, guru, kelas, mata pelajaran, hingga laporan**.  
Didesain agar **mudah digunakan, responsif, dan scalable** untuk kebutuhan sekolah modern.

> 💡 Tersedia juga versi **siap pakai** (include domain, hosting, dan instalasi).  
> Cocok buat sekolah yang pengen langsung jalan tanpa ribet.  

---

## ✨ Fitur Utama

- 👨‍🎓 **Manajemen Siswa** – tambah, edit, hapus, lihat data siswa.
- 👩‍🏫 **Manajemen Guru** – kelola data guru & staf pengajar.
- 🏫 **Kelas & Mata Pelajaran** – atur struktur kelas + jadwal pelajaran.
- 📊 **Laporan** – cetak laporan akademik & administrasi.
- 🔐 **Autentikasi User** – login multi-role (Admin, Guru, Siswa).
- 🎨 **UI Modern** – menggunakan TailwindCSS dengan animasi interaktif.
- ⚡ **Performa Cepat** – full Laravel + Blade + JS ringan.

---

## 🛠️ Teknologi yang Digunakan

- [Laravel](https://laravel.com/) – Backend Framework (PHP)
- [TailwindCSS](https://tailwindcss.com/) – Styling modern & responsive
- [MySQL](https://www.mysql.com/) – Database
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript) – Interaktivitas tambahan

---

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di lokal:

```bash
# 1. Clone repositori
git clone https://github.com/username/repo-name.git

# 2. Masuk ke folder project
cd repo-name

# 3. Install dependency PHP (Laravel)
composer install

# 4. Install dependency frontend (Tailwind + Vite)
npm install

# 5. Copy file environment
cp .env.example .env

# 6. Generate key aplikasi
php artisan key:generate

# 7. Buat database di MySQL
# lalu atur konfigurasi DB di file .env

# 8. Jalankan migrasi
php artisan migrate --seed

# 9. Jalankan server lokal
php artisan serve

# 10. Jalankan build frontend
npm run dev