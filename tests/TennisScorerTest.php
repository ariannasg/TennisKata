<?php declare(strict_types=1);

namespace TennisKata\Test;

use PHPUnit\Framework\TestCase;
use TennisKata\TennisScorer;

class TennisScorerTest extends TestCase
{
    public function testStartScorer(): void
    {
        $tennisScorer = new TennisScorer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "love, love",
            $resultScore,
            'When starting the scorer, we should have the following score: "love, love"'
        );
    }

    public function testServerScoresFifteenPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "fifteen, love",
            $resultScore,
            'When server scores 15pts and receiver has 0pts, we should have the following score: "fifteen, love"'
        );
    }

    public function testServerScoresThirtyPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "thirty, love",
            $resultScore,
            'When server scores 30pts and receiver has 0pts, we should have the following score: "thirty, love"'
        );
    }
}
