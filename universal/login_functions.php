<?php

function redirect_user($page = 'index.php'){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header("Location: $url");
	exit(); //end of redirect_user()function.
}

function check_login($db, $user = '', $pwd = ''){
	$errors[] = array();
	if (empty($username)){
		$errors[] = 'You forgot to enter your username.';
	} else {
		$e = mysqli_real_escape_string($db, trim($username));
	}
	if(empty($pwd)){
		$errors = "You forgot to enter your password";
	} else {
		$p = mysqli_real_escape_string($db, trim($pwd));
	}
	
	if (empty($errors)){
		$q = "SELECT id, username FROM users WHERE username = '$e' AND password = ('$p')";
		$r = mysqli_query($db, $q);
		if (mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		} else {
			$errors[] = 'The email address and/or password entered not found';
		}
	}
}