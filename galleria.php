







<!DOCTYPE html>
<html lang="en">
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="TripW.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="TripW.css" rel="stylesheet">
    <script src="/js/galleriajs.js"></script>
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
 <!-- Menù Laterale -->
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
                <a href="cambionomestazione.php"  class="bar-item button hover-white">Cambio nome stazione</a>
                <a href="reset.php" class="bar-item button hover-white">Riavvio Arduino</a>
            </div>
        </nav>



        <div class="main" style="margin-left:340px;margin-right:40px">

            <!-- Titolo pagina -->
            <div class="container" style="margin-top:50px" id="showcase">
                <h1 class="jumbo"><b>Trappola Laser</b></h1>
                <h1 class="jumbo"><b>Galleria attivazioni:</b></h1>
            </div>


            <!-- Display in sovraimpressione -->
            <div id="lback" onclick="gallery.hide()">
                <div id="lfront"></div>
            </div>

            <!--Galleria -->
            <div class="gallery">
                <?php
                // Legge le immagini dalla cartella img
                $dir = __DIR__ . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;
                $images = glob($dir . "*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);
                rsort($images);
                // Mostra tutte le immagini
                foreach ($images as $i) {
                    printf("<figure>");
                    printf("<img src='img/%s' title='%s'/ onclick='gallery.show(this)'/>", basename($i),basename($i));
                    printf("<figcaption> Attivazione n° : $i[18]$i[19]$i[20]$i[21]$i[22]$i[23]$i[24] </figcaption>");
                    printf("</figure>");
                }
                ?>
            </div>
        </div>
    </body>
</html>

























