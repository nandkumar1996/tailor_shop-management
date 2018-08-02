<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Customer Information</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	 body {
  margin: 0;
}
.header {
    background-color:#696969;
    padding:1%;
    text-align: center;
}

.navbar {
    overflow: hidden;
    background-color:#20B2AA;
    font-family:sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color:#B0C4DE;
}
    .form-control{
		height: 41px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: none;
	}
	.form-control:focus{
		background: #e2e2e2;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 390px;
		margin: 30px auto;
	}
	.signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }    
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus{
		background: #2389cd !important;
        outline: none;
	}
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #3598dc;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}
    .signup-form .hint-text {
		padding-bottom: 15px;
		text-align: center;
    }
</style>
</head>
<body>
<div class="header">
  <h1><font color="white">Tailor Shop Management</font></h1>
</div>
<div class="navbar"> 
  <a href="welcome.php">Back</a>
  <a href="logout.php">Log out</a>
</div> 
<div class="signup-form">
    <form action="include/insert.php" method="POST">
		<h2>Customer Details</h2>
		<p>Please fill the correct information</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email(Valid)" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required="required">
        </div> 
		<div class="form-group">
          
        </div>   
   		<div class="form-group">
		          <input type="text" class="form-control" name="address" placeholder="Address(Permanent)">
		 </div> 
		 <div class="row">
		 <div class="col-xs-4"><input type="text" class="form-control" name="west" placeholder="West(cm)"></div>
		 <div class="col-xs-4"><input type="text" class="form-control" name="thigh" placeholder="Thigh(cm)"></div>
		 <div class="col-xs-4"><input type="text" class="form-control" name="length" placeholder="Length(cm)"></div>
		 </div>
		 <div class="form-group">
          
        </div> 
		<div class="form-group">
        <input type="text" class="form-control" name="pay" placeholder="Payable Amount: 400" required="required">
        </div>
		 <div class="form-group">
          
        </div> 
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
			 <button type="reset" name="submit" class="btn btn-default btn-lg">Reset</button>
        </div>
    </form>
</body>
</html>                            