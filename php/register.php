<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $email = $_POST["email"];
  $mobile_no = $_POST["mobile_no"];
  $password = $_POST["password"];

  // Insert data into the "register" table
  $sql = "INSERT INTO register (email, mobile_no, password) VALUES ('$email', '$mobile_no', '$password')";

  if (mysqli_query($conn, $sql)) {
    // Redirect to index.html if registration is successful
    header("Location: index.html");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
