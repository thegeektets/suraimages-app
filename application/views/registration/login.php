
<div class="inside_body">
    <div class="registration_body">
        <a class="button button_fb" href="<?php echo base_url('/index.php/hauth/login/Facebook')?>">
            Sign In using Facebook  
        </a>
        <a class="button button_google" href="<?php echo base_url('/index.php/hauth/login/Google')?>">
            Sign In using Google  
        </a>
        <a class="button button_twitter" href="<?php echo base_url('/index.php/hauth/login/Twitter')?>">
            Sign In using Twitter 
        </a>
            <div style="width: 100%; height: 15px; border-bottom: 1px solid black; text-align: center">
                  <span style="font-size: 15px; background-color: #fff; padding: 0 10px;">
                    Or
                  </span>
            </div>
        <div class="register_header">
            Sign In
        </div>

        <form name="user_login" id="user_login" <?php echo form_open('registration/login_user'); ?>
        <div id="message">
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
        </div>
        <label>Email : <span class="required_asteric">*</span> </label>
        <input type="email" name="txt_email" placeholder="Email Address">

        <label>Password : <span class="required_asteric">*</span> </label>
        <input type="password" name="txt_password" placeholder="Password"> 

        <div class="login_forgot">
           <a href="<?php echo base_url('/index.php/registration/forgot_password')?>"> Forgot Password ? </a>
        </div>

        <button class="button button_reg" type="submit">
            Sign In
        </button>

        </form>

        <div class="register_already">
              Don’t have an account ? <a href="<?php echo base_url('/index.php/registration')?>"> Register </a>
        </div>
        <div style="clear: both"></div>

    </div>
    


</div>
    

  