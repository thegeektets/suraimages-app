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

function hidemessage() {
   $('.message').hide();
}
  