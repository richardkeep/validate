;(function($, undefined) {
    function handleValidation() {
        var $input = $(this);
        var field = $input.attr('id');
        var data = $input.val();
        var payload = { field: field.replace('_', '-'), data: data };
        var $message = $('small.' + field);
        var $btn = $input.closest('button[type=submit], input[type=submit]'); // Submit button

        $.ajax({
            url: '/validate',
            data: payload,
            type: 'POST',
            cache: false,
            beforeSend: function() {
                $message
                    .css('color', 'green')
                    .html('Checking...');
            },
            success:function(bool) {
                var error = $.parseJSON(bool);

                if (error === '') {
                    $message.html('');
                    $btn.attr('disabled', false);
                } else {
                    $btn.attr('disabled', true);
                    $message
                        .css('color', 'red')
                        .html(error);
                }
            }
       });
    };
    
    $(function() {
        var $inputs = $('input[type=text]');
        
        $inputs.each(function($input) {
            var field = $input.attr('id');
            var template = "<small class='" + field + "'></small>";
            $input
                .parent()
                    .append(template);
        });
                
        $input.on('keyup', handleValidation);
    });
})(jQuery);
