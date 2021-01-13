<?php

?>
<html>
	<head>
		<?php include 'styleLink.php'; ?>
		<style>
			p {
				font-size: 18px;
				clear: both;
				margin-left: 15px;
				margin-bottom: 40px;
				line-height: 40px;
			}
		</style>
	</head>
	
	<body>
		<div id="body">
			<?php include './universal/header.php'; ?>
    		
    		<p>
    			Song name and Artist are required fields. If the artist in unknown insert 'Unknown' in the author field. <br />
    			Please only upload .pdf files. <br />
    			To get the Spotify link: right click the spotify track and select 'copy http link' and paste it in the Spotify field. <br />
    			To get YouTube shortlink: go to the YouTube viedo, click on share, and copy the shortcode.
    		</p>
    		
			<form class="form-horizontal" action="addSongSubmit.php" method="post" enctype="multipart/form-data">
				<fieldset>

					<!-- Form Name -->
					<legend>Add New Song</legend>

					<!-- name input-->
					<div class="control-group">
  						<label class="control-label" for="name">Name</label>
  						<div class="controls">
    						<input id="name" name="name" type="text" placeholder="Song Name" class="input-xlarge" required="">  
  						</div>
					</div>

					<!-- artist input-->
					<div class="control-group">
  						<label class="control-label" for="artist">Artist</label>
  						<div class="controls">
    						<input id="artist" name="artist" type="text" placeholder="Artist Name or 'Unkown'" class="input-xlarge" required="">
  						</div>
					</div>

					<!-- File Button --> 
					<div class="control-group">
  						<label class="control-label" for="file">Cord Chart pdf</label>
  						<div class="controls">
    						<input id="file" name="file" class="input-file" type="file">
  						</div>
					</div>

					<!-- spotify input-->
					<div class="control-group">
  						<label class="control-label" for="spotify">Spotify</label>
  						<div class="controls">
    						<input id="spotify" name="spotify" type="text" placeholder="Spotify HTTP Link" class="input-xlarge">
  						</div>
					</div>

					<!-- youtube input-->
					<div class="control-group">
  						<label class="control-label" for="youtube">YouTube</label>
  						<div class="controls">
    						<input id="youtube" name="youtube" type="text" placeholder="YouTube Shortlink" class="input-xlarge">
  						</div>
					</div>
				</fieldset>
				<input type="reset" />
				<input type="submit" />
			</form>
		</div>
	</body>
</html>