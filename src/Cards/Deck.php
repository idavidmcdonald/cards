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