<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'mamp';
$DATABASE_PASS = '';
$DATABASE_NAME = 'maroDB';

// Connect to Database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
	// Error with connection
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if data exists
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Data doesn't exist
	exit('Please fill both the email and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password, first_name, last_name FROM user WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();

	// Check if account exists in DB
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $first_name, $last_name);
	$stmt->fetch();
		// Account exists
		if (password_verify($_POST['password'], $password)) {
			// Password is correct
			// Create sessions
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['id'] = $id;
			$_SESSION['fname'] = $first_name;
			$_SESSION['lname'] = $last_name;
			// Go to Main Page
			header('Location: index.php');
		} else {
			echo 'Incorrect password!';
		}
	} else {
	echo 'Incorrect email!';
}

	$stmt->close();
}
?>
