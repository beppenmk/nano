$(function() {
	//$.datepicker.regional['it']
	$("#data_nascita").datepicker({ changeYear: true,yearRange: "-100:+0" });
	//$("fieldset.valida form").validate();	


	$( "fieldset.valida form" ).validate({
	 	rules: {
		    email: {
		      required: true,
		      email: true
	    	},
		    password: {
				required: true,
				minlength: 5
			},
			conferma_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			cellulare: {
			    required: false,
				number: true
		    },
	    	//foto: {
	     	//	required: false,
	     	//	extension: "jpg|png|gif"
	    	//},	
		}
	});

});
	


	