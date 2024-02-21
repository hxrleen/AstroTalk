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
     font-size: 14px!important;
     height: 34px!important;
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
                                <h5 class="card-title">Payments</h5>
                                <!-- <button type="button" style="margin-top:-4%" onclick="openmodal()" class="btn btn-primary float-right">Add Payments</button>
                                 -->

                                <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Payment Id</th> 
                                                    <th>Username</th>
                                                    <th>Pay Date</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                foreach ($Data['data'] as $val){?>
                                                
                                                <td><?php echo $val['Payment_ID'] ?></td>
                                                <td><?php echo $val['UserName'] ?></td> 
                                                <td><?php echo $val['PayDate'] ?></td>
                                                <td><?php echo $val['Amount'] ?></td>
                                                <td>
                                                <!-- <a onclick="return getPaymentinfo(<?php echo($val['Payment_ID']) ?>)" href='javascript:;'><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                                 -->
                                               <a onclick="return confirm('are you sure?')" href="<?=base_url()?>/Admin/PaymentDelete/<?php echo($val['Payment_ID']) ?>"><i class="fa fa-trash" style="color:red;" ></i>
                                                </a>
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

     <!-- Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>/Admin/AddPayments" name="Payments" method="post" enctype="multipart/form-data">
            <div class="form-group">

            <label>Select User</label>

              <select name="User_Id" id="User" placeholder="--Select User--" class="form-control" onChange="myNewFunction(this);">

              <?php 
              
              foreach ($Users['data'] as $v) {?>
               
              <option value="<?php echo $v['User_Id']; ?>"><?php echo $v['Name']; ?>

                  
              </option>

                <?php } ?>
               
              </select> 

              </select>
              </div>
            <input type="hidden"  name="UserName" id="name" autocomplete="off" class="form-control">
            <div class="form-group">
            <label for="name">Pay Date:</label>
            <input type="date" name="PayDate" autocomplete="off" class="form-control" placeholder="Enter Pay Date" id="PayDate" required>
            </div>
            <div class="form-group">
            <label for="name">Amount:</label>
            <input type="number" name="Amount" autocomplete="off" class="form-control" id="Amount" placeholder="Enter Amount" required="">
            </div>
            <div class="form-group">
            <label for="name">Payment Details:</label>
            <input type="text" name="PaymentDetails"  autocomplete="off" class="form-control" id="PaymentDetails" placeholder="Enter Payment details" required="">
            </div>
            <input type="hidden" name="Payment_ID" id="hidden_Paymentid" value="">
           <button type="submit" class="btn btn-primary">Submit</button>
           </form>
            </div>
          
        </div>
    </div>
    </div>
    <div class="modal" id="UpdateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Payments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>/Admin/UpdatePayment" name="Payment" method="post" enctype="multipart/form-data">
             <div class="form-group">

             <!-- <input type="text" name="User_Id" id="Userr"> -->
            <label>Select User</label>

              <select name="User_ID" id="UpdateUser"  placeholder="--Select User--" class="form-control" onChange="myFunction(this);">

              <?php 
              
              foreach ($Users['data'] as $v) {?>
               
              <option value="<?php echo $v['User_Id']; ?>"><?php echo $v['Name']; ?>
            
              
                  
              </option>

              <?php } ?>
              
              </select>

              </select>
              </div>
             <input type="hidden" name="UserName" id="update" autocomplete="off" class="form-control">
            <div class="form-group">
            <label for="name">Pay Date:</label>
            <input type="date" name="PayDate" autocomplete="off" class="form-control" placeholder="Enter Pay Date" id="updatePayDate" required>
            </div>
            <div class="form-group">
            <label for="name">Amount:</label>
            <input type="number" name="Amount" autocomplete="off" id="UpdateAmount" class="form-control" required="">
         
            </div>
            <div class="form-group">
            <label for="name">Payment Details:</label>
            <input type="text" name="PaymentDetails" autocomplete="off" id="UpdatePaymentDetails" class="form-control" required="">
         
            </div>
            <input type="hidden" name="Payment_ID" id="hidden_PaymentID" value="">
            <input type="hidden" name="User_ID_OLD" id="hidden_UserID" value="">

           <button type="submit" class="btn btn-primary">Update</button>
           </form>
            </div>
          
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
     
     $("#Payments").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");
     $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
      } );

    });
    function getPaymentinfo(id)
    { 
      $('#hidden_PaymentID').val(id);
     // $('#hidden_UserID').val(User_Id);
      $.post("<?=base_url()?>/Admin/PaymentUpdate",{id:id
      },function(data,status)
      {
        debugger; 
        //alert(data);
        var payment =JSON.parse(data);  
        
        $('#hidden_UserID').val(payment.User_ID);
        $('#update').val(payment.UserName);
        
        $('#UpdateUser').val(payment.User_ID);
        $('#updatePayDate').val(payment.PayDate);
        $('#UpdateAmount').val(payment.Amount);
        $('#UpdatePaymentDetails').val(payment.PaymentDetails);
        
   
        document.getElementById("UpdateUser").value = payment.User_ID;
        
        var apply_year = document.getElementById("UpdateUser");

          [].slice.call(apply_year.options)
          .map(function(a){
          if(this[a.value]){ 
            apply_year.removeChild(a); 
          } else { 
            this[a.value]=1; 
          } 
          },{});
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

<script>
  function myNewFunction(sel) {
  //alert(sel.options[sel.selectedIndex].text);
  document.getElementById("name").value = User.options[sel.selectedIndex].text;
}
</script>
<script>
  function myFunction(sel) {
  //alert(sel.options[sel.selectedIndex].text);
  document.getElementById("update").value = UpdateUser.options[sel.selectedIndex].text;
}
</script>

</body>
</html>
