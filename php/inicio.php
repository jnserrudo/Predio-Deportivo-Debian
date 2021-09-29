<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
</head>
<body>
    
<?php

$conexion = NULL;
    try{

      $conexion = mysqli_connect('localhost','root','','debian2');

        if (isset($_GET['x'])) {
            $x = $_GET['x'];

            $sql = "SELECT r.Rol 
            FROM usuario as u
            inner join rol_usuario as ru on ru.Id_usuario=u.Id
            inner join rol as r on ru.Id_rol=r.Id
            where u.Id=$x
             ";

            $resultado=mysqli_query($conexion,$sql);
        
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['usuario']=$resultados[0][0];
        }
        
 
        
    }catch (PDOException $e){
        echo "Error ".$e->getMessage();
    }
    // session_start();
?>

<header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <p class="usuario" ><?php echo $_SESSION['usuario']?></p>
            <div class="logo_usuario">
                <img src="../assets/imagenes/logousuario.png" alt="">
            </div>
            <button class="btnlogin" id="btnsesion"> <p class="text">CERRAR SESION</p> </button>
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>
    <div class="main" style="background-image:url(../assets/imagenes/iconos/iniciooo.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">

<?php
include '../includes/panel.php'
?>














    </div>

    <!-- <footer class="footer">
        nasheeeeeeeeee




























        
        
    </footer>     -->



























    <footer class="w-100 footer d-flex  align-items-center justify-content-start flex-wrap">
        <!-- <p class="fs-5 px-3  pt-3">ExpertD. &copy; Todos Los Derechos Reservados 2021</p> -->
        <div id="iconos" class="iconos" >
            <!-- logos -->
            <div class="conticono">
               <img src="../assets/imagenes/iconos/face.png" class="icono" alt=""> DEBIANfc 
            </div>

            <div class="conticono">
                <img src="../assets/imagenes/iconos/ig.png" class="icono" alt=""> @DEBIANfc
            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/tel.png" class="icono" alt=""> 4229-7600

            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/gmail.png" class="icono" alt=""> Debian@gmail.com.ar
            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/map.png" class="icono" alt=""> Av. Mitre 470 (1870).

            </div>
                 
        </div>
        <p class="frasefooter"> Mas que un club... <br> una Familia</p>  

        <p class="text_debsw"> Desarrollado por Debian Software <br> &copy Derechos Reservados</p>
      </footer>
    <!-- <p id="rol" ><?php  //echo $_SESSION['usuario'] ?> </p> -->
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/login.js?v=<?php //echo(rand()); ?>"></script> -->

</body>
</html>