<?php
require_once 'dbs.php';
$username = $password =$newpassword= $confirm_newpassword = "";
$username_err = $password_err= $newpassword_err= $confirm_newpassword_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
	
	 // Validate new password
	  if(empty(trim($_POST['newpassword']))){
        $newpassword_err = "Please enter a new password.";     
    } elseif(strlen(trim($_POST['password'])) < 5){
        $newpassword_err = "Password must have atleast 5 characters.";
    } else{
        $newpassword = trim($_POST['newpassword']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_newpassword"]))){
        $confirm_newpassword_err = 'Please confirm password.';     
    } else{
        $confirm_newpassword = trim($_POST['confirm_newpassword']);
        if($newpassword != $confirm_newpassword)
		{
            $confirm_newpassword_err = 'Password did not match.';
        }
    }
    if(empty($username_err) && empty($password_err)&& empty($confirm_newpassword_err) && empty($confirm_password_err))
	{
 	  $hashedpwd=password_hash($confirm_newpassword, PASSWORD_DEFAULT);
	  $sql="UPDATE users SET password=$hashedpwd WHERE id='nksanodiya'";         
        
		mysqli_query($link,$sql);
                 header("Location: ../tailor/login.php");
				 exit();    
	}
    echo "failed";
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
		body{
  margin: 0;
  font:14px sans-serif;
}
.wrapper{
	width:30%;  
	padding:20px;		
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
.active {
    background-color: #4CAF50;
}
.login-form{
	width:400px;
	margin:0 auto;
	padding-top:30px;
}
.login-form input{
 width:90%;
 height:40px;
 padding:0px 5%;
 margin-bottom:4px;
 border:none;
 background-color:#fff;
 font-family:arial;
 font-size:16px;
 color: #111;
 line-height:40px
}
.login-form .button1{
    display: block;
	font-family:arial;
	font-size:15px;
    background-color:#4CAF50;
    color:white;
    border:1;
    cursor: pointer;
    width: 20%;
    opacity:0.9;
	
}
.login-form .button1:hover{
 background-color:#123432
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color:#B0C4DE;
}
</style>
</head>
<body>
<div class="header">
  <h1><font color="white">Tailor Shop Management</font></h1>
</div>
<div class="navbar"> 
  <a href="home.php">Home</a>
  <a href="#">Contact Us</a>
</div>
<div align="center">
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill this form to Reset Password in an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" placeholder="Username" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Old Password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            
			<div class="form-group <?php echo (!empty($newpassword_err)) ? 'has-error' : ''; ?>">
             
                <input type="password" placeholder="New Password" name="newpassword" class="form-control" value="<?php echo $newpassword; ?>">
                <span class="help-block"><?php echo $newpassword_err; ?></span>
            </div>
			
			
			<div class="form-group <?php echo (!empty($confirm_newpassword_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Confirm New password" name="confirm_newpassword" class="form-control" value="<?php echo $confirm_newpassword; ?>">
                <span class="help-block"><?php echo $confirm_newpassword_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>  
	</div>
</body>
</html>