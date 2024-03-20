$(document).ready(function(){
    $('#delete_form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response){
                $('#mensagem').html(response);
            }
        });
    });
});