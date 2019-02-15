<?php
//importing uutility files
include "../utility/utilityFunctional.php";

class UtilityAlgo
{
    /**
     * @description : function accepts 2 userinput, converts input to string, splits the string and stores it in array, sorts the array,
     *                joins back to return the string. and checks for anagram.
     * @param      : isAnagram accepts two inputs. Only alphabets and letters.
     */
    public static function isAnagram($word1, $word2)
    {
        try {
            $result;
            //Convert the given strings to string
            $word1 = (string) $word1;
            $word2 = (string) $word2;
            /**
             * Condition to check if the length of the first word is equal to the second word.
             * If the condition passes, it means they can not be permutations of each other. Store false in the result.
             */
            if (strlen($word1) !== strlen($word2)) {
                $result = false;
            }
            //Split the string into an array,
            //Sort the array alphabetically,
            //Join the elements of an array into a string, and store the sorted string in a variable
            $sortedWord1 = str_split($word1);
            sort($sortedWord1);
            $sortedWord1 = implode("", $sortedWord1);

            $sortedWord2 = str_split($word2);
            sort($sortedWord2);
            $sortedWord2 = implode("", $sortedWord2);

            //If sortWord1 string is equal to sortWord2, stores true in result, else stores false in result.
            $result = $sortedWord1 === $sortedWord2;
            if ($result == true) {
                return true;
            } else {
                return false;
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : isPrime function to check if the number is prime or not.
     * @param   :   isPrime function accepts numeric value.
     */
    public static function isPrime($number)
    {
        try {
            if (is_numeric($number)) {
                //Condition to check if the number is 0 or 1, so that it is not prime
                if ($number == 0 || $number == 1) {
                    return false;
                }

                //Loop from 2 till the number and check if the number is divisible and return false if it's divisible
                for ($index = 2; $index < $number; $index++) {
                    if ($number % $index == 0) {
                        return false;
                    }
                }
                return true;
            } else {
                echo ("Enter valid input\n");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : primeNumbers function to print the prime numbers in the range 0-1000.
     */
    public static function primeNumbers()
    {
        try {
            echo ("Prime numbers in the range 0 to 1000: \n");
            //Loop from 0 to 1000 and check if the number is prime number by calling isPrime() and print it.
            for ($index = 0; $index <= 1000; $index++) {
                if (UtilityAlgo::isPrime($index)) {
                    echo ($index . "\n");
                }

            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : isPalindrome function checks if the given input is palindrome or not.
     * @param   :   isPalindrome accepts any value to check if it is a palindrome or not
     */
    public static function isPalindrome($value)
    {
        try {
            $str = "";
            $value = $value . "";
            for ($index = 0; $index < strlen($value); $index++) {
                $str = $value[$index] . $str;
            }
            if ($str == $value) {
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description :   isAnagramPalindrome function checks if the prime number is anagram and palindrome and prints them
     */
    public static function isAnagramPalindrome()
    {
        try {
            echo ("Prime numbers in the range 0 to 1000 which are anagram and palindrome: \n");
            $array = array();
            for ($index = 0; $index < 1000; $index++) {
                if (UtilityAlgo::isPrime($index)) {
                    array_push($array, $index);
                }
            }
            //Loop continuously from 1st element and second element, second element to third element and so on..
            //Invoke isAnagram and isPalindrome function and pass the 2 elements.
            //Print all the elements which are prime and anagram and palindrome.
            for ($i = 0; $i < sizeof($array); $i++) {
                for ($j = $i + 1; $j < sizeof($array); $j++) {
                    if (UtilityAlgo::isAnagram($array[$i], $array[$j])) {
                        echo ($array[$i] . " and " . $array[$j] . " are anagram\n");
                        if (UtilityAlgo::isPalindrome($array[$i])) {
                            echo ($array[$i] . " is palindrome\n");
                        }
                        if (UtilityAlgo::isPalindrome($array[$j])) {
                            echo ($array[$j] . " is palindrome\n");
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description :  This sorting is comparison-based in which each pair of adjacent elements
     *                 is compared and the elements are swapped if they are not in order.
     */
    public static function insertionSort($array)
    {
        try {
            $length = sizeof($array);
            for ($i = 1; $i < $length; $i++) {
                //Copy of the current element.
                $temp = $array[$i];
                //Check through the sorted part and compare with the element in temp.
                //If large, shift the element
                for ($j = $i - 1; ($j >= 0) && ($array[$j] > $temp); $j--) {
                    //Shift the element
                    $array[$j + 1] = $array[$j];
                }
                //Insert the copied element at the correct position
                $array[$j + 1] = $temp;
            }
            echo ("Sorted array: ");
            foreach ($array as $value) {
                echo ($value . ",");
            }
            echo ("\n");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description :That takes a date as input and prints the day of the week that date falls on.
     * @param   :   $date: 2 digit number in the range 1 to 31;
     *              $month: 2 digit number in the range 1 to 12;
     *              $year: 4 digit number in the range 1000 to 9999
     */
    public static function dayOfWeek($date, $month, $year)
    {
        try {
            //Condition to check valid inputs
            if ((is_numeric($date)) && (is_numeric($month)) && (is_numeric($year)) &&
                (0 < $date && $date < 32) &&
                (0 < $month && $month < 13) &&
                (999 < $year && $year < 10000)) {
                //Using gregorians formula to find out day of week
                $y0 = $year - floor(((14 - $month) / 12));
                $x = $y0 + floor($y0 / 4) - floor($y0 / 100) + floor($y0 / 400);
                $m0 = $month + 12 * floor((14 - $month) / 12) - 2;
                $d0 = ($date + $x + floor((31 * $m0) / 12)) % 7;
                //Switch case takes the calculated day value and by using formula, returns the day of week.
                switch ($d0) {
                    case 0:
                        return "Sunday";
                    case 1:
                        return "Monday";
                    case 2:
                        return "Tuesday";
                    case 3:
                        return "Wednesday";
                    case 4:
                        return "Thursday";
                    case 5:
                        return "Friday";
                    case 6:
                        return "Saturday";
                }
            } else {
                return "Please enter the valid date month year";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
