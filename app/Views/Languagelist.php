<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
.custom-clickable-row
{

   cursor: pointer;

}
.form-control:focus {
       box-shadow: 0 0 0 0.2rem rgb(255 255 255)!important;
  }
  .form-control  
  {
     font-size: 14px!important;
     height: 34px!important;
  }
.avatar img {
    width: 50px;
    height: 50px;
    float: left;
   
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
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
                                <div class="main-card mb-3  card">
                                <div class="card-body">
                                <h5 class="card-title">TAGS Master</h5>
                                <button type="button" style="margin-top:-4%" onclick="openmodal()" class="btn btn-primary float-right">Add TAGS</button>
                                

                                <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Tag ID</th> 
                                                    <th>TAG Name</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                foreach ($Data['data'] as $val){?>
                                                
                                                <td><?php echo $val['Tag_ID'] ?></td>
                                                <td><?php echo $val['Tag_Name'] ?></td>
                                                <td>
                                                <a onclick="return getLanguageinfo(<?php echo($val['Tag_ID']) ?>)" href='javascript:;'><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                                <a onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/TagDelete/<?php echo($val['Tag_Name']) ?>"><i class="fa fa-trash" style="color:red;" ></i>
                                                
                                                
                                                </a>
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
                    <!-- Modal -->
                  
                    <?php include 'include/Footer.php' ?> 
                  
                  </div>
        </div>
    </div>
    <div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>/Admin/AddTags" name="Category_reg" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="name">Tag Name:</label>
            <input type="text" name="LanguageName"  autocomplete="off" class="form-control" placeholder="Enter Tag Name" id="Language_Name" required="">
            </div>
            
           
           <button type="submit" class="btn btn-primary">Submit</button>
           </form>
            </div>
          
        </div>
    </div>
    </div>
     <div class="modal" id="UpdateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Tag</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>/Admin/UpdateLanguage" name="Language_reg" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="name">Tag Name:</label>
            <input type="text" name="LanguageName" autocomplete="off" class="form-control" placeholder="Enter Tag Name" id="updateLanguage_Name">
            </div>
           
            
             <input type="hidden" name="LanguageId" id="hidden_languageid" value="">
           <button type="submit" class="btn btn-primary">Submit</button>
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
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->
    <script type="text/javascript">
    $(document).ready(function(){
     
     $("#Language").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");
     $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
      } );

    });
    /* Get CategoryInfo  */
    function getLanguageinfo(id)
    {
      $('#hidden_languageid').val(id);
      $.post("<?=base_url()?>/Admin/LanguageUpdate",{id:id
      },function(data,status)
      {
        debugger;
        var language =JSON.parse(data);
       
        // alert(language.Tag_Name);
        $('#updateLanguage_Name').val(language.Tag_Name);
        
      });
      $('#UpdateModal').modal("show");
        
    }
/* Get Category  */
function openmodal()
{
   $('#myModal').modal("show");
}
$(document).on('click','.custom-clickable-row',function(e)
{
  var url=$(this).data('href');
  window.location=url;

});
</script>
</body>
</html>
