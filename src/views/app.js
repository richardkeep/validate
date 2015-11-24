
    function doValidate(field){

        var url = '/validate';

        var data = $("#"+field).val();

        var field = field.replace('_','-');

        var data = {"field":field, "data": data };

        var field = field.replace('-','_');

        $.ajax({
            url:url,
            data:data,
            type:'POST',
            cache: false,
            beforeSend: function(){
                $('small.'+field).css('color','green').html('Checking...');
            },
            success:function(bool){ 
                
                $('small.'+field).html('');
               
                var error = $.parseJSON(bool);

                $('small.'+field).css('color','red').html(error);

                if(error == ''){
                    $('#submitB').attr('disabled', false);
                } else {
                    $('#submitB').attr('disabled', true);
                }
            },
       });
          
    };

    $('#submitB').attr('disabled', true);

    
    $('input').attr('onkeyup', function(){
        var field = $(this).attr('id');
        $(this).parent().append("<small class='"+field+"'></small>");
        return "doValidate('"+field+"')";
    });
