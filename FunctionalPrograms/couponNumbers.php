<?php
/**************************************************************************
 * @file            : couponNumbers.php
 * @overview        : Given N distinct Coupon Numbers, how many random numbers do you
                      need to generate distinct coupon number? This program simulates this random
                      process.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 14/02/2019
 ***************************************************************************/
//importing uutility files
include "../utility/utilityFunctional.php";
try {
    echo ("Enter the distinct coupons you want: ");
    $number = Utility::readInt();
    //calling the static method: cuponNumbers by passing the input.
    Utility::cuponNumbers($number);

} catch (\Throwable $th) {
    throw $th;
}
