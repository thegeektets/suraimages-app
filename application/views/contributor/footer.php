<footer class="inside-footer-bar">
 <div class="row collapse">
  <div class="large-6 columns medium-7 columns">
    <div class="footer-menu">
      <ul class="menu">
        <li class="menu-text menu-divider"> <a href="<?php echo base_url(); ?>"> Home </a></li>
        <li class="menu-text menu-divider"><a href="<?php echo base_url('index.php/main/about'); ?>"> About Us </a></li>
        <li class="menu-text menu-divider"><a href="<?php echo base_url('index.php/main/terms'); ?>"> Terms & Conditions </a></li>
        <li class="menu-text menu-divider"><a href="
        <?php echo base_url('index.php/main/contact'); ?>"> Contact Us </a></li>
        <li class="menu-text menu-divider"><a href="<?php echo base_url('index.php/main/resources'); ?>"> Resources </a></li>
        <li class="menu-text menu-divider"><a href="<?php echo base_url('index.php/main/faqs'); ?>"> FAQs </a></li>
        <li class="menu-text"><a href="<?php echo base_url('index.php/main/blog'); ?>"> Blog </a></li>
      </ul>
    </div>
  </div>
  <div class="large-6 columns medium-3 columns">
      <span class="copyright"> Copyright &copy; 2016 SuraImages </span>
  </div>
</div>
</footer>
<script src="<?php echo base_url('/assets/contributor/js/vendor/jquery.js')?>"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/contributor/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/contributor/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/jquery.scrollTo.min.js')?>"></script> 
<script src="<?php echo base_url('/assets/contributor/js/app.js')?>"></script> 
<script src="<?php echo base_url('/assets/contributor/js/unique.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/editfiles.js')?>"></script>    
<script src="<?php echo base_url('/assets/contributor/multiselect/multiple-select.js')?>"></script>

