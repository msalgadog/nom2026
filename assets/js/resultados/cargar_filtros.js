$(document).ready(function () {
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };    
    $('.filtro').each(function (index) {
        var i = index;
        var id_elemento = this.id;
        var tipo_campo = $("#"+id_elemento).data("tipo");
        var campo_hijo = $("#"+id_elemento).data("hijo");
        var inicial = $("#"+id_elemento).data("inicial");
        var p = getUrlParameter(id_elemento); 
        if(p!=false&&p!=""){
            if (i>0) {
                inicial=0;
            }
            p=p;
            $.ajax({
                type: "POST",
                url: "funciones/cargar_filtros.php",
                data:{
                    campo:id_elemento, 
                    tipo:tipo_campo,
                    campo_hijo:campo_hijo,
                    inicial:inicial, 
                    p:p 
                },
                dataType: "html",
                success: function (response) {
                    $("#" + id_elemento).find('optgroup').last().append(response);
                }
            });
        }else{
            p="";
            $.ajax({
                type: "POST",
                url: "funciones/cargar_filtros.php",
                data:{
                    campo:id_elemento, 
                    tipo:tipo_campo,
                    campo_hijo:campo_hijo,
                    inicial:inicial, 
                },
                dataType: "html",
                success: function (response) {
                    $("#" + id_elemento).find('optgroup').last().append(response);
                }
            });            
        }       

    });
    $(".filtro").change(function (e) { 
        e.preventDefault();
        var id_elemento = this.id;
        var tipo_campo = $("#"+id_elemento).data("tipo");
        var campo_hijo = $("#"+id_elemento).data("hijo");
        var inicial = $("#"+id_elemento).data("inicial");
        inicial = 0;
        var valor_campo = $("#"+id_elemento).val();
        $.ajax({
            type: "POST",
            url: "funciones/cargar_filtros.php",
            data:{
                campo:id_elemento, 
                tipo:tipo_campo,
                campo_hijo:campo_hijo,
                inicial:inicial,  
                valor_campo:valor_campo
            },
            dataType: "html",
            success: function (response) {
                if (campo_hijo=="") {
                    console.log("Detente")
                }else{
                    $("#" + campo_hijo).children().remove("optgroup");
                    $("#" + campo_hijo).append('<optgroup><option value="" disabled="disabled" selected="selected">Seleccione una opción</option><option value="">TODOS</option></optgroup>')
                    $("#" + campo_hijo).find('optgroup').last().append(response);
                }

            }
        });
        
    });
});