<?php

namespace spec\App\Domain;

use App\Domain\Game;
use App\Domain\Totoloto;
use PhpSpec\ObjectBehavior;

class TotolotoSpec extends ObjectBehavior
{
    private $startNumber;
    private $endNumber;
    private $totalNumbers;
    private $totalExtras;

    function let()
    {
        $this->startNumber = 1;
        $this->endNumber = 49;
        $this->totalNumbers = 5;
        $this->totalExtras = 1;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Totoloto::class);
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
