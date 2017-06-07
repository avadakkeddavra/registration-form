$(document).ready(function(){
    $('input#birth_date').datepicker({
        dateFormat: "yy-mm-dd"
    });
});


$(document).ready(function(){
    $('input , textarea').not('#birth_date').unbind().blur(function(e){
        var item = $(this).attr('id');
        var value = $(this).val();
        console.log(item);
        if(item == 'first_name' || item == 'last_name' || item == 'report_subject' || item == 'company' || item == 'position')
        {
            textValidation($(this),value);
        }

        if(item == 'phone')
        {
            phoneValidation($(this),value);
        }
        if(item == 'email')
        {
            emailValidation($(this),value);
        }
        if(item == 'about')
        {
            textareaValidation($(this),value);
        }
        if(item == 'file')
        {
            fileValidation($(this),value);
        }
    })
});
$(document).ready(function(){
    $('#form-container').on('focusout','#company, #about,#position, #photo',function(e){

        var item = $(this).attr('id');
        var value = $(this).val();

        if(item == 'company' || item == 'position')
        {
            textValidation($(this),value);
        }

        if(item == 'about')
        {
            textareaValidation($(this),value);
        }
        if(item == 'file')
        {
            fileValidation($(this),value);
        }
    })
})

/**
 * Created by User on 06.06.2017.
 */
