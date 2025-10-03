# Laundry App

Aplikasi manajemen laundry berbasis web sebagai proyek UTS (Ujian Tengah Semester) menggunakan framework PHP / Laravel.

Nama Anggota Kelompok 1 :
- Ilham Arif Farabi 2210631170074
- M.Addien Gilang Saputra 2210631170027
- Moh. Dicky Purnama 2210631170031
- Muhammad Ardho Rantisy 2210631170082
- Fabian Nur Rohman 2210631170118

## ✨ Fitur

- Manajemen user (admin, operator, pelanggan)  
- Input transaksi laundry  
- Tracking status cucian  
- Laporan pendapatan / transaksi  
- CRUD data paket laundry, harga, jenis layanan  
- Autentikasi & otorisasi  

---

## 🏗️ Teknologi & Dependensi

| Komponen | Versi / Catatan |
|---|---|
| Framework | Laravel (PHP) |
| Frontend | Blade, Tailwind CSS, Bootstrap |
| Database | MySQL / MariaDB |
| Tools & Lainnya | Composer, Node.js, NPM / Yarn, Vite|

## 📦 Instalasi & Setup

Berikut langkah-langkah untuk menjalankan aplikasi di lokal:

1. **Clone repo**  
   ```bash
   git clone https://github.com/AdinGilang/laundry-app.git && cd laundry-app

2. **Install dependensi backend**  
   ```bash
   composer install

3. **Install dependensi frontend / asset**  
   ```bash
   npm install

4. **Build asset frontend**  
   ```bash
   npm run build

5. **Clear all Laravel application cache.**  
   ```bash
   php artisan optimize:clear

   
6. **Migrasi & seeding database**  
   ```bash
   php artisan migrate
   php artisan db:seed   # jika kamu memiliki seeder
   
7. **Compile asset frontend**  
   ```bash
   npm run dev
   atau npm run build untuk produksi
    
8. **Run the local server**  
   ```bash
   php artisan serve


## 📂 Struktur Direktori Utama

├── app/ # Kode backend: Model, Controller, Service, dll
├── bootstrap/
├── config/
├── database/
│ ├── migrations/
│ └── seeders/
├── public/
├── resources/
│ ├── views/ # Blade templates
│ └── assets/
├── routes/
│ └── web.php
├── storage/
├── tests/
├── .env.example
├── composer.json
├── package.json
└── README.md



Penggunaan (Usage)
1. Daftar akun/login
2. Sebagai admin:
   Tambah / ubah / hapus paket laundry
   Lihat semua transaksi & laporan
   Manajemen user operator
   
3. Sebagai Karyawan:
   Input transaksi baru
   Update status cucian (misalnya “dicuci”, “selesai”, dll)
   


   

