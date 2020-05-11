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
}
