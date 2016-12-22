<?php 
    session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
    include_once "conexion.php"; 
    
    if(isset($_POST['enviar'])){
        $usuario = $_POST['usuario']; 
        $password = $_POST['password'];
        $password = filter_var($password, FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        echo $password;
        if (filter_var($usuario, FILTER_VALIDATE_EMAIL)){
            if($_POST['password'] == $_POST['repassword']){ 
        
            $sql = "INSERT INTO u_p (m_mail,contra_pass) VALUES ('$usuario','$password')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
            mysql_query($sql); 
            echo '<script language="javascript">alert("REGISTRADO");</script>';
            }else{
                echo '<script language="javascript">alert("Contraseñas introducidas no coinciden");</script>';
            };
        }else{
            echo '<script language="javascript">alert("Mail no valido");</script>';
        }
        
    };
?>
<html lang="es">
<head>
<meta charset="utf-8">
<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
       
</head>
<body>
    
    <nav>
        <div class="nav-wrapper">
          <a href="log_out.php" class="brand-logo"><?PHP echo $_SESSION[usuario]?></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Registro</a></li>
            <li><a href="inicializar.php?v=1&pagina=0">Listado</a></li>
            <li><a href="busqueda.php">Busqueda</a></li>
            <li><a href="log-in.php">Log-in</a></li>
          </ul>
        </div>
    </nav>
    <div class="container">
      <br>
      <br>      
    
    <form action="" method="post" class="registro"> 
        <div><label>E-mail:</label> 
        <input type="text" name="usuario"></div> 
        <div><label>Clave:</label> 
        <input type="password" name="password"></div> 
        <div><label>Repetir Clave:</label> 
        <input type="password" name="repassword"></div> 
        <div> 
        <input class="waves-effect waves-light btn-large" type="submit" name="enviar" value="Registrar"></div> 
    </form>
    
    
    </div>

</body>
</html>



 