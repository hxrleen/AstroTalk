<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<body>
<div class="preloader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                

                <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Group Details</h5>
                                        <form class="" id="Group" method="post" enctype="multipart/form-data">
                                            

                                         <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label ">Group Id</label>
                                            <div class="col-sm-10">
                                            <input name="Group_id" value="<?php echo $data['groupdata'][0]['Group_id']?>"  maxlength="30" id="Group_id" placeholder=""  type="text" readonly="true" class="form-control" >
                                            </div>
                                            </div>
                                            

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Group Name</label>
                                            <div class="col-sm-10">
                                            <input name="Group_name" value="<?php echo $data['groupdata'][0]['Group_name']?>"  maxlength="30" id="Group_name" placeholder=""  type="text" readonly="true" class="form-control" >
                                            </div>
                                            </div>
                                            
                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Group Description</label>
                                                <div class="col-sm-10">
                                                <input id="Group_desc" placeholder=""  value="<?php echo $data['groupdata'][0]['Group_desc']?>" name="Group_desc" maxlength="500" class="form-control" readonly="true"  type="text" ></input>
                                                </div>
                                            </div> 

                                        </form>
</div>
</div>

                              <?php if(isset($Msg['Msg'])){?>

                              <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                               
                                <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                              </div>
                              <?php } ?>
<div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Permission Table</h5>
                                <a href="<?=base_url()?>/MyControl/permission_detail?Group_id=<?php echo $data['groupdata'][0]['Group_id']?>" >
                                  <button type="button" style="margin-top:-4%" class="btn btn-primary float-right">Add</button>
                                  </a>
                                    <div class="table-responsive">
                                       
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Module Name</th> 
                                                    <th>Group Id </th>
                                                    <th>Read</th>
                                                    <th>Add</th>
                                                    <th>Update</th> 
                                                    <th>Delete</th> 
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($data)){ 
                                                foreach ($data['Permissiondata'] as $val){?>
                                                <tr>               
                                                <td><?php echo $val['Module_name']?></td>
                                                <td><?php echo $val['Group_id']?></td>
                                                <td><?php echo $val['read']?></td>
                                                <td><?php echo $val['add']?></td>
                                                <td><?php echo $val['update']?></td>
                                                <td><?php echo $val['delete']?></td>
                                                <td><a href="./Permission_update?Permission_id=<?php echo $val['Permission_id'] ?>"><i class='fa fa-edit' style="color:blue;"></i></a>
                                                  <a onclick="return confirm('are you sure?')"  href="./permission_delete?Permission_id=<?php echo $val['Permission_id']?>&Group_id=<?php echo $val['Group_id']?>"><i class='fa fa-trash-o' style="color:red;"></i></a></td>
                                                </tr>
                                                
                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>      
                    </div>
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js">
 </script>
    
<script>
function goBack() {
  $('#gobackform').submit();
}

$(document).ready(function(e){
 $('.preloader').hide();
});
function goback()
{
   $('#gobackform').submit();
}

</script>
</body>
</html>
