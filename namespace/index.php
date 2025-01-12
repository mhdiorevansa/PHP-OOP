<?php 

// init sebagai pemanggil kelas
require_once 'App/init.php';

// use digunakan untuk menggunakan sebuah namespace, dan ketika class nya sama maka kita bisa gunakan alias
// dengan menggunakan use dan alias, kita tidak perlu menuliskan namespace saat menginisiasi sebuah kelas
use App\Service\User as UserService; 
use App\Produk\User as UserProduk;

$user = new UserProduk();
echo "<br>";
$service = new UserService();