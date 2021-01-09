<?php
session_start();

require_once('config/connect.php');

$msg="";

  function prepare($data){
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
  }


if(isset($_POST['submit'])){

  $Unique_id = prepare($_POST['Unique_id']);
  $password = prepare($_POST['password']);

  //$salt = "Bishop Cipher";
  $password = sha1($password);

  $sql = $conn->query("SELECT  * FROM admin WHERE (username='$Unique_id') && Password='$password'") or die(mysqli_error($conn));

  $exist = mysqli_num_rows($sql);
  if($exist>0){

  	$_SESSION['admin']=$Unique_id;

  	header("location:admin.php");
  }else{

  	    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Unique_id number and password do not march.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

}

  ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/css/style.css">
<link rel="stylesheet" type="text/css" href="vendor/css/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.css">
 <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css">
<link rel="icon" href="favicon.png" />
<title>Zahra Community</title>


</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-color: rgb(99 14 126);">
  <a href="#" class="navbar-brand"><i class="fa fa-chart-line"></i> Zahra </a>
  <button class="navbar-toggler mr-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav mr-auto">
  <li class="nav-item" ><a href="index.php" class="nav-link">Home</a></li>
  <li class="nav-item" ><a href="login.php" class="nav-link">Login</a></li>
  <li class="nav-item" ><a href="acctype.php" class="nav-link">Create account</a></li>
  <li class="nav-item" ><a href="index.php" class="nav-link">About us</a></li>
</ul>


<ul class="nav navbar-nav mr-right">
  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i  class="fab fa-facebook"></i></a></li>  
  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i class="fab fa-twitter"></i></i></a></li>  
  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i class="fab fa-instagram"></i></a></li>  
  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i class="fab fa-youtube"></i></a></li>  
  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i class="fab fa-whatsapp"></i></a></li>

  <li class="social-item" style="margin-right: 15px; font-size: 20px;"><a href="#" style="color: #fff"><i class="fab fa-pinterest"></i></a></li>  
</ul>

</div>
</nav>


<div class="container">
<div class="login animated fadeInUp slow">
<div class="mytit"style="background-color: rgb(99 14 126);">
  <h4>USER LOGIN</h4>
</div>

<?php echo $msg; ?>
  <div class="cover">
  <form action="" method="post">
    <p>Enter your Unique ID</p>
    <div class="input-group mb-3">
        
        <div class="input-group-prepend">
           <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
            <input type="text" name="Unique_id" placeholder="E.g: 132345623" class="form-control">
      
                        
    </div>

    <p>Enter your Password</p>
    <div class="input-group mb-3">
        
        <div class="input-group-prepend">
           <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
            <input type="Password" name="password" placeholder="*******" class="form-control">
      
                        
    </div>
<input type="submit" name="submit" class="btn btn-md btn-success mr-auto " style="background-color: rgb(99 14 126);"style="margin: 0 auto" value="Login">


  </form>
  </div>




</div>
</div>

<br />

<div style="background-color: rgb(99 14 126);" class="footer">
  <br />
  <div class="col-md-6 offset-3">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Subscribe to email!" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">@example.com</span>
  </div>
</div>
</div>


<p class="techrald">Website Designed by <strong><a href="https://www.sparkite.tech"><font color="#fff">Sparkite<i class="fa fa-external-link-alt"></i></font></a></strong></p>


</div>




<script type="text/javascript" src="vendor/js/wow.js"></script>
<script type="text/javascript" src="vendor/bootstrap-4.3.1/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/owlcarousel/owl.carousel.js"></script>
<script type="text/javascript" src="vendor/owlcarousel/home.js"></script>


<script>
    new WOW().init();

$(function() {
    $(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);        
    });
});

</script>

</body>
</html> 
