<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST["naam"];
$surname=$_POST["surname"];

$sql = "INSERT INTO triptable VALUES ('$name', '$surname')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>