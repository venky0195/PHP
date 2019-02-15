<?php
/**************************************************************************
 * @file            : insertionSort.php
 * @overview        : Reads in strings from standard input and prints them in sorted order.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 15/02/2019
 ***************************************************************************/
//importing utility files
include "../utility/utilityAlgorithm.php";
try {
    $arr = array();
//Ask user to input the size of array
    $size = readline("Enter the array size: ");
//Ask user to input the elements the number of times of the size
    for ($index = 0; $index < $size; $index++) {
        $arr[$index] = readline("Enter element $index: ");
    }
//Display the array elements
    echo ("array elements are: ");
    foreach ($arr as $value) {
        echo ($value . ",");
    }
    echo ("\n");
//Invoke insertionSort static method to sort the passed array and dispaly it.
    UtilityAlgo::insertionSort($arr);
} catch (\Throwable $th) {
    throw $th;
}
