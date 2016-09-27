<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sura Images | Contributor  </title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/contributor/multiselect/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/contributor/css/foundation.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/contributor/css/slick.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/contributor/css/font.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/contributor/css/calibri.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/contributor/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/contributor/css/responsive.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/contributor/multiselect/multiple-select.css')?>" />

    <!--Stylesheets-->
    <link href="<?php echo base_url('/assets/contributor/filer/css/jquery.filer.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/contributor/filer/css/themes/jquery.filer-dragdropbox-theme.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/flags/flags.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/contributor/css/popup.css')?>" type="text/css" rel="stylesheet" />
    
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
             <div class="home_logo">
         </div>
         </div>
         <div class="top-bar-right inside-page">
           <ul class="menu" data-responsive-menu="medium-dropdown">
               <li class="menu-text"> <a href="#">Welcome  </a></li>
               <li class="menu-text menu-divider"> 
                   <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false">
                   <?php echo $user_session['user_meta']['0']['username'];?>  </a>
                   <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                     <li><a href="#">Account</a></li>
                     <li><a href="#">Uploads  </a></li>
                     <li><a href="#">Sale History</a></li>
                   </ul>
               </li>
               <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
               <li class="menu-text"><a href="#" class="shopping_cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> (2)</a></li>
           </ul>
           <div class="menu_switch">
               <a href="<?php echo base_url('/index.php/registration/switch_member_account')?>">
                   <img src="<?php echo base_url('/assets/contributor/img/switch.png')?>">
                   Switch to Member
               </a>
           </div>
         </div>
       </div>
     </div>
