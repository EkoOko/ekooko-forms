<?php
include_once("config.php");

if(!loggedIn()):
 header('Location: index.php');
endif;

print("Welcome to the members page <b>".$_SESSION["login"]."</b><br>\n");
print("Your password is: <b>".$_SESSION["password"]."</b><br>\n");
print("<a href=\"index.php"."\">go to main page</a><br><br>");
print("<a href=\"logout.php"."\">Logout</a>");
?>
