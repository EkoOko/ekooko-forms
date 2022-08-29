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
      <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
      </style>
</head>
<body>
<!-- ### body ########################################################### -->
<?php include 'header.php';?>

<!-- ### main body ### -->
<div class="w3-container" id="main">
<div class="w3-container">

<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.php">dodaj producenta</a>
<div class="w3-container w3-green">
 <h2>Producenci</h2>
</div>


<?php
// This path should point to Composer's autoloader
require '../vendor/autoload.php';
$configs = include('config.php');

use MongoDB\Client as Mongo;

$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");
$collection = $mongoconnection->$db_name->$collection;

$result = $collection->find()->toArray();

echo "<table border=1>";
echo "<tr>";
echo "<td>Nazwa gospodarstwa</td>";
echo "<td>Imię<br>Nazwisko</td>";
echo "<td>typ</td>";
echo "<td>Oferta</td>";
echo "<td>miejscowość</td>" ;
echo "<td>ulica</td>" ;
echo "<td>nr domu</td>" ;
echo "<td>kod pocztowy</td>";
echo "<td>telefon<br>telefon2</td>" ;
echo "<td>adres email</td>" ;
echo "<td>koordynaty</td>";
echo "<td>data dodania</td>";
echo "</tr>";

foreach ($result as $user) {
 echo "<td><a href=\"show-supplier.php?id=$user->_id\"><b>".$user->name."</b></a><br>(id: ".$user->_id.")</td>" ;
// echo " status: ".$user->status."<br>" ;
 echo "<td>".$user->firstName."<br>".$user->lastName."</td>" ;
// echo "nick: ".$user->nick."<br>" ;
 echo "<td>".$user->type."</td>";
 echo "<td>".$user->offer."</td>";
 echo "<td>".$user->city."</td>" ;
 echo "<td>".$user->street."</td>" ;
 echo "<td>".$user->buildingNr."</td>" ;
 echo "<td>".$user->postalCode."</td>";
// echo "kraj: ".$user->countryCode."<br>" ;
 echo "<td>".$user->contactPhone."<br>".$user->contactPhone2."</td>" ;
 echo "<td>".$user->email."</td>" ;
//TODO change to GeoJson
// echo "<td>".$user->mapCoordinates."</td>";
// echo "odbiór osobisty: ".$user->personaly."<br>";
// echo "dostawa(dowóz): ".$user->delivery."<br>";
// echo "wysyłka: ".$user->shipment."<br>";
// echo "samozbiór: ".$user->collecting."<br>";
// echo "zweryfikowany: ".$user->verified."<br>";
// echo "notatki: ".$user->notes."<br>";
 $tz = new DateTimeZone('Europe/Warsaw');
 $ut = $user->created;
 $datetime = $ut->toDateTime();
 $datetime->setTimezone($tz); //Set timezone
 $k = $datetime->format('r');
 echo "<td>".$k."<br>" ;
 echo "</tr>";

 // echo "poniedziałek: ".$user->availabilityInMon." ";
 // echo "w godzinach: ".$user->workinghourMon."<br>";
 // echo "wtorek: ".$user->availabilityInTue." ";
 // echo "w godzinach: ".$user->workinghourTue."<br>";
 // echo "środa: ".$user->availabilityInWed." ";
 // echo "w godzinach: ".$user->workinghourWed."<br>";
 // echo "czwartek: ".$user->availabilityInThu." ";
 // echo "w godzinach: ".$user->workinghourThu."<br>";
 // echo "piątek: ".$user->availabilityInFri." ";
 // echo "w godzinach: ".$user->workinghourFri."<br>";
 // echo "sobota: ".$user->availabilityInSat." ";
 // echo "w godzinach: ".$user->workinghourSat."<br>";
 // echo "niedziela: ".$user->availabilityInSun." ";
 // echo "w godzinach: ".$user->workinghourSun."<br>";

}

echo "</table>";

?>

<br>
</div>

<?php include 'footer.php';?>

</body>
</html>
