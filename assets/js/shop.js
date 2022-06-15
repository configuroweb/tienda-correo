function validateUser() {
	var valid = true;

	$("#first-name").removeClass("error-field");
	$("#email").removeClass("error-field");

	var firstName = $("#first-name").val();
	var email = $("#email").val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#first-name-info").html("").hide();
	$("#email-info").html("").hide();
	if (firstName.trim() == "") {
		$("#first-name-info").html("required.").css("color", "#ee0000").show();
		$("#first-name").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}

function Checkout() {

	var valid;
	valid = validateUser();
	if (valid) {
		jQuery.ajax({
			url : "ajax-endpoint/create-order-endpoint.php",
			data : 'userName=' + $("#first-name").val() + '&userEmail='
					+ $("#email").val() + '&productQuantity='
					+ $("#productQuantity").val(),
			type : "POST",
			beforeSend : function() {
				$("#loader").show();
				$("#checkout-btn").hide();
			},
			success : function(data) {
				$("#mail-status").html(data);
				$('#checkout-form').find('input:text').val('');
				$("#loader").hide();
				$("#customer-detail").hide();
				$("#checkout-btn").show();
				
			},
			error : function() {
			}
		});

	}
}
function buynow() {
	$("#customer-detail").show();
}