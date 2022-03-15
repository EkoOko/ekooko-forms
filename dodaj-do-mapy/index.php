<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login to EkoOko - suppliers</title>
</head>
<body>
    <?php if (empty($_SESSION['user'])) : ?>
    <form action="login.php" method="post">
      <input type="text" name="login" />
      <br/>
      <input type="password" name="password" />
      <br/>
      <button type="submit">log in</button>
    </form>
    <?php else : ?>
        <p>Hi, <?=$_SESSION['user']?></p>
        <a href="logout.php">logout</a>
    <?php endif; ?>
</body>
</html>
