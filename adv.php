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
    <Marquee Style="Color: Red">==IP OSINT (Advanced)==</Marquee>
    
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
    
stream_context_set_default([
    'ssl' => [
   "verify_peer"=>false,
        "verify_peer_name"=>false,
    
]]);

$Url="https://check.getipintel.net/check.php?ip=".$ip."&contact=duydodokke@gufum.com&format=json";

$location= file_get_contents($Url);

$data= json_decode($location,true);

$dip=$data['queryIP'];
$no=$data['result'];

$msg;

if($no == 1){
    $msg="Yes";
    $msg1="No";
}else{
    $msg="No";
    $msg1="Yes";
}


$ip=htmlspecialchars($_POST['ip']);

$ch = curl_init('http://ipwho.is/'.$ip);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$data = json_decode(curl_exec($ch), true);
curl_close($ch);



echo "</div><Br>";
echo '<br><br><div class="container">
<center style="Color: Blue">[ Entered Ip Details ]</center>
<Br>
<Br>
<Br>
';
echo "<center Style='Color: Green'>";
echo "Target IP : ".$ip."<br><br>";
echo "IP Address Type: ".$data['type']."<br><br>";
echo "Sub-District : " . $data['city']. "<br><br>";
echo "District : " . $data['region'] . "<br><br>";
echo "Continent Code : " . $data['continent_code'] . "<br><br>";
echo "Country Name : " . $data['country'] . "<br><br>";
echo "Country Code: " . $data['country_code'] . "<br><br>";
echo "Region Code : " . $data['region_code'] . "<br><br>";
echo "Latitude: " . $data['latitude'] . "<br><br>";
echo "Longitude: " . $data['longitude'] . "<br><br>";
echo "Postal Code : " . $data['postal'] . "<br><br>";
echo "Calling Code : " . $data['calling_code'] . "<br><br>";
echo "Capital Name : " . $data['capital'] . "<br><br>";
echo "Borders : " . $data['borders'] . "<br><br>";
echo "ASN : " . $data['connection']['asn']."<br><br>";
echo "Organization : " . $data['connection']['org']."<br><br>";
echo "ISP Name : " . $data['connection']['isp']."<br><br>";
echo "Domain Name : " . $data['connection']['domain']."<br><br>";
echo "Timezone Name : " . $data['timezone']['id']."<br><br>";
echo "Current Time : " . $data['timezone']['current_time']."<br><br>";

echo "Country Flag Image : <br><br><img width='40%' height='40%' src"."=". $data['flag']['img']."><br><br>";
echo"Real Ip Status -> ".$msg1."<Br><br>";
echo"Is Target Impostering The Ip -> ".$msg."<Br><br>";
echo"Is The Ip Of Any Vpn Or Tor Relay -> ".$msg."<Br><br>";


echo'</center></div>';

}

?>



