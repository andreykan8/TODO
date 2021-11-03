<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Models\Item;
use Exception;

class HomePage
{
     public function home()
     {
         $newFile = new Item();
         $file = $newFile->getItems();
         return require_once __DIR__ . '/../Views/home.php';
     }

     public function add()
     {
         try {
             $item = new Item();
             $item->addItem();
             header("Location: /");
         }catch(Exception $e) {
             $error = $e->getMessage();
             $file = file_get_contents('data.json');
             return require_once __DIR__ . '/../Views/home.php';
         }
     }

     public function delete(): void
     {
         $items = new Item();
         $file = $items->getItems();

         unset($file[$_POST['deletedItem']]);

         $items->saveItems(json_encode($file));
         header("Location: /");
     }

}