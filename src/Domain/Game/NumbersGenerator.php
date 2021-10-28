<?php

namespace App\Domain\Game;

class NumbersGenerator
{


    public function generate(int $count, int $start, int $end)
    {
        $baseNumbers = [];
        for ($i = $start; $i <= $end; $i++) {
            $baseNumbers[] = $i;
        }

        $keys = array_rand($baseNumbers, $count);
        $numbers = [];

        foreach ($keys as $key) {
            $numbers[] = $baseNumbers[$key];
        }

        return $numbers;
    }
}
