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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="Post">

<Br>
    <Marquee Style="Color: Red">==Forward GEOCODER==</Marquee>
    
      <Br> <Br>   

<center style="Color: Blue">Creator: Nil Roy</center>


    <Br>    
<div class="row">
    <div class="col-25">
      <label for="fname">Enter Address:</label>
    </div>
  
<div class="col-75">
      <input type="text" id="fname" name="la" placeholder="Enter Address :" required>
    </div>
  </div>
  

  <br>
  <div class="row">
    <input type="submit" value="Submit" name="sub">
  </div>
  </form>
</div>

</body>
</html>



<?php


if(isset($_POST['sub'])){
$la=htmlspecialchars($_POST['la']);

$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

$token = '675d36e9bd0c3689391835cxl5d6c9c';

$url = "https://geocode.maps.co/search?q={$la}&api_key=675d36e9bd0c3689391835cxl5d6c9c";

$response = file_get_contents($url,false,$context);
$data = json_decode($response, true);


echo "</div><Br>";
echo '<br><br><div class="container">
<center style="Color: Blue">[ Co-ordinate Details ]</center>
<Br>
<Br>
<Br>
';
echo "<center Style='Color:Red'>";
echo "Target Address : ".$la."<br><br>";
echo "Latitude : ".$data[1]['lat']."<br><br>";
echo "Longtitude : ".$data[1]['lon']."<br><br>";

echo "Road Map : <br><Br><Br>";
echo '<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=280&amp;height=300&amp;hl=en&amp;q='.$la.'&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://embed-googlemap.com">google map embed html</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:300px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:300px;}.gmap_iframe {height:300px!important;}</style></div>';


echo'</center></div>';

}
?>
