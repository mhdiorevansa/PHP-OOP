<?php

class Game extends Produk implements infoProduk
{
   public $waktuMain;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
   {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->waktuMain = $waktuMain;
   }

   public function getInfo() 
   {
      $str = " {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      return $str;
   }

   // ini merupakan method dari interface, yang wajib digunakan jika mengimplements kelas interface
   public function getInfoProduk()
   {
      $str = "Game :" . $this->getInfo() . "  - {$this->waktuMain} Jam.";
      return $str;
   }
}