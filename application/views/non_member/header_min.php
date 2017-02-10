
  <body class="inside_page_body">

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Sura Images </div>
    </div>

     <div class="top-bar" id="main-menu">
      <div class="large-12 columns">
        <div class="top-bar-left">
            <a href="<?php echo base_url(); ?>" class="home_logo">
            </a>
        </div>
        <?php if(!isset($user_session['logged_in'])) { ?> 
        <div class="top-bar-right inside-page">
             <ul class="menu" data-responsive-menu="medium-dropdown">
                 <li class="menu-text menu-divider"> <a href="<?php echo base_url('/index.php/registration/login')?>">Sign in  </a></li>
                 <li class="menu-text"><a href="#"> <a href="<?php echo base_url('/index.php/registration')?>">Register </a></li>
             </ul>
        </div>
        <?php } else { ?>
        <div class="top-bar-right inside-page">
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
 