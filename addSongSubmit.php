<?php
	require './universal/databaseConn.php';

	$name = mysqli_real_escape_string($db, $_POST['name']) ;
	$artist = mysqli_real_escape_string($db, $_POST['artist']);
	//$file = mysqli_real_escape_string($db, $_POST['file']);
	$spotify = mysqli_real_escape_string($db, $_POST['spotify']);
	$youtube = mysqli_real_escape_string($db, $_POST['youtube']);
	$file = $_FILES['file']['name'];
	$letter = substr($name, 0, 1);
	$letterUpper = strtoupper($letter);
	$youtubeRefine = "";
	$spotifyRefine = "";

	$fileRefined = str_replace(".pdf", "", $file);


	$spotifyParse = parse_url($spotify);


	if($spotifyParse['host'] == "open.spotify.com"){
		$spotifyRefine = str_replace("http://open.spotify.com/track/", "", $spotify);
	} else{
		$spotifyRefine = "";
	};


	$youtubeParse = parse_url($youtube);

	if($youtubeParse['host'] == "youtu.be"){
		$youtubeRefine = str_replace("http://youtu.be/", "", $youtube);
	} else {
		$youtubeRefine = "";
	};


	$sql = "INSERT INTO songs (name, artist, file, spotify, youtube, letter) VALUES ('$name', '$artist', '$file', '$spotifyRefine', '$youtubeRefine', '$letterUpper')";
	$query = mysqli_query($db, $sql);

	$id = mysqli_insert_id($db);

	move_uploaded_file($_FILES["file"]["tmp_name"],
    "charts/" . $_FILES["file"]["name"]);

	$subject = "New Song" . $name . " - " . $artist . " Added";
	$message = "New song added to the online songbook. Go to songbook.sabbathfellowshiponline.org/charts.php?id=$id to check it out!";


	mail("webmaster@sabbathfellowshiponline.org", $subject, $message);


	if($query != false){
		//echo "record added!";
		header("location: addSongStatus.php?status=success&id=$id");
	} else {
		//echo "record failed!";
		header("location: addSongStatus.php?status=fail");
	};

	mysqli_close($db);