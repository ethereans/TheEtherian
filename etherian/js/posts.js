jQuery(function ($) {
	$(window).load(function() {
		// ISOTOPE

		$('.post-dapp-news').each(function() {
			$(this).isotope({
			  // options
			  itemSelector: '.dapp-news',
			  layoutMode: 'masonry'
			});
		});
	});

	// Add isotope to new posts as they're loaded by infinite scroll.

	$(document).on('post-load', function() {
		$('.post-dapp-news').each(function() {
			if (!$(this).hasClass('isotope')) {
				$(this).isotope({
				  // options
				  itemSelector: '.dapp-news',
				  layoutMode: 'masonry'
				});
			}
		});
	});
});
