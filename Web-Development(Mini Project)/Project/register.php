<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$firstname = test_input($_POST['firstname']);
$lastname = test_input($_POST['lastname']);
$username = test_input($_POST['username']);
$pass = test_input($_POST['pass']);

//Database Connection code
$servername = "localhost";
$user_name = "admin";
$password = "admin@123";
$dbname = "acrsdb";

// Create connection
$conn = new mysqli($servername, $user_name, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO usr_reg (firstname, lastname, username, pass) VALUES ('".$firstname."', '".$lastname."', '".$username."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
  header("Location: log.php");
        exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

function test_input($data) {
  $data = trim($data); //removes blank spaces
  $data = stripslashes($data); //
  $data = htmlspecialchars($data); //
  return $data;
}
?>


<!-- Mysql Information -->
<!-- 

database name:- acrsdb
password:- admin

 -->