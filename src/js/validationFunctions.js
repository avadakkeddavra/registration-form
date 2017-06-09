function textValidation(obj,value)
{
    var rv_name = /[A-z]+['?]?[A-z]+/;

    if(value.length > 2 && value != '' && rv_name.test(value))
    {
        obj.removeClass('error');
        obj.addClass('not_error');
        obj.next('.error-box').text('accepted')
            .css('color','green')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
    else{
        obj.removeClass('not_error').addClass('error');
        obj.next('.error-box').html('Invalid input <br /> * min quantity of letters - 2 <br /> * without spaces symobls')
            .css('color','#d59563')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
}
function emailValidation(obj,value)
{
        $.ajax({
            url: '/main/checkEmail',
            data:'email='+value,
            type:'post',
            success : function(data){
                obj.attr('data-status',data);
                if(obj.attr('data-status') == 0)
                {

                    obj.removeClass('not_error').addClass('error');
                    obj.next('.error-box').html('This email has already used <br />')
                        .css('color','#d59563')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                else{
                    var rv_name = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                    if(value != '' && rv_name.test(value))
                    {
                        obj.removeClass('error');
                        obj.addClass('not_error');
                        obj.next('.error-box').html('accepted')
                            .css('color','green')
                            .animate({'paddingLeft':'10px'},400)
                            .animate({'paddingLeft':'5px'},400);
                    }
                    else{
                        obj.removeClass('not_error').addClass('error');
                        obj.next('.error-box').html('Invalid input email <br /> * not right format')
                            .css('color','#d59563')
                            .animate({'paddingLeft':'10px'},400)
                            .animate({'paddingLeft':'5px'},400);
                    }
                }
            }
        });




}
function phoneValidation(obj,value)
{
    var rv_name = /[+1][\s](\(\d{3}\)[\s ])(\d{3}[\-]\d{4})/;

    if(value != '' && rv_name.test(value))
    {
        obj.removeClass('error');
        obj.addClass('not_error');
        obj.next('.error-box').text('accepted')
            .css('color','green')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
    else{
        obj.removeClass('not_error').addClass('error');
        obj.next('.error-box').html('Invalid input <br /> * not right format')
            .css('color','#d59563')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
}
function textareaValidation(obj,value)
{
    if(value !='' && value.length <= 1000) {
        obj.removeClass('error');
        obj.addClass('not_error');
        obj.next('.error-box').text('accepted')
            .css('color', 'green')
            .animate({'paddingLeft': '10px'}, 400)
            .animate({'paddingLeft': '5px'}, 400);
    }
    else{
        obj.removeClass('not_error').addClass('error');
        obj.next('.error-box').html('Invalid input text <br /> * too many or too low letters <br /> * min - 2, max - 1000')
            .css('color','#d59563')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
}
function fileValidation(obj,value)
{
    if(value != '')
    {
        obj.addClass('not_error');
        obj.next('.error-box').text('accepted')
            .css('color', 'green')
            .animate({'paddingLeft': '10px'}, 400)
            .animate({'paddingLeft': '5px'}, 400);
    }
    else{
        obj.removeClass('not_error').addClass('error');
        obj.next('.error-box').html('File input error <br /> * set your photo please')
            .css('color','#d59563')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
}
function dataValidetion()
{
    
}