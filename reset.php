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
    <nav class="sidebar red collapse top large padding" style="z-index: 3;width: 200px;font-weight:bold;" id="myS"><br>

        <div class="container">
            <h3 class="padding-64"><b>Progetto<br>Esame</b></h3>
        </div>
        <div class="bar-block">

            <a href="Homepage.php" class="bar-item button hover-white">Statistiche</a>
            <a href="Inizializzazione.php" class="bar-item button hover-white">Inizializza DB</a>
            <a href="cancellazione.php" class="bar-item button hover-white">Pulizia DB</a>

        </div>
    </nav>





    <div class="main" style="margin-left:340px;margin-right:40px">

        <!-- Titolo pagina-->
        <div class="container" style="margin-top:50px" id="showcase">
            <h1 class="jumbo"><b>Trappola Laser</b></h1>
            <h1 class="xxxlarge text-red"><b>Dashboard</b></h1>
        </div>

        <div style="display:block;padding-bottom:20px"><b>Vuoi resettare arduino?</b></div>
        <input type="submit" onclick="reseturl()" value="Reset">
        <div id="resetdiv" style="display:none"><b>Arduino è stato resettato correttamente</b></div>

        <div style="display:block;padding-top:50px"><b>Vuoi cambiare nome alla stazione?</b></div>
        <form onsubmit="appendurl();return false" action="http://192.168.178.82/">
            <br>
            Nuovo nome stazione: <input type="text" name="station">
            <br> <!--TODO: separare la pagina di cambio nome-->
            <input type="submit" value="station">
        </form>
        <div id="resetdiv" style="display:none"><b>Nome stazione cambiato correttamente</b></div>

    </div>

    </div>

    <script>
        function getreq(urlind) {
            function reqListener() {
                console.log(this.responseText);
            }

            var oReq = new XMLHttpRequest();
            oReq.onload = reqListener;
            oReq.open("GET", urlind);
            oReq.send();


        }
//TODO: commentare questo script

        function appendurl() {
            var url = "http://192.168.178.82/station";
            var stationid = document.getElementsByName("station");
            url.append(stationid);
            getreq(url);

            var x = document.getElementById("resetdiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            getreq(urlres);
        }

        function reseturl() {
            var urlres = "http://192.168.178.82/resetnow"

            var x = document.getElementById("resetdiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            getreq(urlres);
        }
    </script>

</body>

</html>
