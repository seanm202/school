//Add admin

$(document).ready(function(){

    $('#addAdminAdmin').ajaxForm(function() {
        event.preventDefault();
alert('admin');
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

//Update Batches
$(document).ready(function(){

  $('#updateBatches').ajaxForm(function() {
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


//Make current batch valid
$(document).ready(function(){

  $('#currentBatch').ajaxForm(function() {
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



//Create the batches
$(document).ready(function(){

  $('#createBatches').ajaxForm(function() {
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




//Update department
$(document).ready(function(){

  $('#updateDepartment').ajaxForm(function() {
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


//Delete the department
$(document).ready(function(){

  $('#deleteDepartment').ajaxForm(function() {
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

//Create department
$(document).ready(function(){

  $('#createDepartment').ajaxForm(function() {
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

//update semester
$(document).ready(function(){

  $('#updateSemester').ajaxForm(function() {
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

//Create semester
$(document).ready(function(){

  $('#createSemester').ajaxForm(function() {
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


//Update Day Details
$(document).ready(function(){

  $('#updateDayDetails').ajaxForm(function() {
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



//Update Day Details
$(document).ready(function(){

  $('#createDay').ajaxForm(function() {
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



//Update Day Details
$(document).ready(function(){

  $('#updateHourDetails').ajaxForm(function() {
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




//Update Day Details
$(document).ready(function(){

  $('#deleteHour').ajaxForm(function() {
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




//Update Day Details
$(document).ready(function(){

  $('#createHour').ajaxForm(function() {
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



//Update Day Details
$(document).ready(function(){

  $('#createDailyAttendance').ajaxForm(function() {
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


//Update Day Details
$(document).ready(function(){

  $('#updateStatusDetails').ajaxForm(function() {
        event.preventDefault();

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


//Update Day Details
$(document).ready(function(){

  $('#deleteStatusDetails').ajaxForm(function() {
        event.preventDefault();

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



//Update Day Details
$(document).ready(function(){

  $('#statusAddAdmin').ajaxForm(function() {
        event.preventDefault();

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
