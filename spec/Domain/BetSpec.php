<?php

namespace spec\App\Domain;

use App\Domain\Bet;
use PhpSpec\ObjectBehavior;

class BetSpec extends ObjectBehavior
{
    private $numbers;
    private $extras;

    function let()
    {
        $this->numbers = [2, 32, 65, 12, 33];
        $this->extras = [2, 6];
        $this->beConstructedWith(
            $this->numbers,
            $this->extras
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Bet::class);
    }

    function it_has_a_numbers()
    {
        $this->numbers()->shouldBe($this->numbers);
    }

    function it_has_a_extras()
    {
        $this->extras()->shouldBe($this->extras);
    }
}
