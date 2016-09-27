<div class="inside_body">
  <div class="registration_body">
      <a class="button button_fb" href="<?php echo base_url('/index.php/hauth/login/Facebook')?>">
          Join using Facebook  
      </a>
      <a class="button button_google" href="<?php echo base_url('/index.php/hauth/login/Google')?>">
          Join using Google  
      </a>
      <a class="button button_twitter" href="<?php echo base_url('/index.php/hauth/login/Twitter')?>">
          Join using Twitter 
      </a>
        <div style="width: 100%; height: 15px; border-bottom: 1px solid black; text-align: center">
              <span style="font-size: 15px; background-color: #fff; padding: 0 10px;">
                Or
              </span>
        </div>
      <div class="register_header">
          Register
      </div>

      <form name="user_registration" id="user_registration" <?php echo form_open('registration/register_user'); ?>
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
          <input type="email" name="txt_email" placeholder="Email Address" required="true" value="<?php echo set_value('txt_email'); ?>" >

          <label>Username : <span class="required_asteric">*</span> </label>
          <input type="text" name="txt_username" placeholder="Username" required="true" value="<?php echo set_value('txt_username'); ?>" >

          <label>Password : <span class="required_asteric">*</span></label>
          <input type="password" name="txt_password" placeholder="Password" required="true" value="<?php echo set_value('txt_password'); ?>" >

          <label>Confirm Password : <span class="required_asteric">*</span> </label>
          <input type="password" name="txt_cpassword" placeholder="Confirm Password" required="true" value="<?php echo set_value('txt_cpassword'); ?>" >

          <div class="registration_terms">
            By creating an account your agree with our <a href="">Terms & Conditions </a>
          </div>

          <button class="button button_reg" type="submit">
              Register
          </button>

      </form>
      <div class="register_already">
            Already Registered ? <a href="<?php echo base_url('/index.php/registration/login')?>"> Sign In </a>
      </div>
      <div style="clear: both"></div>

  </div>
</div>


