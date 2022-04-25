<?php include_once("config.php"); 

if(!loggedIn()):
 header('Location: login.php');
endif;
?>

<html>
<body>
<?php include 'header.php';?>

<h2>Zmodyfikowano producenta</h2>
<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.php">dodaj producenta</a>
<br>
  <?php if(!loggedIn()):?>
    <dd><a href="login.php">Zaloguj</a>
  <?php else:?>
    <dd><b><?php print $_SESSION["login"]; ?></b> <a href="logout.php">Wyloguj</a>
  <?php endif;?>
<br>
<br>

<?php
//checkboxes vars
$savailabilityInMon = $savailabilityInTue = $savailabilityInWed = $savailabilityInThu = $savailabilityInFri = $savailabilityInSat = $savailabilityInSun = '';
$spersonaly = $sdelivery = $scollecting = $sverified = $srodoagree = $schecked = '';
// radiobuttons vars
$stype = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 // must be id
// $xsid = test_input($_POST['id']);
 $xsid = $_GET["id"];
 if(empty($_GET["id"])){ echo "Coś nie tak puste id "; exit; }
   //optional value
 $xsfirstname = test_input($_POST['sfirstname']);
 $xslastname = test_input($_POST["slastname"]);
 $xsname = test_input($_POST["sname"]);
 //$xsnick = test_input($_POST["snick"]);
