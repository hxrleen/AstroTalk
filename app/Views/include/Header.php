<div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src" style="width: 92%;margin-top: 15px;">
                <img src="<?=base_url()?>/public/assets/images/logo.png" title="Super Brain"  style="width:97%;margin-top: -9%;">
                </div>
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
            </div>    <div class="app-header__content">
                
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <!-- <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                             -->
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <button onclick="window.location.href='<?=base_url()?>/Admin/Logout'" type="button" tabindex="0" class="dropdown-item">Sign Out</button>
                                        <button onclick="window.location.href='<?=base_url()?>/Admin/updatePassword'" type="button" tabindex="0" class="dropdown-item">Change Password</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                       <?php echo  $_SESSION['AdminName']; ?>
                                      <?php echo  $_SESSION['GroupID']; ?>
                                       <?php echo  $_SESSION['Type']; ?>
                                    </div>
                                    <div class="widget-subheading">
                                     
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>  