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
        $this->score = '0,0';
    }

    public function getPoints(): string
    {
        return $this->score;
    }

    public function addPointsToServer(): void
    {
        if ($this->score === '0,0') {
            $this->score = '15,0';
        } elseif ($this->score === '15,0') {
            $this->score = '30,0';
        } else {
            $this->score = '40,0';
        }
    }
}