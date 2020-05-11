<?php declare(strict_types=1);

namespace TennisKata;

class TennisGame
{
    /**
     * @var TennisPlayer
     */
    private $server;
    /**
     * @var TennisPlayer
     */
    private $receiver;

    /**
     * TennisGame constructor.
     * @param TennisPlayer $server
     * @param TennisPlayer $receiver
     */
    public function __construct(TennisPlayer $server, TennisPlayer $receiver)
    {
        $this->server = $server;
        $this->receiver = $receiver;
    }

    public function getScore(): string
    {
        if ($this->isDeuce()) {
            return TennisScoreEnum::DEUCE;
        }

        return $this->server->getScore() . '-' . $this->receiver->getScore();
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        $serverPoints = $this->server->getPointsWon();
        $receiverPoints = $this->receiver->getPointsWon();

        return $serverPoints === $receiverPoints && $serverPoints >= 3 && $receiverPoints >= 3;
    }

}