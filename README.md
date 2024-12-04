# ChikurinCom

## Release

* Version: 0.4(beta)
* Date: 4 December 2024

## Overview

ChikurinCom merupakan aplikasi website E-commerce yang menjual perangkat keras. Perangkat keras yang dijual adalah device seperti monitor, laptop, _smartphone_, ataupun PC. Aplikasi website ini dikontrol penuh oleh admin. ChikurinCom menggunakan framework laravel dengan starter kit breeze (API only), sehingga memiliki fitur authentication pada aplikasi. Database yang digunakan adalah MySQL.

## Requirement
* PHP 8.2.4
* XAMPP 8.2.4
* Laravel 11.34.2
* phpMyAdmin 5.2.1
* Bootstrap 5.3
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
| /u/{uid}/{menu}   | User<ul><li>uid: [int]</li><li>menu: Overview, Komentar, Notifikasi, Wishlist, Keranjang, Riwayat Pembelian</li></ul>    |
| /u/{uid}/edit_user    | Name update (login required)<ul><li>uid: [int]</li></ul>  |
| /i/{iid}      | Detailed item<ul><li>iid: [int]</li></ul> |
| /image_search | Image search                  |

### API

| Path          | Keterangan                    |
| ------------- |-------------------------------|
| /register     | Register                      |
| /login        | Login                         |
| /logout       | Logout                        |
| /u/{uid}/edit_user    | User's name edit (sementara)<ul><li>uid: [int]</li></ul>  |

### Tabel dan Authorization

| Tabel             | Available?    | Admin | User (self)   | Guest |
| ----------------- |---------------|-------|---------------|-------|
| users             | Yes           | CRUD  | CRUD          | CR    |
| users_pictures    | Yes           | CRUD  | CRUD          | R     |
| items             | No            | CRUD  | R             | R     |
| items_pictures    | No            | CRUD  | R             | R     |
| transactions      | No            | CRUD  | CR            | -     |
| wishlists         | No            | CRUD  | CRD           | -     |
| comments          | No            | CRUD  | CRUD (all)    | R     |
| likes             | No            | CRUD  | CRD           | R     |

Keterangan:

* CRUD: Create, Read, Update, Delete
* likes (R): terlihat hanya jumlah siapa yang like

## Hal yang belum tersedia

* Upload foto profil (tabel sudah ada, FK dengan id di tabel users)
* Edit foto profil
* Ganti password (opsional)
* Database barang
* CRUD barang
* API roboflow
* Database transaksi (opsional, versi rilis)

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
1. Tulis pada command project
    
    ```
    php artisan storage:link
    ```


## Riwayat

### Beta

| Versi  | Tanggal Rilis     | Keterangan Update        |
| ------ |-------------------|--------------------------|
| 0.4    | 4 Desember 2024   | <ul><li>Breeze API</li><li>Authentication (register, login)</li><li>Edit nama user</li></ul> |
| 0.3    | 17 November 2024  | <ul><li>Upload gambar</li></ul> |
| 0.2    | 14 November 2024  | <ul><li>Perubahan route</li></ul> |
| 0.1    | 26 September 2024 | <ul><li>Route</li><li>View</li></ul> |
