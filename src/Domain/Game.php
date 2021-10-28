<?php

/**
 * This file is part of totoloto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain;

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
}