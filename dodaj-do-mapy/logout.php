<?php
session_start();
unset($_SESSION['user']);
session_destroy();
//header("Location: http://localhost:8003/index.php");
header("Location: index.php");
