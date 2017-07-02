$(function () {
	// PRELOADER

	$(window).load(function() {
		$('#preloader').fadeOut(500);
	});


	// MOBILE NAV

	$('#openMenu').click(function(event) {
		event.preventDefault();

		$('#mobileNavMenu').toggleClass('open');

		if ($('#mobileNavMenu').hasClass('open'))
		{
			return $(this).html('<i class="fa fa-close"></i>');
		}

		return $(this).html('<i class="fa fa-bars"></i>');
	});
});
