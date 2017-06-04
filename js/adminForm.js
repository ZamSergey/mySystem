$(document).ready(function(){

    $('.userEdit').on('click', function(){
        event.preventDefault();

        var userId = '';
        userId = $(this).data('item');


        var name = $($('.userEdit[data-item=' + userId + ']').closest('tr').children()[1]).text();
        var status = $($('.userEdit[data-item=' + userId + ']').closest('tr').children()[2]).text();


        $('#userName').val('');
        $('#userStatus').val('');


        $('#userName').val(name);
        $('#userStatus').val(status);


        if (!$('#userEdit').length) {
           $('#newsEdit').remove();
            $('.formForUser').append('<input type="submit" id="newsEdit" value="редактировать">');
        }
        $('.formForUser').toggle();

        $('#newsEdit').on('click', function(){
            event.preventDefault();

            var userName = $('#userName').val();
            var userStatus = $('#userStatus').val();


            if (userName.length || userStatus.length) {

                $.post(MAIN + 'admin/edit/' + userId + '/', {userName: userName, userStatus: userStatus}, function(data){
                    // console.log(data['error'] + ' ' + data['text'] + ' ' + data['type']);
                    location.reload();
                }, 'json');
            } else {
                alert('поля пустые');
            }

        });
    });
});

