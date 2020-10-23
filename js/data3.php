<?php

header('Content-Type: application/json');

//CRedenziali db
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'edo');
define('DB_PASSWORD', 'edo');
define('DB_NAME', 'espdemo');

//connessione al db
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
}

//query per l'estrazione dei dati
$query = sprintf(" SELECT station,COUNT(station) as num FROM logs GROUP BY station");

//esecuzione query
$result = $mysqli->query($query);

//salvataggio dati
$data = array();
foreach ($result as $row) {
    $data3[] = $row;
}

//libera la memoria
$result->close();

//chiude la connessione
$mysqli->close();

//stampa i dati
print json_encode($data3);
