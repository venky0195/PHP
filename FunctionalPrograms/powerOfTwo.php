<?php
/**************************************************************************
 * @file            : powerOfTwo.php
 * @overview        : This program takes a command-line argument N and prints a table of the
                      powers of 2 that are less than or equal to 2^N.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 14/02/2019
 ***************************************************************************/
//importing utility files
include "../utility/utilityFunctional.php";
try {
    $number = $argv[1];
    if (!is_numeric($number)) {
        echo ("Enter only numbers\n");
    } else {
//calling the static method: powerOfTwo by passing the command line argument.
        Utility::powerOfTwo($number);}
} catch (\Throwable $th) {
    throw $th;
}
