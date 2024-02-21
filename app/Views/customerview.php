<link rel="stylesheet" href="<?=THEME?>assets/css/style.css">

<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.custom-clickable-row
{

   cursor: pointer;

}
.form-control:focus {
       box-shadow: 0 0 0 0.2rem rgb(255 255 255)!important;
  }
  .form-control  
  {
     font-size: 14px!important;
     height: 34px!important;
  }
  .checked {
  color: orange;
}

</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include 'include/Header.php' ?> 
                <div class="app-main">
                  <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
         
                            <div class="col-lg-12">
                              <?php if(isset($Msg['Msg'])){?>

                              <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                               
                                <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                              </div>
                              <?php } ?>
                                <div class="main-card mb-3  card">
                               
 <!--Main body content -->
        
           
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row no-margin home-det">
                      <div class="col-md-4 big-img">
                         
                         <div class="ltitle">
                        
                         
                        <div class="covwe-inn">
                         <img src="http://localhost/Astro/public/assets/images/profile.jpg" alt="" height="300px" width="300px">
                        </div>
                            
                         </div><!--card-->
                            
                         <ul class="hoby row no-margin">
                            
                            </ul>
                              <h2 style="color:#3f6ad8" class="ltitle"><b><?php echo $singleProduct['Customerdata'][0]['FName'] ?></b></h2>
    
                            <div class="refer-cov">
                                
                                <p><b>Contact</b> </p>
                                <span>Phone : +91 890 1232 8767</span>
                            </div>
                            <div class="refer-cov">
                               
                                <p><b>E-mail</b></p>
                                <span><?php echo $singleProduct['Customerdata'][0]['Email'] ?></span>
                            </div>
                            
                          </div>
                          <div class="col-md-8 home-dat">
                              <h2 class="rit-titl" style="color:#3f6ad8"><b>Personal Details</b></h2>
                            <div class="profess-cover row no-margin">
                                <div class="col-md-6">
                                    <div class=" prog-row row">
                                        <div class="col-sm-6">
                                        <b>Date of Birth</b>
                                        </div>
                                        <div class="col-sm-6">
                                        <?php echo $singleProduct['Customerdata'][0]['DOB'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                          <b>  Nationality </b>
                                        </div>
                                        <div class="col-sm-6">
                                               Indian
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                        <b>Time of Birth </b>
                                        </div>
                                        <div class="col-sm-6">
                                        <?php echo $singleProduct['Customerdata'][0]['Time_of_Birth'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                           <b> Gender </b>
                                        </div>
                                        <div class="col-sm-6">
                                        <?php echo $singleProduct['Customerdata'][0]['Gender'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                         <b> Age </b>
                                        </div>
                                        <div class="col-sm-6">
                                      26 Years
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                           <b> Website </b>
                                        </div>
                                        <div class="col-sm-6">
                                        https://guptakash.com
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                           <b> Languages </b>
                                        </div>
                                        <div class="col-sm-6">
                                       English,Hindi
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row prog-row">
                                        <div class="col-sm-6">
                                           <b> Place of Birth </b>
                                        </div>
                                        <div class="col-sm-6">
                                        <?php echo $singleProduct['Customerdata'][0]['Place_Of_Birth'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="links">
                              <div class="row ">
                                  <div class="col-xl-6 col-md-12">
                                      <ul class="btn-link">
                                          <li>
                                              <a href=""><i class="fas fa-paper-plane"></i> Contact</a>
                                          </li>
                                          <li>
                                              <a href=""><i class="fas fa-cloud-download-alt"></i> Download Profile</a>
                                          </li>
                                      </ul>
                                  </div>
                                  
                                  <div class="col-xl-6 col-md-12">
                                      <ul class="social-link">
                                          <li><i class="fa fa-quora" ></i></li>
                                          <li><i class="fa fa-android"></i></li>
                                          <li><i class="fa fa-whatsapp"></i></li>
                                          <li><i class="fa fa-reddit"></i></li>
                                          <li><i class="fa fa-facebook"></i></li>
                                          <li><i class="fa fa-youtube"></i></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                       
                  </div>
                              </div>
                              </div>
                              </div>
                              </div><!--card-->

                       
                      <div class="jumbo-address">
                         <div class="row no-margin">
                                  <div class="col-lg-12 no-padding">


                                  <div class="table-responsive">



                                  <?php// if(isset($Msg['Msg'])){?>


 
  <p class="mb-0">
<div class="main-card mb-3 card">
    
      <div class="card-body"><h5 class="card-title">Review Table</h5>
                                       
                                       <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                           <thead>
                                           <tr>
                                               <th> Review Id</th> 
                                               <th>Astrologer </th>
                                               <th>Review Date</th>
                                               <th>Rating</th> 
                                               <th>Comments</th> 
                                            
                                           </tr>
                                           </thead>
                                           <tbody>

                                           <?php if(isset($singleProduct)){ 
                                            
                                           foreach ($singleProduct['Reviewdata'] as $val){?>
                                           <tr>               
                                           <td><?php echo $val['Review_id']?></td>
                                           <td><?php echo $val['Astrologer_id'] ?></td>
                                           <td><?php echo $val['Review_date']?></td>
                                           <td><?php echo $val['Rating']?></td>
                                           <td><?php echo $val['Comments']?></td>
                                          
                                           </tr>
                                           
                                           <?php } } ?>

                                           </tbody>
                                       </table>
                                       </div>
                                        
                                        </div>
                                    </div>      
                        </div>




                          </div>
                         </div>

                      </div>
                      </div>
              </div>
             
              </div>
            </div>
        </div>
    </div> 
 <!-- Main content End -->
                    
                    <!-- Modal -->
                  
                <?php include 'include/Footer.php' ?> 
                  
           </div>
        </div>
    </div>

   </body>  
   
  

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</html>