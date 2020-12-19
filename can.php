<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_details";

$candidate_id = $_POST[candidate_id];
$user_id = $_POST[user_id];
$candidate_name = $_POST[candidate_name];
$sem = $_POST[sem];
$branch = $_POST[branch];
$gender = $_POST[gender];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO candidate (candidate_id, user_id, candidate_name, sem, branch, gender)
VALUES ('$candidate_id', '$user_id', '$candidate_name', '$sem', '$branch', '$gender')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>