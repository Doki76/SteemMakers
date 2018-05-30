<?php
	// setcookie() defines a cookie to be sent along with the rest of the HTTP headers. Like other headers, 
	// cookies must be sent before any output from your script (this is a protocol restriction). This requires 
	// that you place calls to this function prior to any output, including and tags as well as any whitespace.

	if(!empty($_GET["username"]) && !empty($_GET["access_token"]) && !empty($_GET["expires_in"]))
	{
		$expiresIn = $_GET["expires_in"];
		setcookie("username", $_GET["username"], time()+$expiresIn, "/");
		setcookie("access_token", $_GET["access_token"], time()+$expiresIn, "/");
		setcookie("expires_in", $expiresIn, time()+$expiresIn, "/");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("./src/globalhead.php"); ?>
	</head>

	<body class="bg-secondary">
		<?php include("navbar.php"); ?>

		<div class="container" style="position:relative; width: 25%;">
			<div class="center-area">
				<div class="centered">
					<center>
					<p>
						You will be redirected automatically.<br/>
						If not <a href="index.php">click here</a>.
					</p>
					</center>
				</div>
			</div>
		</div>

		<script>
			setTimeout(function(){$(location).attr('href', 'index.php');}, 1000);
		</script>

		<?php include("footer.php"); ?>
	</body>
</html>
