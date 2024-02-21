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
                                    <div class="card-body"><h5 class="card-title">Topic List</h5>
                                     <a href="<?=base_url()?>/Admin/Training_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Topic</button></a> 
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Chapter Name</th>
                                                    <th>Topic Name</th>
                                                    <th>Training Hours</th>
                                                    <th>Training Minute</th>
                                                   <!--  <th>Description</th> -->
                                                    <!-- <th>Video file</th> -->
                                                    <th>Image</th>
                                                    <th>Language</th>
                                                    <th>Training Order</th>
                                                     <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['ChapterTitle'] ?></td>
                                                  <td><?php echo $val['Topic_Name'] ?></a></td>
                                                  <td><?php echo $val['Training_Hours'] ?></td>
                                                  <td><?php echo $val['Training_Minute'] ?></td>
                                                  <!-- <td><?php echo $val['Description'] ?></td> -->
                                                  <!-- <td><video width="100" height="50" controls><source src="<?=base_url()?>/public/uploads/<?php echo $val['Videofile'] ?>" type="video/mp4"></td> -->
                                                  <td><img src="<?=base_url()?>/public/uploads/<?php echo $val['Image'] ?>" alt="Card image" style="width:50%;"></td>
                                                  <td><?php echo $val['Language'] ?></td>
                                                  <td><?php echo $val['Training_Order'] ?></td>
                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Lesson_Update/<?php echo $val['TrainingLesson_Id']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Lesson_delete/<?php echo($val['TrainingLesson_Id']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a></td>
                                                  

                                                   
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
