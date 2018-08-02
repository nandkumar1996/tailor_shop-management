<?php
// Include config file
require_once 'dbs.php';
// Define variables and initialize with empty values
$address=$email= $mobile= "";
$address_err=$email_err= $mobile_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
       
   //validate email
    $input_email= trim($_POST["email"]);
     if(!filter_var($input_email,FILTER_VALIDATE_EMAIL))
	 {
		 $email_err="Please enter correct Email id";
	 }
	 else{
		 $email=$input_email;
	 }
	 
	 //validate mobile
	 $input_mobile=trim($_POST["mobile"]);
	 if(empty($input_mobile))
	 {
		 $mobile_err="please enter mobile number";
	 }
	 else if(strlen($input_mobile)<10){
		 $mobile_err="please enter 10 digit mobile number";
	 }
	 else
	 {
		 $mobile=$input_mobile;
	 }
	//validate address
	$input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter the correct address";     
    } else{
        $address= $input_address;
    }
    if(empty($mobile_err) && empty($email_err)&& empty($address_err)){
        // Prepare an update statement
        $sql = "UPDATE cus_details SET cus_email=?,cus_mobile=?,cus_address=? WHERE cus_id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisi", $param_email,$param_mobile,$param_address,$param_id);
			$param_email=$email;
			$param_mobile=$mobile;
            $param_address = $address;
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                header("location: ../tailor/cusdetail.php");
                exit();
            } 
			else
			{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM cus_details WHERE cus_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $email=$row["cus_email"];
					$mobile=$row["cus_mobile"];
					$address=$row["cus_address"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }  else{
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
    <a href="cusdetail.php">Back</a>
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
                      
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email id</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
                            <span class="help-block"><?php echo $mobile_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address;?>">
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
					    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="cusdetail.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>