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
    <title>Welcome</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
body {
  margin: 0;
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
@media only screen and (max-width: 300px) {
 

 .prev, .next,.text {font-size: 11px}
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
.head {
    padding:2.50%;
    }
.dropdown-content a:hover {
    background-color: #B8860B;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body bgcolor="black">
<div class="header">
<h1><font color="white">Tailor Shop Management</font></h1>
</div>
<div class="navbar">
<a href="cus_det.php">Add Customer</a> 
    <div class="dropdown">
    <button class="dropbtn">Details 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="cusdetail.php">Customer Details</a>
      <a href="pant_detail.php">Pant Details</a>
      <a href="shirtdetail.php">Shirt Details</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Search 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="search.php">About Customer Details</a>
      <a href="searchpant.php">About Pant Details</a>
      <a href="searchshirt.php">About Shirt Details</a>
    </div>
  </div>
  <a href="logout.php">Log out</a>
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
  <div class="text">Caption Three</div>
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
</body>
</html>