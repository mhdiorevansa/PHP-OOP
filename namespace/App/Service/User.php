<?php namespace App\Service;
// ini merupakan penulisan namespace -->
// jika ada kelas yang sama dia berada di namespace yang berbeda

class User
{
   public function __construct()
   {
      echo 'ini adalah kelas ' . __CLASS__;
   }
}