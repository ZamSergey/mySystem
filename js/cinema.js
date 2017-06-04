$('#cinema').on('click', function () {
    event.stopPropagation();
    event.preventDefault();
       $.ajax({
        url: 'http://localhost/myAPI/cinema/',
        type: 'POST',
        success: function(data){
            var res = JSON.parse( data );

        var ar = [];
            $.each( res, function(k, v){
                ar[k] = [];
                $.each( v, function(i, j){
                    ar[k][i] = j ;
                });
            });
            console.log(ar);
        },
    });
});

$('#hall').on('click', function () {
    event.stopPropagation();
    event.preventDefault();

    $.ajax({
        url: 'http://localhost/myAPI/hall/',
        type: 'GET',
        success: function(data){
            var res = JSON.parse( data );
            var ar = [];
            $.each( res, function(k, v){
                ar[k] = [];
                $.each( v, function(i, j){
                    ar[k][i] = j ;
                });
            });
            console.log(ar);
        },
    });
});

$('#seance').on('click', function () {
    event.stopPropagation();
    event.preventDefault();
    var date = $('#date').val();
    var data = {'day':date};

    $.ajax({
        url: 'http://localhost/myAPI/seance/',
        type: 'POST',
        data:data,
        success: function(data){
            var res = JSON.parse( data );
            var ar = [];
            $.each( res, function(k, v){
                ar[k] = [];
                $.each( v, function(i, j){
                    ar[k][i] = j ;
                });
            });
            console.log(ar);
        },
    });
});

$('#place').on('click', function () {
        event.stopPropagation();
    event.preventDefault();

    $.ajax({
        url: 'http://localhost/myAPI/place/',
        type: 'POST',

        success: function(data){
            var res = JSON.parse( data );
            var ar = [];
            $.each( res, function(k, v){
                ar[k] = [];
                $.each( v, function(i, j){
                    ar[k][i] = j ;
                });
            });
            console.log(ar);
        },
    });
});