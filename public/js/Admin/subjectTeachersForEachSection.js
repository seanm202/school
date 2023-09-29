

$(document).ready(function(){

    $('#createTeacherForSubject').ajaxForm(function() {
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

        $('#editTeacherForSubject').ajaxForm(function() {
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
    $('#deleteEntryTeacher').ajaxForm(function() {
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
