<?php
	require './universal/databaseConn.php';
	$song = $_GET['id'];

	$sql = "SELECT * FROM songs WHERE id = $song";
	$query = mysqli_query($db, $sql);

	if(!$query){
		echo "<p>Could not find selected song:" . mysqli_error() . "</p>";
	}

	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
?>

<html>
	<head>
		<?php include 'styleLink.php'; ?>
		<title><?php echo $row['name']; ?></title>
		<style>
			#header h1 {
				font-size: 26px;
			}
		</style>
	</head>

	<body>
		<div id="body">
    		<div id="header">
        		<?php include './universal/header.php'; ?>
        		<a href="report.php?id=<?php echo $row['id']; ?>" id="report" style="font-size:16px;">Report a problem</a>

        		<div id="table">
            		<div id="title">
                		<p class="description"><?php echo $row['name']; ?></p>
                	</div>
                <div id="number">
                	<a href="index.php">Back to list</a>
               	</div>
                <div id="author">
                	<p class="description"><?php echo $row['artist']; ?></p>
                </div>
                <div id="download">
                <p class="description"><a href="download.php?id=<?php echo $row['id']; ?>">Download chord chart</a></p>
                </div>
            </div>
        </div>

		<div class="chart">
    		<?php echo "<object type='application/pdf' data='./charts/" . $row['file'] ."'>
    		  <p style='text-align:justify; font-size:20px;'>It appears you don't have adobe reader installed. No worries you can download and install it <a href='http://get.adobe.com/reader/'>Here</a></p>
            </object>"; ?>
        </div>

        <div class="listen">

            <h3>Listen</h3>
        	<div class="spotify">
        		<h4>Spotify</h4>
        		<?php if($row['spotify'] == false){
        			echo "<p>There is no Spotify track for this song</p>";
        			} else {
        				echo "<iframe src='https://embed.spotify.com/?uri=spotify:track:" . $row['spotify'] . "' width='300' height='380' frameborder ='0' allowtransparency='true'></iframe>";
        			}
        		?>
        	</div>
        	<div class='youtube'>
        		<h4>YouTube</h4>
				<?php
            		if ($row['youtube'] == false) {
            			echo "<p>There is no YouTube video for this song</p>";
            		} else {
            			echo "<iframe width='420' height='315' src='http://www.youtube.com/embed/" . $row['youtube'] . "' frameborder='0' allowfullscreen></iframe>";
            		};
				?>
			</div>
	</body>
</html>