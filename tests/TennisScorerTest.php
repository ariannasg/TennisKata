<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisScorer;

class TennisScorerTest extends TestCase
{
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

    public function testServerScoresOnePoint(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "fifteen,love",
            $resultScore,
            'When server scores 1pt and receiver 0pts, we should have the following score: "fifteen,love"'
        );
    }

    public function testServerScoresTwoPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "thirty,love",
            $resultScore,
            'When server scores 2pts and receiver has 0pts, we should have the following score: "thirty,love"'
        );
    }

    public function testServerScoresThreePoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "forty,love",
            $resultScore,
            'When server scores 3pts and receiver has 0pts, we should have the following score: "forty,love"'
        );
    }
}
