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
}
