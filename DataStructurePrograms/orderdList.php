<?php
/**************************************************************************
 * @file            : orderedLinkedList.php
 * @overview        : Read a List of Numbers from a file and arrange it ascending Order in a
                      Linked List. Take user input for a number, if found then pop the number out of the
                      list else insert the number in appropriate position.
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 18/02/2019
 ***************************************************************************/
//importing LinkedList.
include "../DataStructurePrograms/utilityDS/linkedList.php";
include "../utility/utilityFunctional.php";
include "../utility/constants.php";
try {
    $data = file_get_contents(LinkedListFileOrdered);
    $arr = array();
    $data = trim($data);
    $arr = explode(" ", $data);
    for ($index = 0; $index < sizeof($arr); $index++) {
        $arr[$index] = (int)$arr[$index];
      }
      sort($arr);
     //Create a linked list object
    $linkedList = new LinkedList;
    // loop till the end of the length of array and add all the elements to the list.
    for ($index = 0; $index < sizeof($arr); $index++) {
        $linkedList->add($arr[$index]);
    }
    //To print the contents of the list
    $contents = $linkedList->printList();
    echo("Data in the list: ");
    foreach ($contents as $key) {
        echo ($key . " ");
    }
    echo ("\n");
    //Ask user to enter a number to search in the list, Validation to accept only numbers.
    echo("Enter the number to search: ");
    $number = Utility::readInt();
    //Check whether the number is present in the list or not by using search function.
    $result = $linkedList->search($number);
    //Condition to check if the number is present in the list or not.
    //If it is present, remove the number from the list, else add the number to the list in the correct position
    if ($result == true) {
        $linkedList->remove($number);
        $output = $linkedList->printList();
        $output = implode(" ", $output);
        file_put_contents(LinkedListFileOrdered, $output);
        echo ("Removed the number from the list since the number is already present \n");
        echo ("Data in the list: ".$output . "\n");
    } else {
        $position = $linkedList->addpos($arr ,$number);
        echo("Position: ".(int)$position."\n");
        $linkedList->insert($number, $position);
        $output1 = $linkedList->printList();
        $output1 = implode(" ", $output1);
        file_put_contents(LinkedListFileOrdered, $output1);
        echo ("number added successfully \n");
        echo ("Data in the list: ".$output1 . "\n");
    }

} catch (\Throwable $th) {
    throw $th;
}