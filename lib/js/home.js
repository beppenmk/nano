$(function() {
	$('.carousel').carousel();
setTimeout(function() {
      // Do something after 5 seconds

	$('.eventi').roundabout({
		/*
		autoplay:true,
		autoplayPauseOnHover:true,
		autoplayInitialDelay:2000,
		*/
		duration:1500,
		
		responsive:true
	});

}, 450);


});

