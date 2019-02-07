<?php
// database connection
$serverName="*YOUR HOST*";
$dbusername="*YOUR DATABASE USERNAME*";
$dbpassword="*YOUR DATABASE PASSWORD*";
$dbname="*YOUR DATABASE NAME*";

$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// getting variables to store in table
$date = $_POST['aDate'];
$water = $_POST['aWater'];
$plant = $_POST['aPlant'];
$description = $_POST['aDesc'];

// insert question to table 'customernew'
	$sql="insert into PlantDAT values('','$date','$description','$water','$plant')";
	$result = mysqli_query($conn, $sql);
	header('location:index.php');
?>

