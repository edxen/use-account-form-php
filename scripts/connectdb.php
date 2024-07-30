<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeap_form_db";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$conn) {
  die("there was an error connecting to database, " . mysqli_connect_error());
}
