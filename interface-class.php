<!-- kelas interface adalah kelas murni yang sama sekali tidak memiliki implementasi -->
<!-- kelas interface tidak boleh memiliki properti, hanya deklarasi method saja. dan method wajib digunakan di kelas turunan -->
<!-- untuk kelas turunan dari kelas interface, tidak menggunakan extends tapi implements -->
<!-- semua method di kelas interface harus public visibility, dan boleh menggunakan construct -->
<!-- kelas turunan boleh menerapkan lebih dari 1 implements -->

<?php
// keyword untuk membuat class interface
interface infoProduk
{
   public function getInfoProduk();
}

abstract class Produk
{
   protected $judul,
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

   abstract public function getInfo();

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

// implementasi kelas interface dengan menggunakan keyword implements
class Komik extends Produk implements infoProduk
{
   public $jmlHalaman;

   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
   {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->jmlHalaman = $jmlHalaman;
   }

   public function getInfo() 
   {
      $str = " {$this->judul} | {$this->penulis}, {$this->penerbit} (Rp. {$this->harga})";
      return $str;
   }

   // ini merupakan method dari interface, yang wajib digunakan jika mengimplements kelas interface
   public function getInfoProduk()
   {
      $str = "Komik :" . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
      return $str;
   }
}

// implementasi kelas interface dengan menggunakan keyword implements
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
      foreach ($this->daftarProduk as $item) {
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
