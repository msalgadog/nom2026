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
vcomp_get = getUrlParameter("comp"); 
vgrupo_get = getUrlParameter("grupo"); 
vdistrito_get = getUrlParameter("distrito"); 
vlocalidad_get = getUrlParameter("localidad"); 
vdepartamento_get = getUrlParameter("dpto"); 
console.log("Comp"+vcomp_get);
console.log("grupo"+vgrupo_get);
console.log("distrito"+vdistrito_get);
console.log("localidad"+vlocalidad_get);
console.log("dpto"+vdepartamento_get);
if (vcomp_get === false) {
    $("#grupo").html('<option value="" disabled="disabled" selected="selected" >No existen datos para filtrar</option>');
}else{
    $.ajax({
        type: "POST",
        url: "funciones/cargar_grupos.php",
        data: {
            comp: vcomp,
            grupo: vgrupo,
        },
        success: function(response) {
            $("#grupo").html(response).fadeIn();
        }
    });
}
if (vcomp_get === false&&vgrupo_get===false) {
    $("#distrito").html('<option value="" disabled="disabled" selected="selected" >No existen datos para filtrar</option>');
}else{
    $.ajax({
        type: "POST",
        url: "funciones/cargar_distritos.php",
        data: {
            comp: vcomp,
            grupo: vgrupo,
            distrito: vdistrito,
        },
        success: function(response) {
            $("#distrito").html(response).fadeIn();
        }
    });
}
if (vcomp_get === false&&vgrupo_get===false&&vdistrito_get===false) {
    $("#localidad").html('<option value="" disabled="disabled" selected="selected" >No existen datos para filtrar</option>');
}else{
    $.ajax({
        type: "POST",
        url: "funciones/cargar_localidad.php",
        data: {
            comp: vcomp,
            grupo: vgrupo,
            distrito: vdistrito,
            localidad: vlocalidad,
        },
        success: function(response) {
            $("#localidad").html(response).fadeIn();
        }
    });
}
if (vcomp_get === false&&vgrupo_get===false&&vdistrito_get===false&&vlocalidad_get===false) {
    $("#dpto").html('<option value="" disabled="disabled" selected="selected" >No existen datos para filtrar</option>');
}else{
    $.ajax({
        type: "POST",
        url: "funciones/cargar_departamento.php",
        data: {
            comp: vcomp,
            grupo: vgrupo,
            distrito: vdistrito,
            localidad: vlocalidad,
            departamento:vdepartamento
        },
        success: function(response) {
            $("#dpto").html(response).fadeIn();
        }
    });
}






$("#comp").change(function (e) { 
    e.preventDefault();
    $("#grupo,#distrito,#localidad,#dpto").html('<option value="" disabled="disabled" selected="selected" >Seleccione</option>');
    var comp_select = $("#comp").val();
    $.ajax({
        type: "POST",
        url: "funciones/cargar_grupos.php",
        data: {
            comp: comp_select
        },
        success: function(response) {
            $("#grupo").html(response).fadeIn();
        }
    });    
});
$("#grupo").change(function (e) { 
    $("#distrito,#localidad,#dpto").html('<option value="" disabled="disabled" selected="selected" >Seleccione</option>');
    e.preventDefault();
    var comp_select = $("#comp").val();
    var grupo_select = $("#grupo").val();
    $.ajax({
        type: "POST",
        url: "funciones/cargar_distritos.php",
        data: {
            comp: comp_select,
            grupo: grupo_select
        },
        success: function(response) {
            $("#distrito").html(response).fadeIn();
        }
    });    
});
$("#distrito").change(function (e) { 
    $("#localidad,#dpto").html('<option value="" disabled="disabled" selected="selected" >Seleccione</option>');
    e.preventDefault();
    var comp_select = $("#comp").val();
    var grupo_select = $("#grupo").val();
    var distrito_select = $("#distrito").val();
    $.ajax({
        type: "POST",
        url: "funciones/cargar_localidad.php",
        data: {
            comp: comp_select,
            grupo: grupo_select,
            distrito: distrito_select
        },
        success: function(response) {
            $("#localidad").html(response).fadeIn();
        }
    });    
});
$("#localidad").change(function (e) { 
    e.preventDefault();
    var comp_select = $("#comp").val();
    var grupo_select = $("#grupo").val();
    var distrito_select = $("#distrito").val();
    var localidad_select = $("#localidad").val();
    $.ajax({
        type: "POST",
        url: "funciones/cargar_departamento.php",
        data: {
            comp: comp_select,
            grupo: grupo_select,
            distrito: distrito_select,
            localidad: localidad_select,
        },
        success: function(response) {
            $("#dpto").html(response).fadeIn();
        }
    });    
});