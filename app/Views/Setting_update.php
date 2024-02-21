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
                                    <div class="card-body"><h5 class="card-title">Setting</h5>
                                        <?php if(isset($Setting['data'])){ 
                                         foreach ($Setting['data'] as $val){?>
                                    <form class=""  action="<?=base_url()?>/Admin/update_Setting" method="post" enctype="multipart/form-data">
                                             <input name="S_ID" id="S_ID" value="<?php echo $val['S_ID']?>" type="text" class="form-control" style="display:none;">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">MobileNo</label>
                                                <div class="col-sm-10">
                                                <input name="MobileNo" id="MobileNo" value="<?php echo $val['MobileNo']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="Facebook" class="col-sm-2 col-form-label">Facebook</label>
                                                <div class="col-sm-10">
                                                <input name="Facebook" id="Facebook" value="<?php echo $val['Facebook']?>" type="text" class="form-control"></div>
                                            </div>

                                             <div class="position-relative row form-group"><label for="Youtube" class="col-sm-2 col-form-label">Youtube</label>
                                                <div class="col-sm-10">
                                                <input name="Youtube" id="Youtube" value="<?php echo $val['Youtube']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">About</label>
                                            <div class="col-sm-10">
                                            <textarea name="About" id="Date" class="form-control ckeditor ">
                                             <?php echo $val['About']?> 
                                            </textarea>
                                            </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Legal</label>
                                            <div class="col-sm-10">
                                            <textarea name="Legal" id="Date" class="form-control ckeditor ">
                                             <?php echo $val['Legal']?> 
                                            </textarea>
                                            </div>
                                            </div>

                                           
                                            
                                          
                                            
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                         <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Setting'" class="btn btn-primary ">Close</button>
                                     <?php }} ?>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
</body>
</html>
