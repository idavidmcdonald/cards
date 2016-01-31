<?php

use Cards;

class CardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerTestInvalidCardRankThrowsInvalidArgumentException
     */
    public function testInvalidCardRankThrowsInvalidArgumentException($rank){
        $this->setExpectedException('Cards\Exceptions\InvalidArgumentException');
        $card = new Cards\Card($rank, 1);
    }

    public function providerTestInvalidCardRankThrowsInvalidArgumentException(){
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
     * @dataProvider providerTestInvalidCardSuitThrowsInvalidArgumentException
     */
    public function testInvalidCardSuitThrowsInvalidArgumentException($suit){
        $this->setExpectedException('Cards\Exceptions\InvalidArgumentException');
        $card = new Cards\Card(1, $suit);
    }

    public function providerTestInvalidCardSuitThrowsInvalidArgumentException(){
        return array(
            array(0), 
            array(5),
            array(3.5),
            array(-3),
            array('3'),
            array(null)
        );
    }

    public function testGetRankAsStringReturnsNonEmptyString(){
        $card = new Cards\Card(1, 1);
        $rank = $card->getRankAsString();
        $this->assertNotEmpty($rank);
        $this->assertInternalType('string', $rank);
    }

    public function testGetSuitAsStringReturnsNonEmptyString(){
        $card = new Cards\Card(1, 1);
        $suit = $card->getSuitAsString();
        $this->assertNotEmpty($suit);
        $this->assertInternalType('string', $suit);

    }
}