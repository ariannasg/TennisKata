<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisGame;
use TennisKata\TennisPlayer;

class TennisGameTest extends TestCase
{
    public function testGameScoreWhenNoneOfThePlayersHaveScoredAnyPoints(): void {
        $server = new TennisPlayer();
        $receiver = new TennisPlayer();

        $tennisGame = new TennisGame($server, $receiver);

        self::assertEquals(
            'love:love',
            $tennisGame->getScore(),
            'When both players have 0pts, then the game score should be: "love:love"'
        );
    }

    public function testGameScoreWhenTheServerWinsOnePointAndTheReceiverHasZero(): void {
        $server = new TennisPlayer();
        $receiver = new TennisPlayer();

        $tennisGame = new TennisGame($server, $receiver);
        $server->winPoint();

        self::assertEquals(
            'fifteen:love',
            $tennisGame->getScore(),
            'When the server wins one point, then the game score should be: "fifteen:love"'
        );
    }

    public function testGameScoreWhenTheReceiverWinsOnePointAndTheServerHasZero(): void {
        $server = new TennisPlayer();
        $receiver = new TennisPlayer();

        $tennisGame = new TennisGame($server, $receiver);
        $receiver->winPoint();

        self::assertEquals(
            'love:fifteen',
            $tennisGame->getScore(),
            'When the receiver wins one point, then the game score should be: "love:fifteen"'
        );
    }

    public function testGameScoreWhenBothTheServerAndTheReceiverWinOnePoint(): void {
        $server = new TennisPlayer();
        $receiver = new TennisPlayer();

        $tennisGame = new TennisGame($server, $receiver);
        $server->winPoint();
        $receiver->winPoint();

        self::assertEquals(
            'fifteen:fifteen',
            $tennisGame->getScore(),
            'When both players win one point, then the game score should be: "fifteen:fifteen"'
        );
    }
}
