<?php 
                                   $base=base_url();

                                    
?>
<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                    <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                    <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>  
                    <div class="scrollbar-sidebar" style="overflow-y: scroll">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                            <div class="sidenav">

                          
                                

                                 <!-- <li class="app-sidebar__heading">Dashboards</li>-->
                                 <li class="app-sidebar__heading" >   </li>
                                <li >
                                    <a  id="Dashboard-active" href="<?=base_url()?>/Admin/Dashboard" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                        
                                    </a>  
                                    
                                    <?php if ($_SESSION['Type']=='Admin' ) {?>
                                </li>
                                 <a>
                                         <i class="fa fa-users"  ></i>
                                      <b>  Astro Services </b>
                                    </a>

                                <li class= "dropdown">
                                    <a id="blogs" href="#">
                                       Blogs <i class="metismenu-icon pe-7s-bookmarks"></i>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                </li>

                               <ul>

                               <li >
                                    <a id="chapters"  style="padding-left:40px" href="<?=base_url()?>/Admin/Chapter">
                                    <i class="metismenu-icon pe-7s-bookmarks" style="padding-left:20px"></i>
                                      Blogs
                                    </a>
                                </li>
                                <li >
                                    <a id="categories"  style="padding-left:40px" href="<?=base_url()?>/Admin/Packages">
                                    <i class="metismenu-icon pe-7s-bookmarks" style="padding-left:20px"></i>
                                      Categories
                                    </a>
                                </li>

                                 <li >
                                    <a id="Language" style="padding-left:40px" href="<?=base_url()?>/Admin/Languages">
                                    <i class="metismenu-icon pe-7s-bookmarks" style="padding-left:20px"></i>
                                      Tags
                                    </a>
                                </li>
                                
                            </ul>

                                <li>
                                    <a id="Customers"   href="<?=base_url()?>/MyControl/customers">
                                        <i class="metismenu-icon pe-7s-door-lock"  ></i>
                                      Customers
                                    </a>
                                </li>
                                
                                
                                <li>
                                    <a id="Astrologers" href="<?=base_url()?>/MyControl/astrologervalue">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                      Astrologers
                                    </a>
                                </li>

                                <li>
                                    <a id=" Astrologer Category" href="<?=base_url()?>/MyControl/Cat">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                      Astrologer Categories
                                    </a>
                                </li>

                                <li>
                                    <a id="Reviews" href="<?=base_url()?>/MyControl/Review">
                                        <i class="metismenu-icon pe-7s-smile"></i>
                                      Reviews
                                    </a>

                                </li>
                                    <a><i class="fa fa-money" aria-hidden="true"></i>
                                      <b>  Financials </b>
                                    </a>

                               

                                <li>
                                    <a id="Orders" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-plugin"></i>
                                      Orders
                                    </a>
                                </li>

                                <li>
                                    <a id="Membership" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-leaf"></i>
                                      Membership Plans
                                    </a>
                                </li>

                                <li>
                                    <a id="Refer and Earn" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-gift"></i>
                                      Refer and Earn
                                    </a>
                                </li>

                                <li>
                                    <a id="Statements" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-news-paper"></i>
                                      Statements
                                    </a>
                                </li>
                                <li>
                                    <a id="Coupons" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-door-lock"></i>
                                      Coupons
                                    </a>
                                </li>

                                    <a><i class="fa fa-gears" aria-hidden="true"></i>
                                      <b>  Settings </b>
                                    </a>
                                <li>
                                    <a id="Settings" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-config"></i>
                                      General Settings
                                    </a>
                                </li>
                                <li>
                                    <a id="GST" href="<?=base_url()?>/Admin/Languages">
                                        <i class="metismenu-icon pe-7s-door-lock"></i>
                                      GST Settings
                                    </a>
                                </li>
                                <li>
                                <a id="media_library" href="<?=base_url()?>/Admin/media_library">
                                <i class="metismenu-icon pe-7s-config"></i>
                                Media Library
                                 </a>
                                </li>
                                <li>
                                    <a id="Promotions" href="<?=base_url()?>/MyControl/promo_table">
                                        <i class="metismenu-icon pe-7s-ribbon"></i>
                                      Promotions and Banners
                                    </a>
                                </li>
                                <li>
                                    <a id="FAQ" href="<?=base_url()?>/MyControl/FAQ">
                                        <i class="metismenu-icon pe-7s-headphones"></i>
                                      FAQs
                                    </a>
                                </li>

                                <li class= "dropdown">
                                <a id="Users" href="#">
                                      Users  <i class="metismenu-icon pe-7s-users"></i>
                                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                </li>

                                 <ul>
                                <li class="dropdown-container">
                                    <a id="Userlist"  style="padding-left:40px" href="<?=base_url()?>/MyControl/user_table">
                                        <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                      User
                                    </a>
                                </li>

                                <li class="dropdown-container">
                                    <a id="Permission"  style="padding-left:40px" href="<?=base_url()?>/MyControl/Group_table">
                                        <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                      Permission Groups
                                    </a>
                                </li>
                        
                            </ul>

                            <li class= "dropdown">
                                <a id="Page" href="#">
                                      Page  <i class="metismenu-icon pe-7s-users"></i>
                                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                </li>

                                 <ul>
                                <li class="dropdown-container">
                                    <a id="pages"  style="padding-left:40px" href="<?=base_url()?>/MyControl/Page">
                                        <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                      Page 
                                    </a>
                                </li>

                                <li class="dropdown-container">
                                    <a id="page_category"  style="padding-left:40px" href="<?=base_url()?>/MyControl/Page_Category">
                                        <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                      Page Category
                                    </a>
                                </li>

                                <li class="dropdown-container">
                                    <a id="page_subcategory"  style="padding-left:40px" href="<?=base_url()?>/MyControl/Page_subcategory">
                                        <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                      Page Subcategory
                                    </a>
                                </li>
                        
                            </ul>
                            </ul>
   
                        </div>
                    </div>
                </div>

<?php  }
else { ?>
 
 <?php if ($_SESSION['Type']=='User' ) : ?>
            

          
                <?php if(isset($_SESSION['Permission']))
                                                    {

                                                     $count=0;
                                                     foreach ($_SESSION['Permission']as $val) {  
                                                        
                                                        switch($val['Module_name'])
                                                        {
                                                            case 'Blogs':
                                                               echo '<li class= "dropdown">
                                                            <a id="blogs" href="'.$base.'/Admin/Chapter">
                                                                Blogs <i class="metismenu-icon pe-7s-bookmarks"></i>
                                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                            </a>
                                                            </li>';
                                                          break;

                                                           case 'Categories':
                                                            echo  '<li >
                                                            <a id="categories"  style="padding-left:40px" href="'.$base.'/Admin/Packages">
                                                            <i class="metismenu-icon pe-7s-bookmarks" style="padding-left:20px"></i>
                                                              Categories
                                                            </a>
                                                        </li>';
                                                        break;
                                                        case 'Tags':
                                                            echo ' <li >
                                                               <a id="Language" style="padding-left:40px" href="'.$base.'/Admin/Languages">
                                                               <i class="metismenu-icon pe-7s-bookmarks" style="padding-left:20px"></i>
                                                                 Tags
                                                               </a>
                                                           </li>';
                                                           break;
                                                            case 'Customers':
                                                                echo ' <li>
                                                                <a id="Customers"   href="'.$base.'/MyControl/customers">
                                                                    <i class="metismenu-icon pe-7s-door-lock"  ></i>
                                                                  Customers
                                                                </a>
                                                            </li>';
                                                            break;
                                                            case 'Customers':
                                                                echo'<li>
                                                           <a id="blogs" href="$base/Admin/Chapter">
                                                              <a id="Customers"   href="'.$base.'/MyControl/customers">
                                                                  <i class="metismenu-icon pe-7s-door-lock"  ></i>
                                                                Customers
                                                              </a>
                                                          </li>';
                                                          break;
                                                          case 'Astrologers':
                                                           echo'<li>
                                                              <a id="Astrologers" href="'.$base.'/MyControl/astrologervalue">
                                                                  <i class="metismenu-icon pe-7s-user"></i>
                                                                Astrologers
                                                              </a>
                                                          </li>';
                                                          break;
                                                          case 'Reviews':
                                                         echo '<li>
                                                              <a id="Reviews" href="'.$base.'/MyControl/Review">
                                                                  <i class="metismenu-icon pe-7s-smile"></i>
                                                                Reviews
                                                              </a>
                                                              </li>';
                                                           break;
                                                           case 'Financials':
                                                           echo '</li>
                                                           <a><i class="fa fa-money" aria-hidden="true"></i>
                                                             <b>  Financials </b>
                                                           </a>
                                                          <li>';
                                                           break;
                                                           case 'Orders':
                                                           echo '<li>
                                                            <a id="Orders" href="'.$base.'/Admin/Languages">
                                                               <i class="metismenu-icon pe-7s-plugin"></i>
                                                             Orders
                                                           </a>
                                                            </li>';
                                                           break;
                                                           case 'Membership Plans':
                                                           echo '<li>
                                                                   <a id="Membership" href="'.$base.'/Admin/Languages">
                                                                       <i class="metismenu-icon pe-7s-leaf"></i>
                                                                   Membership Plans
                                                                   </a>
                                                               </li>';
                                                            break;
                                                            case 'Refer and Earn':
                                                            echo '<li>
                                                                   <a id="Refer and Earn" href="'.$base.'/Admin/Languages">
                                                                       <i class="metismenu-icon pe-7s-gift"></i>
                                                                   Refer and Earn
                                                                   </a>
                                                               </li>';
                                                             break;
                                                             case 'Refer and Earn':
                                                               echo '<li>
                                                               <a id="Statements" href="'.$base.'/Admin/Languages">
                                                                   <i class="metismenu-icon pe-7s-news-paper"></i>
                                                                 Statements
                                                               </a>
                                                                </li>';
                                                              break;
                                                           case 'Statements':
                                                              echo '<li>
                                                              <a id="Statements" href="'.$base.'/Admin/Languages">
                                                                  <i class="metismenu-icon pe-7s-news-paper"></i>
                                                                Statements
                                                              </a>
                                                          </li>';
                                                          break;
                                                          case 'Coupons':
                                                            echo '<li>
                                                              <a id="Coupons" href="'.$base.'/Admin/Languages">
                                                                  <i class="metismenu-icon pe-7s-door-lock"></i>
                                                                Coupons
                                                              </a>
                                                          </li>';
                                                           break;
                                                           case 'General Settings':   
                                                            echo '<li>
                                                              <a id="Settings" href="'.$base.'/Admin/Languages">
                                                                  <i class="metismenu-icon pe-7s-config"></i>
                                                                General Settings
                                                              </a>
                                                          </li>';
                                                          break;
                                                          case 'GST Settings':
                                                             echo '<li>
                                                              <a id="GST" href="'.$base.'/Admin/Languages">
                                                                  <i class="metismenu-icon pe-7s-door-lock"></i>
                                                                GST Settings
                                                              </a>
                                                          </li>';
                                                          break;
                                                          case 'Media Library';
                                                          echo ' <li>
                                                          <a id="media_library" href="'.$base.'/Admin/media_library">
                                                          <i class="metismenu-icon pe-7s-config"></i>
                                                          Media Library
                                                           </a>
                                                          </li>';
                                                          break;
                                                          case 'Promotions and Banners':
                                                           echo ' <li>
                                                           <a id="Promotions" href="'.$base.'/MyControl/promo_table">
                                                               <i class="metismenu-icon pe-7s-ribbon"></i>
                                                             Promotions and Banners
                                                           </a>
                                                           </li>';
                                                           break;
                                                           case 'FAQs':
                                                            echo ' <li>
                                                            <a id="FAQ" href="'.$base.'/MyControl/FAQ">
                                                                <i class="metismenu-icon pe-7s-headphones"></i>
                                                              FAQs
                                                            </a>
                                                            </li>';
                                                            break;
                                                            case 'User':
                                                            echo '<li >
                                                            <a id="Userlist"  style="padding-left:40px" href="'.$base.'/MyControl/user_table">
                                                                <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                                              User
                                                            </a>
                                                        </li>';
                                                        break;
                                                        case 'Permission Groups':
                                                           echo ' <li >
                                                           <a id="Permission"  style="padding-left:40px" href="'.$base.'/MyControl/Group_table">
                                                               <i class="metismenu-icon pe-7s-door-lock"  style="padding-left:40px"></i>
                                                             Permission Groups
                                                           </a>
                                                       </li>';
                                                       break;     
                                                        }   
                                                        
                                                        ?>
                                                          <?php $count = $count + 1; ?>  
                                                          
                                                        <?php } } ?>
      
           
   
       </ul>
       </ul>

   </div>
</div>
</div>
<?php endif; ?>
                               
                                

<?php  } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
              