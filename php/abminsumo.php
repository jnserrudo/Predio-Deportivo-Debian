<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos</title>
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
    
    <!-- EDICION INSUMO -->
    <?php
        $conexion = NULL;
        try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['desc']) && isset($_POST['precio']) && isset($_POST['stock'])) 
            {
                $i=$_POST['id'];
                $n=$_POST['nom'];
                $d = $_POST['desc'];
                $p=$_POST['precio'];
                $s=$_POST['stock'];
               
                $sql = "   
                update insumo
                set Nombre='$n', Descripcion='$d', Precio='$p', Stock='$s'
                where Id='$i';
                ";
               
                $resultado=mysqli_query($conexion,$sql);

            }
           
        }catch (PDOException $e){
           echo "Error ".$e->getMessage();
        }

    ?>

    <?php
       $conexion = NULL;
       try{
            $conexion = mysqli_connect('localhost','root','','debian2');
           
            if ( isset($_GET['r'])) {
               
               $r=$_GET['r'];
               
               $sql = "delete from insumo where Id=$r;";
               
               $resultado=mysqli_query($conexion,$sql);
            }
           
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

    ?>


    <!--   ----------------------------   CONTENIDO DE LA PAGINA    -----------------------------------   -->

    <div class="reg" id="reg">
        <div class="cont_vent" id="cont_vent">
            <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
            <p class="txt_registrar" >Registrar Insumo</p>
        
                <div class="registrar" >
                    <label class=label > Nombre:</label> <input type="text" name="txt_nom" required id="nom"> </input>
                    <label class=label > Id Categoria:</label> <input type="text" name="txt_cat" required id="cat"> </input>
                    <label class=label > Precio:</label> <input type="text" name="txt_precio" required id="precio"> </input>
                    <!-- <label class=label > Stock:</label> <input type="text" name="txt_stock" required> </input> -->
                    <label class=label > Descripcion:</label> <textarea name="txt_desc" cols="15" rows="3" id="desc"></textarea>
                        <button class="btnregistrar" id='btnregistrar'> Registrar</button>
                </div>
        </div>       
    </div>

    <div class="main">
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
            include '../includes/panelresponsablecliente.php';

            break;
    }

?>


          <!-- <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div> -->


        <div class="mainmain">
            <p class="textordencompra"> ADMINISTRACION DE INSUMOS  </p>
                  <!-- <div class="buscador">
                    <p class="txtbusq">Buscar</p>
                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                    
                    </div> -->

            <p id="txtconsulta"></p>
            <?php 
                $conexion=mysqli_connect('localhost','root','','debian2');
            ?>

            <?php
            if(isset($_GET['c'])&&isset($_GET['n'])&&isset($_GET['d'])&&isset($_GET['p'])){

                $c=$_GET['c'];
                $n=$_GET['n'];
                $d=$_GET['d'];
                $p=$_GET['p'];
                                                           
                        $sql="INSERT INTO insumo(Id_categoria,Nombre,Descripcion,Precio,Stock)Values('$c','$n','$d','$p','0')";
                        $result=mysqli_query($conexion,$sql);                           
            }
                         
                    
                                                                                                                
                


             ?>
                                                                                    

            <?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
                                                                                   
            <div class="datatable-container">

                <div class="header-tools">
                    <div class="contbtnreg">
                        <button class="btnvent button " id="btnvent">Registrar Nuevo Insumo</button>   
                    </div>
                    <div class="buscador">
                        <p class="txtbusq">Buscar</p>
                        <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                    </div>  
                </div>
                <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                    <thead class="tablaenc">       
                        <th id="idproveedor">Id</th>
                        <th id="empresa">Id_categoria</th>
                        <th id="comercial">Nombre</th>
                        <th id="telefono">Descripcion</th>
                        <th id="telefono">Precio</th>
                        <!-- <th id="telefono">Stock</th> -->
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
    <script src="../js/main.js?v=<?php echo(rand()); ?>"></script>

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/insumos.js?v=<?php  echo(rand()); ?>"></script>

</body>
</html>