<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Models\Task;
use Exception;

class HomePage
{
     public function home()
     {
         $jsonArray = (new Task())->getTasks();
         return require_once __DIR__ . '/../Views/home.php';
     }

     public function add()
     {
         try {
             $task = new Task();
             $task->addTask();
             header("Location: /");
         }catch(Exception $e) {
             $error = $e->getMessage();
             $jsonArray = (new Task())->getTasks();
             return require_once __DIR__ . '/../Views/home.php';
         }
     }

     public function delete(): void
     {
         $task = new Task();
         $file = $task->getTasks();

         unset($file[$_POST['deletedItem']]);

         $task->saveTasks(json_encode($file));
         header("Location: /");
     }

}