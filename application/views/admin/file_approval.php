<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sura Images | Admin  </title>

    <link rel="stylesheet" href="assets/multiselect/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/calibri.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/multiselect/multiple-select.css" />

    <!--Stylesheets-->
    <link href="assets/filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="assets/filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

       
   
  </head>
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
                  <a data-dropdown="menu_account" aria-controls="menu_account" aria-expanded="false"> Admin </a>
                  <ul id="menu_account" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Pricing </a></li>
                    <li><a href="#">Member</a></li>
                    <li><a href="#">Contributors</a></li>
                    <li><a href="#">Sales History</a></li>

                  </ul>
              </li>
              <li class="menu-text"><a href="#"> Sign Out </a></li>
              
          </ul>
          
        </div>
     </div>
    </div>

 

  <div class="inside_body">

       <div class="row">
            <ul class="tabs admin_tabs" data-tabs id="admin-tabs">
                  <li class="tabs-title "><a href="#account" aria-selected="true"> Account </a></li>
                  <li class="tabs-title"><a href="#pricing"> Pricing </a></li>
                  <li class="tabs-title"><a href="#members"> Members (4)</a></li>
                  <li class="tabs-title is-active"><a href="#contributors"> Contributors (12)</a></li>
                  <li class="tabs-title"><a href="#sales"> Sales History </a></li>
                  
            </ul>

            <div class="tabs-content" data-tabs-content="admin-tabs">
              <div class="tabs-panel admin_panel" id="account">

                    <ul class="tabs inner_admin_tabs" data-tabs id="account-tabs">
                          <li class="tabs-title is-active"><a href="#edit_account">Edit Account </a></li>
                          <li class="tabs-title"><a href="#password">Change Password </a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="account-tabs">
                          <div class="tabs-panel is-active" id="edit_account">
                                <div class="tab_title">
                                    Account Information:
                                </div>
                                <div class="tab_content">
                                    <form class="contact_info">
                                      <div class="large-4 columns">
                                        <label>First Name : <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="Name" class="form_group">
                                        <label>Postal Address : <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="0000" class="form_group">
                                        <label>City/Town : <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="Nairobi" class="form_group">
                                        <label>Telephone Number : <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="0000" class="form_group">
                                      </div>
                                      <div class="large-4 columns">
                                        <label>Middle Name: <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="Name" class="form_group">
                                        <label>2 Postal Address (Optional)</label>
                                        <input type="text" name="" placeholder="0000" class="form_group">
                                        <label>Country: <span class="required_asteric">*</span></label>
                                        <select  name="" class="form_group">
                                            <option>Kenya</option>
                                        </select>
                                        <label>Email: <span class="required_asteric">*</span></label>
                                        <input type="text" name="" placeholder="gngechu@gmail.com" class="form_group">
                                      </div>
                                      <div class="large-4 columns">
                                        <label>Surname:</label>
                                        <input type="text" name="" placeholder="Name" class="form_group">
                                        <label>Zip Code:</label>
                                        <input type="text" name="" placeholder="0000" class="form_group">
                                      </div>
                                    </form>
                                    
                                </div>
                                <button class="button btn_upload_id">Save Changes</button>   
                                <div style="clear: both"></div>
                            
                          </div>
                          <div class="tabs-panel" id="password">
                                     <div class="tab_title">
                                        Change Password
                                    </div>
                                    <div class="tab_content">
                                      <form class="change_password">

                                          
                                             <div class="large-6 columns">
                                            
                                              <label>Old Password <span class="required_asteric">*</span></label>
                                                  <input type="password" name="" placeholder="Old Password" class="form_group">

                                              <label>New Password <span class="required_asteric">*</span></label>
                                                  <input type="password" name="" placeholder="New Password" class="form_group">


                                              <label>Confirm Password <span class="required_asteric">*</span></label>
                                                  <input type="password" name="" placeholder="Confirm Password" class="form_group">

                                        </form>
                                     
                                       <button class="button btn_upload_id">Save Changes</button>
                                    </div>
                                    <div style="clear: both"></div>
                                
                              </div>
                          </div>
                    </div>
              </div>
              <div class="tabs-panel admin_panel" id="pricing">
                    <ul class="tabs inner_admin_tabs" data-tabs id="pricing-tabs">
                          <li class="tabs-title is-active"><a href="#rfpricing" aria-selected="true"> RF Pricing Range </a></li>
                          <li class="tabs-title"><a href="#expricing"> Exclusive Pricing </a></li>
                          <li class="tabs-title"><a href="#rmpricing"> Rights Managed Pricing </a></li>
                          <li class="tabs-title"><a href="#rrpricing"> Rights Ready Pricing </a></li>
                    </ul>

                    <div class="tabs-content" data-tabs-content="pricing-tabs">
                          <div class="tabs-panel is-active" id="rfpricing">
                              <div class="tab_title">
                                    RF Price Range:
                              </div>
                              <div class="tab_content">
                                    <form class="contact_info">
                                      <div class="large-4 columns">
                                        <label class="strong">Photos/ Illustrations : </label>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="150" class="inline_input">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="20" class="inline_input">
                                        </div>
                                      </div>
                                      <div class="large-6 columns pull-left">
                                        <label class="strong">Videos: </label>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="150" class="inline_input">
                                            <span class="strong">
                                                Maximum price for Royalty Free License 
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="20" class="inline_input">
                                            <span class="strong">
                                                Minimum price for Royalty Free License 
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                      </div>
                                    </form>
                                    
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="expricing">
                              <div class="tab_title">
                                   Exclusive Pricing :
                              </div>
                              <div class="tab_content">
                                    <form class="contact_info">
                                      <div class="large-4 columns">
                                        <label class="strong">Photos/ Illustrations : </label>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="150" class="inline_input">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="400" class="inline_input">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="780" class="inline_input">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="1500" class="inline_input">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="2500" class="inline_input">
                                        </div>
                                      </div>
                                      <div class="large-6 columns pull-left">
                                        <label class="strong">Videos: </label>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="150" class="inline_input">
                                            <span class="strong">
                                                1 Month
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="" placeholder="400" class="inline_input">
                                            <span class="strong">
                                                3 Months
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="" placeholder="780" class="inline_input">
                                            <span class="strong">
                                                6 Months
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="" placeholder="1500" class="inline_input">
                                            <span class="strong">
                                                1 year
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                         <div class="form_group">
                                            <input type="text" name="" placeholder="2500" class="inline_input">
                                            <span class="strong">
                                                2 years
                                                <span class="required_asteric">*</span>              
                                            </span>
                                        </div>
                                      </div>
                                    </form>
                                    
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="rmpricing">
                              <div class="tab_title">
                                   Rights Managed Pricing :
                              </div>
                              <div class="tab_content">
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>
                          <div class="tabs-panel" id="rrpricing">
                              <div class="tab_title">
                                   Rights Ready Pricing :
                              </div>
                              <div class="tab_content">
                              </div>
                              <button class="button btn_upload_id">Save Changes</button>   
                              <div style="clear: both"></div>
                          </div>

                    </div>
            </div>
            <div class="tabs-panel admin_panel" id="members">
                  <ul class="tabs inner_admin_tabs" data-tabs id="member-tabs">
                          <li class="tabs-title is-active"><a href="#accounts" aria-selected="true"> Accounts </a></li>
                  </ul>

                  <div class="tabs-content" data-tabs-content="member-tabs">
                        
                          <div class="tabs-panel is-active" id="accounts">
                              <div class="report_header">
                                 <div class="row">
                                     <div class="large-3 column">
                                         Name
                                     </div>
                                     <div class="large-3 column">
                                         Email Address
                                     </div>

                                     <div class="large-2 column">
                                         Tel Number
                                     </div>
                                     <div class="large-2 column">
                                         Date Joined
                                     </div>
                                     <div class="large-2 column">
                                         Purchase History
                                     </div>
                                 </div>
                              </div> 
                              <div class="report_content">
                                   <div class="report_item">
                                        <div class="row">
                                           <div class="large-3 column report_col">
                                              Jane Makali
                                           </div>
                                           <div class="large-3 column report_col">
                                               jmakali@gmail.com
                                           </div>
                                           <div class="large-2 column report_col">
                                               +254 723 112233
                                           </div>
                                           <div class="large-2 column report_col">
                                               30th Dec 2015
                                           </div>
                                           <div class="large-2 column report_col">
                                                (3)
                                           </div>
                                        </div>
                                        <div class="row more_details">
                                           <div class="large-2 columns report_col">
                                               <img src="assets/img/user_avatar.png">
                                           </div>
                                           <div class="large-3 columns report_col">
                                                <div>
                                                    <span class="strong"> Name: </span> Jane Makali 
                                                </div>
                                                <div>
                                                    <span class="strong"> Email: </span> jmakali@gmail.com
                                                </div>
                                                <div>
                                                    <span class="strong"> Tel No: </span> +254 723 112233
                                                </div>                                                        
                                           </div>
                                           <div class="large-4 column report_col">
                                               <div class="pull-left">
                                                    <div>
                                                        <span class="strong"> Address: </span> 38540-00100
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Country: </span> Kenya
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Town: </span> Nairobi
                                                    </div>                                                       
                                               </div>
                                           </div>
                                           <div class="large-3 column report_col">
                                                    <div>
                                                        <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Purchase History: </span> 3
                                                    </div>
                                           </div>
                                        </div>
                                   </div>
                                   <div class="report_item">
                                        <div class="row">
                                           <div class="large-3 column report_col">
                                              Jane Makali
                                           </div>
                                           <div class="large-3 column report_col">
                                               jmakali@gmail.com
                                           </div>
                                           <div class="large-2 column report_col">
                                               +254 723 112233
                                           </div>
                                           <div class="large-2 column report_col">
                                               30th Dec 2015
                                           </div>
                                           <div class="large-2 column report_col">
                                                (3)
                                           </div>
                                        </div>
                                        <div class="row more_details">
                                           <div class="large-2 columns report_col">
                                               <img src="assets/img/user_avatar.png">
                                           </div>
                                           <div class="large-3 columns report_col">
                                                <div>
                                                    <span class="strong"> Name: </span> Jane Makali 
                                                </div>
                                                <div>
                                                    <span class="strong"> Email: </span> jmakali@gmail.com
                                                </div>
                                                <div>
                                                    <span class="strong"> Tel No: </span> +254 723 112233
                                                </div>                                                        
                                           </div>
                                           <div class="large-4 column report_col">
                                               <div class="pull-left">
                                                    <div>
                                                        <span class="strong"> Address: </span> 38540-00100
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Country: </span> Kenya
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Town: </span> Nairobi
                                                    </div>                                                       
                                               </div>
                                           </div>
                                           <div class="large-3 column report_col">
                                                    <div>
                                                        <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Purchase History: </span> 3
                                                    </div>
                                           </div>
                                        </div>

                                   </div>
                                   <div class="report_item">
                                        <div class="row">
                                           <div class="large-3 column report_col">
                                              Jane Makali
                                           </div>
                                           <div class="large-3 column report_col">
                                               jmakali@gmail.com
                                           </div>
                                           <div class="large-2 column report_col">
                                               +254 723 112233
                                           </div>
                                           <div class="large-2 column report_col">
                                               30th Dec 2015
                                           </div>
                                           <div class="large-2 column report_col">
                                                (3)
                                           </div>
                                        </div>
                                        <div class="row more_details">
                                           <div class="large-2 columns report_col">
                                               <img src="assets/img/user_avatar.png">
                                           </div>
                                           <div class="large-3 columns report_col">
                                                <div>
                                                    <span class="strong"> Name: </span> Jane Makali 
                                                </div>
                                                <div>
                                                    <span class="strong"> Email: </span> jmakali@gmail.com
                                                </div>
                                                <div>
                                                    <span class="strong"> Tel No: </span> +254 723 112233
                                                </div>                                                        
                                           </div>
                                           <div class="large-4 column report_col">
                                               <div class="pull-left">
                                                    <div>
                                                        <span class="strong"> Address: </span> 38540-00100
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Country: </span> Kenya
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Town: </span> Nairobi
                                                    </div>                                                       
                                               </div>
                                           </div>
                                           <div class="large-3 column report_col">
                                                    <div>
                                                        <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                                    </div>
                                                    <div>
                                                        <span class="strong"> Purchase History: </span> 3
                                                    </div>
                                           </div>
                                        </div>

                                   </div>
                              </div>                       
                          </div>
                          <div style="clear: both"></div>
                  </div>
            </div>
            <div class="tabs-panel admin_panel is-active" id="contributors">
                <ul class="tabs inner_admin_tabs" data-tabs id="contributor-tabs">
                    <li class="tabs-title is-active"><a href="#nwcontributors" aria-selected="true"> New Contributors (3) </a></li>
                    <li class="tabs-title"><a href="#excontributors" aria-selected="true"> Existing Contributors
                    (9) </a></li>
                    <li class="tabs-title"><a href="#tluploads" aria-selected="true"> Total Uploads(750)</a></li>
                    <li class="tabs-title"><a href="#resources" aria-selected="true"> Resources </a></li>
                </ul>

                <div class="tabs-content" data-tabs-content="contributor-tabs">
                          <div class="tabs-panel is-active" id="nwcontributors">
                              <div class="row">
                                  <div class="large-12 columns">
                                   <div class="large-5 columns medium-5 columns pull-left">
                                       <form class="reports_search">
                                         <select class="inside_search_slc" id="edit_slc">
                                             <option value=""> Action </option>
                                             <option value="Title"> Add Title </option>
                                             <option value="Keywords"> Add Keywords </option>
                                             <option value="Price"> Set Price </option>
                                             <option value="Category"> Category </option>
                                             <option value="Image Type"> Image Type </option>
                                             <option value="Image Subtype"> Image Subtype </option>
                                             <option value="Orientation"> Orientation </option>
                                             <option value="People"> People </option>
                                             <option value="Attach Release"> Attach Release </option>
                                             <option value="Same Shoot"> Same Shoot </option>
                                             <option value="Model Notification"> Model Notification </option>
                                             <option value="" class="delete_option"> Delete </option>
                                             
                                         </select>
                                         <span class="question_wrap">
                                             <span class="question_this">
                                                <img src="assets/icons/question.png">
                                             </span>
                                             <span class="question_text">
                                                  <a class="question_close">
                                                      <i class="fa fa-times" aria-hidden="true"></i>
                                                  </a>
                                                  Actions help you apply multiple commands on multiple files all at once. How
                                                  does it work? First select the multiple files you want to Action by clicking on
                                                  checkbox(s) on the left side of each file then choose an action under the
                                                  “Actions” dropdown menu and the click “Apply” button.
                                                  Every action you chose under the dropdown menu has the help message specific
                                                  explaining about that action. Simply move your mouse over the question mark.
                                             </span>
                                         </span>
                                           
                                       </form>
                                  </div>
                                                   <div class="large-4 columns medium-4 columns pull-right">
                                                        <span class="search_pagination"> 
                                                          <select class="pagination_slc">
                                                               <option value="">Files Per Page</option>
                                                               <option value="50">50</option>
                                                               <option value="100">100</option>
                                                               <option value="150">150</option>
                                                           </select>
                                                          Page <input type="number" name="page_number" placeholder="1" class="page_number"> of 120 
                                                             <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                                             <a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                                        </span>
                                                   </div>
                                                  </div>
                                        </div>
            
                                        <div class="row">
                                          <div class="large-12 columns">
                                              <div class="reports_search large-6 columns pull-left">
                                                <form class="title">
                                                        <div class="add_title">
                                                         Add Title  : 
                                                         <input type="text" name="" class="inline_input">
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="add_keywords">
                                                        <div class="add_title">
                                                         Add Keywords  : 
                                                         <textarea type="text" name="" class="inline_input">
                                                         </textarea> 
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="set_price">
                                                        <div class="add_title">
                                                         Set Price  : 
                                                         <input type="text" name="" class="inline_input">
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="category">
                                                        <div class="add_title">
                                                         
                                                         <div class="row collapse">
                                                          <div class="large-2 columns">
                                                            Category  : 
                                                          </div>
                                                          <div class="large-6 columns">
                                                           <select multiple="multiple" name="" class="slc_category">
                                                               <option>Abstract</option>
                                                               <option>Agriculture/ Farming </option>
                                                               <option>Animals/ Livestock </option>
                                                               <option>Arts/ Entertainment </option>
                                                               <option>Beauty/ Fashion </option>
                                                               <option>Business </option>
                                                               <option>Buildings/ Landmarks </option>
                                                               <option>Celebrity </option>
                                                               <option>Education </option>
                                                               <option>Food/ Cuisines </option>
                                                               <option>Beverage/ Drink </option>
                                                               <option>Medical/ Healthcare </option>
                                                               <option>Holiday </option>
                                                               <option>Industrial </option>
                                                               <option>Interior </option>
                                                               <option>Nature </option>
                                                               <option>Outdoor </option>
                                                               <option>People </option>
                                                               <option>Religion </option>
                                                               <option>Signs/ Symbols </option> 
                                                               <option>Sports </option>
                                                               <option>ICT/ Technology </option>
                                                               <option>Infrastructure </option>
                                                               <option>Vintage </option>
                                                               <option>Telecommunication </option>
                                                               <option>Tourism/ Hospitality </option>
                                                               <option>Wildlife </option>
                                                           </select> 
                                                          </div>
                                                          <div class="large-4 columns">
                                                            <button type="submit" class="button btn_search">
                                                               Apply
                                                           </button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </form>
                                                <form class="image_type">
                                                        <div class="add_title">
                                                         Image Type  : 
                                                         <select  name="" class="inline_input">
                                                            <option>Select Image Type</option>
                                                            <option>Creative Image</option>
                                                            <option>Editorial Image</option>
                                                         </select>
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="image_subtype">
                                                        <div class="add_title">
                                                         Image Subtype  : 
                                                         <select  name="" class="inline_input">
                                                            <option>Select Image Subtype</option>
                                                            <option>Photography </option>
                                                            <option>Illustration</option>
                                                            <option>All</option>
                                                         </select>
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="orientation">
                                                        <div class="add_title">
                                                         Orientation  : 
                                                         <select  name="" class="inline_input">
                                                            <option>Select Orientation</option>
                                                            <option>Landscape </option>
                                                            <option>Potrait</option>
                                                         </select>
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="people">
                                                        <div class="add_title">
                                                         People  : 
                                                         <select  name="" class="inline_input">
                                                              <option>Select number of people </option>
                                                              <option>1</option>
                                                              <option>2</option>
                                                              <option>3</option>
                                                              <option>4</option>
                                                              <option>5</option>
                                                              <option>6</option>
                                                              <option>7</option>
                                                              <option>8</option>
                                                              <option>9</option>
                                                                <option>10</option>
                                                         </select>
                                                         <button type="submit" class="button btn_search">
                                                             Apply
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="attach_release">
                                                        <div class="add_title">
                                                         Attach Release  : 
                                                        <select  name="" class="inline_input">
                                                              <option>Select Releases </option>
                                                              
                                                         </select>
                                                         <button type="submit" class="button btn_search">
                                                             Attach
                                                         </button>
                                                        </div>
                                                </form>
                                                <form class="same_shoot">
                                                        <div class="add_title">
                                                         Same Shoot  : 
                                                         
                                                         <div class="row collapse">
                                                           <div class="large-4 columns">
                                                              <button type="submit" class="button alert">
                                                                  Generate Same Shoot Code
                                                              </button>
                                                           </div>
                                                           <div class="large-6 columns">
                                                              <input type="text" name="" class="">
                                                           </div>
                                                           <div class="large-2 columns">
                                                              <button type="submit" class="button btn_search">
                                                                  Apply
                                                              </button>
                                                           </div>
                                                         </div>
                                                        </div>
                                                </form>
                                                <form class="model_notification">
                                                        <div class="add_title">
                                                          <div class="row collapse">
                                                            <div class="large-4 columns">
                                                             Model Notification  : 
                                                            </div>
                                                            <div class="large-8 columns">
                                                                <div class="row collapse">
                                                                  <div class="large-10 columns">
                                                                    <input type="text" name="" class="" placeholder="Enter model’s email address one at a time">
                                                                  </div>
                                                                  <div class="large-2 columns">
                                                                     <button type="submit" class="button btn_search">
                                                                         ADD
                                                                     </button>
                                                                  </div>
                                                                </div>
                                                                <div class="row collapse">
                                                                  <div class="large-10 columns">
                                                                    <input type="text" name="" class="">
                                                                  </div>
                                                                  <div class="large-2 columns">
                                                                     <button type="submit" class="button postfix">
                                                                         FIND
                                                                     </button>
                                                                  </div>
                                                                </div>
                                                                <div class="row collapse">
                                                                  <div class="large-10 columns">
                                                                    <input type="text" name="" class="">
                                                                  </div>
                                                                  <div class="large-2 columns">
                                                                     <button type="submit" class="button postfix">
                                                                         REPLACE
                                                                     </button>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                </form>
                                                
                                                     
                                              </div>
                                          </div>
                                            <div style="clear: both"></div>
                                          </div>
                                    <div class="report_header">
                                       <div class="large-4 columns">
                                            <input type="checkbox" name="" class="select_all">
                                           <strong>George Ngechu Files Approval</strong>
                                       </div>
                                     <div style="clear: both"></div>
                                    </div>
                                     <div class="edit_content">
                         
                                          <div class="edit_item">
                                            <div class="row">
                                              <div class="large-2 column">
                                                  <input type="checkbox" name="" class="select_file">

                                                  <img src="assets/img/search_image.png" class="edit_file_img">
                                              </div>
                                              <div class="large-4 column">
                                                      <div>Image ID : 0012354 </div>
                                                      <label>Title : </label>
                                                      <input type="text" name="" placeholder="Name" value="Equatorial Forest" class="form_group">
                                                      <label> Key Words : </label>
                                                      <textarea  name="" placeholder="0000">
                                                          Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,Reaching, Sun,
                                                          Rays, Watch, View, Rooftop, Kenya,Nairobi, City, Capital, Nairobi, County,
                                                          Sun, Sunset, Dusk, Rays, Sundowner, Upperhill, City skyline, Buildings,
                                                          Offices,
                                                      </textarea>
                                              </div>
                                              <div class="large-3 columns">
                                                 <div class="row collapse">
                                                    <div class="large-5 columns">
                                                        Set Price 
                                                        <div class="row collapse">
                                                            <div class="large-12 columns">
                                                                  <input type="text" name="" placeholder="Price" class="form_group">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="large-5 columns">
                                                        <label>License Type:</label>
                                                        <select>
                                                          <option>Select License</option>
                                                          <option selected>Royalty Free</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                                    <div class="row">
                                                        <form>
                                                          <div class="large-5 columns">
                                                              <label>Category:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select multiple="multiple" class="slc_category">
                                                                <option>Select Categories</option>
                                                                <option>Abstract</option>
                                                                <option>Agriculture/ Farming </option>
                                                                <option>Animals/ Livestock </option>
                                                                <option>Arts/ Entertainment </option>
                                                                <option>Beauty/ Fashion </option>
                                                                <option>Business </option>
                                                                <option>Buildings/ Landmarks </option>
                                                                <option>Celebrity </option>
                                                                <option>Education </option>
                                                                <option>Food/ Cuisines </option>
                                                                <option>Beverage/ Drink </option>
                                                                <option>Medical/ Healthcare </option>
                                                                <option>Holiday </option>
                                                                <option>Industrial </option>
                                                                <option>Interior </option>
                                                                <option>Nature </option>
                                                                <option>Outdoor </option>
                                                                <option>People </option>
                                                                <option>Religion </option>
                                                                <option>Signs/ Symbols </option> 
                                                                <option>Sports </option>
                                                                <option>ICT/ Technology </option>
                                                                <option>Infrastructure </option>
                                                                <option>Vintage </option>
                                                                <option>Telecommunication </option>
                                                                <option>Tourism/ Hospitality </option>
                                                                <option>Wildlife </option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Image Type:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Image Type</option>
                                                                <option>Creative Image</option>
                                                                <option>Editorial Image</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Image Subtype:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Image Subtype</option>
                                                                <option>Photography </option>
                                                                <option>Illustration</option>
                                                                <option>All</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Orientation:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Orientation</option>
                                                                <option>Landscape </option>
                                                                <option>Potrait</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>People:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select number of people </option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                              </select>
                                                          </div>
                                                          
                                                        </form>
                                                      </div>
                                                </div>
                                              <div class="large-3 columns">
                                                    <div class="large-12 columns">
                                                      <strong> Attach Releases (2) </strong>
                                                    </div>
                                                    <div class="large-12 columns">
                                                         <div class="row collapse">
                                                            <a href="">Jane Release form.jpg</a>
                                                            <a href="">Jane’s baby girl release form.pdf</a>
                                                          </div>
                                                    </div>

                                                   
                                                    <div class="large-12 columns">
                                                       <div class="row collapse">
                                                         <strong> Model Notification (1)</strong>
                                                       </div>
                                                    </div>
                                                    <div class="large-12 columns">
                                                        jmakali@gmail.com
                                                    </div>
                                                    <div class="approve">
                                                      <div class="approve_img"><img src="assets/icons/approve.png"></div>
                                                      <div class="approve_img"><img src="assets/icons/decline.png"></div>
                                                    </div>
                                              </div>
                                             </div>
                                          </div>
                                           <div class="edit_item">
                                            <div class="row">
                                              <div class="large-2 column">
                                                  <input type="checkbox" name="" class="select_file">

                                                  <img src="assets/img/search_image.png" class="edit_file_img">
                                              </div>
                                              <div class="large-4 column">
                                                      <div>Image ID : 0012354 </div>
                                                      <label>Title : </label>
                                                      <input type="text" name="" placeholder="Name" value="Equatorial Forest" class="form_group">
                                                      <label> Key Words : </label>
                                                      <textarea  name="" placeholder="0000">
                                                          Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,Reaching, Sun,
                                                          Rays, Watch, View, Rooftop, Kenya,Nairobi, City, Capital, Nairobi, County,
                                                          Sun, Sunset, Dusk, Rays, Sundowner, Upperhill, City skyline, Buildings,
                                                          Offices,
                                                      </textarea>
                                              </div>
                                              <div class="large-3 columns">
                                                 <div class="row collapse">
                                                    <div class="large-5 columns">
                                                        Set Price 
                                                        <div class="row collapse">
                                                            <div class="large-12 columns">
                                                                  <input type="text" name="" placeholder="Price" class="form_group">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="large-5 columns">
                                                        <label>License Type:</label>
                                                        <select>
                                                          <option>Select License</option>
                                                          <option selected>Royalty Free</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                                                                             <div class="row">
                                                        <form>
                                                          <div class="large-5 columns">
                                                              <label>Category:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select multiple="multiple" class="slc_category">
                                                                <option>Select Categories</option>
                                                                <option>Abstract</option>
                                                                <option>Agriculture/ Farming </option>
                                                                <option>Animals/ Livestock </option>
                                                                <option>Arts/ Entertainment </option>
                                                                <option>Beauty/ Fashion </option>
                                                                <option>Business </option>
                                                                <option>Buildings/ Landmarks </option>
                                                                <option>Celebrity </option>
                                                                <option>Education </option>
                                                                <option>Food/ Cuisines </option>
                                                                <option>Beverage/ Drink </option>
                                                                <option>Medical/ Healthcare </option>
                                                                <option>Holiday </option>
                                                                <option>Industrial </option>
                                                                <option>Interior </option>
                                                                <option>Nature </option>
                                                                <option>Outdoor </option>
                                                                <option>People </option>
                                                                <option>Religion </option>
                                                                <option>Signs/ Symbols </option> 
                                                                <option>Sports </option>
                                                                <option>ICT/ Technology </option>
                                                                <option>Infrastructure </option>
                                                                <option>Vintage </option>
                                                                <option>Telecommunication </option>
                                                                <option>Tourism/ Hospitality </option>
                                                                <option>Wildlife </option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Image Type:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Image Type</option>
                                                                <option>Creative Image</option>
                                                                <option>Editorial Image</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Image Subtype:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Image Subtype</option>
                                                                <option>Photography </option>
                                                                <option>Illustration</option>
                                                                <option>All</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>Orientation:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select Orientation</option>
                                                                <option>Landscape </option>
                                                                <option>Potrait</option>
                                                              </select>
                                                          </div>
                                                          <div class="large-5 columns">
                                                              <label>People:</label>
                                                          </div>
                                                          <div class="large-7 columns">
                                                              <select>
                                                                <option>Select number of people </option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                              </select>
                                                          </div>
                                                          
                                                        </form>
                                                      </div>
                                              </div>
                                              <div class="large-3 columns">
                                                    <div class="large-12 columns">
                                                      <strong> Attach Releases (2) </strong>
                                                    </div>
                                                    <div class="large-12 columns">
                                                         <div class="row collapse">
                                                            <a href="">Jane Release form.jpg</a>
                                                            <a href="">Jane’s baby girl release form.pdf</a>
                                                          </div>
                                                    </div>
                                                    <div class="large-12 columns">
                                                       <div class="row collapse">
                                                         <strong> Model Notification (1)</strong>
                                                       </div>
                                                    </div>
                                                    <div class="large-12 columns">
                                                        jmakali@gmail.com
                                                    </div>
                                                    <div class="approve">
                                                      <div class="approve_img"><img src="assets/icons/approve.png"></div>
                                                      <div class="approve_img"><img src="assets/icons/decline.png"></div>
                                                    </div>
                                              </div>
                                             </div>
                                          </div>
                                      </div>
                    </div>
                    <div class="tabs-panel" id="excontributors">
                        <div class="row">
                           <div class="large-5 columns medium-5 columns pull-left">
                               <form class="reports_search">
                                 <select class="inside_search_slc edit_slc">
                                     <option value=""> Action </option>
                                     <option value="Title"> Freeze Account </option>
                                     <option value="Delete"> Delete </option>
                                 </select>
                                 <span class="question_wrap">
                                     <span class="question_this">
                                        <img src="assets/icons/question.png">
                                     </span>
                                     <span class="question_text">
                                          <a class="question_close">
                                              <i class="fa fa-times" aria-hidden="true"></i>
                                          </a>
                                          Actions help you apply multiple commands on multiple files all at once. How
                                          does it work? First select the multiple files you want to Action by clicking on
                                          checkbox(s) on the left side of each file then choose an action under the
                                          “Actions” dropdown menu and the click “Apply” button.
                                          Every action you chose under the dropdown menu has the help message specific
                                          explaining about that action. Simply move your mouse over the question mark.
                                     </span>
                                 </span>
                                   
                               </form>
                           </div>
                           <div class="large-4 columns medium-4 columns pull-right">
                                <span class="search_pagination"> 
                                  <select class="pagination_slc">
                                       <option value="">Files Per Page</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                       <option value="150">150</option>
                                   </select>
                                  Page <input type="number" name="page_number" placeholder="1" class="page_number"> of 120 
                                     <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                     <a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                </span>
                           </div>
                        </div>
                        <div class="row">
                            <div class="reports_search large-6 columns pull-left">
                              <form class="title">
                                      <div class="add_title">
                                       Freeze Account  : 
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                            </div>
                            <div class="large-4 columns medium-4 columns pull-right">
                                 <form class="row collapse">
                                     <div class="small-8 columns pull-left">
                                        <input type="text" name="search" class="" placeholder="Search">
                                     </div>
                                     <div class="small-4 columns pull-left">
                                        <a class="button postfix" href="#">
                                             SEARCH
                                        </a>
                                     </div>
                                 </form>
                            </div> 
                        </div>
                        <div class="report_header">
                           <div class="row">
                               <div class="large-2 column">
                                   <input type="checkbox" name="" class="select_all">
                                   Name
                               </div>
                               <div class="large-2 column">
                                   Email Address
                               </div>

                               <div class="large-2 column">
                                   Tel Number
                               </div>
                               <div class="large-2 column">
                                   Date Joined
                               </div>
                               <div class="large-2 column">
                                   Uploads
                               </div>
                               <div class="large-2 column">
                                   New Uploads
                               </div>
                           </div>
                        </div> 
                        <div class="report_content">
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                       <input type="checkbox" name="" class="select_file">
                                        George Ngechu
                                     </div>
                                     <div class="large-2 column report_col">
                                         gngechu@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href="">(25) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href="">(5) </a>
                                     </div>
                                     
                                  </div>
                                  <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <img src="assets/img/user_avatar.png">
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  George Ngechu
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> jmakali@gmail.com
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> +254 723 112233
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> Bank
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> 38540-00100
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> Kenya
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> Nairobi
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  <span class="approve_img"><img src="assets/icons/approve.png"></span>
                                                  <span class="approve_img"><img src="assets/icons/decline.png"></span>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                        <input type="checkbox" name="" class="select_file">
                                        Jane Makali
                                     </div>
                                     <div class="large-2 column report_col">
                                         jmakali@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (100) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (5) </a>
                                     </div>
                                  </div>
                                  <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <img src="assets/img/user_avatar.png">
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  George Ngechu
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> jmakali@gmail.com
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> +254 723 112233
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> Bank
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> 38540-00100
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> Kenya
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> Nairobi
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  <span class="approve_img"><img src="assets/icons/approve.png"></span>
                                                  <span class="approve_img"><img src="assets/icons/decline.png"></span>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                        <input type="checkbox" name="" class="select_file">
                                        Jane Makali
                                     </div>
                                     <div class="large-2 column report_col">
                                         jmakali@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (100) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (5) </a>
                                     </div>
                                  </div>
                                   <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <img src="assets/img/user_avatar.png">
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  George Ngechu
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> jmakali@gmail.com
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> +254 723 112233
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> Bank
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> 38540-00100
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> Kenya
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> Nairobi
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  <span class="approve_img"><img src="assets/icons/approve.png"></span>
                                                  <span class="approve_img"><img src="assets/icons/decline.png"></span>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                        <input type="checkbox" name="" class="select_file">
                                        Jane Makali
                                     </div>
                                     <div class="large-2 column report_col">
                                         jmakali@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (100) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (5) </a>
                                     </div>
                                  </div>
                                 <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <img src="assets/img/user_avatar.png">
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  George Ngechu
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> jmakali@gmail.com
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> +254 723 112233
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> Bank
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> 38540-00100
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> Kenya
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> Nairobi
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  <span class="approve_img"><img src="assets/icons/approve.png"></span>
                                                  <span class="approve_img"><img src="assets/icons/decline.png"></span>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                        <input type="checkbox" name="" class="select_file">
                                        Jane Makali
                                     </div>
                                     <div class="large-2 column report_col">
                                         jmakali@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (100) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (5) </a>
                                     </div>
                                  </div>
                                   <div class="row more_details">
                                     <div class="large-4 column report_col">
                                         <div class="large-4 columns">
                                            <img src="assets/img/user_avatar.png">
                                         </div>
                                         <div class="large-8 columns">
                                              <div>
                                                  <span class="strong"> Name: </span>  George Ngechu
                                              </div>
                                              <div>
                                                  <span class="strong"> Email: </span> jmakali@gmail.com
                                              </div>
                                              <div>
                                                  <span class="strong"> Tel No: </span> +254 723 112233
                                              </div>                                                        
                                              <div>
                                                  <span class="strong"> Mode of Payment: </span> Bank
                                              </div> 
                                              <div>
                                                  <span class="strong"> Address: </span> 38540-00100
                                              </div> 
                                              <div>
                                                  <span class="strong"> Country: </span> Kenya
                                              </div> 
                                              <div>
                                                  <span class="strong"> Town: </span> Nairobi
                                              </div> 
                                         </div>
                                     </div>
                                     
                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                    <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  
                                              </div>

                                     </div>
                                  </div>
                             </div>
                             <div class="report_item">
                                  <div class="row">
                                     <div class="large-2 column report_col">
                                        <input type="checkbox" name="" class="select_file">
                                        Jane Makali
                                     </div>
                                     <div class="large-2 column report_col">
                                         jmakali@gmail.com
                                     </div>
                                     <div class="large-2 column report_col">
                                         +254 723 112233
                                     </div>
                                     <div class="large-2 column report_col">
                                         30th Dec 2015
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (100) </a>
                                     </div>
                                     <div class="large-2 column report_col">
                                          <a href=""> (5) </a>
                                     </div>
                                  </div>
                                  <div class="row more_details">
                                     <div class="large-2 column report_col">
                                            <img src="assets/img/user_avatar.png">
                                     </div>
                                     <div class="large-4 column report_col">
                                          <div>
                                              <span class="strong"> Name: </span>  George Ngechu
                                          </div>
                                          <div>
                                              <span class="strong"> Email: </span> jmakali@gmail.com
                                          </div>
                                          <div>
                                              <span class="strong"> Tel No: </span> +254 723 112233
                                          </div>                                                        
                                          <div>
                                              <span class="strong"> Mode of Payment: </span> Bank
                                          </div> 
                                          <div>
                                              <span class="strong"> Address: </span> 38540-00100
                                          </div> 
                                          <div>
                                              <span class="strong"> Country: </span> Kenya
                                          </div> 
                                          <div>
                                              <span class="strong"> Town: </span> Nairobi
                                          </div> 
                                     </div>
                                   

                                     <div class="large-4 column report_col pull-left">
                                              <div>
                                                  <span class="strong"> Date Joined: </span> 30th Dec 2015 
                                              </div>
                                              <div>
                                                  <span class="strong"> Uploads: </span> 0
                                              </div>
                                              <div>
                                                  <span class="strong"> New Uploads: </span> 5
                                              </div>
                                              <div>
                                                  <span class="strong"> Identification: </span> 
                                                  <a href=""> Passport ID.jpg </a>
                                                  <span class="approve_img"><img src="assets/icons/approve.png"></span>
                                                  <span class="approve_img"><img src="assets/icons/decline.png"></span>
                                              </div>

                                     </div>
                                  </div>
                             </div>
                        </div>                       
                    </div>
                    <div class="tabs-panel" id="tluploads">
                        <div class="row">
                           <div class="large-5 columns medium-5 columns pull-left">
                               <form class="reports_search">
                                 <select class="inside_search_slc edit_slc">
                                     <option value=""> Action </option>
                                     <option value="Title"> Add Title </option>
                                     <option value="Keywords"> Add Keywords </option>
                                     <option value="Price"> Set Price </option>
                                     <option value="Image Type"> Image Type </option>
                                     <option value="Image Subtype"> Image Subtype </option>
                                     <option value="Orientation"> Orientation </option>
                                     <option value="People"> People </option>
                                     <option value="" class="delete_option"> Hibernate a File </option>
                                 </select>
                                 <span class="question_wrap">
                                     <span class="question_this">
                                        <img src="assets/icons/question.png">
                                     </span>
                                     <span class="question_text">
                                          <a class="question_close">
                                              <i class="fa fa-times" aria-hidden="true"></i>
                                          </a>
                                          Actions help you apply multiple commands on multiple files all at once. How
                                          does it work? First select the multiple files you want to Action by clicking on
                                          checkbox(s) on the left side of each file then choose an action under the
                                          “Actions” dropdown menu and the click “Apply” button.
                                          Every action you chose under the dropdown menu has the help message specific
                                          explaining about that action. Simply move your mouse over the question mark.
                                     </span>
                                 </span>
                                   
                               </form>
                           </div>
                           <div class="large-4 columns medium-4 columns pull-right">
                                <span class="search_pagination"> 
                                  <select class="pagination_slc">
                                       <option value="">Files Per Page</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                       <option value="150">150</option>
                                   </select>
                                  Page <input type="number" name="page_number" placeholder="1" class="page_number"> of 120 
                                     <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                     <a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                </span>
                           </div>
                        </div>
                        <div class="row">
                            <div class="reports_search large-6 columns pull-left">
                              <form class="title">
                                      <div class="add_title">
                                       Add Title  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="add_keywords">
                                      <div class="add_title">
                                       Add Keywords  : 
                                       <textarea type="text" name="" class="inline_input">
                                       </textarea> 
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="set_price">
                                      <div class="add_title">
                                       Set Price  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="image_type">
                                      <div class="add_title">
                                       Image Type  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="image_subtype">
                                      <div class="add_title">
                                       Image Subtype  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="orientation">
                                      <div class="add_title">
                                       Orientation  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="people">
                                      <div class="add_title">
                                       People  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="attach_release">
                                      <div class="add_title">
                                       Attach Release  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="same_shoot">
                                      <div class="add_title">
                                       Same Shoot  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                              <form class="model_notification">
                                      <div class="add_title">
                                       Model Notification  : 
                                       <input type="text" name="" class="inline_input">
                                       <button type="submit" class="button btn_search">
                                           Apply
                                       </button>
                                      </div>
                              </form>
                            </div>
                             <div class="large-4 columns medium-4 columns pull-right">
                                <form class="row collapse">
                                    <div class="small-8 columns pull-left">
                                       <input type="text" name="search" class="" placeholder="Search by image id">
                                    </div>
                                    <div class="small-4 columns pull-left">
                                       <a class="button postfix" href="#">
                                            SEARCH
                                       </a>
                                    </div>
                                </form>
                           </div> 
                        </div>
                        <div class="tab_header">  
                            
                           <div class="tabs_content">
                                <div class="report_header">
                                    <div class="row">
                                        <div class="large-1 column">
                                            <input type="checkbox" name="" class="select_all">
                                            File
                                        </div>
                                        <div class="large-1 column">
                                            ID
                                        </div>
                                        <div class="large-2 column">
                                            Title
                                        </div>
                                        <div class="large-3 column">
                                            Keywords
                                        </div>
                                        <div class="large-1 column">
                                            Price
                                        </div>
                                        <div class="large-1 column">
                                            Release
                                        </div>
                                        <div class="large-1 column">
                                            Others
                                        </div>
                                        <div class="large-2 column">
                                            Date Uploaded
                                        </div>
                                    </div>
                                </div> 
                                <div class="report_content">
                                    <div class="report_item">
                                        <div class="row">
                                            <div class="large-1 column">
                                                <input type="checkbox" name="" class="select_file">
                                                <img src="assets/img/search_image.png">
                                            </div>
                                            <div class="large-1 column">
                                                0012354
                                            </div>
                                            <div class="large-2 column">
                                                Equatorial Forest
                                            </div>
                                            <div class="large-3 column">
                                                Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,
                                                Reaching, Sun, Rays, Watch, View, Rooftop, Kenya,
                                                Nairobi, City, Capital, Nairobi, County, Sun, Sunset, Dusk,
                                                Rays, Sundowner, Upperhill, City skyline, Buildings, Office
                                            </div>
                                            <div class="large-1 column">
                                                $15
                                            </div>
                                            <div class="large-1 column">
                                                (2)
                                            </div>
                                            <div class="large-1 column">
                                                View
                                            </div>
                                            <div class="large-2 column">
                                                28th Dec, 2015
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report_item">
                                        <div class="row">
                                            <div class="large-1 column">
                                                <input type="checkbox" name="" class="select_file">
                                                <img src="assets/img/search_image.png">
                                            </div>
                                            <div class="large-1 column">
                                                0012354
                                            </div>
                                            <div class="large-2 column">
                                                Equatorial Forest
                                            </div>
                                            <div class="large-3 column">
                                                Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,
                                                Reaching, Sun, Rays, Watch, View, Rooftop, Kenya,
                                                Nairobi, City, Capital, Nairobi, County, Sun, Sunset, Dusk,
                                                Rays, Sundowner, Upperhill, City skyline, Buildings, Office
                                            </div>
                                            <div class="large-1 column">
                                                $15
                                            </div>
                                            <div class="large-1 column">
                                                (2)
                                            </div>
                                            <div class="large-1 column">
                                                View
                                            </div>
                                            <div class="large-2 column">
                                                28th Dec, 2015
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report_item">
                                        <div class="row">
                                            <div class="large-1 column">
                                                <input type="checkbox" name="" class="select_file">
                                                <img src="assets/img/search_image.png">
                                            </div>
                                            <div class="large-1 column">
                                                0012354
                                            </div>
                                            <div class="large-2 column">
                                                Equatorial Forest
                                            </div>
                                            <div class="large-3 column">
                                                Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,
                                                Reaching, Sun, Rays, Watch, View, Rooftop, Kenya,
                                                Nairobi, City, Capital, Nairobi, County, Sun, Sunset, Dusk,
                                                Rays, Sundowner, Upperhill, City skyline, Buildings, Office
                                            </div>
                                            <div class="large-1 column">
                                                $15
                                            </div>
                                            <div class="large-1 column">
                                                (2)
                                            </div>
                                            <div class="large-1 column">
                                                View
                                            </div>
                                            <div class="large-2 column">
                                                28th Dec, 2015
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report_item">
                                        <div class="row">
                                            <div class="large-1 column">
                                                <input type="checkbox" name="" class="select_file">
                                                <img src="assets/img/search_image.png">
                                            </div>
                                            <div class="large-1 column">
                                                0012354
                                            </div>
                                            <div class="large-2 column">
                                                Equatorial Forest
                                            </div>
                                            <div class="large-3 column">
                                                Evening, Grab, Grabbing, Stretch, Hand, Strecthing, Out,
                                                Reaching, Sun, Rays, Watch, View, Rooftop, Kenya,
                                                Nairobi, City, Capital, Nairobi, County, Sun, Sunset, Dusk,
                                                Rays, Sundowner, Upperhill, City skyline, Buildings, Office
                                            </div>
                                            <div class="large-1 column">
                                                $15
                                            </div>
                                            <div class="large-1 column">
                                                (2)
                                            </div>
                                            <div class="large-1 column">
                                                View
                                            </div>
                                            <div class="large-2 column">
                                                28th Dec, 2015
                                            </div>
                                        </div>
                                    </div>
                                </div>           
                            </div>                
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="tabs-panel" id="resources">
                        <div class="tab_header"> 
                           <hr/>
                           <div class="tab_title">
                              General release forms for contributors.
                           </div> 
                           <div class="tabs_content">
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Model Release Form:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Model Release Form.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button postfix" href="#">
                                               UPLOAD FORM
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Property Release Form:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Property Release Form.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button postfix" href="#">
                                               UPLOAD FORM
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                             <hr/>
                             <div class="tab_title">
                                Other resources necessary for contributors
                             </div>
                             <div class="row resource_item">
                                <div class="large-2 columns">
                                    Resource File:
                                </div>
                                <div class="large-5 columns pull-left">
                                   <form class="row collapse">
                                       <div class="small-8 columns pull-left">
                                          <input type="text" name="search" class="" placeholder="Resource File.pdf">
                                       </div>
                                       <div class="small-4 columns pull-left">
                                          <a class="button postfix" href="#">
                                               UPLOAD
                                          </a>
                                       </div>
                                   </form>
                                </div>
                             </div>
                            </div>                
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
            <div class="tabs-panel admin_panel" id="sales">
                  <div class="tab_header">  
                      <div class="row collapse">
                          <div class="large-5 columns medium-5 columns pull-left">
                              <form class="reports_search">
                                <select class="inside_search_slc" id="report_slc">
                                    <option value="sales">Sales Reports </option>
                                    <option value="statement">Sales Statement</option>
                                    <option value="license">License Type</option>
                                    <option value="files">My Files</option>
                                </select>
                                  
                                <span class="question_wrap">
                                    <span class="question_this">
                                       <img src="assets/icons/question.png">
                                    </span>
                                    <span class="question_text">
                                         <a class="question_close">
                                             <i class="fa fa-times" aria-hidden="true"></i>
                                         </a>
                                         Actions help you apply multiple commands on multiple files all at once. How
                                         does it work? First select the multiple files you want to Action by clicking on
                                         checkbox(s) on the left side of each file then choose an action under the
                                         “Actions” dropdown menu and the click “Apply” button.
                                         Every action you chose under the dropdown menu has the help message specific
                                         explaining about that action. Simply move your mouse over the question mark.
                                    </span>
                                </span>
                                  
                              </form>
                          </div>
                           <div class="large-4 columns medium-4 columns pull-right">
                               <span class="search_pagination"> 
                                 <select class="pagination_slc">
                                      <option value="">Files Per Page</option>
                                      <option value="50">50</option>
                                      <option value="100">100</option>
                                      <option value="150">150</option>
                                  </select>
                                 Page <input type="number" name="page_number" placeholder="1" class="page_number"> of 120 
                                    <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                    <a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                               </span>
                          </div>
                      </div>
                          <div class="row report_filters">
                            <div class="large-12 columns">
                                  <div class="sales_filter">
                                      <div class="row">
                                      <form class="reports_search">
                                        <select class="inside_search_slc">
                                            <option value=""> Sales </option>
                                            <option value=""> Per Image ID </option>
                                            <option value="">Per Date </option>

                                        </select>
                                          <button type="submit" class="button btn_search">
                                            Display
                                        </button>
                                      </form>
                                      </div>
                                  </div>
                                  <div class="statement_filter">
                                      <div class="row">
                                      
                                      <form class="reports_search">
                                        <select class="inside_search_slc">
                                            <option value=""> Sales Statement </option>
                                              
                                        </select>
                                          <button type="submit" class="button btn_search">
                                            Display
                                        </button>
                                      </form>
                                      </div>
                                  </div>
                                  <div class="license_filter">
                                      <div class="row">
                                      
                                      <form class="reports_search">
                                        <select class="inside_search_slc">
                                            <option value=""> License Type </option>
                                            <option value=""> Royalty Free </option>
                                            <option value=""> Right Managed </option>
                                            <option value=""> RF - Exclusive </option>
                                            <option value=""> RM - Exclusive </option>
                                              
                                        </select>
                                          <button type="submit" class="button btn_search">
                                            Display
                                        </button>
                                      </form>
                                      </div>
                                  </div>
                                  <div class="files_filter"> 
                                    <div class="row">
                                      
                                      <form class="reports_search">
                                        <select class="inside_search_slc">
                                            <option value="">My Files </option>
                                            <option value=""> My Images </option>
                                            <option value=""> My Videos</option>
                                            <option value=""> My Illustrations </option>
                                           
                                              
                                        </select>
                                          <button type="submit" class="button btn_search">
                                            Display
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                            </div>
                            <div style="clear: both"></div>
                          </div>
                      
                  <div class="tabs_content">
                       <div class="report_header">
                          <div class="row">

                          <div class="large-1 column">
                              File
                          </div>
                          <div class="large-1 column">
                              ID
                          </div>
                          <div class="large-5 column">
                              Title
                          </div>
                          <div class="large-2 column">
                              No. of Sales
                          </div>
                          <div class="large-2 column">
                              Date Purchased
                          </div>
                          <div class="large-1 column">
                              Sales
                          </div>
                          </div>
                       </div> 
                       <div class="report_content">
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
                                </div>
                                <div class="large-1 column report_col">
                                    0012354
                                </div>
                                <div class="large-5 column report_col">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column report_col">
                                    (2)
                                </div>
                                <div class="large-2 column report_col">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column report_col">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
                                </div>
                                <div class="large-1 column report_col">
                                    0012354
                                </div>
                                <div class="large-5 column report_col">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column report_col">
                                    (4)
                                </div>
                                <div class="large-2 column report_col">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column report_col">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
                                </div>
                                <div class="large-1 column report_col">
                                    0012354
                                </div>
                                <div class="large-5 column report_col">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column report_col">
                                   (2)
                                </div>
                                <div class="large-2 column report_col">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column report_col">
                                    $15
                                </div>
                               </div>
                            </div>
                            <div class="report_item">
                              <div class="row">
                                <div class="large-1 column report_col report_idle">
                                    <img src="assets/img/search_image.png">
                                </div>
                                <div class="large-1 column report_col">
                                    0012354
                                </div>
                                <div class="large-5 column report_col">
                                    Equatorial Forest
                                </div>
                                <div class="large-2 column report_col">
                                    (2)
                                </div>
                                <div class="large-2 column report_col">
                                     28th Dec, 2015
                                </div>
                                <div class="large-1 column report_col">
                                    $15
                                </div>
                               </div>
                            </div>
                       </div>           
                       <div class="report_footer">
                         <div class="row">
                       
                           <div class="pull-right">
                               Total Sales : $90
                           </div>
                          </div>
                       </div>
                  </div>
                  <div style="clear: both"></div>
            </div>
            </div>
        </div>
  </div>
  <footer class="inside-footer-bar">
     <div class="row collapse">
        <div class="large-6 columns medium-7 columns">
          <div class="footer-menu">
            <ul class="menu">
                <li class="menu-text menu-divider"> <a href="#"> Home </a></li>
                <li class="menu-text menu-divider"><a href="#"> About Us </a></li>
                <li class="menu-text menu-divider"><a href="#"> Terms & Conditions </a></li>
                <li class="menu-text menu-divider"><a href="#"> Contact Us </a></li>
                <li class="menu-text menu-divider"><a href="#"> Resources </a></li>
                <li class="menu-text menu-divider"><a href="#"> FAQs </a></li>
                <li class="menu-text"><a href="#"> Blog </a></li>
            </ul>
          </div>
        </div>
        <div class="large-6 columns medium-3 columns">
            <span class="copyright"> Copyright &copy; 2016 SuraImages </span>
        </div>
      </div>
  </footer>


    
   <script src="assets/js/vendor/jquery.js"></script>
   <script type="text/javascript" src="assets/filer/js/jquery.filer.min.js?v=1.0.5"></script>
   <script type="text/javascript" src="assets/filer/js/custom.js?v=1.0.5"></script>
   <script src="assets/js/vendor/what-input.js"></script>
   <script src="assets/js/vendor/foundation.js"></script>
   <script src="assets/js/vendor/fontAwesome.js"></script>
   <script src="assets/js/vendor/slick.min.js"></script>
   <script src="assets/js/app.js"></script>    
   
   <script src="assets/multiselect/multiple-select.js"></script>
   <script>
       
   </script> 
  </body>
</html>
