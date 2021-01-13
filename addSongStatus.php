<?php
	$status = $_GET['status'];
?>
<html>
	<head>
		<?php include 'styleLink.php'; ?>
		<style>
			p, h3 {
				clear: both;
				margin-left: 20px;
			}
			p {
				font-size: 18px;
			}
		</style>
	</head>
	<body>
		<div id="body">
			<?php include './universal/header.php'; ?>
    		
    		<?php
    		$id = $_GET['id'];
			
    		if($status == 'success'){
    			echo "<h3>Success!</h3>
    			<p>1 song has been added to the songbook. To view <a href='chart.php?id=" . $id . "'>Click Here</a></p>
    			<p>If you would like to add another song <a href='addsong.php'>Click Here</a><br /></p>
    			<p>If you would like to return to the song index <a href='index.php''>Click Here</a></p>";
			} else {
				echo "<h3>Failure!</h3>
				<p>1 song faild to be added to the songbook</p>
    			<p>If you would like to return to the song index <a href='index.php''>Click Here</a></p>";
			};
			?>
		</div>
	</body>
</html>