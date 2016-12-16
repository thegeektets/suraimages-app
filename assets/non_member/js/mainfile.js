$('input:radio[name="quality"]').change(
  function(){
    if ($(this).is(':checked')) {
        // append goes here
        $(this).parents(".accordion-content").find('input:radio[name="duration"]').removeAttr('checked');
        $(this).parents(".accordion-content").find('input:hidden[name="file_duration"]').val('');
        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Royalty Free'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val($(this).val()); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_quality"]').val($.trim($(this).parent('.quality_column').text())); 
        $(this).parents(".accordion-content").find('.ex_file_price').text($(this).val());
        $(this).parents(".accordion-content").find('.file_price').text($(this).val());
        
    }
});

$('input:radio[name="duration"]').change(
  function(){
    if ($(this).is(':checked')) {
        // append goes here
        $(this).parents(".accordion-content").find('.ex_file_price').text('00');
        
     	var file_p = $(this).parents(".accordion-content").find('input:radio[name="quality"]:checked').val();

        $(this).parents(".accordion-content").find('.ex_file_price').text( parseInt($(this).val()) + parseInt(file_p));
        var ex_p = $(this).parents(".accordion-content").find('.ex_file_price').text();
        $(this).parents(".accordion-content").find('.file_price').text( parseInt($(this).val()) + parseInt(file_p));
        $(this).parents(".accordion-content").find('input:hidden[name="file_duration"]').val($.trim($(this).parent('.duration_col').text())); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Exclusive License'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(ex_p); 
        
    }
});

$(document).ready(function() {

    $('.media-edt-select').hide();
    $('.media-int-select').hide();
    $('.details-edt-print-select').hide();
    $('.details-int-print-select').hide();
    $('.details-adv-tv-select').hide();
    $('.details-edt-tv-select').hide();
    $('.details-adv-digital-select  ').hide();
    $('.details-edt-digital-select').hide();
    $('.details-int-digital-select').hide();
    $('.duration-edt-select').hide();
    $('.duration-int-select').hide();

    $('input:hidden[name="usage_txt"]').val('0');
    $('input:hidden[name="media_txt"]').val('0');
    $('input:hidden[name="details_txt"]').val('0');
    $('input:hidden[name="duration_txt"]').val('0');
    $('input:hidden[name="exclusive_txt"]').val('0');
    $('input:hidden[name="sub_region_txt"]').val('0');
    $('input:hidden[name="region_txt"]').val('0');

});

function usage_warning(select_id) {
    if ( select_id !== 'usage-select') {
        var usage = $('#usage-select').children('option').filter(':selected').text();
        if($(this).val() == ""){
            usage = "";
        }
    
        if(usage == ""){
            $('.message').hide();   
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').text("select file usage"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            $('.message').show();
            setTimeout(hidemessage, 3000);
        }
    }
}
function calc_price () {
    var price =
    parseInt($('input:hidden[name="usage_txt"]').val()) +
    parseInt($('input:hidden[name="media_txt"]').val()) +
    parseInt($('input:hidden[name="details_txt"]').val()) +
    parseInt($('input:hidden[name="duration_txt"]').val()) +
    parseInt($('input:hidden[name="exclusive_txt"]').val()) +
    parseInt($('input:hidden[name="sub_region_txt"]').val()) +
    parseInt($('input:hidden[name="region_txt"]').val());

    return price;
}

