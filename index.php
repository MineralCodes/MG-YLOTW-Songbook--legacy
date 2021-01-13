<?php
	include 'styleLink.php';

	include './universal/databaseConn.php';

	$sql = "SELECT id, name, artist, letter FROM songs ORDER BY name, artist";
	$query = mysqli_query($db, $sql);
	$records = mysqli_num_rows($query);
?>

<html>
	<head>
		<?php include 'styleLink.php'; ?>
		<title>YLOTW Songbook</title>
	</head>
	
	<body>
		<!--<div id="user"><p>Hello Micah</p><a href="login.php?logout=logout">Log Out</a></div>-->
		<div id="body">
			<!-- <img src="ylotw_logo.gif"  alt="logo"/>
    		<h1>YLOTW Online Song Book</h1> -->
    		<?php include '/universal/header.php'; ?>
    		<a href="addsong.php" id="addSong"><span style="font-size:25px">+</span> Add Song</a>
    		<br />
    		<input type="text" name="search" class="search" id="search" placeholder="Search for song/artist name" id="searchField">
    			
		<div id="index">
     		<a href="#" target="_self" onclick="filterList('A')">A</a>
     		<a href="#" target="_self" onclick="filterList('B')">B</a>
     		<a href="#" target="_self" onclick="filterList('C')">C</a>
    		<a href="#" target="_self" onclick="filterList('D')">D</a>
     		<a href="#" target="_self" onclick="filterList('E')">E</a>
     		<a href="#" target="_self" onclick="filterList('F')">F</a>
     		<a href="#" target="_self" onclick="filterList('G')">G</a>
     		<a href="#" target="_self" onclick="filterList('H')">H</a>
     		<a href="#" target="_self" onclick="filterList('I')">I</a>
     		<a href="#" target="_self" onclick="filterList('J')">J</a>
     		<a href="#" target="_self" onclick="filterList('K')">K</a>
     		<a href="#" target="_self" onclick="filterList('L')">L</a>
     		<a href="#" target="_self" onclick="filterList('M')">M</a>
     		<a href="#" target="_self" onclick="filterList('N')">N</a>
     		<a href="#" target="_self" onclick="filterList('O')">O</a>
     		<a href="#" target="_self" onclick="filterList('P')">P</a>
     		<a href="#" target="_self" onclick="filterList('Q')">Q</a>
     		<a href="#" target="_self" onclick="filterList('R')">R</a>
     		<a href="#" target="_self" onclick="filterList('S')">S</a>
     		<a href="#" target="_self" onclick="filterList('T')">T</a>
     		<a href="#" target="_self" onclick="filterList('U')">U</a>
     		<a href="#" target="_self" onclick="filterList('V')">V</a>
     		<a href="#" target="_self" onclick="filterList('W')">W</a>
     		<a href="#" target="_self" onclick="filterList('X')">X</a>
     		<a href="#" target="_self" onclick="filterList('Y')">Y</a>
     		<a href="#" target="_self" onclick="filterList('Z')">Z</a>
     		<a href="#" target="_self" onclick="$('ul >li').show();">All</a>
  		</div>

    		<div id="charts">
    		<!--<h3><a href="download.php?id=charts" target="_blank" id="downloadAll">Download all songs</a></h3>-->	
    			<ul>
    				<?php
    					while($row = mysqli_fetch_array($query, MYSQL_ASSOC)) {
							echo "<li class='" . $row['letter'] . "'><a href='chart.php?id=" . $row['id'] . "'><span class='title'>" . $row['name'] . "</span> - <span class='artist'>" . $row['artist'] . "</span></a></li>";
						};
    				?>
    			</ul>
    		</div>
    	</div>
    	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script type='text/javascript' src='search.js'></script>
		<script type='text/javascript'>
			function filterList(i){
				$('ul > li').each(function(){
					if($(this).hasClass(i)){
						$(this).show();
					} else {
						$(this).hide();
					}
				});			
			};
		</script>
	</body>
</html>