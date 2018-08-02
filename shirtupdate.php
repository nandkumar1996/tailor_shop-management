<?php

require_once 'dbs.php';

$number=$pay=$remain= $collar = $sleeve= $cuffing =$chest = $neck= $length = "";
$pay_err=$collar_err = $sleeve_err = $cuffing_err =$chest_err = $neck_err = $length_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
	$input_collar = trim($_POST["collar"]);
    if(empty($input_collar)){
        $collar_err = "Please enter size of collar.";
    }else{
        $collar = $input_collar;
    }
    
    // Validate sleeve 
    $input_sleeve = trim($_POST["sleeve"]);
    if(empty($input_sleeve)){
        $sleeve_err = 'Please enter size of sleeve.';     
    } else{
        $sleeve = $input_sleeve;
    }
    
    // Validate cuffing
    $input_cuffing = trim($_POST["cuffing"]);
    if(empty($input_cuffing)){
        $cuffing_err = "Please enter size of cuffing";     
    } else{
        $cuffing = $input_cuffing;
    }
	$input_chest = trim($_POST["chest"]);
    if(empty($input_chest)){
        $chest_err = "Please enter size of chest";     
    } else{
        $chest = $input_chest;
    }
	$input_neck = trim($_POST["neck"]);
    if(empty($input_neck)){
        $neck_err = "Please enter size of neck";     
    }
	else
	{
        $neck = $input_neck;
    }
	$input_length = trim($_POST["length"]);
    if(empty($input_length)){
        $length_err = "Please enter size of length";     
    } else{
        $length = $input_length;
    }
	$input_pay = trim($_POST["pay"]);
    if(empty($input_pay)){
        $pay_err = "Please enter the correct amount.";     
    } else{
        $pay = $input_pay;
    }
	$number=trim($_POST["number"]);
	$remain=(($number*300)-$pay);
    if(empty($collar_err) && empty($sleeve_err) && empty($cuffing_err)  && empty($chest_err) && empty($neck_err) && empty($length_err) && empty($pay_error))
	{
        
        $sql = "UPDATE cus_shirt SET cus_collar=?, cus_sleeve=?, cus_cuffing=?,cus_chest=?, cus_neck=?, cus_length=?, cus_pay=?, cus_remain=? WHERE shirt_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iiiiiiiii",$param_collar, $param_sleeve, $param_cuffing, $param_chest, $param_neck, $param_length, $param_pay, $param_remain, $param_id);
            
            // Set parameter
            $param_collar = $collar;
            $param_sleeve = $sleeve;
            $param_cuffing = $cuffing;
			$param_chest = $chest;
            $param_neck = $neck;
            $param_length = $length;
			$param_pay=$pay;
			$param_remain=$remain;
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                header("location: ../tailor/shirtdetail.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM cus_shirt WHERE shirt_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
      
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
           
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                   
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
					$number=$row["cus_num"];
					$collar = $row["cus_collar"];
                    $sleeve = $row["cus_sleeve"];
                    $cuffing = $row["cus_cuffing"];
					$chest = $row["cus_chest"];
                    $neck = $row["cus_neck"];
                    $length = $row["cus_length"];
					$pay=$row["cus_pay"];					
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
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

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color:#B0C4DE;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:#00BFFF;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #B8860B;
}

.dropdown:hover .dropdown-content {
    display: block;
}
    </style>
</head>
<body>
<div class="header">
<h1><font color="white">Tailor Shop Management</font></h1>
</div>
<div class="navbar"> 
 <a href="welcome.php">Home</a>
  <a href="shirtdetail.php">Back</a>
  <a href="logout.php">Log out</a>
</div> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
			               <label>No of Shirts</label>
                            <input type="text" name="number" class="form-control" value="<?php echo $number; ?>" readonly>
						<div class="form-group <?php echo (!empty($collar_err)) ? 'has-error' : ''; ?>">
                            <label>collar</label>
                            <input type="text" name="collar" class="form-control" value="<?php echo $collar; ?>">
                            <span class="help-block"><?php echo $collar_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sleeve_err)) ? 'has-error' : ''; ?>">
                            <label>sleeve</label>
                            <input type="text" name="sleeve" class="form-control" value="<?php echo $sleeve; ?>">
                            <span class="help-block"><?php echo $sleeve_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cuffing_err)) ? 'has-error' : ''; ?>">
                            <label>cuffing</label>
                            <input type="text" name="cuffing" class="form-control" value="<?php echo $cuffing; ?>">
                            <span class="help-block"><?php echo $cuffing_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($chest_err)) ? 'has-error' : ''; ?>">
                            <label>Chest</label>
                            <input type="text" name="chest" class="form-control" value="<?php echo $chest; ?>">
                            <span class="help-block"><?php echo $chest_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($neck_err)) ? 'has-error' : ''; ?>">
                            <label>Neck</label>
                            <input type="text" name="neck" class="form-control" value="<?php echo $neck; ?>">
                            <span class="help-block"><?php echo $neck_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($length_err)) ? 'has-error' : ''; ?>">
                            <label>Length</label>
                            <input type="text" name="length" class="form-control" value="<?php echo $length; ?>">
                            <span class="help-block"><?php echo $length_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($pay_err)) ? 'has-error' : ''; ?>">
                            <label>Pay</label>
                            <input type="text" name="pay" class="form-control" value="<?php echo $pay; ?>">
                            <span class="help-block"><?php echo $pay_err;?></span>
                        </div>
						
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="shirtdetail.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>