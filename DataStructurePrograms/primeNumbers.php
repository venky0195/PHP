<?php
/**************************************************************************
 * @file            : primeNumbers.php
 * @overview        : Take a range of 0 - 1000 Numbers and find the Prime numbers in that range. Store
the prime numbers in a 2D Array, the first dimension represents the range 0-100,
100-200, and so on. While the second dimension represents the prime numbers in that range.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 18/02/2019
 ***************************************************************************/
//importing LinkedList.
include "../DataStructurePrograms/linkedList.php";
include "../utility/utilityAlgorithm.php";
include "../utility/constants.php";
try {
    $primes = array([[], [], [], [], [], [], [], [], [], []]);
    $initial = 0;
    $final = 100;
    echo ("Prime Numbers in the given range are :\n");
    //Loop from 0 to 10 and stores the prime numbers and stores the values in each index.
    for ($index = 0; $index < 10; $index++) {
        $primes[$index] = UtilityAlgo::isPrimeNew($initial, $final);
        $initial = $initial + 100;
        $final = $final + 100;
    }
    $start = 0;
    $end = 100;
    //To print the prime numbers in the range 0-­100,100­-200, and so on.
    for ($index1 = 0; $index1 < 10; $index1++) {
        echo ("[" . $start . "-" . $end . "]" . " [");

        foreach ($primes[$index1] as $key) {
            echo ($key . ",");
        }
        echo("]");
        $start = $start + 100;
        $end = $end + 100;
        echo ("\n");
    }
    echo ("\n");
} catch (\Throwable $th) {
    throw $th;
}
