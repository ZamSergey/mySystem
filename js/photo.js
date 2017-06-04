var files;

// Вешаем функцию на событие
// Получим данные файлов и добавим их в переменную

$('input[type=file]').change(function(){
    files = this.files;
});



// Вешаем функцию ан событие click и отправляем AJAX запрос с данными файлов

$('.submit.button').click(function( event ){

    event.stopPropagation(); // Остановка происходящего
    event.preventDefault();  // Полная остановка происходящего

    // Создадим данные формы и добавим в них данные файлов из files

    var data = new FormData();
    $.each( files, function( key, value ){
        data.append( key, value );
    });

    // Отправляем запрос

    $.ajax({
        url: MAIN + 'photo/add/',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Не обрабатываем файлы (Don't process the files)
        contentType: false, // Так jQuery скажет серверу что это строковой запрос
        success: function( respond, textStatus, jqXHR ){

            // Если все ОК


            if( typeof respond.error === 'undefined' ){
                // Файлы успешно загружены, делаем что нибудь здесь

                // выведем пути к загруженным файлам в блок '.ajax-respond'

                var files_path = respond.files;
                var html = '<img id="photo" src="'+MAIN+'uploads/'+files[0].name+'">';
                $.each( files_path, function( key, val ){ html += val +'<br>'; } )
                $('.ajax-respond').html( html );
                $(document).ready(function () {
                    $('#photo').imgAreaSelect({
                        handles: true,
                        onSelectEnd: function (img, selection) {
                            $('input[name="x1"]').val(selection.x1);
                            $('input[name="y1"]').val(selection.y1);
                            $('input[name="x2"]').val(selection.x2);
                            $('input[name="y2"]').val(selection.y2);
                        }
                    });
                });

            }
            else{
                console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
            }
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log('ОШИБКИ AJAX запроса: ' + textStatus );

        }
    });
});



$('#crop').on('click', function () {
    event.stopPropagation();
    event.preventDefault();

    var x1 = $('input[name="x1"]').val();
    var y1 = $('input[name="y1"]').val();
    var x2 = $('input[name="x2"]').val();
    var y2 = $('input[name="y2"]').val();



    var formData = {"x1":x1, "y1":y1, "x2":x2, "y2":y2};
   // formData = $.toJSON(formData);
  //  formData = JSON.stringify(formData);
   // console.log(formData);

    $.ajax({
        url: MAIN + 'photo/crop/',
        type: 'POST',
        data: formData,
     //   cache: false,
     //   dataType: 'json',
   //     processData: false, // Не обрабатываем файлы (Don't process the files)
    //    contentType: false, // Так jQuery скажет серверу что это строковой запрос
        success: function( respond, textStatus, jqXHR ){
            
            // Если все ОК
            $("#photo").attr("src",MAIN+"uploads/new.jpg");

/*            if( typeof respond.error === 'undefined' ){
                // Файлы успешно загружены, делаем что нибудь здесь
                var files_path = respond.files;
                var html = '<img id="photo" src="'+MAIN+'uploads/new.jpg">';
                $.each( files_path, function( key, val ){ html += val +'<br>'; } )
                $('.ajax-respond').html( html );


            }
            else{
                console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
            }*/
        },
        // error: function( jqXHR, textStatus, errorThrown ){
        //     console.log('ОШИБКИ AJAX запроса: ' + textStatus );

        // }
    });


});



