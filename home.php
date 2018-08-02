<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  background-color:	#FFF8DC;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 
}

.contain {
  padding: 0 16px;
}

.contain::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: green;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color:blue;
  text-align: center;
  cursor: pointer;
  width: 100%;
}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
.button:hover {
  background-color: #555;
}
body {
  margin: 0;
  font-family: "Times New Roman", Georgia, Serif;
}
.mySlides {
	display: none
	}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}


.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
 

 .prev, .next,.text {font-size: 11px}
}
.header {
    background-color:#696969;
    padding:1%;
    text-align: center;
}
.fa {
  padding: 10px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}
.head {
    padding:2.50%;
    }
.head1 {
    padding:2%;
    }
.footer {
    background-color:DodgerBlue;
    padding:10px;
	position:sticky;
   left:1;
   bottom:0;
   width: 100%;
   color: white;
   text-align: center;
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
		width: 1270px;
		margin: 20px auto;
	}
	.signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background:DarkCyan ;
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
.navbar {

    overflow: hidden;
    background-color:#20B2AA;
    font-family:sans-serif;
}
hr { 
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 2px;
	
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
.img {
  border-radius:50%;
}
.content {
    max-width: 1200px;
    margin: auto;
    background:	#7FFFD4;
    padding: 10px;
}
.nk{
	background-color:#FAEBD7;
}
</style>
</head>
<body style="background-color:black;">
<div class="w3-top">
   <div class="header">
     <h1><font color="white">Tailor Shop Management</font></h1>
    </div>
<div class="navbar"> 
  <a href="#">Home</a>
  <a href="#about">About Us</a>
  <a href="#team">Our Team</a>
  <a href="#contact">Contact Us</a>
  <a href="login.php" style="float:right">log in</a>
</div>
</div>
<div class="head">
</div>
<div class="head">
</div>
<div class="head">
</div>
<div class="slideshow-container">
<div class="mySlides">
  <div class="numbertext"></div>
  <img src="p1.jpg" style="width:100%">
  <div class="text"></div>
</div>
<div class="mySlides">
  <div class="numbertext"></div>
  <img src="p2.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides">
  <div class="numbertext"></div>
  <img src="p3.jpg" style="width:100%">
  </div>
<div class="mySlides">
  <div class="numbertext"></div>
  <img src="p4.jpg" style="width:100%">
  <div class="text"></div>
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>
<div class="nk">
<div class="content">
<div class="w3-content" style="max-width:1100px">
<div class="w3-row w3-padding-64"  id="about">
<div class="head">
</div>
</div>
   <div class="w3-row m6 w3-padding-large">
   <div align="center">
      <h1 class="w3-center">About Us</h1><br>
      <h5 class="w3-center">Tailor Shop Management System</h5>
      <p class="w3-large w3-text-grey w3-hide-medium"><b>Tailor shop management system is a system that is suitable for the tailors and the fashion designers to help
them to keep the database of their clients and their orders, measurements styles and payments. It provides you a detail information of customer orders and it also provides a facility to update or delete the existing data in database.</b></p>
    </div>
  </div>
  </div>
  <hr style="color:#A52A2A;">
<div id="team">
</div>
 <div class="head1">
</div>
<div class="head1">
</div>
<div class="head1">
</div>
  <header class=" w3-white w3-padding-40">
<div class="w3-row w3-padding-60">
<div align="center"><h2 style="color:#A52A2A;">Our Team</h2>
</div>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="nksa.jpeg" alt="Nandkumar" style="width:100%">
      <div class="contain">
        <h3 align="center">Nandkumar Sanodiya</h3>
         <h4 class="title" align="center">Lead Developer</h4>
        <p></p>
		<p align="center"><a href="https://www.facebook.com/nandkumar.sanodiya"><img src="fbs.png" height="50px" width="50px"></img></a>
		<a href="https://www.instagram.com/nandkumarsanodiya0/"><img src="ins.jpg" height="50px" width="50px"></img></a></p>
        <p></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="krish.jpeg" alt="krishna" style="width:100%">
      <div class="contain">
        <h3 align="center">Krishna Choure</h3>
         <h4 class="title" align="center">Lead Designer</h4>
        <p></p>
		<p align="center"><a href="https://www.facebook.com/krishna.choure.1"><img src="fbs.png" height="50px" width="50px"></img></a>
		<a href="https://www.instagram.com/krishna.choure.1/"><img src="ins.jpg" height="50px" width="50px"></img></a></p>
       
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="raj.jpeg" alt="rajmal" style="width:100%">
      <div class="contain">
        <h3 align="center">Rajmal Patidar</h3>
        <h4 class="title" align="center">Lead Supporter</h4>
        <p></p>
        <p align="center"><a href="https://www.facebook.com/rajmal.patidar.3954"><img src="fbs.png" height="50px" width="50px"></img></a>
		<a href="#"><img src="ins.jpg" height="50px" width="50px"></img></a></p>
      </div>
    </div>
  </div>
</div>
</div>
</header>
</div>
<div id="contact">
<div class="signup-form">
<div class="head">
</div>
<div class="head">
</div>
    <form action="contact.php" method="POST">
		<h2 align="center">Contact Us</h2>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
		<div class="row">
        	<div class="col-xs-6"><input type="email" class="form-control" name="email" placeholder="Email(Valid)" required="required"> </div>
	     <div class="col-xs-6"><input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required="required"></div>
        </div> 
			</div>  
                        <div class="form-group ">
                            
                            <textarea name="msg" class="form-control" rows="7" cols="10" placeholder="write message" ></textarea>
                            </div>			
		<div class="form-group">
          
        </div>    
		<div class="form-group">
            <p align="center"><button type="submit" name="submit" class="btn btn-primary btn-lg">Send Message</button>	</p>	 
        </div>
    </form>
	</div>
	
	</div>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<div class="footer">
  <p align="center" color="white"><b>Copyright © NKRAJ@2018</b></p>
</div>
</body>
</html>		