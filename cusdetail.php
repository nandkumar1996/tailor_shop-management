<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style type="text/css">
        .wrapper{
            width:1150px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top:0;
        }
        table tr td:last-child a{
            margin-right: 20px;
        }
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
</style>
<script type="text/javascript">
 $(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip();   
  });
</script>
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
                        <h3 class="pull-center" align="center">Customer Details</h3>
                    </div>
                    <?php
                    // Include config file
                    include_once 'dbs.php';
                    
                   
                    $sql = "SELECT *FROM cus_details";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Cus_id</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
										echo "<th>Email Address</th>";
										echo "<th>Mobile Number</th>";
										echo "<th>Address</th>";                                   
										echo "<th>Date/Time</th>";
										echo "<th>Operations</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cus_id'] . "</td>";
                                        echo "<td>" . $row['cus_first'] . "</td>";
                                        echo "<td>" . $row['cus_last'] . "</td>";
										echo "<td>" . $row['cus_email'] . "</td>";
										echo "<td>" . $row['cus_mobile'] . "</td>";
										echo "<td>" . $row['cus_address'] . "</td>";                                      
										echo "<td>" . $row['created_at'] . "</td>";
                                        echo "<td>";    
                                             echo "<a href='confirmpant.php?id=". $row['cus_id'] ."' class='btn btn-large btn-primary' data-toggle='tooltip' data-title='confirm Order'>Confirm</a>"; 
                                            echo "<br>";											
                                            echo "<a href='pants.php?id=". $row['cus_id'] ."' title='insert pant Record' data-toggle='tooltip'><span class='glyphicon glyphicon-thumbs-up'></span></a>";
                                            echo "<a href='shirt.php?id=". $row['cus_id'] ."' title='Insert shirt Record' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>";
                                            echo "<a href='cusupdate.php?id=". $row['cus_id'] ."' title='Update customer Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                           echo "<a href='cusdelete.php?id=". $row['cus_id'] ."' title='Delete customer Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";    
										echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found in the database.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                   // mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>