
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
        <div class="top-bar-right">
          <ul class="menu" data-responsive-menu="medium-dropdown">
              <li class="menu-text menu-divider"> <a href="<?php echo base_url('/index.php/registration/login')?>">Sign in  </a></li>
              <li class="menu-text"><a href="#"> <a href="<?php echo base_url('/index.php/registration')?>">Register </a></li>
          </ul>
        </div>
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
              <input type="text" name="search_term" class="inpt_home_search" placeholder="Search images, videos and illustrations" required="required" />
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
