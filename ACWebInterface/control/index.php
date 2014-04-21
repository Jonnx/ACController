<?php 
	require_once("../_system/classes/ACController.start.php");
	EXT("DB");
	EXT("SessionManager");
	EXT("ACStatus");
	
	// VALDIATE SESSION
	SessionManager::check();

	if(isset($_POST["status"])) {
		$success = ACStatus::setStatus($_POST["status"]);
	}

	$status = ACStatus::getStatus();
	$status_text = "Off";
	$button_text = "On";
	$button_class = "button-success";
	$icon_spin = "";
	$toggle_status = 1;
	if($status == 1) {
		$status_text = "On";
		$button_text = "Off";
		$toggle_status = 0;
		$button_class = "button-danger";
		$icon_spin = "fa-spin";
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>AC Control</title>

	<link rel="stylesheet" type="text/css" href="../_system/assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../_system/assets/css/style_login.css">

</head>
<body>
	
	<div class="status">
		<div class="container">
	
			<h1>
				<i class="fa fa-gear <?php echo $icon_spin; ?>"></i>
			</h1>

			<h1>AC Status: <?php echo $status_text; ?></h1>

			<form method="POST">
				<input type="hidden" name="status" value="<?php echo $toggle_status ?>">
				<button type="submit" class="button <?php echo $button_class; ?>">Turn AirConditioning <strong><?php echo $button_text; ?></strong></button>
			</form>
			<br />
			<button onclick="window.location.href='../'" class="button">
				Log Out
			</button>
		</div>
	</div>

</body>
</html>