<script type="text/javascript">
  function editvideocontributor(){
   $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/edit_contributor_videos")?>',
    data:$('#edit_video_contributor').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('.message').attr("class" ,"message alert-box success");
           $('.message').text("Videos have been submitted successfully!"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
              sessionStorage.setItem('onReload', 'activateUpload');
              location.reload();
              
        } else if (data === '0') {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').append("Failed to submit, make sure all required fields are filled"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').append("Failed to submit, make sure all required fields are filled"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          console.log(data)
          
        }
        $('.message').show();
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  return false;
  }
  function editimagecontributor(){
   $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/edit_contributor_images")?>',
    data:$('#edit_image_contributor').serialize(),
    success:
      function(data){
        
        console.log(data);

        if (data === '1'){
           $('.message').attr("class" ,"message alert-box success");
           $('.message').text("Images have been edited successfully!"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
              sessionStorage.setItem('onReload', 'activateUpload');
              location.reload();
              
        } else if (data === '0') {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').text("Failed to submit, make sure all required fields are filled"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else if (data === '5') {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').text("Failed to submit, make sure the price is within the set range"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else if (data === '7') {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').text("Failed to submit, make sure each image contains atleast 7 keywords"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else {
           $('.message').attr("class" ,"message alert-box warning");
           $('.message').text("Failed to submit, make sure all required fields are filled"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          console.log(data)
          
        }
        $('.message').show();
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  return false;
  }
  function add_model(){
    applyaction();
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
  
          var newmodel = $("input[name='all_model_notification']").val();
          var oldmodel = $(this).find("input[name='file_models[]']").val();
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
             
              $(this).find("input[name='file_models[]']").val(model);
              $(this).find(".model").append(newmodel+'<br/>');

          }
      }
  
    });

    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/add_model")?>',
    data:$('#new_model').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('.message').addClass("alert-box success");
           $('.message').text("Success model added"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').text("Failed to add model , thats all we know"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        }
        $('.message').show();
      },
    fail:
      function(data){
        console.log(data);
      }

  });
    return false;
  }
  function find_model(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/find_model/")?>',
    data:$('#find_model_form').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('.message').addClass("alert-box success");
           $('.message').text("Model found"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else if (data === '0'){
          $('.message').addClass("alert-box warning");
          $('.message').text("Model email not found , add new"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').text("Internal server error , thats all we know"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        }
        $('.message').show();
      },
    fail:
      function(data){
        console.log(data);
      }

  });
    return false;
  }
  function replace_model(){
    
    $('#replace_model_email').val($('#model_email').val());

    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/replace_model/")?>',
    data:$('#replace_model_form').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('.message').addClass("alert-box success");
           $('.message').text("Model Replaced"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else if (data === '0'){
          $('.message').addClass("alert-box warning");
          $('.message').text("Model replacement failed"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').text("Internal server error , please try again"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');

        }
        $('.message').show();
        console.log(data);
      },
    fail:
      function(data){
        console.log(data);
      }

  });
    return false;
  }
  function change_user_password(){
  $.ajax({
  type: 'post',
  url:'<?php echo base_url("/index.php/member/change_password")?>',
  data:$('#changepassword').serialize(),
  success:
    function(data){
      if (data === '1'){
         $('.message').attr("class" ,"message alert-box success");
         $('.message').text("Changes has been saved successfully!"); 
         $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else if (data === '0'){
        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("All fields are required"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else if (data === '3'){
        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Old password is incorrect, please check and try again"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else if (data === '2'){
        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Password does not match confirmation password"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else {
        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Internal server error, please try again"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      }
      $('.message').show();
    },
  fail:
    function(data){
      console.log(data);
    }

  });

return false;

}
function update_account(){
  $.ajax({
  type: 'post',
  url:'<?php echo base_url("/index.php/contributor/update_account")?>',
  data:$('#user_account').serialize(),
  success:
    function(data){
      if (data === '1') {
         $('#message').attr("class" ,"alert-box success");
         $('#message').text("Changes has been saved successfully!"); 
         $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else if (data === '0') {
        $('#message').attr("class" ,"alert-box warning");
        $('#message').text("All fields are required"); 
        $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else {
        $('#message').attr("class" ,"alert-box warning");
        $('#message').text("Internal server error, please try again"); 
        $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      }
      $('#message').show();
    },
  fail:
    function(data){
      console.log(data);
    }

});

return false;

}
function submit_trial_images(){
    var success = "FALSE";
    if($( ".jFiler-item" ).length < 1){

        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Make sure the number of files uploaded is not less than one"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        $('.message').show();
    
    } else {
        $( ".jFiler-item" ).each(function( index ) {
           success = "FALSE";
           var text = $( this ).text();
           var size = text.substring(text.lastIndexOf("size:"), text.indexOf('type:'));
               size = $.trim(size);
           var type = text.substring(text.indexOf('type:'));
               type = $.trim(type);
           if(size.includes("KB")){
                $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                $( this ).append('Image is too small');
                return false ;
           } else {
                var mbsize = size.substring(6,size.indexOf('M'));
                if(mbsize < 8 ){
                  $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                  $( this ).append('Image should not be smaller than 2MB');
                  return false
                } else {
                  var tstr = type.substring(6);
                  tstr = tstr.toUpperCase();
                  tstr = $.trim(tstr);
                  
                  if (tstr !== "PNG" && tstr !== "JPG" && tstr !== "GIF") {
                     $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                     $(this ).append('File format not allowed');
                     return false;
                  } else {
                    success = "TRUE";
                    $(this).append('<div class ="loading"></div>');
                    $('.btn_upload_multi').addClass('processing');
                    $('.processing').removeClass('btn_upload_multi');
                    $('.processing').removeClass('button');
                    $('.processing').text("Upload processing ,please wait..");
                  }
                }
           }

        });
    }

    if(success === "TRUE"){
          var form = document.getElementById('trial_form');
          var myfd = new FormData(form);
          $.ajax({
          xhr: function () {
              var xhr = new window.XMLHttpRequest();
              xhr.upload.addEventListener("progress", function (evt) {
                  if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                    if(percentComplete === 1) {
                      // $('.loading').addClass('hide');
                    }
                  }
              }, false);
              xhr.addEventListener("progress", function (evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                  }
              }, false);
              return xhr;
          },          
          type: 'post',
          url:'<?php echo base_url("/index.php/contributor/upload_contributor_images")?>',
          data:myfd,
          processData: false,
          contentType:false,
          success:
            function(data){
              if (data === '1'){
                 $('.message').attr("class" ,"message alert-box success");
                 $('.message').text("Images have been uploaded successfully!"); 
                 $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    sessionStorage.setItem('onReload', 'activateUpload');
                    location.reload();
              } else {
                $('.message').attr("class" ,"message alert-box warning");
                $('.message').text("An error occured while uploading images please try again!");  
                $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                
                $('.processing').addClass('btn_upload_multi');
                $('.btn_upload_multi').removeClass('processing');
                $('.btn_upload_multi').addClass('button');
                $('.btn_upload_multi').text("Continue");
              }
              $('.message').show();
              console.log(data);
            },
          fail:
            function(data){
              console.log(data);
            }

        });

    }
    return false;
}
function submit_release_forms(){
    var success = "FALSE";
    if($( ".jFiler-item" ).length < 1){

        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Make sure the number of files uploaded is not less than one"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        $('.message').show();
    
    } else {
        $( ".jFiler-item" ).each(function( index ) {
           success = "FALSE";
           var text = $( this ).text();
           var size = text.substring(text.lastIndexOf("size:"), text.indexOf('type:'));
               size = $.trim(size);
           var type = text.substring(text.indexOf('type:'));
               type = $.trim(type);
           if(size.includes("KB")){
              var tstr = type.substring(6);
              tstr = tstr.toUpperCase();
              tstr = $.trim(tstr);
              
              if (tstr !== "PNG" && tstr !== "JPG" && tstr !== "PDF") {
                 $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                 $(this ).append('File format not allowed');
                 return false;
              } else {
                success = "TRUE";
                $(this).append('<div class ="loading"></div>');
                    $('.btn_upload_multi').addClass('processing');
                    $('.processing').removeClass('btn_upload_multi');
                    $('.processing').removeClass('button');
                    $('.processing').text("Upload processing ,please wait..");
              }
           } else {
                var mbsize = size.substring(6,size.indexOf('M'));
                if(mbsize > 2 ){
                  $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                  $( this ).append('Release form file should not be more than 2MB');
                  return false
                } else {
                  var tstr = type.substring(6);
                  tstr = tstr.toUpperCase();
                  tstr = $.trim(tstr);
                  
                  if (tstr !== "PNG" && tstr !== "JPG" && tstr !== "PDF") {
                     $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                     $(this ).append('File format not allowed');
                     return false;
                  } else {
                    success = "TRUE";
                    $(this).addClass('loading');
                    $(this).css({'text-align':'center'});
                    $(this ).append('File is uploading');
                  }
                }
           }
        });
    }

    if(success === "TRUE"){
          var form = document.getElementById('release_form');
          var myfd = new FormData(form);
          $.ajax({
          xhr: function () {
              var xhr = new window.XMLHttpRequest();
              xhr.upload.addEventListener("progress", function (evt) {
                  if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                    if(percentComplete === 1) {
                      // $('.loading').addClass('hide');
                    }
                  }
              }, false);
              xhr.addEventListener("progress", function (evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                  }
              }, false);
              return xhr;
          },          
          type: 'post',
          url:'<?php echo base_url("/index.php/contributor/upload_contributor_releases")?>',
          data:myfd,
          processData: false,
          contentType:false,
          success:
            function(data){
              if (data === '1'){
                 $('.message').attr("class" ,"message alert-box success");
                 $('.message').text("Release files have been uploaded successfully!"); 
                 $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    sessionStorage.setItem('onReload', 'activateUpload');
                    location.reload();
              } else {
                $('.message').attr("class" ,"message alert-box success");
                $('.message').text("Files edited successfully!"); 
                $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                console.log(data);
                
              }
              $('.message').show();
            },
          fail:
            function(data){
              console.log(data);
            }

        });

    }
    return false;
}
function submit_videos(){
    var success = "FALSE";
    if($( ".jFiler-item" ).length < 1){

        $('.message').attr("class" ,"message alert-box warning");
        $('.message').text("Make sure the number of files uploaded is not less than one"); 
        $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        $('.message').show();
    
    } else {
        $( ".jFiler-item" ).each(function( index ) {
           success = "FALSE";
           var text = $( this ).text();
           var size = text.substring(text.lastIndexOf("size:"), text.indexOf('type:'));
               size = $.trim(size);
           var type = text.substring(text.indexOf('type:'));
               type = $.trim(type);
           if (size.includes("KB")) {
              $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
              $( this ).append('File is too small');
              return false ;
           } else if (size.includes("GB")) {
              $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
              $( this ).append('File is too large');
              return false ;
           } else {
                var mbsize = size.substring(6,size.indexOf('M'));
                if(mbsize < 1 ){
                  $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                  $( this ).append('File should not be less than 1MB');
                  return false
                } else {
                  var tstr = type.substring(6);
                  tstr = tstr.toUpperCase();
                  tstr = $.trim(tstr);
                  
                  if (tstr !== "AVI" && tstr !== "MP4" && tstr !== "FLV" && tstr !== "MKV") {
                     $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                     $(this ).append('File format not allowed');
                     return false;
                  } else {
                    success = "TRUE";
                    $(this).append('<div class ="loading"></div>');
                    $('.btn_upload_multi').addClass('processing');
                    $('.processing').removeClass('btn_upload_multi');
                    $('.processing').removeClass('button');
                    $('.processing').text("Upload processing ,please wait..");
                  }
                }
           }
        });
    }

    if(success === "TRUE"){
          var form = document.getElementById('video_form');
          var myfd = new FormData(form);
          $.ajax({
          xhr: function () {
              var xhr = new window.XMLHttpRequest();
              xhr.upload.addEventListener("progress", function (evt) {
                  if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                  }
              }, false);
              xhr.addEventListener("progress", function (evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.loading').css({
                        width: percentComplete * 100 + "%"
                    });
                  }
              }, false);
              return xhr;
          },          
          
          type: 'post',
          url:'<?php echo base_url("/index.php/contributor/upload_contributor_videos")?>',
          data:myfd,
          processData: false,
          contentType:false,
          success:
            function(data){
              if (data === '1'){
                 $('.message').attr("class" ,"message alert-box success");
                 $('.message').text("Video files have been uploaded successfully!"); 
                 $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    sessionStorage.setItem('onReload', 'activateUpload');
                    location.reload();
              } else {
                $('.message').attr("class" ,"message alert-box success");
                $('.message').text("An error occured while uploading files please try again!");  
                $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                console.log(data)
                
              }
              $('.message').show();
            },
          fail:
            function(data){
              console.log(data);
            }

        });

    }
    return false;
}
function submit_video_delete(){
    $('.popup').hide();
    var success = false;
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
    
         var file_id = $(this).find("input[name='file_id[]']").val();
           $.ajax({
           type: 'post',
           url:'<?php echo base_url("/index.php/contributor/delete_video_file/")?>'+file_id,
           data:$('#edit_image_contributor').serialize(),
           success:
             function(data){
               if (data === '1') {
                  success = true; 
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box success");
                  $('.message').text("Files have been deleted"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               } else {
                  success = false;
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box warning");
                  $('.message').text("Failed to delete file"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               }
               $('#message').show();
             },
           fail:
             function(data){
               console.log(data);
             }

         });
          $(this).remove();

      }
    
    });

    return false;
  }
