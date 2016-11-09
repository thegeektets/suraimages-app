   <div class="inside_body">
     

     <div class="large-2 columns search_bar" >
         <ul class="accordion" data-accordion>
           <li class="search_bar_item accordion-item" data-accordion-item>
             <a href="#" class="accordion-title" id="optimize-accordion">Optimize Your Search </a>
             <div class="accordion-content" data-tab-content>
             <form <?php echo form_open('main/optimize_search/'.$search_term); ?>
               <ul class="vertical menu" data-accordion-menu>
                 <li>
                   <a href="#">License Type</a>
                   <ul class="menu vertical nested">
                     <li>
                       <select  name="license_type" class="accordion_select">
                          <option value="">Select License </option>
                          <option value="royalty">Royalty Free</option>
                          <option value="right">Right Managed</option>
                       </select>

                     </li>
                   </ul>
                 </li>
                 <li>
                   <a href="#">Image Type</a>
                   <ul class="menu vertical nested">
                     <li>
                       <select  name="image_type" class="accordion_select">
                          <option value="">Select Image Type</option>
                          <option value="creative">Creative Image</option>
                          <option value="editorial">Editorial Image</option>
                       </select>
                     </li>
                   </ul>
                 </li>
                 <li>
                   <a href="#">Orientation</a>
                   <ul class="menu vertical nested">
                     <li>
                       <select  name="orientation" class="accordion_select">
                          <option value="">Select Orientation</option>
                          <option value="landscape">Landscape </option>
                          <option value="potrait">Potrait</option>
                       </select>
                     </li>
                   </ul>
                 </li>
                 <li>
                   <a href="#">People</a>
                   <ul class="menu vertical nested">
                     <li>
                       <select class="accordion_select" name="people">
                         <option value="">People</option>
                         <option value="0">0</option>
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

                     </li>
                   </ul>
                 </li>
                 <li>
                   <a href="#">Category</a>
                   <ul class="menu vertical nested">
                     <li>
                         <select name="category" class="accordion_select slc_category">
                             <option value="">Select Category </option>
                             <option value="Abstract">Abstract</option>
                             <option value="Agriculture">Agriculture/ Farming </option>
                             <option value="Animals">Animals/ Livestock </option>
                             <option value="Arts">Arts/ Entertainment </option>
                             <option value="Beauty">Beauty/ Fashion </option>
                             <option value="Business">Business </option>
                             <option value="Buildings">Buildings/ Landmarks </option>
                             <option value="Celebrity">Celebrity </option>
                             <option value="Education">Education </option>
                             <option value="Food">Food/ Cuisines </option>
                             <option value="Beverage">Beverage/ Drink </option>
                             <option value="Medical">Medical/ Healthcare </option>
                             <option value="Holiday">Holiday </option>
                             <option value="Industrial">Industrial </option>
                             <option value="Interior">Interior </option>
                             <option value="Nature">Nature </option>
                             <option value="Outdoor">Outdoor </option>
                             <option value="People">People </option>
                             <option value="Religion">Religion </option>
                             <option value="Signs">Signs/ Symbols </option> 
                             <option value="Sports">Sports </option>
                             <option value="ICT">ICT/ Technology </option>
                             <option value="Infrastructure">Infrastructure </option>
                             <option value="Vintage">Vintage </option>
                             <option value="Telecommunication">Telecommunication </option>
                             <option value="Tourism">Tourism/ Hospitality </option>
                             <option value="Wildlife">Wildlife </option>
                         </select> 
                     </li>
                   </ul>
                 </li>
                 <li>
                   <a href="#">Contributor</a>
                   <ul class="menu vertical nested">
                     <li>
                      <select name="contributor" class="accordion_select">
                        <option value="">Select Contributor </option>
                         <?php for($i=0;$i<count($contributors);$i++){ ?>
                         <option value="<?php echo $contributors[$i]['user_id'] ?>">
                            <?php echo $contributors[$i]['firstname']." ".$contributors[$i]['middlename']; ?> </option>
                         <?php } ?>
                     </select>  
                     </li>
                   </ul>
                 </li>
                 
               </ul>
               <div class="search-footer">
                 <button class="button btn-search" type="submit" > Search </button>
                 <a class="button btn-clear" href="<?php echo base_url('index.php/main/search/ ')?>"> Clear </a>
               </div>
             </form>
             </div>
           </li>
           <!-- ... -->
         </ul>
     </div>

    <div class="large-10 columns pull-right no-padding">
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


    <?php  if(count($all_results) > 0 ){ ?>
    <div class="large-10 columns pull-right search_results no-padding">
         
          <div class="large-12 columns">
            <div class="mosaicflow group">
            <?php 
              $sameshoot='';
              for($i=0; $i< count($all_results); $i++) {

                if($all_results[$i]['file_same_shoot_code'] === NULL ||
                  strlen($all_results[$i]['file_same_shoot_code']) === 0 ){
               ?>
    
                <div class="mosaicflow__item search_results_img">
                  <a href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>" class="search_img">
                     <img src="<?php echo $all_results[$i]['file_thumbnail'] ?>" onerror="this.style.display='none'" >
                  </a>
                  <div class="search_img_details"> 
                      <span class="search_img_title"> <?php echo $all_results[$i]['file_name'] ?></span>
                      <span class="search_img_icons">
                          <a target="_blank" href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>"><i class="fa fa-calculator" aria-hidden="true"></i></a>
                          <a href="" class="shopping_basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                          <a href="<?php echo base_url('index.php/main/similar_images/'.$all_results[$i]['upload_id']); ?>">
                          <img style="width: 17px;margin-top: 3px;margin-left: 1px;"src="<?php echo base_url() ?>/assets/non_member/icons/expand.png"></a>
                      </span>
                  </div>

                  <?php 

                    if ($all_results[$i]['file_license'] == 'Royalty Free'){
                      require 'result_pop.php'; 
                    } else {
                      require 'result_pop_img_managed.php' ;
                    }
                  ?>
                
                </div>

            <?php } else {
                    if(strlen($sameshoot) !== 0){
                      if($sameshoot !== $all_results[$i]['file_same_shoot_code'] ){
                        $sameshoot = $all_results[$i]['file_same_shoot_code'];  
            ?>      
                        <div class="mosaicflow__item search_results_img">
                          <a href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>" class="search_img">
                             <img src="<?php echo $all_results[$i]['file_thumbnail'] ?>" onerror="this.style.display='none'" >
                          </a>
                          <div class="search_img_details"> 
                              <span class="search_img_title"> <?php echo $all_results[$i]['file_name'] ?></span>
                              <span class="search_img_icons">
                                  <a target="_blank" href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>"><i class="fa fa-calculator" aria-hidden="true"></i></a>
                                  <a href="" class="shopping_basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                  <a href="<?php echo base_url('index.php/main/similar_images/'.$all_results[$i]['upload_id']); ?>">
                                  <img style="width: 17px;margin-top: 3px;margin-left: 1px;"src="<?php echo base_url() ?>/assets/non_member/icons/expand.png"></a>
                              </span>
                          </div>
                          <?php 

                            if ($all_results[$i]['file_license'] == 'Royalty Free'){
                              require 'result_pop.php'; 
                            } else {
                              require 'result_pop_img_managed.php' ;
                            }
                          ?>
                        </div>            
            <?php     }

                    } else {
                      $sameshoot = $all_results[$i]['file_same_shoot_code'];
            ?>
                    <div class="mosaicflow__item search_results_img">
                      <a href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>" class="search_img">
                         <img src="<?php echo $all_results[$i]['file_thumbnail'] ?>" onerror="this.style.display='none'" >
                      </a>
                      <div class="search_img_details"> 
                          <span class="search_img_title"> <?php echo $all_results[$i]['file_name'] ?></span>
                          <span class="search_img_icons">
                              <a target="_blank" href="<?php echo base_url('index.php/main/details/'.$all_results[$i]['upload_id']); ?>"><i class="fa fa-calculator" aria-hidden="true"></i></a>
                          <a href="" class="shopping_basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                          <a href="<?php echo base_url('index.php/main/similar_images/'.$all_results[$i]['upload_id']); ?>">
                          <img style="width: 17px;margin-top: 3px;margin-left: 1px;"src="<?php echo base_url() ?>/assets/non_member/icons/expand.png"></a>
                          </span>
                      </div>
                      <?php 

                        if ($all_results[$i]['file_license'] == 'Royalty Free'){
                          require 'result_pop.php'; 
                        } else {
                          require 'result_pop_img_managed.php' ;
                        }
                      ?>
                    </div>
            <?php   } } } ?>
            </div>
              <div style="clear: both"></div>
          </div>
    </div>
    <?php } else { 
            require 'no_results.php';
     } ?>
   