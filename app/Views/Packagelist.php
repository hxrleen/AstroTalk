<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
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
                                    <div class="card-body"><h5 class="card-title">Categories</h5>
                                    <a href="<?=base_url()?>/Admin/PackageInsert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Category</button>
                                     </a>
                                      <div class="table-responsive">
                                          <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                  
                                                  
                                                    <th>Category Name</th>
                                                    <th>Hindi</th>
                                                    <th>Order</th>
                                                    
                                                    <th>Action</th>
                                                  
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>
                                                 <!--<tr class="custom-clickable-row" data-href="<?=base_url()?>/Admin/PackageView/<?php //echo $val['CategoriesID']?>"> -->
                                                
                                                 
                                                
                                                  <td><?php echo $val['Cat_Name']?></td>
                                                 
                                                  <td><?php echo $val['Hindi_Name'] ?></td>
                                                  <td><?php echo $val['Cat_Order'] ?></td>
                                                  <td>
                                                   <a href="<?=base_url()?>/Admin/Package_update/<?php echo $val['CategoriesID']?>">
                                                    <i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a  onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/Package_delete/<?php echo($val['CategoriesID']) ?>" ><i class="fa fa-trash" style="color:red;" ></i></a>
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
            order: [[2, 'asc']],
           "destroy": true,
           "ordering": true
         } );
    });
    $(document).on('click','.custom-clickable-row',function(e){
      var url=$(this).data('href');
      window.location=url;

     });
    </script>
</body>
</html>
