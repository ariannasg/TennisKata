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

        $serverPoints = $this->server->getPointsWon();
        $receiverPoints = $this->receiver->getPointsWon();

        if ($serverPoints >= 3 && $receiverPoints >= 3) {
            if ($serverPoints - $receiverPoints === 1) {
                return TennisScoreEnum::ADVANTAGE . '-' . $this->receiver->getScore();
            }
            if ($receiverPoints - $serverPoints === 1) {
                return $this->server->getScore() . '-' . TennisScoreEnum::ADVANTAGE;
            }
        }

        return $this->server->getScore() . '-' . $this->receiver->getScore();
    }

    /**
     * @return bool
     */
    private
    function isDeuce(): bool
    {
        $serverPoints = $this->server->getPointsWon();
        $receiverPoints = $this->receiver->getPointsWon();

        return $serverPoints >= 3 && $receiverPoints >= 3 && $serverPoints === $receiverPoints;
    }
}