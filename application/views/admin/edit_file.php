
<?php for($i=0; $i< count($all_contributor_images); $i++) { ?>
            <?php if( ($all_contributor_images[$i]['upload_id'] == $user_session['single_file'])) { ?>
<form <?php echo form_open('admin/edit_image_file'); ?>
<div class="tabs-panel is-active" id="tluploads">
      <div class="tab_header">  
       <div class="tabs_content">
            <div class="report_content">
                <div class="large-5 columns">
                    <img src="<?php echo $all_contributor_images[$i]['file_url']; ?>">
                </div>
                <div class="large-7 columns">
                    <hr/>
                    <div class="large-12 columns">
                      <strong>Image ID: </strong> <?php echo $all_contributor_images[$i]['upload_id']; ?>
                      <input type="hidden" name="file_id" class="file_id" value="<?php echo $all_contributor_images[$i]['upload_id']; ?>">
                    </div>
                    <div class="large-12 columns">
                      <strong>Photographer: </strong> <?php echo $all_contributor_images[$i]['firstname']." ".$all_contributor_images[$i]['middlename']; ?>
                    </div>
                    <hr style="margin-bottom:15px" />
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red"> Title: </label>
                        </div>
                        <div class="large-9 columns">
                            <input type="text" name="file_name" placeholder="Name" value="<?php echo $all_contributor_images[$i]['file_name']; ?>" class="form_group">
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red"> Key Words : </label>
                        </div>
                        <div class="large-9 columns">
                            <textarea  required="required"   name="file_keywords[]" class="form_group" type="text" placeholder="0000" style="text-align:left"><?php if(strlen((trim($all_contributor_images[$i]['file_keywords'])))>0){echo (trim($all_contributor_images[$i]['file_keywords']));}?></textarea>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <hr style="margin-bottom:15px" />
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red"> Set Price : </label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-4 columns">
                                      <input type="text" name="file_price_large" placeholder="Price" class="form_group" value="<?php echo $all_contributor_images[$i]['file_price_large']; ?>">
                                </div>
                                <div class="large-4 columns">
                                      <input type="text" name="file_price_medium" placeholder="Price" class="form_group" disabled="" value="<?php echo $all_contributor_images[$i]['file_price_medium']; ?>">
                                </div>
                                <div class="large-4 columns">
                                      <input type="text" name="file_price_small" placeholder="Price" class="form_group" disabled="" value="<?php echo $all_contributor_images[$i]['file_price_small']; ?>">
                                </div>
                            </div>       
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red"> License Type:</label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-6 columns">
                                  <select name="file_license" required="required">
                                       <option value="">Select License</option>
                                       <option value="Royalty Free" selected> Royalty Free </option>
                                       <option value="Right Managed" >Right Managed </option>
                                   </select>
                                </div>
                             </div>       
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red"> Image Type:</label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-6 columns">
                                 <select name="file_type" required="required" class="file_type">
                                    <option>Select Image Type</option>
                                    <option value="Creative Image" <?php if($all_contributor_images[$i]['file_type'] == "Creative Image" ) echo 'selected = "selected"'?> > Creative Image</option>
                                    <option value="Editorial Image" <?php if($all_contributor_images[$i]['file_type'] == "Editorial Image" ) echo 'selected = "selected"'?> > Editorial Image</option>
                                  </select>
                             </div>       
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red">Image Subtype:</label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-6 columns">
                                <select name="file_subtype" required="required" class="file_subtype">
                                    <option>Select Image Subtype</option>
                                    <option value="Photography" <?php if($all_contributor_images[$i]['file_subtype'] == "Photography" ) echo 'selected = "selected"'?> >Photography </option>
                                    <option value="Illustration" <?php if($all_contributor_images[$i]['file_subtype'] == "Illustration" ) echo 'selected = "selected"'?> >Illustration</option>
                                    <option value="All">All</option>
                                  </select>
                                </div>
                             </div>       
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red">Orientation:</label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-6 columns">
                                 <select name="file_orientation" required="required" class="file_orientation">
                                    <option>Select Orientation</option>
                                    <option value="Landscape" <?php if($all_contributor_images[$i]['file_orentiation'] == "Landscape" ) echo 'selected = "selected"'?> >Landscape </option>
                                    <option value="Portrait" <?php if($all_contributor_images[$i]['file_orentiation'] == "Portrait" ) echo 'selected = "selected"'?> >Portrait</option>
                                  </select>
                                </div>
                             </div>       
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                          <label class="red">People:</label>
                        </div> 
                        <div class="large-9 columns">
                            <div class="row collapse">
                                <div class="large-6 columns">
                                 <select name="file_people" required="required" class="file_people">
                                  <option value="">Select number of people </option>
                                  <option value="0">0</option>
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
                                </div>
                             </div>       
                        </div>
                    </div>
                    <hr style="margin-bottom:15px" />
                    <div class="row">
                      <div class="large-6 columns">
                          <strong>Attach Release(s): (<?php echo count($all_contributor_images[$i]['releases']); ?>) </strong>
                          <?php 
                              for($m = 0 ; $m < count($all_contributor_images[$i]['releases']); $m++){
                                    $release = $all_contributor_images[$i]['releases'][$m]['release_name'];
                                    $release_url = $all_contributor_images[$i]['releases'][$m]['release_url'];
                                    if(strlen($release)> 0){
                                        echo '<a href=" class="red'.$release_url.'" target="_blank">'.$release.'</a><br/>';
                                    }
                              }              
                              ; ?>
                      </div>
                      <div class="large-6 columns">
                          <strong>Model Notification: (<?php echo count($all_contributor_images[$i]['models']); ?>) </strong>
                          <?php 
                          for($m = 0 ; $m < count($all_contributor_images[$i]['models']); $m++){
                                $email = $all_contributor_images[$i]['models'][$m]['model_email'];
                                if(strlen($email)> 0){
                                    echo $email.'<br/>';
                                }
                          }              
                          ; ?>
                      </div>
                    </div>
                    <div class="row">
                       <strong>Date Uploaded: </strong><span> <?php  echo date("F j, Y", strtotime($all_contributor_images[$i]['date_uploaded']));   ?></span>
                    </div>
                    <hr style="margin-bottom:15px" />
                </div>
                <div class="large-3 columns pull-right">
                  <button class="button postfix" type="submit">Save Changes</button>   
                </div>
            </div>           
        </div>                
    </div>
    <div style="clear: both"></div>
</div>
</form>
<?php } } ?>
                   