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
<script src="<?php echo base_url('/assets/member/js/vendor/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/member/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/member/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/app.js')?>"></script>
<script type="text/javascript">
  function change_user_password(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/member/change_password")?>',
    data:$('#changepassword').serialize(),
    success:
      function(data){
        if (data === '1'){
           $('#message').attr("class" ,"alert-box success");
           $('#message').append("<strong>Success!</strong> Changes has been saved successfully!"); 
           $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else if (data === '0'){
          $('#message').attr("class" ,"alert-box warning");
          $('#message').append("<strong>Validation Error!</strong> All fields are required"); 
          $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else if (data === '3'){
          $('#message').attr("class" ,"alert-box warning");
          $('#message').append("<strong>Error!</strong> Old password is incorrect, please check and try again"); 
          $('#message').append('<a href="#"" class="close" id="close">&times;</a>');
          
        } else if (data === '2'){
          $('#message').attr("class" ,"alert-box warning");
          $('#message').append("<strong>Error!</strong> Password does not match confirmation password"); 
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
</script>
<script type="text/javascript">

    $('.close').click(
      function(){
       console.log('something');
    });
    $('#message').click(
      function(){
       $(this).hide();
    });
</script>
  </body>
</html>
