<?php
/**************************************************************************
 * @file            : LinkedList.php
 * @overview        : Implementation of singly linked list
 * @author          : VENKATESH G.      <ven.venky08@gmail.com>
 * @version         : PHP v7.2.15
 * @since           : 18/02/2019
 ***************************************************************************/
class Node
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function readNode()
    {
        return $this->data;
    }
}

class LinkedList
{ //Link to the first node in the list
    private $firstNode;
    private static $size = 0;
    //Link to the last node in the list
    private $lastNode;
    //Total nodes in the list
    private $count;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }
    /**
     * @description : Function to check if the list is empty or not
     * */
    public function isEmpty()
    {
        return ($this->firstNode == null);
    }
    /**
     * @description : to insert the data in the beginning of the list
     * @param : $data -> data to be added.
     */
    public function insertFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        /* If this is the first node inserted in the list
        then set the lastNode pointer to it.
         */
        if ($this->lastNode == null) {
            $this->lastNode = &$link;
        }

        $this->count++;
    }
    /**
     * @description : Function to add the element to the end of the list
     * @param : add function accepts data to which the data is added to the list
     */
    public function add($data)
    {
        if ($this->firstNode != null) {
            $link = new Node($data);
            $this->lastNode->next = $link;
            $link->next = null;
            $this->lastNode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }
    /**
     * @description : To insert data at the required position
     * @param : $item-> data to be added
     * @param : $position -> position of the index where the element to be added.
     */
    public function insert($item, $position)
    {
        if ($position == 0) {
            $this->insertFirst($item);
        } else {
            $link = new Node($item);
            $current = $this->firstNode;
            $previous = $this->firstNode;

            for ($i = 0; $i < $position; $i++) {
                $previous = $current;
                $current = $current->next;
            }

            $previous->next = $link;
            $link->next = $current;
            $this->count++;
        }
    }
    /**
     * @description : To delete the required data from the list
     * @param : $item -> data to be deleted
     */
    public function remove($item)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while ($current->data != $item) {
            if ($current->next == null) {
                return null;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }
    /**
     * @description : To search an element in the list
     * @param : $item -> data to be searched.
     */
    public function search($item)
    {
        $current = $this->firstNode;
        while ($current->data != $item) {
            if ($current->next == null) {
                return null;
            } else {
                $current = $current->next;
            }
        }
        return $current;
    }
    /**
     * @description : To print the contents in the list
     */
    public function printList()
    {
        $listData = array();
        $current = $this->firstNode;
        while ($current != null) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }
    /**
     * description : To get the index of the passed number in array 
     * @param : $arr -> array
     * @param : $num -> number to find the index of it.
     */
    public function addpos($arr,$num)
    {
        for ($index = 0; $index < sizeof($arr) - 1; $index++) {
            if ($arr[0] >= $num) return 0;
            else if ($arr[$index] < $num && $arr[$index + 1] > $num) {
              return $index + 1;
            }
          }
          return sizeof($arr);
    }
    /*
     *@description : To convert linked list to array
     */
    public function llToArr()
    {
        $arr = array();
        $temp = $this->firstNode;
        while ($temp != null) {
            for ($i = 0; $i < $this->count ; $i++) {
                $arr[$i] = $temp->data;
                $temp = $temp->next;
            }
        }
        return $arr;
    }
}
