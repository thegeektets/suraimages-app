  <body class="inside_page_body">

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Sura Images </div>
    </div>

   <div class="top-bar" id="main-menu">
          <div class="row">
            <div class="top-bar-left">
                <div class="home_logo">
            </div>
            </div>
             <div class="top-bar-right">
                  <ul class="menu" data-responsive-menu="medium-dropdown">
                    <li class="menu-text menu-divider"> <a href="<?php echo base_url('/index.php/registration/login')?>">Sign in  </a></li>
                    <li class="menu-text menu-divider"><a href="#"> <a href="<?php echo base_url('/index.php/registration')?>">Register </a></li>
                    <li class="menu-text"><a href="#" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (2)</a></li>
                  </ul>
              </div>
           </div>
    </div>

 

  <div class="inside_body">
      <div class="row collapse">
            <div class="large-6 columns pull-left">
                    <form class="inside_search_frm">
                      <input type="text" name="search" placeholder="Forest" class="inside_search_txt">
                      <select class="inside_search_slc">
                          <option value="Images">Images</option>
                          <option value="Videos">Vidoes</option>
                          <option value="Illustrations">Illustrations</option>
                      </select>
                      <button type="submit" class="inside_search_btn">
                          <i class="fa fa-search fa-2x" aria-hidden="true" style="color: #f8991c"></i>
                      </button>
                    </form>
            </div>
       </div>
       <div class="row collapse">
            <div class="large-6 columns pull-left">
                <img src="<?php echo $all_results[0]['file_thumbnail'] ?>" class="search_display_img">
                 <div class="similar_links pull-right">
                   <a download href="<?php echo $all_results[0]['file_thumbnail'] ?>"> Download Sample Image </a> 
                 </div>
                <div class="search_popup_details">

                    <div class="search_popup_title">Title 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"><?php echo $all_results[0]['file_name'] ?></div>

                    <div class="search_popup_title">Image ID 
                      <span class="pull-right">:</span>
                    </div>
                    <div class="search_popup_content"><?php echo $all_results[0]['upload_id'] ?></div>

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
                  <ul class="accordion search_details_accordion" data-accordion>
                   
                    <li class="accordion-item search_details_accordion_item is-active " data-accordion-item>
                      
                      <a href="#" class="accordion-title">
                          <i class="fa fa-calculator" aria-hidden="true"></i>
                         View Price 
                      </a>
                      
                      <div class="accordion-content search_details_accordion_content" data-tab-content>
                            <div>
                                <ul class="tabs" data-tabs id="example-tabs">
                                  <span class="center_tabs">
                                      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Standard License</a></li>
                                      <li class="tabs-title"><a href="#panel2">Exclusive License</a></li>
                                  </span>
                                </ul>

                                <div class="tabs-content" data-tabs-content="example-tabs">
                                  <div class="tabs-panel is-active" id="panel1">
                                      <hr style="border-top: solid 1px;" />
                                      <div class="row">
                                          <div class="quality_column">
                                            <input type="radio" name="quality" value="<?php echo round(($all_results[0]['file_price_large']/3),2)?>"> Small
                                          </div>
                                          <div class="desc_column">
                                              <p>
                                                 <span class="file_dimensions">
                                                  <?php
                                                    echo (round($all_results[0]['file_width']/3,0)).' x '.(round($all_results[0]['file_height']/3)).'px';
                                                  ?>
                                                  |
                                                </span>
                                                <span class="file_s_size"> 
                                                  <?php echo ($all_results[0]['file_size']/3)?>
                                                </span>
                                              </p>
                                          </div>
                                          <div class="price_column">
                                             <span class="price">$<?php echo round(($all_results[0]['file_price_large']/3),2)?></span>
                                          </div>
                                      </div>
                                      <hr style="border-top: solid 1px;" />
                                      <div class="row">
                                          <div class="quality_column">
                                          <input type="radio" name="quality" value="<?php echo round(($all_results[0]['file_price_large']/2),2)?>"> Medium
                                          </div>
                                          <div class="desc_column">
                                             <p>
                                               <span class="file_dimensions">
                                                 <?php
                                                    echo (round($all_results[0]['file_width']/2,0)).' x '.(round($all_results[0]['file_height']/2)).'px';
                                                  ?>
                                                 |
                                               </span>
                                               <span class="file_m_size"> 
                                                 <?php echo ($all_results[0]['file_size']/2)?>
                                               </span>
                                             </p>
                                          </div>
                                          <div class="price_column">
                                             <span class="price">$<?php echo round(($all_results[0]['file_price_large']/2),2)?></span>
                                          </div>
                                      </div>
                                      <hr style="border-top: solid 1px;" />
                                      <div class="row">
                                          <div class="quality_column">
                                            <input type="radio" name="quality" value="<?php echo round(($all_results[0]['file_price_large']),2)?>">  Large
                                          </div>
                                          <div class="desc_column">
                                            <p>
                                              <span class="file_dimensions">
                                                <?php
                                                    echo 
                                                       $all_results[0]['file_width'].' x '.$all_results[0]['file_height'].'px';
                                                  ?>
                                                |
                                              </span>
                                              <span class="file_l_size"> 
                                                <?php echo $all_results[0]['file_size']?>
                                              </span>
                                            </p>
                                          </div>
                                          <div class="price_column">
                                            <span class="price">$<?php echo $all_results[0]['file_price_large']?></span>
                                          </div>
                                      </div>
                                      <div class="price_footer">
                                            License Fee : $
                                            <span class="file_price">
                                            00
                                            </span>
                                      </div>
                                      <div class="price_footer">
                                            <button class="button success"> Add to Basket</button>
                                      </div>
                                  </div>
                                  <div class="tabs-panel" id="panel2">
                                    <p>Exclusive license means that the licensee/ the buyer has exclusive rights to the content (Images, Videos) they
                                      buy for a speci ed period of time. Meaning, the licensee will be the only person to use the content s for the
                                      stipulated period of time and within that period the content s will be inactive for purchase from any other
                                      licensee until the duration of the license e pires. See our Exclusivity & Control page for more information.</p>

                                      <div class="">
                                        <input type="radio" name="duration"> 1 Month </br> 
                                        <input type="radio" name="duration"> 3 Months </br> 
                                        <input type="radio" name="duration"> 6 Months </br> 
                                        <input type="radio" name="duration"> 1 Year </br> 
                                        <input type="radio" name="duration"> 2 Years </br> 
                                      </div>

                                      <div class="price_footer">
                                            License Fee : $00
                                      </div>
                                      <div class="price_footer">
                                            <button class="button success"> Add to Basket</button>
                                      </div>

                                  </div>
                                </div>
                            </div>
                      </div>
                    </li>
                    <hr style="border-top: solid 1px;" />
                    
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
                      <img src="<?php echo $all_results[0]['same_shoots'][$s]['file_url'] ?>" class="search_img" onerror="this.style.display='none'">
                    </div>
                    <?php } ?>
                </div>  
                <?php } ?>
                </div>
            </div>
            
       </div>

    