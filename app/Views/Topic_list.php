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
                                   <?php if(isset($Msg['Msg'])){?>

                                  <div class="alert alert-dismissible alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   
                                    <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                                  </div>
                                  <?php } ?>
                                    <div class="card-body">
                                    <h5 class="card-title">Blog Posts</h5>
                                    <form class="form-inline" action="<?=base_url()?>/Admin/SelectLanguage_chapter" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right:0px;margin-top: -4%;margin-bottom: 10px;" >
                                         <div class="form-group mb-2 mr-2">
                                         <?php  $LanguageId  = isset($_POST['LanguageId'])?$_POST['LanguageId']:'';?>
                                         <select  name="LanguageId" class="form-control maxwidth" >
                                         <option value="" disabled="" selected="">Select Category</option>
                                          <?php if (isset($Language['data']))
                                           {foreach($Language['data'] as $row)
                                                                          {?>
                                         <option value="<?php echo $row['CategoriesID']?>" 
                                         <?php echo($LanguageId ==$row['CategoriesID'])?'selected':''; ?> >
                                         <?php echo $row['Cat_Name']?></option>
                                         <?PHP }} ?>
                                         </select>
                                         </div>
                                        <?php $LanguageId = isset($_POST['LanguageId'])?$_POST['LanguageId']:'';
                                        if($LanguageId!==''){?>
                                        <a href="<?=base_url()?>/Admin/Training_Insert/<?php echo $LanguageId ?>" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Blog</button>
                                     </a>
                                      <?php } else {?>
                                     <a href="<?=base_url()?>/Admin/Training_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Blog</button>
                                     </a> 
                                    <?php }?>
                                    </form>
                                     <!-- <div class="float-right mt-2" style="margin-top: -3%!important;">
                                      <button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/Training_Insert'" class="btn btn-primary mb-2">Add Topic</button>
                                      
                                       <button type="button" onclick="goback()" class="btn mr-2 mb-2 btn-primary">Close</button> 
                                      </div> -->
                                   
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   <th>Image</th>
                                                    <th>Title</th>                                                  
                                                    <th>Summary</th>
                                                    <th>Category</th>
                                                    <th>PublishDate</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
						                           <td style="width:10%;"><img src="<?=ImageBase?><?php echo $val['Image'] ?>"  style="width:100%;"></td>
						                           <td><?php echo $val['Blog_Title'] ?></td>

                                
                                                  <td><?php echo $val['Blog_Summary'] ?></a></td>
                                                  <td><?php echo $val['CategoryName'] ?></td>
                                                  <td><?php echo $val['Publish_Date'] ?></td>
                                                 
                                                 

                                                  <td>
                                                  <?php if($LanguageId!==''){?>
                                                   <a href="<?=base_url()?>/Admin/Lesson_Update/<?php echo $val['Blog_ID']?>/<?php echo $LanguageId?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a href="<?=SiteURL?><?php echo $val['Slug']?>" target="_blank"><i class="fa fa-globe"></i></a>
                                                 <!-- <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Lesson_delete/<?php //echo $val['Blog_ID']?>/<?php //echo $LanguageId?>"><i class="fa fa-trash" style="color:red;" ></i></a> -->
                                                 
                                                  <?php } else{?>
                                                  <a href="<?=base_url()?>/Admin/Lesson_Update/<?php echo $val['Blog_ID']?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a href="<?=SiteURL?><?php echo $val['Slug']?>" target="_blank"><i class="fa fa-globe"></i></a>
                                                  <!--<a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Lesson_delete/<?php //echo $val['Blog_ID']?>" ><i class="fa fa-trash" style="color:red;" ></i></a> -->
                                                <?php } ?>
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
            order: [[4, 'desc']],
           "destroy": true,
           "ordering": true,
         } );
     
     });
    function goback()
    {
       $('#gobackform').submit();
    }
     $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": true
         } );

      function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
    </script>
</body>
</html>
