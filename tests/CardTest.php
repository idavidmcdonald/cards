<?php

use Cards;

class CardTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider providerTestInvalidCardRankThrowsException
	 */
	public function testInvalidCardRankThrowsException($rank){
		$this->setExpectedException('Cards\Exceptions\InvalidArgumentException');
		$card = new Cards\Card($rank, 1);
	}

	public function providerTestInvalidCardRankThrowsException(){
		return array(
			array(0), 
			array(14),
			array(7.5),
			array(-7),
			array('7'),
			array(null)
		);
	}

	/**
	 * @dataProvider providerTestInvalidCardSuitThrowsException
	 */
	public function testInvalidCardSuitThrowsException($suit){
		$this->setExpectedException('Cards\Exceptions\InvalidArgumentException');
		$card = new Cards\Card(1, $suit);
	}

	public function providerTestInvalidCardSuitThrowsException(){
		return array(
			array(0), 
			array(5),
			array(3.5),
			array(-3),
			array('3'),
			array(null)
		);
	}
}