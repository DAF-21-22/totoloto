<?php

namespace spec\App\Application;

use App\Application\GenerateGameBetsCommand;
use App\Domain\Totoloto;
use PhpSpec\ObjectBehavior;

class GenerateGameBetsCommandSpec extends ObjectBehavior
{

    private $gameType;
    private $betCount;

    function let()
    {
        $this->gameType = Totoloto::class;
        $this->betCount = 4;
        $this->beConstructedWith($this->gameType, $this->betCount);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GenerateGameBetsCommand::class);
    }

    function it_has_a_game_type()
    {
        $this->gameType()->shouldBe($this->gameType);
    }

    function it_has_a_bet_count()
    {
        $this->betCount()->shouldBe($this->betCount);
    }
}
