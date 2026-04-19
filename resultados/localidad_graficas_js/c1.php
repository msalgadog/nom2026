<script>
        var valor = <?php echo $C1; ?>;
        var value = <?php echo C("C1",$C1,"RESULTADO"); ?>;
        var mensaje = "<?php echo C("C1",$C1,"MENSAJE"); ?>";
        var data = {
            labels: [
                "Resultado",
                ""
            ],
            datasets: [{
                data: [value, 100 - value],
                backgroundColor: [
                    "<?php echo C("C1",$C1,"COLOR"); ?>",
                    "#AAAAAA"
                ],
            }]
        };
        var myChart = new Chart(document.getElementById('GC1'), {
            plugins:{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "left";

                    var text = Math.round(mensaje,2),
                        textX = Math.round((width - ctx.measureText(mensaje).width) / 2),
                        textY = height / 2;

                    ctx.fillText(mensaje, textX, textY);
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