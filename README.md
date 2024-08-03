## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal [PHP](https://www.php.net/) dan [Node.js](https://nodejs.org/) di sistem Anda.

## Instalasi

1. **Clone Repositori**

   Pertama, clone repositori ini ke sistem Anda:
   ```bash
   git clone https://github.com/Reosta-Pratama/PayrollSystem.git
   cd PayrollSystem
   ```

2. **Instalasi Laravel**

   Jalankan perintah berikut untuk menginstal dependensi Laravel:
   ```bash
   php artisan install
   ```

3. **Instalasi NPM**

   Setelah itu, instal dependensi Node.js dengan menjalankan:
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**

   Buat file `.env` dari file `.env.example` yang telah disediakan dan sesuaikan pengaturan database dan konfigurasi lainnya sesuai kebutuhan Anda:
   ```bash
   cp .env.example .env
   ```

5. **Migrasi Database**

   Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Menjalankan Aplikasi**

   Terakhir, jalankan server lokal untuk memulai aplikasi:
   ```bash
   php artisan serve
   ```

   Aplikasi akan tersedia di `http://localhost:8000`.

7. **Menjalankan Pengembangan**

   Untuk menjalankan server pengembangan dan mengaktifkan fitur live reloading dengan Tailwind CSS, gunakan perintah berikut:
   ```bash
   npm run dev
   ```

## Teknologi

- **Laravel 11**: Kerangka kerja PHP yang digunakan untuk pengembangan backend.
- **Tailwind CSS**: Framework CSS yang digunakan untuk styling antarmuka pengguna.
