$(document).ready(function() {
    comunicacion_color = "rgb(254,211,196)";
    capacitacion_color = "rgb(255,233,197)";
    seguimiento_color = "rgb(187,234,227)";
    resultados_color = "rgb(213,240,188)";
    ganadores_color = "rgb(220,220,220)";
    if(!resultados){
        $("#txt_resultados,#arc_resultados").attr("fill", "#4D4D4D")
        $("#resultados").removeAttr("data-bss-hover-animate")
        $("#resultados_lnk").attr("xlink:href","#")
    }
    if(!seguimiento){
        $("#seguimiento-2,#arc_seguimiento").attr("fill", "#4D4D4D")
        $("#seguimiento").removeAttr("data-bss-hover-animate")
    }
    $(".menu_item").mouseenter(function(event) {
        id_item = this.id;
        console.log(id_item)
        if((id_item=="seguimiento"&&seguimiento)||(id_item=="resultados"&&resultados)||id_item=="ganadores"||id_item=="capacitacion"||id_item=="comunicacion"){
            var color = eval(id_item + "_color");
            $('#' + id_item + "_bg").attr("fill", color)
            console.log("entra")
        }
        if(id_item=="resultados"&&!resultados){
            $('#resultados').popover('show');
        }
        if(id_item=="seguimiento"&&!seguimiento){
            $('#seguimiento').popover('show');
        }
    }).mouseleave(function(event) {
        $('#' + id_item + "_bg").attr("fill", "#E8E8E8")
        $('#resultados,#seguimiento').popover('hide');
    });
})