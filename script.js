$(function() {




    //Main Variables
    let form = $('form');
    let formMessages = $('#messageForm');

    function updateChat() {

        $("#chat_refresh").load("index.php #chat_refresh");



       }




    $(form).submit(function(event) {


        event.preventDefault();

        // Serialize the form data. Thx that can be send as ajax request
        let formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        }).done(function(data) { //IF DONE



            //Set Data to Message
            if(data == 'Captcha empty') {
                console.log('bad captcha');
                $(formMessages).removeClass('alert-success');
                $(formMessages).addClass('alert-danger');
                $(formMessages).html(data);
                grecaptcha.reset();

            } else {
                $(formMessages).removeClass('alert-danger');
                $(formMessages).addClass('alert-success');
                console.log('captcha ok');
                $(formMessages).html(data);
                $('#name').val('');
                $('#message').val('');
                updateChat();
                grecaptcha.reset();


            }






        }).fail(function(data) {
            console.log('fail');



            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-error');

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured! Please try again');
            }
        });
    });


});