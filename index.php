<?php 

session_start();
if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']['tipo']=="0"){
        header('Location: Admin/');
    } else if ($_SESSION['usuario']['tipo']=="1"){
        header('Location: User/');
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
      body{
        background-image: url("assets/img/bg-1.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #66999;
      }
    </style>
		<title>Nutrition | Lobby</title>
	</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><dt style="color: rgb(255,100,0,.800);">Fair Nutrition | Team <i style="color: rgb(0,255,0,.900);" class="fas fa-leaf"></i></dt></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" id="Home" href="#"><i class="fas fa-home"></i> Home </a>
      <a class="nav-item nav-link active" id="Login" href="#"><i class="far fa-user"></i> Sing in</a>
    </div>
  </div>
</nav>

<div id="formularios"> <!-- AQUI VA TODO LO QUE SE VA A CARGAR  -->
  
</div>

</body>
	<script src="assets/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/7c16ed7041.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#formularios').load('assets/html/Home.html');
    })
     $('#Login').click(function(){
        $('#formularios').load("assets/html/Sing.html");
    });
    $('#Home').click(function(){
        $('#formularios').load("assets/html/Home.html");
    });
    
    
  </script>
</html>