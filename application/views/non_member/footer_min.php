 <div class="large-12 columns bottom_search">
              <div class="large-3 columns pull-left no-padding">
                  <form class="frm_home_search" on" <?php echo form_open('main/start_search'); ?>
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
              <div class="large-4 columns pull-right no-padding">
                   <span class="search_pagination"> 
                 
                     Page <input type="number" name="page_number" placeholder="1" value="1" class="page_number"> of <span class="total_pages">120</span> 
                    <a href="" class="prev_page"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                    <a href="" class="next_page"><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                 </span>
              </div>
    </div>
    <div style="clear: both"></div>
  </div>
 
