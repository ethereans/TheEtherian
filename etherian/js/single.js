jQuery(function ($) {
	$(window).load(function() {
		// ISOTOPE

		$('.post-dapp-news').isotope({
		  // options
		  itemSelector: '.dapp-news',
		  layoutMode: 'masonry'
		});
	});
});
