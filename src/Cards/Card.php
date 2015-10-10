<?php

namespace Cards;

/**
 * Represents a card in a game of cards
 */
class Card {
	/**
	 * Card rank between 1-13 representing Ace-King
	 * @var int
	 */
	private $rank;

	/**
	 * Int 1-4 representing suits clubs, diamonds, hearts and spades respectively
	 * @var int
	 */
	private $suit;

	/**
	 * Validate and set rank and suit
	 * @param int $rank Card rank between 1-13 representing Ace-King
	 * @param int $suit Card suit between 1-4 representing clubs, diamonds, hearts and spades respectively
	 */
	public function __construct($rank, $suit){
		// Check $rank is integer between 1 and 13
		if (!is_int($rank) OR $rank < 1 OR $rank > 13) {
			throw new Exceptions\InvalidArgumentException('Invalid Card rank');
		}
		// Check $suit is integer between 1 and 4
		if (!is_int($suit) OR $suit < 1 OR $suit > 4) {
			throw new Exceptions\InvalidArgumentException('Invalid Card suit');
		}
		$this->rank = $rank;
		$this->suit = $suit;
	}

	/**
	 * Get card rank
	 * @return int Card rank between 1-13 representing Ace-King
	 */
	public function getRank(){
		return $this->rank;
	}

	/**
	 * Get card suit
	 * @return int Card suit between 1-4 representing clubs, diamonds, hearts and spades respectively
	 */
	public function getSuit(){
		return $this->suit;
	}
}