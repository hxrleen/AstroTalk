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
                                    <div class="card-body"><h5 class="card-title">Webinar </h5>
                                     <a href="<?=base_url()?>/Admin/webinar_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Webinar</button></a> 
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <!--  <th>Id</th> -->
                                                    <th>Date</th>
                                                    <th>Time SLot</th>
                                                    <th>Link Active Time</th>
                                                    <th>Total Registration</th>
                                                    <th>Action</th>
                                                    <!-- <th>Action</th> -->
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr class="custom-clickable-row" data-href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>">
                                                  <!-- <td class="link-add" href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>"><?php echo $val['Id']?></td> -->
                                                  <td class="link-add" href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>"><?php echo (date(' jS F Y', strtotime($val['Date']))) ?></td>
                                                  <td class="link-add" href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>"><?php echo $val['TimeSlot'] ?></td>
                                                  <?php

                                                     $linkactiveTime1=strtotime($val['LinkActiveTime']);
                                                     $linkactiveTime = date('h:i', $linkactiveTime1);
                                                  ?>
                                                  <td class="link-add" href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>"><?php echo $linkactiveTime ?></td>
                                                  <td class="link-add" href="<?=base_url()?>/Admin/Webinarview/<?php echo $val['Id']?>"><?php echo $val['Total_Reg'] ?></td>
                                                  <td><a href="<?=base_url()?>/Admin/update_webinar/<?php echo $val['Id']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Webinar_delete/<?php echo($val['Id']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a></td>

                                                 
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
    <div id="Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">


<div class="card"style="width: 110%;">
<div class="card-header">
<h5>Brand</h5>


</div>
<div class="card-block">


<form method="post" action="#">
<div class="form-group row">
<label class="col-sm-2 col-form-label"style="">Webinar</label>
<div class="col-sm-10">
<input type="date" class="form-control" name="Date" placeholder="Brand" required/>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"style="">Time Slot</label>
<div class="col-sm-10">
<select name="TimeSlot" class="form-control">
  <option value="10AM to 11PM">10AM to 11PM</option>
  <option value="11AM to 12PM">11AM to 12PM</option>
    <option value="7PM to 8PM">7PM to 8PM</option>
     <option value="8PM to 9PM">8PM to 9PM</option>
</select>
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<input type="submit" name="save" value="Save Data" class="btn btn-primary"/>
<a href="#" class="btn btn-primary"  role="button"><i class="fa fa-close">Close</i></a>
</div>
</div>
</form>


</div>
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
       jQuery(document).ready(function($) {

          

       

         $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
         } );

         $("#webinar-active").addClass("mm-active");
         $("#Web-list").addClass("mm-show");


            
        });

    //  $('.link-add').click(function(){
    //   debugger;
    //   //alert('this istes');
    //     window.location = $(this).attr('href');
    //     return false;
    // });
    $(document).on('click', '.custom-clickable-row', function(e){
      //debugger;
      console.log(e);
    var url = $(this).data('href');

    window.location = url;
   });
    </script>
</body>
</html>
