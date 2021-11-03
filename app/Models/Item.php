<?php

declare(strict_types=1);

namespace App\Models;
use Exception;
class Item
{
    public string $message;

    public function addItem(): void
    {
        if (file_exists('data.json')) {
            $input = file_get_contents('data.json');
            $tempArray = json_decode($input, true);
            $tempArray[$_POST['item']] = true;
            if (isset($_POST['item'], $tempArray)) {
                throw new Exception('Task already exists');
            }
        } else {
            $tempArray = [$_POST['item'] => true];
        }
        $file = json_encode($tempArray, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $file);

    }

    public function getItems(): array
    {
        if (!file_exists('data.json')) {
            return [];
        }
        return json_decode(file_get_contents('data.json'), true);
    }

    public function saveItems(string $file): void
    {
        file_put_contents('data.json', $file);
    }
}