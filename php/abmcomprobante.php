<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobantes</title>
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
    include '../includes/panel.php'
    ?>

    <div class="mainmain">
        <p class="textordencompra"> COMPROBANTES  </p>
        




        <div class="datatable-container">

            <div class="header-tools">
                <div class="contbtnreg">
                    <button class="btnvent button " id="btnvent">Registrar Nuevo Comprobante</button>   
                </div>
                <div class="buscador">
                    <p class="txtbusq">Buscar</p>
                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>

                </div>  
            </div>
            <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                <thead class="tablaenc">       
                    <th id="idproveedor">Id</th>
                    <th id="empresa">Nombre del proveedor</th>
                   <!-- <th id="comercial">Id_comprobante</th>  -->
                    <th id="telefono">Fecha</th>
                    <th id="telefono">Estado</th>
                    <th id="telefono">Monto</th>
                    <th id="telefono">Letra</th>
                    <th id="telefono">Id_orden_compra</th>
                    <th id="telefono">Tipo</th>
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
        </div>


            <!-- hice -->
              <!-- lo de abajo estaba mas abajo -->

              <div class="reg" id="ventordpagomonto">
                                        <div class="cont_vent cont_vent_ordpagomonto" id="cont_ordpagomonto">
                                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagomonto">
                                           
                                            <p class="txt_registrar" >Monto a Pagar</p>
                                            <div class="texto_inputventmonto">
                                                         <p class="txtventmonto">Id de Orden:</p>
                                                     <input type="text inputventmonto" id="inputidorden11">  <!-- le puse 11-->
                                                </div>
                                            
                                            <div class="texto_inputventmonto">
                                                     <p class="txtventmonto">Total de la Orden $</p>
                                                     <input type="text inputventmonto" id="inputidordentotal">
                                                </div>
                                            
                                            <div class="texto_inputventmonto">
                                                     <p class="txtventmonto"> Pagar $</p>
                                                     <input type="text inputventmonto" id="inputmonto">
                                                </div>                                        
                                            <button id="btnaceptarmonto">Aceptar</button>
        <!--  -->
                                                                                                                                                            
                                                                                                                                                        
                                           </div>
                            </div>
             <!-- hasta aqui -->
<!-- ventana emergente factura -->

<div class="reg" id="ventcomp">
                        <div class="cont_vent cont_ventcomp" id="cont_ventcomp">
                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarcomp">
                            <div class="divtipocomprobante">
                                <div class="encabezadotipocomprobante">
                                    <p class="txt_registrar nomtipo" >Factura</p>
                                    <div class="contidorden">
                                                 <p class='txtinfoprov'>Orden: </p>

                                                <input type="text" class="inputidorden" id="inputidorden">   
                                            </div>
   
                                </div>
                                <div class="continfoproveedor">
                                    <!-- fecha calculada con js -->
                                  <!--  <p id="infotxt"></p> -->
                                    <p class="txttituloprov">Datos del Proveedor</p>
                                    <div class="infoproveedor">
                                        <p class="txtinfoprov">Proveedor</p><input type="text" id="nomprov" class="inputprov">
                                        <p class="txtinfoprov">Direccion</p><input type="text" id="dirprov" class="inputprov">
                                        <p class="txtinfoprov">Telefono</p><input type="text" id="telprov" class="inputprov">
                                        <p class="txtinfoprov">Correo</p><input type="text" id="correoprov" class="inputprov">
                                    </div>
                                </div>
                                    <div class="tabla_total">

                                    
                                            <div class="datatable-container-remito dt-container-comp">
                                                                <table id="tablaremito" class="table table-striped datatable table-bordered border-primary">
                                                                                <thead>       
                                                                                    <th id="">Orden</th>
                                                                                    <th id="">Insumo</th>
                                                                                    <th id="">Descripcion</th>
                                                                                    <th id="">Precio Unitario</th>
                                                                                </thead>
                                                                                                                        <!-- <?php
                                                                                    ?> -->
                                                                </table>
                                                                        <!-- <div class="pages">
                                                                            <ul>
                                                                                <li> <button id="btnpag6">1</button></li>
                                                                                <li><button id="btnpag7">2</button></li>
                                                                                <li><button id="btnpag8">3</button></li>
                                                                                <li><button id="btnpag9">4</button></li>
                                                                                <li><button id="btnpag10">5</button></li>
                                                                                </ul>

                                                                    </div> -->      
                                                                    
                                                                       
                                            </div>
                                            <div class="total">
                                                <p class="txtinfoprov">TOTAL: <input type="text" class="inputtotal" readonly id="inputtotal">$</p>
                                            </div>
                                    </div>        
                            </div>  
                            <button class="btnvent" style="visibility: none;">Registrar Comprobante</button>                
                        </div>      
                        
                       
                </div>
  <!-- lo de arriba estaba mas abajo pero lo borre-->




              <!--  hasta aqui-->

    <div class="reg" id="ventordpago"> 
             <div class="cont_vent cont_vent_ordpagodetalle" id="cont_ordpago_detalle">
             <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagodetalle">
                                                            <div class="datatable-container-ord-pago-detalle">                                   
                                                                                          <table id="tablaordpago" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead class="tablaenc">       
                                                                                                    <th id="id_col_op1">Orden de Compra</th>
                                                                                                    <th id="id_col_op2">Total de la Orden</th>
                                                                                                    
                                                                                                    <th id="id_col_op3">Monto a pagar</th>
                                                                                                    <th id="id_col_op4">Accion</th>
                                                                                                </thead>
                                                                                               
                                                                                              </table>
                                                                                              <!-- <div class="pages">
                                                                                                         <ul>
                                                                                                            <li> <button id="btnpag1">1</button></li>
                                                                                                            <li><button id="btnpag2">2</button></li>
                                                                                                             <li><button id="btnpag3">3</button></li>
                                                                                                            <li><button id="btnpag4">4</button></li>
                                                                                                              <li><button id="btnpag5">5</button></li>
                                                                                                               </ul>
                                                                                                         </div> -->
                                                                                              </div>
                                                                                              <div class="desc_btnconf">
                                                                                              <label class='label labeldesc' > Descripcion:</label> <textarea name="txt_desc" id="desc" cols="30" rows="3"></textarea> 

                                                                                              </div>
                                                                                              <button class="btnvent button btnconfordpago" id="btnconfordpago">Confirmar Orden de Pago</button>
             </div>

             </div>
<!-- lo de abajo lo pongo arriba-->             
                   <!-- Hasta aquiiiiiii-->
                                                                                       
    </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    <script src="../js/abmcomprobante.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/comprobante_pag.js?v=<?php  echo(rand()); ?>"></script>
</body>
</html>