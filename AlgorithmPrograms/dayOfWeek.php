<?php
/**************************************************************************
 * @file            : dayOfWeek.php
 * @overview        : To find the Day of week by using formula and taking command line arguments inputs.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 15/02/2019
 ***************************************************************************/
//importing utility files
include "../utility/utilityAlgorithm.php";
try {
//Access date month and year from command line arguments.
    $date = $argv[1];
    $month = $argv[2];
    $year = $argv[3];
//Invoke dayOfWeek static method by passing date, month and year and store the returned value in result
    $result = UtilityAlgo::dayOfWeek($date, $month, $year);
//Display the output
    echo ($result . "\n");
} catch (\Throwable $th) {
    throw $th;
}
