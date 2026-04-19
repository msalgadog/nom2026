<script>
        var valor3 = <?php echo $C3; ?>;
        var value3 = <?php echo C("C3",$C3,"RESULTADO"); ?>;
        var mensaje3 = "<?php echo C("C3",$C3,"MENSAJE"); ?>";
        var data = {
            labels: [
                "Resultado",
                ""
            ],
            datasets: [{
                data: [value3, 100 - value3],
                backgroundColor: [
                    "<?php echo C("C3",$C3,"COLOR"); ?>",
                    "#AAAAAA"
                ],
            }]
        };
        var myChart = new Chart(document.getElementById('GC3'), {
            plugins:{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(mensaje3,2),
                        textX = Math.round((width - ctx.measureText(mensaje3).width) / 2),
                        textY = height / 2;

                    ctx.fillText(mensaje3, textX, textY);
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