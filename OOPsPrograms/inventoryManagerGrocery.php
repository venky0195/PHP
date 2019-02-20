<?php
/**************************************************************************
 * @file            : inventoryManagerGrocery.php
 * @overview        : Create a JSON file having Inventory Details for Rice, Pulses and Wheats
                      with properties name, weight, price per kg.Create the JSON from Inventory
                      Object and output the JSON String
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 19/02/2019
 ***************************************************************************/
include "../utility/utilityFunctional.php";
include "../utility/constants.php";
try {
    $data = file_get_contents(Grocery_JSON);
    $jsonGrocery = json_decode($data);
    //Display the choices
    echo "\nInventory Details-->\n";
    echo "1: Rice\n";
    echo "2: Wheat\n";
    echo "3: Pulses\n";
    //Ask user to input the choice
    echo "Please enter your choice: ";
    $item = Utility::readInt();
    //Validation to accept valid input
    while($item<1 || $item>3){
        echo "Please select a valid item!!\n";
        $item = Utility::readInt();
    }
    switch ($item) {
        case 1:
                for ($i = 0; $i < count($jsonGrocery->Rice); $i++) {
                    //Prints value of each kg and total cost.
                    echo "\nOne Kg of " . $jsonGrocery->Rice[$i]->name . " is " . $jsonGrocery->Rice[$i]->price . "₹ and for " . $jsonGrocery->Rice[$i]->weight . " Kgs :" . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Rice[$i]->price . "₹\n";
            }
            break;
        case 2:
                for ($i = 0; $i < count($jsonGrocery->Wheat); $i++) {
                    //Prints value of each kg and total cost.
                    echo "\nOne Kg of " . $jsonGrocery->Wheat[$i]->name . " is " . $jsonGrocery->Wheat[$i]->price . "₹ and for " . $jsonGrocery->Rice[$i]->weight . " Kgs : " . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Wheat[$i]->price . "₹\n";
                }
            break;
        case 3:
                for ($i = 0; $i < count($jsonGrocery->Pulses); $i++) {
                    //Prints value of each kg and total cost.
                    echo "\nOne Kg of " . $jsonGrocery->Pulses[$i]->name . " is " . $jsonGrocery->Pulses[$i]->price . "₹ and for " . $jsonGrocery->Rice[$i]->weight . " Kgs : " . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Pulses[$i]->price . "₹\n";
            }
            break;
    }

} catch (\Throwable $th) {
    throw $th;
}
