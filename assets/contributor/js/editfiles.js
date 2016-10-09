  $('select[type="hidden"]').each(function(){
    $(this).hide();
  });
  $('textarea[type="hidden"]').each(function(){
    $(this).hide();
  });

  function applyaction(){
    $('.message').hide();
    $('.message').attr("class" ,"message alert-box secondary");
    $('.message').text("Select items using the checkbox to apply action , Click Submit to save changes to Database "); 
    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
    $('.message').show();
    $("#submit_changes").show();
    $(".submit_changes").show();
  }
  function applytitleall(){
    applyaction();
    var all_title = $('.tabs-panel .is-active').find("input[name='all_title']").val();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("input[name='file_name[]']").val(all_title);
      }
    });
    return false;
  }
  function applykeywordall(){
    applyaction();
    var all_keyword = $('.tabs-panel .is-active').find("textarea[name='all_keyword']").val();
    var newkeyword = $.trim(all_keyword);
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        var trimkeyword = $.trim($(this).find("textarea[name='file_keywords[]']").val());
        
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
    var all_price = $('.tabs-panel .is-active').find("input[name='all_price']").val();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("input[name='file_price_large[]']" ).val(all_price);
       }
    });
    return false; 
  }
  function applycategoryall(){
    applyaction();
    var all_category = $('.tabs-panel .is-active').find("select[name='all_category']").val();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
        $(this).find("select[name='file_category[]']" ).val(all_category).change();
        var value = all_category;
        $(this).find("select[name='file_category[]'] option[value='"+value+"']").attr('selected', 'selected');
        $(this).find("select[name='file_category[]'] option[value='"+value+"']").prop('selected', 'selected');
      }
   });
   return false;  
  }
  function applyimagetypeall(){
    applyaction();
    var all_image_type = $('.tabs-panel .is-active').find("select[name='all_image_type']").val();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_type[]']" ).val(all_image_type).change();
      }
   });
   return false;  
  }
  function applyimagesubtypeall(){
    applyaction();
    var all_image_subtype = $('.tabs-panel .is-active').find("select[name='all_image_subtype']").val();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_subtype[]']" ).val(all_image_subtype).change();
      }
   });

   return false;  
  }
  function applyorientationeall(){
    applyaction();
    var all_orientation = $('.tabs-panel .is-active').find("select[name='all_orientation']").val();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_orientation[]']" ).val(all_orientation).change();
      }
   });
   return false;  
  }
  function applypeopleall(){
    applyaction();
    var all_people = $('.tabs-panel .is-active').find("select[name='all_people']").val();
   $('.edit_item').each(function () { 
     if ( $(this).find("input[name='file_select']").prop('checked') ){
       $(this).find("select[name='file_people[]']" ).val(all_people).change();
      }
   });
   return false;  
  }
  function applysameshoot(){
    applyaction();
    var all_shoot = $('.tabs-panel .is-active').find("input[name='all_shoot']").val();
    $('.edit_item').each(function () { 
         if ( $(this).find("input[name='file_select']").prop('checked') ){
           $(this).find("input[name='file_shoot[]']" ).val(all_shoot);
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
         
          $(this).parents('#model_notification').find("input[name='file_releases[]']").val(model);
          $(this).parents('#model_notification').find(".model").append(newmodel+'<br/>');
      }

      return false;
  });
    $(".add_release").click(function(){
      var newrelease = $(this).parents('#releases_files').find("select[name='file_release']").val();
      var newreleasetxt = $(this).parents('#releases_files').find("select[name='file_release'] option[value='"+newrelease+"']").text();
      var oldrelease = $(this).parents('#releases_files').find("input[name='file_releases[]']").val();
      console.log(oldrelease);
      if ($.trim(newrelease) === $.trim(oldrelease) || $.trim(newrelease) === ''){
          // do nothing
      } else {
          // add new model
          if($.trim(oldrelease) !== ''){
              var release = oldrelease+","+newrelease;
          } else {
              var release = newrelease;
          }
         
          $(this).parents('#releases_files').find("input[name='file_releases[]']").val(release);
          $(this).parents('#releases_files').find(".releases").append(newreleasetxt+'<br/>');
      }

      return false;
  });

  function add_release(){
    applyaction();
    var newrelease = $('.tabs-panel .is-active').find("select[name='all_file_release']").val();
    var newreleasetxt = $('.tabs-panel .is-active').find("select[name='all_file_release'] option[value='"+newrelease+"']").text();
    
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
    
           var oldrelease = $(this).find("input[name='file_releases[]']").val();
           console.log(oldrelease);
           if ($.trim(newrelease) === $.trim(oldrelease) || $.trim(newrelease) === ''){
               // do nothing
           } else {
               // add new model
               if($.trim(oldrelease) !== ''){
                   var release = oldrelease+","+newrelease;
               } else {
                   var release = newrelease;
               }
              
               $(this).find("input[name='file_releases[]']").val(release);
               $(this).find(".releases").append(newreleasetxt+'<br/>');
           }

      }
    
    });
    return false;
  }
  
  $('.delete_file').click(function(){

    $(this).parents('.edit_item').find("input[name='file_select']").prop('checked' , true);
    $(".title").hide();
    $(".add_keywords").hide();
    $(".set_price").hide();
    $(".image_type").hide();
    $(".image_subtype").hide();
    $(".orientation").hide();
    $(".attach_release").hide();
    $(".same_shoot").hide();
    $(".model_notification").hide();
    $(".people").hide();
    $(".set_price").hide();
    $(".category").hide();
    $(".delete_items").show();
    $('.popup').show();   
    return false;
  });


  function cancel_delete(){
    $('.popup').hide();
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
    
