<?php
	session_start();
	
	if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])){
		
	};
?>

<html>
	<head>
		<?php include 'styleLink.php'; ?>
		<title>YLOTW Songbook Login</title>
	</head>
	
	<body>
		<div id="body">
			<?php include '/universal/header.php'; ?>
			<form method="post" action="">
				<fieldset>
					<legend>Login</legend>
					<div class="control-group">
  						<label class="control-label" for="username">Username</label>
  						<div class="controls">
    						<input id="username" name="username" type="text" class="input-xlarge" required="">  
  						</div>
					</div>

					<!-- artist input-->
					<div class="control-group">
  						<label class="control-label" for="pwd">Passowrd</label>
  						<div class="controls">
    						<input id="pwd" name="pwd" type="password" class="input-xlarge" required="">
  						</div>
					</div>
				</fieldset>
				<input type="submit" name="submit" />
			</form>
			
		</div>
	</body>
</html>