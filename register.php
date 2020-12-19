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
     $first_name = mysqli_real_escape_string($connection, sanitize($_POST["first_name"]));
     $last_name = mysqli_real_escape_string($connection, sanitize($_POST["last_name"]));
     $email= mysqli_real_escape_string($connection, sanitize($_POST["email"]));
     $user_id= mysqli_real_escape_string($connection, sanitize($_POST["user_id"]));
     $password = mysqli_real_escape_string($connection, sanitize($_POST["password"]));
   	$confirm_password = mysqli_real_escape_string($connection, sanitize($_POST["confirm_password"]));
   	$sql = "INSERT INTO sessions (first_name,last_name,email,user_id, password, confirm_password) VALUES ('$first_name', '$last_name','$email', '$user_id', '$password', '$confirm_password')";
   	if (mysqli_query($connection, $sql)) {
   		  echo "<h2><font color=blue>New record added to database.</font></h2>";
   	} else {
   		  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
   	}
   	mysqli_close($connection);
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>REGISTER</title>
      <link rel="stylesheet" type="text/html" href="SUBMIT.html">
      <link rel="stylesheet" type="text/css" href="style3.css">
   </head>
   <body>
      <p>
         
     
     <h1>REGISTER TO VOTE </h1>
      <div id= "first">
         <form action="register.php" method="post" name="Form" onsubmit="return validateForm()">
         <label for="first name"><strong>FIRST NAME:</strong></label>
         <input type="text" name="first_name" 
            placeholder="required field"required><br>
      </div>
      <div id="last">
         <label for="last name"><strong>LAST NAME:</strong></label>
         <input type="text" name="last_name"   placeholder="if have"><br>
      </div>
     
      <div id="email">
         <label for="email"><strong>EMAIL:</strong></label>
         <input type="text" name="email"   placeholder="required field"required><br>
      </div>
      <div id="user">
         <label for="user id"><strong>USER ID:</strong></label>
         <input type="text" name="user_id"   placeholder="required field"required><br>
      </div>
      <div id="password">
         <label for="password"><strong>PASSWORD:</strong></label>
         <input type="text" name="password"   placeholder="enter atleast 8 characters"required><br>
      </div>
      <div id="password">
         <label for="password"><strong>CONFIRM PASSWORD:</strong></label>
         <input type="text" name="confirm_password"   placeholder="confirm password"required><br>
      </div>
      <!-- <div id="gender">
         <label for="gender"><strong>MALE</strong></label>
         <input type="radio" name="gender"  value="choice-1"><br>
         <label for="gender"><strong>FEMALE</strong></label>
         <input type="radio" name="gender"  value="choice-2"><br>
      </div>
      <div id="category">
         <label for="category"><strong>STUDENT</strong></label>
         <input type="radio" name="category"  value="choice-1"><br>
         <label for="category"><strong>LECTURE</strong></label>
         <input type="radio" name="category"  value="choice-2"><br>
      </div> -->
      <div id="SUBMIT">
         <!-- <button type="SUBMIT"><strong>SUBMIT</strong></button><br> -->
         <input type="submit" value="Submit">
      </div>
</form>
</body>
</html>