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
     font-size: 12px!important;
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
                                <h5 class="card-title">Astrologers</h5>
                                <a href="<?=base_url()?>/MyControl/Add_Astrologer" >
                                 <button type="button" style="margin-top:-40px;margin-right:16px;" class="btn btn-primary float-right">Add Astrologers</button>
                              </a>

                                <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>First Name</th> 
                                                    <th>Second Name</th>  
                                                    <th>Gender</th> 
                                                    <th>Contact</th>
                                                    <th>Core skills</th>
                                                    <th>Expertise</th>
                                                    <th>Experience</th>
                                                    <th >Action</th>
      
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($data)){ 
                                                foreach ($data as $val){?>
                                                <tr>               
                                                <td><?php echo $val['First_name'] ?></td>
                                                <td><?php echo $val['Last_name'] ?></td>
                                      
                                                <td><?php echo $val['Gender'] ?></td>
                                                <td><?php echo $val['Mobile'] ?></td>
                                               
                                              
                                                <td><?php echo $val['Core_skills'] ?></td>
                                               
                                                <td><?php echo $val['Expertise'] ?></td>
                                                <td><?php echo $val['Experience'] ?></td>
              
                                                <td><a href="./astroupdate?Astrologer_id=<?php echo $val['Astrologer_id']?>"><i class='fa fa-edit' style="color:blue;"></i></a>
                                                <a onclick="return confirm('are you sure?')" href="./deleteAstro?Astrologer_id=<?php echo $val['Astrologer_id']?>"><i class="fa fa-trash-o" style="color:red;"></i></a>  </td>                                              
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
           "ordering": true
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
