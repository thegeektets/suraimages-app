
<div class="inside_body">
    <div class="registration_body">
            
        <div class="register_header">
            Provide Email Address
        </div>

        <form name="user_login" id="user_login" <?php echo form_open('hauth/twitter_user'); ?>
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

        <button class="button button_reg" type="submit">
            Submit
        </button>

        </form>
        
        <div style="clear: both"></div>

    </div>
    


</div>
    

  