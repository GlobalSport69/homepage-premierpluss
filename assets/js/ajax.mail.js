// Ajax mail js
$(function() {
	$( '#sendMailForm' ).submit(function ( e ) {
    var data = {
        'name': $('#name').val(),
        'cirif': $('#cirif').val(),
        'phone': $('#phone').val(),
        'email' : $('#email').val(),
        'message' : $('#message').val()
    };
    // POST data to the php file
    $.ajax({ 
        url: '_mail.php', 
        data: data,
        type: 'POST',
        success: function (data) {
			// For Notification
            document.getElementById("sendMailForm").reset();
            var $alertDiv = $(".mailResponse");
            $alertDiv.show();
            $alertDiv.find('.alert').removeClass('alert-danger alert-success');
            $alertDiv.find('.mailResponseText').text("");
            if(data.error){
                $alertDiv.find('.alert').addClass('alert-danger');
                $alertDiv.find('.mailResponseText').text(data.message);
            }else{
                $alertDiv.find('.alert').addClass('alert-success');
                $alertDiv.find('.mailResponseText').text(data.message);
            }
        }
    });
    e.preventDefault();
});});