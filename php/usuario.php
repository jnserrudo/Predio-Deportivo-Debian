<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">

    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">
</head>
<body>
<?php
    session_start()
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
            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>


    
<div class="main">
<!-- que el main contenga al include -->
<?php
    switch ($_SESSION['usuario']){
        case 'Encargado de Deposito':
             include '../includes/panelencdeposito.php';
            break;
        case 'Administrador':
            include '../includes/panel.php';
            break;
        case 'Encargado de Ventas':
            include '../includes/panelencventas.php';
            break;
        case 'Responsable de Atencion al Cliente';
            break;
    }

    // eliminacion de un usuario
    
       $conexion = NULL;
       try{
            $conexion = mysqli_connect('localhost','root','','debian2');
           
            if ( isset($_GET['r'])) {
               
               $r=$_GET['r'];
               
               $sql = "delete from usuario where Id=$r;";
               
               $resultado=mysqli_query($conexion,$sql);
            }
           
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

    

?>

    <div class="mainmain">
        <p class="textordencompra"> Usuarios  </p>
        <!--   ini  -->
        <div class="datatable-container">

                <div class="header-tools">
                    <div class="contbtnreg">
                        <!-- <button class="btnvent button " id="btnvent">Registrar Nuevo Usuario</button>    -->
                    </div>
                    <div class="buscador">
                        <p class="txtbusq">Buscar</p>
                        <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                    </div>  
                </div>
                <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                    <thead class="tablaenc">       
                        <th id="idproveedor">Id</th>
                        <th id="empresa">Nombre</th>
                        <th id="comercial">Apellido</th>
                        <th id="telefono">Correo</th>
                        <th id="telefono">DNI</th>
                        <th id="telefono">Direccion</th>
                        <th id="telefono">Usuario</th>
                        <th id="telefono">Fecha de registro</th>
                        <th id="telefono">Rol</th>


                        <th id="telefono">Accion</th>
                    </thead>
                    <!-- <tbody>
                    </tbody> -->
                </table>
                <div class="pages">
                    <ul>
                        <li><button id="btnpag1">1</button></li>
                        <li><button id="btnpag2">2</button></li>
                        <li><button id="btnpag3">3</button></li>
                        <li><button id="btnpag4">4</button></li>
                        <li><button id="btnpag5">5</button></li>
                    </ul>
                </div>
                <!--<button>Ant</button><button>Sig</button> -->
            </div>





    </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/abmusuario.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/usuario.js?v=<?php echo(rand()); ?>"></script>
    
</body>
</html>