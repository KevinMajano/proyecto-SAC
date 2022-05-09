<?php
#se requieren los archivos de la conexion, validacion y componentes una unica vez
require_once('../../app/models/database.class.php');
require_once('../../app/helpers/validator.class.php');
require_once('../../app/helpers/component.class.php');
#Se crea la clase Page y se hereda los elementos de Component
class Page extends Component
{
  public static function templateHeader($title)
  {
    session_start();
    if(isset($_SESSION['access_token'])){
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
		
		<div class='wrapper d-flex align-items-stretch'>
			<nav id='sidebar'>
				
              <div class='row pt-5'>
               <div class='col col-sm-5'>
                 <a href='../main/' class='img logo mb-5 ml-2' style='background-image: url(../../web/img/imagenes/icono.png);'></a>
               </div>
                <div class='col col-sm-7'>
                  <h4 class='font-weight-bold title-dashboard'>Dashboard control de asistencia</h4>
                </div>
              </div>

          <div class='p-4'>
          <ul class='list-unstyled components mb-5'>
	          <li>    
              <a href='../teachers/'><span><img src='../../web/img/imagenes/image4.png' width='30px'><span/><span class='ml-3'>Profesores</span></a>	            
	          </li>
            <li>
            <a href='../grades/'><span><img src='../../web/img/imagenes/image3.png' width='30px'><span/><span class='ml-3'>Grados</span></a>	            
            </li>
             <li>
             <a href='../students/'><span><img src='../../web/img/imagenes/image1.png' width='30px'><span/><span class='ml-3'>Alumnos</span></a>	            
	          </li>
	          <li>
            <a href='../faults/'><span><img src='../../web/img/imagenes/image3.png' width='30px'><span/><span class='ml-3'>Faltas de conducta</span></a>	            
	          </li>
            <li>
            <a href='../students_faults/'><span><img src='../../web/img/imagenes/image3.png' width='30px'><span/><span class='ml-3'>Asignar falta de conducta</span></a>	            
	          </li>
            <li>
            <a href='../assistance/'><span><img src='../../web/img/imagenes/old-man.png' width='30px'><span/><span class='ml-3'>Asistencia</span></a>	            
	          </li>
	        </ul>
    
          <div class='footer'>  
          <a rel='license' href='http://creativecommons.org/licenses/by-nc-sa/4.0/'><img alt='Licencia de Creative Commons' style='border-width:0' src='https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png' /></a><br />Este obra está bajo una <a rel='license' href='http://creativecommons.org/licenses/by-nc-sa/4.0/'>licencia de Creative Commons Reconocimiento-NoComercial-CompartirIgual 4.0 Internacional</a>
	        </div>

	      </div>
    	</nav>

      <!-- Page Content  -->
      <div id='content' class='p-2'>

        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
          <div class='container-fluid'>

            <button type='button' id='sidebarCollapse' class='btn btn-primary'>
              <i class='fa fa-bars'></i>
              <span class='sr-only'>Toggle Menu</span>
            </button>
            <button class='btn btn-dark d-inline-block d-lg-none ml-auto' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <i class='fa fa-bars'></i>
            </button>
            <h4 class='ml-2'>$title</h4>
            <div class='collapse navbar-collapse dropleft' id='navbarSupportedContent'>
              <ul class='nav navbar-nav ml-auto'>
              <h6 class='mr-3 mt-3'>".$_SESSION['user_first_name']."</h6>

              <div class='dropdown show'>
              <img src='".$_SESSION["user_image"]."' width='50px' class='dropdown-toggle img logo rounded-circle' id='dropdownMenuLink' data-toggle='dropdown'>

              <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
              <a class='dropdown-item' href='../login/logout.php'>Logout</a>
              </div>
            </div>              
              </ul>
            </div>
          </div>
        </nav>
  ");
    }else{
      header("Location: ../login/");
    }
    #Se añade codigo html dentro de las etiquetas de php, esto lo haremos con un print
   
  }

  public static function templateFooter()
  {
    print("  
    </div>
		</div>
  </body>   
<script src='../../web/js/jquery-3.4.1.min.js'></script>     
<script src='../../web/js/bootstrap.min.js'></script>
<script src='../../web/js/popper.js'></script>
<script src='../../web/js/main.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
<script src='../../web/js/script.js'></script>
</body>
</html>
		");
  }
}


// <li class='active'>
// <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>Home</a>
// <ul class='collapse list-unstyled' id='homeSubmenu'>
//   <li>
//       <a href='#'>Home 1</a>
//   </li>
//   <li>
//       <a href='#'>Home 2</a>
//   </li>
//   <li>
//       <a href='#'>Home 3</a>
//   </li>
// </ul>
// </li>