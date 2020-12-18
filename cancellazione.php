<!DOCTYPE html>
<html lang="en">
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="TripW.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Poppins", sans-serif
    }

    body {
        font-size: 16px;
    }

</style>

<body>
    <!-- Menù laterale -->
    <nav class="sidebar red collapse top large padding" style="z-index:3;width:200px;font-weight:bold;" id="mySidebar"><br>
        <a class="button hide-large display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="container">
            <h3 class="padding-64"><b>Progetto<br>Esame</b></h3>
        </div>
        <div class="bar-block">
            <a href="grafici.php" class="bar-item button hover-white">Grafici</a>
            <a href="Inizializzazione.php" class="bar-item button hover-white">Inizializza DB</a>
            <a href="cancellazione.php" class="bar-item button hover-white">Pulizia DB</a>
            <a href="galleria.php" class="bar-item button hover-white">Galleria Catture</a>
            <a href="cambionomestazione.php" class="bar-item button hover-white">Cambio nome stazione</a>
            <a href="reset.php" class="bar-item button hover-white">Riavvio Arduino</a>
            <a href="Homepage.php" class="bar-item button hover-white">Log Avanzati</a>
        </div>
    </nav>





    <div class="main" style="margin-left:340px;margin-right:40px">

        <!-- Titolo pagina -->
        <div class="container" style="margin-top:50px" id="showcase">
            <h1 class="jumbo"><b>Sei sicuro di voler ripulire il Database?</b></h1>
            <h1 class="xxxlarge text-red"><b>Questa operazione non può essere annullata.</b></h1>
        </div>
        <div>

            <form method="post">
                <input type="submit" name="init" value="Ripulisci DB" />
            </form>

        </div>
    </div>



    <?php
        if( isset( $_REQUEST['init'] )) {
            //Cancella tutto il contenuto della cartella "img"
            echo shell_exec("rm -r -f  img/*.jpg");
            //Inizializza le variabili di connessione
            $servername = "localhost";
            $username = "edo";
            $password = "edo";
            $dbname = "espdemo";

            // Crea connessione
            $conn = new mysqli($servername, $username, $password,$dbname);
            // Controlla la connessione
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //Query per lo svuotamento del DB
            $sql = "TRUNCATE logs";
            if ($conn->query($sql) === TRUE) {

                echo "<h3 style='margin-left: 350px'>Database ripulito correttamente.</h3> ";

            } else {

                echo "<h3 style='margin-left: 350px'>Errore nella pulizia del database: " . $conn->error. "</h3>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>

</html>
