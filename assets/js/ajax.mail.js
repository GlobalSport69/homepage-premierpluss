$(function() {
	$( '#sendMailForm' ).submit(function (e) {
        e.preventDefault();
        var formData = 
        {
            'name'    : $('#name').val(),
            'cirif'   : $('#cirif').val(),
            'phone'   : $('#phone').val(),
            'email'   : $('#email').val(),
            'message' : $('#message').val()
        }
        $.ajax({
            type        : 'POST',
            url         : '_mail.php',
            data        : formData,
            dataType    : 'json',
            encode      : true
        })
    })
})