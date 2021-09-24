<?php session_start(); ?>
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>


<header class="header">
        <div class="logo">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <button class="btnlogin"> <p class="text">CERRAR SESION</p> </button>

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>
    
    <div class="main">
    <div class="mainmain">
        <p class="textordencompra">Seleccione los Productos</p>
   
    <!--<h1 class="text_form">Seleccione Productos</h1>-->


    <?php  
    try{$conexion = mysqli_connect('localhost','root','','debian2');

    }
    catch(PDOException $e){
        echo "Error ".$e->getMessage();
    }
    $conexion = mysqli_connect('localhost','root','','debian2');
    
    ?>

    <div class="datatable-container-remito-productos">

    <div class="activar" id="reg">
   
    <div class="row">
        <div class="col-md-6">
   
            <div class="buscador">
                <p class="txtbusq">Buscar:</p> <input type="text" id="busqueda_remito" class="busqueda" name="busqueda_remito"> </input>
            </div>
            <br>     
            <div class="lbl_cantidad">

                <label class="text_form">Cantidad:</label> <input type="text" id="txt_cantidad" name="txt_cantidad">
        
            </div>
            <br>
        </div>
        <div class="col-md-6">
            <div>
                <h3 class="h3_rem">Productos del Remito</h3>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="tablasss">
                <div class="div_insumo">
                    <table id="tablainsumo"class="table table-striped datatable table-bordered border-primary" >
                        <thead class="tablaenc">
                            <th id="">Id</th>
                            <th id="">Id_categoria</th>
                            <th id="">Nombre</th>
                            <th id=""> Descripcion</th>
                            <th id=""> Precio</th>
                            <th id=""> Stock</th>
                           <!-- <th id=""> Cantidad</th>-->
                            <td id=""> Accion </td>
                        </thead>
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
                </div>
            </div>
        </div>
     
        <?php
            if(isset($_POST['accion'])){
                $t=$_POST["txt_cod_remito"]; //codigo remito
                $_SESSION["codigo_remito"]=$t;
                $o=$_POST["txtIDorden"]; //codigo oreden
                $f=$_POST["date_fec_remito"]; //fecha
                     
            
            $sql="INSERT INTO remito(Id,Id_Orden,Fecha)Values($t,$o,'$f')";
           $result=mysqli_query($conexion,$sql);
        }   
          ?>
          
        <?php
            if(isset($_GET['m'])){ //si se selecciono un producto
           
                $remito=$_SESSION["codigo_remito"];
           
                $m=$_GET["m"];//m es el id del insumo

                $cantidad=$_GET["cantidad"];
                $sql="INSERT INTO remito_detalle(Id_remito,Id_insumo,Cantidad)Values($remito,$m,'$cantidad')";                                                 $result=mysqli_query($conexion,$sql);
            }   
          ?>
        
        <div class="col-md-6">
            
                <table id="tablaremito" class="table table-striped datatable table-bordered border-primary">
                    <thead class="tablaenc">
                        <tr>
                            <th id="">Id</th>
                            <th id="">Id_Remito</th>
                            <th id="">Nombre del Insumo</th>
                            <th id="">Cantidad</th> 
                        </tr>          
                        
                    </thead>
                    <?php 
                    if(isset($_SESSION["codigo_remito"])){
                        $mostrar_rem=$_SESSION["codigo_remito"];
                        $sql1="SELECT remito_detalle.Id,Id_remito,Nombre,Cantidad 
                   FROM remito_detalle  
                   INNER JOIN insumo
                   ON remito_detalle.Id_insumo = insumo.Id
                   where remito_detalle.Id_remito=$mostrar_rem";
                    $result=mysqli_query($conexion,$sql1);
                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $mostrar['Id'] ?></td>
                        <td><?php echo $mostrar['Id_remito'] ?></td>
                        <td><?php echo $mostrar['Nombre'] ?></td> <!--id_insumo -->
                        <td><?php echo $mostrar['Cantidad'] ?></td>
                    </tr>
                    <?php
                    }

                    } ?>  
                </table>
                <div class="pages">
                    <ul>
                        <li><button id="btnpaga">1</button></li>
                        <li><button id="btnpagb">2</button></li>
                        <li><button id="btnpagc">3</button></li>
                        <li><button id="btnpagd">4</button></li>
                        <li><button id="btnpage">5</button></li>
                    </ul>
                </div>
        
            <div class="formu">
                <form method="get" action="remito1.php">
                    <input class="btn btn-primary" type="submit"id="btn_cancelar" name="pagina"value="cancelar">
                    <input type="submit"id="btn_remito" class="btn btn-primary" value="confirmar"> 
                </form>
            </div>
        </div>

</div>
    </div>
    </div>
    </div>
    </div>




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
    <script src="../js/mov_stock_remito.js"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>  
    <script src="../js/paginaciones/remitoproductos.js?v=<?php  echo(rand()); ?>"></script>
    <script src="../js/paginaciones/productosdelremito.js?v=<?php  echo(rand()); ?>"></script> 
                                  

</body>

</html>