 $(function() {
 	$('select').change(function () {
     var optionSelected = $(this).find("option:selected");
     var valueSelected  = optionSelected.val();
     var textSelected   = optionSelected.text();


     var id= $(this).attr('id').split("_");; 
		
	

	//alert(valueSelected);
		$.ajax({
		  url: "lib/ord.php?id="+id[1]+"&ord="+valueSelected,
		  context: document.body
		}).done(function(e) {
		  alert(e);
		  
		});

 	})	
 })	