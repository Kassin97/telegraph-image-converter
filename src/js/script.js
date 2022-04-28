$(document).ready(function (){

    $(document).on('submit', '#main-form', function (){
        let formData = $(this).serialize();
        $.ajax({
            url: '/src/ajax.php',
            data: formData,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function () {

            },
        });
        return false;
    });
});