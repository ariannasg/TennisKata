[![CI Workflow](https://github.com/ariannasg/TennisKata/workflows/CI%20Workflow/badge.svg)](https://github.com/ariannasg/TennisKata/actions?query=workflow%3A%22CI+Workflow%22)
[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-v2.0%20adopted-ff69b4.svg)](.github/CONTRIBUTING.md)
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE.md)

# Tennis Kata

* [Description](#description)
* [Objectives](#objectives)
* [Local setup](#local-setup)
* [Testing](#testing)
* [Contributing](#contributing)
* [License](#license)

## Description
http://agilekatas.co.uk/katas/Tennis-Kata
We want a program that can be used to score a tennis game, so we can use it for all of the tennis related endeavours we plan to undertake in the future. To begin with, we're going to need a way to update the score when a player wins a point, see what the current score is after each service, and see if their is a winner based on the current score and the rules below.

1. A game is won by the first player to have won at least four points in total and at least two points more than the opponent.
2. The running score of each game is described in a manner peculiar to tennis: scores from zero to three points are described as “love”, “fifteen”, “thirty”, and “forty” respectively.
3. If at least three points have been scored by each player, and the scores are equal, the score is “deuce”.
4. If at least three points have been scored by each side and a player has one more point than their opponent, the score of the game is “advantage” for the player in the lead.

Example of test cases:
```
 Given the score is 0:0
 When the server wins a point
 Then the score is 15:0
 
 Given the score is 15:15
 When the receiver wins a point
 Then the score is 15:30
 
 Given the score is 30:30
 When the server wins a point
 Then the score is 40:30
 ```
## Objectives
Practice TDD by solving this kata.

## Local setup
Follow these instructions to get the project up and running for local development and testing purposes:
- Install php 7.3 (7.1 EOL soon): https://php-osx.liip.ch/.
- Configure the IDE CLI Interpreter to use php 7.3.
- Install composer (https://getcomposer.org/) and confirm the installation was successful by running:
    ```
    composer --version
    ```
- Install project dependencies (min dependencies are phpunit, phpstan and roave security):
    ```
    make install
    ```
- Configure the IDE Test Framework: https://www.jetbrains.com/help/phpstorm/using-phpunit-framework.html.
- The project already provides a phpunit configuration template that will be used when running tests via the Makefile.
Add a replica of the tests run configuration in the IDE for easier development.

## Testing
Command for running all tests:
```
make test
```

## Contributing
Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for understanding the code of conduct.

### License
This project is licensed under the terms of the MIT License.
Please see [LICENSE](LICENSE.md) for details.