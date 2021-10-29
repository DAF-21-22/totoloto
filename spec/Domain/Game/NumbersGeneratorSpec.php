<?php

namespace spec\App\Domain\Game;

use App\Domain\Game\NumbersGenerator;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;

class NumbersGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NumbersGenerator::class);
    }

    function it_generates_random_numbers()
    {
        $count = 3;
        $start = 10;
        $end = 50;
        $numbers = $this->generate($count, $start, $end);
        $numbers->shouldBeArray();
        $numbers->shouldHaveCount($count);

        foreach ($numbers->getWrappedObject() as $number) {
            if (!is_numeric($number)) {
                throw new FailureException(
                    "Expecting list item to be a number, but it isn't ..."
                );
            }
        }
    }

    function its_generated_numbers_cannot_repeat()
    {
        $count = 5;
        $start = 10;
        $end = 20;
        $numbers = $this->generate($count, $start, $end);

        $checkNumbers = [];
        foreach ($numbers->getWrappedObject() as $number) {
            if (in_array($number, $checkNumbers)) {
                throw new FailureException(
                    "Found a number that is repeated on result list."
                );
            }
            $checkNumbers[] = $number;
        }
    }

    function it_sorts_result_numbers()
    {
        $count = 9;
        $start = 10;
        $end = 20;
        $numbers = $this->generate($count, $start, $end);
        $last = $start -1;
        foreach ($numbers->getWrappedObject() as $number) {
            if ($number <= $last) {
                throw new FailureException(
                    "List is not sort correctly."
                );
            }
            $last = $number;
        }
    }

    function it_can_generate_one_number_only()
    {
        $numbers = $this->generate(1, 1, 100);
        $numbers->shouldBeArray();
        $numbers->shouldHaveCount(1);
    }
}
