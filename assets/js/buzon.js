$(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    $.validate({
        form: '#form_buzon',
        modules: 'html5,sanitize',
        lang: 'es',
        onSuccess: function($form) {
            bootbox.confirm("Confirme para envíar el mensaje", function(result) {
                if (result == true) {
                    $.ajax({
                        type: "POST",
                        url: "http://trantor.systiconsulting.net/humanpro/2022/send_buzon.php",
                        data: $("#form_buzon").serialize(),
                        cahe: false,
                        beforeSend: function() {
                            $("#form_btn_enviar").hide();
                            $('#div_response_modal').html('<div class="text-center"><img src="img/load.gif" alt=""><div>');
                            $('#div_form').hide();
                        },
                        success: function(response) {
                            $('#div_response_modal').html(response);
                        }
                    });
                }
            });
            return false;
        },
    });
});
$('#buzonquejas').on('hidden.bs.modal', function(e) {
    $("#form_btn_enviar").show();
    $('#div_form').show();
    $('#div_response_modal').html("");
    $("#telefono,#telefono").hide();
    $("#form_buzon")[0].reset();
    
});
$("#medio_contacto").change(function (e) { 
    e.preventDefault();
    var tipo = $(this).val();
    if (tipo=="correo") {
        $("#correo").show().prop("disabled",false);
        $("#telefono").hide().prop("disabled",true);
    }else{
        $("#correo").hide().prop("disabled",true);
        $("#telefono").show().prop("disabled",false);
    }
    
});