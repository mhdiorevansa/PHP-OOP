<?php

// autoloading berfungsi untuk memanggil semua file yang ada di sebuah folder
// autoloading berfungsi untuk pemanggilan file class tanpa harus require once satu per satu

// require_once 'Produk/infoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/CetakInfoProduk.php';

spl_autoload_register(function($class) {
   require_once 'Produk/' . $class . '.php';
});
