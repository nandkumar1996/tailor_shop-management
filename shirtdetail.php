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
<head>
    <meta charset="UTF-8">
    <title>shirt Details</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style type="text/css">
        .wrapper{
            width:1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top:0;
        }
        table tr td:last-child a{
            margin-right: 15px;
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
                        <h3 class="pull-center" align="center">Shirt Details</h3>
                    </div>
                    <?php
                    // Include config file
                    include_once 'dbs.php';
                    
                   
                    $sql = "SELECT *FROM cus_shirt";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Cus_id</th>";
                                        echo "<th>Shirt id</th>";
										 echo "<th>Number of Shirts</th>";
                                        echo "<th>Collar</th>";
										echo "<th>Sleeve</th>";
										echo "<th>Cuffing</th>";
										echo "<th>chest</th>";
										echo "<th>Neck</th>";
										echo "<th>length</th>";
										echo "<th>pay Amount</th>";                                   
										echo "<th>Remaining</th>";
										echo "<th>Date/Time</th>";
										echo "<th>Operations</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cus_id'] . "</td>";
                                        echo "<td>" . $row['shirt_id'] . "</td>";
										echo "<td>" . $row['cus_num'] . "</td>";
                                        echo "<td>" . $row['cus_collar'] . "</td>";
										echo "<td>" . $row['cus_sleeve'] . "</td>";
										echo "<td>" . $row['cus_cuffing'] . "</td>";
										echo "<td>" . $row['cus_chest'] . "</td>";
										echo "<td>" . $row['cus_neck'] . "</td>";
										echo "<td>" . $row['cus_length'] . "</td>";
										echo "<td>" . $row['cus_pay'] . "</td>";                                      
										echo "<td>" . $row['cus_remain'] . "</td>";
										echo "<td>" . $row['created_at'] . "</td>";
                                        echo "<td>";    
                                           echo "<a href='shirtupdate.php?id=". $row['shirt_id'] ."' title='Update Pant Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                           echo "<a href='shirtdelete.php?id=". $row['shirt_id'] ."' title='Delete Pant Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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