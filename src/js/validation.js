$(document).ready(function(){
    $('input#birth_date').datepicker({
        dateFormat: "yy-mm-dd"
    });
})

$(document).ready(function(){
    $('input, textarea').not('#birth_date').unbind().blur(function(e){
        var item = $(this).attr('id');
        var value = $(this).val();

        if(item == 'first_name' || item == 'last_name' || item == 'report_subject' || item == 'company' || item == 'position')
        {
            var rv_name = /^[a-zA-Zа-яА-Я]+$/;

            if(value.length > 2 && value != '' && rv_name.test(value))
            {
                $(this).removeClass('error');
                $(this).addClass('not_error');
                $(this).next('.error-box').text('Принято')
                    .css('color','green')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
            else{
                $(this).removeClass('not_error').addClass('error');
                $(this).next('.error-box').html('Invalid input <br /> * min quantity of letters - 2 <br /> * without spaces symobls')
                    .css('color','#d59563')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
        }

        if(item == 'phone')
        {
            var rv_name = /[+1][\s](\(\d{3}\)[\s ])(\d{3}[\-]\d{4})/;

            if(value != '' && rv_name.test(value))
            {
                $(this).removeClass('error');
                $(this).addClass('not_error');
                $(this).next('.error-box').text('Принято')
                    .css('color','green')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
            else{
                $(this).removeClass('not_error').addClass('error');
                $(this).next('.error-box').html('Invalid input <br /> * not right format')
                    .css('color','#d59563')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
        }
        if(item == 'email')
        {
            var rv_name = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
            if(value != '' && rv_name.test(value))
            {
                $(this).removeClass('error');
                $(this).addClass('not_error');
                $(this).next('.error-box').text('Принято')
                    .css('color','green')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
            else{
                $(this).removeClass('not_error').addClass('error');
                $(this).next('.error-box').html('Invalid input email <br /> * not right format')
                    .css('color','#d59563')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
        }
        if(item == 'about')
        {
            if(value !='' && value.length < 1000) {
                $(this).addClass('not_error');
                $(this).next('.error-box').text('Принято')
                    .css('color', 'green')
                    .animate({'paddingLeft': '10px'}, 400)
                    .animate({'paddingLeft': '5px'}, 400);
            }
            else{
                $(this).removeClass('not_error').addClass('error');
                $(this).next('.error-box').html('Invalid input text <br /> * too many or too low letters')
                    .css('color','#d59563')
                    .animate({'paddingLeft':'10px'},400)
                    .animate({'paddingLeft':'5px'},400);
            }
        }
    })
})
/**
 * Created by User on 06.06.2017.
 */
