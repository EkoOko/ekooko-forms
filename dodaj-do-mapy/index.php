<?php include_once("config.php"); ?>

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
<?php include 'header.php';?>

<!-- ### body ########################################################### -->
<!-- ### main body ### -->
<div class="w3-container" id="main">
<div class="w3-container">

 <?php if(loggedIn()):?>
 <a href="show-suppliers2.php">Pokaż producentów</a>  <a href="add-supplier.php">dodaj producenta</a>
 <div class="w3-container w3-green">
  <h2>Producenci</h2>
  <?php endif;?>
 </div>

<?php include 'footer.php';?>
<!-- test ci 1 -->
</body>
</html>
