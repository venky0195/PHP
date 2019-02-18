<?php
include "/home/admin1/venky/PHP/utility/utilityAlgorithm.php";
class Util
{
    public static function printPrimeAnagram($prime)
    { //intitialize array
        $primeAnagram = array();
        $count = 0;
        for ($i = 0; $i < sizeof($prime); $i++) {
            for ($j = $i + 1; $j < sizeof($prime); $j++) {
                //check two index are anagram
                if (UtilityAlgo::isAnagram("$prime[$i]", "$prime[$j]") == true) {
                    // if true then add to array
                    $primeAnagram[$count] = $prime[$i];
                    $count++;
                    $primeAnagram[$count++] = $prime[$j];
                }
            }
        }
        //remove duplicate values
        $temp = array_unique($primeAnagram);
        //moving value to new array
        $new_array = array_values($temp);
        return $new_array;
    }
}
