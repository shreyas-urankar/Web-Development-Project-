<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$startdate = test_input($_POST['startDate']);
$enddate = test_input($_POST['endDate']);
$eventname = test_input($_POST['event']);

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

$sql = "INSERT INTO event_reminder (start_dates, end_date, event_description) VALUES ('".$startdate."', '".$enddate."', '".$eventname."')";

if ($conn->query($sql) === TRUE) {
  header("Location: calender.html");
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

