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
        switch ($this->pointsWon) {
            case 0:
                return TennisScoreEnum::LOVE;
            case 1:
                return TennisScoreEnum::FIFTEEN;
            case 2:
                return TennisScoreEnum::THIRTY;
            default:
                return TennisScoreEnum::FORTY;
        }
    }

    public function winPoint(): void
    {
        $this->pointsWon++;
    }

    /**
     * @return int
     */
    public function getPointsWon(): int
    {
        return $this->pointsWon;
    }
}