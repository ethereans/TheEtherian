jQuery(function ($) {
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


	// MOBILE SEARCH

	$('#openSearch').click(function(event) {
		event.preventDefault();

		$('.search-bar').toggleClass('open');

		if ($('.search-bar').hasClass('open'))
		{
			console.log('should focus now');

			setTimeout(function() {
				$('input[name="s"]').focus();
			}, 150);

			return $(this).html('<i class="fa fa-close"></i>');
		}

		return $(this).html('<i class="fa fa-search"></i>');
	});
});
