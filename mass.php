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
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">

<Br>
    <Marquee Style="Color: Red">==IP Tracker (Bulk)==</Marquee>
    
      <Br> <Br>   

<center style="Color: Blue">Creator: Nil Roy</center>


    <Br>    
<div class="row">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="Post">

  <Br>
    <div class="col-75">
<textarea name="urls" rows="5" spellcheck="false" wrap="off" placeholder="Enter IPs Here" required></textarea>
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

$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

if(isset($_POST['sub']) && !empty($_POST['urls'])){

$token = 'b02246bf00f045d4b0a5968617544507';

 $name=htmlspecialchars($_POST['name']);
 $urls=htmlspecialchars($_POST['urls']);
  $url1=trim($urls);
 $url=explode("\r\n",$url1);
 $size=count($url);
$url=array_unique($url);
 

if($size <= 100){
echo'<Br><Br><div class="container"><center Style="Color: Blue">Results</center><Br><Br><Br>';
 for($x=0;$x<$size;$x++){

$ip=$url[$x];
  $ul = "http://api.findip.net/{$ip}/?token={$token}";

$ch = curl_init($ul);
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $ul);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $content = curl_exec($ch);
  curl_close($ch);
 
$data = json_decode($content, true);

echo '<center style="color: Black">'.$ip.' ['.$data['country']['names']['en'].']</center><br>';

}
}

else{
      echo'<Br><Br><div class="container"><br><Br><Br><center Style="Color: Blue">Only 100 IPS Are Allowed At A Time !</center><Br><Br><Br>';
}
}else{
      echo'<Br><Br><div class="container"><br><Br><Br><center Style="Color: Blue">You Can Submit 100 IP Address Max To Check ! Demo Result: 197.89.78.9 [India]</center><Br><Br><Br>';
}


?>


