<!DOCTYPE>
<html>
<head>
  <title>Elixir Tech Solutions</title>
	
</head>
<body>

</body>
</html>

<?php
// phpinfo();

// echo "<h1>Success</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_tv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



?>