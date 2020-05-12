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
        $player = new TennisPlayer();

        $player->setPointsWon($numberOfPoints);

        self::assertEquals(
            $expectedScore,
            $player->getScore(),
            "When a player wins {$numberOfPoints}pt, the score should be: {$expectedScore}"
        );
    }

    /**
     * @dataProvider provideCountOfPointsWon
     * @param int $numberOfPoints
     * @param int $expectedPointsWon
     */
    public function testTheCountOfPointsWon(int $numberOfPoints, int $expectedPointsWon): void
    {
        $player = new TennisPlayer();

        for ($i = 0; $i < $numberOfPoints; $i++) {
            $player->winPoint();
        }

        self::assertEquals(
            $expectedPointsWon,
            $player->getPointsWon(),
            "When a player wins {$numberOfPoints}, the number of points won should be: {$expectedPointsWon}"
        );
    }
}
