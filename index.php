<?php
session_start();

// Check if user logged in
if (!isset($_SESSION['loggedin'])) {
	// user hasn't logged in
	// redirect to login page
	header('Location: login.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Welcome </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row my_row justify-content-center align-items-center" style="font-size: 32px">
            <strong>Welcome, <?=$_SESSION['fname']?> <?=$_SESSION['lname']?>!</strong>
        </div>

		<div class="row justify-content-center">
			<a href="logout.php"><button class="btn btn-info">Logout</button></a>
		</div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
