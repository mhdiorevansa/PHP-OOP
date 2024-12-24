<!-- visibility membuat atribut atau method tidak bisa diakses dari luar -->
<?php

class Produk
{
   public $judul;
   public $penulis;
   protected $diskon = 0;

   // visibility private, membuat atribut tidak bisa dipanggil dari luar. bahkan di dalam child class juga tidak bisa. hanya bisa di class tersebut
   private $penerbit;

   // visibility protected, membuat atribut tidak bisa dipanggil dari luar. kecuali di dalam class dan child class yang bersangkutan
   protected $harga;

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

   // buat method untuk mengakses atribut penerbit yang private
   public function getPenerbit()
   {
      return $this->penerbit;
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

   public function setDiskon($diskon)
   {
      $this->diskon = $diskon;
   }

   // cara menampilkan atribut protected, buatlah sebuah method yang mengembalikan nilai dari atribut protected
   public function getHargaGame()
   {
      return $this->harga - ($this->harga * $this->diskon / 100);
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

// panggil harga yang merupakan atribut protected
$produk2->setDiskon(50);
echo $produk2->getHargaGame();
echo "<br>";
// panggil penerbit yang merupakan atribut private
echo $produk2->getPenerbit();
