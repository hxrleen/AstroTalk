<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
.custom-clickable-row
{

   cursor: pointer;

}
.form-control 
  {
    
     height: 34px!important;
  }
 .form-control:focus {
    box-shadow: 0 0 0 0.rem rgb(0 123 255 / 25%)!important;
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
                                    <div class="card-body"><h5 class="card-title">Notes List</h5>
                                     
                                      <?php $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';
                                      if($Course_Id!==''){?>
                                      <a href="<?=base_url()?>/Admin/Notes_Insert/<?php echo $Course_Id ?>" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Notes</button>
                                      </a>
                                      <?php } else {?>
                                      <a href="<?=base_url()?>/Admin/Notes_Insert" class="topbutton"style=""><button type="button" class="btn btn-primary">Add Notes</button>
                                       </a> 
                                      <?php }?> 
                                      <form class="form-inline" action="<?=base_url()?>/Admin/SelectNotes" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right: 102px;margin-top: -4%;margin-bottom: 10px;" >
                                      
                                         <?php  $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';?>
                                         <select  name="Course_Id" class="form-control maxwidth" >
                                          <option value="" disabled="" selected="">Select Course</option>
                                          <?php if (isset($Course['data']))
                                           {foreach($Course['data'] as $row)
                                                                          {?>
                                         <option value="<?php echo $row['Course_Id']?>" 
                                         <?php echo($Course_Id==$row['Course_Id'])?'selected':''; ?> >
                                         <?php echo $row['Couse_Title']?></option>
                                         <?PHP }} ?>
                                         
                                          
                                        </select>
                                         </form>
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <!--  <th>Notes Id</th> -->
                                                   
                                                    <th>Notes Title</th>
                                                    <th>Course</th>
                                                   
                                                    <!-- <th>Attachment</th> -->
                                                    <!-- <th>Image</th> -->
                                                  <!--   <th>Notes Order</th> -->
                                                   <!--  <th>Type</th> -->
                                                    <th>Status</th>
                                                    <th>Publish  Date</th>
                                                  <!--   <th>Language</th> -->
                                                    <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){

                                                  if($Course_Id!==''){ ?>
                                                  <tr class="custom-clickable-row" data-href="<?=base_url()?>/Admin/NotesView/<?php echo $val['NotesID']?>/<?php echo $Course_Id ?>">
                                                  <?php } else{ ?>
                                                   <tr class="custom-clickable-row" data-href="<?=base_url()?>/Admin/NotesView/<?php echo $val['NotesID']?>">
                                                  <?php } ?>
                                                 <!--  <td><?php echo $val['NotesID'] ?></td> -->
                                                  <td><?php echo $val['Title'] ?></td>
                                                  <td><?php echo $val['Course_Title'] ?></td>
                                                 
                                                 
                                                <!--   <td><?php echo $val['Attachment'] ?></td>  -->
                                                  <!-- <td><img src="<?=base_url()?>/public/uploads/<?php echo $val['Image'] ?>" alt="Card image" style="width:50%;"></td> -->
                                                 <!--  <td><?php echo $val['Notes_Order'] ?></td> -->
                                                 <!--  <td><?php echo $val['Type'] ?></td> -->
                                                  <td><?php echo $val['Status']; ?></td>
                                                  <td><?php echo $val['DateofPublish'] ?></td>
                                                  <!-- <td><?php echo $val['Language'] ?></td> -->
                                                  <?php if($Course_Id!==''){?>
                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Notes_Update/<?php echo $val['NotesID']?>/<?php echo $Course_Id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Notes_delete/<?php echo($val['NotesID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
                                                  </td>
                                                  <?php } else { ?>
                                                  <td><a href="<?=base_url()?>/Admin/Notes_Update/<?php echo $val['NotesID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Notes_delete/<?php echo($val['NotesID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a></td>

                                                  <?php } ?>
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
      
       $("#Notes").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
         $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
         } );

    });
    function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
    $(document).on('click','.custom-clickable-row',function(e)
    {
        var url=$(this).data('href');
        window.location=url;
    });

    </script>
</body>
</html>
