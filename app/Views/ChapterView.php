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
              <div class="main-card mb-3 card">
              <div class="card-body">
              <div class="float-right mt-2" style="">
                <button type="button" onclick="window.location.href='<?=base_url()?>/Admin/Chapter'"  class="btn mr-2 mb-2 btn-primary">Close</button>
             
               
               </div>
               
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
              <tbody>
              
              <tr>
              <td></td>
              <td><strong>Course Name</strong></td>
              <td>:</td>
              <td><?php echo($Chapter_Info['data'][0]['Course_Name'])?></td>
              </tr>


              <tr>
              <td></td>
              <td><strong>Chapter Name</strong></td>
              <td>:</td>
              <td><?php echo($Chapter_Info['data'][0]['Chapter_Title'])?></td>
               
              </tr>

              <tr>
              <td></td>
              <td><strong>Language</strong></td>
              <td>:</td>
              <td><?php echo($Chapter_Info['data'][0]['Language'])?></td>
               
              </tr>

             


              <tr>
              <td></td>
              <td><strong>Total Topics</strong></td>
              <td>:</td>
              <td><?php echo($Chapter_Info['data'][0]['TotalLesson'])?></td>
               
              </tr>

             
              
              
             
              
              </tbody>
              </table> 
              <br>
              </div>
              </div>
                                <div class="main-card mb-3 card">
                                   <?php if(isset($Msg['Msg'])){?>

                                  <div class="alert alert-dismissible alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   
                                    <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                                  </div>
                                  <?php } ?>
                                    <div class="card-body"><h5 class="card-title">Topics List</h5>
                                     <div class="float-right mt-2" style="margin-top: -3%!important;">
                                      <button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/Training_Insert/<?php echo($Chapter_Info['data'][0]['Chapter_ID'])?>'" class="btn btn-primary mb-2">Add Topic</button>
                                      
                                     <!--  <button type="button" onclick="goback()" class="btn mr-2 mb-2 btn-primary">Close</button> -->
                                      </div>
                                   
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                    <th>Topic_Order</th>                                                   
                                                    <th>Image</th>
                                                    <th>Topic Name</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>

      
                                                  <tr>
                                                  <td style="width:20%;"><img src="<?=base_url()?>/public/uploads/<?php echo $val['Topic_Img'] ?>" alt="Card image" style="width:50%;"></td>
                                                  <td><?php echo $val['Title'] ?></a></td>
                                                 
                                                 

                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Lesson_Update/<?php echo $val['Topic_ID']?>/<?php echo $Chapter_Info['data'][0]['Chapter_ID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                          
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Lesson_delete/<?php echo $val['Topic_ID']?>/<?php echo($val['Chapter_ID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a> 
                                                  
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
          
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
        $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
         } );
     
     });
    function goback()
    {
       $('#gobackform').submit();
    }
    function Editbutton()
    {

    }
    </script>
</body>
</html>
