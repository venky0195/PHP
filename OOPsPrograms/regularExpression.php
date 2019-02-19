<?php
/**************************************************************************
 * @file            : regularExpression.php
 * @overview        : Read in the following message: Hello <<name>>, We have your full
                      name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.
                      Please,let us know in case of any clarification Thank you BridgeLabz 01/01/2016.
                      Use Regex to replace name, full name, Mobile#, and Date with proper value.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 19/02/2019
 ***************************************************************************/
include "./utilityOOPs/utilityOOPS.php";
include "../utility/utilityFunctional.php";
try {
    echo "Enter your first name: \n";
    $name = Utility::readString();

    echo "Enter your full name: \n";
    $fullname = Utility::readString();

    echo "Enter your mobile number: \n";
    //validation to accept 10 digit mobileNumber
    while (strlen($mobileNumber = Utility::readInt()) <10) {
        echo "Enter valid 10 digit mobile number\n";
    }
    //Invoke stringReplace function for replacing the values.
    $output = utilOOPs::stringReplace($name, $fullname, $mobileNumber);
    echo($output);
} catch (\Throwable $th) {
    throw $th;
}
?>