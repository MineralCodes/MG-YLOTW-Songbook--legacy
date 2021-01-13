<?php

$recipient = "webmaster@sabbathfellowshiponline.org";
$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];
$message = "Problem reported for song with id of: $id. problems reported: ". $_POST['checkboxes'] . " " . $_POST['comments'] . " Problem reported by: $name";
$subject = "Problem reported for song with id of: " . $_POST['id'];
$mailheader = "From: $email \r\n";

mail($recipient, $subject, $message, $mailheader) or die('Could not send email.');
header("location: index.php");