<?php
require_once 'dbs.php';
if(isset($_POST["id"])&& !empty($_POST["id"]))
{
	$id=mysqli_real_escape_string($link,$_POST['id']);
	$number=mysqli_real_escape_string($link,$_POST['number']);
	$collar=mysqli_real_escape_string($link,$_POST['collar']);
	$sleeve=mysqli_real_escape_string($link,$_POST['sleeve']);
	$cuffing=mysqli_real_escape_string($link,$_POST['cuffing']);
	$chest=mysqli_real_escape_string($link,$_POST['chest']);
	$neck=mysqli_real_escape_string($link,$_POST['neck']);	
	$length=mysqli_real_escape_string($link,$_POST['length']);
	$pay=mysqli_real_escape_string($link,$_POST['pay']);
	$remain=(($number*300)-$pay);
   if(empty($number)||empty($collar)||empty($sleeve)||empty($cuffing)||empty($chest)||empty($neck)||empty($length)||empty($pay))
   {
	        header("Location: ../shirt.php?details=empty");
            exit();
   }			  
    else
						 {
							 if(!ctype_digit($number)||!ctype_digit($collar)||!ctype_digit($sleeve)||!ctype_digit($cuffing)||!ctype_digit($chest)||!ctype_digit($neck)||!ctype_digit($length))
							 {
								header("Location: ../shirt.php?measure=it must be positive");
                                exit();
							 }
							 else
							 {
								  $sql = "INSERT INTO cus_shirt(cus_id,cus_num,cus_collar,cus_sleeve,cus_cuffing,cus_chest,cus_neck,cus_length,cus_pay,cus_remain) values('$id','$number','$collar','$sleeve','$cuffing','$chest','$neck','$length','$pay','$remain');";
                                  mysqli_query($link,$sql);
                                  header("Location: ../tailor/cusdetail.php");
							 }
						 }							 		
						
}   
else
{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
	{
        // Get URL parameter
        $id =  trim($_GET["id"]);
      
        $sql = "SELECT * FROM cus_details WHERE cus_id = ?";
        if($stmt = mysqli_prepare($link, $sql))
		{
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $id=$row["cus_id"];
				
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }  
	else
	{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Shirt Details</title>
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
 <a href="welcome.php">Home</a>
 <a href="cusdetail.php">Back</a>
  <a href="logout.php">Log out</a>
</div> 
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<h2>Shirt Details</h2>
		<p>Please fill the correct information</p>
		<hr>
		<div class="form-group">
		   <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
		 </div>
		 <div class="form-group">
           <input type="text" class="form-control" name="number" placeholder="No of Shirts" required="required">
		    </div>
		 <div class="form-group">
		 <input type="text" class="form-control" name="collar" placeholder="Collar(cm)" required="required">
		 </div>
		 <div class="form-group">
		 <input type="text" class="form-control" name="sleeve" placeholder="Sleeve(cm)"required="required">
		 </div>
		   <div class="form-group">
		   <input type="text" class="form-control" name="cuffing" placeholder="Cuffing(cm)"required="required">
		   </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="chest" placeholder="Chest(cm)"required="required">
		  </div>
	
		 <div class="form-group">
		 <input type="text" class="form-control" name="neck" placeholder="Neck(cm)">
		 </div>
		  <div class="form-group">
	      <input type="text" class="form-control" name="length" placeholder="Length(cm)">
		 </div>
		 <div class="form-group">
          
        </div> 
		<div class="form-group">
        <input type="text" class="form-control" name="pay" placeholder="Payable Amount: 300" required="required">
        </div>
		 <div class="form-group">
          
        </div> 
		<div class="form-group">
		      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="cusdetail.php" class="btn btn-default">Cancel</a>
        </div>
    </form>
</body>
</html>                            