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
        var trimkeyword = $.trim($(this).find("textarea[name='file_keywords[]']").val());
        var newkeyword = $.trim($("textarea[name='all_keyword']" ).val());
        
        $(this).find("textarea[name='file_keywords[]']").text(trimkeyword);
        
        if( trimkeyword == newkeyword+"," ){
            // do nothing
            console.log('doing nothing because'+newkeyword+trimkeyword);
            // include if for substring 
        } else {
            $(this).find("textarea[name='file_keywords[]']" ).append(newkeyword+",");  
        }
        
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
  $(".add_model").click(function(){
      var newmodel = $(this).parents('#model_notification').find("input[name='file_model_notification']").val();
      var oldmodel = $(this).parents('#model_notification').find("input[name='file_models[]']").val();
      console.log(oldmodel);
      if ($.trim(newmodel) === $.trim(oldmodel) || $.trim(newmodel) === ''){
          // do nothing
      } else {
          // add new model
          if($.trim(oldmodel) !== ''){
              var model = oldmodel+","+newmodel;
          } else {
              var model = newmodel;
          }
         
          $(this).parents('#model_notification').find("input[name='file_models[]']").val(model);
          $(this).parents('#model_notification').find(".model").append(newmodel+'<br/>');
      }

      return false;
  });

  function delete_items(){
    applyaction();
    $('.popup').show();
    return false;
  }
  function trigger_submit(){
    editimagecontributor();
    return false;
  }
    
