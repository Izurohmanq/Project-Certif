# Swiftwalk - Platform Sewa Sepatu

## Kelompok: PRODASE

Selamat datang di Swiftwalk, platform sewa sepatu yang dikembangkan oleh kelompok PRODASE. Aplikasi ini dibangun menggunakan framework Laravel untuk memudahkan proses penyewaan sepatu dengan fitur-fitur yang mudah digunakan.

## Fitur

1. **Login dan Register**

    - Pengguna dapat membuat akun baru atau masuk ke dalam sistem menggunakan kredensial mereka.

2. **Forgot Password**
    - Fasilitas untuk pengguna yang lupa kata sandi, dengan mengirimkan email untuk mengatur ulang kata sandi.
3. **Verifikasi Email**

    - Sistem otomatis mengirimkan email verifikasi setelah pengguna mendaftar..

4. **2 Role (User dan Admin)**

    - Aplikasi mendukung dua jenis peran pengguna: User (peminjam sepatu) dan Admin (pengelola sistem).

5. **CRUD User**

    - Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada data pengguna.

6. **CRUD Sepatu**

    - Admin dapat mengelola daftar sepatu yang tersedia, termasuk menambahkan, mengedit, dan menghapus data sepatu.

7. **Peminjaman**
    - Pengguna dapat melakukan peminjaman sepatu yang tersedia, dengan informasi waktu peminjaman dan pengembalian.

## Instalasi

1. **Clone Repositori**

    ```bash
    git clone https://github.com/Izurohmanq/Project-Certif.git
    ```

2. **Masuk ke Direktori**

    ```bash
    cd Project-Certif
    ```

3. **Instal Dependensi**

    ```bash
    composer install
    npm install
    ```

4. **Copy .env**

    ```bash
    cp .env.example .env
    ```

5. **Konfigurasi .env**

    - Sesuaikan pengaturan basis data dan konfigurasi lainnya pada file `.env`.

6. **Generate Key Aplikasi**

    ```bash
    php artisan key:generate
    ```

7. **Jalankan Migrasi dan Seeder**

    ```bash
    php artisan migrate --seed
    ```

8. **Jalankan Aplikasi**

    ```bash
    npm run dev
    php artisan serve
    ```

    Aplikasi akan berjalan di `http://localhost:8000`.

## Skema Database
![Skema Database](https://cdn.discordapp.com/attachments/1183629085839204353/1185232243002724442/image.png?ex=658edc8b&is=657c678b&hm=520019208dca509c4c79648623ebbcf84b2440156132c118418ab4725c148350& "Skema Database")

## Video Demo

[Klik di sini untuk melihat video demo](https://drive.google.com/file/d/1TeaKvfrMMpTCt89gG69bie4-NV8xSJX8/view?usp=drive_link)