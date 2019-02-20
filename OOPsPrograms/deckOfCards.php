<?php
/**************************************************************************
 * @file            : deckOfCards.php
 * @overview        : To initialize deck of cards having suit ("Clubs", "Diamonds", "Hearts", "Spades")
 *                    & Rank ("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace").
 *                    Shuffle the cards using Random method and then distribute 9 Cards to 4 Players
 *                    and Print the Cards the received by the 4 Players using 2D Array...
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 19/02/2019
 ***************************************************************************/
include "./utilityOOPs/utilityOOPS.php";
include "./utilityOOPs/deck.php";
class deckOfCards extends Deck implements Cards
{
    public function distributeCards()
    {
        try {
            $rank = $this->getRank();
            $suit = $this->getSuit();
            //Declare an array
            $deck = [];
            $totalCards = count($suit) * count($rank);
            $indexOfCards = 0;
            //calculating the number of cards and pushing into array
            for ($indexOfSuit = 0; $indexOfSuit < count($suit); $indexOfSuit++) {
                for ($indexOfRank = 0; $indexOfRank < count($rank); $indexOfRank++) {
                    $deck[$indexOfCards] = $rank[$indexOfRank] . "" . $suit[$indexOfSuit] . " ";
                    $indexOfCards++;
                }
            }
            //Generating random numbers for shuffling cards containing in array
            for ($i = 0; $i < $totalCards; $i++) {
                $random = rand(0, 51);
                $temp = $deck[$i];
                $deck[$i] = $deck[$random];
                $deck[$random] = $temp;
            }
            //Distributing 9 shuffled cards to 4 players
            $cards = 0;
            $arr = array();
            for ($players = 0; $players < 4; $players++) {
                $iArr = array();
                for ($j = 0; $j < 9; $j++) {
                    $iArr[$j] = $deck[$j + $cards];
                }
                array_push($arr, $iArr);
                $cards = $cards + 9;
            }
            //printing the result containing in array
            for ($index = 0; $index < count($arr); $index++) {
                $person = $index + 1;
                echo "[ person " . $person . "]-[";
                for ($index1 = 0; $index1 < 9; $index1++) {
                    echo $arr[$index][$index1];
                }
                echo "]\n";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
$obj = new deckOfCards;
$obj->distributeCards();
