
  <body class="home_page">

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Sura Images</div>
    </div>

    <div class="top-bar" id="main-menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text  menu-divider"> Language </li>
            <li class="menu-text phone "> +254 20 242 9588 </li>
          </ul>
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
    <div class="row">
      <div class="home_logo">
      </div>
    </div>

    <div class="row">
        <div class="home_search">
          <form class="frm_home_search" on" <?php echo form_open('main/start_search'); ?>
              <input type="text" name="search_term" class="inpt_home_search" placeholder="Search images, videos and illustrations" />
              <select class="slt_home_search" required="required" name="search_cat">
                  <option value="image">Images</option>
                  <option value="video">Videos</option>
                  <option value="illustration">Illustrations</option>
              </select>
              <button class="btn_home_search" type="submit">
                  <i class="fa fa-search fa-2x" aria-hidden="true"></i>
              </button>
                   
          </form>
        </div>
    </div>

    <div class="row">
        <div class="home_search_text">
          <p>
            Get authentic African Images, Videos for commercial, editorial or personal use, </br>
            all in Royalty Free and Right Managed licenses.
          </p>
        </div>
    </div>
   </div>
