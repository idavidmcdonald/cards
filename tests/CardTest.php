<?php

use Cards\Card;

class CardTest extends \PHPUnit_Framework_TestCase
{
	public function testTrueIsTrue(){
		$card = new Card();
	    $this->assertTrue($card->returnTrue());
	}
}