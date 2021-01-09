<?php
session_start();
//error_reporting(0);
require_once('config/connect.php');
include_once("db.php");

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
$Unique_id=intval($_GET['stid']);

 
  $query = $conn->query("Select * from users Where Unique_id='$Unique_id' || Phone='$Unique_id' ");


  $show = mysqli_fetch_array($query);
$Unique_id=intval($_GET['stid']);


  $query2 = $conn->query("Select * from mess Where Unique_id='$Unique_id' ");


  $show1 = mysqli_fetch_array($query2);


 
if (isset($_POST['submit'])) {
                    $msg = $_POST['msg'];
                    $diff = 0 ;
                    $date = date("d-m-yy");
                    if (empty(trim($msg))) {
                      
                    }
                    else{
                    $sql ="INSERT INTO mess(Unique_id, dated, msg, diff)VALUES(:Unique_id, :dated, :msg, :diff)";
                     if($stmt = $pdo->prepare($sql)){
                    //Bind parameters
                     $stmt->bindParam(':Unique_id', $Unique_id, PDO::PARAM_STR);
                    $stmt->bindParam(':dated', $date, PDO::PARAM_STR);

                    $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
                    $stmt->bindParam(':diff', $diff, PDO::PARAM_STR);
                    if($stmt->execute()){
                     echo "<script>window.reload(); </script>";
                    }
                     }
                      }
                    }

}

  function dateDiff($date1, $date2){
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
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
<title>Zahra - Dashboard</title>


</head>
<div id="preloder">
   <div class="loader"></div>
</div>
<body>

<nav class="navbar fixed-top navbar-expand-sm navbar-light sticky" style="    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: rgb(99 14 126);">
  <a href="index.php" class="navbar-brand"><i class="fa fa-chart-line"></i> Zahra  </a>
  <button class="navbar-toggler mr-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav mr-auto">

  <li class="nav-item" ><a href="admin.php" class="nav-link">Home</a></li>
  <li class="nav-item" ><a href="logout.php" class="nav-link">Logout</a></li>
  <?php if ($show['Status']==0) {?>
    <li class="nav-item" ><a href="#" class="nav-link red">Status: <?php echo "Pending"; }else{?></a></li>
    <li class="nav-item" ><a href="#" class="nav-link red">Status: <?php echo "Active"; }?></a></li>
          <li class="nav-item dropdown">
        <a class="nav-link"href="quotes.php">Messages
          <i class="far fa-comments"></i>
                                                 
            <?php
            $user = $show['Unique_id'];
             $sql1 ="SELECT * from mess where Unique_id=$user ";
            $query1 = $dbh -> prepare($sql1);
            $query1->execute();
            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
            $totalrows=$query1->rowCount();
            ?>
          <span class="badge badge-danger navbar-badge"><?php echo htmlentities($totalrows);?></span>
        </a>
        
      </li>
    

</ul>

</div>
</nav>
<br/>
<br/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
  <head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
  </head>
  <!--Coded With Love By Mutiullah Samim-->
  <body>
    <style type="text/css">
        body,html{
      height: 100%;
      margin: 0;
      background: #7F7FD5;
         background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
          background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }

    .chat{
      margin-top: auto;
      margin-bottom: auto;
    }
    .card{
      height: 500px;
      border-radius: 15px !important;
      background-color: rgba(0,0,0,0.4) !important;
    }
    .contacts_body{
      padding:  0.75rem 0 !important;
      overflow-y: auto;
      white-space: nowrap;
    }
    .msg_card_body{
      overflow-y: auto;
    }
    .card-header{
      border-radius: 15px 15px 0 0 !important;
      border-bottom: 0 !important;
    }
   .card-footer{
    border-radius: 0 0 15px 15px !important;
      border-top: 0 !important;
  }
    .container{
      align-content: center;
    }
    .search{
      border-radius: 15px 0 0 15px !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
    }
    .search:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .type_msg{
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
      height: 60px !important;
      overflow-y: auto;
    }
      .type_msg:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .attach_btn{
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .send_btn{
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .search_btn{
      border-radius: 0 15px 15px 0 !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .contacts{
      list-style: none;
      padding: 0;
    }
    .contacts li{
      width: 100% !important;
      padding: 5px 10px;
      margin-bottom: 15px !important;
    }
  .active{
      background-color: rgba(0,0,0,0.3);
  }
    .user_img{
      height: 70px;
      width: 70px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    
    }
    .user_img_msg{
      height: 40px;
      width: 40px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    
    }
  .img_cont{
      position: relative;
      height: 70px;
      width: 70px;
  }
  .img_cont_msg{
      height: 40px;
      width: 40px;
  }
  .online_icon{
    position: absolute;
    height: 15px;
    width:15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 0.2em;
    right: 0.4em;
    border:1.5px solid white;
  }
  .offline{
    background-color: #c23616 !important;
  }
  .user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
  }
  .user_info span{
    font-size: 20px;
    color: white;
  }
  .user_info p{
  font-size: 10px;
  color: rgba(255,255,255,0.6);
  }
  .video_cam{
    margin-left: 50px;
    margin-top: 5px;
  }
  .video_cam span{
    color: white;
    font-size: 20px;
    cursor: pointer;
    margin-right: 20px;
  }
  .msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: purple;
    color: white;
    padding: 10px;
    position: relative;
  }
  .msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
  }
  .msg_time{
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_head{
    position: relative;
  }
  #action_menu_btn{
    position: absolute;
    right: 10px;
    top: 10px;
    color: white;
    cursor: pointer;
    font-size: 20px;
  }
  .action_menu{
    z-index: 1;
    position: absolute;
    padding: 15px 0;
    background-color: rgba(0,0,0,0.5);
    color: white;
    border-radius: 15px;
    top: 30px;
    right: 15px;
    display: none;
  }
  .action_menu ul{
    list-style: none;
    padding: 0;
  margin: 0;
  }
  .action_menu ul li{
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 5px;
  }
  .action_menu ul li i{
    padding-right: 10px;
  
  }
  .action_menu ul li:hover{
    cursor: pointer;
    background-color: rgba(0,0,0,0.2);
  }
  @media(max-width: 576px){
  .contacts_card{
    margin-bottom: 15px !important;
  }
  }
    .profile-p{
    width:100px; 
    margin:auto; 
    margin-top: 3px;
    margin-bottom: 3px;
    height:100px;
    border-radius:50%; 
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    margin-left: 30%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    
  }
  p{
    color: white;
    margin-left: 13px;
  }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
$('#action_menu_btn').click(function(){
  $('.action_menu').toggle();
});
  });
    </script>
    <div class="container-fluid h-100">
      <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
          
          <div class="card-body contacts_body">
            <img src="<?php echo $show['photo']; ?>"  class='profile-p'>
            <hr>
            <p>Name: <strong><?php echo $show['firstname']; echo " "; echo $show['Lastname']; ?></strong></p>
            <p>Unique Id: <strong><?php echo $show['Unique_id'];?></strong></p>
            <p>Email: <strong><?php echo $show['email'];?></strong></p>
            <p>Phone Number: <strong><?php echo $show['phone'];?></strong></p>
          </div> 
            <p>Balance: <strong>N<?php echo $show['savings'];?></strong></p>
          <div class="card-footer"></div>
        </div></div>
        <div class="col-md-8 col-xl-6 chat">
          <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="<?php echo $show['photo']; ?>" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span>Chat with <?php echo $show['username'];?></span>
                  <p>1767 Messages</p>
                </div>
                <div class="video_cam">
                  <span><i class="fas fa-phone"></i></span>
                </div>
              </div>
              <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu">
                <ul>
                  <li><i class="fas fa-user-circle"></i> <a href='profile.php'>View profile</a></li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body msg_card_body">

            <!--start of admin -->  
            <?php
                $sql ="SELECT * from mess where Unique_id=$user ";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {
                  if (($result-> diff)==1) {
                   
                ?>
              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="profile/avatar.png" class="rounded-circle user_img_msg">
                </div>
              
                <div class="msg_cotainer">
                  <?php echo htmlentities($result->msg); ?>
                  <span class="msg_time"> <?php  echo htmlentities($result->dated); ?></span>
                </div>
              </div>
              <!-- end of admin -->
            <?php  } else{?>
              <!-- start of user -->
              <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                 <?php  echo htmlentities($result->msg); ?>
                  <span class="msg_time_send"><?php  echo htmlentities($result->dated); ?></span>
                </div>
                <div class="img_cont_msg">
              <img src="<?php echo $show['photo']; ?>" class="rounded-circle user_img_msg">
                </div>
              </div><!-- end of user -->
              <?php $cnt = $cnt+1; }}} ?>
              <div class="input-group">
                


                <form action="" method="post">
                  <div class="row" style="margin:10px;">
                    
                <textarea name="msg" class="form-control type_msg" placeholder="Type your message..." style="width: 100%"></textarea>
             
             <!-- <input type="file" name="file" style="" class="input-group-text "> -->
                  <input type="submit" name="submit" value="send" class="btn btn-primary" style="background-color: purple; margin-top: 10px; border: solid purple; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
                
              </div>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript" src="vendor/js/wow.js"></script>
