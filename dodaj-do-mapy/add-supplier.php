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
    <title>Najkrótsza droga do zdrowej żywności | mapa EkoOko</title>
    <meta name="description" content="Gdzie lokalnie kupić zdrową żywność">
  <!-- albo tak: -->
      <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
  <!-- albo tal: -->
      <link rel="icon" href="img/favicon.png" type="image/x-icon">
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

<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.php">dodaj producenta</a>
<div class="w3-container w3-green">
 <H2>Nowy producent</h2>
</div>

<form class="w3-container w3-light-grey" action="add-supplier2.php" method="post">
<div class="w3-row-padding">
 <div class="w3-half">
  <fieldset><legend>Dane gospodarstwa</legend>
   <label for="sfirstname"></label><input class="w3-input" type="text" name="sfirstname" placeholder="Imię"><br>
   <label for="slastname"></label><input class="w3-input" type="text" name="slastname" placeholder="Nazwisko"><br>
   <label for="sname"></label><input class="w3-input" type="text" name="sname" placeholder="Nazwa gospodarstwa (opcjonalnie)"><br>
<!--   <label><input class="w3-input" type="text" name="snick" placeholder="nick (opcjonalnie)"></label><br>-->

  <div class="w3-row">
    <div class="w3-col s5">
      <label><input class="w3-input" type="text" name="scity" placeholder="Miejscowość*"></label><br>
    </div>
    <div class="w3-col s1">
      &nbsp
    </div>
    <div class="w3-col s5">
      <label><input class="w3-input" type="text" name="spostalcode" placeholder="kod pocztowy"></label><br>
    </div>
  </div>

  <label><input class="w3-input" type="text" name="sstreet" placeholder="Ulica*"></label><br>
  <label><input class="w3-input" type="text" name="sbuildingNr" placeholder="nr domu*"></label><br>
  <label><select class="w3-select" name="swojewodztwo">
   <option value="" disabled selected>wybierz województwo</option>
   <option value="dolnośląskie">dolnośląskie</option>
   <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
   <option value="lubelskie">lubelskie</option>
   <option value="lubuskie">lubuskie</option>
   <option value="łódzkie">łódzkie</option>
   <option value="małopolskie">małopolskie</option>
   <option value="mazowieckie">mazowieckie</option>
   <option value="opolskie">opolskie</option>
   <option value="podkarpackie">podkarpackie</option>
   <option value="podlaskie">podlaskie</option>
   <option value="pomorskie">pomorskie</option>
   <option value="śląskie">śląskie</option>
   <option value="świętokrzyskie">świętokrzyskie</option>
   <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
   <option value="wielkopolskie">wielkopolskie</option>
   <option value="zachodniopomorskie">zachodniopomorskie</option>
  </select></label><br><br>

  <div class="w3-row">
    <div class="w3-col s5">
      <label><input class="w3-input" type="tel" name="stel" placeholder="telefon* (123-456-789)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></label><br>
    </div>
    <div class="w3-col s1">
      &nbsp
    </div>
    <div class="w3-col s5">
      <label><input class="w3-input" type="tel2" name="stel2" placeholder="telefon dodatkowy (123-456-789)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></label><br>
    </div>
  </div>

  <label><input class="w3-input" type="email" name="semail" placeholder="adres email*"></label>

  <fieldset><legend>nr konta bankowego (opcjonalnie)</legend>
    <input class="w3-input" type="text" name="sbankAccount" placeholder="XX XXXX XXXX XXXX XXXX XXXX XXXX">
  </fieldset>

   <div class="w3-cell-row w3-row-padding">
    <div class="w3-cell w3-left-align">
      <!-- <label for="simage">Obrazek gospodarstwa (opcjonalnie): </label><input type="file" id="simage" name="simage"><br><br>-->
     <legend>Typ*:</legend>
      <input class="w3-radio" type="radio" name="stype" value="PRIVATE"><label>prywatne</label><br>
      <input class="w3-radio" type="radio" name="stype" value="kooperatywa"><label>kooperatywa</label><br>
      <input class="w3-radio" type="radio" name="stype" value="rws"><label>RWS</label><br>
     </div>
   </div>
   <div class="w3-cell w3-left-align">
    <br>
    <legend>Dostepny w dniach:</legend>
    <br>
    <div class="w3-row">
      <div class="w3-col s4">
      <input class="w3-check" type="checkbox" name="savailabilityInMon">
      <label>poniedziałek  </label>
      </div>
      <div class="w3-col s3">
      <p>w godzinach:
      </div>
      <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourMon">
      </div>
    </div>
    <div class="w3-row">
     <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInTue">
        <label>wtorek</label>
     </div>
     <div class="w3-col s3">
      <p>w godzinach:
     </div>
     <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourTue">
     </div>
    </div>
    <div class="w3-row">
     <div class="w3-col s4">
        <input class="w3-check" type="checkbox" name="savailabilityInWed">
        <label> środa</label>
     </div>
     <div class="w3-col s3">
      <p>w godzinach:
     </div>
     <div class="w3-col s5">
         <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourWed">
     </div>
    </div>
    <div class="w3-row">
      <div class="w3-col s4">
      <input class="w3-check" type="checkbox" name="savailabilityInThu">
      <label>czwartek</label>
      </div>
      <div class="w3-col s3">
      <p>w godzinach:
      </div>
      <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourThu">
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-col s4">
      <input class="w3-check" type="checkbox" name="savailabilityInFri">
      <label> piątek</label>
      </div>
      <div class="w3-col s3">
      <p>w godzinach:
      </div>
      <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourFri">
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-col s4">
      <input class="w3-check" type="checkbox" name="savailabilityInSat">
      <label> sobota</label>
      </div>
      <div class="w3-col s3">
      <p>w godzinach:
      </div>
      <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourSat">
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-col s4">
      <input class="w3-check" type="checkbox" name="savailabilityInSun">
      <label> niedziela</label>
      </div>
      <div class="w3-col s3">
      <p>w godzinach:
      </div>
      <div class="w3-col s5">
      <input class="w3-input" type="text" placeholder="np.: 8-16,18-20" name="sworkinghourSun">
      </div>
    </div>
   </div>
  </fieldset>
 </div>

 <div class="w3-half">
   <fieldset><legend>Oferta</legend>
     <textarea name="soffer" rows="6" cols="60" placeholder="Jabłka, seler, itp.">
     </textarea>
 </fieldset>

  <fieldset><legend>Opcje</legend>
  <div class="w3-cell-row w3-left-align">
  <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="spersonaly"> odbiór osobisty</label></div>
  <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="sdelivery"> dostawa (dowóz)</label></div>
  <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="sshipment"> wysyłka</label></div>
  <div class="w3-cel"><label><input class="w3-check" type="checkbox" name="scollecting"> samozbiór</label></div>
  </div>
  <br>
  </fieldset>

  <fieldset>
    <legend>Współrzędne GPS</legend>
    <label>
    <input class="w3-input" type="text" name="smapCoordinates" placeholder="xx.xxxxx,yy.yyyyyyy (wypełnią się automatycznie z danych adresowych)">
    </label>
  </fieldset>

  <fieldset><legend>Parametry dla Stowarzyszenia</legend>
    <div class="w3-container w3-cell w3-left-align">
      <label><input class="w3-check" type="checkbox" name="srodoagree"> zgoda RODO</label><br>
      <label><input class="w3-check" type="checkbox" name="schecked"> adres producenta sprawdzony</label><br><br>
      <label><input class="w3-check" type="checkbox" name="sverified"> zweryfikowany (przez Stowarzyszenie) - co to znaczy?</label><br><br>
      <input class="w3-input" type="text" name="ssourceofsupplier" placeholder="informacja skąd namiary na producenta">
      <br>
      <br>
      Notatki Stowarzyszenia
      <br>
      <br>
      <textarea name="snotes" rows="4" cols="60" placeholder="Uwagi widoczne dla Stowarzyszenia"></textarea>
    </div>
  </fieldset>
</div>

</div>

<button class="w3-btn w3-green">Dodaj producenta</button>

</form>

<!--
<fieldset>
  <legend>Oferta</legend>
  <label for="Owoce">Owoce </label>
  <input list="Owoce">
   <datalist name="Owoce">
    <option value="Jabłka"></option>
    <option value="Gruszki">
    <option value="Śliwki">
  </datalist>

  <label for="Warzywa">Warzywa </label>
  <input list="Warzywa">
   <datalist name="Warzywa">
    <option value="Marchew"></option>
    <option value="Ziemniaki">
    <option value="Pietruszka">
  </datalist>
</fieldset>
-->
</div>
<hr>

<?php include 'footer.php';?>

</body>
</html>
