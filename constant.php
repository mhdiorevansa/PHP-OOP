<?php

// untuk membuat constanta, bisa menggunakan kata kunci define. nama konstantanya di parameter pertama, gunakan huruf besar
// define tidak bisa digunakan di dalam class. harus diluar, sebagai konstanta global
define('NAMA', 'Dio');

// untuk memanggil constanta seperti biasa, tapi tidak menggunakan $
echo NAMA;
echo "<br>";

// kita juga bisa membuat constanta dengan kata kunci const
// const bisa digunakan di dalam class
const UMUR = 22;
echo UMUR;
echo "<br>";

class Constanta
{
   // ini merupakan atribut static
   const NAMA = 'Azka';
}

// untuk memanggil atribut constant, gunakan static keyword. tapi tidak menggunakan $
echo Constanta::NAMA;
echo "<br> <hr>";

// ini merupakan magic constant, untuk deteksi line number
echo __LINE__;
echo "<br>";
// ini merupakan magic constant, untuk deteksi file
echo __FILE__;
echo  "<br>";
function halo()
{
   // ini merupakan magic constant, untuk deteksi function
   return __FUNCTION__;
}
echo halo();
echo "<br>";
class Coba
{
   // ini merupakan magic constant, untuk deteksi class
   public $kelas = __CLASS__;
}
$obj = new Coba();
echo $obj->kelas;
echo "<br>";
