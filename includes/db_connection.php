<?php
session_start();
$conn = mysqli_connect("localhost", "root","","sentral");

if (mysqli_connect_error())
{
	echo "Failed to connect to MYSQL:" .mysqli_connect_error();
}
?>