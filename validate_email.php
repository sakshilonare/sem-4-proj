<?php
$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    
    exit("invalid format");
    
}

$api_key = "b5f6fa0b8e3e41158116ae604419e6bd";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1/?api_key=b5f6fa0b8e3e41158116ae604419e6bd&email=$email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if ($data['deliverability'] === "UNDELIVERABLE") {
    
    exit("Undeliverable");
    
}

if ($data["is_free_email"]["value"] === true) {
    
  exit("Valid");
  
}
echo "email address is valid";
?>