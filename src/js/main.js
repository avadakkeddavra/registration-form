
console.log(location.pathname);
$(document).ready(function(){
    $('form button#next').click(function(e){
        e.preventDefault();
        var url = location.href+'main/secondForm';
        console.log(url);
        var formData = $('form').serialize();

        if( $('.error').length == 0 && $('.not_error').length == 5 || $('.not_error').length == 3)
        {

            console.log(formData);
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
        }
        else{

            $(this).prev('.error-box').html('Please check all the fields <br /> * ')
                .css('color','#d59563')
                .animate({'paddingLeft':'10px'},400)
                .animate({'paddingLeft':'5px'},400);
        }
        return false;
    })
})


$(window).bind('popstate', function() {
    var url = location.pathname;
    if(url == '/')
    {
        url+= 'main/index/';
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
    // var files;
    // $('input[type="file"').change(function(){
    //     files = this.files;
    //     console.log(files);
    // });

    $('.upload').on('click', function(e){
        e.stopPropagation();
        e.preventDefault();


        data = new FormData($('form').get(0));
        data.getAll('photo');

        // var data = $('form').serialize();
            console.log(data);
            $.ajax({
                url : '/main/uploadPhoto',
                type: 'POST',
                data : data,
                cache: false,
                dataType: 'json',
                processData: false, // Не обрабатываем файлы (Don't process the files)
                contentType: false, // Так jQuery скажет серверу что это строковой запрос
                success: function( data ){
                    alert(data['files']);
                    $('.user-img').attr('src','/img/'+data['files']);
                    $('.user-img').fadeIn();
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log('ОШИБКИ AJAX запроса: ' + textStatus + errorThrown);
                }
            })

    })
})



$(document).ready(function(){
    $('form button#nextSocial').click(function(e){
        e.preventDefault();
        var url = '/main/secondData';

        if( $('.error').length == 0)
        {
            var formData = $('form').serialize();
            var user_img = '&photo='+$('#photo').val();
            formData += user_img;
            console.log(formData);
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
        }
    })
})
