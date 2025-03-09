<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 0;
  display : inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
cursor: pointer;
  float: right;
  
}

input[type=submit]:hover {
  background-color: #45a049;
}

a:link, a:visited {
  
background-color: #04AA6D;
color: white;
    width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  text-decoration: none;
  text-align:Center;
  display: inline-block;
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

a:hover, a:active {
  background-color: #45a049;
}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  
  
}
</style>
</head>
<body style="Color: Black;Background-color:Red">



    <div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">

<Br>
    <Marquee Style="Color: Red">==IP OSINT Toolkits==</Marquee>
    
      <Br> <Br>   

<center style="Color: Blue">Creator: Maloy Roy Orko</center>


    <Br>    

  

  <br>
  <div class="row"><a href="basic.php">IP Tracker (Basic)</a>
  </div>
  
  <br>

  <div class="row">
   <a href="adv.php">IP OSINT (Advanced)</a>
  </div>
  
  <br>

  <div class="row">
 <a href="mass.php">Mass IP Tracker</a>
  </div>
  <br>


  <div class="row">
 <a href="lat.php">Co-ordinates To Address</a>
  </div>
  <br>
  
  <div class="row">
 <a href="for.php">Address To Co-ordinates</a>
  </div>
  <br>
<!--
  <div class="row">
 <a href="#"></a>
 </div>
 <br>
  <div class="row">
 <a href="#">Google Map Tools</a>
 </div>
<br>
 
  <div class="row">
 <a href="#">GPS Tracker</a>
 </div>
<br>
  <div class="row">
 <a href="#">Grabber Tools</a>
 </div>
<br>

  <div class="row">
 <a href="check.php">Proxy/Tor Node Checker Tools(Basic)</a>
 </div>
<br>
-->
  <div class="row">
 <a href="own.php">Own Checker</a>
 </div>
<br>
 
  </form>
  

</div>

<div id="frame" style="width: 100%;"><iframe data-aa='2383453' src='//acceptable.a-ads.com/2383453' style='border:0px; padding:0; width:100%; height:100%; overflow:hidden; background-color: transparent;'></iframe><a style="display: block; text-align: right; font-size: 12px" id="frame-link" href="https://aads.com/campaigns/new/?source_id=2383453&source_type=ad_unit&partner=2383453">Advertise here</a></div>
</body>
</html>



