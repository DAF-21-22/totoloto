<?php

namespace App\Domain;

class Bet
{

    /**
     * Creates a Bet
     *
     * @param array $numbers
     * @param array $extras
     */
    public function __construct(
        private array $numbers,
        private array $extras
    ) {
    }

    /**
     * numbers
     *
     * @return array
     */
    public function numbers(): array
    {
        return $this->numbers;
    }

    /**
     * extras
     *
     * @return array
     */
    public function extras(): array
    {
        return $this->extras;
    }
}
