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
            success: function(bool) {
                var error = $.parseJSON(bool);

                if (error === '') {
                    $btn.attr('disabled', false);
                    $message.html('');
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
        var $inputs = $('input');

        $inputs.each(function(_, input) {
            var $input = $(input);
            var field = $input.attr('id');
            var template = "<small class='" + field + "'></small>";
            $input.parent().append(template);
        });
                
        $inputs.on('keyup', handleValidation);
    });
})(jQuery);