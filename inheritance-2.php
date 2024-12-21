<?php

class Produk
{
   public $judul;
   public $penulis;
   public $penerbit;
   public $harga;
   public $jmlHalaman;
   public $waktuMain;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0)
   {
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->penerbit = $penerbit;
      $this->harga = $harga;
      $this->jmlHalaman = $jmlHalaman;
      $this->waktuMain = $waktuMain;
   }

   public function getInfoProduk()
   {
      $str = "{$this->tipe} : {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      return $str;
   }
}

// konsep inheritance di php, child class bisa menggunakan semua atribut atau method dari parent class
// child class harus menggunakan extends parent class
class Komik extends Produk
{
   public function getInfoProduk()
   {
      $str = "Komik :  - {$this->jmlHalaman} Halaman.";
      return $str;
   }
}

class Game extends Produk
{
   public function getInfoProduk()
   {
      $str = "Game : {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga}) - {$this->waktuMain} Jam.";
      return $str;
   }
}

class CetakInfoProduk
{
   public function cetak(Produk $produk)
   {
      $str = "{$produk->getLabel()}. harganya {$produk->harga}";
      return $str;
   }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
