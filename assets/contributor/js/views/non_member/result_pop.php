<div class="search_img_popup">
  <div class="search_close_popup">
      <a class="close_popup"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
  </div>
<div class="row">
    <div class="large-6 columns medium-6 columns">
        <img src="<?php echo $all_results[$i]['file_url'] ?>" class="search_display_img">

        <div class="search_popup_details">

            <div class="search_popup_title">Title 
              <span class="pull-right">:</span>
            </div>
            <div class="search_popup_content"> <?php echo $all_results[$i]['file_name'] ?></div>

            <div class="search_popup_title">Image ID 
              <span class="pull-right">:</span>
            </div>
            <div class="search_popup_content"> <?php echo $all_results[$i]['upload_id'] ?></span></div>

            <div class="search_popup_title" >Release Information 
              <span class="pull-right">:</span>
            </div>
            
            <div class="search_popup_content">
                <?php if(count($all_results[$i]['releases']) > 0) { ?>
                        Yes
                <?php }  else { ?>
                        No
                <?php } ?>
            </div>



        </div>
        <hr style="border-top: dotted 1px;" />
    </div>
    <div class="large-6 columns  medium-6 columns">
        <hr style="border-top: solid 1px;" />
        <ul class="accordion search_accordion" data-accordion>
         
          <li class="accordion-item search_accordion_item is-active " data-accordion-item>
            
            <a href="#" class="accordion-title">
                <i class="fa fa-calculator" aria-hidden="true"></i>
               View Price 
            </a>
            
           <div class="accordion-content search_popup_accordion_content" data-tab-content>
                 <div>
                     <ul class="tabs" data-tabs id="example-tabs">
                       <span class="">
                           <li class="tabs-title is-active"><a href="
                           <?php echo "#panel1".trim($all_results[$i]['upload_id'])?>" aria-selected="true">Standard License</a></li>
                           <li class="tabs-title"><a href="
                           <?php echo "#panel2".trim($all_results[$i]['upload_id'])?>">Exclusive License</a></li>
                       </span>
                     </ul>

                     <div class="tabs-content" data-tabs-content="example-tabs">
                       <div class="tabs-panel is-active" id="panel1<?php echo trim($all_results[$i]['upload_id'])?>">
                           <hr style="border-top: solid 1px;" />
                           <div class="row">
                               <div class="quality_column">
                                 <input type="radio" name="quality"> Small
                               </div>
                               <div class="desc_column">
                                   <span class="file_dimensions">
                                    <?php
                                      list($width, $height) = getimagesize($all_results[$i]['file_url']);
                                      echo (round($width/3,0)).' x '.(round($height/3)).'px';
                                    ?>
                                    |
                                  </span>
                                  <span class="file_s_size"> 
                                    <?php echo ($all_results[$i]['file_size']/3)?>
                                  </span>
                                   </p>
                               </div>
                               <div class="price_column">
                                 <span class="price">$<?php echo round(($all_results[$i]['file_price_large']/3),2)?></span>
                               </div>
                           </div>
                           <hr style="border-top: solid 1px;" />
                           <div class="row">
                               <div class="quality_column">
                                 <input type="radio" name="quality"> Medium
                               </div>
                               <div class="desc_column">
                                  <span class="file_dimensions">
                                    <?php
                                      list($width, $height) = getimagesize($all_results[$i]['file_url']);
                                      echo round(($width/2),0).' x '.round(($height/2),0).'px';
                                    ?>
                                    |
                                  </span>
                                  <span class="file_m_size"> 
                                    <?php echo ($all_results[$i]['file_size']/2)?>
                                  </span>
                                  </p>
                               </div>
                               <div class="price_column">
                                  <span class="price">$<?php echo round(($all_results[$i]['file_price_large']/2),2)?></span>
                               </div>
                           </div>
                           <hr style="border-top: solid 1px;" />
                           <div class="row">
                               <div class="quality_column">
                                 <input type="radio" name="quality"> Large
                               </div>
                               <div class="desc_column">
                                 <p>
                                  <span class="file_dimensions">
                                    <?php
                                      list($width, $height) = getimagesize($all_results[$i]['file_url']);
                                      echo $width.' x '.$height.'px';
                                    ?>
                                    |
                                  </span>
                                  <span class="file_l_size"> 
                                    <?php echo $all_results[$i]['file_size']?>
                                  </span>
                                 </p>
                               </div>
                               <div class="price_column">
                                 <span class="price">$<?php echo $all_results[$i]['file_price_large']?></span>
                               </div>
                           </div>
                           <div class="price_footer">
                                 License Fee : $00
                           </div>
                           <div class="price_footer">
                                 <button class="button success"> Add to Basket</button>
                           </div>
                       </div>
                       <div class="tabs-panel" id="panel2<?php echo trim($all_results[$i]['upload_id'])?>">
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
          
          <li class="accordion-item search_accordion_item" data-accordion-item>
            
            <a href="#" class="accordion-title">
              <i class="fa fa-download" aria-hidden="true"></i>
               Download History
            </a>
                  <div class="accordion-content search_popup_accordion_content" data-tab-content>
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
     
          <li class="accordion-item search_accordion_item" data-accordion-item>
            <a href="#" class="accordion-title">
              <i class="fa fa-clone" aria-hidden="true"></i>
                See more images like this
            </a>
          </li>
          
          <!-- ... -->
        </ul>
    </div>
</div>
<div class="row">
    <?php 
    if(is_array($all_results[$i]['same_shoots'])){ ?>
    <div class="similar_links color-white">
      Same Shoot | <a href="<?php echo base_url('index.php/main/shoot/'.$all_results[$i]['file_same_shoot_code']); ?>" target="_blank"> View All </a> 
    </div>
    <div class="large-12 columns pop-similar-images">
        <?php for($s=0; $s < count($all_results[$i]['same_shoots']); $s++ ){ ?>
        <div class="large-2 columns">
          <img src="<?php echo $all_results[$i]['same_shoots'][$s]['file_url'] ?>" class="search_img" onerror="this.style.display='none'">
        </div>
        <?php } ?>
    </div>  
    <?php } ?>
    </div>
</div>
