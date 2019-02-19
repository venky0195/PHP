<?php
/**************************************************************************
 * @file            : calendar.php
 * @overview        : This program takes the month and year as command-line arguments
 *                    and prints a calendar for that month.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 19/02/2019
 ***************************************************************************/
include "../DataStructurePrograms/utilityDS/utilityDataStructure.php";
try {
    //Initialize months and days.
    $months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September",
        "October", "November", "December"];
    $days = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    //Access command line arguments
    $newMonth = $argv[1];
    $newYear = $argv[2];
    //Validation to check for valid inputs
    if (is_numeric($newMonth) && (is_numeric($newYear)) &&
        (0 <= $newMonth && $newMonth < 13) &&
        (999 < $newYear && $newYear < 10000)) {
        //Check for leap year
        if ($newMonth == 2 && Util::isLeapYear($newYear)) {
            $days[$newMonth] = 29;
        }
        echo " S  M Tu  W Th  F  S\n";
        //To find starting day of the month in the particualar year.
        $day = Util::day(1, $newMonth, $newYear);
        //print the calendar
        for ($i = 0; $i < $day; $i++) {
            echo "   ";
        }
        for ($i = 1; $i <= $days[$newMonth]; $i++) {
            echo (" " . $i);
            if ($i < 10) {
                echo " ";
            }
            if ((($i + $day) % 7 == 0) || ($i == $days[$newMonth])) {
                echo " \n";
            }
        }
    } else {
        echo ("Not a valid input");
    }
} catch (\Throwable $th) {
    throw $th;
}
