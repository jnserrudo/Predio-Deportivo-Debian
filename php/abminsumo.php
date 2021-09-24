<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="f"  class="forminsumo">
                <div class="registrar" >
                    <label class=label > Nombre:</label> <input type="text" name="txt_nom" required> </input>
                    <label class=label > Id Categoria:</label> <input type="text" name="txt_cat" required> </input>
                    <label class=label > Precio:</label> <input type="text" name="txt_precio" required> </input>
                    <label class=label > Stock:</label> <input type="text" name="txt_stock" required> </input>
                    <label class=label > Descripcion:</label> <textarea name="txt_desc" id="" cols="15" rows="3"></textarea>
                    <input type="submit" name="registrar" value="Registrar"  class="btnregistrar">
                </div>
            </form>
        </div>       
    </div>

    <div class="main">
    <?php
    include '../includes/panel.php'
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
            $x=0;
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                ?>
                <!-- CAMBIE TODOS LOS EMPTY A ISSET EN LOS IF -->
                <?php                                                
                if (!isset($_POST["txt_nom"])) {
                    $nameErr = "Name is required";
                    $_POST["txt_nom"]=array();
                    $x=1;
                
                } else {
                    $txt_nom = test_input($_POST["txt_nom"]);
                }
                    
                if (!isset($_POST["txt_cat"])) {
                    $catErr = "Email is required";
                    $_POST["txt_cat"]=array();
                    $x=1;
                
                } else {
                    $txt_cat= test_input($_POST["txt_cat"]);
                }
                    
                if (!isset($_POST["txt_desc"])) {
                    $_POST["txt_desc"] = array();
                    $x=1;
                
                } else {
                    $txt_desc = test_input($_POST["txt_desc"]);
                }
                    
                if (!isset($_POST["txt_precio"])) {
                    $_POST["txt_precio"] = array();
                    $x=1;
                
                } else {
                    $txt_precio = test_input($_POST["txt_precio"]);
                }
                    
                if (!isset($_POST["txt_stock"])) {
                    
                    $x=1;
                    $_POST["txt_stock"]=array();
                
                } else {
                    $txt_stock = test_input($_POST["txt_stock"]);
                }
                    
                if ($x==0) {
                    
                    $txt_cat=$_POST['txt_cat'];
                    $txt_nom=$_POST['txt_nom'];
                    $txt_desc=$_POST['txt_desc'];
                    $txt_precio=$_POST['txt_precio'];
                    $txt_stock=$_POST['txt_stock'];
                    
                    $comprobardato = mysqli_query($conexion,"select * from insumo where Nombre = '$txt_nom' ");
                    if(mysqli_num_rows($comprobardato)>0)
                    {
                    }
                    else
                    {                                                         
                        $sql="INSERT INTO insumo(Id_categoria,Nombre,Descripcion,Precio,Stock)Values('$txt_cat','$txt_nom''$txt_desc','$txt_precio','$txt_stock')";
                        $result=mysqli_query($conexion,$sql);
                        $_SESSION['inserted_db'] = FALSE;                                                                
                    }
                    unset($comprobardato);
                    unset($_POST['txt_cat']);
                    unset($_POST['txt_nom']);
                    unset($_POST['txt_desc']);
                    unset($_POST['txt_precio']);
                    unset($_POST['txt_stock']);
                                                                                                                
                }


            } ?>
                                                                                    

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
                        <th id="telefono">Stock</th>
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
    <script src="../js/main.js?v=<?php echo(rand()); ?>"></script>

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/insumos.js?v=<?php  echo(rand()); ?>"></script>

</body>
</html>