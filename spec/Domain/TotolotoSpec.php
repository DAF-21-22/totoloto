<?php

namespace spec\App\Domain;

use App\Domain\Bet;
use App\Domain\Game;
use App\Domain\Totoloto;
use PhpSpec\Exception\Example\FailureException;
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

    function it_generates_a_list_of_bets(Game\NumbersGenerator $generator)
    {
        $this->withGenerator($generator);

        $numbers = [1, 2, 3, 4, 5];
        $extras = [3];

        $generator->generate($this->totalNumbers, $this->startNumber, $this->endNumber)
            ->willReturn($numbers);
        $generator->generate($this->totalExtras, 1, 13)
            ->willReturn($extras);

        $totalBets = 1;
        $bets = $this->generate($totalBets);
        $bets->shouldBeArray();
        $bets->shouldHaveCount($totalBets);

        foreach ($bets->getWrappedObject() as $bet) {
            if (!$bet instanceof Bet) {
                throw new FailureException(
                    "Expected to have a bet, but it wasn't..."
                );
            }
        }

        $bets[0]->numbers()->shouldBe($numbers);
    }
}
