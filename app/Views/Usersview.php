<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
  .avatar img {
    width: 70px;
    height: 70px;
    float: left;
   
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
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
                    <div class="main-card mb-3 card">
                   <div class="card-body">
                   <div class="float-right mt-2" style="">
                  <button type="button" onclick="window.location.href='<?=base_url()?>/Admin/AddSubscription/<?php echo($User['data'][0]['User_Id'])?>'" class="btn mr-2 mb-2 btn-primary">Add Subscription</button>
                 </div>
                   <div class="avatar">
                   <?php if($User['data'][0]['Profile_Picture']!==''){?>
                   <img style="margin-left: 2%;" src="<?=base_url()?>/public/uploads/<?php echo $User['data'][0]['Profile_Picture'] ?>" alt="<?php echo 
                   $User['data'][0]['Profile_Picture'] ?>">
                  <?php } else { ?>
                  <img style="margin-left: 2%;" src="<?=base_url()?>/public/uploads/AvtarImage.png"  alt="AvtarImage.png">
                  <?php } ?>
                  </div>

                   <table width="100%" border="0" cellspacing="2" cellpadding="5">
                    <tbody>
                  
                    <tr>
                    <td></td>
                    <td><strong>Name</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Name'])?></td>
                    <td></td>
                    <td><strong>Contact</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Mobile_No'])?></td>
                     
                    </tr>
                   
                    <tr>
                    <td></td>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Email'])?></td>
                    <td></td>
                    <td><strong>City</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['City'])?></td>
                    </tr>
                    

                    <tr>
                    <td></td>
                    <td><strong>Country</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Country'])?></td>
                    <td></td>
                    <td><strong>Gender</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Gender'])?></td>
                    </tr>

                    

                    <tr>
                    <td></td>
                    <td><strong>DOB</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['DOB'])?></td>
                    <td></td>
                    <td><strong>Membership</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Membership'])?></td>
                    </tr>

                     

                    <tr>
                    <td></td>
                    <td><strong>Status</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['status'])?></td>
                    <td></td>
                    <td><strong>Course Title</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Course_Title'])?></td>
                    </tr>

                    

                    

                    <tr>
                    <td></td>
                    <td><strong>Registration Date</strong></td>
                    <td>:</td>
                    <td><?php echo($User['data'][0]['Registration_Date'])?></td>
                     
                    </tr>

                  
                   

                  
                   </tbody>
                   </table>
                  </div>
                 </div>

                  <div class="main-card mb-3 card">
                                    <div class="card-body"> 
                                    <h5 class="card-title">Course List</h5>
                                    <br>
                                   
                        
                                        <div class="table-responsive">
                                            <table id="table_id" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <th>Course Title</th>
                                                    <th>Course Fees INR</th>
                                                    <th>Course Fees USD</th>
                                                    <th>Course Duration</th>
                                                    <th>Subscription</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Course_Subscriptionlist['data'])){ 
                                                 foreach ($Course_Subscriptionlist['data'] as $val){?>

                                                <?php if($val['Order_Id']==0){?>
                                                  <tr>
                                                
                                                  <td><?php echo $val['Course_Title'] ?></td>
                                                  <td><?php echo $val['Course_Fees'] ?></a></td>
                                                  <td><?php echo $val['Course_Fee_USD'] ?></a></td>
                                                  <td><?php echo $val['Course_Duration'] ?></a></td>
                                                  <td>Free</td>
                                                  
                                                
                                                     </tr>
                                                  <?php } else {?>
                                                  <tr>
                                                
                                                  <td><?php echo $val['Course_Title'] ?></td>
                                                  <td><?php echo $val['Course_Fees'] ?></a></td>
                                                  <td><?php echo $val['Course_Fee_USD'] ?></a></td>
                                                  <td><?php echo $val['Course_Duration'] ?></a></td>
                                                  <td>Paid</td>
                                                     </tr>
                                                  <?php } ?>
                                                 
                                            
                                                  

                                                   
                                               



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                  
                                  

                  <div class="main-card mb-3 card">
                  <div class="card-body"> 
                  <h5 class="card-title">Order List</h5>
                  <br>
                                   
                                 
                        
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <th>Order Id</th>
                                                    <th>Order Date</th>
                                                    <th>Order ReferenceNo</th>
                                                    <th>Course</th>
                                                    <th>Amount</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Course_orderlist['data'])){ 
                                                 foreach ($Course_orderlist['data'] as $val){?>


                                                  <tr>
                                                
                                                  <td><?php echo $val['Order_Id'] ?></td>
                                                  <td><?php echo $val['Order_Date'] ?></a></td>
                                                  <td><?php echo $val['Order_ReferenceNo'] ?></a></td>
                                                  <td><?php echo $val['Course_Title'] ?></a></td>
                                                  <td><?php echo $val['Amount'] ?></a></td>
                                                 
                                            
                                                  

                                                   
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
                    <?php include 'include/Footer.php' ?> 
                  </div>
        </div>
    </div>
    <script src="<?=THEME?>/assets/js/datatables.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.buttons.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/jszip.min.js"></script>
    <script src="<?=THEME?>/assets/js/vfs_fonts.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.html5.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.print.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.colVis.min.js"></script>
    <script src="<?=THEME?>/assets/js/datatables-init.js"></script>
    <script type="text/javascript">
     $("#Userlist").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");
     $(document).ready( function () {
     $('#table_id').DataTable();
    } );
    </script>
</body>
</html>
