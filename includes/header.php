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
<title>Zahra - Dashboard</title>


</head>
<body>

<nav class="navbar fixed-top navbar-expand-sm navbar-light sticky" style="    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: rgb(99 14 126);">
  <a href="index.php" class="navbar-brand"><i class="fa fa-chart-line"></i> Zahra  </a>
  <button class="navbar-toggler mr-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav mr-auto">

  <li class="nav-item" ><a href="index.php" class="nav-link">Home</a></li>
  <li class="nav-item" ><a href="logout.php" class="nav-link">Logout</a></li>
  <?php if ($show['Status']==0) {
    ?>
    <li class="nav-item" ><a href="#" class="nav-link red">Status: <?php echo "Pending"; }else{?></a></li>
    <li class="nav-item" ><a href="#" class="nav-link red">Status: <?php echo "Active"; }?></a></li>

     <li class="nav-item dropdown">
        <a class="nav-link"href="quotes.php">Messages
          <i class="far fa-comments"></i></a></li>
    

</ul>