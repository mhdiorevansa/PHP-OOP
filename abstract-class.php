<!-- kelas abstrak merupakan kelas yang tidak dapat diinstansiasi secara langsung -->
<!-- kelas abstrak berfungsi sebagai kerangka dasar untuk kelas turunannya -->

<?php

// untuk membuat class abstract tinggal tambahkan saja keyword abstract
abstract class Produk
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

   // jika menggunakan abstract method, hanya tampilkan interface saja tanpa implementasi
   // method abstract ini harus digunakan di kelas turunan
   abstract public function getInfoProduk();

   public function getInfo()
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

   // penerapan abstract method dari class Produk
   public function getInfoProduk()
   {
      $str = "Komik :" . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
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

   // penerapan abstract method dari class Produk
   public function getInfoProduk()
   {
      $str = "Game :" . $this->getInfo() . "  - {$this->waktuMain} Jam.";
      return $str;
   }
}

class CetakInfoProduk
{
   public $daftarProduk = [];

   public function tambahProduk(Produk $produk)
   {
      $this->daftarProduk[] = $produk;
   }

   public function cetak()
   {
      $str = 'DAFTAR PRODUK : <br>';
      foreach($this->daftarProduk as $item) {
         $str .= '- ' . $item->getInfoProduk() . '<br>';
      }
      return $str;   
   }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$cetakInfoProduk = new CetakInfoProduk();
$cetakInfoProduk->tambahProduk($produk1);
$cetakInfoProduk->tambahProduk($produk2);
echo $cetakInfoProduk->cetak();
