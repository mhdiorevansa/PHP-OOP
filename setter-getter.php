<!-- setter untuk set data, getter untuk get data -->
<?php

class Produk
{
   private $judul,
      $penulis,
      $penerbit,
      $diskon = 0,
      $harga;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
   {
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->penerbit = $penerbit;
      $this->harga = $harga;
   }

   // ini merupakan getter method 
   public function getInfoProduk()
   {
      $str = " {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      return $str;
   }

   public function getPenerbit()
   {
      return $this->penerbit;
   }

   public function getJudul()
   {
      return $this->judul;
   }

   public function getPenulis()
   {
      return $this->penerbit;
   }

   public function getHargaGame()
   {
      return $this->harga - ($this->harga * $this->diskon / 100);
   }

   // ini merupakkan setter method
   public function setJudul($judul)
   {
      // di setter method kita bisa melakukan validasi data
      if (!is_string($judul)) {
         throw new Exception("Judul harus string");
      }
      $this->judul = $judul;
   }

   public function setPenulis($penulis)
   {
      $this->penulis = $penulis;
   }

   public function setPenerbit($penerbit)
   {
      $this->penerbit = $penerbit;
   }

   public function setDiskon($diskon)
   {
      $this->diskon = $diskon;
   }
}

class Komik extends Produk
{
   public $jmlHalaman;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
   {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->jmlHalaman = $jmlHalaman;
   }

   public function getInfoProduk()
   {
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
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHargaGame();
echo "<br>";
echo $produk2->getPenerbit();
echo "<hr>";

$produk1->setJudul("Saskehh");
echo $produk1->getJudul();
