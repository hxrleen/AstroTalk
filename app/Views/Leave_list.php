<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
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
                              <?php if(isset($Import['Msg'])){?>

                              <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                               
                                <p class="mb-0">Record inserted successfully!</p>
                              </div>
                              <?php } ?>
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                   
                                      <h5 class="card-title">Leads</h5>

                                     <!--  <a href="<?=base_url()?>/Admin/Leave_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Lead</button></a> -->
                                      <div class="float-right mt-2" style="margin-top: -3%!important;"><button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/Leave_Insert'" class="btn btn-primary mb-2">Add Lead</button>
                                      <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">CSV Upload</button>
                                      </div>
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Lead Id</th>
                                                    <th>Lead Name</th>
                                                    <th>Lead MobileNo</th>
                                                    <th>Lead Source</th>
                                                    <th></th>
                                                    <th>Action</th> 
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['Leave_Id'] ?></td>
                                                  <td><?php echo $val['Leave_Name'] ?></td>
                                                  <td><?php echo $val['Leave_MobileNo'] ?></td>
                                                  <td><?php echo $val['Leave_Source'] ?></td>
                                                  <td><a href="https://api.whatsapp.com/send?phone=<?php echo($val['Leave_MobileNo']) ?>&text=Hi&nbsp;<?php echo ($val['Leave_Name']) ?>" target="_blank"><i class="fa fa-whatsapp my-float"  style="font-size:22px;color:#25D366;"></i></a></td>
                                                  <td><a onclick="return confirm('Are you sure?')" href="<?=base_url()?>/Admin/Leave_delete/<?php echo $val['Leave_Id']?>"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
    <!-- Small modal -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top: 24%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">CSV Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <?php
                if (session()->get("success")) {
                ?>
                    <div class="alert alert-success">
                        <?= session()->get("success") ?>
                    </div>
                <?php
                }
                ?>
            <form action="<?=base_url()?>/Admin/importFile" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
           
              <input name="csv" required type="file" accept=".csv" id="csv" class="form-control-file" /> 
             
            
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
               
                <input type="submit" class="btn btn-primary" name="Submit" value="Submit" /> 
            </div>
          </form> 
        </div>
    </div>
</div>

<!-- Modal -->
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
    jQuery(document).ready(function($) {
    $("#Leads-active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
    });
    </script>
</body>
</html>
