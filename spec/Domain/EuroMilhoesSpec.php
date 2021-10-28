<?php

namespace spec\App\Domain;

use App\Domain\EuroMilhoes;
use App\Domain\Game;
use PhpSpec\ObjectBehavior;

class EuroMilhoesSpec extends ObjectBehavior
{
    private $startNumber;
    private $endNumber;
    private $totalNumbers;
    private $totalExtras;

    function let()
    {
        $this->startNumber = 1;
        $this->endNumber = 50;
        $this->totalNumbers = 5;
        $this->totalExtras = 2;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EuroMilhoes::class);
    }

    function its_a_game()
    {
        $this->shouldHaveType(Game::class);
    }

    function it_has_a_start_number()
    {
        $this->startNumber()->shouldBe($this->startNumber);
    }

    function it_has_a_end_number()
    {
        $this->endNumber()->shouldBe($this->endNumber);
    }

    function it_has_a_total_numbers()
    {
        $this->totalNumbers()->shouldBe($this->totalNumbers);
    }

    function it_has_a_total_extras()
    {
        $this->totalExtras()->shouldBe($this->totalExtras);
    }
}
