<?php

require_once('config.php');
$configs = include('config.php');

use MongoDB\Client as Mongo;

$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");

session_start();

if (!empty($_POST['login']) && !empty($_POST['password']))
{
 $postedUsername = $_POST['login']; //Gets the posted username, put's it into a variable.
 $postedPassword = $_POST['password']; //Gets the posted password, put's it into a variable.

 $userDatabaseSelect = $mongoconnection->$db_name->eko_users;
 $userDatabaseFind = $userDatabaseSelect->find(array('username' => $postedUsername)); //Does a search for Usernames with the posted Username Variable

 //Iterates through the found results
 foreach($userDatabaseFind as $userFind) {
  $storedUsername = $userFind['username'];
  $storedPassword = $userFind['password'];
 }

 if($postedUsername == $storedUsername && $postedPassword == $storedPassword){
  $_SESSION['user'] = htmlspecialchars($_POST['login']);
  $_SESSION['authentication'] = 1;                                                                  }
  ?>
  <script type="text/javascript">
  <!--
   window.location = "main.php"
   //-->
  </script> <?php
}else{
  $wrongflag = 1;
}

//header("Location: https://localhost:8003/index.php");
header("Location: index.php");
?>




//header("Location: https://localhost:8003/index.php");
header("Location: index.php");
