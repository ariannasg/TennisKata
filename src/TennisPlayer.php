<?php declare(strict_types=1);

namespace TennisKata;

class TennisPlayer
{
    /**
     * @var int
     */
    private $pointsWon;

    private const POINTS_TO_SCORE_MAPPING = [
        0 => TennisScoreEnum::LOVE,
        1 => TennisScoreEnum::FIFTEEN,
        2 => TennisScoreEnum::THIRTY,
        3 => TennisScoreEnum::FORTY
    ];

    public function __construct()
    {
        $this->pointsWon = 0;
    }

    public function getScore(): string
    {
        if (array_key_exists($this->pointsWon, self::POINTS_TO_SCORE_MAPPING)) {
            return self::POINTS_TO_SCORE_MAPPING[$this->pointsWon];
        }

        return 'unknown';
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