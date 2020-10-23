<?php

//chiama il file per scattare la foto quando viene chiamata questo file che crea le entry nel DB
include 'shootStill.php';

//Credenziali di accesso al DB
$servername = "localhost";
$username = "edo";
$password = "edo";
$dbname = "espdemo";

// Crea connesione
$conn = new mysqli($servername, $username, $password, $dbname);
// controlla la connessione
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

//crea time stamp attuali
date_default_timezone_set('Europe/Rome');
$d = date("d-m-Y");
$t = date("H:i:s");

//estrae status e stazione ricevute dal NODE e le salva nelle variabili $status e $station
if(!empty($_POST['status']) && !empty($_POST['station']))
{
    $status = $_POST['status'];
    $station = $_POST['station'];

    //crea la query di inserimento
    $sql = "INSERT INTO logs (station, status, Date, Time)

		VALUES ('".$station."', '".$status."', '".$d."', '".$t."')";

    //controlla se l'esecuzione della query è andata a buon fine
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//chiude la connessione
$conn->close();

?>
