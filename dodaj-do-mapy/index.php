<?php

session_start();
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
      <link rel="icon" href="img/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/w3.css">
      <link rel="stylesheet" href="../css/main.css">
      <script src="../js/w3.js" async></script>
</head>

<body>
    <?php if (empty($_SESSION['user'])) : ?>

      <!-- ### <header> ### -->
      <div class="w3-container">
       <div class="w3-row-padding">
        <div class="w3-container w3-half">
          <a href="/"><img src="img/Zrzut ekranu z 2021-03-14 16-10-52.png-off" alt="logo EkoOko" title="logo"></a>
        </div>
        <div class="w3-container w3-quarter">
         <dl>
          <dd><a href="edukacja/">Edukacja</a>
          <dd><a href="dodaj-do-mapy/">Dodaj do mapy</a>
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

    <form action="login.php" method="post">
      <input type="text" name="login" />
      <br/>
      <input type="password" name="password" />
      <br/>
      <button type="submit">log in</button>
    </form>
    <?php else : ?>


<!-- ### body ########################################################### -->
<!-- ### <header> ### -->
<div class="w3-container">
 <div class="w3-row-padding">
  <div class="w3-container w3-half">
    <a href="/"><img src="img/Zrzut ekranu z 2021-03-14 16-10-52.png-off" alt="logo EkoOko" title="logo"></a>
  </div>
  <div class="w3-container w3-quarter">
   <dl>
    <dd><a href="edukacja/">Edukacja</a>
    <dd><a href="dodaj-do-mapy/">Dodaj do mapy</a>
    <dd><a href="logout.php">Wyloguj:</a> <?=$_SESSION['user']?>
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
<div class="w3-container w3-left" id="main">
<div class="w3-container">
<H2>Zarządzanie Producentami</h2>

<a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.html">dodaj producenta</a>
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

    <?php endif; ?>
</body>
</html>
