<?php

declare(strict_types=1);

namespace App\Models;

use Exception;

class Task
{
    protected const JSON = 'data.json';

    public function addTask(): void
    {
        if (file_exists(self::JSON)) {
            $input = file_get_contents(self::JSON);
            $tempArray = json_decode($input, true);
            if (array_key_exists($_POST['item'], $tempArray)) {
                throw new Exception('Task already exists');
            }
            $tempArray[$_POST['item']] = true;
        } else {
            $tempArray = [$_POST['item'] => true];
        }
        $file = json_encode($tempArray, JSON_PRETTY_PRINT);
        file_put_contents(self::JSON, $file);

    }

    public function getTasks(): array
    {
        if (!file_exists(self::JSON)) {
            return [];
        }
        return json_decode(file_get_contents(self::JSON), true);
    }

    public function saveTasks(string $file): void
    {
        file_put_contents(self::JSON, $file);
    }
}