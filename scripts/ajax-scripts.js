function callSearch(){
	var $search_terms = $('.search-box-form input[name="search_terms"]').val();
	//alert($search_terms); text alert --> PASS
	$('.loading-img').show();
	
	setTimeout(function(){
		
		var $request = $.ajax({
			url: "DB/PHP/minutes_search.php",
			method: "GET",
			data: {search_terms: $search_terms},
			dataType: "html"
		});
		
		$request.done(function(data) {
			var $app = data;
			$('.search-results').empty().append($app);
			
			$('.loading-img').hide();
		})
		$request.fail(function(xhr, ajaxOptions, thrownError) {
			// alternative construct to the error callback; replaced 'error:'
			var $error_message = xhr.status + "\n" + thrownError + "\n Request failed.";
			alert($error_message);
			
			$('.loading-img').hide();
		})
		$request.always(function() {
			// alternative construct to the complete callback; function will always be run; replaces 'complete:'
			
		});
	},500);

};