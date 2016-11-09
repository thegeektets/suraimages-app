     <div style="clear: both"></div>
     <footer class="footer-bar">
      <div class="row">  
          <div class="large-5 columns medium-7 columns">
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
          <div class="large-4 columns medium-3 columns">
              <span class="copyright"> Copyright &copy; 2016 SuraImages </span>

          </div>
          <div class="large-3 columns medium-2 columns">
            <div class="footer-social_media">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            </div>
          </div>


      </div>
    </footer>

    <script src="<?php echo base_url('/assets/non_member/js/vendor/jquery.js')?>"></script>
    <script src="<?php echo base_url('/assets/non_member/js/jquery.mosaicflow.js')?>"></script>    
    <script src="<?php echo base_url('/assets/non_member/js/vendor/what-input.js')?>"></script>
    <script src="<?php echo base_url('/assets/non_member/js/vendor/foundation.js')?>"></script>
    <script src="<?php echo base_url('/assets/non_member/js/vendor/slick.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/contributor/multiselect/multiple-select.js')?>"></script>
    <script src="<?php echo base_url('/assets/non_member/js/app.js')?>"></script>
    <script src="<?php echo base_url('/assets/non_member/js/mainfile.js')?>"></script>
    <script type="text/javascript">
      $('.add_to_cart_form').submit( function () {
        
        if(($.trim($(this).find('.file_price').text())) !== '00') {
            $.ajax({
            type: 'post',
            url:'<?php echo base_url("/index.php/Main/image_add_to_cart")?>',
            data:$(this).serialize(),
            success:
              function(data) {
                if(data == '3' ) {

                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box warning");
                    $('.message').text("login to your member account to add to cart"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout(hidemessage, 3000);
                    document.location.href = "<?php echo base_url('index.php/registration/login'); ?>";
                } else if(data == '2') {
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box warning");
                    $('.message').text("Cannot shop with the admin account please login to your member account"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout(hidemessage, 3000);
                      
                } else {
                    var st = data.indexOf("-");
                    var cart_count = data.substring(0,st);
                    $('.shopping_cart').text('( '+cart_count+' )');
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box success");
                    $('.message').text("Image added to cart"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout(hidemessage, 3000);
                      
                }
                
                console.log(data);
              },
            fail:
              function(data){
                console.log(data);
              }
          });

          
        } else {
          $('.message').hide();
          $('.message').attr("class" ,"message alert-box warning");
          $('.message').text("Select a file size to Add to Cart"); 
          $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
          $('.message').show();
          setTimeout(hidemessage, 3000);
          
        }

        return false ;
      });
  
    </script>
    
  </body>
</html>
