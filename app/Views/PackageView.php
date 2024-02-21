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
               <?php if($Data['data'][0]['Status']=='Active'){ ?>
               <p Style="color:red";>Note:&nbsp;&nbsp;<span>If you want to delete chapter please click on unpublish</span></p>
               <?php } ?>
              <div class="float-right mt-2" style="">
                <button type="button" onclick="window.location.href='<?=base_url()?>/Admin/Packages'"  class="btn mr-2 mb-2 btn-primary">Close</button>
              <?php if($Data['data'][0]['Status']=='Active'){ ?>
              <button type="button" onclick="publish()"  class="btn mr-2 mb-2 btn-primary">Unpublish</button>
              <?php } else{ ?>
               <button type="button" onclick="notpublished()"   class="btn mr-2 mb-2 btn-primary">Publish</button>
              <?php } ?>

             
               
               </div>
               
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
              <tbody>
              
              <tr>
              <td></td>
              <td><strong>Package Name</strong></td>
              <td>:</td>
              <td><?php echo($Data['data'][0]['PackageName'])?></td>
              </tr>


              <tr>
              <td></td>
              <td><strong>Package Fees</strong></td>
              <td>:</td>
              <td><?php echo($Data['data'][0]['PackageAmount'])?></td>
               
              </tr>

            <!--   <tr>
              <td></td>
              <td><strong>Hindi Chapters</strong></td>
              <td>:</td>
              <td>2</td>
              </tr>

              <tr>
              <td></td>
              <td><strong>English Chapters</strong></td>
              <td>:</td>
              <td>2</td>
              </tr> -->



              

             


            

             
              
              
             
              
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
                                    <div class="card-body">
                                    <h5 class="card-title">Chapters List</h5>
                                    <form class="form-inline" action="<?=base_url()?>/Admin/SelectPackage_Chapter" method="post" onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right:0px;margin-top: -4%;margin-bottom: 10px;" >
                                      <input type="hidden" name="PackageId" value="<?php echo($Data['data'][0]['PackageId'])?>">
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
                                        <a href="<?=base_url()?>/Admin/AddPackageChapter/<?php echo($Data['data'][0]['PackageId'])?>/<?php echo $LanguageId ?>" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Chapter</button>
                                     </a>
                                      <?php } else {?>
                                     <a href="<?=base_url()?>/Admin/AddPackageChapter/<?php echo($Data['data'][0]['PackageId'])?>" 
                                      class="topbutton" style=""><button type="button" class="btn btn-primary">Add Chapter</button>
                                     </a> 
                                    <?php }?>
                                </form>

                                    <!--  <div class="float-right mt-2" style="margin-top: -3%!important;">
                                      <button type="button"  onclick="window.location.href='<?=base_url()?>/Admin/AddPackageChapter/<?php echo($Data['data'][0]['PackageId'])?>'" class="btn btn-primary mb-2">Add Chapters</button>
                                      
                                   
                                      </div> -->
                                   
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                   
                                                    <th>Chapter</th>
                                                    <th>Language</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Package_Chapters['data'])){ 
                                                 foreach ($Package_Chapters['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['ChapterTitle'] ?></td>
                                                  <td><?php echo $val['Language'] ?></a></td>
                                                 
                                                 

                                                 <td>
                                                 <a href="<?=base_url()?>/Admin/UpdatePackage_Chapters/<?php echo $val['P_chapterId']?>/<?php echo($Data['data'][0]['PackageId'])?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                 <?php if($Data['data'][0]['Status']=='Inactive'){ ?>
                                                 <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Package_Chapters_Delete/<?php echo $val['P_chapterId']?>/<?php echo($Data['data'][0]['PackageId'])?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
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
          
      $("#courses").addClass("mm-active");
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
     function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
  
  
  
  function publish()
  {
  	//alert('test');
    var Status="<?php echo $Data['data'][0]['Status'] ?>";
    var Package_Id="<?php echo $Data['data'][0]['PackageId'] ?>";
    var Status='Inactive';
   //alert(Package_Id);
    $.post('<?=base_url()?>/Admin/unpublish',{"Package_Id":Package_Id,"Status":Status},function(response){
      
   // alert(response);
      var obj = JSON.parse(response);
    // alert(obj);
     if(obj.Status==true)
     {
        alert('Unpublished successfully');
       var url = "<?=base_url()?>/Admin/PackageView/<?php echo $Data['data'][0]['PackageId'] ?>";
       $(location).attr('href',url);
     }
     else
     {
      alert('No data found');

     }
     
    });
        
  }

   function notpublished()
  {
  	//alert('test');
    var Status="<?php echo $Data['data'][0]['Status'] ?>";
    var Package_Id="<?php echo $Data['data'][0]['PackageId'] ?>";
    var Status='Active';
    // alert(Package_Id);
    $.post('<?=base_url()?>/Admin/publish',{"Package_Id":Package_Id,"Status":Status},function(response){
      
   // alert(response);
      var obj = JSON.parse(response);
    // alert(obj);
     if(obj.Status==true)
     {
       alert('Publish successfully');
       var url = "<?=base_url()?>/Admin/PackageView/<?php echo $Data['data'][0]['PackageId'] ?>";
       $(location).attr('href',url);
     }
     else
     {
      alert('No data found');

     }
     
    });
        
  }


    </script>
</body>
</html>
