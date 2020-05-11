<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisPlayer;

class TennisPlayerTest extends TestCase
{
    public function providePlayerScoreWhenWinningPoints(): array
    {
        return [
            [0, 'love'],
            [1, 'fifteen'],
            [2, 'thirty'],
            [3, 'forty'],
        ];
    }

    /**
     * @dataProvider providePlayerScoreWhenWinningPoints
     * @param int $numberOfPoints
     * @param string $expectedScore
     */
    public function testThePlayerScoreWhenWinningPoints(int $numberOfPoints, string $expectedScore): void
    {
        $tennisPlayer = new TennisPlayer();

        for ($i = 1; $i <= $numberOfPoints; $i++) {
            $tennisPlayer->winPoint();
        }

        $score = $tennisPlayer->getScore();
        $pointsString = $numberOfPoints === 1 ? 'point' : 'points';

        self::assertEquals(
            $expectedScore,
            $score,
            "When a player wins {$numberOfPoints} {$pointsString}, the score should be: {$expectedScore}"
        );
    }
}
