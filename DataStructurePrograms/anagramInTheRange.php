<?php
/**************************************************************************
 * @file            : anagramInTheRange.php
 * @overview        : To store only the numbers in that range that are
                      Anagrams. For e.g. 17 and 71 are both Prime and Anagrams in the 0 to 1000 range.
                      Further store in a 2D Array the numbers that are Anagram and numbers that are not Anagram
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 18/02/2019
 ***************************************************************************/
//importing LinkedList.
include "../DataStructurePrograms/utilityDS/linkedList.php";
include "../DataStructurePrograms/utilityDS/utilityDataStructure.php";
include "../utility/constants.php";
try {
    $num = 1000;
    //To get the prime numbers till the given numbers
    $primeArr = UtilityAlgo::primeNumberArr($num);
    $primeAna = Util::printPrimeAnagram($primeArr);
    $twoDArr = array();
    //create new linkedlist
    $linkedList1 = new LinkedList;
    //add primenumber array into linkedlist
    for ($i = 0; $i < sizeof($primeArr); $i++) {
        $linkedList1->add($primeArr[$i]);
    }
    //remove anagram present in prime linkedlist
    for ($i = 0; $i < sizeof($primeAna); $i++) {
        //if element found in linkedlist then remove
        if ($linkedList1->search($primeAna[$i])) {
            $linkedList1->remove($primeAna[$i]);
        }
    }
    echo "\n";
    //converting linkedlist to array
    $arr = $linkedList1->llToArr();
    //add primes that anagram in row 1
    for ($i = 0; $i < sizeof($primeAna); $i++) {
        $twoDArr[0][$i] = $primeAna[$i];
    }
    //adding not anagram primes to row 2
    for ($j = 0; $j < sizeof($arr); $j++) {
        $twoDArr[1][$j] = $arr[$j];
    }
    //printing the two dimensional array
    for ($i = 0; $i < sizeof($twoDArr); $i++) {
        for ($j = 0; $j < sizeof($twoDArr[$i]); $j++) {
            echo ($twoDArr[$i][$j] . " ");
        }
        echo "\n";
    }
} catch (\Throwable $th) {
    throw $th;
}
