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
    <Marquee Style="Color: Red">==IP Tracker (Basic)==</Marquee>
    
      <Br> <Br>   

<center style="Color: Blue">Creator: Nil Roy</center>


    <Br>    
<div class="row">
    <div class="col-25">
      <label for="fname">Victim IP Address :</label>
    </div>
  
<div class="col-75">
      <input type="text" id="fname" name="ip" placeholder="Enter Victim's Ip" required>
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
$ip=htmlspecialchars($_POST['ip']);

$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

$token = '2922250a3b334d6f9b12cf7cf6068af0';
//14ce65e35ddc44089721102697ab9ef4

$url = "http://api.findip.net/{$ip}/?token={$token}";

$response = file_get_contents($url,false,$context);
$data = json_decode($response, true);


echo "</div><Br>";
echo '<br><br><div class="container">
<center style="Color: Blue">[ Entered Ip Details ]</center>
<Br>
<Br>
<Br>
';
echo "<center Style='Color:Red'>";
echo "Target IP: ".$ip."<br><br>";
echo "City Name: " . $data['city']['names']['en'] . "<br><br>";
echo "Continent Code: " . $data['continent']['code'] . "<br><br>";
echo "Country Name: " . $data['country']['names']['en'] . "<br><br>";
echo "Latitude: " . $data['location']['latitude'] . "<br><br>";
echo "Longitude: " . $data['location']['longitude'] . "<br><br>";
echo "Time Zone: " . $data['location']['time_zone'] . "<br><br>";
echo "Weather Code: " . $data['location']['weather_code'] . "<br><br>";

foreach ($data['subdivisions'] as $subdivision) {
    if (isset($subdivision['names']['en'])) {
        echo "Subdivision Name: " . $subdivision['names']['en'] . "<br><br>";
    }
}

echo "Autonomous System Number: " . $data['traits']['autonomous_system_number'] . "<br><br>";
echo "Autonomous System Organization: " . $data['traits']['autonomous_system_organization'] . "<br><br>";
echo "Connection Type: " . $data['traits']['connection_type'] . "<br><br>";
echo "ISP: " . $data['traits']['isp'] . "<br><br>";
echo "User Type: " . $data['traits']['user_type'] . "<br><br>";


echo'</center></div>';

}
?>
