<?php declare(strict_types=1);

namespace TennisKata;

class TennisPlayer
{
    /**
     * @var int
     */
    private $pointsWon;

    public function __construct()
    {
        $this->pointsWon = 0;
    }

    public function getScore(): string
    {
        if ($this->pointsWon === 0) {
            return 'love';
        }

        if ($this->pointsWon === 1) {
            return 'fifteen';
        }

        if ($this->pointsWon === 2) {
            return 'thirty';
        }

        return 'forty';
    }

    public function winPoint(): void
    {
        $this->pointsWon++;
    }
}