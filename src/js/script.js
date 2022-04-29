$(document).ready(function (){

    $(document).on('submit', '#main-form', function (){
        let formData = $(this).serialize();
        $.ajax({
            url: '/src/ajax.php',
            data: formData,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (jsonResult) {
                jsonResult = JSON.parse(jsonResult);
                if (jsonResult.error) {
                    $('.error').text(jsonResult.error);
                } else {
                    $('.error').text("");
                    var a = document.createElement("a");
                    a.href = jsonResult.result.src;
                    document.body.appendChild(a);
                    a.download = jsonResult.result.name;
                    a.click();
                    a.remove();
                }
                $('.loading').hide();
            },
        });
        return false;
    });
});