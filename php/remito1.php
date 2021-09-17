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
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>

</head>

<body>

    <header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <p class="usuario" ><?php //echo $_SESSION['usuario']?></p>
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
        
        <!-- MENU DE NAVEGACION ------------------------------------------->

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
                <span class="mx-2">Compras</span>
               
              </li>
              <li href="#" class="nav-link lis" id="irventas">
                <span class="mx-2">Ventas</span>
                <!-- falta ventas -->
              </li>
              <li href="#" class="nav-link lis" id="irremitos">
                <span class="mx-2">Remitos</span>
              </li>
              <li href="#" class="nav-link lis" id="irmov">
                <span class="mx-2">Movimientos de Stock</span>
              </li>
              <li href="#" class="nav-link lis" id="irsocios">
                <span class="mx-2">Socios</span>
              </li>
            </ul>
          </div>

          <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              <!-- <i class="bx bx-menu "></i> -->
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div>


        <?php

        include("configcomprobante/confg.php");//incluye la conexion

        //OBTIENE LAS ORDENES DE COMPRA
       
        $SQLordencompra = $conexion->prepare("SELECT orden.Id, orden.Fecha,proveedor.Nombre FROM orden, proveedor WHERE orden.Id_proveedor=proveedor.Id
        ");
        $SQLordencompra->execute();
        $listaordenes=$SQLordencompra->fetchAll(PDO::FETCH_ASSOC); 
        //------------------------
        // print_r($_POST);//solo los muestra para ver si se envian

        $txtcodremito=(isset($_POST['txt_cod_remito']))?$_POST['txt_cod_remito']:"";  //RECEPCIONA LOS DATOS
        $txtfecha=(isset($_POST['date_fec_remito']))?$_POST['date_fec_remito']:"";
        $txtIDorden=(isset($_POST['txtIDorden']))?$_POST['txtIDorden']:"";
        $txtProveedor=(isset($_POST['txt_proveedor']))?$_POST['txt_proveedor']:"";

        $accion=(isset($_POST['accion']))?$_POST['accion']:""; //determina que boton se apreto
        
                //verifica que boton se selecciono
        switch($accion)
        {
            case "Siguiente":

                //EL BOTON SIGUIENTE HACE UN INSERT Y VA A LA OTRA PAGINA
                $SQLinsertaremito = $conexion->prepare("INSERT INTO remito (`cod_remito`, `id_orden`, `fecha`) VALUES (:codremito, :idorden, :fecha)");
                $SQLinsertaremito->bindParam(':codremito',$txtcodremito);
                $SQLinsertaremito->bindParam(':idorden',$txtIDorden);
                $SQLinsertaremito->bindParam(':fecha',$txtfecha);
                $SQLinsertaremito->execute();

                header('Location: comprobante.php');

                break;

            case "Seleccionar":
                //EL BOTON SELECCIONAR LLENA LOS CAMPOS EN EL FORMULARIO 
                $SQLseleccionarorden = $conexion->prepare("SELECT orden.Id,proveedor.Nombre from orden,proveedor WHERE orden.Id=:idorden and orden.Id_proveedor=proveedor.Id");
                $SQLseleccionarorden->bindParam(':idorden',$txtIDorden);
                $SQLseleccionarorden->execute();
                $ordenseleccionada=$SQLseleccionarorden->fetch(PDO::FETCH_LAZY);
                
                $txtIDorden=$ordenseleccionada['Id'];
                $txtProveedor=$ordenseleccionada['Nombre'];
                break;
        }
        ?>

        <!--        CUERPO DEL PROGRAMA ----------------------------------->

        <div class="container">
            <div class="row">
                
                <div class="col-md-7">
                    <div class="alert alert-dismissible alert-light">
                        <label for="txt_orden_remito">Seleccione la Orden de Compra a la que corresponde el remito:</label>
                    </div>                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaordenes as $orden) 
                            {?>                      
                            <tr>
                                <td><?php echo $orden['Id'];?></td>
                                <td><?php echo $orden['Fecha'];?></td>

                                <td><?php echo $orden['Nombre'];?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="txtIDorden" id="tctIDorden" value="<?php echo $orden['Id']; ?>"/>
                                        <!--<input type="sumit" name="accion" value="Seleccionar" class="btn btn-info"/>-->
                                        <button type="submit" class="btn btn-info" name="accion" value="Seleccionar">Seleccionar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            Datos del Remito
                        </div>
                        <div class="card-body">
                            <form method="POST" action="remito_copy.php">
                                <div class="form-group">
                                    <label for="txtIDorden">Orden de Compra:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtIDorden; ?>" name ="txtIDorden" id="txtIDorden" readonly="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txt_proveedor">Proveedor:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtProveedor; ?>" name ="txt_proveedor" id="txt_proveedor" readonly="">
                                </div>
                                <br>
                                <div class = "form-group">
                                    <label for="txt_cod_remito">Codigo del Remito:</label>
                                    <input type="text" class="form-control" name ="txt_cod_remito" id="txt_cod_remito" placeholder="Ingrese el codigo del remito">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="date_fec_remito">Fecha de Recepcion:</label>
                                    <input type="date" class="form-control" name ="date_fec_remito" id="date_fec_remito" >
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="accion" value="Siguiente">Siguiente</button>
                                <!-- <button id="verremitos" class="btn btn-primary" >Ver Remitos</button> -->
                            </form>
                            <button id="verremitos" class="btn btn-primary" style="margin-top: 20px;" >Ver Remitos</button>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <?php

  if(isset($_GET["btn_cancelar"])){
    $conexion = mysqli_connect('localhost','root','','debian2');
      $p=$_SESSION['codigo_remito'];
    $sql="delete from remito_detalle where Id_rem=$p";                                                                                      
    $result=mysqli_query($conexion,$sql);
    $sql="delete from remito where Id=$p";                                                                                      
    $result=mysqli_query($conexion,$sql);

  }

?>


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
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
<script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
<script src="../js/remito1.js"></script>
</body>
</html>