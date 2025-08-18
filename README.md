<div align="center">
  
# 🏫 Sistem Administrasi Sekolah  

![Banner](https://dummyimage.com/1000x250/111827/38bdf8&text=Sistem+Administrasi+Sekolah)  

📚 Aplikasi modern berbasis **Laravel + TailwindCSS** untuk mempermudah pengelolaan sekolah.  
✨ Dibuat dengan tampilan **responsive, clean, dan powerful**.  

[![Laravel](https://img.shields.io/badge/Laravel-10-red?logo=laravel)](https://laravel.com/)  
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.0-38bdf8?logo=tailwind-css)](https://tailwindcss.com/)  
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)  

</div>

---

## 🚀 Deskripsi

**Sistem Administrasi Sekolah** adalah platform berbasis web untuk manajemen sekolah:  
👨‍🎓 Siswa • 👩‍🏫 Guru • 🏫 Kelas • 📊 Laporan  

Dikembangkan untuk mempermudah administrasi sekolah dengan antarmuka modern dan kinerja cepat.  

💡 Cocok untuk sekolah, lembaga kursus, atau instansi pendidikan.  

---

## ✨ Fitur Utama

- 👨‍🎓 **Manajemen Siswa** – tambah, edit, hapus data siswa.  
- 👩‍🏫 **Manajemen Guru** – kelola data guru & staf.  
- 🏫 **Kelas & Mata Pelajaran** – atur struktur kelas & jadwal.  
- 📊 **Laporan Otomatis** – generate laporan akademik/administrasi.  
- 🔐 **Login Multi-role** – Admin, Guru, Siswa.  
- 🎨 **UI Modern** – berbasis TailwindCSS.  
- ⚡ **Performa Cepat** – Laravel + Vite build.  

---

## 📂 Struktur Folder

```bash
web_porto/
│── app/                # Core Laravel
│── database/           # Migrations & Seeders
│── public/             # Public assets
│── resources/          # Views + Tailwind
│── routes/             # Web & API routes
│── package.json        # Frontend deps
│── composer.json       # Backend deps
│── vite.config.js      # Vite config
└── README.md

## 🛠 Setup Installasi

# 1. Clone repositori
git clone https://github.com/DcoXer/sistem-administrasi.git

# 2. Masuk folder
cd sistem-administrasi

# 3. Install dependency Laravel
composer install

# 4. Install dependency frontend
npm install

# 5. Copy file .env
cp .env.example .env

# 6. Generate key aplikasi
php artisan key:generate

# 7. Buat database & sesuaikan di .env

# 8. Jalankan migrasi
php artisan migrate --seed

# 9. Running server lokal
php artisan serve

# 10. Jalankan frontend
npm run dev