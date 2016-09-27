  function applyaction(){
    $('.message').hide();
    $('.message').attr("class" ,"message alert-box secondary");
    $('.message').text("Select items using the checkbox to apply action , Click Submit to save changes to Database "); 
    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
    $('.message').show();
    $("#submit_changes").show();
  }
  function applytitleall(){
    applyaction();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("input[name='file_name[]']").val($( "input[name='all_title']" ).val());
      }
    });
    return false;
  }
  function applykeywordall(){
    applyaction();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("textarea[name='file_keywords[]']" ).text($( "textarea[name='all_keyword']" ).val());
      }
    });
    return false; 
  }
  function applypriceall(){
    applyaction();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("input[name='file_price_large[]']" ).val($( "input[name='all_price']" ).val());
       }
    });
    return false; 
  }
  function applycategoryall(){
    applyaction();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("select[name='file_category[]']" ).val($("select[name='all_category']").val()).change();
        var value = $("select[name='all_category']").val();
        $(this).find("select[name='file_category[]'] option[value='"+value+"']").attr('selected', 'selected');
        $(this).find("select[name='file_category[]'] option[value='"+value+"']").prop('selected', 'selected');
      }
   });
   return false;  
  }
  function applyimagetypeall(){
    applyaction();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_type[]']" ).val($("select[name='all_image_type']").val()).change();
      }
   });
   return false;  
  }
  function applyimagesubtypeall(){
    applyaction();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_subtype[]']" ).val($("select[name='all_image_subtype']").val()).change();
      }
   });

   return false;  
  }
  function applyorientationeall(){
    applyaction();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_orientation[]']" ).val($("select[name='all_orientation']").val()).change();
      }
   });
   return false;  
  }
  function applypeopleall(){
    applyaction();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_people[]']" ).val($("select[name='all_people']").val()).change();
      }
   });
   return false;  
  }
  function applysameshoot(){
    applyaction();
    $('.edit_item').each(function () { 
         if ( $(this).find("input[name='file_select']").prop('checked') ){
           $(this).find("input[name='file_shoot[]']" ).val($("input[name='all_shoot']").val()).change();
          }
       });
    return false;  
  }
  function delete_items(){
    applyaction();
    $('.popup').show();
    return false;
  }
  function trigger_submit(){
    editimagecontributor();
    return false;
  }
    
