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

        if ($serverScore === 'forty' && $receiverScore === 'forty') {
            return 'deuce';
        }

        return $serverScore . ':' . $receiverScore;
    }

}