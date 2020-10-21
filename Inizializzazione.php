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
        <!--Menù laterale-->
        <nav class="sidebar red collapse top large padding" style="z-index:3;width:200px;font-weight:bold;" id="mySidebar"><br>
            <a href="javascript:void(0)"  class="button hide-large display-topleft" style="width:100%;font-size:22px">Close Menu</a>
            <div class="container">
                <h3 class="padding-64"><b>Progetto<br>Esame</b></h3>

            </div>
            <div class="bar-block">

                <a href="Homepage.php"  class="bar-item button hover-white">Statistiche</a>
                <a href="Inizializzazione.php"  class="bar-item button hover-white">Inizializza DB</a>
                <a href="cancellazione.php"  class="bar-item button hover-white">Pulizia DB</a>
                <a href="grafici.php"  class="bar-item button hover-white">Grafici</a>
                <a href="galleria.php"  class="bar-item button hover-white">Galleria Catture</a>
            </div>
        </nav>




        <div class="main" style="margin-left:340px;margin-right:40px">

            <!-- Titolo pagina -->
            <div class="container" style="margin-top:50px" id="showcase">
                <h1 class="jumbo"><b>Sei sicuro di voler inizializzare il Database?</b></h1>
                <h1 class="xxxlarge text-red"><b>Questa operazione è necessaria solo alla prima accensione</b></h1>
            </div>
            <div>

                <form method="post">
                    <input type="submit" name="init" value="Inizializza DB" />

                </form>

            </div>
        </div>



        <?php
        if( isset( $_REQUEST['init'] ))
        {

            //Inizializza i parametri di connessione al DB
            $servername = "localhost";
            $username = "edo";
            $password = "edo";

            // Crea la connessione
            $conn = new mysqli($servername, $username, $password);
            // Controlla la connessione
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Passa al Db la query di creazione del DB
            $sql = "CREATE DATABASE espdemo";
            if ($conn->query($sql) === TRUE) {

                echo "<h3 style='margin-left: 350px'>Database creato correttamente</h3> ";

            } else {

                echo "<h3 style='margin-left: 350px'>Errore nella creazione del DB : " . $conn->error. "</h3>";
            }

            $conn->close();


            //Connessione al DB "espdemo"
            $servername = "localhost";
            $username = "edo";
            $password = "edo";
            $dbname = "espdemo";

            // Crea connessione
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Controlla la connessione
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //crea la tabella
            $sql = "CREATE TABLE logs (
	               id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	               station VARCHAR(30),
	               status VARCHAR(30),
	               `Date` DATE NULL,
	               `Time` TIME NULL,
	               `TimeStamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	               )";
            //Controlla per eventuali errori nella creazione
            if ($conn->query($sql) === TRUE) {
                echo "<h3 style='margin-left: 350px'>Tabella Logs creata correttamente</h3> ";
            } else {
                echo "<h3 style='margin-left: 350px'>Errore nella creazione della tabella:  " . $conn->error. "</h3>";
            }

            $conn->close();

        }


        ?>

        </div>

    </body>

</html>
