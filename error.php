<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
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
                        <h1>Invalid Request</h1>
                    </div>
                    <div class="alert alert-danger fade in">
                        <p>Sorry, you've made an invalid request. Please <a href="cusdetails.php" class="alert-link">go back</a> and try again.</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>