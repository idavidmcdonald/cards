<?php
/**
 * Example game of higher or lower
 */

require_once __DIR__ . '/../vendor/autoload.php';

try {
    // Start game
    $deck = new Cards\Deck();
    echo 'Ready? Guess correctly for the next 7 cards to win.', PHP_EOL;

    // Display first card
    $currentCard = $deck->getNextCard();
    echo 'The first card is the ', $currentCard->getRankAsString(), ' of ', $currentCard->getSuitAsString(), PHP_EOL, PHP_EOL;

    // 7 rounds
    for ($i=0; $i < 7; $i++) { 
        // Ask user higher or lower
        $hl = readline("Will the next card be higher or lower? h/l: ");

        // Validate user input
        if ($hl != 'h' AND $hl != 'l') {
            echo 'Invalid input, h or l only please!', PHP_EOL;
            exit;
        }

        // Draw next card to compare
        $nextCard = $deck->getNextCard();
        echo PHP_EOL, 'Correct. The next card is the ', $nextCard->getRankAsString(), ' of ', $nextCard->getSuitAsString(), PHP_EOL, PHP_EOL;

        // Determine if next card is higher, lower or the same rank
        if ($nextCard->getRank() > $currentCard->getRank()) {
            $answer = 'h';
        } else if ($nextCard->getRank() < $currentCard->getRank()) {
            $answer = 'l';
        } else {
            // Same rank, draw next card
            $currentCard = $nextCard;
            continue;
        }

        // Check if user guess is incorrect
        if ($hl != $answer) {
            echo 'You lost', PHP_EOL;
            exit;
        }

        // Correct guess, draw next card
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
