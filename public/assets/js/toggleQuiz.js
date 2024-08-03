$(document).ready(function() {
    const modal = $('#modal');
    const modalError = $('#modal-error');
    const body = $('body');
    const count = $('#count').text();

    // Modal biasa
    $('main').on('click', '#triggerModal', function() {
        modal.addClass('active');
        body.addClass('active');
    });

    $('main').on('click', '#modal-cover, #close', function() {
        modal.removeClass('active');
        body.removeClass('active');
    });

    // Modal error
    $('main').on('click', '#submitButton', function() {
        const statusInputs = $('input[name^="status"]');
        const nameInput = $('input[name="nameUser"]');
        let checkedCount = 0;
    
        statusInputs.each(function() {
            if ($(this).is(':checked')) {
                checkedCount++;
            }
        });
    
        if (checkedCount < count || nameInput.val() === '') {
            modalError.addClass('active');
            body.addClass('active');
    
            if (checkedCount < count) {
                $('#error').text("Maaf, terdapat beberapa pertanyaan kuis yang belum terjawab. Harap diisi terlebih dahulu. Terima kasih!");
            } else if (nameInput.val() === '') {
                $('#error').text("Maaf, kolom Nama belum diisi. Silakan lengkapi sebelum melanjutkan. Terima kasih!");
            }
    
            modal.removeClass('active');
        } else {
            $('#formKuis').submit();
        }
    });
    

    $('main').on('click', '#closeError', function() {
        modalError.removeClass('active');
        body.removeClass('active');
    });
});