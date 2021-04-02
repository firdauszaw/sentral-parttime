<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["userid"]);
    header("Location:../sign-in.php");
?>