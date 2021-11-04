<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Task;
use Exception;

class HomeController
{
    public function home()
    {
        $tasksArray = (new Task())->getTasks();

        return require_once __DIR__ . '/../Views/home.view.php';
    }

    public function add()
    {
        try {
            $task = new Task();
            $task->addTask();
            header("Location: /");
        } catch (Exception $e) {
            $error = $e->getMessage();
            $tasksArray = (new Task())->getTasks();

            return require_once __DIR__ . '/../Views/home.view.php';
        }
    }

    public function delete(): void
    {
        $task = new Task();
        $tasksArray = $task->getTasks();

        unset($tasksArray[$_POST['deletedItem']]);

        $task->saveTasks(json_encode($tasksArray));
        header("Location: /");
    }

}