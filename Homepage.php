<!DOCTYPE html>
<html lang="en">
<title>Dashboard</title>
<meta http-equiv="refresh" content="5">
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
    <nav class="sidebar red collapse top large padding" style="z-index: 3;width: 200px;font-weight:bold;" id="myS"><br>
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
            <h1 class="jumbo"><b>Trappola Laser</b></h1>
            <h1 class="xxxlarge text-red"><b>Dashboard</b></h1>
        </div>


        <div id="cards" class="cards">
            <?php

                //Parametri di connessione al DB
                $servername = "localhost";
                $username = "edo";
                $password = "edo";
                $dbname = "espdemo";

                // Crea connessione
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Controlla la connessione
                if ($conn->connect_error) {
                    echo "<div class='container'><h3>Errore nel collegamento al Database :    '". $conn->connect_error. "'</h3></div> ";
                    echo "<div class='container'><h3 href='Inizializzazione.php'>Puoi crearlo cliccando qui ---> <a href='Inizializzazione.php' style='background: green; border-radius:5px' class='bar-item button '>Inizializza DB</a> </h3></div> ";
                }



                if($sql = "SELECT * FROM logs ORDER BY id DESC"){
                    if ($result=mysqli_query($conn,$sql))
                    {
                        // Recupera le righe della tabella logs e le mostra
                        echo "<TABLE id='c4ytable'>";
                        echo "<TR><TH>Sr.No.</TH><TH>Station</TH><TH>Activation</TH><TH>Date</TH><TH>Time</TH></TR>";
                        while ($row=mysqli_fetch_row($result))
                        {
                            echo "<TR>";
                            echo "<TD>".$row[0]."</TD>";
                            echo "<TD>".$row[1]."</TD>";
                            echo "<TD>".$row[2]."</TD>";
                            echo "<TD>".$row[4]."</TD>";
                            echo "<TD>".$row[5]."</TD>";
                            echo "</TR>";
                        }
                        echo "</TABLE>";
                        // libera la variabile Result
                        mysqli_free_result($result);
                    }

                }
                mysqli_close($conn);
                ?>


        </div>
    </div>



</body>

</html>
