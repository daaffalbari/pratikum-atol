<?php

function dbConnect(){
  $db=new mysqli("localhost", "root", "pknstan2020", "db10120212");
  return $db;
}


?>