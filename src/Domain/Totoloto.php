<?php

namespace App\Domain;

use JetBrains\PhpStorm\Pure;

/**
 * Totoloto
 *
 * @package App\Domain
 */
class Totoloto extends Game
{

    #[Pure]
    public function __construct()
    {
        parent::__construct(1, 49, 5, 1);
        $this->endExtras = 13;
    }
}
