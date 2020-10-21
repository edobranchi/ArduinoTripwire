$(document).ready(function(){
    $.ajax({
        url: "/js/data2.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var station = [];
            var nstation = [];

            for(var i in data) {
                station.push("station " + data[i].station);
                nstation.push(data[i].nstation);
            }

            var chartdata = {
                labels: station,
                datasets : [
                    {
                        label: 'A B',
                        backgroundColor: [
                            'rgba(25, 200, 20, 1)',
                            'rgba(225, 20, 20, 1)'
                        ],

                        hoverBackgroundColor: [
                            'rgba(25, 200, 20, 0.75)',
                            'rgba(225, 20, 20, 0.75)'
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
