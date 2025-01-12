<?php

spl_autoload_register(function($class) {
   // App\Produk\User = kalau di explode jadi seperti ini ["App", "Produk", "User"]
   // explode berfungsi untuk memecah string
   $class = explode('\\', $class);
   // end mengambil atribut terakhir pada array
   $class = end($class);
   require_once 'Produk/' . $class . '.php';
});

spl_autoload_register(function($class) {
   $class = explode('\\', $class);
   $class = end($class);
   require_once 'Service/' . $class . '.php';
});
