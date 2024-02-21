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
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Setting</h5>
                                      
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                 
                                                    <th>MobileNo</th>
                                                    <th>Facebook</th>
                                                    <th>Youtube</th>
                                                    <th>Action</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['MobileNo'] ?></a></td>
                                                  <td><?php echo $val['Facebook'] ?></td>
                                                  <td><?php echo $val['Youtube'] ?></td>
                                                
                                                  
                                                
                                                  <td><a href="<?=base_url()?>/Admin/Setting_Update/<?php echo $val['S_ID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
</body>
</html>
