$('.sign-up').on('click', function(){

	if($( ".sign-in" ).hasClass( "active")){

		$('.info-state').addClass('right');
	  	$('.form-input').addClass('slide');
	  	$('.sign-in').toggleClass('active');
	  	$('.sign-up').toggleClass('active');
    
	}

});

$('.sign-in').on('click', function(){

	if($( ".sign-up" ).hasClass( "active")){

		$('.info-state').removeClass('right');
		$('.form-input').removeClass('slide');
		$('.sign-in').toggleClass('active');
		$('.sign-up').toggleClass('active');
    
	}

});

$('.tabIgnore').keydown(function(e) {
    if (e.keyCode === 9) {
        e.preventDefault();
        e.preventDefault();
    }
});