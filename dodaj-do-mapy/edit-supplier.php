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
<!-- ### <header> ### -->
<div class="w3-container">
 <div class="w3-row-padding">
  <div class="w3-container w3-half">
<!--    <a href="/"><img src="img/Zrzut ekranu z 2021-03-14 16-10-52.png-off" alt="logo EkoOko" title="logo"></a>-->
  </div>
  <div class="w3-container w3-quarter">
   <dl>
    <dd><a href="edukacja/">Edukacja</a>
    <dd><a href="dodaj-do-mapy/">Dodaj do mapy</a>
    <dd><a href="login/">Logowanie</a>
   </dl>
  </div>
  <div class="w3-container w3-quarter">
   <dl>
    <dd><a href="/">Nasza misja</a>
    <dd><a href="/">Stowarzyszenie EkoOko</a>
    <dd><a href="/">Kontakt</a>
   </dl>
  </div>
 </div>
</div>
<hr>
<!-- end of #header  -->

<!-- ### main body ### -->
<div class="w3-container" id="main">
<div class="w3-container">

<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.html">dodaj producenta</a>
<?php
 $sid = $_GET['id'];
 if(empty($_GET['id'])){ echo "Coś nie tak puste id"; exit; }
 echo "<a href=\"edit-supplier.php?id=$sid\">Edytuj</a>";
 echo '<div class="w3-container w3-green">';
 echo ' <h2>Producent - Edycja _ _ ';
 echo '<div class="w3-button w3-red"><a href="delete-supplier.php?id='.$sid.'">usuń</a></div></h2>
 </div>';
?>

<div class="w3-container  w3-light-grey" >
 <div class="w3-row-padding">

<?php
// This path should point to Composer's autoloader
require '../vendor/autoload.php';
$configs = include('config.php');

use MongoDB\Client as Mongo;

$mongoconnection = new Mongo("mongodb://${user}:${pwd}@${dbmhost}:${dbmport}");
$collection = $mongoconnection->$db_name->$collection;

$result = $collection->find(['_id'=> new MongoDB\BSON\ObjectId("$sid")]);

