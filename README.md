# 🎓 Sistem Administrasi Sekolah  
> Fullstack Web App berbasis **Laravel 10 + TailwindCSS** untuk manajemen administrasi sekolah  

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind](https://img.shields.io/badge/TailwindCSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

---

## 📸 Preview
Tampilan modern & responsif menggunakan **TailwindCSS**.

![Screenshot](VID-20250818-WA0002.jpg)

---

## 🎥 Demo Interaktif
Lihat sistem berjalan langsung:  

![Demo](VID-20250818-WA0002_1(1).gif)  

---

## ✨ Fitur Utama
- 📚 **Manajemen Data Siswa** (CRUD data siswa & guru)  
- 🏫 **Manajemen Kelas & Jadwal**  
- 🧾 **Pencatatan Administrasi & Pembayaran**  
- 📊 **Dashboard Interaktif** dengan grafik statistik  
- 🔐 **Autentikasi & Role Management** (Admin, Guru, Siswa)  
- 📱 **Responsive Layout** (desktop & mobile friendly)  

---

## ⚡ Instalasi

```bash
# Clone repo
git clone https://github.com/username/sistem-administrasi-sekolah.git
cd sistem-administrasi-sekolah

# Install dependencies
composer install
npm install

# Copy env
cp .env.example .env

# Generate key
php artisan key:generate

# Migrasi database
php artisan migrate --seed

# Jalankan server
php artisan serve
npm run dev