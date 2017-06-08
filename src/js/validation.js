$(document).ready(function(){
    $('#form-container').on('blur','input',function(e){
        var item = $(this).attr('id');
        var value = $(this).val();
        if(item == 'first_name' || item == 'last_name' || item == 'report_subject')
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
    })
});
$(document).ready(function(){
    $('#form-container').on('blur','#company, #about,#position, #photo',function(e){

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
