<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sura Images | Admin  </title>
    
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/foundation.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/slick.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/calibri.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/css/responsive.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/filer/css/jquery.filer.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/filer/css/themes/jquery.filer-dragdropbox-theme.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/admin/multiselect/multiple-select.css')?>" />

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
                  <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false"> Admin </a>
                  <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                    <li><a href="#account" class="tab_link" data-id="account">Account</a></li>
                    <li><a href="#pricing" class="tab_link" data-id="pricing">Pricing </a></li>
                    <li><a href="#members" class="tab_link" data-id="members">Members</a></li>
                    <li><a href="#contributors" class="tab_link" data-id="contributors">Contributors</a></li>
                    <li><a href="#sales" class="tab_link" data-id="sales">Sales History</a></li>

                  </ul>
              </li>
             <li class="menu-text menu-divider"><a href="<?php echo base_url('/index.php/registration/logout')?>"> Sign Out </a></li>
                
          </ul>
          
        </div>
     </div>
    </div>
