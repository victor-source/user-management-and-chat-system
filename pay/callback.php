<?php
session_start();
require_once('../config/connect.php');
require_once('initialize.php');

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
  $sql = "SELECT users.balance,users.savings,users.transaction from users  where users.Unique_id=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$user,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$savings=$result->savings+$ammount;
$balance=$result->balance+$savings;
$transaction=$result->transaction+1;

}
}
$sql = $conn->query("insert into users (Unique_id, Firstname,RegDate, Lastname, Phone, Gender, Password, photo,status,email) values('$Unique_id', '$fname','$date', '$lname', '$phone', '$sex', '$password', '$file','$status','$email')") or die(mysqli_error($conn));
  

  if($sql==true){
    $_SESSION['Unique_id']=$Unique_id;

    header("location: pay/initialize.php");
    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation!</strong> Your account has been successfully created. click <a href="login.php">here </a> to login now
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

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
  echo "<h2>Thank you for making a purchase. Your file has been sent your email.</h2>";
    $_SESSION['Unique_id']=$user;

    //header("location:dashboard.php");
}
}