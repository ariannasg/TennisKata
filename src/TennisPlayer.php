<?php declare(strict_types=1);

namespace TennisKata;

class TennisPlayer
{
    /**
     * @var string
     */
    private $score;

    public function __construct()
    {
        $this->score = 'love';
    }

    public function getScore(): string
    {
        return $this->score;
    }

    public function winPoint(): void
    {
        if ($this->score === 'love') {
            $this->score = 'fifteen';
        } elseif ($this->score === 'fifteen') {
            $this->score = 'thirty';
        } else {
            $this->score = 'forty';
        }
    }
}