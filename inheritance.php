<?php

class Produk
{
   public $judul;
   public $penulis;
   public $penerbit;
   public $harga;
   public $jmlHalaman;
   public $waktuMain;
   public $tipe;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe = "")
   {
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->penerbit = $penerbit;
      $this->harga = $harga;
      $this->jmlHalaman = $jmlHalaman;
      $this->waktuMain = $waktuMain;
      $this->tipe = $tipe;
   }

   public function getLabel()
   {
      return "Judul produk ini adalah " . $this->judul . " dan dibuat oleh " . $this->penulis;
   }

   public function getInfoProduk()
   {
      $str = "{$this->tipe} : {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      if ($this->tipe == "Komik") {
         // penggabungan string
         $str .= " - {$this->jmlHalaman} Halaman.";
      } else if ($this->tipe == "Game") {
         $str .= " - {$this->waktuMain} Jam.";
      }
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

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50, "Game");

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
