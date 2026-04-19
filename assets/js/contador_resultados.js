if (p4 == true) {
    setTimeout(
        function () {
            $("#distrito").val(valor_distrito).change()
        }, 1000);

}

$(function () {

    $("#distrito").change(function (e) {
        var distrito = $(this).val();
        $.ajax({
            url: 'php/funciones/resultados/contador_resultados.php',
            type: 'POST',
            dataType: 'JSON',
            data: { distrito: distrito },
            cache: false,
            async: false,
        })
            .done(function (datos) {
                pendientes = datos.conteo.conteo - datos.encuestas.encuestaconteo;
                concluidos = datos.encuestas.encuestaconteo;
                console.log("success");
                $("#us_reg").detach("");
                $("#us_conc").detach("");
                $("#us_pend").detach("");
                $("#us_reg_div").html('<span id="us_reg" class="count"></span>');
                $("#us_conc_div").html('<span id="us_conc" class="count"></span>');
                $("#us_pend_div").html('<span id="us_pend" class="count"></span>');
                $("#us_reg").append(datos.conteo.conteo);
                $("#us_conc").append(datos.encuestas.encuestaconteo);
                $("#us_pend").append(pendientes);
                $("#concluidos_pendientes").append("<canvas id='stats_p1'></canvas>")
                console.log(datos.conteo.conteo)
                console.log(pendientes)
                console.log(datos.encuestas.encuestaconteo)
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now).toLocaleString());
                        }
                    });
                });
                function addData(chart, label, data) {
                    chart.data.labels.push(label);
                    chart.data.datasets.forEach((dataset) => {
                        dataset.data.push(data);
                    });
                    chart.update();
                }

                function removeData(chart) {
                    chart.data.labels.pop();
                    chart.data.datasets.forEach((dataset) => {
                        dataset.data.pop();
                    });
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: data,
                        options: {
                            showAllTooltips: true,
                            legend: {
                                display: true,
                                labels: {
                                    fontColor: '#000000'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Avance'
                            }
                        }
                    });
                    chart.update();
                }
                var ctx = document.getElementById("stats_p1");
                var data = {
                    labels: ["Encuestas Concluidas", "Usuarios Pendientes"],
                    datasets: [{
                        data: [concluidos, pendientes],
                        backgroundColor: ["#FFC107", "#28A745"],
                        hoverBackgroundColor: ["#D8A200", "#0B8026"]
                    }]
                };
                Chart.pluginService.register({
                    beforeRender: function (chart) {
                        if (chart.config.options.showAllTooltips) {
                            chart.pluginTooltips = [];
                            chart.config.data.datasets.forEach(function (dataset, i) {
                                chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                                    chart.pluginTooltips.push(new Chart.Tooltip({
                                        _chart: chart.chart,
                                        _chartInstance: chart,
                                        _data: chart.data,
                                        _options: chart.options.tooltips,
                                        _active: [sector]
                                    }, chart));
                                });
                            });
                            chart.options.tooltips.enabled = false;
                        }
                    },
                    afterDraw: function (chart, easing) {
                        if (chart.config.options.showAllTooltips) {
                            if (!chart.allTooltipsOnce) {
                                if (easing !== 1) return;
                                chart.allTooltipsOnce = true;
                            }
                            chart.options.tooltips.enabled = true;
                            Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                                tooltip.initialize();
                                tooltip.update();
                                tooltip.pivot();
                                tooltip.transition(easing).draw();
                            });
                            chart.options.tooltips.enabled = false;
                        }
                    }
                });
                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: {
                        showAllTooltips: true,
                        legend: {
                            display: true,
                            labels: {
                                fontColor: '#000000'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Avance'
                        }
                    }
                })
                /**/
                $.ajax({
                    url: 'php/funciones/resultados/listado_avance.php',
                    type: 'POST',
                    dataType: 'html',
                    data: { distrito: distrito },
                    cache: false,
                    async: false,
                })
                    .done(function (datos) {
                        $("#resultado").html(datos);
                        console.log("success");
                    })
                    .fail(function (error) {
                        console.log(error)
                        console.log("error");
                    })
                    .always(function () {
                        console.log("complete");
                    });

                /**/
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });

    });



});