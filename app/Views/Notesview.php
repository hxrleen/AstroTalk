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
                               <div class="card-body">
                                <div class="float-right mt-2" style="">
                               <?php if($Notes_Info['data'][0]['Status']=='DRAFT'){?>
                               
                                <button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/Publish_Notes/<?php echo $Notes_Info['data'][0]['NotesID'] ?>'" class="btn btn-primary mb-2">Publish
                                </button>
                               
                                <?php } else { ?>
                                <button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/UnPublish_Notes/<?php echo $Notes_Info['data'][0]['NotesID'] ?>'" class="btn btn-primary mb-2">Unpublish</button>
                              
                                <?php } ?>
                                <?php if($Course_Id!==''){ ?>
                                <button type="button" onclick="goback()" class="btn mr-2 mb-2 btn-primary">Close</button> 
                               <?php } else { ?>
                                 <button type="button" onclick="window.location.href='<?=base_url()?>/Admin/Notes'"class="btn mr-2 mb-2 btn-primary">Close</button>
                               <?php } ?>
                                </div>
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
              <tbody>
              
              <tr>
              <td></td>
              <td><strong>Course Name</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['Couse_Title'])?></td>
              </tr>

              <tr>
              <td></td>
              <td><strong>Notes Title</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['Title'])?></td>
               
              </tr>

              <tr>
              <td></td>
              <td><strong>Notes Status</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['Status'])?></td>
               
              </tr>


              <tr>
              <td></td>
              <td><strong>Notes Description</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['Description'])?></td>
               
              </tr>

              <tr>
              <td></td>
              <td><strong>Date of Publish</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['DateofPublish'])?></td>
              </tr>


              <tr>
              <td></td>
              <td><strong>Total Lesson</strong></td>
              <td>:</td>
              <td><?php echo($Notes_Info['data'][0]['topic'])?></td>
              </tr>

             

             
              
              
             
              
              </tbody>
              </table> 
              <br>
              </div>
              </div>
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Topic List</h5>
                                     <div class="float-right mt-2" style="margin-top: -3%!important;">
                                      </div>
                                   
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                    <th>Image</th>
                                                    <th>Topic Name</th>
                                                   <!--  <th>Training Hours</th> -->
                                                    <th>Training Minute</th>
                                                   <!--  <th>Description</th> -->
                                                    <!-- <th>Video file</th> -->
                                                   
                                                    <!-- <th>Language</th> -->
                                                  <!--   <th>Training Order</th> -->
                                                    <!--  <th>Action</th> -->
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                  <td style="width:20%;"><img src="<?=base_url()?>/public/uploads/<?php echo $val['lessonImage'] ?>" alt="Card image" style="width:50%;"></td>
                                                  <td><?php echo $val['Topic_Name'] ?></a></td>
                                                 <!--  <td><?php echo $val['Training_Hours'] ?></td> -->
                                                  <td><?php echo $val['Training_Minute'] ?></td>
                                                  <!-- <td><?php echo $val['Description'] ?></td> -->
                                                  <!-- <td><video width="100" height="50" controls><source src="<?=base_url()?>/public/uploads/<?php echo $val['Videofile'] ?>" type="video/mp4"></td> -->
                                                 
                                                 <!--  <td><?php echo $val['Language'] ?></td> -->
                                                <!--   <td><?php echo $val['Training_Order'] ?></td> -->
                                                  <!-- <td>
                                                  <a href="<?=base_url()?>/Admin/Lesson_Update/<?php echo $val['TrainingLesson_Id']?>/<?php echo $val['Language']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Lesson_delete/<?php echo $val['TrainingLesson_Id']?>/<?php echo($val['ChapterId']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a></td> -->
                                                  

                                                   
                                                  </tr>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                                <form id="gobackform" style="display:none;" action="<?=base_url()?>/Admin/SelectNotes" method="post">
                                <input type="text" value="<?php echo $Course_Id ?>" name="Course_Id" class="form-control">    
                                </form>
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
      
       $("#Notes").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");

    });
    function goback()
    {
       $('#gobackform').submit();
    }
        </script>
</body>
</body>
</html>
