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
	 * @throws InvalidArgumentException Thrown on invalid rank or suit
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
	 * Return rank of the card as a user friendly string
	 * @return string Rank as a string, e.g. Ace or 7
	 */
	public function getRankAsString(){
		$ranksToString = array(
			1 => 'Ace',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '6',
			7 => '7',
			8 => '8',
			9 => '9',
			10 => '10',
			11 => 'Jack',
			12 => 'Queen',
			13 => 'King',
		);

		return $ranksToString[$this->rank];
	}

	/**
	 * Get card suit
	 * @return int Card suit between 1-4 representing clubs, diamonds, hearts and spades respectively
	 */
	public function getSuit(){
		return $this->suit;
	}

	/**
	 * Return suit of the card as a user friendly string
	 * @return string Suit as a string, e.g. Clubs
	 */
	public function getSuitAsString(){
		$suitsToString = array(
			1 => 'Clubs',
			2 => 'Diamonds',
			3 => 'Hearts',
			4 => 'Spades',
		);

		return $suitsToString[$this->suit];
	}
}
