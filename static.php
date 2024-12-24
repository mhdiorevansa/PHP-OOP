<!-- static keyword, membuat sebuah atribut ataupun method terikat dengan class, bukan dengan object -->
<!-- nilai static akan selalu  tetap meskipun object di instansiasi berulang ulang -->
<!-- static keyword biasa digunakan untuk membuat fungsi helper/bantuan -->

<?php

class ContohStatic
{
   // membuat atribut static
   public static $angka = 1;

   public static function halo()
   {
      // untuk mengambil atribut static gunakan self, kenapa tidak menggunakan this? karena this hanya untuk object yang di instansiasi
      return "halo " . self::$angka++;
   }

   // method non static
   public function halo2()
   {
      return "halo " . self::$angka++ . "<br>";
   }
}

// mengakses atribut static
echo ContohStatic::$angka;
echo "<br> <hr>";
// mengakses method static
echo ContohStatic::halo();
echo "<br> <hr>";

echo ContohStatic::halo();
echo "<br> <hr>";

$obj1 = new ContohStatic();
// kalau methodnya non static, harus diinstansiasi terlebih dahulu seperti biasanya
echo $obj1->halo2();
echo $obj1->halo2();
echo $obj1->halo2();
echo "<br> <hr>";

// nilai nya bakal tetap increment meskipun object di instansiasi berulang ulang, karena atribut yang di increment bersifat static
$obj2 = new ContohStatic();
echo $obj2->halo2();
echo $obj2->halo2();
echo $obj2->halo2();
