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
echo '<div class="w3-container w3-green">';
echo ' <h2>Producent - <a href="edit-supplier.php?id='.$sid.'">edytuj</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
echo '<div class="w3-button w3-red"><a href="delete-supplier.php?id='.$sid.'">usuń</a></div></h2>
</div>';
?>

<div class="w3-container w3-light-grey" >
 <div class="w3-row-padding">
  <div class="w3-half">

   <fieldset><legend>Dane gospodarstwa</legend>
<?php
// This path should point to Composer's autoloader
require '../vendor/autoload.php';
$configs = include('config.php');

use MongoDB\Client as Mongo;

$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");
$collection = $mongoconnection->$db_name->$collection;

$result = $collection->find(['_id'=> new MongoDB\BSON\ObjectId("$sid")]);


foreach ($result as $user) {
 echo "Nazwa gospodarstwa: <b>".$user->name."</b>" ;
 echo " (id: ".$user->_id.")<br>" ;
 echo "<br>Imię: ".$user->firstName."<br>" ;
 echo "Nazwisko: ".$user->lastName."<br>" ;
 //echo "nick: ".$user->nick."<br><br>" ;
 echo "<fieldset><legend>Adres</legend>";
 echo "miejscowość: ".$user->city."<br>" ;
 echo "ulica: ".$user->street."<br>" ;
 echo "nr domu: ".$user->buildingNr."<br>" ;
 echo "kod pocztowy: ".$user->postalCode."<br>";
 echo "wojewodztwo: ".$user->wojewodztwo."<br>";
 echo "kraj: ".$user->countryCode."<br>" ;
 echo "<br>telefon: ".$user->contactPhone." " ;
 echo "telefon2: ".$user->contactPhone2."<br><br>" ;
 echo "adres email: ".$user->email."<br>" ;
echo "</fieldset>";

echo "<fieldset><legend>nr konta bankowego (opcjonalnie)</legend>";
echo "".$user->bankAccount."<br>";
echo "</fieldset>";

echo "typ: ".$user->type."<br>";

 echo "<br>Dostepny w dniach:<br><br>";
 echo "poniedziałek: ".$user->availabilityInMon." ";
 echo "w godzinach: ".$user->workinghourMon."<br>";
 echo "wtorek: ".$user->availabilityInTue." ";
 echo "w godzinach: ".$user->workinghourTue."<br>";
 echo "środa: ".$user->availabilityInWed." ";
 echo "w godzinach: ".$user->workinghourWed."<br>";
 echo "czwartek: ".$user->availabilityInThu." ";
 echo "w godzinach: ".$user->workinghourThu."<br>";
 echo "piątek: ".$user->availabilityInFri." ";
 echo "w godzinach: ".$user->workinghourFri."<br>";
 echo "sobota: ".$user->availabilityInSat." ";
 echo "w godzinach: ".$user->workinghourSat."<br>";
 echo "niedziela: ".$user->availabilityInSun." ";
 echo "w godzinach: ".$user->workinghourSun."<br>";

 echo "</fieldset>";

echo "</div>
 <div class=\"w3-half\">";
 echo "<fieldset><legend>Oferta</legend>";
 echo "$user->offer";
 echo "</fieldset>";

 echo "<fieldset><legend>Opcje</legend>";
 echo "odbiór osobisty: ".$user->personaly."<br>";
 echo "dostawa(dowóz): ".$user->delivery."<br>";
 echo "wysyłka: ".$user->shipment."<br>";
 echo "samozbiór: ".$user->collecting."<br>";
echo "</fieldset>";

 echo "<fieldset>
   <legend>Współrzędne GPS</legend>";
  echo "koordynaty: ".$user->mapCoordinates."<br>";
 echo "</fieldset>";

echo " <fieldset><legend>Parametry dla Stowarzyszenia</legend>";

 echo "status: <b>".$user->status."</b><br>" ;
 echo "adres sprawdzony: ".$user->addreschecked."<br>";
 echo "RODO zgoda: ".$user->rodoagree."&nbsp&nbsp&nbsp data zgody: ".$user->rodoagreewhen."<br>";
 echo "Skąd uzyskano adres: ".$user->sourceofsupplier."<br>";
 echo "zweryfikowany: ".$user->verified."<br><br>";
 echo "notatki: ".$user->notes."<br><br>";
 $tz = new DateTimeZone('Europe/Warsaw');
 $ut = $user->created;
 $datetime = $ut->toDateTime();
 $datetime->setTimezone($tz); //Set timezone
 $k = $datetime->format('r');
 echo "Dodał: ".$user->swhocreated."&nbsp&nbsp&nbspdata dodania: ".$k."<br>" ;
 $utm = $user->lastModified;
 if($utm) {
  $datetime = $utm->toDateTime();
  $datetime->setTimezone($tz); //Set timezone
  $modfied = $datetime->format('r');
  echo "Edytował: ".$user->swhoedited."&nbsp&nbsp&nbsp data ostatniej modyfikacji: ".$modfied."" ;
 }
 echo "<br>";
 echo "  </fieldset>";
}
?>
  </div>
 </div>
</div>

<br>
</div>

<hr>


</div>

<?php include 'footer.php';?>


</body>
</html>
