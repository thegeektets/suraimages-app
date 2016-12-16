
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


    
<script src="<?php echo base_url('/assets/admin/js/vendor/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/admin/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/admin/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/app.js')?>"></script> 
<script src="<?php echo base_url('/assets/admin/js/adminfiles.js')?>"></script> 
<script src="<?php echo base_url('/assets/contributor/js/unique.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/editfiles.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/multiselect/multiple-select.js')?>"></script> 
<?php if (($user_session['single_image_file']) === TRUE || ($user_session['activate_upload']) === TRUE) {?>
  <script type="text/javascript">
        $("#account").removeClass('is-active');
        $("#account_link").removeClass('is-active');
        $("#contributors").addClass('is-active');
        $("#uploads_link").addClass('is-active');
        $("#contributor_link").addClass('is-active');
        $("#nwcontributors").removeClass('is-active');
        $("#nwcontributors_link").removeClass('is-active');
  </script>
<?php } 
  
?>   
<script type="text/javascript">
    function submit_other_release_forms(){
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
                    if(mbsize > 10 ){
                      $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                      $( this ).append('Release form file should not be more than 10MB');
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
              var form = document.getElementById('other_release');
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
              url:'<?php echo base_url("/index.php/admin/upload_other_release")?>',
              data:myfd,
              processData: false,
              contentType:false,
              success:
                function(data){
                  if (data === '1'){
                     $('.message').attr("class" ,"message alert-box success");
                     $('.message').text("File have been uploaded successfully!"); 
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
    function submit_property_release_forms(){
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
                    if(mbsize > 10 ){
                      $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                      $( this ).append('Release form file should not be more than 10MB');
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
              var form = document.getElementById('property_release');
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
              url:'<?php echo base_url("/index.php/admin/upload_property_release")?>',
              data:myfd,
              processData: false,
              contentType:false,
              success:
                function(data){
                  if (data === '1'){
                     $('.message').attr("class" ,"message alert-box success");
                     $('.message').text("File have been uploaded successfully!"); 
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
    function submit_model_release_forms(){
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
                    if(mbsize > 10 ){
                      $(this).css({'background':'#f8991c', 'color':'#fff' ,'text-align':'center'});
                      $( this ).append('Release form file should not be more than 10MB');
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
              var form = document.getElementById('model_release');
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
              url:'<?php echo base_url("/index.php/admin/upload_model_release")?>',
              data:myfd,
              processData: false,
              contentType:false,
              success:
                function(data){
                  if (data === '1'){
                     $('.message').attr("class" ,"message alert-box success");
                     $('.message').text("File have been uploaded successfully!"); 
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
    function update_rr_pricing() {
         $.ajax({
          type: 'post',
          url:'<?php echo base_url("/index.php/admin/update_rr_pricing")?>',
          data:$('#rr_pricing').serialize(),
          success:
            function(data){
              if (data === '1') {
                  $('.message').attr("class" ,"message alert-box success");
                  $('.message').text("Updated Rights Ready Pricing "); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
              
              } else {
                  $('.message').attr("class" ,"message alert-box warning");
                  $('.message').text(""+data); 
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
    function update_rm_pricing() {
         $.ajax({
          type: 'post',
          url:'<?php echo base_url("/index.php/admin/update_rm_pricing")?>',
          data:$('#rm_managed').serialize(),
          success:
            function(data){
              if (data === '1') {
                  $('.message').attr("class" ,"message alert-box success");
                  $('.message').text("Updated Rights Managed Pricing "); 
                  $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
              
              } else {
                  $('.message').attr("class" ,"message alert-box warning");
                  $('.message').text(""+data); 
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
    function editimagecontributor(){
     $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/contributor/edit_contributor_images")?>',
      data:$('#edit_image_contributor').serialize(),
      success:
        function(data){
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
            
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').text(""+data); 
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
    function editvideoadmin(){
     $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/edit_uploaded_videos")?>',
      data:$('#edit_video_contributor').serialize(),
      success:
        function(data){
          console.log(data); 
          if (data === '1'){
             $('.message').attr("class" ,"message alert-box success");
             $('.message').text("Files have been edited successfully!"); 
             $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                sessionStorage.setItem('onReload', 'activateContributor');
                window.location.href = "<?php echo base_url('index.php/admin');?>";
                
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').text(""+data); 
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
    function editimageadmin(){
     $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/edit_uploaded_files")?>',
      data:$('#edit_image_contributor').serialize(),
      success:
        function(data){
          console.log(data); 
          if (data === '1'){
             $('.message').attr("class" ,"message alert-box success");
             $('.message').append("<strong>Success!</strong> Files have been edited successfully!"); 
             $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                sessionStorage.setItem('onReload', 'activateContributor');
                window.location.href = "<?php echo base_url('index.php/admin');?>";
                
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append(""+data); 
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
    function change_user_password(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/change_password")?>',
      data:$('#changepassword').serialize(),
      success:
        function(data){
          if (data === '1'){
             $('.message').attr("class" ,"message alert-box success");
             $('.message').append("<strong>Success!</strong> Changes has been saved successfully!"); 
             $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '0'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Validation Error!</strong> All fields are required"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '3'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Error!</strong> Old password is incorrect, please check and try again"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '2'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Error!</strong> Password does not match confirmation password"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("Internal server error, please try again"); 
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
</script>
<script type="text/javascript">
    function update_rfpricing(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/update_rf_pricing")?>',
      data:$('#rf_pricing').serialize(),
      success:
        function(data){
          if (data === '1'){
             $('.message').attr("class" ,"message alert-box success");
             $('.message').append("<strong>Success!</strong> RF Pricing has been updated successfully!"); 
             $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '0'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Validation Error!</strong> All fields are required"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '2'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Error!</strong> Min Values should not be greater than Max values "); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("Internal server error, please try again"); 
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
</script>
<script type="text/javascript">
    function update_expricing(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/update_ex_pricing")?>',
      data:$('#ex_pricing').serialize(),
      success:
        function(data){
          if (data === '1'){
             $('.message').attr("class" ,"message alert-box success");
             $('.message').append("<strong>Success!</strong> Exclusive Pricing has been updated successfully!"); 
             $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else if (data === '0'){
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("<strong>Validation Error!</strong> All fields are required"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            
          } else {
            $('.message').attr("class" ,"message alert-box warning");
            $('.message').append("Internal server error, please try again"); 
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
</script>

<script type="text/javascript">

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