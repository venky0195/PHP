<?php
include "/home/admin1/venky/PHP/utility/utilityAlgorithm.php";
class Util
{
    /**
     * @description : printPrimeAnagram fucntion accepts an integer array, and returns the array only
     *                which are prime and anagrams.
     * @param : $prime-> integer array of prime numbers.
     */
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
    /**
     * @description : isLeapYear checks if the passed input is leap year or not.
     * @param : $year -> 4 digit number.
     */
    public static function isLeapYear($year)
    {
        
        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            echo("Is leap year\n");
            return true;
        } else {
            return false;
        }
    }
    /**
     * @description : To calculate the day of the month using gregorian's formula.
     * @param : $day -> two digit number in the range 1 to 31,
     * @param : $month -> two digit number in the range 1 to 12,
     * @param : $year -> 4 digit number.
     */
    public static function day($day, $month, $year)
    {
        $y0 = $year - floor(((14 - $month) / 12));
        $x = $y0 + floor($y0 / 4) - floor($y0 / 100) + floor($y0 / 400);
        $m0 = $month + 12 * floor((14 - $month) / 12) - 2;
        $d0 = ($day + $x + floor((31 * $m0) / 12)) % 7;
        return $d0;
    }

}
