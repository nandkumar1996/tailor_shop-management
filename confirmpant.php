<?php
 require_once 'dbs.php';
 $email="";
 $email_err= "";
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
  $to=$_POST['email'];
  $subject = "order Confirmation";
  $txt = "Hello sir, Your Order is Ready, Please come and Collect it from our Shop.";
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
  $headers = "From: nandkumarsanodiya@gmail.com" . "\r\n" .
  "CC:$to";
	  header("location: ../tailor/cusdetail.php");
}
else{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
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
    <title>delete Pant Record</title>
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
  <a href="welcome.php">Back</a>
  <a href="logout.php">Log out</a>
</div> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Confirm Order</h2>
                    </div>
                    <form action="confirmpant.php" method="post">
                        <div class="alert alert-success fade in">
                 
                            <p>Are you sure that order is confirm ?</p><br>
	                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">						
							    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
								<div class="form-group">
          
                              </div> 
								<p>
                                <input type="submit" value="Submit" class="btn btn-success">
                                <a href="cusdetail.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>