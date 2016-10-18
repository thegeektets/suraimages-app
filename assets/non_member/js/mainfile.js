$('input:radio[name="quality"]').change(
    function(){
        if ($(this).is(':checked')) {
            // append goes here
            $('.file_price').text($(this).val());
        }
    });