<div class="inside_body">
  <div class="row">
    <div class="registration_body">
        <div class="registration_message">
            <h6>Resource Files </h6>
            <hr/>
            <?php for ($i=0; $i < count($resources) ; $i++) { 
               if($resources[$i]['resource_type'] == 'model release'){
            ?>
            <div class="row">
              <div class="large-4 columns">
                Model Release Form:
              </div>
              <div class="large-4 columns">
                  <a target="_blank" href="<?php echo $resources[$i]['resource_url'] ?>">
                    Model Release Form.pdf
                  </a>
              </div>
              <div class="large-4 columns">
                  <a type="button" class="button warning add_to_basket" download href="<?php echo $resources[$i]['resource_url'] ?>">
                    DOWNLOAD
                  </a>
              </div>
            </div>
            <?php } else if($resources[$i]['resource_type'] == 'property release'){
            ?>
             <div class="row">
              <div class="large-4 columns">
                Property Release Form:
              </div>
              <div class="large-4 columns">
                  <a target="_blank" href="<?php echo $resources[$i]['resource_url'] ?>">
                    Property Release Form.pdf
                  </a>
              </div>
              <div class="large-4 columns">
                  <a type="button" class="button warning add_to_basket" download href="<?php echo $resources[$i]['resource_url'] ?>">
                    DOWNLOAD
                  </a>
              </div>
            </div>
            <?php } else { ?>
            <hr/>
            <div class="row">
              <div class="large-4 columns">
                Other Resource File
              </div>
              <div class="large-4 columns">
                   <a target="_blank" href="<?php echo $resources[$i]['resource_url'] ?>">
                    <?php echo $resources[$i]['resource_name'] ?>
                  </a>
              </div>
              <div class="large-4 columns">
                  <a type="button" class="button warning add_to_basket" download href="<?php echo $resources[$i]['resource_url'] ?>">
                    DOWNLOAD
                  </a>
              </div>
            </div>
            <?php } } ?>
        </div>
        <div style="clear: both"></div>
    </div>
  </div>
</div>

