<!DOCTYPE html>
<html>
<head>
	<title>AstroLekha Admin</title>
	<link href="<?=THEME?>assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- <link href="<?=THEME?>assets/css/Login.css" rel="stylesheet" id="bootstrap-css"> -->
	<script src="<?=THEME?>assets/js/bootstrap.min.js"></script>
	<script src="<?=THEME?>assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
    #toolbarContainer
	{
		 display: none!important;
	}
	body {
            background: #8da2ff !important;
        }
        .card {
            border: 1px solid #004aad;
        }
        .card-login {
            margin-top: 10px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span{
            width: 37px;
            background-color: #004aad;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover {
	    color: #fff;
	    background-color: #004aad;
       }

       .btn-outline-danger {
	    color: #fff;
	    font-size: 16px;
	    background-color: #090909;
	    background-image: none;
	    border-color: #004aad;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size:15px;
            line-height: 1.6;
            color: #004aad;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #0d4b9d;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size:15px;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #004aad;
            border: 1px solid #004aad;
            border-radius: 0;
        }
        .btn-outline-danger:hover
         {
	      color: #fff;
		  background-color: #004aad!important;
		  border-color: #004aad;
        }
        .bg-backgeround
        {
        	 background-color: white;
        }
	</style>
</head>
<body>
   <div class="container">
    <div class="card card-login mx-auto text-center bg-Normal">
        <div class="card-header mx-auto bg-backgeround">
            <span> <img src="<?=base_url()?>/public/assets/images/footer-logo.png" class="w-75" alt="Logo"> </span><br/>
                        
<!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body">
            <form action="<?=base_url()?>/Admin/AdminLogin" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="user" name="Email" placeholder="Email" type="text" class="form-control">
                    
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>

                    <input type="password" name="Password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>



            </form>
        </div>
    </div>
</div>


</body>
</html>


  
