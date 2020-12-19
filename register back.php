<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting details";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];
$course_name = $_POST['course_name'];
$sem = $_POST['sem'];
$password = $_POST['password'];
$confirm password = $_POST['confirm password'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registeration_details (first_name, last_name, phone_number, email, user_id, course_name, sem, password, confirm password)
VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$user_id', '$course_name', '$sem', '$password', '$confirm password')";

if ($conn->query($sql) === TRUE) {
  echo "Successfully Registered";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>