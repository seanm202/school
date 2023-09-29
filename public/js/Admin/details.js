

$(document).ready(function(){


    $('#addDetails').ajaxForm(function() {
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

    $('#createOrUpdateAdminDetails').ajaxForm(function() {
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

    $('#createOrUpdateTeacherDetails').ajaxForm(function() {
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

  $('#createOrUpdateStudentDetails').ajaxForm(function() {
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
