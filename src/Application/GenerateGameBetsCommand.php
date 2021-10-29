<?php

namespace App\Application;

class GenerateGameBetsCommand
{
    /**
     * Creates a GenerateGameBetsCommand
     *
     * @param string $gameType
     * @param int $betCount
     */
    public function __construct(
        private string $gameType,
        private int $betCount = 1
    ) {
    }

    /**
     * gameType
     *
     * @return string
     */
    public function gameType(): string
    {
        return $this->gameType;
    }

    /**
     * betCount
     *
     * @return int
     */
    public function betCount(): int
    {
        return $this->betCount;
    }
}
