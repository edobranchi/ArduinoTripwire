$(document).ready(function(){
    $.ajax({
        url: "/js/data3.php",
        method: "GET",
        success: function(data3) {
            console.log(data3);
            var station = [];
            var num = [];

            for(var i in data3) {
                station.push("station " + data3[i].station);
                num.push(data3[i].num);
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
                        data: num
                    }]

            };

            var ctx = 'myChart3';

            var barGraph = new Chart(ctx, {

                type: 'pie',
                data: chartdata,
                options: {

                    legend:{ display:false},
                    title:{
                        display:true,
                        text:'attivazioni'}


                }
            });

        },
        error: function(data3) {
            console.log(data3);
        }
    });
});
