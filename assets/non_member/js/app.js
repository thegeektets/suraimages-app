//$('.standard-select').foundationSelect();
$(document).foundation();

function formatBytes(bytes,decimals) {
   if(bytes == 0) return '0 Byte';
   var k = 1000;
   var dm = decimals + 1 || 3;
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
   var i = Math.floor(Math.log(bytes) / Math.log(k));
   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

$(document).ready(function(){
	
	$(function() {
            $('.standard-select-multiple').change(function() {
            }).multipleSelect({
                width: '100%'
            });
        });
	var url = ""+window.location.href;

	$('input:hidden[name="current_url"]').val(url);

	function hidemessage(){
	  $('.message').hide();
	}

	$(".disabled").click(function(){
	  if(($.trim($(this).parents(".accordion-content").find('.file_price').text())) !== '00'){
	  	return true 
	  } else {
	    $('.message').hide();
	    $('.message').attr("class" ,"message alert-box warning");
	    $('.message').text("Select a file size before Viewing Exclusive License"); 
	    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
	    $('.message').show();
	    setTimeout(hidemessage, 3000);
	    return false
	  }
  	});
    
    $('.slc_category').change(function() {
    	}).multipleSelect({
        width: '100%'
    	});

	$('.search_results').removeClass('large-10');

	$('.file_l_size').each(function(){
		$(this).text(formatBytes($(this).text()));
	});
	$('.file_m_size').each(function(){
		$(this).text(formatBytes($(this).text()));
	});
	$('.file_s_size').each(function(){
		$(this).text(formatBytes($(this).text()));
	});
	var state = "open";
	var popup_state = "closed";
	var close_btn = "false";

	$(".search_img_details").hide();
	$(".search_img_popup").hide();

	$( ".shopping_basket" ).click(
	  function() {

	  	$(".search_img_popup").hide();
	   	$(this).parents('.search_results_img').find(".search_img_popup").css("display","block");
	   	var left =  ((window.innerWidth - 
	   				$(this).parents('.search_results_img').find(".search_img_popup").width())/2);
		$(this).parents('.search_results_img').find(".search_img_popup").css("left",(left-50)+"px");

	   	if( $(this).parents('.search_results_img').find(".search_img_popup").find(".pop-similar-images").length ){
	   		try {
	   		$(this).parents('.search_results_img').find(".search_img_popup").find(".pop-similar-images").slick({
	   				        infinite: true,
	   				        slidesToShow: 3,
	   				        slidesToScroll: 3
	   				});
	   		} catch (error){
	   			console.log(error);
	   		}
	   	}
	   	return false;
	  }
	);

	
	$( ".search_img" ).click(
	  function() {
	  	$(".search_img_popup").hide();
	   	$(this).parent().find(".search_img_popup").css("display","block");
	   	var left =  ((window.innerWidth - 
	   				$(this).parent().find(".search_img_popup").width())/2);
		$(this).parent().find(".search_img_popup").css("left",(left-50)+"px");

	   	if( $(this).parent().find(".search_img_popup").find(".pop-similar-images").length ){
	   		try {
	   		$(this).parent().find(".search_img_popup").find(".pop-similar-images").slick({
	   				        infinite: true,
	   				        slidesToShow: 3,
	   				        slidesToScroll: 3
	   				});
	   		} catch (error){
	   			console.log(error);
	   		}
	   	}
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

	if( $(".similar-images").find(".search_imgs").length ){
		$('.similar-images').slick({
		        infinite: true,
		        slidesToShow: 5,
		        slidesToScroll: 3
		});
	}


});
   
