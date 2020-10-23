<?php

header('Content-Type: application/json');

//Credenziali DB
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'edo');
define('DB_PASSWORD', 'edo');
define('DB_NAME', 'espdemo');

//Si connette al DB
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
}

//query per l'estrazione dei dati
$query = sprintf("SELECT station,COUNT(station) as nstation,MONTHNAME(Date) AS month FROM logs GROUP BY month ORDER BY FIELD(MONTH,'january','february','march','april','may','june','july','august','september','october','november','december')");

//Esecuzione query
$result = $mysqli->query($query);

//Salvataggio dei risultati
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

//Libera la memoria
$result->close();

//chiude la connessione
$mysqli->close();

//stampa i dati
print json_encode($data);
