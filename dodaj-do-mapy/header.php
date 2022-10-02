      <!-- ### <header> ### -->
      <div class="w3-container">
       <div class="w3-row-padding">
        <div class="w3-container w3-half">
          <a href="/"><img src="img/Zrzut ekranu z 2021-03-14 16-10-52.png" alt="logo EkoOko" title="logo"></a>
        </div>
        <div class="w3-container w3-quarter">
         <dl>
          <dd><a href="edukacja/">Edukacja</a>
          <dd><a href="dodaj-do-mapy/">Dodaj do mapy</a>
  <?php if(!loggedIn()):?>
    <dd><a href="login.php">Zaloguj</a>
  <?php else:?>
    <dd>Witaj<b> <?php print $_SESSION["login"]; ?></b>
    <dd><a href="logout.php">Wyloguj</a>
  <?php endif;?>

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
