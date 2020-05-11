<?php declare(strict_types=1);

namespace TennisKata;

class TennisPlayer
{
    /**
     * @var int
     */
    private $pointsWon;

    private const POINTS_TO_SCORE_MAPPING = [
        0 => 'love',
        1 => 'fifteen',
        2 => 'thirty',
        3 => 'forty'
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
}