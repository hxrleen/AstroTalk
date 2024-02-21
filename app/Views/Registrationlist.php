<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
/*.link-add {
    cursor: pointer;
}*/
.custom-clickable-row
{

   cursor: pointer;

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
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Registration </h5>
                                  <!--   <a href="<?=base_url()?>/Admin/Topic_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Topic</button></a> -->
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Registration Date</th>
                                                    <th>Webinar Date</th>
                                                    <th>Source</th>
                                                    <th></th>
                                                    <th>Action</th> 
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr class="custom-clickable-row" data-href='<?=base_url()?>/Admin/Registrationview/<?php echo $val['ID']?>'>
                                                  <td><?php echo $val['Name'] ?></td>
                                                  <td><?php echo $val['Contact'] ?></td>
                                                  <td><?php echo $val['Email'] ?></td>
                                                  <td><?php echo $val['Registration_Date'] ?></td>
                                                  <td><?php echo (date(' jS F Y', strtotime( $val['Webinardate'])))?>&nbsp;<?php echo $val['TimeSlot'] ?></td>
                                                  <?php $Source = $val['Source'];

                                          switch ($Source) {
                                            case 1:
                                            echo '<td>Web</td>';
                                              break;
                                            case 2:
                                             echo '<td>Facebook</td>';
                                            break;
                                            case 3:
                                            echo '<td>Whatsapp</td>';
                                            break;
                                            case 4:
                                            echo '<td>RKVM</td>';
                                            break;
                                            case 5:
                                            echo '<td>Google</td>';
                                            break;
                                            case 6:
                                            echo '<td>Youtube</td>';
                                            break;
                                            default:
                                            echo '<td>No Source</td>';
                                          }?>
                                                  <td><a href="https://api.whatsapp.com/send?phone=<?php echo($val['Contact']) ?>&text=Hi&nbsp;<?php echo ($val['Name']) ?>" target="_blank"><i class="fa fa-whatsapp my-float"  style="font-size:22px;color:#25D366;"></i></a></td>
                                                  <td><a href="<?=base_url()?>/Admin/Registration_update/<?php echo $val['ID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  </td> 

                                                   
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
   
    $("#registration_active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
  
  
    });
    $(document).on('click','.custom-clickable-row',function(e)
    {
       var url=$(this).data('href');
       window.location=url;

    });
    
    </script>
</body>
</html>
