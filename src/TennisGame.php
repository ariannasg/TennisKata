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

    /**
     * @return string
     */
    public function getScore(): string
    {
        if ($this->isDeuce()) {
            return TennisScoreEnum::DEUCE;
        }
        if ($this->serverHasAdvantage()) {
            return TennisScoreEnum::ADVANTAGE . '-' . $this->receiver->getScore();
        }
        if ($this->receiverHasAdvantage()) {
            return $this->server->getScore() . '-' . TennisScoreEnum::ADVANTAGE;
        }
        if ($this->serverIsTheWinner()) {
            return TennisScoreEnum::SERVER_WON;
        }
        if ($this->receiverIsTheWinner()) {
            return TennisScoreEnum::RECEIVER_WON;
        }

        return $this->server->getScore() . '-' . $this->receiver->getScore();
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->bothPlayersScoredAtLeastThreePoints() &&
            $this->server->getPointsWon() === $this->receiver->getPointsWon();
    }

    /**
     * @return bool
     */
    private function bothPlayersScoredAtLeastThreePoints(): bool
    {
        return $this->server->getPointsWon() >= 3 && $this->receiver->getPointsWon() >= 3;
    }

    /**
     * @return bool
     */
    private function serverHasAdvantage(): bool
    {
        return $this->bothPlayersScoredAtLeastThreePoints() &&
            $this->server->getPointsWon() - $this->receiver->getPointsWon() === 1;
    }

    /**
     * @return bool
     */
    private function receiverHasAdvantage(): bool
    {
        return $this->bothPlayersScoredAtLeastThreePoints() &&
            $this->receiver->getPointsWon() - $this->server->getPointsWon() === 1;
    }

    /**
     * @return bool
     */
    private function serverIsTheWinner(): bool
    {
        return $this->server->getPointsWon() >= 4 &&
            $this->server->getPointsWon() - $this->receiver->getPointsWon() >= 2;
    }

    /**
     * @return bool
     */
    private function receiverIsTheWinner(): bool
    {
        return $this->receiver->getPointsWon() >= 4 &&
            $this->receiver->getPointsWon() - $this->server->getPointsWon() >= 2;
    }
}