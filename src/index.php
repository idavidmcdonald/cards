<?php
/**
 * Example game of higher or lower
 */

require_once __DIR__ . '/../vendor/autoload.php';

try {
    // Start game
    $deck = new Cards\Deck();
    echo "Ready? Guess correctly for the next 7 cards to win. Don't forget that Ace is low.", PHP_EOL;

    // Display first card
    $currentCard = $deck->getNextCard();
    echo 'The first card is the ', $currentCard->getRankAsString(), ' of ', $currentCard->getSuitAsString(), PHP_EOL, PHP_EOL;

    // 7 rounds
    for ($i = 0; $i < 7; $i++) { 
        // Ask user higher or lower
        $userGuess = readline("Will the next card be higher or lower? h/l: ");

        // Validate user input
        if ($userGuess != 'h' AND $userGuess != 'l') {
            echo 'Invalid input, h or l only please!', PHP_EOL;
            exit;
        }

        // Draw next card to compare
        $nextCard = $deck->getNextCard();

        // Determine if next card is higher (h), lower(l) or the same (s) rank
        if ($nextCard->getRank() > $currentCard->getRank()) {
            $answer = 'h';
        } else if ($nextCard->getRank() < $currentCard->getRank()) {
            $answer = 'l';
        } else {
            $answer = 's';
        }

        // Show user message if guess was incorrect/correct
        if ($answer == 's') {
            echo 'Same rank. The next card was the ', $nextCard->getRankAsString(), ' of ', $nextCard->getSuitAsString(), PHP_EOL, PHP_EOL;
        } else if ($userGuess == $answer) {
            echo PHP_EOL, 'Correct. The next card is the ', $nextCard->getRankAsString(), ' of ', $nextCard->getSuitAsString(), PHP_EOL, PHP_EOL;
        } else {
            echo 'You lost. The next card was the ', $nextCard->getRankAsString(), ' of ', $nextCard->getSuitAsString(), PHP_EOL, PHP_EOL;
            exit;
        }

        // Set up current card for next round
        $currentCard = $nextCard;
    }
    
    // You beat 7 rounds
    echo 'You win!', PHP_EOL;
    exit;

} catch(Cards\Exceptions\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch(Cards\Exceptions\EmptyDeckException $e) {
    echo $e->getMessage();
} catch(Exception $e) {
    echo $e->getMessage();
}
