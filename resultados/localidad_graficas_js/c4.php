<script>
        var valor4 = <?php echo $C4; ?>;
        var value4 = <?php echo C("C4",$C4,"RESULTADO"); ?>;
        var mensaje4 = "<?php echo C("C4",$C4,"MENSAJE"); ?>";
        var data = {
            labels: [
                "Resultado",
                ""
            ],
            datasets: [{
                data: [value4, 100 - value4],
                backgroundColor: [
                    "<?php echo C("C4",$C4,"COLOR"); ?>",
                    "#AAAAAA"
                ],
            }]
        };
        var myChart = new Chart(document.getElementById('GC4'), {
            plugins:{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(mensaje4,2),
                        textX = Math.round((width - ctx.measureText(mensaje4).width) / 2),
                        textY = height / 2;

                    ctx.fillText(mensaje4, textX, textY);
                    ctx.save();
                }
            },
            type: 'doughnut',
            data: data,
            options: {
                tooltips:false,
                responsive: true,
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            }
        });     

    </script>