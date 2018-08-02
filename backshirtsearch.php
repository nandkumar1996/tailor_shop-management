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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h3 class="pull-center" align="center">Shirt Details</h3>
                    </div>
<?php
require_once 'dbs.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term))
{
    $sql = "SELECT * FROM cus_shirt WHERE cus_id=" . $term . "";
   if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Cus_id</th>";
                                        echo "<th>Shirt id</th>";
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
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found in the database.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
}
mysqli_close($link);
?>
</div>
            </div>        
        </div>
    </div>
</body>
</html>