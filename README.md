# ChikurinKom

## Release

* Version: 0.6(beta)
* Date: 15 December 2024

## Overview

ChikurinKom merupakan aplikasi website E-commerce yang menjual perangkat keras. Perangkat keras yang dijual adalah device seperti monitor, laptop, _smartphone_, ataupun PC. Aplikasi website ini dikontrol penuh oleh admin. ChikurinKom menggunakan framework laravel dengan starter kit breeze (API only), sehingga memiliki fitur authentication pada aplikasi. Database yang digunakan adalah MySQL. ChikurinKom memiliki fitur pencarian objek pada gambar.

## Requirement
* PHP 8.2.4
* XAMPP 8.2.4
* Laravel 11.34.2
* phpMyAdmin 5.2.1
* Bootstrap 5.3.2
* JQuery 3.7.1
* Breeze 2.2.6

## Fitur

### Path

| Path          | Keterangan                    |
| ------------- |-------------------------------|
| /             | Home                          |
| /register     | Register                      |
| /login        | Login                         |
| /g/{category}/{page}  | List barang<ul><li>category: All, Monitor, Laptop, Mobile, PC</li><li>page: [int]</li></ul>    |
| /promotion    | Promotion list (belum tersedia)   |
| /u/{uid}      | User<ul><li>uid: [int]</li></ul> |
| /u/{uid}/overview | Bio user                  |
| /u/{uid}/comments | List komentar user        |
| /u/{uid}/notifications | List notifikasi user |
| /u/{uid}/wishlist | List wishlist user        |
| /edit_user    | Name update                   |
| /i/{iid}      | Detailed item<ul><li>iid: [int]</li></ul> |
| /image_search | Image search                  |
| /item         | Form tambah item              |
| /search       | Pencarian (teks)              |
| /transaction  | List transaksi                |

### API

| Path          | Keterangan                    |
| ------------- |-------------------------------|
| /register     | Register                      |
| /login        | Login                         |
| /logout       | Logout                        |
| /edit_user    | Ubah nama user                |
| /edit_user_photo | Ubah foto profil user      |
| /delete_user  | Hapus user                    |
| /comment      | CD Komentar                   |
| /image_search | Image search                  |
| /item         | CRUD barang                   |
| /transaction  | CU transaksi                  |
| /wishlist     | CD wishlist                   |

### Tabel dan Authorization

| Tabel             | Available?    | Admin | User (self)   | Guest |
| ----------------- |---------------|-------|---------------|-------|
| users             | Yes           | CRUD  | RUD           | CR    |
| users_pictures    | Yes           | CRUD  | CRUD          | R     |
| items             | Yes           | CRUD  | RU            | R     |
| transactions      | Yes           | CRUD  | CR            | -     |
| wishlists         | Yes           | CRUD  | CRD           | -     |
| comments          | Yes           | CRUD  | CRUD (all)    | R     |
| bio               | Yes           | CRUD  | CRUD          | R     |

Keterangan:

* CRUD: Create, Read, Update, Delete

## Hal yang belum tersedia

* Ganti password (opsional)

## Catatan Penting

### Buka aplikasi

* Pastikan requirement sesuai versi
* Pastikan database menyala

Membuka aplikasi

1. Pada xampp, nyalakan Apache dan MySQL
2. Pada command, tulis
    
    ```
    php artisan serve
    ```
3. Buka aplikasi di website menggunakan link pada command

### Route belum update

1. Tulis pada command project
    
    ```
    php artisan optimize
    ```

### Gambar tidak dapat ditampilkan
1. Pastikan tidak ada directory 'storage' pada directory 'public'
2. Tulis pada command project
    
    ```
    php artisan storage:link
    ```


## Riwayat

### Beta

| Versi  | Tanggal Rilis     | Keterangan Update        |
| ------ |-------------------|--------------------------|
| 0.6    | 15 Desember 2024  | <ul><li>Penambahan Guzzle</li><li>Penambahan Roboflow</li><li>Update foto profil</li></ul> |
| 0.5    | 14 Desember 2024  | Update masif<ul><li>5 tabel tambahan</li><li>Puluhan route tambahan</li></ul> |
| 0.4    | 4 Desember 2024   | <ul><li>Breeze API</li><li>Authentication (register, login)</li><li>Edit nama user</li></ul> |
| 0.3    | 17 November 2024  | <ul><li>Upload gambar</li></ul> |
| 0.2    | 14 November 2024  | <ul><li>Perubahan route</li></ul> |
| 0.1    | 26 September 2024 | <ul><li>Route</li><li>View</li></ul> |