<div class="tabs-panel is-active" id="images">
    <div class="large-12 columns">
      <div class="alert_message">
          <img src="<?php echo base_url('/assets/contributor/img/alert.png')?>" class="alert_pic">
          Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
      </div>
    </div>
    <form id="video_form" method="post" enctype ='multipart/form-data' onsubmit="return submit_videos();">
      <div class="row">
          <div class="large-10 columns pull-right">
             Upload HD 1080p videos with each file not exceeding 3G in size and maximum of 10 files per upload.(select more than one to upload multiple files)
           </div>
           <div class="large-2 columns pull-left">   
              <input type="file" name="videofiles[]"  class="video_filer" multiple="multiple">
            </div>
          
      </div>
      <div class="tab_content" id="upload_video">
           <div class="message pull-left">
           </div>
           <button class="button btn_upload_multi" type="submit"> Continue </button>
      </div>
      </form>
   <div style="clear: both"></div> 
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
                  <option value="Attach Release"> Attach Release </option>
                  <option value="Same Shoot"> Same Shoot </option>
                  <option value="Model Notification"> Model Notification </option>
                  <option value="Delete" class="delete_option"> Delete </option>
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
              <button class="button btn_upload submit_changes" id="submit_changes" onclick="return editvideocontributor()" >Submit Changes </button>
           </div>
       </div>
       <div style="clear: both"></div>
   </div> 
