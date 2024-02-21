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
                                    <div class="card-body">
                                    <h5 class="card-title">Chapter List</h5>
                                   
                                    <form class="form-inline" action="<?=base_url()?>/Admin/SelectLanguage_chapter" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right:0px;margin-top: -4%;margin-bottom: 10px;" >
                                         <div class="form-group mb-2 mr-2">
                                         <?php  $LanguageId  = isset($_POST['LanguageId'])?$_POST['LanguageId']:'';?>
                                         <select  name="LanguageId" class="form-control maxwidth" >
                                         <option value="" disabled="" selected="">Select Language</option>
                                          <?php if (isset($Language['data']))
                                           {foreach($Language['data'] as $row)
                                                                          {?>
                                         <option value="<?php echo $row['LanguageId']?>" 
                                         <?php echo($LanguageId ==$row['LanguageId'])?'selected':''; ?> >
                                         <?php echo $row['LanguageName']?></option>
                                         <?PHP }} ?>
                                         </select>
                                         </div>
                                        <?php $LanguageId = isset($_POST['LanguageId'])?$_POST['LanguageId']:'';
                                        if($LanguageId!==''){?>
                                        <a href="<?=base_url()?>/Admin/Chapter_Insert/<?php echo $LanguageId ?>" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Chapter</button>
                                     </a>
                                      <?php } else {?>
                                     <a href="<?=base_url()?>/Admin/Chapter_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Chapter</button>
                                     </a> 
                                    <?php }?>
                                </form>


                                    
                                    
                                     
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                  
										  
						  <th>Image</th>
                                                  <th>Chapter Title</th>  
                                                  <th>Course Name</th>
                                                  <th>Language</th>
                                                  <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>

            
                                                <tr class="custom-clickable-row" data-href="<?=base_url()?>/Admin/ChapterView/<?php echo $val['Chapter_ID']?>">
                                                <td style="width:20%;"><img src="<?=base_url()?>/public/uploads/<?php echo $val['Chpater_Icon'] ?>" alt="Card image" style="width:50%;"></td>
                                                <td><?php echo $val['Chapter_Title'] ?></td>
                                                <td><?php echo $val['Course_Name'] ?></td>
                                                <td><?php echo $val['Language'] ?></td>
                                               
                                                <?php $LanguageId = isset($_POST['LanguageId'])?$_POST['LanguageId']:'';
                                                  if($LanguageId!==''){?>
                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Chapter_Update/<?php echo $val['Chapter_ID']?>/<?php echo $LanguageId?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Chapter_delete/<?php echo($val['Chapter_ID']) ?>/<?php echo $LanguageId ?>" >
                                                  <i class="fa fa-trash" style="color:red;" ></i></a>
                                                 </td>
                                                 <?php } else { ?>
                                                  <td>
                                                  <a href="<?=base_url()?>/Admin/Chapter_Update/<?php echo $val['Chapter_ID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Chapter_delete/<?php echo($val['Chapter_ID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
                                                 </td>
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
     $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
         } );

      function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
     jQuery(document).ready(function($)
       {
          
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
       });
     $(document).on('click','.custom-clickable-row',function(e){
      var url=$(this).data('href');
      window.location=url;

     });

    </script>
</body>
</html>
