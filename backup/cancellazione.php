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

    <nav class="sidebar red collapse top large padding" style="z-index:3;width:200px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="close()" class="button hide-large display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="container">
            <h3 class="padding-64"><b>Progetto<br>Esame</b></h3>
        </div>
        <div class="bar-block">

            <a href="Homepage.php" onclick="close()" class="bar-item button hover-white">Statistiche</a>
            <a href="Inizializzazione.php" onclick="close()" class="bar-item button hover-white">Inizializza DB</a>
            <a href="cancellazione.php" onclick="close()" class="bar-item button hover-white">Pulizia DB</a>
<a href="grafici.php" onclick="close()" class="bar-item button hover-white">Grafici</a>
        </div>
    </nav>



    <!-- Top menu on small screens -->
    <header class="container top hide-large red xlarge padding">
        <a href="javascript:void(0)" class="button red margin-right" onclick="open()">☰</a>
        <span>Trappola Laser</span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="overlay hide-large" onclick="close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="container" style="margin-top:50px" id="showcase">
            <h1 class="jumbo"><b>Sei sicuro di voler ripulire il Database?</b></h1>
            <h1 class="xxxlarge text-red"><b>Questa operazione non può essere annullata.</b></h1>
        </div>
        <div>

            <form method="post">
                <input type="submit" name="init" value="Ripulisci DB" />


                <!-- <a href="Homepage.html" onclick="close()" style="background-color: #ed3330" class="pagebutton">Homepage</a> -->
            </form>

        </div>
    </div>



    <?php
if( isset( $_REQUEST['init'] ))
{

//Create Data base if not exists
	$servername = "localhost";
	$username = "edo";
	$password = "edo";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Cancel all rows
	$sql = "TRUNCATE logs";
	if ($conn->query($sql) === TRUE) {

	    echo "<h3 style='margin-left: 350px'>Database ripulito correttamente.</h3> ";

	} else {

	    echo "<h3 style='margin-left: 350px'>Errore nella pulizia del database: " . $conn->error. "</h3>";
	}

	$conn->close();

}


?>
 <!-- End page content -->
    </div>



    <script>
        // Script to open and close sidebar
        function open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }


        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>

</body>

</html>
