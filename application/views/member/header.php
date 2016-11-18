<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sura Images | Member  </title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/member/css/foundation.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/member/css/slick.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/member/css/font.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/member/css/calibri.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/member/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/member/css/responsive.css')?>">

    <!--Stylesheets-->
    <link href="<?php echo base_url('/assets/member/filer/css/jquery.filer.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/member/filer/css/themes/jquery.filer-dragdropbox-theme.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/flags/flags.css')?>" type="text/css" rel="stylesheet" />
       
   
  </head>
  <?php
    error_reporting(0);
    ini_set('display_errors', 0);  
   ?>
   <body class="inside_page_body">

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Sura Images </div>
    </div>

    <div class="top-bar" id="main-menu">
      <div class="row">
        <div class="top-bar-left">
            <a href="<?php echo base_url(); ?>" class="home_logo">
            </a>
        </div>
        <div class="top-bar-right inside-page">
          <ul class="menu" data-responsive-menu="medium-dropdown">
              <li class="menu-text"> <a href="#">Welcome  </a></li>
              <li class="menu-text menu-divider"> 
                            <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false">
                            <?php echo $user_session['user_meta']['0']['email'];?>  </a>
                            <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                              <li><a href="<?php echo base_url('index.php/member#basket') ?>">Account</a></li>
                              <li><a href="<?php echo base_url('index.php/member#basket') ?>">Shopping Basket </a></li>
                              <li><a href="<?php echo base_url('index.php/member#basket') ?>">Purchase History</a></li>
                            </ul>
              </li>
              <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
              <li class="menu-text"><a href="<?php echo base_url('index.php/member#basket') ?>" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (<?php echo count($cart_items)?>)</a></li>
          </ul>
          <div class="menu_switch">
               <a href="<?php echo base_url('/index.php/registration/switch_contributor_account')?>">
                  <img src="<?php echo base_url('/assets/member/img/switch.png')?>">
                  Switch to Contributor
              </a>
          </div>
        </div>
     </div>
    </div>