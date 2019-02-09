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
$varDate = $_POST['date'];
if ($varDate == "today"){
        $date = date("Y-m-d");
} else {
        $date = $_POST['aDate'];
}

$water = $_POST['aWater'];
$plant = $_POST['aPlant'];

$varDescChoose = $_POST['desc'];
if ($varDescChoose == "preset"){
        $varDesc = $_POST['description'];
        if ($varDesc == "nothing"){
            $description = "Nothing yet.";
        } elseif ($varDesc == "grow"){
            $description = "Plant growed.";
        } elseif ($varDesc == "water"){
            $description = "Plant absorbed a lot of water.";
        } else {
            $description - "Plant growed and absorbed a lot of water.";
        }
} else {
        $description = $_POST['aDesc'];
}

// insert question to table 'customernew'
if ($water == "" && $plant == "" || $plant == "" || $water == ""){
        echo "Lol, really sneaky! Please log in to use the form to submit.";
} else {
	$sql="insert into PlantDAT values('','$date','$description','$water','$plant')";
	$result = mysqli_query($conn, $sql);
	header('location:index.php');
}
?>

