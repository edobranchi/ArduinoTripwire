
<?php
ini_set('display_errors', 1);

//Creates new record as per request
//Connect to database
$servername = "localhost";
$username = "edo";
$password = "edo";
$dbname = "espdemo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

//get the last used number for naming file
$sql = "SELECT MAX(id) from logs";

$maxid = $conn->query($sql);

while($result = mysqli_fetch_array($maxid)){;
                                            $lastentry = $result[0];}
$conn->close();


//up the number by one



//construct file name with leading zeros
$imgName=str_pad($lastentry,6,"0",STR_PAD_LEFT);


//take still image with PiCamera and store it in '/var/www/img' directory
//edit the raspistill command here to taste but make sure not to remove the double quotes!
shell_exec("fswebcam -t 1000 --save /var/www/html/img/".$lastentry.".jpg");




?>
