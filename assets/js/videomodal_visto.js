$("#cierravideo").show();
$('#video').on('hidden.bs.modal', function (e) {
    $('video').trigger('pause');
});