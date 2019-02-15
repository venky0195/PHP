<?php
include "../utility/utilityAlgorithm.php";
echo ("Enter the first word: ");
    fscanf(STDIN, "%s", $word);
  $result = UtilityAlgo::isPalindrome($word);
  if($result==true){
  echo("true\n");
  }
  else{echo("false\n");}
?>