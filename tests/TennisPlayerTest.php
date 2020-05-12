<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisPlayer;

class TennisPlayerTest extends TestCase
{
    public function provideScoreWhenWinningPoints(): array
    {
        return [
            [0, 'love'],
            [1, 'fifteen'],
            [2, 'thirty'],
            [3, 'forty'],
        ];
    }

    public function provideCountOfPointsWon(): array
    {
        return [
            [1, 1],
            [2, 2],
            [5, 5],
        ];
    }

    /**
     * @dataProvider provideScoreWhenWinningPoints
     * @param int $numberOfPoints
     * @param string $expectedScore
     */
    public function testTheScoreWhenWinningPoints(int $numberOfPoints, string $expectedScore): void
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

    /**
     * @dataProvider provideCountOfPointsWon
     * @param int $numberOfPoints
     * @param int $expectedPointsWon
     */
    public function testTheCountOfPointsWon(int $numberOfPoints, int $expectedPointsWon): void
    {
        $tennisPlayer = new TennisPlayer();

        for ($i = 1; $i <= $numberOfPoints; $i++) {
            $tennisPlayer->winPoint();
        }

        $msg = sprintf('When a player wins %d %s, the number of points won should be: %d',
            $numberOfPoints,
            $numberOfPoints === 1 ? 'point' : 'points',
            $expectedPointsWon);
        self::assertEquals($expectedPointsWon, $tennisPlayer->getPointsWon(), $msg);
    }
}
