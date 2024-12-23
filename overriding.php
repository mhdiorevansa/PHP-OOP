<!-- overiding memungkinkan kita untuk menggunakan method dan construct dari parent class -->
<!-- overiding diawali dengan syntax parent:: -->
<?php

class Produk
{
   public $judul;
   public $penulis;
   public $penerbit;
   public $harga;
   public $waktuMain;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
   {
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->penerbit = $penerbit;
      $this->harga = $harga;
   }

   public function getInfoProduk()
   {
      $str = " {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      return $str;
   }
}

class Komik extends Produk
{
   public $jmlHalaman;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
   {
      // ini merupakan contoh overiding, kita menggunakan construct yang sama dengan parent. 
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->jmlHalaman = $jmlHalaman;
   }

   public function getInfoProduk()
   {
      // disini juga merupakan contoh overriding, memanggil method dari parent dengan nama method yang sama didalam child class. overriding tidak bisa dimasukkan ke dalam string
      $str = "Komik :" . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
      return $str;
   }
}

class Game extends Produk
{
   public $waktuMain;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
   {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->waktuMain = $waktuMain;
   }

   public function getInfoProduk()
   {
      $str = "Game :" . parent::getInfoProduk() . "  - {$this->waktuMain} Jam.";
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

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