function delete_release(){
    $('.popup').hide();
    var success = false;
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
    
         var file_id = $(this).find("input[name='file_id[]']").val();
           $.ajax({
           type: 'post',
           url:'<?php echo base_url("/index.php/contributor/delete_release_file/")?>'+file_id,
           data:$('#edit_image_contributor').serialize(),
           success:
             function(data){
               if (data === '1') {
                  success = true; 
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box success");
                  $('.message').text("Files have been deleted"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               } else {
                  success = false;
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box warning");
                  $('.message').text("Failed to delete file"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               }
               $('#message').show();
             },
           fail:
             function(data){
               console.log(data);
             }

         });
          $(this).remove();

      }
    
    });

    return false;
  }
function submit_delete(){
    $('.popup').hide();
    var success = false;
    $('.edit_item').each(function () { 
      if ( $(this).find("input[name='file_select']").prop('checked') ){
    
         var file_id = $(this).find("input[name='file_id[]']").val();
           $.ajax({
           type: 'post',
           url:'<?php echo base_url("/index.php/contributor/delete_image_file/")?>'+file_id,
           data:$('#edit_image_contributor').serialize(),
           success:
             function(data){
               if (data === '1') {
                  success = true; 
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box success");
                  $('.message').text("Files have been deleted"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               } else {
                  success = false;
                  $('.message').hide();
                  $('.message').attr("class" ,"message alert-box warning");
                  $('.message').text("Failed to delete file"); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                  $('.message').show();
                  $("#submit_changes").show();
                  $(".submit_changes").show();   
               }
               $('#message').show();
             },
           fail:
             function(data){
               console.log(data);
             }

         });
          $(this).hide();

      }
    
    });

    return false;
  }
$('.close').click(
  function(){
   console.log('something');
});
$('.message').click(
  function(){
   $(this).hide();
});
</script>
</body>
</html>
