function paint(dataString) {
    $("#resultMessage").html(dataString).fadeIn("slow");
                    
    setTimeout(function() {
        $("#resultMessage").fadeOut("slow")
    }, 5000);
                            
    //reset the form
    $('#contact_form')[0].reset();
                            
    // hide ajax loader icon
    $('.ajaxLoader').fadeOut("fast");
                            
    // Enable button after processing
    $('#submitBtn').attr('disabled', false);
                    
}

$(document).ready(function(){
    // disable submit button in case of disabled javascript browsers
    $(function(){
        $('#submitBtn').attr('disabled', false);
    });
            
	$("#contact_form").validate({
				rules:{
					inputName:{
                        required: true
					},
					inputEmail:{
                        required: true,
                        email: true
					},
                    inputMessage:{
                        required: true
                    }
				},
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');},
        success: function(element) {
            $(element).closest('.control-group').removeClass('error').addClass('success');
            $(element).closest('.control-group').find('label').remove();
        },
        errorClass: "help-inline"
	});
	
    $("#contact_form").submit(function(){
        if ($("#contact_form").valid()){
            
            // Disable button while processing
            $('#submitBtn').attr('disabled', true);

            // show ajax loader icon
            $('.ajaxLoader').fadeIn("fast");

            var dataString = $("#contact_form").serialize();
            $.ajax({
                type: "POST",
                url: "../../contact/process_contact/",
                data: dataString,
                success: function(dataString) {
                    paint(dataString);
                }
            })
            .fail(function() {
                paint("<div class='alert alert-error'>Server error. Try later...</div>");
            });
        }
        return false;
    });
});
