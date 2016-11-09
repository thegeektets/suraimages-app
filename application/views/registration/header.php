<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sura Images | Registration  </title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/registration/css/foundation.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/registration/css/slick.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/registration/css/font.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/registration/css/calibri.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/registration/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/registration/css/responsive.css')?>">

    <!--Stylesheets-->
    <link href="<?php echo base_url('/assets/registration/filer/css/jquery.filer.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/registration/filer/css/themes/jquery.filer-dragdropbox-theme.css')?>" type="text/css" rel="stylesheet" />
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
          <?php if(!isset($user_session)) { ?> 
          <div class="top-bar-right">
               <ul class="menu" data-responsive-menu="medium-dropdown">
                   <li class="menu-text menu-divider"> <a href="<?php echo base_url('/index.php/registration/login')?>">Sign in  </a></li>
                   <li class="menu-text"><a href="#"> <a href="<?php echo base_url('/index.php/registration')?>">Register </a></li>
               </ul>
          </div>
          <?php } else { ?>
          <div class="top-bar-right inside-page">
            <ul class="menu" data-responsive-menu="medium-dropdown">
                <li class="menu-text"> <a href="#">Welcome  </a></li>
                <li class="menu-text menu-divider"> <a href="#"> <?php echo $user_session['user_meta']['0']['email'];?>  </a></li>
                <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
                <li class="menu-text"><a href="#" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (2)</a></li>
            </ul>
          </div>
          <?php } ?>
       </div>
      </div>

 