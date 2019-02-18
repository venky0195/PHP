<?php
/**************************************************************************
 * @file            : unorderedLinkedList.php
 * @overview        : Read the Text from a file, split it into words and arrange it as Linked List.
                      Take a user input to search a Word in the List. If the Word is not found then add it
                      to the list, and if it found then remove the word from the List. In the end save the
                      list into a file
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 18/02/2019
 ***************************************************************************/
//importing LinkedList.
include "../DataStructurePrograms/utilityDS/linkedList.php";
include "../utility/utilityFunctional.php";
include "../utility/constants.php";
try {
    //Read the file and store it an array
    $data = file_get_contents(LinkedlistFile);
    $arr = array();
    $data = trim($data);
    $data = strtolower($data);
    $arr = explode(" ", $data);
    //Create a linked list object
    $linkedList = new LinkedList;
    // loop till the end of the length of array and add all the elements to the list.
    for ($index = 0; $index < sizeof($arr); $index++) {
        $linkedList->add($arr[$index]);
    }
    //To print the contents of the list
    $contents = $linkedList->printList();
    foreach ($contents as $key) {
        echo ($key . " ");
    }
    echo ("\n");
    //Ask user to enter a word to search in the list.
    echo ("Enter the word to search :");
    $word = Utility::readString();
    $word = strtolower($word);
    //Check whether the word is present in the list or not by using search function.
    $result = $linkedList->search($word);
    //Condition to check if the word is present in the list or not.
    //If it is present, remove the word from the list, else add the word to the list
    if ($result == true) {
        $linkedList->remove($word);
        $output = $linkedList->printList();
        $output = implode(" ", $output);
        file_put_contents(LinkedlistFile, $output);
        echo ("Removed the word from the list since the word is already present \n");
        echo ("Data in the list: ".$output . "\n");
    } else {
        $linkedList->add($word);
        $output1 = $linkedList->printList();
        $output1 = implode(" ", $output1);
        file_put_contents(LinkedlistFile, $output1);
        echo ("Word added successfully \n");
        echo ("Data in the list: ".$output1 . "\n");
    }
} catch (\Throwable $th) {
    throw $th;
}