$xsnick = '';

 if(!isset($_POST['stype']) || empty($_POST['stype'])) {
    //if it has no value then set PRIVATE.
    echo "not set type";
    $xstype = "PRIVATE";
 } else {
    $xstype = $_POST['stype'];
 }
 //days and workingHours
 if(!isset($_POST['savailabilityInMon']) || empty($_POST['savailabilityInMon'])){ $xsavailabilityInMon = false; } else { $xsavailabilityInMon = true; }
 $xsworkinghourMon = test_input($_POST["sworkinghourMon"]);
 if(!isset($_POST['savailabilityInTue']) || empty($_POST['savailabilityInTue'])){ $xsavailabilityInTue = false; } else { $xsavailabilityInTue = true; }
 $xsworkinghourTue = test_input($_POST["sworkinghourTue"]);
 if(!isset($_POST['savailabilityInWed']) || empty($_POST['savailabilityInWed'])){ $xsavailabilityInWed = false; } else { $xsavailabilityInWed = true; }
 $xsworkinghourWed = test_input($_POST["sworkinghourWed"]);
 if(!isset($_POST['savailabilityInThu']) || empty($_POST['savailabilityInThu'])){ $xsavailabilityInThu = false; } else { $xsavailabilityInThu = true; }
 $xsworkinghourThu = test_input($_POST["sworkinghourThu"]);
 if(!isset($_POST['savailabilityInFri']) || empty($_POST['savailabilityInFri'])){ $xsavailabilityInFri = false; } else { $xsavailabilityInFri = true; }
 $xsworkinghourFri = test_input($_POST["sworkinghourFri"]);
 if(!isset($_POST['savailabilityInSat']) || empty($_POST['savailabilityInSat'])){ $xsavailabilityInSat = false; } else { $xsavailabilityInSat = true; }
 $xsworkinghourSat = test_input($_POST["sworkinghourSat"]);
 if(!isset($_POST['savailabilityInSun']) || empty($_POST['savailabilityInSun'])){ $xsavailabilityInSun = false; } else { $xsavailabilityInSun = true; }
 $xsworkinghourSun = test_input($_POST["sworkinghourSun"]);

 $xsoffer = test_input($_POST["soffer"]);
 //address
 $xscity = test_input($_POST["scity"]);
 $xsstreet = test_input($_POST["sstreet"]);
 $xsbuildingnr = test_input($_POST["sbuildingNr"]);
 // $snrmieszkania = $_POST["pnrmieszkania"];
 $xswojewodztwo = test_input($_POST["swojewodztwo"]);
 $xspostalcode = test_input($_POST["spostalcode"]);
 $xstel = test_input($_POST["stel"]);
 $xstel2 = test_input($_POST["stel2"]);
 $xsemail = test_input($_POST["semail"]);
 $xskoordynaty = test_input($_POST["smapCoordinates"]);

 if(!isset($_POST['spersonaly']) || empty($_POST['spersonaly'])){ $xspersonaly = false; } else { $xspersonaly = true; }
 if(!isset($_POST['sdelivery']) || empty($_POST['sdelivery'])){ $xsdelivery = false; } else { $xsdelivery = true; }
 if(!isset($_POST['sshipment']) || empty($_POST['sshipment'])){ $xsshipment = false; } else { $xsshipment = true; }
 if(!isset($_POST['scollecting']) || empty($_POST['scollecting'])){ $xscollecting = false; } else { $xscollecting = true; }

 $xsbankAccount = test_input($_POST["sbankAccount"]);

 if(!isset($_POST['srodoagree']) || empty($_POST['srodoagree'])){ $xsrodoagree = false; } else { $xsrodoagree = true; }
 if(!isset($_POST['schecked']) || empty($_POST['schecked'])){ $xschecked = false; } else { $xschecked = true; }
 if(!isset($_POST['sverified']) || empty($_POST['sverified'])){ $xsverified = false; } else { $xsverified = true; }

 $xssourceofsupplier = test_input($_POST["ssourceofsupplier"]);
 $xsnotes = test_input($_POST["snotes"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if (empty($data)){$data="0";}
  return $data;
}

//$dt = new DateTime();
//$xsdata = $dt->format('DATE_ATOM');
echo "id: $xsid <br>";
echo "Nazwa gospodarstwa: $xsname, ";
echo "Imię: $xsfirstname, ";
echo "Nazwisko: $xslastname, ";
//echo "nick: $xsnick<br>";
echo "typ: $xstype<br>";
echo "<br>availabilityInMon: $xsavailabilityInMon: ";
echo "workinghourMon: $xsworkinghourMon<br>";
echo "availabilityInTue: $xsavailabilityInTue: ";
echo "workinghourTue: $xsworkinghourTue<br>";
echo "availabilityInWed: $xsavailabilityInWed: ";
echo "workinghourWed: $xsworkinghourWed<br>";
echo "availabilityInThu: $xsavailabilityInThu: ";
echo "workinghourThu: $xsworkinghourThu<br>";
echo "availabilityInFri: $xsavailabilityInFri: ";
echo "workinghourFri: $xsworkinghourFri<br>";
echo "availabilityInSat: $xsavailabilityInSat: ";
echo "workinghourSat: $xsworkinghourSat<br>";
echo "availabilityInSun: $xsavailabilityInSun: ";
echo "workinghourSun: $xsworkinghourSun<br>";
echo "<br>Oferta: $xsoffer<br><br>";
echo "Miejscowość: $xscity<br>";
echo "Ulica: $xsstreet<br>";
echo "nr domu: $xsbuildingnr<br>";
echo "kod pocztowy: $xspostalcode<br>";
echo "wojewodztwo: $xswojewodztwo<br>";
echo "telefon: $xstel, ";
echo "telefon2: $xstel2<br>";
echo "adres email: $xsemail<br>";
echo "Koordynaty: $xskoordynaty<br><br>";

echo "odbiór osobisty: $xspersonaly<br>";
echo "dostawa(dowóz): $xsdelivery<br>";
echo "wysyłka: $xsshipment<br>";
echo "samozbiór: $xscollecting<br><br>";

echo "konto bankowe: $xsbankAccount<br><br>";

echo "zgoda RODO: $xsrodoagree<br>";
echo "adres producenta sprawdzony: $xschecked<br>";
echo "zweryfikowany: $xsverified<br>";
echo "skąd informacja o producencie: $xssourceofsupplier<br>";
echo "<br>notatki: $xsnotes<br>";
//echo "data: $xsdata<br>";
echo "<BR>";
echo "<br>";

require '../vendor/autoload.php';
$configs = include('config.php');

use MongoDB\Client as Mongo;

$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");
$collection = $mongoconnection->$db_name->$collection;

$tz = new DateTimeZone('Europe/Warsaw');
$date = date("Y-m-d H:i:s"); //Current Date
//$mongo_date = new MongoDB\BSON\UTCDateTime(strtotime($date)*1000);
//nie dziala - $mongo_date->setTimezone($tz); //Set timezone

$result = $collection->updateOne(
  [ '_id' => new MongoDB\BSON\ObjectId ($xsid) ],
  [ '$set' => [
  'name' => $xsname,
  'firstName' => $xsfirstname,
  'lastName' => $xslastname,
  'nick' => $xsnick,
  'type' => $xstype,
  'availabilityInMon' => $xsavailabilityInMon,
  'workinghourMon' => $xsworkinghourMon,
  'availabilityInTue' => $xsavailabilityInTue,
  'workinghourTue' => $xsworkinghourTue,
  'availabilityInWed' => $xsavailabilityInWed,
  'workinghourWed' => $xsworkinghourWed,
  'availabilityInThu' => $xsavailabilityInThu,
  'workinghourThu' => $xsworkinghourThu,
  'availabilityInFri' => $xsavailabilityInFri,
  'workinghourFri' => $xsworkinghourFri,
  'availabilityInSat' => $xsavailabilityInSat,
  'workinghourSat' => $xsworkinghourSat,
  'availabilityInSun' => $xsavailabilityInSun,
  'workinghourSun' => $xsworkinghourSun,
  'offer' => $xsoffer,
  'countryCode' => 'PL',
  'wojewodztwo' => $xswojewodztwo,
  'city' => $xscity,
  'street' => $xsstreet,
  'buildingNr' => $xsbuildingnr,
  'postalCode' => $xspostalcode,
  'contactPhone' => $xstel,
  'contactPhone2' => $xstel2,
  'email' => $xsemail,
  'mapCoordinates' => $xskoordynaty,
  'personaly' => $xspersonaly,
  'delivery' => $xsdelivery,
  'shipment' => $xsshipment,
  'collecting' => $xscollecting,
  'bankAccount' => $xsbankAccount,
  'rodoagree' => $xsrodoagree,
  'addreschecked' => $xschecked,
  'verified' => $xsverified,
  'sourceofsupplier' => $xssourceofsupplier,
  'notes' => $xsnotes
 ],
 '$currentDate' => ['lastModified' => true],
 ],
);

echo "<a href=\"show-supplier.php?id=$xsid\"><b>Pokaż dostawcę</b></a><br>" ;
//echo "DEBUG: mongo_date: $mongo_date<br>";
?>

</body>
</html>
