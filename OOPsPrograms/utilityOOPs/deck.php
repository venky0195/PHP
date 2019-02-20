<?php
/**
 * @description : Class that contains the suits and ranks.
 */
class Deck
{
    private $suit = array("♣", "♦", "♥", "♠");
    private $rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace");

    /**
     * @description : Get the value of suit
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @description : Get the value of rank
     */
    public function getRank()
    {
        return $this->rank;
    }
}
interface Cards{
    public function distributeCards();
}