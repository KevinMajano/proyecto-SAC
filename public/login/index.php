<?php
//Include Configuration File
include('../../app/helpers/config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 



  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}
?>

<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Login SAC</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="../../web/css//style-login.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
  
 <div class="row  login-page">
	   <div class="col-md-12 login-form">
	      <form method="post"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header text-center">
          <img  width="80px" src="../../web/img/imagenes/icono.png"/>
          <h3 class="color-title-login">Institución Educativa </h3>
           <h3 class="mt-4">Acceder a Control de Asistencia</h3>
             <h6 class="color-title-login">Ingresa tu correo y contraseña</h6>
		    </div>
		</div>
		
		<div class="row">
		   <div class="col-md-12 login-from-row pb-0">
       <form>
        <div class="form-group">
          <label class='text-left' for="exampleInputEmail1">Correo</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
          <small id="emailHelp" class="form-text text-muted">Ingrese un correo valido en el sistema.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
        </div>
      </form>
		   </div>
		</div>
		<div class="row">
      <div class="col-sm-12 text-center">
      <a class="btn btn-primary btn-lg btn-block" href="#" role="button">Ingresar</a>
      </div>

		   <div class="col-md-12 login-from-row text-center ">
       <?php
  if($login_button == '')
  {
    header("Location: ../main/index.php");
//    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
//    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
//    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
//    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
//    echo '<h3><a href="../login/logout.php">Logout</h3></div>';
  }
  else
  {
    echo '<button class="btn" type="submit" name="login">'.$login_button.'</button>';
  }
  ?>
		   </div>
		</div>
	    </form>
	</div>
     </div>
  </div>
 </div>
</body>
</html>
