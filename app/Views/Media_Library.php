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
                                    <div class="card-body"><h5 class="card-title">Media Library</h5>
                                     <a href="<?=base_url()?>/Admin/Add_media" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Media</button>
                                     </a>  
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                 
                                                    
                                               <th>Title</th>
                                               <th>Image</th>
                                                <th>Size</th>
                                               <th>Url</th> 
                                               <th>Action</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if (isset($media['data']))
                                                {foreach($media['data'] as $row){ ?>


                                                  <tr>
                                                  <td><?php echo $row['Title'] ?></a></td>
                                                  <td><img src="<?php echo ImageBase.$row['Media_Img'] ?>" style="width:50%;"></td>
                                                  <td><?php echo $row['size'] ?></a></td>
                                                  <td>
                                                 
                                                  
                                                 <?php
                                                 $img=ImageBase.$row['Media_Img'];
                                               $YOUR_HTML='<div class="img-fluid rounded text-center"><img src="'.$img.'"  alt="'.$row['Title'].'" /></div>';
                                            
                                                 echo htmlspecialchars($YOUR_HTML);
                                               
                                                 ?>
                                                       
                                                    </td>
                                                
                                                  
                                                
                                                  <td><a onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/delete_media/<?php echo $row['Media_Id']?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
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
</body>
<script type="text/javascript">
 jQuery(document).ready(function($)
 {
          
    $("#App-active").removeClass("mm-show");
    $('#Dashboard-active').removeClass("mm-active");
    $("#media_library").addClass("mm-active");
});
</script>


</html>
