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
                                <h5 class="card-title">Refer and Earn List</h5>
                                 <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>S No.</th> 
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Total</th>
                                                    <th>Paid Ref</th>
                                                    <th>Amount</th>
                                                    <th>Paid Amt</th>
                                                    <th>Balance</th>
                                                    <th>Action</th>
                                                     
                                                        
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                foreach ($Data['data'] as $val){?>
                                                
                                                <td style="width:8%;"><?php echo $val['User_Id']; ?></td>
                                                <td><?php echo $val['Name']; ?></td> 
                                                <td><?php echo $val['Referral_Code']; ?></td>
                                                <td><?php echo $val['Total_Referral'] ?></td>
                                                <td style="width: 10%;"><?php echo $val['Tot_Paid'] ?></td>
                                                <td style="width: 1%;"><?php echo $val['Amt_Earned'] ?></td>
                                                <td style="width: 10%;"><?php echo $val['Pmt_received'] ?></td>
                                                <td style="width: 10%;"><?php echo $val['Balance'] ?></td>
                                             
                                                <td style="width: 10%;">
                                              
                                                 <a onclick="return openmodal('<?php echo $val['Name']; ?>','<?php echo $val['User_Id']; ?>','<?php echo $val['Balance']; ?>')" href='javascript:;'><button type="submit" class="btn btn-primary">Pay Now</button></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
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
            <form action="<?=base_url()?>/Admin/AddPayments" name="Payments" id="pay" method="post" enctype="multipart/form-data">
            <div class="form-group">

            <label>Select User</label>
            <input type="text" name="UserName" id= Username autocomplete="off" class="form-control">
            <input type="hidden"  name="User_Id" id="name" autocomplete="off" class="form-control">
    
            <!-- <input type="hidden"  name="UserName" id="name" autocomplete="off" class="form-control"> -->
            <div class="form-group">
            <label for="name">Pay Date:</label>
            <input type="date" name="PayDate" value="<?php echo date('d-m-y'); ?>" autocomplete="off" class="form-control datefield" placeholder="Enter Pay Date" id="PayDate" required>
            </div>
            <div class="form-group">
            <label for="name">Amount:</label>
            <input type="number" name="Amount" autocomplete="off" class="form-control" id="Amount" placeholder="Enter Amount"  required="" >
            </div>
            
            <div class="form-group">
            <label for="name">Available Balance :</label>
            <input type="text" name="Balance" autocomplete="off" class="form-control" id="bal" placeholder="Enter Amount" required="">
            </div>

            <div class="form-group">
            <label for="name">Payment Details:</label>
            <!-- <input type="text" name="PaymentDetails"  autocomplete="off" class="form-control" id="PaymentDetails" placeholder="Enter Payment details" required="">
             -->
             <textarea name="PaymentDetails"  autocomplete="off" class="form-control" id="PaymentDetails" placeholder="Enter Payment details" required=""></textarea>
          
          </div>
            <input type="hidden" name="Payment_ID" id="hidden_Paymentid" value="">
           <button type="submit" class="btn btn-primary">Submit</button>
           </form>
            </div>
          
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
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
 jQuery(document).ready(function($)
 {
          
    $("#App-active").removeClass("mm-show");
    $('#Dashboard-active').removeClass("mm-active");
    $("#refer_earn").addClass("mm-active");
});
</script>
    <script type="text/javascript">

    function openmodal(name,id,Balance)
    { 
        //alert (name);
      $('#hidden_Paymentid').val(id);
    
      $.post("<?=base_url()?>/Admin/PaymentNow",{id:id
      },function(data,status)
      {
        debugger; 
        //alert(data);
        var payment =JSON.parse(data);  
        
        $('#Username').val(name);
        $('#name').val(id);
        $('#bal').val(Balance);
       
     
  });

      $('#myModal').modal("show");
        
    }

</script>
<script>
   
$(document).ready(function()
{
   var today = new Date().toISOString().split('T')[0];
   
   document.getElementsByClassName("datefield")[0].setAttribute('min', today);
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

<script>
                          
//var balance = 5;

$(document).on('keyup', '#Amount', function () {
  var $field = $(this);
  var amount =  parseInt($field.val());
  var balance = $('#bal').val();
//alert(balance);

  if( amount > balance) {
    alert('Amount exceeds Balance');
    $field.val(""); 
  }  
});

</script>

</body>
</html>
