<?php 
session_start();
require_once 'php/Model/Persona.php';
require_once 'php/Model/Posibilidad.php';
require_once 'php/Connection/Connection.php';

if(isset($_SESSION['user'])){
	$persona = $_SESSION['user'];
}else{
	header("Location: index.php?msg=3");
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>
    <?php 
      echo $persona['name'];
    ?>
  </title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
  <body>
  
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">
        Bienvenido
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="php/Controller/login.php?msg=1" class="">Cerrar sesion</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="php/Controller/login.php?msg=1" class="">Cerrar sesion</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

   <div class="parallax-container">
      <div class="parallax"><img src="img/background1.jpg"></div>
    </div>
    <div class="section blue-grey lighten-5">
      <div class="row container">
        <h2 class="header">Posibilidades</h2>
        <p class="grey-text text-darken-3 lighten-3">¿Que te gustaria recibir?  <a class="btn-floating btn-small waves-effect waves-light red modal-trigger" href="#modalPosibilidad"><i class="material-icons">add</i></a>
        </p>
         <ul class="collapsible">
          <?php 
            $posibilidad = new Posibilidad();
            $lista = $posibilidad->listar($persona['id']);
            foreach ($lista as $row){
                echo '
    <li>
      <div class="collapsible-header"><i class="material-icons">card_giftcard</i>'.$row->nombre.'</div>
      <div class="collapsible-body"><span>'.$row->descripcion.'</span></div>
    </li>
                ';
            }
          ?>
      </ul>
      </div>
    </div>

  <div class="parallax-container">
      <div class="parallax"><img src="img/background2.jpg"></div>
  </div>
    <div class="section blue-grey lighten-5">
      <div class="row container">
        <h2 class="header">Sorteo</h2>
        <p class="grey-text text-darken-3 lighten-3">¿Que le gustaria recibir a tu amigo 
          <?php 
          $nm = $posibilidad->getFriend($persona['id']);
          if($nm){
            echo $nm->nombre;
          }
          ?>
          ? 
        </p>
          <?php 
            $lista = $posibilidad->listarPosibilidadesAmigo($persona['id']);
            if(count($lista) == 0){
              echo '<p class="grey-text text-darken-3 lighten-3">Aun no se ha realizado el sorteo, habla con Andres';
            }else{
              echo '<ul class="collapsible">';
              foreach ($lista as $row){
                echo '<li>
                        <div class="collapsible-header"><i class="material-icons">card_giftcard</i>'.$row->nombre.'</div>
                        <div class="collapsible-body"><span>'.$row->descripcion.'</span></div>
                      </li>';
            }
              echo '</ul>';
            }
          ?>
      </div>
    </div>

  <div class="parallax-container">
      <div class="parallax"><img src="img/background3.jpg"></div>
  </div>

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Hecho por <a class="brown-text text-lighten-3" href="https://i.pinimg.com/236x/5a/ca/7a/5aca7ad085765c554eb7445082c34799--mickey-mouse-characters-disney-mickey-mouse.jpg">Hector fabio</a>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>


<form id="modalPosibilidad" class="modal" method="POST" action="php/Controller/posibilidad.php">
    <div class="modal-content">
      <h4>Agrega una posibilidad</h4>
       <div class="row">
          <div class="input-field col s12">
            <input name = "nombre" id="nombre" type="text" class="validate" required="true">
            <label for="nombre">nombre</label>
          </div>
        </div>
       <div class="row">
          <div class="input-field col s12">
            <input name = "descripcion" id="descripcion" type="text" class="validate" required="true">
            <label for="descripcion">Descripcion</label>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
        <i class="material-icons right">send</i>
      </button>      
    </div>
</form>
</html>

<?php 
  if(isset($_GET['msg'])){
    if($_GET['msg'] == 1){
      echo '<script type="text/javascript">M.toast({html: "Registrado correctamente", classes: "green"});</script>';
    }
  }
?>