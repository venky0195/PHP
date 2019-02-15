<?php
/**************************************************************************
 * @file            : windChill.php
 * @overview        : To print the wind chill by taking two double command-line arguments temperture (t)
 *                    and speed (v). Given the temperature t (in Fahrenheit) and the wind speed v (in miles per hour),
windchill is calculated by the formula: windspeed = 35.74 + 0.6215t + (0.4275t - 35.75) v ^ 0.16
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 14/02/2019
 ***************************************************************************/
//importing uutility files
include "../utility/utilityFunctional.php";
try {
    //Accessing command line arguments and storing in variables
    $temperature = $argv[1];
    $speed = $argv[2];
    //calling the static method: windchill by passing the temperature and speed
    //which is accessed by command line arguments
    Utility::windChill($temperature, $speed);

} catch (\Throwable $th) {
    throw $th;
}
