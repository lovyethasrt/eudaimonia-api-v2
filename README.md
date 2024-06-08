# Panduan Instalasi Proyek di Lokal Environment

Proyek ini adalah aplikasi Laravel yang dibangun untuk [tuliskan tujuan atau deskripsi singkat proyek Anda].

## Persyaratan

Sebelum Anda memulai, pastikan sistem Anda telah memenuhi persyaratan berikut:

- PHP >= 8.1
- Composer ([Panduan Instalasi](https://getcomposer.org/download/))
- MySQL atau database lain yang didukung oleh Laravel
- Node.js & NPM (opsional, tergantung pada kebutuhan proyek Anda)

## Instalasi
Berikut adalah langkah-langkah untuk menginstal proyek ini di lingkungan lokal Anda:

1. **Clone Repository**
``` 
git clone https://github.com/lovyethasrt/eudaimonia-api-v2.git eudaimonia-api
```

2. **Pindah ke Direktori Proyek**
```
cd eudaimonia-api
```

3. **Instal Dependensi PHP**

```
composer install
```
4. **Buat Salinan File .env**
```
cp .env.example .env
```

5. **Atur Konfigurasi**
- Buka file `.env` dan sesuaikan pengaturan database, URL aplikasi, dan pengaturan lainnya jika diperlukan. Terutama untuk konfigurasi database pada beberapa key berikut:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eudaimonia-api
DB_USERNAME=root
DB_PASSWORD=
```
6. **Buat Kunci Aplikasi**
```
php artisan key:generate
```


7. **Migrasi dan Isi Basis Data**
```
php artisan migrate:fresh --seed
```

## Menjalankan Aplikasi
```
php artisan serve
```
Setelah proses instalasi selesai, Anda dapat menjalankan aplikasi Laravel menggunakan server pengembangan bawaan:


Aplikasi sekarang dapat diakses melalui browser pada alamat [http://localhost:8000](http://localhost:8000).

## Catatan Tambahan

- Pastikan semua dependensi yang diperlukan telah terinstal sebelum menjalankan perintah `php artisan serve`.
- Selalu pastikan untuk menjalankan migrasi dan mengisi basis data sebelum mencoba menjalankan aplikasi.
- Untuk konfigurasi dan pengaturan lebih lanjut, silakan merujuk ke dokumentasi resmi Laravel: [https://laravel.com/docs](https://laravel.com/docs).
