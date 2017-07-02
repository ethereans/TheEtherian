$(function () {
	// ISOTOPE

	$('#dappGrid').isotope({
	  // options
	  itemSelector: '.col-sm-6',
	  layoutMode: 'masonry',
		getSortData: {
			name: '.dapp-name',
			date: '.recent-date'
		},
		filter: function() {
    	return qsRegex ? $(this).find('.dapp-name').text().match( qsRegex ) : true;
  	}
	});

	// Sorting

	$('#sortDapps').change(function() {
		sortValue = $(this).val();
		sortAsc = $(this).find(':selected').attr('data-asc') === 'true' ? true : false;

		console.log(sortAsc);

		$('#dappGrid').isotope({ sortBy: sortValue, sortAscending: sortAsc });
	});

	// Search

	// quick search regex
	var qsRegex;

	// use value of search field to filter
	var $quicksearch = $('input[name="s"]').keyup( debounce( function() {
	  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	  $('#dappGrid').isotope();
	}, 200 ) );

	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	  var timeout;
	  return function debounced() {
	    if ( timeout ) {
	      clearTimeout( timeout );
	    }
	    function delayed() {
	      fn();
	      timeout = null;
	    }
	    timeout = setTimeout( delayed, threshold || 100 );
	  }
	}
});
