<?php
/*
MIT License
Copyright (c) 2019 Fernando 
https://github.com/dlfernando/
*/

// Configure your mysql database connection details:

$mysqlserverhost = "localhost";
$database_name = "voting";
$username_mysql = "test_user";
$password_mysql = "test_user";

// ------------------------- Do not modify code nder this field -------------------------- //


function sanitize($variable){
	$clean_variable = strip_tags($variable);
	$clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
	return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
	$connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
	if (!$connect) {
		  die("Connection failed mysql: " . mysqli_connect_error());
	}
	return $connect;	
}

if(isset($_POST["processform"])){
	$connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
	$user_id = mysqli_real_escape_string($connection, sanitize($_POST["user_id"]));
	$user_name= mysqli_real_escape_string($connection, sanitize($_POST["user_name"]));
	$password = mysqli_real_escape_string($connection, sanitize($_POST["password"]));
	$sql = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
	if (mysqli_query($connection, $sql)) {
		  echo "<h2><font color=blue>New record added to database.</font></h2>";
	} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
	mysqli_close($connection);
}

?>








<!-- html starts from here -->
<!DOCTYPE html>
<html>   <head>
      <title>LOGIN</title>
      <link rel="stylesheet" type="text/css" href="style1.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </head>
<body>
	
	<form action="login.php" method="post" name="Form" onsubmit="return validateForm()">
		<input type="hidden" name="processform" value="1">
	<div style="background-image: url(vote.jpg); height: 1000px">

	<h1>LOGIN TO VOTE</h1>

  <div id="login">
	<label for="user_id"><strong>USER ID</strong></label>
	<input type="text" name="user_id" placeholder="required"required><br>
 </div>
 <div id="user_name">
 	<label for="user_name"><strong>USER NAME</strong></label>
	<input type="text" name="user_name" placeholder="required"required><br>
 </div>
 <div id="password">
	<label for="password"><strong>PASSWORD</strong></label>
	<input type="text" name="password" placeholder="required"required><br>
 </div>
 <div id="LOG">
 	<form>
   <!-- <button formaction="CANDIDATE.html">LOGIN</button> -->
   <a href="register.php">If you are a new user click here to register </a>
	 <input type="submit" value="Submit">

	</form>
 </div>
 

</body>
</html>