<div style="clear: both"></div>
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
      <div class="large-2 column">
          Keywords
      </div>
      <div class="large-1 column">
          Price
      </div>
      <div class="large-2 column">
          Status
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
      <form name="edit_video_contributor" id="edit_video_contributor" onsubmit="return editvideocontributor();">
      
          <?php for($i=0; $i< count($contributor_videos); $i++) { ?>
          <div class="report_item edit_item">
            <div class="row collapse">
              <div class="large-1 column report_col">
                  <input type="checkbox" name="file_select" class="select_file">
                  <article class="video">
                      <figure>
                          <a target="iframe-name" class ="thumbnails" href="<?php echo $contributor_videos[$i]['file_url']; ?>"><img class="videoThumb" src="<?php echo base_url('assets/contributor/img/video_default.png')?>"></a>
                      </figure>
                  </article>
              </div>
              <div class="large-1 column report_col">
                  <?php echo $contributor_videos[$i]['upload_id']; ?>
                  <input type="hidden" name="file_id[]" class="file_id" value="<?php echo $contributor_videos[$i]['upload_id']; ?>">
              </div>
              <div class="large-2 column report_col">
                  <?php echo $contributor_videos[$i]['file_name']; ?>
                  <input  required="required" type="hidden" name="file_name[]" placeholder="Name" class="file_name" value="<?php echo $contributor_videos[$i]['file_name']; ?>">
              </div>

              <div class="large-2 column report_col">
                  <p> <?php $keys = explode(",", $contributor_videos[$i]['file_keywords']); 
                            for($k=0; $k < count($keys); $k++ ) {
                                echo $keys[$k].", ";
                            }
                      ?> </p>
                  <textarea  required="required"  type="hidden" name="file_keywords[]" class="file_keywords"  placeholder="0000">
                          <?php echo $contributor_videos[$i]['file_keywords']?>
                  </textarea>
              </div>
              <div class="large-1 column report_col">
                  <?php echo $contributor_videos[$i]['file_price_large']; ?>

                  <input  type="hidden" name="file_price_large[]" placeholder="Price" value="<?php echo $contributor_videos[$i]['file_price_large']?>" class="file_price_large">
                  
                  <input  type="hidden" name="file_price_medium[]" placeholder="Medium" readonly="readonly" value="<?php echo $contributor_videos[$i]['file_price_medium']?>" class="form_group">
                  
                  <input  type="hidden" name="file_price_small[]" value="<?php echo $contributor_videos[$i]['file_price_small']?>" readonly="readonly" placeholder="Low" class="form_group">
                  <select name="file_type[]" style="display:none;" required="required" class="file_type">
                    <option>Select Image Type</option>
                    <option value="Creative Image" <?php if($contributor_videos[$i]['file_type'] == "Creative Image" ) echo 'selected = "selected"'?> > Creative Image</option>
                    <option value="Editorial Image" <?php if($contributor_videos[$i]['file_type'] == "Editorial Image" ) echo 'selected = "selected"'?> > Editorial Image</option>
                  </select>
                  <select name="file_subtype[]" style="display:none;" required="required" class="file_subtype">
                    <option>Select Image Subtype</option>
                    <option value="Photography" <?php if($contributor_videos[$i]['file_subtype'] == "Photography" ) echo 'selected = "selected"'?> >Photography </option>
                    <option value="Illustration" <?php if($contributor_videos[$i]['file_subtype'] == "Illustration" ) echo 'selected = "selected"'?> >Illustration</option>
                    <option value="All">All</option>
                  </select>
                  <select name="file_orientation[]" type="hidden" required="required" class="file_orientation">
                    <option>Select Orientation</option>
                    <option value="Landscape" <?php if($contributor_videos[$i]['file_orentiation'] == "Landscape" ) echo 'selected = "selected"'?> >Landscape </option>
                    <option value="Potrait" <?php if($contributor_videos[$i]['file_orentiation'] == "Potrait" ) echo 'selected = "selected"'?> >Potrait</option>
                  </select>
                  
                  <select name="file_people[]" style="display:none;" required="required" class="file_people">
                    <option>Select number of people </option>
                    <option value="1" <?php if($contributor_videos[$i]['file_people'] == "1" ) echo 'selected = "selected"'?> >1</option>
                    <option value="2" <?php if($contributor_videos[$i]['file_people'] == "2" ) echo 'selected = "selected"'?>  >2</option>
                    <option value="3" <?php if($contributor_videos[$i]['file_people'] == "3" ) echo 'selected = "selected"'?>  >3</option>
                    <option value="4" <?php if($contributor_videos[$i]['file_people'] == "4" ) echo 'selected = "selected"'?>  >4</option>
                    <option value="5" <?php if($contributor_videos[$i]['file_people'] == "5" ) echo 'selected = "selected"'?>  >5</option>
                    <option value="6" <?php if($contributor_videos[$i]['file_people'] == "6" ) echo 'selected = "selected"'?>  >6</option>
                    <option value="7" <?php if($contributor_videos[$i]['file_people'] == "7" ) echo 'selected = "selected"'?>  >7</option>
                    <option value="8" <?php if($contributor_videos[$i]['file_people'] == "8" ) echo 'selected = "selected"'?>  >8</option>
                    <option value="9" <?php if($contributor_videos[$i]['file_people'] == "9" ) echo 'selected = "selected"'?>  >9</option>
                    <option value="10" <?php if($contributor_videos[$i]['file_people'] == "10" ) echo 'selected = "selected"'?>  >10</option>
                  </select>
                  <input  type="hidden" name="file_shoot[]" class="file_shoot"
                  value="<?php echo $contributor_videos[$i]['file_same_shoot_code']?>" placeholder="">
                  
              </div>
              <div class="large-2 column report_col">
                    <?php if( $contributor_videos[$i]['file_status'] == 0 ) { ?>
                      <span class="status_waiting"> 
                          Waiting
                      </span>
                    <?php } else if ($contributor_videos[$i]['file_status'] == 1 ) { ?>
                      <span class="status_approved"> 
                          Approved
                      </span>
                    <?php } else { ?>
                      <span class="status_declined"> 
                          Declined
                      </span>
                    <?php } ?>
              </div>

              <div class="large-1 column report_col">
                      <a href=""> View</a>
              </div>
              <div class="large-2 column report_col">
               <?php  echo date("F j, Y", strtotime($contributor_videos[$i]['date_uploaded']));   ?>
              </div>
             </div>
          </div>

      <?php } ?>
      </form>

</div>
<div style="clear: both"></div>     
</div>
