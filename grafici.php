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

        <!-- Importa i file dei singoli grafici-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/chart.min.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/js/app2.js"></script>
        <script type="text/javascript" src="/js/app3.js"></script>
        <script type="text/javascript" src="/js/chartjs-plugin-datalabels.js"></script>
        <script type="text/javascript" src="/js/chartjs-plugin-colorschemes.js"></script>
        <script src="https://unpkg.com/chartjs-plugin-colorschemes"></script>
        <!--Menù laterale-->
        <nav class="sidebar red collapse top large padding" style="z-index: 3;width: 200px;font-weight:bold;" id="mySidebar"><br>
            <div class="container">
                <h3 class="padding-64"><b>Progetto<br>Esame</b></h3>
            </div>
            <div class="bar-block">

                <a href="Homepage.php"  class="bar-item button hover-white">Statistiche</a>
                <a href="Inizializzazione.php"  class="bar-item button hover-white">Inizializza DB</a>
                <a href="cancellazione.php"  class="bar-item button hover-white">Pulizia DB</a>
                <a href="grafici.php"  class="bar-item button hover-white">Grafici</a>
                <a href="galleria.php"  class="bar-item button hover-white">Galleria Catture</a>
                <a href="cambionomestazione.php"  class="bar-item button hover-white">Cambio nome stazione</a>
                <a href="reset.php" class="bar-item button hover-white">Riavvio Arduino</a>

            </div>
        </nav>






        <div class="main" style="margin-left:340px;margin-right:40px">

            <!-- Titolo pagina -->
            <div class="container" style="margin-top:50px" id="showcase">
                <h1 class="jumbo"><b>Trappola Laser</b></h1>
                <h1 class="xxxlarge text-red"><b>Grafici attivazioni</b></h1>

                <!--Mostra i 3 grafici-->
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

    </body>

</html>
