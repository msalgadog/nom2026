<script>
        var valor5 = <?php echo $C5; ?>;
        var value5 = <?php echo C("C5",$C5,"RESULTADO"); ?>;
        var mensaje5 = "<?php echo C("C5",$C5,"MENSAJE"); ?>";
        var data = {
            labels: [
                "Resultado",
                ""
            ],
            datasets: [{
                data: [value5, 100 - value5],
                backgroundColor: [
                    "<?php echo C("C5",$C5,"COLOR"); ?>",
                    "#AAAAAA"
                ],
            }]
        };
        var myChart = new Chart(document.getElementById('GC5'), {
            plugins:{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(mensaje5,2),
                        textX = Math.round((width - ctx.measureText(mensaje5).width) / 2),
                        textY = height / 2;

                    ctx.fillText(mensaje5, textX, textY);
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