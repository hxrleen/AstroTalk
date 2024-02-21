
<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>


<style>
        .error_form{
            top: 12px;
	        color: rgb(216, 15, 15);
            font-size: 15px;
            font-family: Helvetica;
                    }
            
.form-control:focus {
       box-shadow: 0 0 0 0.2rem rgb(255 255 255)!important;
  }

  .form-control  
  {
     font-size: 14px!important;
     height: 34px!important;
  }

.btn, .btn-primary{
   width: 20%;
   height: 20%;
}
.col-form-label{
   font-size:15px;
}
    </style>
<body>


<div class="preloader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                        <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title"> EDIT Reviews</h5>    <p>       
                              
                       <!---- form --->
<form  class="cmxform" id="Reviewupdate" method="POST" action="" autocomplete="off">

<div class="position-relative row form-group" hidden>
<label for="exampleEmail" class="col-sm-2 col-form-label">Review ID</label>
<div class="col-sm-4">
<td><input type="text" value="<?php echo $review['data'][0]['Review_id']?>" class="form-control form-control-user" id="Review_id" name="Review_id" placeholder="" required=""></td>
</div>
</div>



<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label">Review Date</label>
<div class="col-sm-4">
<td><input type="text" value="<?php echo $review['data'][0]['Review_date']?>" class="form-control form-control-user" id="Review_date" name="Review_date" placeholder="" required=""></td>
</div>

 <label for="exampleEmail" class="col-sm-2 col-form-label">Rating</label>
<div class="col-sm-4">
<select class="form-control"  name="Rating" id="Rating">
<option value="<?php echo $review['data'][0]['Rating']?>"><?php echo $review['data'][0]['Rating']?></option>
                            <option value="5" >5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            </select>
</div> 
</div>


<div class="position-relative row form-group">

<label for="exampleEmail" class="col-sm-2 col-form-label">Status</label>
   <div class="col-sm-4">
   <select class="form-control" value="<?php echo $review['data'][0]['Status']?>"  name="Status" id="Status">
   <option value="<?php echo $review['data'][0]['Status']?>"> <?php echo $review['data'][0]['Status']?></option>
                               <option value="Active" >Active</option>
                               <option value="Inactive">Inactive</option>
                               </select>
   </div> 

       <label for="exampleFile" class="col-sm-2 col-form-label">Astrologer</label>
             <div class="col-sm-4">
             <select class="form-control" name="Astrologer_id">
             <option value="<?php echo $review['data'][0]['Astrologer_id'] ?>"><?php echo $review['data'][0]['astrologer'] ?></option>
<?php

             
                                                    if(isset($data['astrologer']))
                                                    {

                                                     $count=0;
                                                     foreach ($data['astrologer'] as $val) {  ?>
                                                     <option value="<?php echo $val['Astrologer_id'] ?>"><?php echo $val['First_name'] ?></option>
                                                     <?php $count = $count + 1; ?>  
                                                      
                                                    <?php } } ?>
            </select>

                </div>
               </div>


               <div class="position-relative row form-group">

       <label for="exampleFile" class="col-sm-2 col-form-label">Customer</label>
             <div class="col-sm-4">
             <select class="form-control" name="UserID">
             <option value="<?php echo $review['data'][0]['UserID'] ?>"><?php echo $review['data'][0]['Customer'] ?></option>

             <?php
                                                    if(isset($data['customer']))
                                                    {

                                                     $count=0;
                                                     foreach ($data['customer'] as $val) {  ?>
                                                     <option value="<?php echo $val['UserID'] ?>"><?php echo $val['FName'] ?></option>
                                                     <?php $count = $count + 1; ?>  
                                                      
                                                    <?php } } ?>
            </select>

                </div>
               </div>

<div class="position-relative row form-group">
                                        
  <label for="exampleFile" class="col-sm-2 col-form-label">Comments</label>
                                                <div class="col-sm-10">
                                                <input id="Comments" placeholder="Please Enter the Description" name="Comments" value="<?php echo $review['data'][0]['Comments']?>" class="form-control ckeditor" type="text" rows="4" cols="50" required=""></input>
                                                  
                                                </div>
                                            </div>

                                            

                                           

                                            <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href=""  ><button class="btn btn-primary">Submit</button></a>
                                                  <a href=""  ><button onclick="window.open('./Review','_self')" class="btn btn-primary">Close</button></a>

                                                </div>
                                            </div>
                                        

</div>
</div>
</div>
</form>
                   <!--form ends-->
                          
               
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 

    
<script>
function goBack() {
  $('#gobackform').submit();
}
var maxLength = 100;
$('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
 jQuery(document).ready(function($)
 {
        $(".js-example-basic-multiple").select2();     
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#TAGS').html(formoption);
       
});


$(document).ready(function(e){
 $('.preloader').hide();
});
function goback()
{
   $('#gobackform').submit();
}


$("#Reviewupdate").on('submit',(function(e) {
//alert('this is text');
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
 //data.append('Faq_contents', CKEDITOR.instances['Faq_contents'].FAQdetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/Review_details",
   type: "POST",
   data:data,
   contentType: false,
         cache: false,
   processData:false,
  
    success:function(response)
            {
             $('.preloader').hide();
          
         alert(response);
            var obj = JSON.parse(response);
          
            if(obj.Status==true)
            {
          alert(obj.Msg);
              $('.preloader').hide();
              
             window.open('./Review', '_self');

             //$('#Slectlanguage').submit();
              
           }
           else
           {
               alert(obj.Msg);
               $('.preloader').hide();
           }
        }
    });


 }));


</script>
</body>
</html>
