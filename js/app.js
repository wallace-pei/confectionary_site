$("#contactForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});

function submitForm(){
    // Initiate Variables With Form Content
	var form = document.contactForm;

	var dataString = $(form).serialize();


    $.ajax({
        type: "POST",
        url: "/php/mailer.php",
        data: dataString,
        success : function(text){
            if (text == "success"){
                formSuccess();
            }
			else {
				formFail();
			}
        }
    });
}
function formSuccess(){
	$( "#msgSubmit" ).text("Thank you for your request. We will contact you shortly.");
    $( "#msgSubmit" ).removeClass( "hide" );
}

function formFail(){
	$( "#msgSubmit" ).text("Error with form");
	$( "#msgSubmit" ).removeClass( "w3-pale-green" );
	$( "#msgSubmit" ).addClass( "w3-red" );
    $( "#msgSubmit" ).removeClass( "hide" );
}
