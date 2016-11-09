
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
              <li class="menu-text menu-divider"> 
                            <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false">
                            <?php echo $user_session['user_meta']['0']['email'];?>  </a>
              </li>
              <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
              <li class="menu-text"><a href="<?php echo base_url('index.php/member#basket') ?>" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (<?php echo count($cart_items)?>)</a></li>
          </ul>
        </div>
        <?php } ?>
    </div>
  </div>
 