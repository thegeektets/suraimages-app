  <body class="inside_page_body">

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Sura Images </div>
    </div>

   <div class="top-bar" id="main-menu">
          <div class="row">
            <div class="top-bar-left">
               <a href="<?php echo base_url(); ?>" class="home_logo">
               </a>
            </div>
              <?php if(!isset($user_session['logged_in'])) { ?> 
              <div class="top-bar-right">
                   <ul class="menu" data-responsive-menu="medium-dropdown">
                       <li class="menu-text menu-divider"> <a href="<?php echo base_url('/index.php/registration/login')?>">Sign in  </a></li>
                       <li class="menu-text"><a href="#"> <a href="<?php echo base_url('/index.php/registration')?>">Register </a></li>
                   </ul>
              </div>
              <?php } else { ?>
              <div class="top-bar-right">
                <ul class="menu" data-responsive-menu="medium-dropdown">
                    <?php if( $user_details['0']['account'] == 'admin') {
                                  ?>
                        <li class="menu-text menu-divider"> 
                            <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false"> Admin </a>
                            <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                              <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#account" class="tab_link" data-id="account">Account</a></li>
                              <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#pricing" class="tab_link" data-id="pricing">Pricing </a></li>
                              <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#members" class="tab_link" data-id="members">Members</a></li>
                              <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#contributors" class="tab_link" data-id="contributors">Contributors</a></li>
                              <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#sales" class="tab_link" data-id="sales">Sales History</a></li>

                            </ul>
                        </li>
                    <?php
                    } ?>
                    <?php if( $user_details['0']['account'] == 'member') {
                    ?>
                        <li class="menu-text menu-divider"> 
                                      <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false">
                                           <?php echo trim($user_session['user_meta']['0']['email']); ?>  
                                      </a>
                                      <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                                        <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#account" data-id="account" class="tab_link">Account</a></li>
                                        <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#basket" data-id="basket" class="tab_link">Shopping Basket </a></li>
                                        <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#history" data-id="history" class="tab_link">Purchase History</a></li>
                                      </ul>
                        </li>
                    <?php
                    } ?>
                    <?php if( $user_details['0']['account'] == 'contributor') {
                    ?>
                        <li class="menu-text menu-divider"> 
                           <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false">
                           <?php echo trim($user_session['user_meta']['0']['email']); ?>
                           <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                             <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#account" data-id="account" class="tab_link">Account</a></li>
                             <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#uploads" data-id="uploads" class="tab_link">Uploads  </a></li>
                             <li><a href="<?php echo(base_url('index.php/registration/dashboard/')) ?>#sales" data-id="sales" class="tab_link">Sale History</a></li>
                           </ul>
                       </li>
                    <?php
                    } ?>
                    <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
                    <li class="menu-text"><a href="<?php echo base_url('index.php/member#basket') ?>" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (<?php echo count($cart_items)?>)</a></li>
                </ul>
              </div>
              <?php } ?>
           </div>
    </div>

 

  <div class="inside_body">
      <div class="row collapse">
            <div class="large-4 columns medium-5 columns pull-left">
            <form class="inside_search_frm" <?php echo form_open('main/start_search'); ?>
                  <input type="text" name="search_term" class="inside_search_txt" placeholder="Search images, videos and illustrations" required="required" value="<?php echo $search_term; ?>" />
             <select class="inside_search_slc" required="required" name="search_cat">
                  <option value="image">Images</option>
                  <option value="video">Videos</option>
                  <option value="illustration">Illustrations</option>
              </select>
              <button type="submit" class="inside_search_btn">
                  <i class="fa fa-search" aria-hidden="true" style="color: #f8991c"></i>
              </button>
            </form>
            </div>
       </div>
       <div class="row collapse">
            <div class="large-6 columns pull-left">
                <img src="<?php echo $all_results[0]['file_thumbnail'] ?>" class="search_display_img">
                 <div class="similar_links pull-right">
                   <a download="<?php echo "suraimages_".$all_results[0]['upload_id']." sample".$all_results[0]['file_name'] ?>" href="<?php echo $all_results[0]['file_thumbnail'] ?>"
                   style="text-decoration:underline"> Download Sample Image </a> 
                 </div>
                <div class="search_popup_details">

                    <div class="search_popup_title">Title 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"><?php echo $all_results[0]['file_name'] ?></div>

                    <div class="search_popup_title">Image ID 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"><?php echo "suraimages_".$all_results[0]['upload_id'] ?></div>

                    <div class="search_popup_title" >Release Information 
                      <span class="pull-right">:</span>
                    </div>
                    
                    <div class="search_popup_content">
                        <?php if(count($all_results[0]['releases']) > 0) { ?>
                                Yes
                        <?php }  else { ?>
                                No
                        <?php } ?>
                    </div>



                </div>
                <hr style="border-top: dotted 1px;" />
                <div class="search_popup_details">

                    <div class="search_popup_title">License Type 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"> <?php echo $all_results[0]['file_license'] ?> </div>

                    <div class="search_popup_title">Image Type
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"><?php echo $all_results[0]['file_type'] ?></div>




                </div>
                <hr style="border-top: dotted 1px;" />
                <div class="search_popup_details">

                    <div class="search_popup_title">Photographer 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content">
                      <?php echo $all_results[0]['firstname']." ".$all_results[0]['middlename']." ".$all_results[0]['surname'] ?> 
                    </div>
                    <div class="search_popup_title">Copyrights
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content">
                       <?php echo $all_results[0]['firstname']." ".$all_results[0]['middlename']." ".$all_results[0]['surname'] ?> 
                    </div>
                    <div class="search_popup_title" > Categories
                      <span class="pull-right">:</span>
                    </div>
                    
                    <div class="search_popup_content">
                        <?php echo $all_results[0]['file_category'] ?> 
                    </div>

                    <div class="search_popup_title" > Keywords
                      <span class="pull-right">:</span>
                    </div>
                    
                    <div class="search_popup_content">
                 <?php $keys = explode(",", $all_results[0]['file_keywords']); 
                     for($k=0; $k < count($keys); $k++ ) {
                        if(strlen(trim($keys[$k]))){
                           ?>
                           <a href="<?php echo base_url('/index.php/main/search/'.trim($keys[$k])); ?>">     <?php echo $keys[$k]; ?>
                                                    </a> ,
                 <?php } }  ?> 
                    </div>


                </div>
                <hr style="border-top: dotted 1px;" />
            </div>
            <div class="large-6 columns pull-right">
                  <hr style="border-top: solid 1px;" />
                  <div class="message">
                  </div>
                  <ul class="accordion search_details_accordion" data-accordion>
                  <?php if( $all_results[0]['exclusive_to'] == 'NULL' || 
                             $all_results[0]['exclusive_to'] < date('Y-m-d')){
                   ?>
                    <li class="accordion-item search_details_accordion_item is-active " data-accordion-item>
                      
                      <a href="#" class="accordion-title">
                          <i class="fa fa-calculator" aria-hidden="true"></i>
                         View Price 
                      </a>
                      
                      <div class="accordion-content search_details_accordion_content" data-tab-content>
                            <div>
                                <ul class="tabs" data-tabs id="example-tabs">
                                   <span class="">
                                       <li class="tabs-title is-active">
                                         <a href="<?php echo "#panel1".trim($all_results[0]['upload_id'])?>" aria-selected="true">
                                            Standard License
                                         </a>
                                       </li>
                                       <li class="tabs-title exclusive_license disabled"><a href="
                                       <?php echo "#panel2".trim($all_results[$i]['upload_id'])?>">Exclusive License</a>
                                       </li>
                                   </span>
                                 </ul>

                                <div class="tabs-content" data-tabs-content="example-tabs">
                                 <form name="add_to_cart" class="add_to_cart">
                                                    
                                  <div class="tabs-panel is-active" id="panel1<?php echo trim($all_results[0]['upload_id'])?>">
                                      <hr style="border-top: solid 1px;margin-bottom:5px;" />
                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Usage :
                                         </div>
                                         <div class="large-8 columns">
                                           <select class="standard-select" id="usage-select" data-prompt="">
                                               <option>Select the Usage</option>
                                               <option value="<?php echo $managed_pricing['0']['usage_adv'] ?>">Advertising</option>   
                                               <option value="<?php echo $managed_pricing['0']['usage_edt'] ?>">Editorial</option>   
                                               <option value="<?php echo $managed_pricing['0']['usage_int'] ?>">Internal Company Use</option>   
                                           </select>
                                           <input type="hidden" name="usage_txt">
                                         </div> 
                                      </div>
                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Media :
                                         </div>
                                         <div class="large-8 columns">
                                         <div class="media-adv-select">
                                           <select class="standard-select" id="media-adv-select"  data-prompt="">
                                               <option>Select the Media</option>
                                               <option value="<?php echo $managed_pricing['0']['media_adv_print'] ?>"> Print </option>
                                               <option value="<?php echo $managed_pricing['0']['media_adv_tv'] ?>"> TV </option>
                                               <option value="<?php echo $managed_pricing['0']['media_adv_digital'] ?>"> Digital </option>
                                           </select>
                                         </div>
                                         <div class="media-edt-select">
                                           <select class="standard-select" id="media-edt-select"  data-prompt="Select the Media">
                                               <option>Select the Media</option>
                                               <option value="<?php echo $managed_pricing['0']['media_edt_print'] ?>"> Print </option>
                                               <option value="<?php echo $managed_pricing['0']['media_edt_tv'] ?>"> TV </option>
                                               <option value="<?php echo $managed_pricing['0']['media_edt_digital'] ?>"> Digital </option>
                                           </select>
                                         </div>
                                         <div class="media-int-select">
                                           <select class="standard-select" id="media-int-select"  data-prompt="Select the Media">
                                               <option>Select the Media</option>
                                               <option value="<?php echo $managed_pricing['0']['media_int_print'] ?>"> Print </option>
                                                <option value="<?php echo $managed_pricing['0']['media_int_digital'] ?>"> Digital </option>
                                           </select>
                                         </div> 
                                         <input type="hidden" name="media_txt">
                                       </div>
                                      </div>
                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Details :
                                         </div>
                                         <div class="large-8 columns">
                                         
                                         <div class="details-adv-print-select">
                                           <select class="standard-select standard-select-details" id="details-adv-print-select" multiple data-prompt="Select the Details">
                                               <option id ="0" value="<?php echo $managed_pricing['0']['details_adv_print_newsp'] ?>"> Newspaper </option>
                                               <option id ="1" value="<?php echo $managed_pricing['0']['details_adv_print_mag'] ?>"> Magazine </option>
                                               <option id ="2" value="<?php echo $managed_pricing['0']['details_adv_print_outd'] ?>"> Outdoor </option>
                                               <option id ="3" value="<?php echo $managed_pricing['0']['details_adv_print_pos'] ?>"> POS </option>
                                               <option id ="4" value="<?php echo $managed_pricing['0']['details_adv_print_all'] ?>"> All </option>
                                           </select>
                                         </div> 
                                         <div class="details-edt-print-select">
                                           <select class="standard-select standard-select-details" id="details-edt-print-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_edt_print_newsp'] ?>"> Newspaper </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_print_mag'] ?>"> Magazine </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_print_book'] ?>"> Book </option>
                                           </select>
                                         </div>  
                                         <div class="details-int-print-select">
                                           <select class="standard-select standard-select-details" id="details-int-print-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_edt_print_collateral'] ?>"> Collateral </option>
                                           </select>
                                         </div>
                                         <div class="details-adv-tv-select">
                                           <select class="standard-select standard-select-details" id="details-adv-tv-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_adv_tv_commercial'] ?>"> TV </option>
                                           </select>
                                         </div>
                                         <div class="details-edt-tv-select">
                                           <select class="standard-select standard-select-details" id="details-edt-tv-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_edt_tv_program'] ?>"> TV Program </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_tv_film'] ?>"> Film </option>
                                           </select>
                                         </div>
                                         <div class="details-adv-digital-select">
                                           <select class="standard-select standard-select-details" id="details-adv-digital-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_adv_digital_website'] ?>"> Website </option>
                                               <option value="<?php echo $managed_pricing['0']['details_adv_digital_mobile'] ?>"> Mobile App </option>
                                               <option value="<?php echo $managed_pricing['0']['details_adv_digital_social'] ?>"> Social Media </option>
                                               <option value="<?php echo $managed_pricing['0']['details_adv_digital_all'] ?>"> All Digital Media </option>
                                           </select>
                                         </div>
                                         <div class="details-edt-digital-select">
                                           <select class="standard-select standard-select-details" id="details-edt-digital-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_edt_digital_website'] ?>"> Website </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_digital_mobile'] ?>"> Mobile App </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_digital_social'] ?>"> Social Media </option>
                                               <option value="<?php echo $managed_pricing['0']['details_edt_digital_all'] ?>"> All Digital Media </option>
                                           </select>
                                         </div>
                                         <div class="details-int-digital-select">
                                           <select class="standard-select standard-select-details" id="details-int-digital-select" multiple data-prompt="Select the Details">
                                               <option value="<?php echo $managed_pricing['0']['details_int_digital_website'] ?>"> Website </option>
                                               <option value="<?php echo $managed_pricing['0']['details_int_digital_presentation'] ?>"> Presentation </option>
                                           </select>
                                         </div>
                                         <input type="hidden" name="details_txt">
                                         </div> 
                                      </div>
                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Duration :
                                         </div>
                                         <div class="large-8 columns">
                                           <div class="duration-adv-select">
                                               <select class="standard-select" id="duration-adv-select" data-prompt="Select the Duration">   <option>Select the Duration</option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_1day'] ?>"> 1 day </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_1week'] ?>"> 1 week </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_1month'] ?>"> 1 month </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_3months'] ?>"> 3 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_6months'] ?>"> 6 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_1year'] ?>"> 1 year </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_adv_2years'] ?>"> 2 years </option>
                                               </select>
                                           </div>
                                           <div class="duration-edt-select">
                                               <select class="standard-select" id="duration-edt-select" data-prompt="Select the Duration"> 
                                                   <option>Select the Duration</option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_1day'] ?>"> 1 day </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_1week'] ?>"> 1 week </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_1month'] ?>"> 1 month </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_3months'] ?>"> 3 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_6months'] ?>"> 6 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_1year'] ?>"> 1 year </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_edt_2years'] ?>"> 2 years </option>
                                               </select>
                                           </div>
                                           <div class="duration-int-select">
                                               <select class="standard-select" id="duration-int-select" data-prompt="Select the Duration">
                                                   <option>Select the Duration</option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_1day'] ?>"> 1 day </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_1week'] ?>"> 1 week </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_1month'] ?>"> 1 month </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_3months'] ?>"> 3 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_6months'] ?>"> 6 months </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_1year'] ?>"> 1 year </option>
                                                   <option value="<?php echo $managed_pricing['0']['duration_int_2years'] ?>"> 2 years </option>
                                               </select>
                                           </div>
                                           <input type="hidden" name="duration_txt">
                                           </div>
                                      </div>
                                      
                                       <div class="row collapse">
                                         <div class="large-4 columns">
                                           Region :
                                         </div>
                                         <div class="large-8 columns region-select">
                                           <select class="standard-select standard-select-multiple" id="region-select" data-prompt="Select the Region" multiple>
                                               <option value="<?php echo $managed_pricing['0']['region_price'] ?>"> Africa </option>
                                               <option value="<?php echo $managed_pricing['0']['region_price'] ?>"> Europe </option>
                                               <option value="<?php echo $managed_pricing['0']['region_price'] ?>"> N.America </option>
                                               <option value="<?php echo $managed_pricing['0']['region_price'] ?>"> S.America </option>
                                               <option value="<?php echo $managed_pricing['0']['region_price'] ?> "> Asia </option>
                                           </select>
                                           <input type="hidden" name="region_txt">
                                         </div> 
                                      </div>
                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Sub Region :
                                         </div>
                                         <div class="large-8 columns sub-region-select">
                                           <select class="standard-select standard-select-multiple" id="sub-region-select" data-prompt="Select the Sub-Region" multiple="">
                                               <?php include 'subregion_countries.php'; ?>
                                           </select>
                                           <input type="hidden" name="sub_region_txt">
                                         </div> 
                                      </div>
                                      
                                      <div class="price_footer">
                                            License Fee : $
                                            <span class="file_price">
                                            00
                                            </span>
                                            <input type="hidden" name="upload_id" value="<?php echo $all_results[0]['upload_id'] ?>">
                                            <input type="hidden" name="file_quality" value="-">
                                            <input type="hidden" name="file_price" value="">
                                            <input type="hidden" name="current_url" value="">
                                            <input type="hidden" name="file_duration" value="">
                                            <input type="hidden" name="exclusive_duration" value="NULL">
                                            <input type="hidden" name="file_license" value="Right Managed">
                                      </div>
                                      <div class="price_footer">
                                            <button class="button success add_to_basket" 
                                            type="submit">Add to Basket</button>
                                      </div>
                                  </div>
                                 </form>
                                  <div class="tabs-panel" id="panel2">
                                    <p>Exclusive license means that the licensee/ the buyer has exclusive rights to the content (Images, Videos) they buy for a specific period of time. Meaning, the licensee will be the only person to use the content(s) for the stipulated period of time and within that period the content(s) will be inactive for purchase from any other licensee until the duration of the license expires. See our Exclusivity & Control page for more information.</p>

                                      <div class="row collapse">
                                         <div class="large-4 columns">
                                           Exlusive License :
                                         </div>
                                         <div class="large-8 columns exclusive-select"> 
                                               <select class="standard-select" id="exclusive-select" data-prompt="Exclusive License">
                                                   <option>Select Exclusive License</option>
                                                   <option value="<?php echo $ex_pricing[0]['photo_1month']; ?>"> 1 Month  </option>
                                                   <option value="<?php echo $ex_pricing[0]['photo_3month']; ?>"> 3 Months </option>
                                                   <option value="<?php echo $ex_pricing[0]['photo_6month']; ?>"> 6 Months </option>
                                                   <option value="<?php echo $ex_pricing[0]['photo_1year']; ?>"> 1 Year </option>
                                                   <option value="<?php echo $ex_pricing[0]['photo_2year']; ?>"> 2 Years </option>
                                               </select>
                                          </div> 
                                         <input type="hidden" name="exclusive_txt">
                                      </div>
                                      

                                      <div class="price_footer">
                                            License Fee : $
                                            <span class="file_price">
                                            00
                                      </div>
                                      <div class="price_footer">
                                            <button class="button success add_to_basket" 
                                            type="submit">Add to Basket</button>
                                      </div>

                                  </div>
                                </div>
                            </div>
                      </div>
                    </li>
                   </form>
                    <?php 
                      } else {
                  ?>
                  <li class="accordion-item search_details_accordion_item is-active " data-accordion-item>
                         <div class="search_price_exclusive">
                             <span class="">
                                 Available for purchase from <?php 
                                     echo date("F j, Y", strtotime($all_results[0]['exclusive_to']));   ?>
                             </span>
                         </div>
                   </li>
                       <?php 
                       }
                       ?> 
                    <hr style="border-top: solid 1px;" />
                    <!--
                    <li class="accordion-item search_details_accordion_item" data-accordion-item>
                      
                      <a href="#" class="accordion-title">
                        <i class="fa fa-download" aria-hidden="true"></i>
                         Download History
                      </a>
                      <div class="accordion-content search_details_accordion_content" data-tab-content>
                        <p>This shows the number of times this content has been downloaded within speci ed
                            region and sub region to help licensee understand the distribution of the content.</p>
                              <ul class="tabs" data-tabs id="example-tabs">
                                <span class="">
                                    <li class="tabs-title is-active"><a href="#africa" aria-selected="true">Africa (18)</a></li>
                                    <li class="tabs-title"><a href="#europe">Europe(0)</a></li>
                                    <li class="tabs-title"><a href="#n.america">N.America(0)</a></li>
                                    <li class="tabs-title"><a href="#s.america">S.America(0)</a></li>
                                    <li class="tabs-title"><a href="#asia">Asia(0)</a></li>
                                </span>
                              </ul>

                              <div class="tabs-content" data-tabs-content="example-tabs">
                                <div class="tabs-panel is-active" id="africa">
                                      <ul>
                                          <li>Kenya (5)</li>
                                          <li>Kenya (12)</li>
                                          <li>Uganda (1)</li>
                                      </ul>
                                </div>
                                <div class="tabs-panel" id="europe">
                                </div>
                                <div class="tabs-panel" id="n.america">
                                </div>
                                <div class="tabs-panel" id="s.america">
                                </div>
                                <div class="tabs-panel" id="asia">
                                </div>
                              </div>
                        </div>
                             
                    </li>
                      <hr style="border-top: solid 1px;" />
                     -->
                    
                    <li class="accordion-item search_details_accordion_item" data-accordion-item>
                      <a href="#" class="accordion-title">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                          See more images like this
                      </a>
                    </li>
                    
                    <!-- ... -->
                  </ul>
                  
            </div>
            <div class="row">
                <?php 
                if(is_array($all_results[0]['same_shoots'])){ ?>
                <div class="similar_links">
                  Same Shoot | <a href="<?php echo base_url('index.php/main/shoot/'.$all_results[0]['file_same_shoot_code']); ?>" target="_blank"> View All </a> 
                </div>
                <div class="large-12 columns similar-images">
                    <?php for($s=0; $s < count($all_results[0]['same_shoots']); $s++ ){ ?>
                    <div class="large-2 columns">
                    <div class="search_results_img">
                               <a href="<?php echo base_url('index.php/main/details/'.$all_results[0]['same_shoots'][$s]['upload_id']); ?>">
                                  <img class="search_imgs" src="<?php echo $all_results[0]['same_shoots'][$s]['file_thumbnail'] ?>"onerror="this.style.display='none'">
                               </a>

                             </div>
                    </div>
                    <?php } ?>
                </div>  
                <?php } ?>
                </div>
            </div>
            
       </div>

    