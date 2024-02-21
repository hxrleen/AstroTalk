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
                        <div class="card-body"><h5 class="card-title">UPDATE ASTROLOGER CATEGORY  </h5> <p>       
                              
                          
                           <!---- form --->
<form  class="cmxform" id="Categoryupdate" method="POST" action="" autocomplete="off">

<div class="position-relative row form-group" hidden >
                                 <label for="exampleFile" class="col-sm-2 col-form-label" >Id</label>
                             <div class="col-sm-10">
                             <input name="Astro_Cat" value="<?php echo $data[0]['Astro_Cat']?>" accept="image/*" id="Astro_Cat" placeholder="Astro_Cat" type="text" class="form-control" >              
                            </div>
                                </div>
 

                        <div class="position-relative row form-group">
                          <label for="exampleEmail" class="col-sm-2 col-form-label">Category</label>
                    
                    <div class="col-sm-10">
                        <input id="CatName" value="<?php echo $data[0]['CatName']?>" class="js-example-basic-multiple form-control" name="CatName" readonly="true">
                   </div>
                </div>

                <div class="position-relative row form-group">
                                 <label for="exampleFile" class="col-sm-2 col-form-label">Icon</label>
                             <div class="col-sm-10">
                             <input name="Icon" value="<?php echo $data[0]['Icon']?>" accept=".svg , .png" id="Icon" placeholder="Icon" type="file" class="form-control" required="" >  
                             <span>Please select an image of maximum size 200kb. Only svg or png files allowed.</span><br><br>
            
                            </div>
                                </div>

                <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href=""  ><button class="btn btn-primary">Submit</button></a>
                                                  
                                                </div>
                                            </div>

</form>
                   <!--form ends-->
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 
<!--validation-->
    
<script>

function check(IMageID)
{
    var img = document.getElementById(IMageID);
    

    var width = this.width;
    
    
    if(img.files[0].size <=200000)
    {
        var url= URL.createObjectURL(img.files[0]);
        
        ////$('#image').submit();
    }
    else 
    {
        alert('File size is large ');
        img.value='';
    }
    
}
    </script>
<!--validation ends-->
    
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


$("#Categoryupdate").on('submit',(function(e) {
  alert("this is text");
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
 //data.append('Faq_contents', CKEDITOR.instances['Faq_contents'].FAQdetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/Cat_details",
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
              
           window.open('./Cat', "_self");
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
