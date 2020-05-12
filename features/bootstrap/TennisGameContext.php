<?php declare(strict_types=1);

use Behat\Behat\Context\Context;
use TennisKata\TennisGame;
use TennisKata\TennisPlayer;
use function PHPUnit\Framework\assertEquals;

class TennisGameContext implements Context
{
    private $server;
    private $receiver;
    /**
     * @var TennisGame
     */
    private $game;

    public function __construct()
    {
        $this->server = new TennisPlayer();
        $this->receiver = new TennisPlayer();
        $this->game = new TennisGame($this->server, $this->receiver);
    }

    /**
     * @Given /^none of the players have scored yet$/
     */
    public function noneOfThePlayersHaveScoredYet(): void
    {
        $this->server->setPointsWon(0);
        $this->receiver->setPointsWon(0);
    }

    /**
     * @Then /^the game score should be "([^"]*)"$/
     * @param string $gameScore
     */
    public function theGameScoreShouldBe(string $gameScore): void
    {
        assertEquals($gameScore, $this->game->getScore());
    }

    /**
     * @Given /^the server wins point$/
     */
    public function theServerWinsPoint(): void
    {
        $this->server->winPoint();
    }

    /**
     * @Given /^the receiver wins point$/
     */
    public function theReceiverWinsPoint(): void
    {
        $this->receiver->winPoint();
    }

    /**
     * @Given /^the server wins (\d+) points$/
     * @param int $numberOfPoints
     */
    public function theServerWinsPoints(int $numberOfPoints): void
    {
        $this->server->setPointsWon($numberOfPoints);
    }

    /**
     * @Given /^the receiver wins (\d+) points$/
     * @param int $numberOfPoints
     */
    public function theReceiverWinsPoints(int $numberOfPoints): void
    {
        $this->receiver->setPointsWon($numberOfPoints);
    }

    /**
     * @Given /^both players have (\d+) points$/
     * @param int $numberOfPoints
     */
    public function bothPlayersHavePoints(int $numberOfPoints): void
    {
        $this->server->setPointsWon($numberOfPoints);
        $this->receiver->setPointsWon($numberOfPoints);
    }
}