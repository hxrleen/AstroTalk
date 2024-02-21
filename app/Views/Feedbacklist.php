<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
.checked {
  color: orange!important;
}
.fa2
{
  color: #e6e6e5;
}
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
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
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Feedback </h5>
                                  <!--   <a href="<?=base_url()?>/Admin/Topic_Insert" 
                                      class="topbutton"style=""><button type="button" class="btn btn-primary">Add Topic</button></a> -->
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>MobileNo</th>
                                                    <th>Email</th>
                                                    <th>Rating&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                    <th>Date</th>
                                                    <th>Feedback</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['ID']?></td>
                                                  <td><?php echo $val['Name'] ?></td>
                                                  <td><?php echo $val['MobileNo'] ?></td>
                                                  <td><?php echo $val['Email'] ?></td>
                                                  <?php $star = $val['StarRating'];

                                           switch ($star) {
                                            case 1:
                                            echo'<td><span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star"></span>
                                               <span class="fa fa2 fa-star"></span>
                                               <span class="fa fa2 fa-star"></span></td>'
                                             ;
                                             break;
                                            case 2:
                                             echo'<td><span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star"></span>
                                               <span class="fa fa2 fa-star"></span>
                                               <span class="fa fa2 fa-star"></span></td>'
                                             ;
                                             
                                              break;
                                            case 3:
                                             echo '<td><span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star"></span>
                                               <span class="fa fa2 fa-star "></span></td>
                                              ';
                                              break;
                                           case 4:
                                              echo '<td><span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star"></span></td>
                                              ';
                                              break;
                                            case 5:
                                              echo '<td><span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span>
                                               <span class="fa fa2 fa-star checked"></span></td>
                                              ';
                                              break;
                                            default:
                                              echo '<td><span class="fa fa2 fa-star "></span>
                                               <span class="fa fa2 fa-star "></span>
                                               <span class="fa fa2 fa-star "></span>
                                               <span class="fa fa2 fa-star "></span>
                                               <span class="fa fa2 fa-star "></span></td>
                                              ';
                                           }

                                          ?>
                                                 
                                                   <td><?php echo $val['Date'] ?></td>
                                                   <td><?php echo $val['Feedback'] ?></td>
                                                   <?php if($val['EOW']==true){ ?>
                                                   <td><label class="switch"><input type="checkbox" class="<?php echo 
                                                    $val['ID']; ?>" checked ><div class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span><!--END--></div></label></td>
                                                  <?php } else { ?>
                                                   <td><label class="switch"><input type="checkbox" class="<?php echo $val['ID']; ?>" ><div class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span><!--END--></div></label></td>
                                                  <?php } ?> 
                                                   <td>
                                                   <a  href="<?=base_url()?>/Admin/feedback_image/<?php echo($val['ID']) ?>" ><i class="fa fa-image" style="color:red;" ></i></a>

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
    <script type="text/javascript">
     $(document).ready(function(){
     
     $('input[type="checkbox"]').click(function(){
      var id = ($(this).attr('class'));
      // alert(id);
          
 
  
      
            if($(this).prop("checked") == true){
             
       
        var formData ='1';
        
        $.post('<?=base_url()?>/Admin/feedback_status',{"EOW":formData,"ID":id},function(response){
    
    // alert(response);
     var obj = JSON.parse(response);
     var Msg=obj.Msg;
      alert(Msg);
    
     
       
     
    
    
        });
        
            }
      
      
            else if($(this).prop("checked") == false){
               
     
        var formData ='0';
        
        $.post('<?=base_url()?>/Admin/feedback_status',{"EOW":formData,"ID":id},function(response){
      
  //alert(response);
       var obj = JSON.parse(response);
       var Msg=obj.Msg;
       alert(Msg);
     
     
       
     
    
    
        });
        
            }
        });

     $("#feedback-active").addClass("mm-active");
     $("#Web-list").addClass("mm-show");




    });
      
    </script>
</body>
</html>
