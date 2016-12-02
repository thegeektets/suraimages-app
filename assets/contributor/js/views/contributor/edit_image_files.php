<div class="tabs-panel is-active" id="images">
    <div class="large-12 columns">
      <div class="alert_message">
          <img src="<?php echo base_url('assets/contributor/img/alert.png')?>" class="alert_pic">
          Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is
          worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
      </div>
    </div>
    <hr/>
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
              <form class="attach_release" onsubmit="return add_release();">
                <div class="add_title">
                 Attach Release  : 
                <select  name="all_file_release" class="inline_input">
                      <option>Select Releases </option>
                      <?php for($r=0; $r < count($contributor_releases); $r++) { ?>
                        <option value="<?php echo $contributor_releases[$r]['release_id'] ?>"> 
                        <?php echo $contributor_releases[$r]['release_name'] ?> 
                        </option>
                      <?php } ?>
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
                        <button type="submit" class="button success pull-left" onclick="return cancel_delete() ">
                            Cancel Process
                        </button>
                        <button type="submit" class="button btn_search pull-right" onclick="return submit_delete()">
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
             <div class="pull-right">
                <button onclick="return editimagecontributor();" class="button btn_upload">Submit For Approval </button>  
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    
    <div class="report_header">
       <div class="row">
          <div class="large-12 columns">
             <input type="checkbox" name="" class="select_all">
          </div>
          <div style="clear: both"></div>
       </div>
    </div> 
    <form  name="edit_image_contributor" id="edit_image_contributor" onsubmit="return editimagecontributor();">
      <div class="edit_content">
        <?php for($i=0; $i< count($contributor_images); $i++) { ?>
          <div class="edit_item">
             <div class="row">
                <div class="large-2 column">
                  <input type="checkbox" name="file_select" class="select_file">
                  <img src="<?php echo $contributor_images[$i]['file_url']; ?>" class="edit_file_img">
                </div>
                <div class="large-4 column">
                        <label>Title : <span class="required_asteric">*</span></label>
                        <input type="hidden" name="file_id[]" class="file_id" value="<?php echo $contributor_images[$i]['upload_id']; ?>">
                        <input type="text" required="required" name="file_name[]" placeholder="Name" class="file_name" value="<?php echo $contributor_images[$i]['file_name']; ?>">
                        <label> Key Words : <span class="required_asteric">*</span></label>
                        <textarea  required="required"   name="file_keywords[]" class="form_group" type="text" placeholder="0000">
                                <?php echo $contributor_images[$i]['file_keywords']?>
                        </textarea>
                </div>
                <div class="large-3 column">
                      Set Price 
                      <span class="question_wrap">
                          <span class="question_this">
                             <img src="<?php echo base_url('assets/contributor/icons/question.png')?>">
                          </span>
                          <span class="question_text">
                               <a class="question_close">
                                   <i class="fa fa-times" aria-hidden="true"></i>
                               </a>
                                This is a quick way of setting a similar price on multiple files. Please note your price should not be more than $150 or less than $20. Also, you only set the price for the large file the rest will be generated automatic based on the % per price of the large file i.e Medium file is 54% the price of the large file and Small file is 22% the price of the large file
                          </span>
                      </span>
                      <div class="alert">
                              Your price should not be more than $150 or less than $20
                      </div>
                      <div class="row collapse">
                          <div class="large-4 columns">
                                <input type="text" name="file_price_large[]" placeholder="Price" value="<?php echo $contributor_images[$i]['file_price_large']?>" class="file_price_large">
                          </div>
                          <div class="large-4 columns">
                                <input type="text" name="file_price_medium[]" placeholder="Medium" readonly="readonly" value="<?php echo $contributor_images[$i]['file_price_medium']?>" class="form_group">
                          </div>
                          <div class="large-4 columns">
                                <input type="text" name="file_price_small[]" value="<?php echo $contributor_images[$i]['file_price_small']?>" readonly="readonly" placeholder="Low" class="form_group">
                          </div>
                      </div>
                      <div class="row">
                              <div class="large-5 columns">
                                  <label>Category:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select multiple="multiple" class="slc_category file_category"
                                  name="<?php echo 'file_category'.
                                  $contributor_images[$i]['upload_id'] ?>[]">
                                    <option>Select Categories</option>
                                    <?php 
                                      $categories = explode(",", $contributor_images[$i]['file_category']);
                                       for($c=0; $c < count($categories); $c++) { 
                                    ?>
                                      <option value="<?php echo $categories[$c]; ?>" selected="selected">
                                        <?php echo $categories[$c];?>
                                      </option>
                                      <?php } ?> 
                                     <option value="Abstract" <?php if($contributor_images[$i]['file_category'] == "Abstract" ) echo 'selected = "selected"'?> >Abstract</option>
                                     <option value="Agriculture/Farming"
                                      <?php if($contributor_images[$i]['file_category'] == "Agriculture/Farming" ) echo 'selected = "selected"'?> >Agriculture/ Farming </option>
                                     <option value="Animals/Livestock"
                                     <?php if($contributor_images[$i]['file_category'] == "Animals/Livestock" ) echo 'selected = "selected"'?>>Animals/ Livestock </option>
                                     <option value="Arts/Entertainment"
                                     <?php if($contributor_images[$i]['file_category'] == "Arts/Entertainment" ) echo 'selected = "selected"'?>>Arts/ Entertainment </option>
                                     <option value="Beauty/Fashion"
                                     <?php if($contributor_images[$i]['file_category'] == "Beauty/Fashion" ) echo 'selected = "selected"'?>>Beauty/ Fashion </option>
                                     <option value="Business" <?php if($contributor_images[$i]['file_category'] == "Business" ) echo 'selected = "selected"'?>>Business </option>
                                     <option value="Buildings/Landmarks"
                                     <?php if($contributor_images[$i]['file_category'] == "Buildings/Landmarks" ) echo 'selected = "selected"'?>>Buildings/ Landmarks </option>
                                     <option value="Celebrity" <?php if($contributor_images[$i]['file_category'] == "Celebrity" ) echo 'selected = "selected"'?>>Celebrity </option>
                                     <option value="Education" <?php if($contributor_images[$i]['file_category'] == "Education" ) echo 'selected = "selected"'?>>Education </option>
                                     <option value="Food/Cuisines" <?php if($contributor_images[$i]['file_category'] == "Food/Cuisines" ) echo 'selected = "selected"'?> >Food/ Cuisines </option>
                                     <option value="Beverage/Drink" <?php if($contributor_images[$i]['file_category'] == "Beverage/Drink" ) echo 'selected = "selected"'?>>Beverage/ Drink </option>
                                     <option value="Medical/Healthcare" <?php if($contributor_images[$i]['file_category'] == "Medical/Healthcare" ) echo 'selected = "selected"'?> >Medical/ Healthcare </option>
                                     <option value="Holiday" <?php if($contributor_images[$i]['file_category'] == "Holiday" ) echo 'selected = "selected"'?> >Holiday </option>
                                     <option value="Industrial" <?php if($contributor_images[$i]['file_category'] == "Industrial" ) echo 'selected = "selected"'?>>Industrial </option>
                                     <option value="Interior" <?php if($contributor_images[$i]['file_category'] == "Interior" ) echo 'selected = "selected"'?> >Interior </option>
                                     <option value="Nature" <?php if($contributor_images[$i]['file_category'] == "Nature" ) echo 'selected = "selected"'?> >Nature </option>
                                     <option value="Outdoor" <?php if($contributor_images[$i]['file_category'] == "Outdoor" ) echo 'selected = "selected"'?> >Outdoor </option>
                                     <option value="People" <?php if($contributor_images[$i]['file_category'] == "People" ) echo 'selected = "selected"'?> >People </option>
                                     <option value="Religion" <?php if($contributor_images[$i]['file_category'] == "Religion" ) echo 'selected = "selected"'?> >Religion </option>
                                     <option value="Signs/Symbols" <?php if($contributor_images[$i]['file_category'] == "Signs/Symbols" ) echo 'selected = "selected"'?> >Signs/ Symbols </option> 
                                     <option value="Sports" <?php if($contributor_images[$i]['file_category'] == "Sports" ) echo 'selected = "selected"'?> >Sports </option>
                                     <option value="ICT/Technology" <?php if($contributor_images[$i]['file_category'] == "ICT/Technology" ) echo 'selected = "selected"'?> >ICT/ Technology </option>
                                     <option value="Infrastructure" <?php if($contributor_images[$i]['file_category'] == "Infrastructure" ) echo 'selected = "selected"'?>>Infrastructure </option>
                                     <option value="Vintage"  <?php if($contributor_images[$i]['file_category'] == "Vintage" ) echo 'selected = "selected"'?> >Vintage </option>
                                     <option value="Telecommunication" <?php if($contributor_images[$i]['file_category'] == "Telecommunication" ) echo 'selected = "selected"'?> >Telecommunication </option>
                                     <option value="Tourism/Hospitality" <?php if($contributor_images[$i]['file_category'] == "Tourism/Hospitality" ) echo 'selected = "selected"'?>  >Tourism/ Hospitality </option>
                                     <option value="Wildlife" <?php if($contributor_images[$i]['file_category'] == "Wildlife" ) echo 'selected = "selected"'?> >Wildlife </option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>Image Type:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_type[]" required="required">
                                    <option>Select Image Type</option>
                                    <option value="Creative Image" <?php if($contributor_images[$i]['file_type'] == "Creative Image" ) echo 'selected = "selected"'?> > Creative Image</option>
                                    <option value="Editorial Image" <?php if($contributor_images[$i]['file_type'] == "Editorial Image" ) echo 'selected = "selected"'?> > Editorial Image</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>Image Subtype:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_subtype[]" required="required" class="file_subtype">
                                    <option>Select Image Subtype</option>
                                    <option value="Photography" <?php if($contributor_images[$i]['file_subtype'] == "Photography" ) echo 'selected = "selected"'?> >Photography </option>
                                    <option value="Illustration" <?php if($contributor_images[$i]['file_subtype'] == "Illustration" ) echo 'selected = "selected"'?> >Illustration</option>
                                    <option value="All">All</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>Orientation:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_orientation[]" required="required" class="file_orientation">
                                    <option>Select Orientation</option>
                                    <option value="Landscape" <?php if($contributor_images[$i]['file_orentiation'] == "Landscape" ) echo 'selected = "selected"'?> >Landscape </option>
                                    <option value="Potrait" <?php if($contributor_images[$i]['file_orentiation'] == "Potrait" ) echo 'selected = "selected"'?> >Potrait</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>People:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_people[]" required="required" class="file_people">
                                  <option>Select number of people </option>
                                  <option value="1" <?php if($contributor_images[$i]['file_people'] == "1" ) echo 'selected = "selected"'?> >1</option>
                                  <option value="2" <?php if($contributor_images[$i]['file_people'] == "2" ) echo 'selected = "selected"'?>  >2</option>
                                  <option value="3" <?php if($contributor_images[$i]['file_people'] == "3" ) echo 'selected = "selected"'?>  >3</option>
                                  <option value="4" <?php if($contributor_images[$i]['file_people'] == "4" ) echo 'selected = "selected"'?>  >4</option>
                                  <option value="5" <?php if($contributor_images[$i]['file_people'] == "5" ) echo 'selected = "selected"'?>  >5</option>
                                  <option value="6" <?php if($contributor_images[$i]['file_people'] == "6" ) echo 'selected = "selected"'?>  >6</option>
                                  <option value="7" <?php if($contributor_images[$i]['file_people'] == "7" ) echo 'selected = "selected"'?>  >7</option>
                                  <option value="8" <?php if($contributor_images[$i]['file_people'] == "8" ) echo 'selected = "selected"'?>  >8</option>
                                  <option value="9" <?php if($contributor_images[$i]['file_people'] == "9" ) echo 'selected = "selected"'?>  >9</option>
                                  <option value="10" <?php if($contributor_images[$i]['file_people'] == "10" ) echo 'selected = "selected"'?>  >10</option>
                                  </select>
                              </div>
                          </div>
                </div>
                <div class="large-3 columns">
                      <div class="large-12 columns">
                        Attach Releases  
                        <span class="question_wrap">
                            <span class="question_this">
                               <img src="<?php echo base_url('assets/contributor/icons/question.png')?>">
                            </span>
                            <span class="question_text">
                                 <a class="question_close">
                                     <i class="fa fa-times" aria-hidden="true"></i>
                                 </a>
                                 If some of your multiple files have the same model or property you can assign that release form on multiple files by selecting the files then pick the relevant release form from the dropdown menu then click attach.NB: You must first upload all your release forms in the Release Upload before assigning them to the files.
                            </span>
                        </span>
                      </div>
                      <div class="large-12 columns" id="releases_files">
                           <div class="row collapse">
                             <div class="small-10 columns">
                               <select name="file_release">
                                  <option>Pick Releases</option>
                                  <?php for($r=0; $r < count($contributor_releases); $r++) { ?>
                                    <option value="<?php echo $contributor_releases[$r]['release_id'] ?>"> 
                                    <?php echo $contributor_releases[$r]['release_name'] ?> 
                                    </option>
                                  <?php } ?>
                               </select>
                             </div>
                             <div class="small-2 columns">
                               <a href="#" id="add_release" class="button postfix add_release">Attach</a>
                             </div>
                             <div class="small-12 columns">
                             <input type="hidden" name="file_releases[]">
                             <div class="releases">
                                <?php 
                                for($m = 0 ; $m < count($contributor_images[$i]['releases']); $m++){
                                      $release = $contributor_images[$i]['releases'][$m]['release_name'];
                                      $release_url = $contributor_images[$i]['releases'][$m]['release_url'];
                                      if(strlen($release)> 0){
                                          echo '<a href="'.$release_url.'" target="_blank">'.$release.'</a><br/>';
                                      }
                                }              
                                ; ?>
                             </div>
                             </div>
                            </div>
                      </div>

                     
                      <div class="large-12 columns" id="model_notification">
                           <div class="row collapse">
                               Model Notification 
                               <span class="question_wrap">
                            <span class="question_this">
                               <img src="<?php echo base_url('assets/contributor/icons/question.png')?>">
                            </span>
                            <span class="question_text">
                                 <a class="question_close">
                                     <i class="fa fa-times" aria-hidden="true"></i>
                                 </a>
                                 In the event the photographer get into personal terms with the model or property owner this action helps the model or property owner get an email notification everytime
                                 the file is purchased. Type in the address and then click Add button to assign the email address to the files. To add more addresses just repeat the process. You can assign
                                 multiple addresses on multiple files. Incase of an email change from the model you can replace with another by simply find the old email and replace with new one.
                            </span>
                        </span>
                             <div class="small-10 columns">
                               <input type="email" name="file_model_notification" placeholder="Model Email Address">
                             </div>
                             <div class="small-2 columns">
                               <a href="#" id="add_model" class="button postfix add_model">Add</a>
                             </div>
                             <div class="small-12 columns">
                                <input type="hidden" name="file_models[]">
                                <div class="model">
                                    <?php 
                                    for($m = 0 ; $m < count($contributor_images[$i]['models']); $m++){
                                          $email = $contributor_images[$i]['models'][$m]['model_email'];
                                          if(strlen($email)> 0){
                                              echo $email.'<br/>';
                                          }
                                    }              
                                    ; ?>
                                </div>
                             </div>
                      </div>
                </div>
                <div class="large-12 columns">
                         <div class="row collapse">
                             Same Shoot Code 
                             <span class="question_wrap">
                          <span class="question_this">
                             <img src="<?php echo base_url('assets/contributor/icons/question.png')?>">
                          </span>
                          <span class="question_text">
                               <a class="question_close">
                                   <i class="fa fa-times" aria-hidden="true"></i>
                               </a>
                               This is action is used when you want files of the same shoot to be linked together. What do we mean with Link? This means the files will always be grouped together during the search from the end user. How does it work? Click on ‘generate Same Shoot code’ button and a number will be generated. Then you assign this code to all the files you intend to be of the same shoot by clicking                       apply button. The files must be selected before applying the code
                          </span>
                      </span>
                           <div class="small-5 columns pull-right">
                             <input type="text" name="file_shoot[]" class="file_shoot"
                              value="<?php echo $contributor_images[$i]['file_same_shoot_code']?>" placeholder="">
                           </div>
                           
                    </div>
                </div>
                </div>
                </div>
                <div class="close_img delete_file">
                    <img src="<?php echo base_url('assets/contributor/img/close.png')?>">
                </div>
          </div>
        <?php } ?>
          <div class="edit_footer">
            <div class="row">
              <div class="pull-right">
                  <button type="submit" class="button btn_upload">Submit For Approval </button>  
              </div>
             </div>
          </div>
      </div>
    </form>
</div>
