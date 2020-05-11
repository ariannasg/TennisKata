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
        $serverScore = $this->server->getScore();
        $receiverScore = $this->receiver->getScore();
        $serverPoints = $this->server->getPointsWon();
        $receiverPoints = $this->receiver->getPointsWon();

        if ($this->isDeuce($serverPoints, $receiverPoints)) {
            return TennisScoreEnum::DEUCE;
        }

        return $serverScore . '-' . $receiverScore;
    }

    /**
     * @param int $serverPoints
     * @param int $receiverPoints
     * @return bool
     */
    private function isDeuce(int $serverPoints, int $receiverPoints): bool
    {
        return $serverPoints === $receiverPoints && $serverPoints >= 3 && $receiverPoints >= 3;
    }

}