<script type="text/javascript" src="vendor/bootstrap-4.3.1/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/owlcarousel/owl.carousel.js"></script>
<script type="text/javascript" src="vendor/owlcarousel/home.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('a[data-toggle="tab"]') .on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});


</script>
<script>
  function myFunction(){
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }
    new WOW().init();
  

$(function() {
    $(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);        
    });
});

</script>
<style>
/* Preloder */

#preloder {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 999999;
  background: #000;
}

.loader {
  width: 40px;
  height: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -13px;
  margin-left: -13px;
  border-radius: 60px;
  animation: loader 0.8s linear infinite;
  -webkit-animation: loader 0.8s linear infinite;
}

@keyframes loader {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    border: 4px solid #f44336;
    border-left-color: transparent;
  }
  50% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
    border: 4px solid #673ab7;
    border-left-color: transparent;
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
    border: 4px solid #f44336;
    border-left-color: transparent;
  }
}

@-webkit-keyframes loader {
  0% {
    -webkit-transform: rotate(0deg);
    border: 4px solid #f44336;
    border-left-color: transparent;
  }
  50% {
    -webkit-transform: rotate(180deg);
    border: 4px solid #673ab7;
    border-left-color: transparent;
  }
  100% {
    -webkit-transform: rotate(360deg);
    border: 4px solid #f44336;
    border-left-color: transparent;
  }
}
</style>
<script>
  function myFunction(){
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }
    new WOW().init();
  

