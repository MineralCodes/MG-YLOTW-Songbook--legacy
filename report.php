<?php

	require './universal/databaseConn.php';
	$song = $_GET['id'];

	$sql = "SELECT * FROM songs WHERE id = '$song'";
	$query = mysqli_query($db, $sql);

	if(!$query){
		echo "<p>Could not find selected song:" . mysqli_error() . "</p>";
	}

	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
?>
<html>
	<head>
		<title>Report a Problem for: <?php echo $row['name']; ?></title>
		<?php include 'styleLink.php'; ?>
	</head>
	
	<body>
		<div id='body'>
			<?php include './universal/header.php'; ?>

		<form method="post" action='mailReport.php'>
			<fieldset>

				<!-- Form Name -->
				<legend>Report a problem for: <?php echo $row['name'] . " by " . $row['artist'] . " - song id (" . $row['id'] . ")"; ?></legend>

				<!-- Multiple Checkboxes -->
				<div class="control-group">
  						<label class="control-label" for="name">Your Name *</label>
  						<div class="controls">
    						<input id="name" name="name" type="text" required="">  
  						</div>
					</div>
				<div class="control-group">
  						<label class="control-label" for="name">Your E-mail *</label>
  						<div class="controls">
    						<input id="email" name="email" type="email" required="">  
  						</div>
					</div>

				<div class='control-group'>
  					<label class='control-label' for='checkboxes'>Select all that apply</label>
  					<div class='controls'>
    					<label class='checkbox' for='checkboxes-0'>
      						<input type='checkbox' name='checkboxes' id='checkboxes-0' value='Chord chart not loading'>
      							Chord chart not loading
    					</label>
    					<label class='checkbox' for='checkboxes-1'>
      					<input type='checkbox' name='checkboxes' id='checkboxes-1' value='YouTube link is broken'>
      						YouTube link is broken
    					</label>
    					<label class='checkbox' for='checkboxes-2'>
      						<input type='checkbox' name='checkboxes' id='checkboxes-2' value='Spotify link is broken'>
      							Spotify link is broken
    						</label>
    					<label class='checkbox' for='checkboxes-3'>
      						<input type='checkbox' name='checkboxes' id='checkboxes-3' value='Duplicate song'>
      							Duplicate song
    					</label>
    					<label class='checkbox' for='checkboxes-4'>
      						<input type='checkbox' name='checkboxes' id='checkboxes-4' value='Other'>
      							Other (please specify in comments)
    					</label>
    					<input type="hidden" value="<?php echo $row['id'] ?>" name="id"/>
  					</div>
				</div>

		<!-- Textarea -->
		<div class='control-group'>
  		<label class='control-label' for='textarea'>Comments</label>
  		<div class='controls'>
    		<textarea id='textarea' name='comments' placeholder='Place any comments here'></textarea>
  		</div>
		</div>

		<input type='reset'></input>
		<input type='submit'></input>
		</fieldset>
		</form>
	</div>
</body>
</html>