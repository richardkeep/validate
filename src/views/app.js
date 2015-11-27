;(function($, undefined) {
    function doValidate($input) {
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
        $('input[type=text]').on('keyup', function() {
            var $this = $(this);
            var field = $this.attr('id');

            $(this)
                .parent()
                    .append("<small class='" + field + "'></small>");

            doValidate($this);
        });
    });
})(jQuery);
