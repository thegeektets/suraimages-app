<div class="inside_body">
   <div class="row">
        <div class="intro_section">
          <div class="large-6 columns pull-left user_details">
            <div class="user_avatar_wrap">
                
                <?php if(isset($user_details['0']['avatar'])) { ?>
                <img src="<?php echo $user_details['0']['avatar']?>" class="user_avatar">
                <?php } else { ?>
                 <img src="<?php echo base_url('assets/contributor/img/user_avatar.png')?>" class="user_avatar">
                 <?php } ?> 
                <div class="user_upload">
                  <form method="post" enctype ='multipart/form-data' <?php echo form_open('contributor/update_user_avatar'); ?>
                    <input type="file" name="avatarfile" id="avatar_file" class="avatar_filer">
                    <button type="submit" class="button save_avatar" id="save_avatar"> Save Photo</button>
                  </form>
                </div>
            </div>
            <div class="user_name">
                  <?php echo $user_details['0']['firstname']." ".$user_details['0']['middlename']." ".$user_details['0']['surname']; ?>
            </div>
            <div class="user_joined_date">
                  Date Joined : <?php 
                                  echo date("F j, Y", strtotime($user_session['user_meta']['0']['date_joined']));   ?>
            </div>
            <div class="user_country">
                <ul class="f32">
                  <li class="flag <?php echo strtolower($code)?>"></li>
                </ul>
            </div>
          </div>
          <div class="large-6 columns">
              <div class="user_message">
              Joining Sura Images as a contibutor;
                <ul class="message_items">
                  <li>You get 64.25% of each sale. </li>
                  <li>You have a non-exclusive contract </li>
                  <li>You retain all the copyright </li>
                  <li>You get access to your account statement </li>
                </ul>
              </div>
          </div>
          <div style="clear: both"></div>
        </div>
   </div>
   <div class="row">
        <div class="contributor_head">
            <div class="active">
                <a class="hide_intro"></a>
            </div>
        </div>          
        <div class="contributor_tab">
            <ul class="tabs contributor_tabs" data-tabs id="contributor-tabs">
              <li class="tabs-title is-active" id="account_link"><a href="#account" aria-selected="true"> Account </a></li>
              <li class="tabs-title" id="uploads_link"><a href="#uploads">Uploads (<?php echo count($contributor_images); ?>)</a></li>
              <li class="tabs-title" id="sales_link"><a href="#sales">Sales History (0)</a></li>
            </ul>
        </div>
        <div class="tabs-content" data-tabs-content="contributor-tabs">
          <div class="tabs-panel is-active contributor_panel" id="account">
              <ul class="tabs inner_contributor_tabs" data-tabs id="account-tabs">
                    <li class="tabs-title is-active"><a href="#identification" aria-selected="true"> Identification </a></li>
                    <li class="tabs-title"><a href="#contact">Contact & Payment Info </a></li>
                    <li class="tabs-title"><a href="#password">Change Password </a></li>
              </ul>
              <div class="tabs-content" data-tabs-content="account-tabs">
                  <div class="tabs-panel is-active" id="identification">
             
                    <?php 
                      if ( strlen($user_details['0']['id_file']) == 0 ) { ;?>
                      
                      <div class="tab_title">
                          Upload your identification details: <span class="required_asteric">*</span>
                      </div>
                      <div class="tab_content">
                          For purposes of getting to know the contributor we are dealing with we recommend the following identification;
                          Passport/National ID from the country you reside. The identification should be in focus and for multiple pages should be in one page.
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
                          <form class="upload_id" name="upload_id" enctype ='multipart/form-data' <?php echo form_open('contributor/update_id'); ?>
                            <div class="custom-file-upload">
                                <input class="custom_file_input" type="file" id="file" name="idfile"/>
                            </div>
                            <button class="button btn_upload_id" type="submit">Save Changes</button>
                          </form>
                      </div>
                      <?php } else { 
                        if ($user_details['0']['id_status'] == 'Uploaded' ) {
                      ?>
                          <div class="tab_title">
                              Your identification has been uploaded, awaiting approval
                          </div>
                          <div class="tab_content">
                             <img src="<?php echo base_url('/assets/contributor/img/id.png')?>" class="id_approved">
                          </div>
                           
                          <?php } else if ($user_details['0']['id_status'] == 'Approved' ) {
                          ?>
                          <div class="tab_title">
                              Your identification has been approved
                          </div>
                          <div class="tab_content">
                             <img src="<?php echo base_url('/assets/contributor/img/id_approved.png')?>" class="id_approved">
                             Start making money from your own work.
                          </div>

                      <?php } else if ($user_details['0']['id_status'] == 'Declined' ) {
                          ?>
                          <div class="tab_title">
                              Your identification has been Declined , please upload a clear copy
                          </div>
                          <div class="tab_content">
                             <img src="<?php echo base_url('/assets/contributor/img/id.png')?>" class="id_approved">
                          </div>
                          <div class="tab_content">
                          For purposes of getting to know the contributor we are dealing with we recommend the following identification;
                          Passport/National ID from the country you reside. The identification should be in focus and for multiple pages should be in one page.
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
                          <form class="upload_id" name="upload_id" enctype ='multipart/form-data' <?php echo form_open('contributor/update_id'); ?>
                            <div class="custom-file-upload">
                                <input class="custom_file_input" type="file" id="file" name="idfile"/>
                            </div>
                            <button class="button btn_upload_id" type="submit">Save Changes</button>
                          </form>
                      </div>
                      <?php } } ?>
                  </div>
                  <div class="tabs-panel" id="contact">
                      <div class="tab_title">
                          Contact Information:
                      </div>

                        <form name="user_account" id="user_account" onsubmit="return update_account();">
                          <div id="message" class="message">
                          </div>
                          <div class="tab_content">
                          This is the information Sura Images will use to contact and process your payment(s).
                                 <div class="contact_info">
                                    <div class="large-4 columns">
                                       <label>First Name : <span class="required_asteric">*</span></label>
                                       <input type="text" name="txt_fname" required="true" placeholder="Name" class="form_group" value="<?php echo $user_details['0']['firstname']; ?>" >
                                       <label>Postal Address : <span class="required_asteric">*</span></label>
                                       <input type="text" name="txt_paddress" required="true" placeholder="0000" class="form_group" value="<?php echo $user_details['0']['postaladdress']; ?>" >
                                       <label>City/Town : <span class="required_asteric">*</span></label>
                                       <input type="text" name="txt_city" required="true" placeholder="Nairobi" class="form_group" value="<?php echo $user_details['0']['city']; ?>" >
                                       <label>Telephone Number : <span class="required_asteric">*</span></label>
                                       <input type="text" name="txt_telnumber" required="true" placeholder="0000" class="form_group" value="<?php echo $user_details['0']['telnumber']; ?>" >
                                    </div>
                                    <div class="large-4 columns">
                                         <label>Middle Name: <span class="required_asteric">*</span></label>
                                         <input type="text" name="txt_mname" required="true" placeholder="Name" class="form_group" value="<?php echo $user_details['0']['middlename']; ?>" >
                                         <label>2 Postal Address (Optional)</label>
                                         <input type="text" name="txt_poaddress" placeholder="0000" class="form_group" value="<?php echo $user_details['0']['postaddress'] ?>" >
                                         <label>Country: <span class="required_asteric">*</span></label>
                                         <select  name="slc_country" required="true" class="form_group" selected >
                                             <option selected value="<?php echo $user_details['0']['country'] ?>"><?php echo $user_details['0']['country'] ?></option>
                                             <option value="Afganistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="American Samoa">American Samoa</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Anguilla">Anguilla</option>
                                             <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Aruba">Aruba</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bermuda">Bermuda</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bonaire">Bonaire</option>
                                             <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                             <option value="Brunei">Brunei</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Canary Islands">Canary Islands</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Cayman Islands">Cayman Islands</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Channel Islands">Channel Islands</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Christmas Island">Christmas Island</option>
                                             <option value="Cocos Island">Cocos Island</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo">Congo</option>
                                             <option value="Cook Islands">Cook Islands</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Cote DIvoire">Cote D'Ivoire</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Curaco">Curacao</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="East Timor">East Timor</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                                             <option value="Eritrea">Eritrea</option>
                                             <option value="Estonia">Estonia</option>
                                             <option value="Ethiopia">Ethiopia</option>
                                             <option value="Falkland Islands">Falkland Islands</option>
                                             <option value="Faroe Islands">Faroe Islands</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finland">Finland</option>
                                             <option value="France">France</option>
                                             <option value="French Guiana">French Guiana</option>
                                             <option value="French Polynesia">French Polynesia</option>
                                             <option value="French Southern Ter">French Southern Ter</option>
                                             <option value="Gabon">Gabon</option>
                                             <option value="Gambia">Gambia</option>
                                             <option value="Georgia">Georgia</option>
                                             <option value="Germany">Germany</option>
                                             <option value="Ghana">Ghana</option>
                                             <option value="Gibraltar">Gibraltar</option>
                                             <option value="Great Britain">Great Britain</option>
                                             <option value="Greece">Greece</option>
                                             <option value="Greenland">Greenland</option>
                                             <option value="Grenada">Grenada</option>
                                             <option value="Guadeloupe">Guadeloupe</option>
                                             <option value="Guam">Guam</option>
                                             <option value="Guatemala">Guatemala</option>
                                             <option value="Guinea">Guinea</option>
                                             <option value="Guyana">Guyana</option>
                                             <option value="Haiti">Haiti</option>
                                             <option value="Hawaii">Hawaii</option>
                                             <option value="Honduras">Honduras</option>
                                             <option value="Hong Kong">Hong Kong</option>
                                             <option value="Hungary">Hungary</option>
                                             <option value="Iceland">Iceland</option>
                                             <option value="India">India</option>
                                             <option value="Indonesia">Indonesia</option>
                                             <option value="Iran">Iran</option>
                                             <option value="Iraq">Iraq</option>
                                             <option value="Ireland">Ireland</option>
                                             <option value="Isle of Man">Isle of Man</option>
                                             <option value="Israel">Israel</option>
                                             <option value="Italy">Italy</option>
                                             <option value="Jamaica">Jamaica</option>
                                             <option value="Japan">Japan</option>
                                             <option value="Jordan">Jordan</option>
                                             <option value="Kazakhstan">Kazakhstan</option>
                                             <option value="Kenya">Kenya</option>
                                             <option value="Kiribati">Kiribati</option>
                                             <option value="Korea North">Korea North</option>
                                             <option value="Korea Sout">Korea South</option>
                                             <option value="Kuwait">Kuwait</option>
                                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                                             <option value="Laos">Laos</option>
                                             <option value="Latvia">Latvia</option>
                                             <option value="Lebanon">Lebanon</option>
                                             <option value="Lesotho">Lesotho</option>
                                             <option value="Liberia">Liberia</option>
                                             <option value="Libya">Libya</option>
                                             <option value="Liechtenstein">Liechtenstein</option>
                                             <option value="Lithuania">Lithuania</option>
                                             <option value="Luxembourg">Luxembourg</option>
                                             <option value="Macau">Macau</option>
                                             <option value="Macedonia">Macedonia</option>
                                             <option value="Madagascar">Madagascar</option>
                                             <option value="Malaysia">Malaysia</option>
                                             <option value="Malawi">Malawi</option>
                                             <option value="Maldives">Maldives</option>
                                             <option value="Mali">Mali</option>
                                             <option value="Malta">Malta</option>
                                             <option value="Marshall Islands">Marshall Islands</option>
                                             <option value="Martinique">Martinique</option>
                                             <option value="Mauritania">Mauritania</option>
                                             <option value="Mauritius">Mauritius</option>
                                             <option value="Mayotte">Mayotte</option>
                                             <option value="Mexico">Mexico</option>
                                             <option value="Midway Islands">Midway Islands</option>
                                             <option value="Moldova">Moldova</option>
                                             <option value="Monaco">Monaco</option>
                                             <option value="Mongolia">Mongolia</option>
                                             <option value="Montserrat">Montserrat</option>
                                             <option value="Morocco">Morocco</option>
                                             <option value="Mozambique">Mozambique</option>
                                             <option value="Myanmar">Myanmar</option>
                                             <option value="Nambia">Nambia</option>
                                             <option value="Nauru">Nauru</option>
                                             <option value="Nepal">Nepal</option>
                                             <option value="Netherland Antilles">Netherland Antilles</option>
                                             <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                             <option value="Nevis">Nevis</option>
                                             <option value="New Caledonia">New Caledonia</option>
                                             <option value="New Zealand">New Zealand</option>
                                             <option value="Nicaragua">Nicaragua</option>
                                             <option value="Niger">Niger</option>
                                             <option value="Nigeria">Nigeria</option>
                                             <option value="Niue">Niue</option>
                                             <option value="Norfolk Island">Norfolk Island</option>
                                             <option value="Norway">Norway</option>
                                             <option value="Oman">Oman</option>
                                             <option value="Pakistan">Pakistan</option>
                                             <option value="Palau Island">Palau Island</option>
                                             <option value="Palestine">Palestine</option>
                                             <option value="Panama">Panama</option>
                                             <option value="Papua New Guinea">Papua New Guinea</option>
                                             <option value="Paraguay">Paraguay</option>
                                             <option value="Peru">Peru</option>
                                             <option value="Phillipines">Philippines</option>
                                             <option value="Pitcairn Island">Pitcairn Island</option>
                                             <option value="Poland">Poland</option>
                                             <option value="Portugal">Portugal</option>
                                             <option value="Puerto Rico">Puerto Rico</option>
                                             <option value="Qatar">Qatar</option>
                                             <option value="Republic of Montenegro">Republic of Montenegro</option>
                                             <option value="Republic of Serbia">Republic of Serbia</option>
                                             <option value="Reunion">Reunion</option>
                                             <option value="Romania">Romania</option>
                                             <option value="Russia">Russia</option>
                                             <option value="Rwanda">Rwanda</option>
                                             <option value="St Barthelemy">St Barthelemy</option>
                                             <option value="St Eustatius">St Eustatius</option>
                                             <option value="St Helena">St Helena</option>
                                             <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                             <option value="St Lucia">St Lucia</option>
                                             <option value="St Maarten">St Maarten</option>
                                             <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                             <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                             <option value="Saipan">Saipan</option>
                                             <option value="Samoa">Samoa</option>
                                             <option value="Samoa American">Samoa American</option>
                                             <option value="San Marino">San Marino</option>
                                             <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                             <option value="Saudi Arabia">Saudi Arabia</option>
                                             <option value="Senegal">Senegal</option>
                                             <option value="Serbia">Serbia</option>
                                             <option value="Seychelles">Seychelles</option>
                                             <option value="Sierra Leone">Sierra Leone</option>
                                             <option value="Singapore">Singapore</option>
                                             <option value="Slovakia">Slovakia</option>
                                             <option value="Slovenia">Slovenia</option>
                                             <option value="Solomon Islands">Solomon Islands</option>
                                             <option value="Somalia">Somalia</option>
                                             <option value="South Africa">South Africa</option>
                                             <option value="Spain">Spain</option>
                                             <option value="Sri Lanka">Sri Lanka</option>
                                             <option value="Sudan">Sudan</option>
                                             <option value="Suriname">Suriname</option>
                                             <option value="Swaziland">Swaziland</option>
                                             <option value="Sweden">Sweden</option>
                                             <option value="Switzerland">Switzerland</option>
                                             <option value="Syria">Syria</option>
                                             <option value="Tahiti">Tahiti</option>
                                             <option value="Taiwan">Taiwan</option>
                                             <option value="Tajikistan">Tajikistan</option>
                                             <option value="Tanzania">Tanzania</option>
                                             <option value="Thailand">Thailand</option>
                                             <option value="Togo">Togo</option>
                                             <option value="Tokelau">Tokelau</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                             <option value="Tunisia">Tunisia</option>
                                             <option value="Turkey">Turkey</option>
                                             <option value="Turkmenistan">Turkmenistan</option>
                                             <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                             <option value="Tuvalu">Tuvalu</option>
                                             <option value="Uganda">Uganda</option>
                                             <option value="Ukraine">Ukraine</option>
                                             <option value="United Arab Erimates">United Arab Emirates</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="United States of America">United States of America</option>
                                             <option value="Uraguay">Uruguay</option>
                                             <option value="Uzbekistan">Uzbekistan</option>
                                             <option value="Vanuatu">Vanuatu</option>
                                             <option value="Vatican City State">Vatican City State</option>
                                             <option value="Venezuela">Venezuela</option>
                                             <option value="Vietnam">Vietnam</option>
                                             <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                             <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                             <option value="Wake Island">Wake Island</option>
                                             <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                             <option value="Yemen">Yemen</option>
                                             <option value="Zaire">Zaire</option>
                                             <option value="Zambia">Zambia</option>
                                             <option value="Zimbabwe">Zimbabwe</option>
                                         </select>
                                         <label>Email: <span class="required_asteric">*</span></label>
                                         <input type="text" name="txt_email" required="true"  placeholder="gngechu@gmail.com" class="form_group" value="<?php echo $user_session['user_meta']['0']['email'] ?>" >
                                    </div>
                                    <div class="large-4 columns">
                                         <label>Surname:</label>
                                         <input type="text" name="txt_sname" placeholder="Name" class="form_group" value="<?php echo $user_details['0']['surname'] ?>" >
                                         <label>Zip Code:</label>
                                         <input type="text" name="txt_zcode" placeholder="0000" class="form_group" value="<?php echo $user_details['0']['zipcode'] ?>" >
                                    </div>
                                    <div style="clear: both"></div>
                                 </div>
                            </div>
                            <div class="tab_title">
                                Choose your preferred mode of payment:
                            </div>
                            <div class="tab_content">
                     
                            <div class="large-4 columns">
                                 <select  class="form_group" id="slc_payment" name="slc_payment">
                                     <option value="<?php echo $payment_details['0']['payment_mode'] ?>" selected>
                                        <?php echo $payment_details['0']['payment_mode'] ?>
                                     </option>
                                     <option value="Bank Payment">Bank Payment</option>
                                     <option value="Mobile Payment">Mobile Payment</option>
                                     <option value="Email Payment">Email Payment</option>
                                 </select>
                             </div>
                             <div class="large-4 columns payment_type" id="bank">
                                 <div class="tab_title">
                                     Bank Payment:
                                 </div>
                                 <label>Bank Name: <span class="required_asteric">*</span></label>
                                      <input type="text" name="bank_name" placeholder="Bank Name" class="form_group" value="<?php echo $payment_details['0']['bank_name'] ?>" >
                                 <label>Account Name: <span class="required_asteric">*</span></label>
                                      <input type="text" name="account_name" placeholder="Account Name" class="form_group" value="<?php echo $payment_details['0']['account_name'] ?>" >
                                  <label>Account Number: <span class="required_asteric">*</span></label>
                                      <input type="text" name="account_number" placeholder="Account Number" class="form_group" value="<?php echo $payment_details['0']['account_number'] ?>" >
                                  <label>Branch Name: <span class="required_asteric">*</span></label>
                                      <input type="text" name="branch_name" placeholder="Branch Name" class="form_group" value="<?php echo $payment_details['0']['branch_name'] ?>" >
                              </div>
                              <div class="large-4 columns pull-left">
                                  <div class="payment_type" id=mobile>
                                    <div class="tab_title">
                                     Mobile Payment:
                                    </div>
                                    <label>Mobile Number: <span class="required_asteric">*</span></label>
                                         <input type="text" name="mobile_number" placeholder="Mobile Number" class="form_group" value="<?php echo $payment_details['0']['mobile_number'] ?>" >
                                  </div>
                                  <div class="payment_type" id="email">
                                    <div class="tab_title">
                                     Email Payment:
                                     </div>
                                     <label>Email Address: <span class="required_asteric">*</span></label>
                                         <input type="text" name="email_address" placeholder="Email Address" class="form_group" value="<?php echo $payment_details['0']['email_address'] ?>" >
                                  </div>
                              </div>
                          <button class="button btn_upload_id" type="submit">Save Changes</button>
                          <div style="clear: both"></div>
                          <input type="checkbox" name="email_sub" checked="true">
                            Receive a monthly email notification for sales statement
                          <div style="clear: both"></div>
                          </form>
                      </div>
                  </div>
                  <div class="tabs-panel" id="password">
                      <div class="tab_title">
                          Change Password
                      </div>
                      <div class="tab_content">
                        <form class="change_password" id="changepassword" name="changepassword" onsubmit="return change_user_password()">
                        <div id="message" class="message">
                        </div>
                           <div class="large-6 columns pull-left">
                            <label>Old Password <span class="required_asteric">*</span></label>
                                <input type="password" name="txt_opassword" placeholder="Old Password" class="form_group" value="<?php echo set_value('txt_opassword'); ?>" >
                            <label>New Password <span class="required_asteric">*</span></label>
                                <input type="password" name="txt_npassword" placeholder="New Password" class="form_group" value="<?php echo set_value('txt_npassword'); ?>" >
                            <label>Confirm Password <span class="required_asteric">*</span></label>
                                <input type="password" name="txt_cpassword" placeholder="Confirm Password" class="form_group" value="<?php echo set_value('txt_cpassword'); ?>" >
                           </div>
                           <button class="button btn_upload_id" type="submit">Save Changes</button>
                      </div>
                      <div style="clear: both"></div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="tabs-panel contributor_panel" id="uploads">
                  <ul class="tabs inner_contributor_tabs" data-tabs id="upload-tabs">
                        <li class="tabs-title is-active"><a href="#images" aria-selected="true"> My Images (<?php echo count($contributor_images); ?>) </a></li>
                        <li class="tabs-title"><a href="#videos">My Videos (0) </a></li>
                        <li class="tabs-title"><a href="#releases"> Releases (0) </a></li>
                  </ul>
                    <div class="tabs-content" data-tabs-content="upload-tabs">
                    <?php if($user_details[0]['upload_status'] == FALSE ) { ?>
                       <?php if($user_details[0]['edit_status'] == FALSE ) { ?>
                       <div class="tabs-panel is-active" id="images">
                          <div class="alert_message">
                              <img src="<?php echo base_url('/assets/contributor/img/alert.png')?>" class="alert_pic">
                              Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is
                              worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
                          </div>
                          <form id="trial_form" method="post" enctype ='multipart/form-data' onsubmit="return submit_trial_images();">
                          <div class="row">
                              <div class="large-10 columns pull-right">
                                 Shows us what you are good at by submitting atleast 5 of your best images in JPEG format. Make sure the images are
                                 of high quality with a minimum file size of 8MB each.
                               </div>
                               <div class="large-2 columns pull-left">   
                                      <input type="file" name="trialfiles[]"  class="impress_image_filer" multiple="multiple">
                               </div>
                              
                           </div>
                           <hr/>
                            <div class="tab_content">
                                  <div class="message pull-left">
                                  </div>
                                  <button class="button btn_upload_multi" type="submit"> Continue </button>
                            </div>
                            </form>
                            
                            <div style="clear: both"></div>        
                       </div>
                        <?php } else {
                         require_once('edit_image_files.php');
                        }?>
                        <?php } else {
                          require_once('image_file_status.php');
                        } ?>
                        <div class="tabs-panel" id="videos">
                              <div class="alert_message">
                              <img src="<?php echo base_url('/assets/contributor/img/alert.png')?>" class="alert_pic">
                              Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is
                              worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
                          </div>

                          <div class="row">
                          <div class="large-10 columns pull-right">
                            Upload HD 1080p videos with each file not exceeding 3G in size and maximum of 10 images per upload.
                           </div>
                           
                           <div class="large-2 columns pull-left">   
                             <form action="/assets/contributor/filer/php/upload.php" method="post" enctype="multipart/form-data">
                                  <input type="file" name="files[]"  class="image_filer" multiple="multiple">
                                 
                             </form>
                           </div>
                           </div>
                              <div style="clear: both"></div>
                          
                        </div>
                        <div class="tabs-panel" id="releases">
                          <div class="alert_message">
                              <img src="<?php echo base_url('/assets/contributor/img/alert.png')?>" class="alert_pic">
                              Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is
                              worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
                          </div>

                          <div class="row">
                              <div class="large-10 columns pull-right">
                                 Upload all your releases in either PDF, JPEG, PNG or TIFF format. Each release attached should be less than 2MB each.
                               </div>
                               <div class="large-2 columns pull-left">   
                                 <form action="contributor/filer/php/upload.php" method="post" enctype="multipart/form-data">
                                      <input type="file" name="files[]"  class="release_filer" multiple="multiple">
                                 </form>
                               </div>
                           </div>
                           <div style="clear: both"></div>
                        </div>
                  </div>
                 
                
          </div>
          <div class="tabs-panel contributor_panel" id="sales">
                <div class="tab_header">
                    <div class="row collapse">
                        <div class="large-5 columns medium-5 columns pull-left">
                            <form class="reports_search">
                              <select class="inside_search_slc" id="report_slc">
                                  <option value=""> Report </option>
                                  <option value="sales">Sales</option>
                                  <option value="statement">Sales Statement</option>
                                  <option value="license">License Type</option>
                                  <option value="files">My Files</option>
                              </select>
                                
                            </form>
                        </div>
                        <div class="large-4 columns medium-4 columns pull-right">
                             <span class="search_pagination"> 
                               <select class="pagination_slc">
                                    <option value="">Files Per Page</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                </select>
                               Page <input type="number" name="page_number" placeholder="1" class="page_number"> of 120 
                                  <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                  <a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                             </span>
                        </div>
                    </div>
                    <div class="row collapse report_filters">
                        <div class="large-12 columns">
                            <div class="sales_filter">
                                <div class="row">
                                <form class="reports_search">
                                  <select class="inside_search_slc">
                                      <option value=""> Sales </option>
                                      <option value=""> Per Image ID </option>
                                      <option value="">Per Date </option>

                                  </select>
                                    <button type="submit" class="button btn_search">
                                      Display
                                  </button>
                                </form>
                                </div>
                            </div>
                            <div class="statement_filter">
                                <div class="row">
                                
                                <form class="reports_search">
                                  <select class="inside_search_slc">
                                      <option value=""> Sales Statement </option>
                                        
                                  </select>
                                    <button type="submit" class="button btn_search">
                                      Display
                                  </button>
                                </form>
                                </div>
                            </div>
                            <div class="license_filter">
                                <div class="row">
                                
                                <form class="reports_search">
                                  <select class="inside_search_slc">
                                      <option value=""> License Type </option>
                                      <option value=""> Royalty Free </option>
                                      <option value=""> Right Managed </option>
                                      <option value=""> RF - Exclusive </option>
                                      <option value=""> RM - Exclusive </option>
                                        
                                  </select>
                                    <button type="submit" class="button btn_search">
                                      Display
                                  </button>
                                </form>
                                </div>
                            </div>
                            <div class="files_filter"> 
                              <div class="row">
                                
                                <form class="reports_search">
                                  <select class="inside_search_slc">
                                      <option value="">My Files </option>
                                      <option value=""> My Images </option>
                                      <option value=""> My Videos</option>
                                      <option value=""> My Illustrations </option>
                                     
                                        
                                  </select>
                                    <button type="submit" class="button btn_search">
                                      Display
                                  </button>
                                </form>
                              </div>
                            </div>
                      </div>
                    </div>
                </div>
                <div class="large-12 columns">
                     <div class="report_header">
                        <div class="row">

                        <div class="large-1 column">
                            File
                        </div>
                        <div class="large-1 column">
                            ID
                        </div>
                        <div class="large-5 column">
                            Title
                        </div>
                        <div class="large-2 column">
                            No. of Sales
                        </div>
                        <div class="large-2 column">
                            Date Purchased
                        </div>
                        <div class="large-1 column">
                            Sales
                        </div>
                        </div>
                     </div> 
                     <div class="report_content">
                          <div class="report_item">
                            <div class="row">
                              <div class="large-1 column report_col">
                                  <img src="<?php echo base_url('/assets/contributor/img/search_image.png')?>">
                              </div>
                              <div class="large-1 column report_col">
                                  0012354
                              </div>
                              <div class="large-5 column report_col">
                                  Equatorial Forest
                              </div>
                              <div class="large-2 column report_col">
                                  (2)
                              </div>
                              <div class="large-2 column report_col">
                                   28th Dec, 2015
                              </div>
                              <div class="large-1 column report_col">
                                  $15
                              </div>
                             </div>
                          </div>
                          <div class="report_item">
                            <div class="row">
                              <div class="large-1 column report_col">
                                  <img src="<?php echo base_url('/assets/contributor/img/search_image.png')?>">
                              </div>
                              <div class="large-1 column report_col">
                                  0012354
                              </div>
                              <div class="large-5 column report_col">
                                  Equatorial Forest
                              </div>
                              <div class="large-2 column report_col">
                                  (2)
                              </div>
                              <div class="large-2 column report_col">
                                   28th Dec, 2015
                              </div>
                              <div class="large-1 column report_col">
                                  $15
                              </div>
                             </div>
                          </div>
                          <div class="report_item">
                            <div class="row">
                              <div class="large-1 column report_col">
                                  <img src="<?php echo base_url('/assets/contributor/img/search_image.png')?>">
                              </div>
                              <div class="large-1 column report_col">
                                  0012354
                              </div>
                              <div class="large-5 column report_col">
                                  Equatorial Forest
                              </div>
                              <div class="large-2 column report_col">
                                  (4)
                              </div>
                              <div class="large-2 column report_col">
                                   28th Dec, 2015
                              </div>
                              <div class="large-1 column report_col">
                                  $15
                              </div>
                             </div>
                          </div>
                          <div class="report_item">
                            <div class="row">
                              <div class="large-1 column report_col">
                                  <img src="<?php echo base_url('/assets/contributor/img/search_image.png')?>">
                              </div>
                              <div class="large-1 column report_col">
                                  0012354
                              </div>
                              <div class="large-5 column report_col">
                                  Equatorial Forest
                              </div>
                              <div class="large-2 column report_col">
                                  (2)
                              </div>
                              <div class="large-2 column report_col">
                                   28th Dec, 2015
                              </div>
                              <div class="large-1 column report_col">
                                  $15
                              </div>
                             </div>
                          </div>

                          <div class="report_footer">
                            <div class="row">
                       
                              <div class="pull-right">
                                  Total Sales : $90
                              </div>
                             </div>
                          </div>


                     </div>           

                </div>

                <div style="clear: both"></div>
          </div>
        </div>
   </div>
</div>
