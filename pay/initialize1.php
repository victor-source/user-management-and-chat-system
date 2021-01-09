<?php
session_start();
//error_reporting(0);
require_once('../config/connect.php');

  function prepare($data){
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
  }
  


if(!isset($_SESSION['Unique_id'])){
  header("location:login.php");
}else{

  $user = $_SESSION['Unique_id'];

 
  $query = $conn->query("Select * from users Where Unique_id='$user' || Phone='$user' ");


  $show = mysqli_fetch_array($query);

$curl = curl_init();

$email =$show['email'];
if ($show['request']==1) {
  $amount = 10000;
}
else if ($show['request']==2) {
  $amount = 20000;
}
else if ($show['request']==3) {
  $amount = 30000;
}
else if ($show['request']==4) {
  $amount = 40000;
}
else if ($show['request']==5) {
  $amount = 50000;
}
else if ($show['request']==6) {
  $amount = 60000;
}
else if ($show['request']==7) {
  $amount = 70000;
}
else if ($show['request']==8) {
  $amount = 80000;
}
else if ($show['request']==9) {
  $amount = 90000;
}
else if ($show['request']==10) {
  $amount = 100000;
}
 //the amount in kobo.

// url to go to after payment just for the mean time not deployed yet
$callback_url = 'sparkite.tech';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_live_bb262125865400d630d5552d723484315713899a",
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);
}