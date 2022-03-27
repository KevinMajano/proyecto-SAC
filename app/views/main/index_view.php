<?php
  print('
  <div class="container">
  <div class="row text-center">
    <div class="panel-body">
    <img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />
    <h3><b>Nombre del usuario :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>
    <h3><b>Correo :</b> '.$_SESSION['user_email_address'].'</h3>
    <h3><a href="../login/logout.php">Logout</a></h3></div>
  </div>
</div>
  ');
?>

<!-- echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
  echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
  echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
  echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
  echo '<h3><a href="../login/logout.php">Logout</h3></div>'; -->
