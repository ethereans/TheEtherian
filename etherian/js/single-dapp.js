jQuery(function ($) {
	$(window).load(function() {
		// ISOTOPE

		$('#newsGrid').isotope({
		  // options
		  itemSelector: '.dapp-news',
		  layoutMode: 'masonry'
		});
	});
});
