<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>


<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                Data
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Template</h5>
                                        <?php if(isset($Template['data'])){ 
                                         foreach ($Template['data'] as $val){?>
                                    <form class=""  action="<?=base_url()?>/Admin/update_template" method="post" enctype="multipart/form-data">
                                             <input name="Temp_id" id="Id" value="<?php echo $val['Temp_id']?>" type="text" class="form-control" style="display:none;">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Template Name</label>
                                                <div class="col-sm-10">
                                                <input name="Template_name" id="Date" value="<?php echo $val['Template_name']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Email Subject</label>
                                                <div class="col-sm-10">
                                                <input name="Email_Subject" id="Email_Subject" value="<?php echo $val['Email_Subject']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Template Body</label>
                                            <div class="col-sm-10">
                                            <textarea name="Template_body" id="Date" class="form-control ckeditor ">
                                             <?php echo $val['Template_body']?> 
                                            </textarea>
                                            </div>
                                            </div>

                                           
                                            
                                          
                                            
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                         <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Templatelist'" class="btn btn-primary ">Close</button>
                                     <?php }} ?>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#template-active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
  });
</script>
</body>
</html>