foreach ($result as $user) {

echo  '<form class="w3-container" action="edit-supplier2.php?id='.$sid.'" method="post">
  <div class="w3-row-padding">
   <div class="w3-half">
    <fieldset><legend>Dane gospodarstwa</legend>
<label for="sname">Nazwa gospodarstwa</label><input class="w3-input" type="text" name="sname"';
echo " value=\"$user->name\"><br>";
echo '<label for="sfirstname">Imię</label><input class="w3-input" type="text" name="sfirstname"';
echo " value=\"$user->firstName\"><br>";
echo '<label for="slastname">Nazwisko</label><input class="w3-input" type="text" name="slastname"';
echo " value=\"$user->lastName\"><br>";
echo '    <label>Nick<input class="w3-input" type="text" name="snick"'; echo "value=\"$user->nick\"></label><br>";

echo '     <div class="w3-cell-row w3-row-padding">
      <div class="w3-cell w3-left-align">
        <!-- <label for="simage">Obrazek gospodarstwa (opcjonalnie): </label><input type="file" id="simage" name="simage"><br><br>-->
       <legend>Typ*:</legend>';
echo '       <input class="w3-radio" type="radio" name="stype" value="PRIVATE" ';
 if (isset($user->type) && $user->type=="PRIVATE") {
   echo "checked";
 };
  echo '><label>prywatne</label><br>';
  echo '        <input class="w3-radio" type="radio" name="stype" value="kooperatywa" ';
 if (isset($user->type) && $user->type=="kooperatywa"){
   echo "checked";
 };
  echo '><label>kooperatywa</label><br>';
  echo '        <input class="w3-radio" type="radio" name="stype" value="rws" ';
 if (isset($user->type) && $user->type=="rws") {
  echo "checked";
 };
  echo '><label>RWS</label><br>';
echo '       </div>
     </div>
     <div class="w3-cell w3-left-align">
      <br>
      <legend>Dostepny w dniach:</legend>
      <br>
      <div class="w3-row">
        <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInMon" ';
         if (isset($user->availabilityInMon) && $user->availabilityInMon) echo "checked=true";
  echo ' >
        <label>poniedziałek  </label>
        </div>
        <div class="w3-col s3"><p>w godzinach: </div>
        <div class="w3-col s5">
        <input class="w3-input" type="text" ';
       if (isset($user->workinghourMon) && $user->workinghourMon){
         echo "value=\"$user->workinghourMon\"";
       } else {
         echo "value=\"\"";
       }
       echo ' name="sworkinghourMon">
        </div>
      </div>
      <div class="w3-row">
       <div class="w3-col s4">
          <input class="w3-check" type="checkbox" name="savailabilityInTue" ';
           if (isset($user->availabilityInTue) && $user->availabilityInTue) echo "checked=true";
 echo ' >
          <label>wtorek</label></div>
       <div class="w3-col s3"><p>w godzinach:</div>
       <div class="w3-col s5">
        <input class="w3-input" type="text" ';
        if (isset($user->workinghourTue) && $user->workinghourTue){
          echo "value=\"$user->workinghourTue\"";
        } else {
          echo "value=\"\"";
        }
        echo ' name="sworkinghourTue">
       </div>
      </div>
      <div class="w3-row">
       <div class="w3-col s4">
          <input class="w3-check" type="checkbox" name="savailabilityInWed" ';
           if (isset($user->availabilityInWed) && $user->availabilityInWed) echo "checked=true";
 echo ' >
          <label> środa</label>
       </div>
       <div class="w3-col s3"><p>w godzinach:</div>
       <div class="w3-col s5">
           <input class="w3-input" type="text" ';
           if (isset($user->workinghourWed) && $user->workinghourWed){
             echo "value=\"$user->workinghourWed\"";
           } else {
             echo "value=\"\"";
           }
           echo ' name="sworkinghourWed">
       </div>
      </div>
      <div class="w3-row">
        <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInThu" ';
         if (isset($user->availabilityInThu) && $user->availabilityInThu) echo "checked=true";
echo ' >
        <label>czwartek</label>
        </div>
        <div class="w3-col s3"><p>w godzinach:</div>
        <div class="w3-col s5">
        <input class="w3-input" type="text" ';
        if (isset($user->workinghourThu) && $user->workinghourThu){
          echo "value=\"$user->workinghourThu\"";
        } else {
          echo "value=\"\"";
        }
        echo ' name="sworkinghourThu">
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInFri" ';
         if (isset($user->availabilityInFri) && $user->availabilityInFri)
          echo "checked=true";
echo ' >
        <label> piątek</label>
        </div>
        <div class="w3-col s3"><p>w godzinach:</div>
        <div class="w3-col s5">
        <input class="w3-input" type="text" ';
        if (isset($user->workinghourFri) && $user->workinghourFri){
          echo "value=\"$user->workinghourFri\"";
        } else {
          echo "value=\"\"";
        }
        echo ' name="sworkinghourFri">
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInSat" ';
         if (isset($user->availabilityInSat) && $user->availabilityInSat)
         echo "checked=true";
echo ' >
        <label> sobota</label>
        </div>
        <div class="w3-col s3"><p>w godzinach:</div>
        <div class="w3-col s5">
        <input class="w3-input" type="text" ';
        if (isset($user->workinghourSat) && $user->workinghourSat){
          echo "value=\"$user->workinghourSat\"";
        } else {
          echo "value=\"\"";
        }
        echo ' name="sworkinghourSat">
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInSun" ';
         if (isset($user->availabilityInSun) && $user->availabilityInSun==1)
         echo "checked=true";
echo ' >
        <label> niedziela</label>
        </div>
        <div class="w3-col s3"><p>w godzinach:</div>
        <div class="w3-col s5">
        <input class="w3-input" type="text" ';
        if (isset($user->workinghourSun) && $user->workinghourSun){
          echo "value=\"$user->workinghourSun\"";
        } else {
          echo "value=\"\"";
        }
        echo ' name="sworkinghourSun">
        </div>
      </div>
     </div>
    </fieldset>
  <fieldset><legend>Oferta</legend>
    <textarea name="soffer" >';
    echo "$user->offer";
  echo ' </textarea>
  </fieldset>
   </div>

   <div class="w3-half">
    <fieldset><legend>Adres</legend>
      <label><input class="w3-input" type="text" name="scity" '; echo "value=\"$user->city\""; echo ' ></label><br>
      <label><input class="w3-input" type="text" name="sstreet" '; echo "value=\"$user->street\""; echo '></label><br>
      <label><input class="w3-input" type="text" name="sbuildingNr" '; echo "value=\"$user->buildingNr\""; echo '></label><br>
      <label><input class="w3-input" type="text" name="spostalcode" '; echo "value=\"$user->postalCode\""; echo '></label><br>

      <label><select class="w3-select" name="swojewodztwo">
       <option value="" ';
      if (!(isset($user->wojewodztwo))) { echo ' disabled selected>Wybież wojewodztwo</option>'; }
     echo '
       <option value="dolnośląskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="dolnośląskie") { echo "selected"; }; echo '>dolnośląskie</option>
       <option value="kujawsko-pomorskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="kujawsko-pomorskie") { echo "selected"; }; echo '>kujawsko-pomorskie</option>
       <option value="lubelskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="lubelskie") { echo "selected"; }; echo '>lubelskie</option>
       <option value="lubuskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="lubuskie") { echo "selected"; }; echo '>lubuskie</option>
       <option value="łódzkie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="łódzkie") { echo "selected"; }; echo '>łódzkie</option>
       <option value="małopolskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="małopolskie") { echo "selected"; }; echo '>małopolskie</option>
       <option value="mazowieckie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="mazowieckie") { echo "selected"; }; echo '>mazowieckie</option>
       <option value="opolskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="opolskie") { echo "selected"; }; echo '>opolskie</option>
       <option value="podkarpackie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="podkarpackie") { echo "selected"; }; echo '>podkarpackie</option>
       <option value="podlaskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="podlaskie") { echo "selected"; }; echo '>podlaskie</option>
       <option value="pomorskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="pomorskie") { echo "selected"; }; echo '>pomorskie</option>
       <option value="świętokrzyskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="świętokrzyskie") { echo "selected"; }; echo '>świętokrzyskie</option>
       <option value="warmińsko-mazurskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="warmińsko-mazurskie") { echo "selected"; }; echo '>warmińsko-mazurskie</option>
       <option value="wielkopolskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="wielkopolskie") { echo "selected"; }; echo '>wielkopolskie</option>
       <option value="zachodniopomorskie" '; if (isset($user->wojewodztwo) && $user->wojewodztwo=="zachodniopomorskie") { echo "selected"; }; echo '>zachodniopomorskie</option>
      </select></label>

      <div class="w3-row">
        <div class="w3-col s5">
          <label><input class="w3-input" type="tel" name="stel" '; echo "value=\"$user->contactPhone\""; echo ' pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></label><br>
        </div>
        <div class="w3-col s1">
          &nbsp
        </div>
        <div class="w3-col s5">
          <label><input class="w3-input" type="tel2" name="stel2" ';
          if (isset($user->contactPhone2) && $user->contactPhone2){
           echo "value=\"$user->contactPhone2\"";
         } else {
           echo "value=\"\"";
         }
         echo ' pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></label><br>
        </div>
      </div>
      <label><input class="w3-input" type="email" name="semail" ';
       echo "value=\"$user->email\""; echo '></label>
    </fieldset>
    <fieldset>
      <legend>Współrzędne GPS</legend>
      <label>
      <input class="w3-input" type="text" name="smapCoordinates" ';
      if (isset($user->mapCoordinates) && $user->mapCoordinates){
       echo "value=\"$user->mapCoordinates\"";
      } else {
       echo "value=\"\"";
      }
      echo '>
           </label>
    </fieldset>
    <fieldset><legend>Opcje</legend>
    <div class="w3-cell-row w3-left-align">
    <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="spersonaly" ';
     if (isset($user->personaly) && $user->personaly) echo "checked=true"; echo '> odbiór osobisty</label></div>
    <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="sdelivery" ';
     if (isset($user->delivery) && $user->delivery) echo "checked=true"; echo '> dostawa (dowóz)</label></div>
    <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="sshipment" ';
     if (isset($user->shipment) && $user->shipment) echo "checked=true"; echo '> wysyłka</label></div>
    <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="scollecting" ';
     if (isset($user->collecting) && $user->collecting) echo "checked=true"; echo '> samozbiór</label></div>
    </div>
    <br>
    </fieldset>
    <fieldset><legend>nr konta bankowego (opcjonalnie)</legend>
      <input class="w3-input" type="text" name="sbankAccount" ';
     if (isset($user->bankAccount) && $user->bankAccount){
       echo "value=\"$user->bankAccount\"";
     } else {
       echo "value=\"\"";
     }
echo '>
    </fieldset>
    <fieldset><legend>Parametry dla Stowarzyszenia</legend>
      <div class="w3-container w3-col w3-left-align">

      <label><input class="w3-check" type="checkbox" name="saddreschecked" ';
       if (isset($user->addreschecked) && $user->addreschecked) echo "checked=true";
      echo '> adres sprawdzony</label><br>
    <div class="w3-row-padding">
 <div class="w3-half">
      <input class="w3-check" type="checkbox" name="srodoagree" ';
       if (isset($user->rodoagree) && $user->rodoagree) echo "checked=true";
        echo '>
       <label> RODO zgoda </label><br>';
echo '
 </div>
 <div class="w3-half">
      <label>data zgody:</label><input class="w3-input" type="text" disabled name="srodoagreewhen" ';
      echo "value=\"$user->rodoagreewhen\"";
echo '>
 </div>
</div>
      <br>
       <label>Skąd uzyskano adres: </label>
       <input class="w3-input" type="text" name="ssourceofsupplier" ';
        if (isset($user->sourceofsupplier) && $user->sourceofsupplier) echo "value=\"$user->sourceofsupplier\"";
       echo '><br>
      <label><input class="w3-check" type="checkbox" name="sverified" ';
       if (isset($user->verified) && $user->verified) echo "checked=true";
        echo '> zweryfikowany (przez Stowarzyszenie)</label>
        <br>
        <br>
        Notatki Stowarzyszenia
        <br>
        <br>
        <textarea name="snotes" >'; echo "$user->notes";
        echo ' </textarea><br><br>';
        $tz = new DateTimeZone('Europe/Warsaw');
        $ut = $user->created;
        $datetime = $ut->toDateTime();
        $datetime->setTimezone($tz); //Set timezone
        $k = $datetime->format('r');
        echo "Dodał: ".$user->swhocreated."&nbsp&nbsp&nbspdata dodania: ".$k."<br>" ;
        $utm = $user->lastModified;
        $datetime = $utm->toDateTime();
        $datetime->setTimezone($tz); //Set timezone
        $modfied = $datetime->format('r');
        echo "Edytował: ".$user->swhoedited."&nbsp&nbsp&nbsp data ostatniej modyfikacji: ".$modfied."" ;
echo '</div>';

      echo " status: <b>".$user->status."</b><br>" ;
      echo " (id: ".$user->_id.")<br>" ;
      echo "</fieldset>";

echo ' </div>
  </div>
   <br>
   <button class="w3-btn w3-yellow w3-bar">Modyfikuj producenta</button>
  </form>';
}
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
