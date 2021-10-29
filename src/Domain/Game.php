<?php

/**
 * This file is part of totoloto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain;

use App\Domain\Game\NumbersGenerator;

/**
 * Game
 *
 * @package App\Domain
 */
abstract class Game
{

    private int $startNumber;
    private int $endNumber;
    private ?int $totalNumbers;
    private ?int $totalExtras;
    private NumbersGenerator $generator;
    protected int $startExtras = 1;
    protected int $endExtras = 12;
    protected array $bets = [];

    /**
     * Creates a Totoloto
     *
     * @param int $startNumber
     * @param int $endNumber
     * @param int|null $totalNumbers
     * @param int|null $totalExtras
     */
    public function __construct(
        int $startNumber,
        int $endNumber,
        ?int $totalNumbers = null,
        ?int $totalExtras = null
    ) {
        $this->startNumber = $startNumber;
        $this->endNumber = $endNumber;
        $this->totalNumbers = $totalNumbers;
        $this->totalExtras = $totalExtras;
        $this->generator = new NumbersGenerator();
    }

    /**
     * startNumber
     *
     * @return int
     */
    public function startNumber(): int
    {
        return $this->startNumber;
    }

    /**
     * endNumber
     *
     * @return int
     */
    public function endNumber(): int
    {
        return $this->endNumber;
    }

    /**
     * totalNumbers
     *
     * @return int|null
     */
    public function totalNumbers(): ?int
    {
        return $this->totalNumbers;
    }

    /**
     * totalExtras
     *
     * @return int|null
     */
    public function totalExtras(): ?int
    {
        return $this->totalExtras;
    }

    public function withGenerator(NumbersGenerator $generator): self
    {
        $this->generator = $generator;
        return $this;
    }

    /**
     * bets
     *
     * @return array
     */
    public function bets(): array
    {
        return $this->bets;
    }

    public function generate(int $totalBets)
    {
        $bets = [];
        for ($i = 0; $i < $totalBets; $i++) {
            $bets[$i] = new Bet(
                $this->generator->generate($this->totalNumbers, $this->startNumber, $this->endNumber),
                $this->generator->generate($this->totalExtras, $this->startExtras, $this->endExtras),
            );
        }
        $this->bets = $bets;
        return $bets;
    }
}