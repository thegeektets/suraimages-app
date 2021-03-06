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
<script src="<?php echo base_url('/assets/member/js/vendor/jquery.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/pagination.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/member/filer/js/jquery.filer.min.js?v=1.0.5')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/member/filer/js/custom.js?v=1.0.5')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/what-input.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/foundation.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/fontAwesome.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/vendor/slick.min.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/app.js')?>"></script>
<script src="<?php echo base_url('/assets/member/js/paginations.js')?>"></script>
<script type="text/javascript">
  function remove_cart_item (item_id,item_cost,order_id) {
    console.log(""+item_cost);
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/main/remove_cart_item/")?>'+item_id+'/'+item_cost+'/'+order_id,
      success:
        function(data){
          if(data == 1){
            $('.message').attr("class" ,"message alert-box success");
            $('.message').text("cart item removed"); 
            $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
            $('.message').show();
            $('#report_item'+item_id).hide();
            $('.order_cost').text(($('.order_cost').text()-item_cost).toFixed(2));
            setTimeout($('.message').hide(), 3000);
          }
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
    $('#checkout-label').click(function(){
      console.log('checkout');
      window.location.href = '<?php echo base_url() ?>'+'/index.php/member/pay_pesapal';
    });

</script>
  </body>
</html>
