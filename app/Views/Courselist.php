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
                                    <div class="card-body"><h5 class="card-title">Courses</h5>
                                    <a href="<?=base_url()?>/Admin/CourseInsert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Course</button>
                                     </a>
                                      <div class="table-responsive">
                                          <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <!--  <th>ID</th> -->
                                                    <th>Course Image</th>
                                                    <th>Course Title</th>
                                                   
                                                    <!-- <th>Course Description</th> -->
                                                    <th>Course Duration</th>
                                                    <th>Course Fees INR</th>
                                                    <th>Course Fees USD</th>
                                                    <th>Action</th>
                                                  
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>
                                                  <tr>
                                                  <!-- <td><?php echo $val['Course_Id']?></td> -->
                                                 
                                                  <td style="width:20%;"><img src="<?=base_url()?>/public/uploads/<?php echo $val['Course_Image'] ?>" alt="Card image" style="width:30%;"></td>
                                                  <td><?php echo $val['Couse_Title']?></td>
                                                  <!-- <td><?php echo $val['Course_Image']?></td> -->
                                                  <!-- <td><?php echo $val['Course_Description'] ?></td> -->
                                                  <td><?php echo $val['Course_Duration'] ?></td>
                                                  <td><?php echo $val['Course_Fees'] ?></td>
                                                  <td><?php echo $val['Course_Fee_USD'] ?></td>
                                                  <td>
                                                   <a href="<?=base_url()?>/Admin/Courses_update/<?php echo $val['Course_Id']?>">
                                                    <i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Course_delete/<?php echo($val['Course_Id']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
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
    jQuery(document).ready(function($)
     {
          
       $("#courses").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
        $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
         } );
    });
    </script>
</body>
</html>
