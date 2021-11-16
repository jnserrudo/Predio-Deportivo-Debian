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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">

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



        <?php

        include("configcomprobante/confg.php");//incluye la conexion

        date_default_timezone_get();
        $fechaactual = date("Y-m-d");

        //OBTIENE LAS ORDENES DE COMPRA
       
        $SQLordenescomp = $conexion->prepare("SELECT orden.Id, orden.Fecha,proveedor.Nombre FROM orden, proveedor WHERE orden.Id_proveedor=proveedor.Id
        ");
        $SQLordenescomp->execute();
        $todaslasordenes=$SQLordenescomp->fetchAll(PDO::FETCH_ASSOC);
        
        $ordenes_x_pagina = 6;
        $total_resultados = $SQLordenescomp->rowCount();
        $paginas = $total_resultados/$ordenes_x_pagina;
        $paginas= ceil($paginas);
        //-------------------- LAS ORDENES DE COMPRA CON LIMIT
        if($_GET['pagina']=="cancelar"){
            header('Location:remito1.php?pagina=1');
        }

        if(!$_GET){
            header('Location:remito1.php?pagina=1');
            $inicio=$ordenes_x_pagina;
        }
        else{
            $inicio=($_GET['pagina']-1)*$ordenes_x_pagina;
        }


        $SQLordencompra = $conexion->prepare("SELECT orden.Id, orden.Fecha,proveedor.Nombre FROM orden, proveedor WHERE orden.Id_proveedor=proveedor.Id LIMIT :iniciar,:articulosxpag");
        $SQLordencompra->bindParam(':iniciar',$inicio, PDO::PARAM_INT);
        $SQLordencompra->bindParam(':articulosxpag',$ordenes_x_pagina,PDO::PARAM_INT);
        $SQLordencompra->execute();
        $listaordenes=$SQLordencompra->fetchAll(PDO::FETCH_ASSOC);

        //--------------------

        /*$txtcodremito=(isset($_POST['txt_cod_remito']))?$_POST['txt_cod_remito']:"";  //RECEPCIONA LOS DATOS
        $txtfecha=(isset($_POST['date_fec_remito']))?$_POST['date_fec_remito']:"";*/
        $txtIDorden=(isset($_POST['txtIDorden']))?$_POST['txtIDorden']:"";
        $txtProveedor=(isset($_POST['txt_proveedor']))?$_POST['txt_proveedor']:"";

        $accion=(isset($_POST['accion']))?$_POST['accion']:""; //determina que boton se apreto
        
                //verifica que boton se selecciono
        switch($accion)
        {
            case "Siguiente":

                //EL BOTON SIGUIENTE HACE UN INSERT Y VA A LA OTRA PAGINA
                /*
                $SQLinsertaremito = $conexion->prepare("INSERT INTO remito (`cod_remito`, `id_orden`, `fecha`) VALUES (:codremito, :idorden, :fecha)");
                $SQLinsertaremito->bindParam(':codremito',$txtcodremito);
                $SQLinsertaremito->bindParam(':idorden',$txtIDorden);
                $SQLinsertaremito->bindParam(':fecha',$txtfecha);
                $SQLinsertaremito->execute();

                header('Location: comprobante.php');*/

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

        <div class="mainmain">
        <p class="textordencompra">RECEPCIÓN DE REMITOS</p>


        <div class="container">
            <div class="row">
                
                <div class="col-md-7">
                    <div class="alert alert-dismissible alert-light">
                        <label for="txt_orden_remito">Seleccione la Orden de Compra a la que corresponde el remito:</label>
                    </div>                
                   
                    <div class="datatable-container-remito">

                    <table class="table table-striped datatable table-bordered border-primary">
                        <thead class="tablaenc">
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
                                        <button type="submit" class="btneditar" name="accion" value="Seleccionar">Elegir</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="pages">
                        <ul>
                            <?php for($i=0;$i<$paginas;$i++){ ?>
                            <li>
                                <a id="btnpag1" class="link-boton" href="remito1.php?pagina=<?php echo $i+1 ?>">
                                <?php echo $i+1 ?>
                            </a>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            Datos del Remito
                        </div>
                        <div class="card-body">
                            <form  >
                                <div class="form-group">
                                    <label for="txtIDorden">Orden de Compra:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtIDorden; ?>" name ="txtIDorden" id="txtIDorden" readonly="" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txt_proveedor">Proveedor:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtProveedor; ?>" name ="txt_proveedor" id="txt_proveedor" readonly="" required>
                                </div>
                                <br>
                                <div class = "form-group">
                                    <label for="txt_cod_remito">Codigo del Remito:</label>
                                    <input type="number" class="form-control" id="txt_cod_remito" placeholder="Ingrese el codigo del remito" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="date_fec_remito">Fecha de Recepcion:</label>
                                    <input type="date" class="form-control" value="<?php echo ($fechaactual);?>" id="date_fec_remito" readonly > 
                                </div>
                                <br>
                                <!-- <button type="submit" id="verremitos" class="btn btn-primary" >Ver Remitos</button> -->
                            </form>
                            <button id="btnsiguiente"  class="btnvent button " >Siguiente</button>
                            <br>
                            <button id="verremitos" class="btnvent button " style="margin-top: 20px;" >Ver Remitos</button>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <?php

if(isset($_GET["btn_cancelar"]))
{
    $conexion = mysqli_connect('localhost','root','','debian2');
    $p=$_SESSION['codigo_remito'];
    $sql="delete from remito_detalle where Id_rem=$p";                                                           $result=mysqli_query($conexion,$sql);
    $sql="delete from remito where Id=$p";                                                               $result=mysqli_query($conexion,$sql);
}

?>


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
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/remito1.js?v=<?php echo(rand()); ?>"></script>
<!--<script src="../js/paginaciones/remito.js?v=<?php  //echo(rand()); ?>"></script>-->


</body>
</html>