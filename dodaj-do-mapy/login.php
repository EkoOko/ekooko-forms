<?php
include_once("config.php");

if(loggedIn()):
 header('Location: index.php');
endif;

if(isset($_POST["submit"])):
  if(!($row = checkPass($_POST["login"], $_POST["password"]))):
    echo "<p>Incorrect login/password, try again</p>";
    echo "<a href=\"login.php\">Login</a>";
    exit;
  endif;
  cleanMemberSession($_POST["login"], $_POST["password"]);
  header("Location: index.php");
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
      <link rel="icon" href="img/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/w3.css">
      <link rel="stylesheet" href="../css/main.css">
      <script src="../js/w3.js" async></script>

  <style type="text/css">
fieldset {
width:320px;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:14px;
}
legend {
width:100px;
text-align:center;
background:#DDE7F0;
border:solid 1px;
margin:1px;
font-weight:bold;
color:#0000FF;
}
</style>
</head>

<body>
<?php include 'header.php';?>
        <form name="form1" action="<?=$_SERVER["PHP_SELF"];?>" method="POST">
	<fieldset>
	<legend>Login</legend>
	<table>
	<tr>
	<td><label for="login">Username:</label></td>
	<td><input name="login" value="<?php print isset($_POST["login"]) ? $_POST["login"] : "" ; ?>" type="text" id="username" size="30" /></td>
	</tr>
	<tr>
	<td><label for="password">Password:</label></td>
	<td><input name="password" type="password" id="password" size="30" /></td>
	</tr>
	<tr>
	<td class="submit"></td>
	<td><input name="submit" type="submit" value="Submit" /></td>
	</tr>
	</table>
	</fieldset>
	</form>
<?php include 'footer.php';?>
</body>
</html>
