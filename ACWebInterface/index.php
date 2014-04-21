<?php

	require_once("./_system/classes/ACController.start.php");
	EXT("DB");
	EXT("SessionManager");
	SessionManager::init();
	// PROCESS LOGIN ATTEMPT
	if(isset($_POST["email"])) {
		$login_success = false;
		if(SessionManager::authorize($_POST["email"], $_POST["password"])) {
			echo '<meta http-equiv="refresh" content="0; ./control/">';
			$login_success = true;
			exit;
		}
	}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>AC Controller</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./_system/assets/css/style_login.css">

</head>
<body>

		<?php
			if(isset($login_success)) {
				if($login_success == false) {
					?>
						<div class="alert alert-danger">
							Login Failed. Please try again.
						</div>
					<?php
				}
			}
		?>

		<div class="login">
			<div class="container">

				<h1>ArduinoAC</h1>
				<p>Remote Control Home AirConditioning</p>

				<form method="POST">
					<div class="control-group">
						<input type="text" name="email" placeholder="User" />
					</div>
					<div class="control-group">
						<input type="password" name="password" placeholder="Password" />
					</div>
					<div class="control-group">
						<button type="submit" class="button button-success">Log In</button>
					</div>
				</form>
			</div>
		</div>

		

</body>
</html>