<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Secret Friend</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Amigo secreto</a>
      <ul class="right hide-on-med-and-down">
        <!--<li><a href="#modalRegistro" class="modal-trigger">Registrate</a></li>-->
        <li><a href="#modalLogin" class="modal-trigger">Ingresar</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <!--<li><a href="#modalRegistro" class="modal-trigger">Registrate</a></li>-->
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        
        <div class="row center">
          
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="img/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">ac_unit</i></h2>
            <h5 class="center">Navidad</h5>

            <p class="light">Mi Navidad no necesita árbol ni frío,
            solo el calor de mis seres queridos,
            a los que aprecio todo el año,
            pero disfruto un instante y llenan mi vacío.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Familia</h5>

            <p class="light">Mi familia es numerosa
            Muchos son sus integrantes
            Hay personas cariñosas
            Otros un poco más distantes
            Pero todos en conjunto
            Una familia muy radiante</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">home</i></h2>
            <h5 class="center">Hogar</h5>

            <p class="light">Hogar es aquel en donde te sientes sastisfecho espiritualmente, hogar es aquel donde que esta tu familia y aunque no sea fisciamente existen lazos que la distancia jamas separará.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Hecho por <a class="brown-text text-lighten-3" href="https://i.pinimg.com/236x/5a/ca/7a/5aca7ad085765c554eb7445082c34799--mickey-mouse-characters-disney-mickey-mouse.jpg">Hector fabio</a>
      </div>
    </div>
  </footer>

<form id="modalRegistro" class="modal" method="POST" action="php/Controller/registro.php">
    <div class="modal-content">
       <h4>Registro</h4>
       <div class="row">
          <div class="input-field col s12">
            <input name = "nombre" id="nombre" type="text" class="validate" required="true">
            <label for="nombre">Nombre</label>
          </div>
        </div>
       <div class="row">
          <div class="input-field col s12">
            <input name = "identificacion" id="identificacion" type="text" class="validate" required="true">
            <label for="identificacion">Identificacion</label>
          </div>
        </div>
       <div class="row">
          <div class="input-field col s12">
            <input name = "password" id="password" type="password" class="validate" required="true">
            <label for="password">Password</label>
          </div>
        </div>                        
    </div>    
    <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
        <i class="material-icons right">send</i>
      </button>
    </div>    
</form>


<form id="modalLogin" class="modal" method="POST" action="php/Controller/login.php?msg=2">
    <div class="modal-content">
      <h4>Ingresar</h4>
       <div class="row">
          <div class="input-field col s12">
            <input name ="identificacion" id="identificacion" type="text" class="validate" required="true">
            <label for="identificacion">Identificacion</label>
          </div>
        </div>
       <div class="row">
          <div class="input-field col s12">
            <input name="password" id="password" type="password" class="validate" required="true">
            <label for="password">Password</label>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
        <i class="material-icons right">send</i>
      </button>      
    </div>
</form>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
<?php 
  if(isset($_GET['msg'])){
    if($_GET['msg'] == '2'){
      echo '<script type="text/javascript">M.toast({html: "Credenciales incorrectas", classes: "red"});</script>';
    }else if($_GET['msg'] == '3'){
      echo '<script type="text/javascript">M.toast({html: "Acceso denegado", classes: "red"});</script>';
    }
    else if($_GET['msg'] == '1'){
      echo '<script type="text/javascript">M.toast({html: "Salida exitosa", classes: "green"});</script>';
    }
  }
?>
