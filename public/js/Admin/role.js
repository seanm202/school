


$(document).ready(function(){



   $('#updateRoleByAdmin').ajaxForm(function() {
        event.preventDefault();
alert('Role');
      

        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
            },
            error: function(response) {
            }
        });
    });

});
