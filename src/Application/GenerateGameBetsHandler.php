<?php

namespace App\Application;

use App\Domain\Game;

/**
 * GenerateGameBetsHandler
 *
 * @package App\Application
 */
class GenerateGameBetsHandler
{
    /**
     * handle
     *
     * @param GenerateGameBetsCommand $command
     * @return Game
     */
    public function handle(GenerateGameBetsCommand $command): Game
    {
        $class = $command->gameType();
        $game = new $class;
        $game->generate($command->betCount());
        return $game;
    }
}
