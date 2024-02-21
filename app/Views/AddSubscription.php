                                            
<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Add Subscription</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Subscription" method="post" enctype="multipart/form-data">
                                          <div id="Amount" class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Name</label>
                                              <div class="col-sm-10">
                                              <input value="<?php echo $User['data'][0]['Name'] ?>" maxlength="50" readonly placeholder="" type="text" class="form-control" required>
                                             
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                             <input type="hidden" name="ID" value="<?php echo($ID) ?>">

                                                <div class="col-sm-10">
                                                    <select  id="Course_ID" onchange='choice1(this)' class="form-control" name="Course_ID">
                                                    <?php
                                                     if(isset($Data['data']))
                                                     {

                                                        $count=0;
                                                        foreach ($Data['data'] as $val) {  ?>
                                                        <option value="<?php echo $val['Course_Id'] ?>"><?php echo $val['Couse_Title'] ?></option>
                                                        <?php $count = $count + 1; ?>
                                                       
                                                     <?php } } ?>

                                                        
                                                    </select>
                                               </div>
                                            </div>
                                            <div id="Amount" class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Amount</label>
                                              <div class="col-sm-10">
                                              <input name="Amount" maxlength="50" id="Courseprice"placeholder="" type="text" class="form-control" required>
                                             
                                            </div>
                                            </div>
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                         <?php if($count==1){?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Usersview/<?php echo $User['data'][0]['User_Id'] ?>'"  class="btn btn-primary ">Close</button>
                                       <?php } else {?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Usersview/<?php echo $User['data'][0]['User_Id'] ?>'" class="btn btn-primary ">Close</button>
                                       <?php }?>

                                    </div>
                                </div>
                               
                              <!--   <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/Selectcourse" method="post">
                                <input type="text" value="<?php echo $Data['data'][0]['Course_Id'] ?>" name="Course_Id" class="form-control">    
                                </form> -->

                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script>

jQuery(document).ready(function($)
 {
          
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");

      var CourseId = document.getElementById('Course_ID').value;
       //alert(CourseId); 
       $.post('<?=base_url()?>/Admin/Selectcourseprice',{"CourseId":CourseId},function(response){
    
   
      console.log(response);
      var obj = JSON.parse(response);
      $('#Courseprice').val(obj.data[0].Course_Fees);

      });
});
var maxLength = 100;
$('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
function goback()
{
   $('#gobackform').submit();
}

function choice1(select) {
  //category_id
     var CourseId = (select.value || select.options[select.selectedIndex].value);
     // alert(CourseId); 
    $.post('<?=base_url()?>/Admin/Selectcourseprice',{"CourseId":CourseId},function(response){
    
   
      console.log(response);
      var obj = JSON.parse(response);
      $('#Courseprice').val(obj.data[0].Course_Fees);
     

    

     
      

       
     
    
    
        });
          
      } 



</script>
</body>
</html>
