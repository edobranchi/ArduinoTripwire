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


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/chart.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/app2.js"></script>
    <script type="text/javascript" src="/js/app3.js"></script>
    <script type="text/javascript" src="/js/chartjs-plugin-datalabels.js"></script>

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


        <div class="split">
            <div class="half" style="float:left">
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                <canvas id="myChart3" width="300" height="300" ></canvas>

            </div>
            <div class="half" style="float:right">
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                <canvas id="myChart2" width="300" height="300" style="border-bottom:  50px"></canvas>
            </div>
        </div>
        <div >
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <canvas id="myChart" width="600" height="300" style="padding-top: 20px"></canvas>
        </div></div>
    </div>
    <!-- End page content -->



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
