<?php
class Utility
{
    /**
     * @description : function to read the string and return string value
     */
    public static function readString()
    {
        fscanf(STDIN, "%s", $var);
        //if input is numeric then show message
        while (is_numeric($var)) {
            echo "Enter valid input : ";
            fscanf(STDIN, "%s", $var);
        }
        return $var;
    }
    /**
     * @description : function to read integer and return integer value
     */
    public static function readInt()
    {
        fscanf(STDIN, "%s", $i);
        //Validation to accept only int
        while (!is_numeric($i) || $i > (int) $i) {
            echo "Enter valid input : ";
            fscanf(STDIN, "%s", $i);
        }
        return $i;
    }
    /**
     * @description: stringReplace function takes the userinput and replaces <<UserName>>.
     */
    public static function stringReplace()
    {
        try {
            do {
                echo "Enter your name: ";
                //Invoking readString function to accept string from user.
                $firstName = Utility::readString();
                //validation to accept characters more than 3.
                $valid = false;
                if (strlen($firstName) < 3) {
                    echo "Please enter characters more than 3\n";
                } else {
                    $valid = true;
                }
            } while (!$valid);
            $input = "Hello <<UserName>>, How are you?";
            //using string replace function to replace the string with the required string.
            $output = str_replace("<<UserName>>", $firstName, $input);
            echo $output . "\n";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Function checks the given number is less then 31, if it's less than 31, then it prints the values of two's power.
     * @param: powerOfTwo accepts positive integer which is greater than zero and less than 32.
     */
    public static function powerOfTwo($number)
    {
        try {
            //Validation to accept numbers less than
            if ($number >= 0 && $number <= 31) {
                //any number, if its power is 0, print 1.
                if ($number == 0) {
                    echo ("1" . "\n");
                }
                //loop to generate two's power value upto given user input
                for ($index = 1; $index <= $number; $index++) {
                    echo (pow(2, $index));
                    echo ("\n");
                }
            } else {
                echo ("Enter number less than 32, greater than 0\n");
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : To find out the prime factorization of the given number.
     * @param: primeFactorization accepts positive integer.
     */
    public static function primeFactorization($number)
    {
        try {
            for ($index = 2; ($index * $index) < $number; $index++) {
                //If the number is divisible by index, print index.
                while ($number % $index == 0) {
                    echo ($index . "\n");
                    $number = $number / $index;
                }
            }
            //If the given number is greater than 2, after the for loop is executed, it prints the number
            if ($number > 2) {
                echo ($number . "\n");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : couponNumbers takes the number of coupon the user wants and generates the random number
     * and checks if the number isn't present in the array and pushes it to the array.
     * @param: cuponNumbers accepts positive integer to generate the cupon numbers.
     */
    public static function cuponNumbers($number)
    {
        try {
            //Initialize empty array
            $arr = array();
            $n = 0;
            //Iterate till the number of the value of input
            while ($n < $number) {
                //Generate random number and round off and store it in randomNum variable
                $randomNum = round(rand(10000000, 99999999));
                //Condition to check whether the randomNum is present in the array. If not, push the random number to array
                if (!in_array($randomNum, $arr)) {
                    array_push($arr, $randomNum);
                }
                $n++;
            }
            echo ("Distinct coupons are: \n");
            //Display the distinct cupon numbers
            foreach ($arr as $value) {
                echo ($value . "\n");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @description : To print the wind chill by taking two double command-line arguments temperature(t) and speed(v)
     * @param: windChill accepts two double numericals to calculate the effective temperature.
     *          {$temp}: double value less than 50
     *          {$speed}: double value in the range 3 to 120.
     */
    public static function windChill($temperature, $speed)
    {
        try {
            /*Validation to check if the input is number and
             *if the temperature(t) is more than 50 in absolute value.
             * Or, speed(v) is larger than 120 or lesser than 3 and input is only in numbers.*/
            if (
                is_numeric($temperature) &&
                is_numeric($speed) &&
                $temperature < 50 &&
                ($speed < 120 && $speed > 3)
            ) {
                //Display the temperature and speed
                echo ("Given temperature is : " . $temperature . "\n");
                echo ("Given speed is : " . $speed . "\n");
                $temperature = abs($temperature);
                //Using formula given by National Weather Service that defines the effective temperature (the wind chill)
                $windchill = 35.74 + 0.6215 * $temperature + (0.4275 * $temperature - 35.75) * pow($speed, 0.16);
                echo ("Wind chill  = " . $windchill . "\n");} else {
                echo ("Enter temperature value less than 50, speed in the range 3 to 120 in numbers\n");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
