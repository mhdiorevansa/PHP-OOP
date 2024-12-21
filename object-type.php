<!-- property merupakan representasi data dari object, atau variabel yang ada di dalam object, dan didepannya ditambah dengan visibility -->

<!-- method merupakan representasi perilaku dari object, dan juga function didalam object. method boleh dipakai visibility boleh engga. kalau tidak dianggap public -->

<?php

class Produk
{
   // ini merupakan property
   // di property kita bisa asign value defaultnya
   public $judul;
   public $penulis;
   public $penerbit;
   public $harga;

   // constructor akan dijalankan otomatis ketika object dibuat, constructor juga dijadikan parameter pada sebuah class. kita bisa juga assign value defaultnya
   public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
   {
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->penerbit = $penerbit;
      $this->harga = $harga;
   }

   // ini merupakan method
   public function getLabel()
   {
      // panggil atribut
      // kita menggunakan $this karena mengambil variabel atau atribut dari luar
      return "Judul produk ini adalah " . $this->judul . " dan dibuat oleh " . $this->penulis;
   }
}

// class ini untuk mencetak info lengkap dari object yang dibuat
class CetakInfoProduk
{
   public function cetak(Produk $produk)
   {
      $str = "{$produk->getLabel()}. harganya {$produk->harga}";
      return $str;
   }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000);

echo "Komik :" . $produk1->getLabel();
echo "<br>";
echo "Game :" . $produk2->getLabel();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk2);
