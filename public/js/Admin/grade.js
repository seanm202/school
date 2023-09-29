

$(document).ready(function(){

      $('#createGradeByAdmin').ajaxForm(function() {
        event.preventDefault();
alert('l');
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
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



$(document).ready(function(){

      $('#updateGradeByAdmin').ajaxForm(function() {
        event.preventDefault();
alert('l');
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
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



$(document).ready(function(){

      $('#deleteGradeByAdmin').ajaxForm(function() {
        event.preventDefault();
alert('l');
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
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
