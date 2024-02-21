                                            
<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Update Chapters</h5>
                                        <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                        <form class=""  action="<?=base_url()?>/Admin/PackageChapter_update" method="post" enctype="multipart/form-data">
                                        <input name="P_chapterId" id="PackageId" value="<?php echo $Package_Chapters['data'][0]['P_chapterId']?>" type="text" class="form-control" style="display:none;">   
                                         <input name="PackageId" id="PackageId" value="<?php echo $val['PackageId']?>" type="text" class="form-control" style="display:none;">   
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Package Name </label>
                                        <div class="col-sm-10">
                                        <input name="PackageName" value="<?php echo $val['PackageName']?>" id="Title" placeholder="Please Enter the Package Name" maxlength="100" type="text" readonly class="form-control" required>
                                        <span class="form-text text-muted"></span>
                                        </div>
                                        </div>
                                                     

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Language</label>
                                               
                                                <div class="col-sm-10">
                                                    <select id="Language_select" class="form-control" onchange="choice1(this)"  required="" name="Language">


                                                   <option value="<?php echo $Package_Chapters['data'][0]['Language_Id'];?>" selected><?php echo $Package_Chapters['data'][0]['Language'];?></option>
                                                  
                                                    <?php
                                                     if(isset($Language['data']))
                                                     {

                                                      $count=0;
                                                      foreach ($Language['data'] as $val_language) {  ?>
                                                      <option value="<?php echo $val_language['LanguageId'] ?>"><?php echo $val_language['LanguageName'] ?></option>
                                                      <?php $count = $count + 1; ?>  
                                                       
                                                     <?php } } ?>
                                  
                                                        
                                                    </select>
                                               </div>
                                            </div>

                                              <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Chapters</label>
                                               
                                                <div class="col-sm-10">
                                                <select id="chapterlist" class="form-control"  required="" name="Chapter">
                                                <option value="<?php echo $Package_Chapters['data'][0]['Chapter_Id'];?>" selected><?php echo $Package_Chapters['data'][0]['ChapterTitle'];?>
                                                  
                                                </option>
                                                  
                                                    <!-- <?php
                                                     if(isset($Chapterlist['data']))
                                                     {

                                                    
                                                    foreach ($Chapterlist['data'] as $val_chapter) {  ?>
                                                    <option value="<?php echo $val_chapter['Topic_ID'] ?>"><?php echo $val_chapter['Title'] ?>
                                                    </option>
                                                      
                                                       
                                                     <?php } } ?> -->
                                  
                                                        
                                                    </select>
                                               </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                            <div class="col-sm-10">
                                            <input name="OrderId" min="0" value="<?php echo $Package_Chapters['data'][0]['P_Chapter_OrderId']?>"  id="Chapter_Order" placeholder="Please Enter Chapter Order" type="number" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                 <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }} ?>
                                        <button style="margin-left: 27%;margin-top: -58px;" 
                                        onclick="goBack()" class="btn btn-primary ">Close</button>
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
  window.history.back();
}
 
    jQuery(document).ready(function($)
     {
        $(".js-example-basic-multiple").select2();   
       $("#courses").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
       
    });
 var maxLength = 200;
 $('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });

function choice1(select) {
  //category_id
     var Language = (select.value || select.options[select.selectedIndex].value);
     //alert(Language);
     $.post('<?=base_url()?>/Admin/SelectLanguage_chapter',{"LanguageID":Language},function(response){
     var obj = JSON.parse(response);
     var dataForselect = obj.data;
     var formoption = "";
    $.each(dataForselect, function(v) {
    var val = dataForselect[v]
    formoption +="<option value='" + val.Topic_ID  + "'>" + val.Title + "</option>";
    });
  
  //console.log(formoption);
  $('#chapterlist').html(formoption);

  });

 }
jQuery(document).ready(function($) {

  var Language = $('#Language_select').val();
     //alert(Language);
     $.post('<?=base_url()?>/Admin/SelectLanguage_chapter',{"LanguageID":Language},function(response){
     var obj = JSON.parse(response);
     var dataForselect = obj.data;
     var formoption = "";
    $.each(dataForselect, function(v) {
    var val = dataForselect[v]
    formoption +="<option value='" + val.Topic_ID  + "'>" + val.Title + "</option>";
    });
  
  //console.log(formoption);
   
  $('#chapterlist').html(formoption);


  });

  var apply_year = document.getElementById("Language_select");

          [].slice.call(apply_year.options)
          .map(function(a){
          if(this[a.value]){ 
            apply_year.removeChild(a); 
          } else { 
            this[a.value]=1; 
          } 
          },{});

  });
 

</script>
</body>
</html>
