<?php

declare(strict_types=1);

namespace App\Models;

class Items
{
    public function addItems(): void
    {
        $input = file_get_contents('data.json');
        $tempArray = json_decode($input);
        array_push($tempArray, $_POST['item']);
        $file = json_encode($tempArray);
        file_put_contents('data.json', $file);
    }
}