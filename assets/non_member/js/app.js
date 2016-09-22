$(document).foundation()

$(document).ready(function(){
	
	var state = "open";
	var popup_state = "closed";
	var close_btn = "false";

	$(".search_img_details").hide();
	$(".search_img_popup").hide();


	$( ".search_img" ).click(
	  function() {
	  	$(".search_img_popup").hide();
	   	$(this).parent().find(".search_img_popup").css("display","block");

	   	return false;
	  }
	);

	$( ".close_popup" ).click(
	  function() {
	    $(this).parents().find(".search_img_popup").css("display","none");
	  
	  }
	);
	

	$( ".search_results_img" ).hover(
	  function() {
	    
	    $(this).find(".search_img_details").css("display","block");

	  }, function() {
	    $(".search_img_details").hide();

	  }
	);

	$(".is-active").find('.accordion-content').show();
	
	$( ".accordion-title" ).click(function() {

		console.log('yes you clicking the title');
	   
	  if(state === "closed" || !$(this).parent().hasClass('is-active')) {
		  	console.log("active not found");

			$(this).parent().addClass('is-active');
			$(this).parent().find('.accordion-content').show();
			if($(this).parent().hasClass('search_bar_item')){

				$('.search_results').addClass('large-10');
				$('.search_img_popup').css('width', '70%');
				$(".search_img_popup").css("left","22.32rem");
			}
			
			state = "open";

	  }  else {
		  if ( $(this).parent().hasClass('is-active')) {
	  		console.log("active found");
	  		$(this).parent().removeClass('is-active');
		    $(this).parent().find('.accordion-content').hide();

		    if($(this).parent().hasClass('search_bar_item')){

			    $('.search_results').removeClass('large-10');
			    $('.search_img_popup').css('width', '88%');;
			    $(".search_img_popup").css("left","5.39rem");
			}
			    state = "closed";

		  } 
		}
	});

	
	$('.similar-images').slick({
	        infinite: true,
	        slidesToShow: 3,
	        slidesToScroll: 3
	});



});
   
