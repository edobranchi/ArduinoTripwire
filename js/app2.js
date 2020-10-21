$(document).ready(function(){
    $.ajax({
        url: "/js/data1.php",
        method: "GET",
        success: function(data2) {
            console.log(data2);
            var station = [];
            var nstation = [];
            var month = [];

            for(var i in data2) {
                station.push("station " + data2[i].station);
                nstation.push(data2[i].nstation);
                month.push(data2[i].month);
            }

            var chartdata = {
                labels: month,
                datasets : [
                    {
                        label: ["january", "february" ,"march", "april", "may", "june", "july", "august", "september", "october", "november", "december"],
                        backgroundColor: [
                            'rgba(25, 200, 20, 0.50)'
                        ],
                        borderColor:[
                            'rgba(225, 20, 20, 0.75)'
                        ],
                        pointBackgroundColor:['rgba(225, 20, 20, 0.75)'],
                        hoverBackgroundColor: [
                            'rgba(25, 200, 20, 0.25)'

                        ],
                        lineTension:0,
                        data: nstation
                    }],
            };

            var ctx = 'myChart';
            Chart.helpers.merge(Chart.defaults.global.plugins.datalabels, {
                color: '#FE777B'
            });

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    plugins:{
                        labels: {
                            render: 'value'
                        }
                    },
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
                        text:'mensile'}
                }
            });



        },
        error: function(data3) {
            console.log(data3);
        }
    });
});


