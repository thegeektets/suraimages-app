
  <div class="inside_body">

       <div class="row">
            <ul class="tabs admin_tabs" data-tabs id="admin-tabs">
                  <li class="tabs-title is-active" id="account_link" ><a href="#account" aria-selected="true"> Account </a></li>
                  <li class="tabs-title"><a href="#pricing"> Pricing </a></li>
                  <li class="tabs-title"><a href="#members"> Members (<?php  echo sizeof($members)?>)</a></li>
                  <li class="tabs-title" id="contributors_link" ><a href="#contributors"> Contributors (<?php  echo (sizeof($newcontributors)+sizeof($exscontributors))?>)</a></li>
                  <li class="tabs-title"><a href="#sales"> Sales History </a></li>
                  
            </ul>
            <div class="tabs-content" data-tabs-content="admin-tabs">
              <div class="tabs-panel is-active admin_panel" id="account">

                    <ul class="tabs inner_admin_tabs" data-tabs id="account-tabs">
                          <li class="tabs-title is-active"><a href="#edit_account">Edit Account </a></li>
                          <li class="tabs-title"><a href="#password">Change Password </a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="account-tabs">
                          <div class="tabs-panel is-active" id="edit_account">
                                <div class="tab_title">
                                    Account Information:
                                </div>
                                   <form name="user_account" id="user_account" <?php echo form_open('admin/update_account'); ?>
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
              <div class="tabs-panel admin_panel" id="pricing">
                    <ul class="tabs inner_admin_tabs" data-tabs id="pricing-tabs">
                          <li class="tabs-title is-active"><a href="#rfpricing" aria-selected="true"> RF Pricing Range </a></li>
                          <li class="tabs-title"><a href="#expricing"> Exclusive Pricing </a></li>
                          <li class="tabs-title"><a href="#rmpricing"> Rights Managed Pricing </a></li>
                          <li class="tabs-title"><a href="#rrpricing"> Rights Ready Pricing </a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="pricing-tabs">
                          <div class="tabs-panel is-active" id="rfpricing">
                              <div class="tab_title">
                                    RF Price Range:
                              </div>
                              <div class="tab_content">
                                    <div id="message" class="message">
                                    </div>
                                    <form class="contact_info" name="rf_pricing" id="rf_pricing" onsubmit="return update_rfpricing()">
                                      <div class="large-4 columns">
                                        <label class="strong">Photos/ Illustrations : </label>
                                        <div class="form_group">
                                            <input type="text" name="txt_photomax" placeholder="150" class="inline_input" value="<?php echo $rf_pricing['0']['photo_max'] ?>" >
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_photomin" placeholder="20" class="inline_input" value="<?php echo $rf_pricing['0']['photo_min'] ?>" >
                                        </div>
                                      </div>
                                      <div class="large-6 columns pull-left">
                                        <label class="strong">Videos: </label>
                                        <div class="form_group">
                                            <input type="text" name="txt_videomax" placeholder="150" class="inline_input"  value="<?php echo $rf_pricing['0']['video_max'] ?>" >
                                            <span class="strong">
                                                Maximum price for Royalty Free License 
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_videomin" placeholder="20" class="inline_input"  value="<?php echo $rf_pricing['0']['video_min'] ?>" >
                                            <span class="strong">
                                                Minimum price for Royalty Free License 
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                      </div>
                                      <button class="button btn_upload_id" type="submit">Save Changes</button>   
                              
                                    </form>
                                    
                              </div>
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="expricing">
                              <div class="tab_title">
                                   Exclusive Pricing :
                              </div>
                              <div class="tab_content">
                                    <div id="message" class="message">
                                    </div>
                                    <form class="contact_info" name="ex_pricing" id="ex_pricing" onsubmit="return update_expricing()">
                                      <div class="large-4 columns">
                                        <label class="strong">Photos/ Illustrations : </label>
                                        <div class="form_group">
                                            <input type="text" name="txt_photo_1month" placeholder="150" class="inline_input" value="<?php echo $ex_pricing['0']['photo_1month'] ?>" >
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_photo_3month" placeholder="400" class="inline_input" value="<?php echo $ex_pricing['0']['photo_3month'] ?>" >
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_photo_6month" placeholder="780" class="inline_input" value="<?php echo $ex_pricing['0']['photo_6month'] ?>" >
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_photo_1year" placeholder="1500" class="inline_input" value="<?php echo $ex_pricing['0']['photo_1year'] ?>" >
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_photo_2year" placeholder="2500" class="inline_input" value="<?php echo $ex_pricing['0']['photo_2year'] ?>" >
                                        </div>
                                      </div>
                                      <div class="large-6 columns pull-left">
                                        <label class="strong">Videos: </label>
                                        <div class="form_group">
                                            <input type="text" name="txt_video_1month" placeholder="150" class="inline_input" value="<?php echo $ex_pricing['0']['video_1month'] ?>" >
                                            <span class="strong">
                                                1 Month
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="txt_video_3month" placeholder="400" class="inline_input" value="<?php echo $ex_pricing['0']['video_3month'] ?>" >
                                            <span class="strong">
                                                3 Months
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="txt_video_6month" placeholder="780" class="inline_input" value="<?php echo $ex_pricing['0']['video_6month'] ?>" >
                                            <span class="strong">
                                                6 Months
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="txt_video_1year" placeholder="1500" class="inline_input" value="<?php echo $ex_pricing['0']['video_1year'] ?>" >
                                            <span class="strong">
                                                1 year
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="txt_video_2year" placeholder="2500" class="inline_input" value="<?php echo $ex_pricing['0']['video_2year'] ?>" >
                                            <span class="strong">
                                                2 years
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                      </div>
                                       <button class="button btn_upload_id" type="submit">Save Changes</button>   
                             
                                    </form>
                                    
                              </div>
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="rmpricing">
                              <div class="tab_title">
                                   Rights Managed Pricing :
                              </div>
                              <div class="tab_content">
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="rrpricing">
                              <div class="tab_title">
                                   Rights Ready Pricing :
                              </div>
                              <div class="tab_content">
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>

                    </div>
            </div>
            <div class="tabs-panel admin_panel" id="members">
                  <ul class="tabs inner_admin_tabs" data-tabs id="member-tabs">
                          <li class="tabs-title is-active"><a href="#accounts" aria-selected="true"> Accounts </a></li>
                  </ul>

                  <div class="tabs-content" data-tabs-content="member-tabs">
                        
                          <div class="tabs-panel is-active" id="accounts">
                              <div class="report_header">
                                 <div class="row">
                                     <div class="large-3 column">
                                         Name
                                     </div>
                                     <div class="large-3 column">
                                         Email Address
                                     </div>

                                     <div class="large-2 column">
                                         Tel Number
                                     </div>
                                     <div class="large-2 column">
                                         Date Joined
                                     </div>
                                     <div class="large-2 column">
                                         Purchase History
                                     </div>
                                 </div>
                              </div> 
                              <div class="report_content">
                              <?php     
                                  for ($i=0; $i < sizeof($members); $i++){
                              ?>
                                   <div class="report_item">
                                        <div class="row">
                                           <div class="large-3 column report_col">
                                              <?php echo $members[$i]['firstname']." ".$members[$i]['middlename'] ?>
                                           </div>
                                           <div class="large-3 column report_col">
                                               <?php echo $members[$i]['email'] ?>
                                           </div>
                                           <div class="large-2 column report_col">
                                               <?php echo $members[$i]['telnumber'] ?>
                                           </div>
                                           <div class="large-2 column report_col">
                                               <?php  echo date("F j, Y", strtotime($members[$i]['date_joined']));  ?>
                                           </div>
                                           <div class="large-2 column report_col">
                                                (3)
                                           </div>
                                        </div>
                                        <div class="row more_details">
                                           <div class="large-2 columns report_col">
                                               <?php if(isset($members[$i]['avatar'])) { ?>
                                               <img src="<?php echo $members[$i]['avatar']?>" class="user_avatar">
                                               <?php } else { ?>
                                                <img src="<?php echo base_url('assets/contributor/img/user_avatar.png')?>" class="user_avatar">
                                                <?php } ?> 
                                           </div>
                                           <div class="large-3 columns report_col">
                                                <div>
                                                    <span class="strong"> Name: </span> <?php echo $members[$i]['firstname']." ".$members[$i]['middlename'] ?>
                                                </div>
                                                <div>
                                                    <span class="strong"> Email: </span> <?php echo $members[$i]['email'] ?>
                                                </div>
                                                <div>
                                                    <span class="strong"> Tel No: </span> <?php echo $members[$i]['telnumber'] ?>
                                                </div>                                                        
                                           </div>
                                           <div class="large-4 column report_col">
                                               <div class="pull-left">
                                                    <div>
                                                        <span class="strong"> Address: </span> <?php echo $members[$i]['postaladdress'] ?>
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Country: </span> <?php echo $members[$i]['country'] ?>
                                                    </div>
                                                     <div>
                                                        <span class="strong"> Town: </span> <?php echo $members[$i]['city'] ?>
                                                    </div>                                                       
                                               </div>
                                           </div>
                                           <div class="large-3 column report_col">
                                                    <div>
                                                        <span class="strong"> Date Joined: </span> <?php 
                                                            echo date("F j, Y", strtotime($members[$i]['date_joined']));  ?>
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Purchase History: </span> 3
                                                    </div>
                                           </div>
                                        </div>
                                   </div>
                                  <?php } ?>
                              </div>                       
                          </div>
                          <div style="clear: both"></div>
                  </div>
            </div>
            <div class="tabs-panel admin_panel" id="contributors">
                <ul class="tabs inner_admin_tabs" data-tabs id="contributor-tabs">
                    <li class="tabs-title is-active"><a href="#nwcontributors" aria-selected="true"> New Contributors (<?php echo sizeof($newcontributors) ?>) </a></li>
                    <li class="tabs-title"><a href="#excontributors" aria-selected="true"> Existing Contributors
                    (<?php echo sizeof($exscontributors)?>) </a></li>
                    <li class="tabs-title"><a href="#tluploads" aria-selected="true"> Total Uploads(<?php echo count($all_contributor_images) ?>)</a></li>
                    <li class="tabs-title"><a href="#resources" aria-selected="true"> Resources </a></li>
                </ul>

                <div class="tabs-content" data-tabs-content="contributor-tabs">
                
                <?php if (($user_session['edit_status']) === TRUE) {
                        ?>
                       <div class="tabs-panel is-active" id="nwcontributors">
                            <?php  require_once('file_approval.php'); ?>
                        </div>
                    
                <?php   }  else if (($user_session['edit_video_status']) === TRUE) { ?>
                        
                        <div class="tabs-panel is-active" id="nwcontributors">
                             <?php  require_once('video_approval.php'); ?>
                         </div>

                <?php   }  else { ?>    
                    <div class="tabs-panel is-active" id="nwcontributors">
                        <div class="row">
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
                                <form class="row collapse">
                                    <div class="small-8 columns pull-left">
                                       <input type="text" name="search" class="" placeholder="Search">
                                    </div>
                                    <div class="small-4 columns pull-left">
                                       <a class="button btn_search" href="#">
                                            SEARCH
                                       </a>
                                    </div>
                                </form>
                           </div>  
                        </div>    
                        <div class="report_header">
                           <div class="row">
                               <div class="large-2 column">
                                   Name
                               </div>
                               <div class="large-2 column">
                                   Email Address
                               </div>

                               <div class="large-2 column">
                                   Tel Number
                               </div>
                               <div class="large-2 column">
                                   Date Joined
                               </div>
                               <div class="large-2 column">
                                   Uploads
                               </div>
                               <div class="large-2 column">
                                   New Uploads
                               </div>
                           </div>
                        </div> 
                        <div class="report_content">
                             <?php     
                                  for ($i=0; $i < sizeof($newcontributors); $i++){
                              ?>
                              
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                       <?php echo $newcontributors[$i]['firstname']." ".$newcontributors[$i]['middlename'] ?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php echo $newcontributors[$i]['email']?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php echo $newcontributors[$i]['telnumber']?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php  echo date("F j, Y", strtotime($newcontributors[$i]['date_joined'])); ?>
                                     </div>
                                     <div class="large-2 column report_col">
                                          (<?php echo $newcontributors[$i]['uploads']
                                                    [0]['image_uploads']; ?>)
                                     </div>
                                     <div class="large-2 column report_col">
                                        <?php if($newcontributors[$i]['new_uploads']
                                                    [0]['image_uploads'] < 1) { ?>
                                                (<?php echo $newcontributors[$i]['new_uploads']
                                                          [0]['image_uploads']; ?>)
                                            <?php } else { ?>     
                                          <a onclick="set_session();" href="<?php echo base_url('index.php/admin/start_file_approval/'.$newcontributors[$i]['user_id']);?>" >
                                                (<?php echo $newcontributors[$i]['new_uploads']
                                                          [0]['image_uploads']; ?>)
                                          </a>
                                             <?php } ?>
                                     </div>
                                     
                                  </div>
                                  <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <?php if(isset($newcontributors[$i]['avatar'])) { ?>
                                            <img src="<?php echo $newcontributors[$i]['avatar']?>" class="user_avatar">
                                            <?php } else { ?>
                                             <img src="<?php echo base_url('assets/contributor/img/user_avatar.png')?>" class="user_avatar">
                                             <?php } ?> 
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  <?php echo $newcontributors[$i]['firstname']." ".$newcontributors[$i]['middlename'] ?>
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> <?php echo $newcontributors[$i]['email']?>
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> <?php echo $newcontributors[$i]['telnumber']?>
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> <?php echo $newcontributors[$i]['payment_mode']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> <?php echo $newcontributors[$i]['postaladdress']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> <?php echo $newcontributors[$i]['country']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> <?php echo $newcontributors[$i]['city']?>
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> <?php 
                                                      echo date("F j, Y", strtotime($newcontributors[$i]['date_joined'])); 
                                                  ?>
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> <?php echo $newcontributors[$i]['uploads']
                                                    [0]['image_uploads']; ?>
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> <?php echo $newcontributors[$i]['new_uploads']
                                                    [0]['image_uploads']; ?>
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href="<?php echo $newcontributors[$i]['id_file']?>" target="_blank" > Passport ID.jpg </a>
                                                  <?php
                                                   if($newcontributors[$i]['id_status'] == 'Approved'){ 
                                                     echo $newcontributors[$i]['id_status']; 
                                                     } else {
                                                        echo "<a href='".base_url('/index.php/admin/approve_id/'.$newcontributors[$i]['user_id'])."'>
                                                  <span class='approve_icon'><img src='".base_url('assets/admin/icons/approve.png')."'></span>
                                                  </a>
                                                  <a href='".base_url('/index.php/admin/decline_id/'.$newcontributors[$i]['user_id'])."'>
                                                  <span class='approve_icon'><img src='".base_url('assets/admin/icons/decline.png')."'></span>
                                                  </a>"; 
                                                    if($newcontributors[$i]['id_status'] !== 'Uploaded'){
                                                      echo $newcontributors[$i]['id_status'];   
                                                    }                                                 
                                                    
                                                     } ?>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <?php 
                                }
                              ?>
                        </div>                       
                    </div>
                <?php
                    }
                ?>
                
               
                    <div class="tabs-panel" id="excontributors">
                        <div class="row">
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
                                <form class="row collapse">
                                    <div class="small-8 columns pull-left">
                                       <input type="text" name="search" class="" placeholder="Search">
                                    </div>
                                    <div class="small-4 columns pull-left">
                                       <a class="button btn_search" href="#">
                                            SEARCH
                                       </a>
                                    </div>
                                </form>
                           </div>  
                        </div>    
                        <div class="report_header">
                           <div class="row">
                               <div class="large-2 column">
                                   Name
                               </div>
                               <div class="large-2 column">
                                   Email Address
                               </div>

                               <div class="large-2 column">
                                   Tel Number
                               </div>
                               <div class="large-2 column">
                                   Date Joined
                               </div>
                               <div class="large-1 column">
                                   Image Uploads
                               </div>
                               <div class="large-1 column">
                                   New Uploads
                               </div>
                               <div class="large-1 column">
                                   Video Uploads
                               </div>
                               <div class="large-1 column">
                                   New Uploads
                               </div>
                           </div>
                        </div> 
                        <div class="report_content">
                             <?php     
                                  for ($i=0; $i < sizeof($exscontributors); $i++){
                              ?>
                              
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                       <?php echo $exscontributors[$i]['firstname']." ".$exscontributors[$i]['middlename'] ?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php echo $exscontributors[$i]['email']?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php echo $exscontributors[$i]['telnumber']?>
                                     </div>
                                     <div class="large-2 column report_col">
                                         <?php  echo date("F j, Y", strtotime($exscontributors[$i]['date_joined'])); ?>
                                     </div>
                                      <div class="large-1 column report_col">
                                          (<?php echo $exscontributors[$i]['uploads']
                                                    [0]['image_uploads']; ?>)
                                     </div>
                                     <div class="large-1 column report_col">
                                        <?php if($exscontributors[$i]['new_uploads']
                                                    [0]['image_uploads'] < 1) { ?>
                                                (<?php echo $exscontributors[$i]['new_uploads']
                                                          [0]['image_uploads']; ?>)
                                            <?php } else { ?>     
                                          <a onclick="set_session();" href="<?php echo base_url('index.php/admin/start_file_approval/'.$exscontributors[$i]['user_id']);?>" >
                                                (<?php echo $exscontributors[$i]['new_uploads']
                                                          [0]['image_uploads']; ?>)
                                          </a>
                                             <?php } ?>
                                     </div>
                                      <div class="large-1 column report_col">
                                          (<?php echo $exscontributors[$i]['video_uploads']
                                                    [0]['video_uploads']; ?>)
                                     </div>
                                     <div class="large-1 column report_col">
                                        <?php if($exscontributors[$i]['new_video_uploads']
                                                    [0]['video_uploads'] < 1) { ?>
                                                (<?php echo $exscontributors[$i]['new_video_uploads']
                                                          [0]['video_uploads']; ?>)
                                            <?php } else { ?>     
                                          <a onclick="set_session();" href="<?php echo base_url('index.php/admin/start_video_approval/'.$exscontributors[$i]['user_id']);?>" >
                                                (<?php echo $exscontributors[$i]['new_video_uploads']
                                                          [0]['video_uploads']; ?>)
                                          </a>
                                             <?php } ?>
                                     </div>
                                  </div>
                                  <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <?php if(isset($exscontributors[$i]['avatar'])) { ?>
                                            <img src="<?php echo $exscontributors[$i]['avatar']?>" class="user_avatar">
                                            <?php } else { ?>
                                             <img src="<?php echo base_url('assets/contributor/img/user_avatar.png')?>" class="user_avatar">
                                             <?php } ?> 
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  <?php echo $exscontributors[$i]['firstname']." ".$exscontributors[$i]['middlename'] ?>
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> <?php echo $exscontributors[$i]['email']?>
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> <?php echo $exscontributors[$i]['telnumber']?>
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> <?php echo $exscontributors[$i]['payment_mode']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> <?php echo $exscontributors[$i]['postaladdress']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> <?php echo $exscontributors[$i]['country']?>
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> <?php echo $exscontributors[$i]['city']?>
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> <?php 
                                                      echo date("F j, Y", strtotime($exscontributors[$i]['date_joined'])); 
                                                  ?>
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span>  (<?php echo $exscontributors[$i]['uploads']
                                                    [0]['image_uploads']; ?>)
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span>  (<?php echo $exscontributors[$i]['new_uploads']
                                                    [0]['image_uploads']; ?>)
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href="<?php echo $exscontributors[$i]['id_file']?>" target="_blank" > Passport ID.jpg </a>
                                                  <?php
                                                   if($exscontributors[$i]['id_status'] == 'Approved'){ 
                                                     echo $exscontributors[$i]['id_status']; 
                                                     } else {
                                                        echo "<a href='".base_url('/index.php/admin/approve_id/'.$exscontributors[$i]['user_id'])."'>
                                                  <span class='approve_icon'><img src='".base_url('assets/admin/icons/approve.png')."'></span>
                                                  </a>
                                                  <a href='".base_url('/index.php/admin/decline_id/'.$exscontributors[$i]['user_id'])."'>
                                                  <span class='approve_icon'><img src='".base_url('assets/admin/icons/decline.png')."'></span>
                                                  </a>"; 
                                                    if($exscontributors[$i]['id_status'] !== 'Uploaded'){
                                                      echo $exscontributors[$i]['id_status'];   
                                                    }                                                 
                                                    
                                                     } ?>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <?php 
                                }
                              ?>
                        </div>                       
                    </div>
             
                    <div class="tabs-panel" id="tluploads">
                        <div class="row">
                            <div class="large-12 columns">
                                 <div class="large-4 columns medium-5 columns pull-left">
                                     <form class="reports_search">
                                      <select class="inside_search_slc" id="edit_slc">
                                          <option value=""> Action </option>
                                          <option value="Title"> Add Title </option>
                                          <option value="Keywords"> Add Keywords </option>
                                          <option value="Price"> Set Price </option>
                                          <option value="Category"> Category </option>
                                          <option value="Image Type"> Image Type </option>
                                          <option value="Image Subtype"> Image Subtype </option>
                                          <option value="Orientation"> Orientation </option>
                                          <option value="People"> People </option>
                                          <option value="Delete" class="delete_option"> Hibernate File </option>
                                      </select>
                                      <span class="question_wrap">
                                        <span class="question_this">
                                           <img src="<?php echo base_url('assets/contributor/icons/question.png')?>">
                                        </span>
                                        <span class="question_text">
                                           <a class="question_close">
                                               <i class="fa fa-times" aria-hidden="true"></i>
                                           </a>
                                           Actions help you apply multiple commands on multiple files all at once. How
                                           does it work? First select the multiple files you want to Action by clicking on
                                           checkbox(s) on the left side of each file then choose an action under the
                                           “Actions” dropdown menu and the click “Apply” button.
                                           Every action you chose under the dropdown menu has the help message specific
                                           explaining about that action. Simply move your mouse over the question mark.
                                        </span>
                                      </span>
                                     </form>
                                 </div>
                                 <div class="large-4 columns">
                                     <div class="message">
                                     </div>
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
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="reports_search large-6 columns pull-left">
                                  <form class="title" onsubmit="return applytitleall()">
                                      <div class="add_title">
                                        Add Title  : 
                                        <input type="text" name="all_title" class="inline_input">
                                        <button type="submit" class="button btn_search">
                                                   Apply
                                        </button>
                                      </div>
                                  </form>
                                  <form class="add_keywords" onsubmit="return applykeywordall()">
                                      <div class="add_title">
                                       Add Keywords  : 
                                       <textarea type="text" name="all_keyword" class="inline_input">
                                       </textarea> 
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                                  </form>
                                  <form class="set_price" onsubmit="return applypriceall()">
                                      <div class="add_title">
                                       Set Price  : 
                                       <input type="text" name="all_price" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                                  </form>
                                  <form class="category" onsubmit="return applycategoryall()">
                                    <div class="add_title">
                                      <div class="row collapse">
                                        <div class="large-2 columns">
                                            Category  : 
                                        </div>
                                        <div class="large-6 columns">
                                         <select multiple="multiple" name="all_category" class="slc_category">
                                             <option value="Abstract">Abstract</option>
                                             <option value="Agriculture/Farming">Agriculture/ Farming </option>
                                             <option value="Animals/Livestock">Animals/ Livestock </option>
                                             <option value="Arts/Entertainment">Arts/ Entertainment </option>
                                             <option value="Beauty/Fashion">Beauty/ Fashion </option>
                                             <option value="Business">Business </option>
                                             <option value="Buildings/Landmarks">Buildings/ Landmarks </option>
                                             <option value="Celebrity">Celebrity </option>
                                             <option value="Education">Education </option>
                                             <option value="Food/Cuisines">Food/ Cuisines </option>
                                             <option value="Beverage/Drink">Beverage/ Drink </option>
                                             <option value="Medical/Healthcare">Medical/ Healthcare </option>
                                             <option value="Holiday">Holiday </option>
                                             <option value="Industrial">Industrial </option>
                                             <option value="Interior">Interior </option>
                                             <option value="Nature">Nature </option>
                                             <option value="Outdoor">Outdoor </option>
                                             <option value="People">People </option>
                                             <option value="Religion">Religion </option>
                                             <option value="Signs/Symbols">Signs/ Symbols </option> 
                                             <option value="Sports">Sports </option>
                                             <option value="ICT/Technology">ICT/ Technology </option>
                                             <option value="Infrastructure">Infrastructure </option>
                                             <option value="Vintage">Vintage </option>
                                             <option value="Telecommunication">Telecommunication </option>
                                             <option value="Tourism/Hospitality">Tourism/ Hospitality </option>
                                             <option value="Wildlife">Wildlife </option>
                                         </select> 
                                        </div>
                                        <div class="large-4 columns">
                                          <button type="submit" class="button btn_search">
                                               Apply
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                  <form class="image_type" onsubmit="return applyimagetypeall()">
                                      <div class="add_title">
                                       Image Type  : 
                                       <select  name="all_image_type" class="inline_input">
                                          <option>Select Image Type</option>
                                          <option value="Creative Image">Creative Image</option>
                                          <option value="Editorial Image">Editorial Image</option>
                                       </select>
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                                  </form>
                                  <form class="image_subtype" onsubmit="return applyimagesubtypeall()">
                                    <div class="add_title">
                                     Image Subtype  : 
                                     <select  name="all_image_subtype" class="inline_input">
                                        <option>Select Image Subtype</option>
                                        <option value="Photography">Photography </option>
                                        <option value="Illustration">Illustration</option>
                                        <option value="All">All</option>
                                     </select>
                                     <button type="submit" class="button btn_search">
                                         Apply
                                     </button>
                                    </div>
                                  </form>
                                  <form class="orientation" onsubmit="return applyorientationeall()">
                                    <div class="add_title">
                                     Orientation  : 
                                     <select  name="all_orientation" class="inline_input">
                                        <option>Select Orientation</option>
                                        <option value="Landscape">Landscape </option>
                                        <option value="Potrait">Potrait</option>
                                     </select>
                                     <button type="submit" class="button btn_search">
                                         Apply
                                     </button>
                                    </div>
                                  </form>
                                  <form class="people" onsubmit="return applypeopleall()">
                                      <div class="add_title">
                                       People  : 
                                       <select  name="all_people" class="inline_input">
                                            <option>Select number of people </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                       </select>
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                                  </form>
                                  <form class="attach_release">
                                    <div class="add_title">
                                     Attach Release  : 
                                    <select  name="all_release" class="inline_input">
                                          <option>Select Releases </option>
                                          
                                     </select>
                                     <button type="submit" class="button btn_search">
                                         Attach
                                     </button>
                                    </div>
                                  </form>
                                  <form class="same_shoot" onsubmit="return applysameshoot();">
                                    <div class="add_title">
                                     Same Shoot  : 
                                     <div class="row collapse">
                                       <div class="large-4 columns">
                                          <button class="button alert" onclick="return generate_unique_code()">
                                              Generate Same Shoot Code
                                          </button>
                                       </div>
                                       <div class="large-6 columns">
                                          <input type="text" name="all_shoot" class="all_shoot">
                                       </div>
                                       <div class="large-2 columns">
                                          <button type="submit" class="button btn_search">
                                              Apply
                                          </button>
                                       </div>
                                     </div>
                                    </div>
                                  </form>
                                  <div class="model_notification">
                                    <div class="add_title">
                                      <div class="row collapse">
                                        <div class="large-4 columns">
                                         Model Notification  : 
                                        </div>
                                        <div class="large-8 columns">
                                            <form name="new_model" id="new_model" onsubmit="return add_model()">
                                                <div class="row collapse">
                                                  <div class="large-10 columns">
                                                  <input type="email" name="all_model_notification" class="" required="required" placeholder="Enter model’s email address one at a time">
                                                  </div>
                                                  <div class="large-2 columns">
                                                     <button type="submit" class="button btn_search">
                                                         ADD
                                                     </button>
                                                  </div>
                                                </div>
                                            </form>
                                            <form name="find_model_form" id="find_model_form" onsubmit="return find_model()">
                                                <div class="row collapse">
                                                  <div class="large-10 columns">
                                                    <input type="email" name="model_email" id="model_email" class="">
                                                  </div>
                                                  <div class="large-2 columns">
                                                     <button type="submit" class="button postfix">
                                                         FIND
                                                     </button>
                                                  </div>
                                                </div>
                                            </form>
                                            <form name="replace_model_form" id="replace_model_form" onsubmit="return replace_model()">
                                            <div class="row collapse">
                                              <div class="large-10 columns">
                                                <input type="hidden" name="model_email" id="replace_model_email">
                                                <input type="email" name="replace_email" id="replace_email" class="">
                                              </div>
                                              <div class="large-2 columns">
                                                 <button type="submit" class="button postfix">
                                                     REPLACE
                                                 </button>
                                              </div>
                                            </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <form class="delete_items" onsubmit="return delete_items();">
                                    <div class="popup">
                                        <div>
                                            <div class="content">
                                                Are you sure you want to delete the selected items ?

                                            </div>
                                            <button type="submit" class="button success pull-left">
                                                Cancel Process
                                            </button>
                                            <button type="submit" class="button btn_search pull-right">
                                                Delete Items
                                            </button>
                                            <div style="clear: both"></div>
                                        </div>
                                    </div>
                                    <div class="add_title">
                                     <div class="row collapse">
                                       <div class="large-5 columns pull-left">
                                          <button type="submit" class="button btn_search">
                                              Delete Selected Items
                                          </button>
                                         
                                       </div>
                                     </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="large-4 columns pull-right">
                                   <button class="button btn_upload" id="submit_changes" onclick="return trigger_submit()" >Submit Changes </button>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="tab_header">  
                            
                           <div class="tabs_content">
                                <div class="report_header">
                                    <div class="row">
                                        <div class="large-1 column">
                                            <input type="checkbox" name="" class="select_all">
                                            File
                                        </div>
                                        <div class="large-1 column">
                                            ID
                                        </div>
                                        <div class="large-2 column">
                                            Title
                                        </div>
                                        <div class="large-3 column">
                                            Keywords
                                        </div>
                                        <div class="large-1 column">
                                            Price
                                        </div>
                                        <div class="large-1 column">
                                            Release
                                        </div>
                                        <div class="large-1 column">
                                            Others
                                        </div>
                                        <div class="large-2 column">
                                            Date Uploaded
                                        </div>
                                    </div>
                                </div> 
                                <div class="edit_content">
                                   <form name="edit_image_contributor" id="edit_image_contributor" onsubmit="return editimagecontributor();">
                                   
                                       <?php for($i=0; $i< count($all_contributor_images); $i++) { ?>
                                       <div class="report_item edit_item">
                                         <div class="row collapse">
                                           <div class="large-1 column ">
                                               <input type="checkbox" name="file_select" class="select_file">
                                                 <img src="<?php echo $all_contributor_images[$i]['file_url']; ?>" class="edit_file_img">
                                           </div>
                                           <div class="large-1 column ">
                                               <?php echo $all_contributor_images[$i]['upload_id']; ?>
                                               <input type="hidden" name="file_id[]" class="file_id" value="<?php echo $all_contributor_images[$i]['upload_id']; ?>">
                                           </div>
                                           <div class="large-2 column ">
                                               <?php echo $all_contributor_images[$i]['file_name']; ?>
                                               <input  required="required" type="hidden" name="file_name[]" placeholder="Name" class="file_name" value="<?php echo $all_contributor_images[$i]['file_name']; ?>">
                                           </div>

                                           <div class="large-3 column ">
                                               <p> <?php $keys = explode(",", $all_contributor_images[$i]['file_keywords']); 
                                                         for($k=0; $k < count($keys); $k++ ) {
                                                             echo $keys[$k].", ";
                                                         }
                                                   ?> </p>
                                               <textarea  required="required"  type="hidden" name="file_keywords[]" class="file_keywords"  placeholder="0000">
                                                       <?php echo $all_contributor_images[$i]['file_keywords']?>
                                               </textarea>
                                           </div>
                                           <div class="large-1 column ">
                                               <?php echo $all_contributor_images[$i]['file_price_large']; ?>

                                               <input  type="hidden" name="file_price_large[]" placeholder="Price" value="<?php echo $all_contributor_images[$i]['file_price_large']?>" class="file_price_large">
                                               
                                               <input  type="hidden" name="file_price_medium[]" placeholder="Medium" readonly="readonly" value="<?php echo $all_contributor_images[$i]['file_price_medium']?>" class="form_group">
                                               
                                               <input  type="hidden" name="file_price_small[]" value="<?php echo $all_contributor_images[$i]['file_price_small']?>" readonly="readonly" placeholder="Low" class="form_group">
                                               <select name="file_type[]" style="display:none;" required="required" class="file_type">
                                                 <option>Select Image Type</option>
                                                 <option value="Creative Image" <?php if($all_contributor_images[$i]['file_type'] == "Creative Image" ) echo 'selected = "selected"'?> > Creative Image</option>
                                                 <option value="Editorial Image" <?php if($all_contributor_images[$i]['file_type'] == "Editorial Image" ) echo 'selected = "selected"'?> > Editorial Image</option>
                                               </select>
                                               <select name="file_subtype[]" style="display:none;" required="required" class="file_subtype">
                                                 <option>Select Image Subtype</option>
                                                 <option value="Photography" <?php if($all_contributor_images[$i]['file_subtype'] == "Photography" ) echo 'selected = "selected"'?> >Photography </option>
                                                 <option value="Illustration" <?php if($all_contributor_images[$i]['file_subtype'] == "Illustration" ) echo 'selected = "selected"'?> >Illustration</option>
                                                 <option value="All">All</option>
                                               </select>
                                               <select name="file_orientation[]" type="hidden" required="required" class="file_orientation">
                                                 <option>Select Orientation</option>
                                                 <option value="Landscape" <?php if($all_contributor_images[$i]['file_orentiation'] == "Landscape" ) echo 'selected = "selected"'?> >Landscape </option>
                                                 <option value="Potrait" <?php if($all_contributor_images[$i]['file_orentiation'] == "Potrait" ) echo 'selected = "selected"'?> >Potrait</option>
                                               </select>
                                               
                                               <select name="file_people[]" style="display:none;" required="required" class="file_people">
                                                 <option>Select number of people </option>
                                                 <option value="1" <?php if($all_contributor_images[$i]['file_people'] == "1" ) echo 'selected = "selected"'?> >1</option>
                                                 <option value="2" <?php if($all_contributor_images[$i]['file_people'] == "2" ) echo 'selected = "selected"'?>  >2</option>
                                                 <option value="3" <?php if($all_contributor_images[$i]['file_people'] == "3" ) echo 'selected = "selected"'?>  >3</option>
                                                 <option value="4" <?php if($all_contributor_images[$i]['file_people'] == "4" ) echo 'selected = "selected"'?>  >4</option>
                                                 <option value="5" <?php if($all_contributor_images[$i]['file_people'] == "5" ) echo 'selected = "selected"'?>  >5</option>
                                                 <option value="6" <?php if($all_contributor_images[$i]['file_people'] == "6" ) echo 'selected = "selected"'?>  >6</option>
                                                 <option value="7" <?php if($all_contributor_images[$i]['file_people'] == "7" ) echo 'selected = "selected"'?>  >7</option>
                                                 <option value="8" <?php if($all_contributor_images[$i]['file_people'] == "8" ) echo 'selected = "selected"'?>  >8</option>
                                                 <option value="9" <?php if($all_contributor_images[$i]['file_people'] == "9" ) echo 'selected = "selected"'?>  >9</option>
                                                 <option value="10" <?php if($all_contributor_images[$i]['file_people'] == "10" ) echo 'selected = "selected"'?>  >10</option>
                                               </select>
                                               <input  type="hidden" name="file_shoot[]" class="file_shoot"
                                               value="<?php echo $all_contributor_images[$i]['file_same_shoot_code']?>" placeholder="">
                                               
                                           </div>
                                           <div class="large-1 column ">
                                                 (<?php echo count($all_contributor_images[$i]['releases'])?>)
                                           </div>

                                           <div class="large-1 column ">
                                                   <a href=""> View</a>
                                           </div>
                                           <div class="large-2 column ">
                                            <?php  echo date("F j, Y", strtotime($all_contributor_images[$i]['date_uploaded']));   ?>
                                           </div>
                                          </div>
                                       </div>

                                   <?php } ?>
                                   </form>
                                </div>            
                            </div>                
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="tabs-panel" id="resources">
                        <div class="tab_header"> 
                           <hr/>
                           <div class="tab_title">
                              General release forms for contributors.
                           </div> 
                           <div class="tabs_content">
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Model Release Form:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Model Release Form.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button btn_search" href="#">
                                               UPLOAD FORM
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Property Release Form:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Property Release Form.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button btn_search" href="#">
                                               UPLOAD FORM
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                             <hr/>
                             <div class="tab_title">
                                Other resources necessary for contributors
                             </div>
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Resource File:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Resource File.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button btn_search" href="#">
                                               UPLOAD
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                            </div>                
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
            <div class="tabs-panel admin_panel" id="sales">
                  <div class="tab_header">  
                      <div class="row collapse">
                          <div class="large-5 columns medium-5 columns pull-left">
                              <form class="reports_search">
                                <select class="inside_search_slc" id="report_slc">
                                    <option value="sales">Sales Reports </option>
                                    <option value="statement">Sales Statement</option>
                                    <option value="license">License Type</option>
                                    <option value="files">My Files</option>
                                </select>
                                  
                                <span class="question_wrap">
                                    <span class="question_this">
                                       <img src="assets/icons/question.png">
                                    </span>
                                    <span class="question_text">
                                         <a class="question_close">
                                             <i class="fa fa-times" aria-hidden="true"></i>
                                         </a>
                                         Actions help you apply multiple commands on multiple files all at once. How
                                         does it work? First select the multiple files you want to Action by clicking on
                                         checkbox(s) on the left side of each file then choose an action under the
                                         “Actions” dropdown menu and the click “Apply” button.
                                         Every action you chose under the dropdown menu has the help message specific
                                         explaining about that action. Simply move your mouse over the question mark.
                                    </span>
                                </span>
                                  
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
                          <div class="row report_filters">
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
                            <div style="clear: both"></div>
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
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
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
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
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
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
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
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
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
                       </div>           
                       <div class="report_footer">
                         <div class="row">
                       
                           <div class="pull-right">
                               Total Sales : $90
                           </div>
                          </div>
                       </div>
                  </div>
                  <div style="clear: both"></div>
            </div>
            </div>
        </div>
  </div>
