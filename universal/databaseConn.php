<?php

$host = "205.178.146.109";
$username = "songadmin";
$password = "Ylotwadmin1";
$songbook = "songbook";


$db = mysqli_connect("$host", "$username", "$password", "$songbook") or die("Could not conect to the song database" . mysql_error());