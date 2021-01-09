<?php
require_once('../config/connect.php');
require_once('initialize1.php');

 
if(!isset($_SESSION['Unique_id'])){

  header("location:login.php");
}else{

  $user = $_SESSION['Unique_id'];

 
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_live_bb262125865400d630d5552d723484315713899a",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
$query = $conn->query("Select * from users Where Unique_id='$user' || Phone='$user' ");
$show = mysqli_fetch_array($query);
$savings = $show['savings'];
$new_ammount = $ammount/10000;
$savings = $savings+$new_ammount;
$balance = $show['balance'];
$balance = $balance + $savngs;

$transaction=$show['transaction']+1;

}


$sql="update users set savings=:savings,balance=:balance,transaction=:transaction where Unique_id=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':savings',$savings,PDO::PARAM_STR);
$query->bindParam(':transaction',$transaction,PDO::PARAM_STR);
$query->bindParam(':balance',$balance,PDO::PARAM_STR);
$query->bindParam(':stid',$user,PDO::PARAM_STR);
$query->execute();
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
  echo "<h2>Thank you for making a purchase. a document has been sent your email.</h2>";
    header("location: /../dashboard.php");
}
