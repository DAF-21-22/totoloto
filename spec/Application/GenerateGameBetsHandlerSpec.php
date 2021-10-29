<?php

namespace spec\App\Application;

use App\Application\GenerateGameBetsCommand;
use App\Application\GenerateGameBetsHandler;
use App\Domain\EuroMilhoes;
use PhpSpec\ObjectBehavior;

class GenerateGameBetsHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GenerateGameBetsHandler::class);
    }

    function it_game_with_a_give_bet_count()
    {
        $gameType = EuroMilhoes::class;
        $betCount = 5;
        $command = new GenerateGameBetsCommand(
            $gameType,
            $betCount
        );

        $game = $this->handle($command);
        $game->shouldBeAnInstanceOf($gameType);
        $game->bets()->shouldHaveCount($betCount);
    }
}
