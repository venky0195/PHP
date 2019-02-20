<?php
class utilOOPs
{
    /**
     * @description : function uses regular expressions and replaces the values with the given input
     * @param : $name-> FirstName(String)
     * @param : $fullName -> string value
     * @param : $mobileNumber -> 10 digit number
     */
    public static function stringReplace($name, $fullName, $mobileNumber)
    {
        try {
            $string = "Hello <<name>>, We have your full name as <<full name>> in our system.Your contact number is 91-xxxxxxxxxx.
                    Please,let us know in case of any clarification.
                    Thank you!!..BridgeLabz : xx/xx/xxxx \n";
            //replacing mobilenumber using regex
            $string = preg_replace("/\d{2}\-x+/", $mobileNumber, $string);
            //replacing <<name>> with the correct name
            $string = preg_replace("/<+\w{4}>+/", $name, $string);
            //replacing <<fullname>> using correct full name
            $string = preg_replace("/<+\w+\s\w+>+/", " " . $fullName, $string);
            //replacing date pattern with current date
            $string = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $string);
            return "$string";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
