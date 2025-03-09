<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="Color: Black; Background-color: Red">

<div class="container">
    <br>

    <div id="ip-details">
        <p>Fetching IP details...</p>
    </div>
</div>

<script>
$(document).ready(function() {
    // Fetch the user's IP address using ipify
    $.get("https://api.ipify.org?format=json", function(data) {
        // Send the fetched IP address to the server
        $.post("", { ip: data.ip }, function(response) {
            // Display the response from the server
            $('#ip-details').html(response);
        });
    });
});
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ip'])) {
    $ip = htmlspecialchars($_POST['ip']);

    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $token = '2922250a3b334d6f9b12cf7cf6068af0'; // Replace with your actual API key
    $url = "http://api.findip.net/{$ip}/?token={$token}";

    $response = file_get_contents($url, false, $context);
    $data = json_decode($response, true);

    echo "<div class='container'>";
    echo "<center style='Color: Blue'>[ IP Details for: $ip ]</center><br><br>";
    echo "<center style='Color: Red'>";
    echo "City Name: " . ($data['city']['names']['en'] ?? 'Not available') . "<br><br>";
    echo "Continent Code: " . ($data['continent']['code'] ?? 'Not available') . "<br><br>";
    echo "Country Name: " . ($data['country']['names']['en'] ?? 'Not available') . "<br><br>";
    echo "Latitude: " . ($data['location']['latitude'] ?? 'Not available') . "<br><br>";
    echo "Longitude: " . ($data['location']['longitude'] ?? 'Not available') . "<br><br>";
    echo "Time Zone: " . ($data['location']['time_zone'] ?? 'Not available') . "<br><br>";
    echo "Weather Code: " . ($data['location']['weather_code'] ?? 'Not available') . "<br><br>";

    if (isset($data['subdivisions'])) {
        foreach ($data['subdivisions'] as $subdivision) {
            if (isset($subdivision['names']['en'])) {
                echo "Subdivision Name: " . $subdivision['names']['en'] . "<br><br>";
            }
        }
    } else {
        echo "Subdivision Name: Not available<br><br>";
    }

    echo "Autonomous System Number: " . ($data['traits']['autonomous_system_number'] ?? 'Not available') . "<br><br>";
    echo "Autonomous System Organization: " . ($data['traits']['autonomous_system_organization'] ?? 'Not available') . "<br><br>";
    echo "Connection Type: " . ($data['traits']['connection_type'] ?? 'Not available') . "<br><br>";
    echo "ISP: " . ($data['traits']['isp'] ?? 'Not available') . "<br><br>";
    echo "User  Type: " . ($data['traits']['user_type'] ?? 'Not available') . "<br><br>";
    echo '</center></div>';
}
?>

</body>
</html>