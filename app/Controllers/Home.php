<?php

 declare(strict_types=1);

 namespace App\Controllers;
 use App\Models\Items;

 class Home
 {
     public function home(): int
     {
         $newFile = new Items();
         $file = $newFile->getItems();
         return require_once __DIR__ . '/../Views/home.php';
     }

     public function add(): void
     {
         $item = new Items();
         $item->addItems();
         header("Location: /");
     }

     public function delete(): void
     {
         $items = new Items();
         $file = $items->getItems();

         unset($file[$_POST['deletedItem']]);

         $items->saveItems(json_encode($file));
         header("Location: /");
     }

 }