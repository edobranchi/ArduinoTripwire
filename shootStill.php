<?php


//credenziali di accesso al db
$servername = "localhost";
$username = "edo";
$password = "edo";
$dbname = "espdemo";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controlla la connessione
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

//query per estrarre il numero dell'ultima entry
$sql = "SELECT MAX(id) from logs";

//esecuzione query
$maxid = $conn->query($sql);

//salva il risultato dall' array monodimensionale in una variabile '$lastentry'
while($result = mysqli_fetch_array($maxid)){;
$lastentry = $result[0];}

//chiude la connessione
$conn->close();


//chiama in esecuzione la shell e lancia il comando per scattare la foto che sarà salvata in /var/www/html/img/ con il numero
//dell'attivazione come nome file
shell_exec("fswebcam -t 1000 --save /var/www/html/img/".$lastentry.".jpg");




?>
