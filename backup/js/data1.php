<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'edo');
define('DB_PASSWORD', 'edo');
define('DB_NAME', 'espdemo');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT station,COUNT(station) as nstation,MONTHNAME(Date) AS month FROM logs GROUP BY month ORDER BY FIELD(MONTH,'january','february','march','april','may','june','july','august','september','october','november','december')");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
