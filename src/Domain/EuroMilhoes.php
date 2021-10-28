<?php

namespace App\Domain;

class EuroMilhoes extends Game
{
    public function __construct()
    {
        parent::__construct(1, 50, 5, 2);
    }
}
