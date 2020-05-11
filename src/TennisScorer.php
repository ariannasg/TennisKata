<?php declare(strict_types=1);

namespace TennisKata;

class TennisScorer
{
    /**
     * @var string
     */
    private $score;

    public function __construct()
    {
        $this->score = 'love, love';
    }

    public function getPoints(): string
    {
        return $this->score;
    }

    public function addPointsToServer(): void
    {
        if ($this->score === 'love, love') {
            $this->score = 'fifteen, love';
        } else {
            $this->score = 'thirty, love';
        }

    }
}