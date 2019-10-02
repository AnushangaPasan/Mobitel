<?php

 session_start();
if (empty($_SESSION["name"])) {
    header("Location:index.php");
}
 
session_start();
session_destroy();
setcookie("member_login", $_POST["email"], time() - (4 * 365 * 24 * 60 * 60), "/", "", 0);
setcookie("member_password", $_POST["pass1"], time() - (4 * 365 * 24 * 60 * 60), "/", "", 0);
header("Location: index.php");
?>
