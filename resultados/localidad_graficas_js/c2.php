<script>
        var valor2 = <?php echo $C2; ?>;
        var value2 = <?php echo C("C2",$C2,"RESULTADO"); ?>;
        var mensaje2 = "<?php echo C("C2",$C2,"MENSAJE"); ?>";
        var data = {
            labels: [
                "Resultado",
                ""
            ],
            datasets: [{
                data: [value2, 100 - value2],
                backgroundColor: [
                    "<?php echo C("C2",$C2,"COLOR"); ?>",
                    "#AAAAAA"
                ],
            }]
        };
        var myChart = new Chart(document.getElementById('GC2'), {
            plugins:{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(mensaje2,2),
                        textX = Math.round((width - ctx.measureText(mensaje2).width) / 2),
                        textY = height / 2;

                    ctx.fillText(mensaje2, textX, textY);
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