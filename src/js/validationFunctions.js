function textValidation(obj,value)
{
    var rv_name = /^([A-z]+[']?)[A-z]+$/;
    var id = obj.attr('id');

    if( id == 'first_name' || id == 'last_name')
    {
        var rv_name = /^[A-z]+[']?[A-z]+$/;
        var message = 'Example: Alexey, Mc\'donald';
    }
    if(id == 'report_subject')
    {
        var rv_name = /^(([A-z]*['?]?)[\s]?[A-z]*)*$/;
        var message = 'Example: theory of physical proccesses it\'s';
    }
    if(id == 'company')
    {
        var rv_name = /^(([A-z]*['?]?)[\s]?[A-z]*)*$/;
        var message = 'Example: Noosphere, Collaboratory Corp;';
    }
    if(id == 'about')
    {
        var message = 'Your message must not exceed 1000 characters';
    }
    if(id == 'position')
    {
        var rv_name = /^.?[A-z\s]+\(?[A-z]+\)?$/;
        var message = '';
    }
    if(value.length > 2 && value.length < 256 && value != '' && rv_name.test(value))
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
        obj.next('.error-box').html('Incorrect ' + obj.attr('placeholder') + ' input. <br>'+message)
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

}
function textareaValidation(obj,value)
{
    var message = 'Your message must not exceed 1000 characters';
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
        obj.next('.error-box').html(message)
            .css('color','#d59563')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }
}

