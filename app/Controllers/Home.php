<?php

 declare(strict_types=1);

 namespace App\Controllers;
 use App\Models\Items;

 class Home
 {
     public function home()
     {
         $file = (new Items())->getItems();
         return require_once __DIR__ . '/../Views/home.php';
     }

     public function add()
     {
         $item = new Items();
         $item->addItems();
         header("Location: /");
     }
 }