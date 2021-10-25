<?php

 declare(strict_types=1);

 namespace App\Controllers;
 use App\Models\Items;
 class Home
 {
     public function home()
     {
         return require_once __DIR__ . '/../Views/home.php';
     }

     public function add()
     {
         $item = new Items();
         $item->addItems();
         if (!isset($_SESSION)) {
             session_start();
         }
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $_SESSION['postdata'] = $_POST;
             unset($_POST);
             header("Location: /");
             exit;
         }
     }
 }