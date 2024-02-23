<?php

$dbhost = "localhost";
$dbuser = "kvbbgcom_floodPrevention";
$dbpass = "kv0889909595";
$dbname = "kvbbgcom_floodPrevention";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("falled to connect");
}
?>