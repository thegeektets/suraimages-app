  <div class="inside_body">
      <div class="row">
          <div class="intro_section">
            <div class="large-6 columns pull-left user_details">
                <div class="user_avatar_wrap">
                  <div class="user_avatar_wrap">

                    <?php if(isset($user_details['0']['avatar'])) { ?>
                    <img src="<?php echo $user_details['0']['avatar']?>" class="user_avatar">
                    <?php } else { ?>
                     <img src="<?php echo base_url('assets/member/img/user_avatar.png')?>" class="user_avatar">
                     <?php } ?> 
                    <div class="user_upload">
                      <form method="post" enctype ='multipart/form-data' <?php echo form_open('member/update_user_avatar'); ?>
                        <input type="file" name="avatarfile" id="avatar_file" class="avatar_filer">
                        <button type="submit" class="button save_avatar" id="save_avatar"> Save Photo</button>
                      </form>
                    </div>
                  </div>
                  
                </div>
                <div class="user_name">
                     <?php echo $user_details['0']['firstname']." ".$user_details['0']['middlename']." ".$user_details['0']['surname']; ?>
                </div>
                <div class="user_joined_date">
                    Date Joined : <?php
                                    echo date("F j, Y", strtotime($user_session['user_meta']['0']['date_joined']));  
                                    ?>
                </div>
                <div class="user_country">
                  <ul class="f32">
                    <li class="flag <?php echo strtolower($code)?>"></li>
                  </ul>
                </div>
            </div>
            <div class="large-6 columns">
                <div class="user_message">
                  <ul class="message_items">
                      <li></li>
                  </ul>
                </div>
            </div>
            <div style="clear: both"></div>
          </div>
       </div>

       <div class="row">
            <div class="member_head">
                <div class="active">
                    <a class="hide_intro"></a>
                </div>
            </div>
            <ul class="tabs member_tabs" data-tabs id="member-tabs">
                  <li class="tabs-title is-active"><a href="#account" aria-selected="true"> Account </a></li>
                  <li class="tabs-title"><a href="#basket">Shopping Basket (0)</a></li>
                  <li class="tabs-title"><a href="#history">Purchase History (0)</a></li>
                  
            </ul>

            <div class="tabs-content" data-tabs-content="member-tabs">
              <div class="tabs-panel is-active member_panel" id="account">

                    <ul class="tabs inner_member_tabs" data-tabs id="account-tabs">
                          <li class="tabs-title is-active"><a href="#edit_account">Edit Account </a></li>
                          <li class="tabs-title"><a href="#password">Change Password </a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="account-tabs">
                          <div class="tabs-panel is-active" id="edit_account">
                                <div class="tab_title">
                                    Account Information:
                                </div>
                                <form name="user_account" id="user_account" <?php echo form_open('member/update_account'); ?>
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
                                  <div class="tab_content">
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
                                    </div>
                                    
                                </div>
                                <button class="button btn_upload_id" type="submit">Save Changes</button>   
                                <div style="clear: both"></div>
                                </form>
                          </div>
                          <div class="tabs-panel" id="password">
                                 <div class="tab_title">
                                    Change Password
                                </div>
                                <div class="tab_content">
                                  <div id="message">
                                  </div>
                                  <form class="change_password" id="changepassword" name="changepassword" onsubmit="return change_user_password()">
                                     <div class="large-6 columns pull-left">
                                      <label>Old Password <span class="required_asteric">*</span></label>
                                          <input type="password" name="txt_opassword" placeholder="Old Password" class="form_group" value="<?php echo set_value('txt_opassword'); ?>" >
                                      <label>New Password <span class="required_asteric">*</span></label>
                                          <input type="password" name="txt_npassword" placeholder="New Password" class="form_group" value="<?php echo set_value('txt_npassword'); ?>" >
                                      <label>Confirm Password <span class="required_asteric">*</span></label>
                                          <input type="password" name="txt_cpassword" placeholder="Confirm Password" class="form_group" value="<?php echo set_value('txt_cpassword'); ?>" >
                                      <button class="button btn_upload_id" type="submit">Save Changes</button>
                                     </div>
                                  </form>
                                  <div style="clear: both"></div>
                                </div>
                          </div>
                    </div>
              </div>
            <div class="tabs-panel member_panel" id="basket">
                    <ul class="tabs inner_member_tabs" data-tabs id="basket-tabs">
                          <li class="tabs-title is-active"><a href="#shopping" aria-selected="true"> Shopping Basket </a></li>
                          
                          <li class="tabs-title"><a href="#checkout"> Checkout </a></li>
                          
                    </ul>

                    <div class="tabs-content" data-tabs-content="basket-tabs">
                        
                          <div class="tabs-panel is-active" id="shopping">
                                      <div class="report_header">
                                         <div class="row">

                                         <div class="large-2 column">
                                             File
                                         </div>
                                         <div class="large-1 column">
                                             ID
                                         </div>
                                         <div class="large-3 column">
                                             Title
                                         </div>
                                         <div class="large-2 column">
                                             License Type
                                         </div>
                                         <div class="large-2 column">
                                             Calculate Price
                                         </div>
                                         <div class="large-2 column">
                                             Price
                                         </div>
                                         </div>
                                      </div> 
                                      <div class="report_content">
                                           <div class="report_item">
                                             <div class="row">
                                               <div class="large-2 column report_col">
                                                   <input type="checkbox" name="">
                                                   <img src="<?php echo base_url('/assets/member/img/search_image.png')?>" class="search_image">
                                               </div>
                                               <div class="large-1 column report_col">
                                                   0012354
                                               </div>
                                               <div class="large-3 column report_col">
                                                   Equatorial Forest
                                               </div>
                                               <div class="large-2 column report_col">
                                                   Royalty Free
                                               </div>
                                               <div class="large-2 column report_col">
                                                    <a href="">Calculate Price </a>
                                               </div>
                                               <div class="large-2 column report_col">
                                                   $15
                                                   <div class="close_img">
                                                      <a href="">
                                                          <img src="<?php echo base_url('/assets/member/img/close.png')?>">
                                                      </a>
                                                   </div>
                                               </div>
                                              </div>
                                           </div>
                                           <div class="report_item">
                                             <div class="row">
                                               <div class="large-2 column report_col">
                                                   <input type="checkbox" name="">
                                                   <img src="<?php echo base_url('/assets/member/img/search_image.png')?>" class="search_image">
                                               </div>
                                               <div class="large-1 column report_col">
                                                   0012354
                                               </div>
                                               <div class="large-3 column report_col">
                                                   Equatorial Forest
                                               </div>
                                               <div class="large-2 column report_col">
                                                   Right Managed
                                               </div>
                                               <div class="large-2 column report_col">
                                                    <a href="">Calculate Price </a>
                                               </div>
                                               <div class="large-2 column report_col">
                                                   $15
                                                   <div class="close_img">
                                                      <a href="">
                                                          <img src="<?php echo base_url('/assets/member/img/close.png')?>">
                                                      </a>
                                                   </div>
                                               </div>
                                              </div>
                                           </div>
                                           <div class="report_item">
                                             <div class="row">
                                               <div class="large-2 column report_col">
                                                   <input type="checkbox" name="">
                                                   <img src="<?php echo base_url('/assets/member/img/search_image.png')?>" class="search_image">
                                               </div>
                                               <div class="large-1 column report_col">
                                                   0012354
                                               </div>
                                               <div class="large-3 column report_col">
                                                   Equatorial Forest
                                               </div>
                                               <div class="large-2 column report_col">
                                                   R-F Exclusive for 6 months
                                               </div>
                                               <div class="large-2 column report_col">
                                                    <a href="">Calculate Price </a>
                                               </div>
                                               <div class="large-2 column report_col">
                                                   $15
                                                   <div class="close_img">
                                                      <a href="">
                                                          <img src="<?php echo base_url('/assets/member/img/close.png')?>">
                                                      </a>
                                                   </div>
                                               </div>
                                              </div>
                                           </div>
                                           <div class="report_item">
                                             <div class="row">
                                               <div class="large-2 column report_col">
                                                   <input type="checkbox" name="">
                                                   <img src="<?php echo base_url('/assets/member/img/search_image.png')?>" class="search_image">
                                               </div>
                                               <div class="large-1 column report_col">
                                                   0012354
                                               </div>
                                               <div class="large-3 column report_col">
                                                   Equatorial Forest
                                               </div>
                                               <div class="large-2 column report_col">
                                                   Royalty Free
                                               </div>
                                               <div class="large-2 column report_col">
                                                    <a href="">Calculate Price </a>
                                               </div>
                                               <div class="large-2 column report_col">
                                                   $15
                                                   <div class="close_img">
                                                      <a href="">
                                                          <img src="<?php echo base_url('/assets/member/img/close.png')?>">
                                                      </a>
                                                   </div>
                                               </div>
                                              </div>
                                           </div>

                                           <div class="report_footer">
                                             <div class="row">
                                               <div class="large-5 columns pull-left">
                                                  <div class="large-12 columns">
                                                        <div class="row collapse">
                                                          <div class="small-7 columns">
                                                            <input type="text" placeholder="Email Address ">
                                                          </div>
                                                          <div class="small-5 columns">
                                                            <a href="#" class="button postfix">Get A Quote </a>
                                                              <span class="question_wrap">
                                                                  <span class="question_this">
                                                                     <img src="<?php echo base_url('/assets/member/icons/question.png')?>">
                                                                  </span>
                                                                  <span class="question_text">
                                                                       <a class="question_close">
                                                                           <i class="fa fa-times" aria-hidden="true"></i>
                                                                       </a>
                                                                       Provide an email address in the email address bar then click "Get A Quote" button for a quotation of selected items to be sent. Please note you cannot get a quote without selecting the items from  the shopping basket.
                                                                  </span>
                                                              </span>
                                                          </div>
                                                        </div>
                                                      </div>
                                               </div>
                                               <div class="pull-right">
                                                   Total Price : $90
                                               </div>
                                              </div>
                                           </div>

                                           <button class="button btn_checkout "> Checkout </button>

                                           <div style="clear: both"></div>

                                  </div>
                                <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="checkout">
                                  <div class="tab_header">
                                      <div class="tab_title">
                                        Choose Payment Option
                                      </div>
                                  </div>
                                  <div class="tab_content">
                                    <div class ="payment_options">
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/pesapal.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/visa.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/mastercard.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/mpesa.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/airtel.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/pesapap.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/equity.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/kcb.png')?>" class="pay_img">
                                        </div>
                                        <div class="pay_option">
                                          <input type="radio" name="">
                                          <img src="<?php echo base_url('/assets/member/img/co_operative.png')?>" class="pay_img">
                                        </div>
                                    </div>
                                    <div class="large-8 columns">
                                        <div class="pay_section">
                                            <div class="pay_title">
                                                Send Mpesa Ksh. 19406.51 to Pay Bill Business number 220220. Submit the Confirmation Code below :
                                            </div>
                                            <ol>
                                                <li>Go to M-PESA on your phone </li>
                                                <li>Select Pay Bill option </li>
                                                <li>Enter Business no. 220220 </li>
                                                <li>Leave the Account no. blank </li>
                                                <li>Enter the amount Ksh 19406.51 </li>
                                                <li>Enter your M-PESA PIN and Send </li>
                                                <li>You will receive a confirmation SMS from M-PESA with a Confirmation Code </li>
                                                <li>After you recieve the confirmation </li>
                                                <li>Click on Complete </li>
                                            </ol>
                                        </div>
                                        <div class="pay_title">
                                            Enter Payment Details
                                        </div>
                                        <hr/>
                                        <form>
                                          <div class="form_input">
                                                <label>
                                                M-Pesa Mobile Number:
                                                </label>
                                                <input type="text" name="" placeholder="Phone Number" class="input_half_right">
                                          </div>
                                          <div class="form_input">
                                              <label>
                                               M-Pesa Confirmation Code:
                                              </label>
                                              <input type="text" name="" placeholder="Confirmation Code" class="input_half_right">
                                          </div>

                                        </form>
                                    </div>
                                    <div class="large-4 columns">
                                        <div class="pay_secure">
                                           <img src="<?php echo base_url('/assets/member/img/pesapal.png')?>" class="img_pay">
                                        
                                           100% secure payments processed by <a href="">PesaPal </a> and 
                                           secured by <a href="">Verisign SSL. </a>.In order to protect your
                                           card from unauthorised use, PesaPal may request further proof of card ownership.
                                         
                                           <div style="clear: both"></div>
                                        </div>   
                                  </div>
                                  <div style="clear: both"></div>
                          </div>

                    </div>
            </div>
            </div>
            <div class="tabs-panel member_panel" id="history">
                  <div class="tab_header">  
                      <div class="row">
                        <div class="large-12 columns">
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
                      </div>
                  <div class="tabs_content">
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
                              License Type
                          </div>
                          <div class="large-2 column">
                              Date Purchased
                          </div>
                          <div class="large-1 column">
                              Price
                          </div>
                          </div>
                       </div> 
                       <div class="report_content">
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column ">
                                    <img src="<?php echo base_url('/assets/member/img/search_image.png')?>">
                                </div>
                                <div class="large-1 column ">
                                    0012354
                                </div>
                                <div class="large-5 column ">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column ">
                                    Royalty Free
                                </div>
                                <div class="large-2 column ">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column ">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column ">
                                    <img src="<?php echo base_url('/assets/member/img/search_image.png')?>">
                                </div>
                                <div class="large-1 column ">
                                    0012354
                                </div>
                                <div class="large-5 column ">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column ">
                                    Right Managed
                                </div>
                                <div class="large-2 column ">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column ">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column ">
                                    <img src="<?php echo base_url('/assets/member/img/search_image.png')?>">
                                </div>
                                <div class="large-1 column ">
                                    0012354
                                </div>
                                <div class="large-5 column ">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column ">
                                    R-F Exclusive for 6 months
                                </div>
                                <div class="large-2 column ">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column ">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column ">
                                    <img src="<?php echo base_url('/assets/member/img/search_image.png')?>">
                                </div>
                                <div class="large-1 column ">
                                    0012354
                                </div>
                                <div class="large-5 column ">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column ">
                                    Royalty Free
                                </div>
                                <div class="large-2 column ">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column ">
                                    $15
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