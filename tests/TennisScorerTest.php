<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisScorer;

class TennisScorerTest extends TestCase
{
    public function provideServerScoresPoints(): array
    {
        return [
            [1, 'fifteen,love'],
            [2, 'thirty,love'],
            [3, 'forty,love'],
        ];
    }

    public function testBothPlayersHaveZeroPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "love,love",
            $resultScore,
            'When both players have 0pts, we should have the following score: "love,love"'
        );
    }

    /**
     * @dataProvider provideServerScoresPoints
     * @param int $numberOfPoints
     * @param string $expectedScore
     */
    public function testServerScoresPoints(int $numberOfPoints, string $expectedScore): void
    {
        $tennisScorer = new TennisScorer();

        for ($i = 1; $i <= $numberOfPoints; $i++) {
            $tennisScorer->addPointToServer();
        }

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            $expectedScore,
            $resultScore,
            "When server scores {$numberOfPoints}pts and receiver 0pts, we should have the following score: {$expectedScore}"
        );
    }
}
