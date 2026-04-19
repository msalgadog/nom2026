$(document).ready(function () {
    $.validate({
        form: '#nom',
        modules: 'html5,security',
        lang: 'es',
        onError : function() {
            Swal.fire({
                icon:"error",
                title:"¡Espera!",
                text:"Hace falta responder preguntas, revisa por favor las respuestas marcadas como pendientes y contesta.",
                confirmButtonText: 'Continuar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,                
            })
          },        
    });    
    $("#atencion_clientes").change(function(){
        var resp_atencion_clientes = $(this).val();
        if (resp_atencion_clientes =="Si") {
            $(".tr_atencion_clientes").show();
            $("input[name=item_65]:radio,input[name=item_66]:radio,input[name=item_67]:radio,input[name=item_68]:radio,input[name=item_69]:radio").attr("disabled", false); 
        }else{
            $(".tr_atencion_clientes").hide();
            $("input[name=item_70]:radio,input[name=item_71]:radio,input[name=item_72]:radio,input[name=item_73]:radio,input[name=item_74]:radio").attr("disabled", true); 
        }
    });

    $("#soy_jefe").change(function(){
        var resp_soy_jefe = $(this).val();
        if (resp_soy_jefe =="Si") {
            $(".tr_soy_jefe").show();
            $("input[name=item_70]:radio,input[name=item_71]:radio,input[name=item_72]:radio").attr("disabled", false); 
        }else{
            $(".tr_soy_jefe").hide();
            $("input[name=item_70]:radio,input[name=item_71]:radio,input[name=item_72]:radio").attr("disabled", true); 
        }
    });    
});