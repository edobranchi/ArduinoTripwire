<?php

header('Content-Type: application/json');

//Credenziali DB
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'edo');
define('DB_PASSWORD', 'edo');
define('DB_NAME', 'espdemo');

//Si connette al Db
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
}

//Query per l'estrazione
$query = sprintf("SELECT station,COUNT(station) as nstation FROM `logs` WHERE `Date`>= CURRENT_DATE - INTERVAL 1 DAY GROUP BY station");

//esecuzione query
$result = $mysqli->query($query);

//salvataggio dei dati
$data = array();
foreach ($result as $row) {
    $data2[] = $row;
}

//libera la memoria
$result->close();

//chiude la connessione
$mysqli->close();

//stampa i risultati
print json_encode($data2);
