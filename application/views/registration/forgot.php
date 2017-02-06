 
      <div class="inside_body">
          <div class="registration_body">
              <div class="register_header">
                  Forgot Password
              </div>


             <form name="user_password" id="user_password" <?php echo form_open('registration/recover_password'); ?>
        
              <?php
                 if($success === TRUE){
                     echo '<div class="alert-box success">'
                           .$message.'
                           <a href="#"" class="close" id="close">&times;</a>
                           </div>';
                  } else if($success === FALSE) {
                     echo '<div class="alert-box warning">'
                           .$message.'
                           <a href="#"" class="close" id="close">&times;</a>
                           </div>';
                 }
              ?>
              
              <label>Email : <span class="required_asteric">*</span> </label>
              <input type="email" name="txt_email" placeholder="Email Address" value="<?php echo set_value('txt_email'); ?>" >

              <button class="button button_reg" type="submit">
                        Reset Password
              </button>

              </form>

             <div class="register_already">
                   Already Registered ? <a href="<?php echo base_url('/index.php/registration/login')?>"> Sign In </a>
              </div>
              <div style="clear: both"></div>

          </div>
          


      </div>
    

  