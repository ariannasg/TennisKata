Feature: Tennis Game

  Scenario: The score is correct when starting the game
    Given none of the players have scored yet
    Then the game score should be "love-love"

  Scenario: The score increases correctly when players win points
    Given none of the players have scored yet
    When the server wins point
    Then the game score should be "fifteen-love"
    And the receiver wins point
    Then the game score should be "fifteen-fifteen"
    And the server wins point
    Then the game score should be "thirty-fifteen"

  Scenario: The score is correct when the game is deuce
    Given none of the players have scored yet
    When the server wins 3 points
    And the receiver wins 3 points
    Then the game score should be "deuce"

  Scenario: The score is correct when the game is deuce
    Given none of the players have scored yet
    When the server wins 3 points
    And the receiver wins 3 points
    Then the game score should be "deuce"
    Given none of the players have scored yet
    When the server wins 4 points
    And the receiver wins 4 points
    Then the game score should be "deuce"

  Scenario: The score is correct when a player has advantage
    Given both players have 3 points
    And the server wins point
    Then the game score should be "advantage-forty"
    Given both players have 3 points
    And the receiver wins point
    Then the game score should be "forty-advantage"

  Scenario: The score is correct when a player wins
    Given none of the players have scored yet
    When the server wins 4 points
    But the receiver wins 0 points
    Then the game score should be "server won"
    Given none of the players have scored yet
    When the server wins 4 points
    But the receiver wins 0 points
    Then the game score should be "server won"
    Given both players have 3 points
    When the receiver wins point
    Then the game score should be "forty-advantage"
    And the receiver wins point
    Then the game score should be "receiver won"