//Grafico attivazioni ultime 24 ore divise per stazione
$(document).ready(function(){
    $.ajax({
        //collegamento al file data2.php
        url: "/js/data2.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var station = [];
            var nstation = [];
            //creo un vettore con i dati ricevuti
            for(var i in data) {
                station.push("station " + data[i].station);
                nstation.push(data[i].nstation);
            }
            //creo il grafico
            var chartdata = {
                labels: station,
                datasets : [
                    {
                  label: 'A B C D E F G H',
                        backgroundColor: [
                            'rgba(25, 200, 20, 1)',
                            'rgba(225, 20, 20, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(128, 255, 0, 1)',
                            'rgba(0, 255, 255, 1)',
                            'rgba(255, 255, 0, 1)',
                            'rgba(255, 255, 128, 1)'
                        ],

                        hoverBackgroundColor: [
                            'rgba(25, 200, 20, 0.75)',
                            'rgba(225, 20, 20, 0.75)',
                            'rgba(0, 255, 0, 0.75)',
                            'rgba(255, 99, 132, 0.75)',
                            'rgba(128, 255, 0, 0.75)',
                            'rgba(0, 255, 255, 0.75)',
                            'rgba(255, 255, 0, 0.75)',
                            'rgba(255, 255, 128, 0.75)'
                        ],
                        data: nstation
                    }],
            };

            var ctx = 'myChart2';

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend:{ display:false},
                    title:{
                        display:true,
                        text:'ultime 24 ore'}


                }
            });




        },
        error: function(data) {
            console.log(data);
        }
    });
});
