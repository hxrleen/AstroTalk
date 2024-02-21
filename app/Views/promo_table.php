<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 18px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
                                <h5 class="card-title">Promotions and Banners</h5>
                                <a href="<?=base_url()?>/MyControl/promotions" >
                                 <button type="button" style="margin-top:-4%" class="btn btn-primary float-right">Add </button>
                              </a>

                                <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>  
                                                    <th>File</th> 
                                                    <th>Place</th>
                                                    <th>Creation Date</th> 
                                                    <th>Expiry Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
      
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($data)){ 
                                                foreach ($data as $val){?>
                                                <tr>               
                                                <td><?php echo $val['Title'] ?></td>
                                                <td><?php echo $val['File'] ?></td>
                                                <td><?php echo $val['Place'] ?></td>
                                                <td><?php echo $val['Creation'] ?></td>
                                                <td><?php echo $val['Expiry'] ?></td>

                                                <td><label class="switch"><input type="checkbox" class="<?php echo $val['Prom_id']?>" onclick="" id="activeSwitch" data-toggle="toggle" data-on="true" data-off="false" <?php if($val['Status']=='Active'){ ?> checked="checked" <?php } ?>><span class="slider round"></span></label></td>
              
                                                <td><a onclick="return confirm('are you sure?')" href="./promo_delete?Prom_id=<?php echo $val['Prom_id']?>"><i class="fa fa-trash-o" style="color:red;"></i></a></td>                                              
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

    <script type="text/javascript">
    $(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
     var id = ($(this).attr('class'));
   // alert(id);
if($(this).prop("checked") == true){

       var formData ='Active';

       $.post("<?=base_url()?>/MyControl/promostatus",{"Status":formData,"Id":id},function(response){

     //alert(response);
    var obj = JSON.parse(response);
    var Msg=obj.Msg;
    // alert(Msg);

       });

           }

           else if($(this).prop("checked") == false){


       var formData ='Inactive';
       $.post("<?=base_url()?>/MyControl/promostatus",{"Status":formData,"Id":id},function(response){

 //alert(response);
      var obj = JSON.parse(response);
      var Msg=obj.Msg;
     // alert(Msg);
       });

           }
       });

    $("#feedback-active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
    $('#examples').dataTable();

   });
   </script>

     
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</body>
</html>
