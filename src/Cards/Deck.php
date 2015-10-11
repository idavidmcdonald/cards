<?php

namespace Cards;

/**
 * Represents a deck of cards
 */
class Deck {
	/**
	 * Array of Card ojects in the deck
	 * @var array
	 */
	private $cards = array();

	/**
	 * Create 52 card deck
	 */
	public function __construct(){
		for ($i=1; $i < 5; $i++) { 
			for ($j=1; $j < 14; $j++) { 
				$this->cards[] = new Card($j, $i);
			}
		}

		$this->shuffle();
	}

	/**
	 * Shuffle $this->cards using Fisher-Yates shuffle
	 *
	 * Starting with the last card as the current card, choose a random card from
	 * the other cards and swap it with the current card. Then with the penultimate
	 * card as the current card, pick a random card from the cards before it and swap it 
	 * with the current card. Continue process until the chosen card has no cards before it. 
	 * 
	 * @link https://en.wikipedia.org/wiki/Fisher–Yates_shuffle
	 */
	private function shuffle(){
		$numCardsToShuffle = count($this->cards);
		
		// While there remains cards to shuffle
		while ($numCardsToShuffle) {
			$numCardsToShuffle--;
			
			// Pick a random card not yet shuffled
			$ranPos = rand(0, $numCardsToShuffle);

			// Swap it with the current card
			$currentCard = $this->cards[$numCardsToShuffle];
			$this->cards[$numCardsToShuffle] = $this->cards[$ranPos];
			$this->cards[$ranPos] = $currentCard;
		}
	}

	/**
	 * Get number of cards remaining in the deck
	 * @return int Num cards remaining
	 */
	public function getNumCards(){
		return count($this->cards);
	}

	/**
	 * Get next Card from the deck
	 * @throws EmptyDeckException Thrown if deck is empty
	 * @return Card Card from top of deck
	 */
	public function getNextCard(){
		if (empty($this->cards)) {
			throw new Exceptions\EmptyDeckException('Deck is empty');
		}
		return array_shift($this->cards);
	}
}