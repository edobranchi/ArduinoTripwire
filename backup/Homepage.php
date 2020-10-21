<!DOCTYPE html>
<html lang="en">
<title>Dashboard</title>
<meta http-equiv="refresh" content="1">
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



    <nav class="sidebar red collapse top large padding" style="z-index: 3;width: 200px;font-weight:bold;" id="myS"><br>
        <!-- <a href="javascript:void(0)" onclick="close()" class="button hide-large display-topleft" style="width:100%;font-size:22px">Close Menu</a>-->
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
        <!--<a href="javascript:void(0)" class="button red margin-right" onclick="open()" id="">☰</a>-->
        <span>Trappola Laser</span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="overlay hide-large" onclick="close()" style="cursor:pointer" title="close side menu" id="myO"></div>

    <!-- !PAGE CONTENT! -->
    <div class="main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="container" style="margin-top:50px" id="showcase">
            <h1 class="jumbo"><b>Trappola Laser</b></h1>
            <h1 class="xxxlarge text-red"><b>Dashboard</b></h1>
        </div>


        <div id="cards" class="cards">
            <?php
    //Connect to database and create table
    $servername = "localhost";
    $username = "edo";
    $password = "edo";
    $dbname = "espdemo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo "<div class='container'><h3>Errore nel collegamento al Database :    '". $conn->connect_error. "'</h3></div> ";
        echo "<div class='container'><h3 href='Inizializzazione.php'>Puoi crearlo cliccando qui ---> <a href='Inizializzazione.php' style='background: green; border-radius:5px' class='bar-item button '>Inizializza DB</a> </h3></div> ";
       }



    if($sql = "SELECT * FROM logs ORDER BY id DESC"){
    if ($result=mysqli_query($conn,$sql))
    {
      // Fetch one and one row
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
      // Free result set
      mysqli_free_result($result);
    }

}
    mysqli_close($conn);
?>


        </div>
        <!-- End page content -->
    </div>

    <script>
        // Script to open and close sidebar
        function open() {
            document.getElementById("myS").style.display = "block";
            document.getElementById("myO").style.display = "block";
        }

        function close() {
            document.getElementById("myS").style.display = "none";
            document.getElementById("myO").style.display = "none";
        }

    </script>

</body>

</html>
