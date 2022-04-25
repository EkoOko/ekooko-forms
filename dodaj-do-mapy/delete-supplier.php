<?php include_once("config.php"); 

if(!loggedIn()):
 header('Location: login.php');
endif;
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Najkrótsza droga do zdrowej żywności | mapa EkoOko | dla Producenta</title>
    <meta name="description" content="Gdzie lokalnie kupić zdrową żywność">
  <!-- albo tak: -->
      <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
  <!-- albo tal: -->
<!--      <link rel="icon" href="img/favicon.png" type="image/x-icon"> -->
      <link rel="stylesheet" href="../css/w3.css">
      <link rel="stylesheet" href="../css/main.css">
      <script src="../js/w3.js" async></script>
</head>
<body>
<!-- ### body ########################################################### -->
<?php include 'header.php';?>

<!-- ### main body ### -->
<div class="w3-container" id="main">
<div class="w3-container">

<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.php">Dodaj nowego</a>
<?php
 $sid = $_GET['id'];
 if(empty($_GET['id'])){ echo "Coś nie tak puste id"; exit; }
 echo "<a href=\"edit-supplier.php?id=$sid\">Edytuj</a>";
?>
<div class="w3-container w3-red">
 <h2>Producent - skasowany</a></h2>
</div>

<div class="w3-container w3-light-grey" >
 <div class="w3-row-padding">
  <div class="w3-half">
   <fieldset><legend>Dane gospodarstwa</legend>

<?php
echo "<br>sid: ".$sid."<br>";
// This path should point to Composer's autoloader
require '../vendor/autoload.php';
$configs = include('config.php');

use MongoDB\Client as Mongo;
$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");
$collect = $mongoconnection->$db_name->$collection;

//$delRec = $collect->deleteOne([['_id' => new MongoDB\BSON\ObjectID($sid)], ['limit' => 1]]);
$delRec = $collect->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($sid )) );

// todo:
//  check output code

//redirecting to the display page (index.php in our case)
//off header("Location:show-suppliers2.php");
echo "skasowany: $sid";

?>
  </div>
 </div>
</div>

<br>
</div>

<hr>


</div>

<div class="w3-container" id="footer">
  Stopka strony<br>
  Autor i data powstania strony<br>
  Informacje kontaktowe<br>
  &copy; Zastrzeżenie praw autorskich<br>
</div>


</body>
</html>
