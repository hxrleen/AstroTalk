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
     font-size: 14px!important;
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
                                <div class="card-body"><h5 class="card-title">Banners</h5>
                                <?php $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';
                                if($Course_Id!==''){?>
                                <a href="<?=base_url()?>/Admin/Banner_Insert/<?php echo $Course_Id ?>" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Banner</button>
                                </a>
                                <?php } else {?>
                                <a href="<?=base_url()?>/Admin/Banner_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Banner</button>
                                </a> 
                                <?php }?>
                                
                                    <form class="form-inline" action="<?=base_url()?>/Admin/Coursebannerlist" method="post" 
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

                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Course Title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                 
                                                  <td class="avatar"style="width:20%;"><img src="<?=base_url()?>/public/uploads/<?php echo $val['image'] ?>" alt="<?php echo $val['image'] ?>" style="width:30%;"></td>
                                                  <td><?php echo $val['Title'] ?></td>
                                                  <td><?php echo $val['Course_Title'] ?></td>
                                                  <td><?php echo $val['Status'] ?></td>
                                                  <?php if($Course_Id!==''){?>
                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Banner_Update/<?php echo $val['BannerID']?>/<?php echo $Course_Id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Banner_delete/<?php echo($val['BannerID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
                                                  </td>
                                                  <?php } else { ?>
                                                  <td><a href="<?=base_url()?>/Admin/Banner_Update/<?php echo $val['BannerID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Banner_delete/<?php echo($val['BannerID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a></td>

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
    $(document).ready(function(){
     
     $("#Bannerlist").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");

    });
    $(document).on('click','.custom-clickable-row',function(e)
    {

      var url=$(this).data('href');
      window.location=url;

    });
     function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
    </script>
</body>
</html>
