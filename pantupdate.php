<?php
require_once 'dbs.php';

$number=$pay= $remain= $west = $thigh= $length = "";
$pay_err = $west_err = $thigh_err = $length_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    // Validate west
	$input_west = trim($_POST["west"]);
    if(empty($input_west)){
        $west_err = "Please enter a west.";
    }else{
        $west = $input_west;
    }
    
    // Validate thigh 
    $input_thigh = trim($_POST["thigh"]);
    if(empty($input_thigh)){
        $thigh_err = 'Please enter an thigh.';     
    } else{
        $thigh = $input_thigh;
    }
    
    // Validate length
    $input_length = trim($_POST["length"]);
    if(empty($input_length)){
        $length_err = "Please enter the length amount.";     
    } else{
        $length = $input_length;
    }
    //validate pay
	$input_pay = trim($_POST["pay"]);
    if(empty($input_pay)){
        $pay_err = "Please enter the correct amount.";     
    } else{
        $pay = $input_pay;
    }
	$number=trim($_POST["number"]);
	$remain=(($number*400)-$pay);
    // Check input errors before inserting in database
    if(empty($west_err) && empty($thigh_err) && empty($length_err) && empty($pay_err)){
     
        $sql = "UPDATE cus_pant SET cus_west=?, cus_thigh=?, cus_length=?, cus_pay=?, cus_remain=? WHERE pant_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "iiiiii",$param_west, $param_thigh, $param_length, $param_pay,$param_remain, $param_id);
            
            // Set parameters
            $param_west = $west;
            $param_thigh = $thigh;
            $param_length = $length;
			$param_pay= $pay;
		    $param_remain = $remain;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: ../tailor/pant_detail.php");
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
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM cus_pant WHERE pant_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);                
					$number=$row["cus_num"];
					$west = $row["cus_west"];
                    $thigh = $row["cus_thigh"];
                    $length = $row["cus_length"];
                    $pay = $row["cus_pay"];  
                  
                } else{
             
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
  <a href="pant_detail.php">Back</a>
  <a href="logout.php">Log out</a>
</div> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Pant Details</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
					
                            <label>No of Pants</label>
                            <input type="text" name="number" class="form-control" value="<?php echo $number; ?>" readonly>
                          <div class="form-group <?php echo (!empty($west_err)) ? 'has-error' : ''; ?>">
                            <label>West</label>
                            <input type="text" name="west" class="form-control" value="<?php echo $west; ?>">
                            <span class="help-block"><?php echo $west_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($thigh_err)) ? 'has-error' : ''; ?>">
                            <label>Thigh</label>
                            <input type="text" name="thigh" class="form-control" value="<?php echo $thigh; ?>">
                            <span class="help-block"><?php echo $thigh_err;?></span>
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
                        <a href="pant_detail.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>