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
            "0,0",
            $resultScore,
            'When starting the scorer, we should have the following score: "0,0"'
        );
    }

    public function testServerScoresFifteenPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "15,0",
            $resultScore,
            'When server scores 15pts and receiver has 0pts, we should have the following score: "15,0"'
        );
    }

    public function testServerScoresThirtyPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "30,0",
            $resultScore,
            'When server scores 30pts and receiver has 0pts, we should have the following score: "30,0"'
        );
    }

    public function testServerScoresFortyPoints(): void
    {
        $tennisScorer = new TennisScorer();

        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();
        $tennisScorer->addPointsToServer();

        $resultScore = $tennisScorer->getPoints();

        self::assertEquals(
            "40,0",
            $resultScore,
            'When server scores 40pts and receiver has 0pts, we should have the following score: "40,0"'
        );
    }
}
