<?php

use Cards;

class DeckTest extends \PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->deck = new Cards\Deck();
	}

	public function testGetNextCardReturnsCard(){
		$nextCard = $this->deck->getNextCard();
		$this->assertInstanceOf('Cards\Card', $nextCard);
	}

	public function testGetNumCards(){
		// Assert deck length to start
		$this->assertEquals($this->deck->getNumCards(), 52);

		// Remove one card and assert length
		$this->deck->getNextCard();
		$this->assertEquals($this->deck->getNumCards(), 51);
	}

	public function testGetNextCardOnEmptyDeckThrowsEmptyDeckException(){
		for ($i=1; $i < 53; $i++) { 
			$this->deck->getNextCard();
		}

		$this->setExpectedException('Cards\Exceptions\EmptyDeckException');
		$this->deck->getNextCard();
	}
}