$(function() {
    $(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);        
    });
});</script>
<script>
'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas__menu__wrapper").addClass("show__offcanvas__menu");
        $(".offcanvas__menu__overlay").addClass("active");
    });

    $(".canvas__close, .offcanvas__menu__overlay").on('click', function () {
        $(".offcanvas__menu__wrapper").removeClass("show__offcanvas__menu");
        $(".offcanvas__menu__overlay").removeClass("active");
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    /*------------------
    Navigation
  --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Carousel Slider
    --------------------*/
    var hero_s = $(".hero__slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*------------------
        Testimonial Slider
    --------------------*/
    $(".testimonial__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            }
        }
    });

    /*------------------
        Radio btn
    --------------------*/
    $(".pricing__swipe-btn label").on('click', function (e) {
        $(".pricing__swipe-btn label").removeClass("active");
        $(this).addClass("active");

        if(e.target.htmlFor == 'month') {
            $(".yearly__plans").removeClass('active');
            $(".monthly__plans").addClass('active');
        } else if (e.target.htmlFor == 'yearly') {
            $(".monthly__plans").removeClass('active');
            $(".yearly__plans").addClass('active');
        }     
    });
    /*------------------
        Achieve Counter
    --------------------*/
    $('.achieve-counter').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

</script>
</body>
</html>