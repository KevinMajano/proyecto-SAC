<?php
#se requieren los archivos de la conexion, validacion y componentes una unica vez
require_once('../../app/models/database.class.php');
require_once('../../app/helpers/validator.class.php');
require_once('../../app/helpers/component.class.php');
#Se crea la clase Page y se hereda los elementos de Component
class Page extends Component{
	public static function templateHeader($title){
    session_start();
    #Se añade codigo html dentro de las etiquetas de php, esto lo haremos con un print
      print("
      <!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <link rel='stylesheet' href='../../web/css/bootstrap.min.css'>
          <link rel='stylesheet' href='../../web/css/bootstrap-grid.min.css'>
          <link href='../../web/css/bootstrap-datetimepicker.css' rel='stylesheet'>
          <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
          <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet'>
          <link rel='stylesheet' href='../../web/css/style.css'>
          <script src='../../web/js/sweetalert.min.js'></script>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
         
      
          <title>Ejemplo cruds-$title</title>
      </head>
      <body>   

      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <a class='navbar-brand' href='#'>Dashboard</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>

  <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
    <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
      <li class='nav-item active'>
        <a class='nav-link' href='../main/index.php'>Inicio <span class='sr-only'>(current)</span></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../teachers/index.php'>Profesores</a>
      </li>
    </ul>
  </div>
</nav>
  ");	

	}

	public static function templateFooter(){
		print("     
<script src='../../web/js/jquery-3.4.1.min.js'></script>     
<script src='../../web/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<script src='../../web/js/script.js'></script>
</body>
</html>
		");
	}
}
?>

