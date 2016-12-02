$(document).ready(function(){
	var numItems = $('.page_item').length;
	var numPerPage = $( "select[name='files_per_page']" ).val();
	if(numPerPage ==''){
		numPerPage = 50;
	}
	if(numItems > numPerPage){
		var pages = Math.ceil(numItems/numPerPage);
		var i = 1; 
		$('.page_item').each(function(){
			if(i > numPerPage){
				$(this).hide();
			}
			i++;
		});
	} else {
		var pages = 1;
	}
	$('.total_pages').text(pages);
	
	function loadPage(page_number){
		$('.page_item').hide();
		if($('.pagination_slc').val() !== ''){
			numPerPage = parseInt($("select[name='files_per_page']" ).val());
			if(numItems > numPerPage){
				var pages = Math.ceil(numItems/numPerPage);
			} else {
				var pages = 1;
			}
			$('.total_pages').text(pages);
		}
		if(page_number == 1){
			var i = 0;
			$('.page_item').each(function(){
				if(i < numPerPage){
					$(this).show();
				}
				i++;
			});	
		} else {
			var start = ((page_number-1)*numPerPage);
			var end = start+numPerPage;
			var i = 1;
			$('.page_item').each(function(){
				if(i > start && i <= end){
					$(this).show();
				}
				i++;
			});	
		}
		
	}
	$('.next_page').click(function(){
		var page_number = $('.page_number').val();
		if(page_number == pages){
			loadPage(page_number);
		} else {
			$('.page_number').val(parseInt(page_number)+1);
			loadPage(parseInt(page_number)+1);
		}
	 return false;
	});
	$('.prev_page').click(function(){
		var page_number = $('.page_number').val();
		if(page_number == 1){
			// do nothing
			loadPage(page_number);
		} else {
			$('.page_number').val(parseInt(page_number)-1);
			loadPage(parseInt(page_number)-1);
		}
	 return false;
	});

	$("select[name='files_per_page']" ).on('change', function() {
			loadPage(1);
	});
	$(".page_number" ).on('change', function() {
			if($(this).val() > 0 && $(this).val()<= pages) {
				loadPage($(this).val());	
			}
	});
});

