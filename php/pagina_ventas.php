<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/abmcomprobantes.css?v=<?php echo(rand()); ?>">

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
        include '../includes/panelresponsablecliente.php';

            break;
    }

?>
    <div class="mainmain">
        <p class="textordencompra"> VENTAS</p>

        
        <div class="datatable-container">

             <div class="header-tools">
             <div class="contbtnreg">
                 <button class="btnvent" id="btnirregventas">Registrar Venta</button>     
                                                                                              </div>
              <div class="buscador">
                                                                            <p class="txtbusq">Buscar</p>
                                                                            <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
      
                 </div>  
                 <!-- <div class="contbtnreg"> -->
                     <!-- <button class="btnvent btnverordenes" id="btnverordenes">Ver todas las Ordenes</button>      -->
                <!-- </div> -->


             </div>

              <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                    <thead>       
                        <th id="Id">Venta</th>
                        <th id="Fecha">Fecha</th>
                        <!-- <th id="Id_proveedor">Nombre del Deposito</th>   -->
                        <th id="accion">Total</th>      
                                                                                                                        
                        <th id="accion">Acción</th>      
                    </thead>
                  </table>
                  <div class="pages">
                             <ul>
                                <li> <button id="btnpag1">1</button></li>
                                <li><button id="btnpag2">2</button></li>
                                 <li><button id="btnpag3">3</button></li>
                                <li><button id="btnpag4">4</button></li>
                                  <li><button id="btnpag5">5</button></li>
                                   </ul>
                             </div>
                  <!--<button>Ant</button><button>Sig</button> -->
                  </div>



                  <!-- ventana emergente mostrando detalles de la orden seleccionado -->
                  <div class="reg" id="ventventa">
                        <div class="cont_vent cont_ventcomp" id="cont_ventventa">
                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarventa">
                            <div class="divtipocomprobante">
                                <div class="encabezadotipocomprobante">
                                    <p class="txt_registrar nomtipo" id="txttipo">Venta</p>
                                    <p id="txtfecha" class="txttituloprov">Fecha:</p>

                                    <div class="contidorden">
                                                 <p class='txtinfoprov'>Nro de Venta: </p>

                                                <input type="text" class="inputidorden" id="inputventa">   
                                            </div>
   
                                </div>
                                <div class="continfoproveedor">
                                    <!-- fecha calculada con js -->
                                  <!--  <p id="infotxt"></p> -->
                                    <p class="txttituloprov" id="nomdeposito"></p>
                                    
                                </div>
                                    <div class="tabla_total">

                                    
                                            <div class="datatable-container-remito dt-container-comp">
                                                                <table id="tablaventadetalle" class="table table-striped datatable table-bordered border-primary">
                                                                                <thead>       
                                                                                   <!-- <th id="">Orden</th>  -->
                                                                                    <th id="">Insumo</th>
                                                                                    <th id="">Cantidad</th>
                                                                                </thead>                                                                                    
                                                                </table>
                                                                                                                                                                                                          
                                            </div>
                                            <div class="total">
                                                <p class="txtinfoprov">TOTAL: $<input type="text" class="inputtotal" readonly id="inputtotal"></p>
                                            </div>
                                    </div>        
                            </div>  
                            <!-- <button class="btnvent" style="visibility: none;">Registrar Comprobante</button>                 -->
                        </div>                                                    
                  </div>
<!-- fin ventana emergente -->

        


                                                                                          

    </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/pagina_ventas.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/paginacion_ventas.js?v=<?php echo(rand()); ?>"></script>
</body>
</html>