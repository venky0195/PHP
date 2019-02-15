<?php
/**************************************************************************
 * @file            : factors.php
 * @overview        : Computes the prime factorization of N using brute force.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 14/02/2019
 ***************************************************************************/
//importing uutility files
include "../utility/utilityFunctional.php";
try {
    echo ("Enter the number: ");
    $number = Utility::readInt();
    //calling the static method: primeFactorization by passing the input.
    Utility::primeFactorization($number);

} catch (\Throwable $th) {
    throw $th;
}
