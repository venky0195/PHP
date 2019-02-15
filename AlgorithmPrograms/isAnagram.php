<?php
/**************************************************************************
 * @file            : isAnagram.php
 * @overview        : A program for finding out if the user inputs are anagram or not.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 15/02/2019
 ***************************************************************************/
//importing uutility files
include "../utility/utilityAlgorithm.php";
try {
    //Ask user to input.
    echo ("Enter the first word: ");
    fscanf(STDIN, "%s", $word1);
    echo ("\nEnter the second word: ");
    fscanf(STDIN, "%s", $word2);
    //Invoke isAnagram method by passing the user inputs.
    $result = UtilityAlgo::isAnagram($word1, $word2);
    if ($result == true) {
        echo ("\n" . $word1 . " and " . $word2 . " is Anagram\n");
    } else {
        echo ("\nNot Anagram!\n");
    }
} catch (\Throwable $th) {
    throw $th;
}
