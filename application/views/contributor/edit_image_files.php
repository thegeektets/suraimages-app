<div class="tabs-panel is-active" id="images">
    <div class="large-12 columns">
      <div class="alert_message">
          <img src="<?php echo base_url('assets/contributor/img/alert.png')?>" class="alert_pic">
          Please note, every file you upload will automatically be licensed as Royalty Free until our curator review and deem the file otherwise (Right Managed), but should you feel your work is
          worth being licensed as Right Managed kindly don’t hesitate to communicate to us.
      </div>
    </div>
    <div class="large-10 columns pull-right">
       Upload high resolution JPEG images each with a minimum file size of 8MB and maximum of 10 images per upload.
    </div>
    <div class="large-2 columns pull-left">   
       <form method="post" enctype="multipart/form-data">
         <input type="file" name="files[]"  class="more_filer" multiple="multiple">
        </form>
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
                   <option value="" class="delete_option"> Delete </option>
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
              <form class="same_shoot">
                <div class="add_title">
                 Same Shoot  : 
                 <div class="row collapse">
                   <div class="large-4 columns">
                      <button type="submit" class="button alert">
                          Generate Same Shoot Code
                      </button>
                   </div>
                   <div class="large-6 columns">
                      <input type="text" name="all_shoot" class="">
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
                                <input type="text" name="model_email" id="model_email" class="">
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
                            <input type="text" name="replace_email" id="replace_email" class="">
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
    <form onsubmit="return edit_image_contributor()" name="edit_image_contributor">
      <div class="edit_content">
        <?php for($i=0; $i< count($contributor_images); $i++) { ?>
          <div class="edit_item">
             <div class="row">
                <div class="large-2 column">
                  <input type="checkbox" name="" class="select_file">
                  <img src="<?php echo $contributor_images[$i]['file_url']; ?>" class="edit_file_img">
                </div>
                <div class="large-4 column">
                        <label>Title : <span class="required_asteric">*</span></label>
                        <input type="hidden" name="file_id" value="<?php echo $contributor_images[$i]['file_name']; ?>">
                        <input type="text" name="file_name" placeholder="Name" class="form_group" value="<?php echo $contributor_images[$i]['file_name']; ?>">
                        <label> Key Words : <span class="required_asteric">*</span></label>
                        <textarea  name="file_keywords" type="text" placeholder="0000">
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
                                <input type="text" name="file_price_large" placeholder="Price" value="<?php echo $contributor_images[$i]['file_price_large']?>" class="form_group">
                          </div>
                          <div class="large-4 columns">
                                <input type="text" name="file_price_medium" placeholder="Medium" disabled="" value="<?php echo $contributor_images[$i]['file_price_medium']?>" class="form_group">
                          </div>
                          <div class="large-4 columns">
                                <input type="text" name="file_price_small" value="<?php echo $contributor_images[$i]['file_price_small']?>" disabled="" placeholder="Low" class="form_group">
                          </div>
                      </div>
                      <div class="row">
                              <div class="large-5 columns">
                                  <label>Category:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_category" multiple="multiple" class="slc_category"
                                  name="file_category">
                                    <option>Select Categories</option>
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
                              <div class="large-5 columns">
                                  <label>Image Type:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_type">
                                    <option>Select Image Type</option>
                                    <option value="Creative Image">Creative Image</option>
                                    <option value="Editorial Image">Editorial Image</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>Image Subtype:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_subtype">
                                    <option>Select Image Subtype</option>
                                    <option value="Photography">Photography </option>
                                    <option value="Illustration">Illustration</option>
                                    <option value="All">All</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>Orientation:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_orientation">
                                    <option>Select Orientation</option>
                                    <option value="Landscape">Landscape </option>
                                    <option value="Potrait">Potrait</option>
                                  </select>
                              </div>
                              <div class="large-5 columns">
                                  <label>People:<span class="required_asteric">*</span></label>
                              </div>
                              <div class="large-7 columns">
                                  <select name="file_people">
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
                      <div class="large-12 columns">
                           <div class="row collapse">
                             <div class="small-10 columns">
                               <select placeholder="Pick Releases">
                               </select>
                             </div>
                             <div class="small-2 columns">
                               <a href="#" class="button postfix">Attach</a>
                             </div>
                            </div>
                      </div>

                     
                      <div class="large-12 columns">
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

                               <input type="text" name="file_model_notification" placeholder="Model Email Address">
                             </div>
                             <div class="small-2 columns">
                               <a href="#" class="button postfix">Add</a>
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

                             <input type="text" placeholder="">
                           </div>
                           
                    </div>
                </div>
                </div>
                </div>
                <div class="close_img">
                  <a href="">
                    <img src="<?php echo base_url('assets/contributor/img/close.png')?>">
                  </a>
                </div>
          </div>
        <?php } ?>
          <div class="edit_footer">
            <div class="row">
              <div class="pull-right">
                  <a href="#" class="button btn_upload">Submit For Approval </a>
              </div>
             </div>
          </div>
      </div>
    </form>
</div>
