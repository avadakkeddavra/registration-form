$(document).ready(function(){
    $('#form-container').on('focus','#birth_date',function(){
        $(this).datepicker({
            dateFormat: "yy-mm-dd"
        });
    })
});

$(document).ready(function(){
    $('#form-container').on('click','#next',function(e){
        e.preventDefault();
        var url = location.href+'main/secondForm';
        var formData = $('form').serialize();

        if( $('.error').length == 0 && $('.not_error').length == 5)
        {


             $.ajax({
                 url : 'main/secondForm/ajax',
                 type: 'POST',
                 data : formData,
                 success: function(response) {

                        $('#form-container').html(response);
                 }
             });
            if(url != window.location){
                window.history.pushState(null, null, url);
            }
            return false;
        }
        else{

            $(this).prev('.error-box').html('Please check all the fields <br /> * ')
                .css('color','#d59563')
                .animate({'paddingLeft':'10px'},400)
                .animate({'paddingLeft':'5px'},400);
        }

    })
})


$(window).bind('popstate', function() {
    var url = location.pathname;
    if(url == '/')
    {
        url+= 'main/index/ajax';
    }
    else{
        url = url+'/ajax';
    }
    $.ajax({
        url: url,
        success: function(data) {
            $('#form-container').html(data);
        }
    });
});






$(document).ready(function(){


    $('#form-container').on('click','.upload', function(e){
        e.stopPropagation();
        e.preventDefault();


        data = new FormData($('form').get(0));
        data.getAll('photo');


            $.ajax({
                url : '/main/uploadPhoto',
                type: 'POST',
                data : data,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function( data ){

                    $('.user-img').attr('src','/img/'+data['files']);
                    $('.user-img').fadeIn();
                },
                error: function( jqXHR, textStatus, errorThrown ){
                   alert('ОШИБКИ AJAX запроса: ' + textStatus + errorThrown);
                }
            })

    })
})



$(document).ready(function(){
    $('#form-container').on('click','#nextSocial', function(e){

        e.preventDefault();

        var url = '/main/secondData';
            var formData = $('form').serialize();
            var photo = $('#photo').val().split('\\');
            photo = photo[photo.length-1];
            var user_img = '&photo='+photo;
            formData += user_img;

            $.ajax({
                url : '/main/secondData/ajax',
                type: 'POST',
                data : formData,
                success: function(data) {

                    $('#form-container').html(data);

                }
            });

            if(url != window.location){
                window.history.pushState(null, null, url);
            }

        return false;
    });
});
