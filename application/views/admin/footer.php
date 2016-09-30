
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


    
<script src="<?php echo base_url('/assets/admin/js/vendor/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/admin/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/admin/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/js/app.js')?>"></script> 
<script src="<?php echo base_url('/assets/admin/js/adminfiles.js')?>"></script> 
<script src="<?php echo base_url('/assets/contributor/js/editfiles.js')?>"></script>
<script src="<?php echo base_url('/assets/admin/multiselect/multiple-select.js')?>"></script>    
<script type="text/javascript">
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