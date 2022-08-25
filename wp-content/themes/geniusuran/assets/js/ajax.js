jQuery(document).ready(function ($){

    $('#button_car').on('click', function (e){
        e.prevendDefault;


        $.ajax({
            url: geniusuran_ajax_script.ajaxurl,
            data:{
                'action':'geniusuran_ajax_example',
                'nonce':geniusuran_ajax_script.nonce,
                'string_one': geniusuran_ajax_script.string_box,
                'string_two': geniusuran_ajax_script.string_new,
            },
            success: function(data){
                $('#car_content').html(data)
            },
            error: function(errorThrown){
                alert(errorThrown);
            }
        })
    });

})