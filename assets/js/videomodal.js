$(document).ready(function () {
    $('#video').modal({
        backdrop: 'static',
        keyboard: false,
    }, 'show');
 
    $('video').on('ended', function () {
        $("#cierravideo").show();
    });
    $('#video').on('hidden.bs.modal', function (e) {
        $.ajax({
            url: 'php/bloques/video.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id_usuario
            },
        }).done(function (datos) {
            console.log(datos)
            console.log("success");
            if (datos.codigo == 1) {
                Swal.fire({
                    title: "Información",
                    icon: "success",
                    text: "Se ha guardado la actividad Video de manera correcta, puedes continuar",
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                }).then((result) => {
                    location.href="encuesta.php";
                })
            }
            if (datos.codigo == 2) {
                Swal.fire({
                    title: "Información",
                    icon: "error",
                    text: "Error al intentar guardar el avance del vídeo",
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                })
            }
        }).fail(function (error) {
            console.log("error");
            console.log(error);
        }).always(function () {
            console.log("complete");
        });
    })
});