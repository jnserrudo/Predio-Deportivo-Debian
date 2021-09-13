<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos de stocks</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
</head>
<body>
        
<?php

$conexion = NULL;
    try{

      $conexion = mysqli_connect('localhost','root','','debian2');

        if (isset($_GET['x'])) {
            $x = $_GET['x'];


            // echo $c;
            // if(!$c=""){
            $sql = "SELECT r.Rol 
            FROM usuario as u
            inner join rol_usuario as ru on ru.Id_usuario=u.Id
            inner join rol as r on ru.Id_rol=r.Id
            where u.Id=$x
             ";
            // }else{
            //   $sql = "SELECT * FROM insumo";
        }
        


        // $resultado=mysqli_query($conexion,$sql);
        
        // $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
        // session_start();
        // $_SESSION['usuario']=$resultados[0][0];


        
        
    }catch (PDOException $e){
        echo "Error ".$e->getMessage();
    }
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
        <!-- <img src="../assets/imagenes/NOTCIAS 4.jpg" class="aa" alt=""> -->
        <!-- <img src="../assets/imagenes/fondodebian (1).png" class="fondoimg" alt=""> -->
        

        <div class="side-navbar  d-flex justify-content-between flex-wrap flex-column sidebar" id="sidebar">
            <ul class="nav flex-column text-white w-100">
              <a href="#" class="nav-link h3 text-white my-2">
                Areas
              </a>
              <li href="#" class="nav-link lis" id="irinsumo">
                <span class="mx-2">Insumos</span>
              </li>
              <li href="#" class="nav-link lis" id="irproveedores">
                <span class="mx-2">Proveedores</span>
              </li>
              <li href="#" class="nav-link lis" id="irorden">
                <span class="mx-2">Ventas</span>
                <li href="#" class="nav-link lis" id="irmov">
                <span class="mx-2">Movimientos Stock</span>
              </li>
            </ul>
          </div>

          <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              <!-- <i class="bx bx-menu "></i> -->
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div>



                <div class="di">
                    
                </div>









    </div>
























        
        
    



























    <footer class="w-100 footer d-flex  align-items-center justify-content-start flex-wrap">
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
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    
</body>
</html>