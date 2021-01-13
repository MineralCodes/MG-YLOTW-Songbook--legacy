<?php
	require './universal/databaseConn.php';
	$song = $_GET['id'];
	if(is_numeric($song)){
		$sql = "SELECT * FROM songs WHERE id = '$song'";
		$query = mysqli_query($db, $sql);

		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
		$file = $row['file'];
		$filePath = "./charts/$file";

		header("Content-Type: application/pdf");
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename='$file'");
		readfile("$filePath");
	} 
	else {
		$zipname = 'charts.zip';
    	$zip = new ZipArchive;
    	$zip->open($zipname, ZipArchive::CREATE);

    	if ($handle = opendir('./charts/')) {
      		while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && !strstr($entry,'.php')) {
            $zip->addFile($entry);
        }
      }
      closedir($handle);
    }

    $zip->close();

    header('Content-Type: application/zip');
    header("Content-Disposition: attachment; filename='charts.zip'");
    header('Content-Length: ' . filesize($zipname));
    header("Location: charts.zip");
	};
?>