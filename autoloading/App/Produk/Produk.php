<?php

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