$(".standard-select").on('change',function() {
    
    var select_id = $(this).attr('id');
    
    //usage_warning(select_id);

    if (select_id == 'usage-select') {
        var usage = $("select[id=usage-select] option:selected").text();
            usage = usage.replace("Select the Usage", "");
            console.log(usage);
            if(usage == 'Advertising') {

                $('.media-adv-select').show();
                $('.media-edt-select').hide();
                $('.media-int-select').hide();
                $('.details-adv-print-select').show();
                $('.details-edt-print-select').hide();
                $('.details-int-print-select').hide();
                $('.details-adv-tv-select').hide();
                $('.details-edt-tv-select').hide();
                $('.details-adv-digital-select  ').hide();
                $('.details-edt-digital-select').hide();
                $('.details-int-digital-select').hide();
                $('.duration-adv-select').show();
                $('.duration-edt-select').hide();
                $('.duration-int-select').hide();
                console.log(usage);    

            } else if (usage == 'Editorial') {
                $('.media-adv-select').hide();
                $('.media-edt-select').show();
                $('.media-int-select').hide();
                $('.details-adv-print-select').hide();
                $('.details-edt-print-select').show();
                $('.details-int-print-select').hide();
                $('.details-adv-tv-select').hide();
                $('.details-edt-tv-select').hide();
                $('.details-adv-digital-select  ').hide();
                $('.details-edt-digital-select').hide();
                $('.details-int-digital-select').hide();
                $('.duration-adv-select').hide();
                $('.duration-edt-select').show();
                $('.duration-int-select').hide();
                console.log(usage);    

            } else {
                
                $('.media-adv-select').hide();
                $('.media-edt-select').hide();
                $('.media-int-select').show();
                $('.details-adv-print-select').hide();
                $('.details-edt-print-select').hide();
                $('.details-int-print-select').show();
                $('.details-adv-tv-select').hide();
                $('.details-edt-tv-select').hide();
                $('.details-adv-digital-select  ').hide();
                $('.details-edt-digital-select').hide();
                $('.details-int-digital-select').hide();
                $('.duration-adv-select').hide();
                $('.duration-edt-select').hide();
                $('.duration-int-select').show();
                console.log(usage);    
            }

        $('input:hidden[name="usage_txt"]').val($(this).val());
        $('input:hidden[name="media_txt"]').val('0');
        $('input:hidden[name="details_txt"]').val('0');
        $('input:hidden[name="duration_txt"]').val('0');
        $('input:hidden[name="exclusive_txt"]').val('0');
        $('input:hidden[name="sub_region_txt"]').val('0');
        $('input:hidden[name="region_txt"]').val('0');

        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="usage_txt"]').val());


    } else if (select_id == 'media-adv-select' || select_id == 'media-edt-select' || select_id == 'media-int-select') {

        if(select_id == 'media-adv-select') {
                var media = $("select[id=media-adv-select] option:selected").text();
                    media = media.replace("Select the Media", "");
                    media = $.trim(media);

                    if(media == 'Print') {
                        
                        $('.details-adv-print-select').show();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);
                        
                    } else if (media == 'TV') {
              
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').show();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);

                    } else if (media == 'Digital') {
                
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').show();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);
                    }
                
           } else if (select_id == 'media-edt-select') {
            var media = $("select[id=media-edt-select] option:selected").text();
                    media = media.replace("Select the Media", "");
                    media = $.trim(media);    

                    if(media == 'Print') {
                      
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').show();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);
                        
                    } else if (media == 'TV') {
                      
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').show();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);

                    } else {
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').show();
                        $('.details-int-digital-select').hide();
                        console.log(media);
                    }
        } else {
            var media = $("select[id=media-int-select] option:selected").text();
                    media = media.replace("Select the Media", "");
                    media = $.trim(media);

                    if(media == 'Print') {
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').show();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').hide();
                        console.log(media);
                    
                    } else {
                    
                        $('.details-adv-print-select').hide();
                        $('.details-edt-print-select').hide();
                        $('.details-int-print-select').hide();
                        $('.details-adv-tv-select').hide();
                        $('.details-edt-tv-select').hide();
                        $('.details-adv-digital-select').hide();
                        $('.details-edt-digital-select').hide();
                        $('.details-int-digital-select').show();
                        console.log(media);
                    }
        }
        $('input:hidden[name="media_txt"]').val($(this).val());
        
        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="media_txt"]').val() );

    } else if (select_id == 'details-adv-print-select' || select_id == 'details-edt-print-select' || select_id == 'details-int-print-select' ||
        select_id == 'details-adv-tv-select' || select_id == 'details-edt-tv-select' || select_id == 'details-adv-digital-select' ||
        select_id == 'details-adv-digital-select' || select_id == 'details-edt-digital-select' || select_id == 'details-int-digital-select' ) {

        var detail_total = 0;
        $('.'+select_id).find('.ms-drop').find('input[type="checkbox"]').filter(':checked').each(function (){
            var the_value = $(this).val();
            if(the_value == 'on'){
                the_value = 0;
            }
            try {
                detail_total = detail_total + parseInt(the_value);
            } catch (exception){
                detail_total = detail_total + parseInt(the_value);
            }
        });
        
        $('input:hidden[name="details_txt"]').val(detail_total);

        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="details_txt"]').val() );
    
    } else if (select_id == 'duration-adv-select' || select_id == 'duration-edt-select' || select_id == 'duration-int-select') {
        var duration = $("select[id="+select_id+"] option:selected").text();
        duration = duration.replace("Select the Duration", "");
        $('input:hidden[name="duration_txt"]').val($(this).val());

        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        $('input:hidden[name="file_duration"]').val(duration);

        console.log( duration );
        
    } else if (select_id == 'exclusive-select') {

        var detail_total =  $(this).val();
        var duration = $("select[id="+select_id+"] option:selected").text();
        duration = duration.replace("Select Exclusive License", "");
        $('input:hidden[name="exclusive_txt"]').val(detail_total);
        $('input:hidden[name="exclusive_duration"]').val(duration);
        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="exclusive_duration"]').val() );
    
    } else if (select_id == 'region-select') {

        var detail_total = 0;
        $('.'+select_id).find('.ms-drop').find('input[type="checkbox"]').filter(':checked').each(function (){
            var the_value = $(this).val();
            if(the_value == 'on'){
                the_value = 0;
            }
            try {
                detail_total = detail_total + parseInt(the_value);
            } catch (exception){
                detail_total = detail_total + parseInt(the_value);
            }
        });
        
        $('input:hidden[name="region_txt"]').val(detail_total);

        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="region_txt"]').val() );
    
    } else if (select_id == 'sub-region-select') {

        var detail_total = 0;

        $('.'+select_id).find('.ms-drop').find('input[type="checkbox"]').filter(':checked').each(function (){
            var the_value = $(this).val();
            if(the_value == 'on'){
                the_value = 0;
            }
            try {
                detail_total = detail_total + parseInt(the_value);
            } catch (exception){
                detail_total = detail_total + parseInt(the_value);
            }
        });
        

        $('input:hidden[name="sub_region_txt"]').val(detail_total);

        $(this).parents(".accordion-content").find('input:hidden[name="file_license"]').val('Right Managed'); 
        $(this).parents(".accordion-content").find('input:hidden[name="file_price"]').val(calc_price()); 
        $(this).parents(".accordion-content").find('.file_price').text(calc_price());
        
        console.log( $('input:hidden[name="sub_region_txt"]').val() );
    } 

});


function hidemessage() {
   $('.message').hide();
}
  