<?php
$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="nouser_url";

$dbc = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Could not connect: ' . mysqli_error($con));

return $dbc;
?>