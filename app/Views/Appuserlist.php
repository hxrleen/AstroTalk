<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
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
.avatar img {
    width: 50px;
    height: 50px;
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
                              <?php if(isset($Msg['Msg'])){?>

                              <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                               
                                <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                              </div>
                              <?php } ?>
                                <div class="main-card mb-3  card">
                                <div class="card-body"><h5 class="card-title">App Users</h5>
                              <!--    <form class="form-inline" action="<?=base_url()?>/Admin/AppCouseUserslist" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right:0px;margin-top: -4%;margin-bottom: 10px;" >
                                       
                                  
                                       <div class="form-group mb-2 ml-2">
                                      <?php  $Membership = isset($_POST['Membership'])?$_POST['Membership']:'';?>
                                       
                                      <select  name="Membership" class="form-control" >
                                      <option value="" disabled="" selected="">Select Type</option>
                                      <option value="Paid" 
                                      <?php echo($Membership=='Paid')?'selected':''; ?> >
                                      Paid</option><option value="Free" 
                                      <?php echo($Membership=='Free')?'selected':''; ?> >
                                      Free</option>
                                      <option value="Both" 
                                      <?php echo($Membership=='Both')?'selected':''; ?> >
                                      Both</option>
                                                         
                                    </select>
                                    </div>
                                      <button class="btn btn-primary mb-2 ml-2" onclick="Applyfilter()" id="Applyfilter">Apply Filter</button>
                                     </form> -->
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                  <!--   <th>Course</th> -->
                                                    <th>Membership</th>
                                                    <th>Registration Date</th>
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr class="custom-clickable-row" data-href='<?=base_url()?>/Admin/Usersview/<?php echo $val['User_Id']?>'>
                                                  <?php if($val['Profile_Picture']!==''){?>
                                                  <td class="avatar" style="width:20%;"><img src="<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>" style="width:30%;"></td>
                                                   <?php } else { ?>
                                                  <td class="avatar" style="width:20%;"><img src="<?=base_url()?>/public/uploads/AvtarImage.png" style="width:30%;"  alt="AvtarImage.png"></td>
                                                    
                                                   <?php } ?>
                                                  
                                                  <td><?php echo $val['Name'] ?></a></td>
                                                  <td><?php echo $val['Mobile_No'] ?></td>
                                                  <td><?php echo $val['Email'] ?></td>
                                                <!--<td><?php //echo $val['Couse_Title'] ?></td> -->
                                                  <td><?php echo $val['Membership'] ?></td>
                                                  <td><?php echo $val['Registration_Date'] ?></td>
                                                

                                                   
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
    $(document).ready(function(){
     
     $("#Userlist").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");

    });
    $(document).on('click','.custom-clickable-row',function(e)
    {

      var url=$(this).data('href');
      window.location=url;

    });
     function Applyfilter()
      {
        $('#selectlanguage').submit();
      }
    </script>
</body>
</html>
