<footer class="inside-footer-bar">
 <div class="row collapse">
  <div class="large-6 columns medium-7 columns">
    <div class="footer-menu">
      <ul class="menu">
          <li class="menu-text menu-divider"> <a href="#"> Home </a></li>
          <li class="menu-text menu-divider"><a href="#"> About Us </a></li>
          <li class="menu-text menu-divider"><a href="#"> Terms & Conditions </a></li>
          <li class="menu-text menu-divider"><a href="#"> Contact Us </a></li>
          <li class="menu-text menu-divider"><a href="#"> Resources </a></li>
          <li class="menu-text menu-divider"><a href="#"> FAQs </a></li>
          <li class="menu-text"><a href="#"> Blog </a></li>
      </ul>
    </div>
  </div>
  <div class="large-6 columns medium-3 columns">
      <span class="copyright"> Copyright &copy; 2016 SuraImages </span>
  </div>
</div>
</footer>
<script src="<?php echo base_url('/assets/contributor/js/vendor/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/contributor/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/contributor/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/app.js')?>"></script> 
<script src="<?php echo base_url('/assets/contributor/js/unique.js')?>"></script>
<script src="<?php echo base_url('/assets/contributor/js/editfiles.js')?>"></script>    
<script src="<?php echo base_url('/assets/contributor/multiselect/multiple-select.js')?>"></script>

<script type="text/javascript">
  function editimagecontributor(){
   $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/contributor/edit_contributor_images")?>',
    data:$('#edit_image_contributor').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('.message').attr("class" ,"message alert-box success");
           $('.message').append("<strong>Success!</strong> Images have been uploaded successfully!"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
              sessionStorage.setItem('onReload', 'activateUpload');
              location.reload();
              
        } else if (data === '0') {
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').append("Failed to submit, make sure all required fields are filled"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
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
           $('.message').append("Success model added"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').append("Failed to add model , thats all we know"); 
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
           $('.message').append("Model found"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else if (data === '0'){
          $('.message').addClass("alert-box warning");
          $('.message').append("Model email not found , add new"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').append("Internal server error , thats all we know"); 
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
           $('.message').append("Model Replaced"); 
           $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else if (data === '0'){
          $('.message').addClass("alert-box warning");
          $('.message').append("Model replacement failed"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
        } else {
          $('.message').addClass("alert-box warning");
          $('.message').append("Internal server error , thats all we know"); 
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
function update_account(){
  $.ajax({
  type: 'post',
  url:'<?php echo base_url("/index.php/contributor/update_account")?>',
  data:$('#user_account').serialize(),
  success:
    function(data){
      if (data === '1') {
         $('#message').attr("class" ,"alert-box success");
         $('#message').append("<strong>Success!</strong> Changes has been saved successfully!"); 
         $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else if (data === '0') {
        $('#message').attr("class" ,"alert-box warning");
        $('#message').append("<strong>Validation Error!</strong> All fields are required"); 
        $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
        
      } else {
        $('#message').attr("class" ,"alert-box warning");
        $('#message').append("Internal server error, please try again"); 
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
        $('.message').append("<strong> warning!</strong> make sure the number of files uploaded is not less than one"); 
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
                if(mbsize < 2 ){
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
                  }
                }
           }

        });
    }

    if(success === "TRUE"){
          var form = document.getElementById('trial_form');
          var myfd = new FormData(form);
          $.ajax({
          type: 'post',
          url:'<?php echo base_url("/index.php/contributor/upload_contributor_images")?>',
          data:myfd,
          processData: false,
          contentType:false,
          success:
            function(data){
              if (data === '1'){
                 $('.message').attr("class" ,"message alert-box success");
                 $('.message').append("<strong>Success!</strong> Images have been uploaded successfully!"); 
                 $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    sessionStorage.setItem('onReload', 'activateUpload');
                    location.reload();
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

    }
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
