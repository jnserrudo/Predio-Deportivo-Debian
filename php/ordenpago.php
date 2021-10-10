<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes de Pago</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleordenpagos.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/comprobantes.css?v=<?php echo(rand()); ?>">

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
<p class="textordencompra"> ORDENES DE PAGO  </p>




<?php 

// Registrar en la tabla orden de paga usando el id 
$conexion = mysqli_connect('localhost','root','','debian2');
if (isset($_GET['ido'])&& isset($_GET['mp'])&& isset($_GET['d'])) {
  $id = $_GET['ido'];
  $mp=$_GET['mp'];
  $d=$_GET['d'];

      $id=explode(',',$id);
      $mp=explode(',',$mp);

  $sql = "INSERT INTO ordenpago (Descripcion) values ('$d')";

  $resultado=mysqli_query($conexion,$sql);

  // Registrar detalle de la orden ------------
  $consultaidorden = "select Id from ordenpago order by Id desc limit 1";
  $idorden=mysqli_query($conexion,$consultaidorden);
  $resultados=mysqli_fetch_all($idorden,PDO::FETCH_ASSOC);
  

        // insercion
        $i=0;
        ?>
        <?php

        while($i<count($id)){
      

            
            $resultados1=$resultados[0][0];
            // $rqs1=$rqs[0][0];
            $id1=$id[$i];
            $mp1=$mp[$i];

                  
            $sql = "INSERT INTO ordenpago_detalle (Id_orden_pago, Id_comprobante, Monto) values ($resultados1,$id1,$mp1);";
            
            //ejemplo de insert 
            //INSERT INTO orden_detalle (Id_orden, Id_insumo, Precio, Cantidad) values (2,1,2,3);
            
            $resultado=mysqli_query($conexion, $sql);
            $i=$i+1;
        }

        
}
            
            
            
            
            
        ?>
                  

                    <p id="txtconsulta">
                     
                    

                    </p>


                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');

                                                              ?>





                                                                          
                                                                  
<!-- ventana emergente del detelle de la orden de compra -->

<!-- idcomp ,  monto a pagar,tipo, mas la accion, el boton dira quitar -->


<div class="reg" id="ventordpago">
             <div class="cont_vent cont_vent_ordpagodetalle" id="cont_ordpago_detalle">
             <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagodetalle">
                                        <div class="datatable-container-ord-pago-detalle">

                                       
                                                  <table id="tabla_ordpago" class="table table-striped datatable table-bordered border-primary">
                                                        <thead class="tablaenc">       
                                                            <th id="id_col_op1">Comprobante</th>
                                                            <th id="id_col_op2">Total</th>
                                                            
                                                            <th id="id_col_op3">Tipo</th>
                                                            <th id="id_col_op3">Letra</th>

                                                            <th id="id_col_op4">Accion</th>
                                                        </thead>
                                                       
                                                      </table>
                                                    
                                                      </div>
                                                      <div class="desc_btnconf">
                                                      <label class='label labeldesc' > Descripcion:</label> <textarea name="txt_desc" id="desc" cols="30" rows="3"></textarea> 

                                                      </div>
                                                      <button class="btnvent button btnconfordpago" id="btnconfordpago">Confirmar Orden de Pago</button>

             </div>
             </div>




<!--  -->

                                                            <!-- <div class="datatable-container-ord-pago">

                                                                                  <div class="header-tools">
                                                                                  <div class="contbtnreg">
                                                                                              <button class="btnvent button " id="btnvent">Ver detalle</button>   
                                                                                               tendria que estar oculto hasta que se seleccione una orden 
                                                                                              </div>
                                                                                    <div class="buscador">
                                                                                        <p class="txtbusq">Buscar</p>
                                                                                        <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                                                       
                                                                                       
                                                                                        </div>  
                                                                                                    

                                                                                        
                                                                                  </div>
                                                                                          <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead class="tablaenc">       
                                                                                                    <th id="idproveedor">Id</th>
                                                                                                    <th id="empresa">Fecha</th>
                                                                                                    
                                                                                                    <th id="comercial">Nombre de Proveedor</th>
                                                                                                    <th id="telefono">Accion</th>
                                                                                                </thead>
                                                          
                                                                                              </table>
                                                                                              <div class="pages">
                                                                                                         <ul>
                                                                                                            <li><button id="btnpag1p">1</button></li>
                                                                                                            <li><button id="btnpag2p">2</button></li>
                                                                                                             <li><button id="btnpag3p">3</button></li>
                                                                                                            <li><button id="btnpag4p">4</button></li>
                                                                                                              <li><button id="btnpag5p">5</button></li>
                                                                                                               </ul>
                                                                                                         </div>
                                                                                              </div> -->


                                                                                              <div class="datatable-container fuentetam">

                                                                                                            <div class="header-tools">
                                                                                                                <div class="contbtnreg">
                                                                                                                    <!-- <button class="btnvent button " id="btnvent">Registrar Nuevo Comprobante</button>    -->
                                                                                                                    <button class="btnvent button " id="btnvent">Ver detalle</button>  
                                                                                                                    <button class="btnvent button " id="btnverordpagos"> Volver</button>
 

                                                                                                                </div>
                                                                                                                <div class="buscador">
                                                                                                                    <p class="txtbusq">Buscar</p>
                                                                                                                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                                                                                    
                                                                                                                </div>  
                                                                                                                <p class="txtbusq"> Seleccione Proveedor </p>
                                                                                                                    <Select class='selected' id="idprov" name="proveedor" >    
                                                                                                                        <option value="" selected disabled hidden>Seleccionar</option>
                                                                                                                
                                                                                                                        <?php
                                                                                                                        $conexion=mysqli_connect("localhost","root","","debian2");
                                                                                                                        $consulta="select * from proveedor";
                                                                                                                        $ejecutar=mysqli_query($conexion,$consulta) 

                                                                                                                        ?>

                                                                                                                        
                                                                                                                            <?php foreach ($ejecutar as $opciones): ?>
                                                                                                                            <option id='idprov' class='option' value = "<?php echo $opciones['Id']?>"><?php echo $opciones['Nombre']?></option>
                                                                                                                            <?php endforeach ?>
                                                                                                                        </Select>
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
                                                                                                                    <th id="telefono">Orden de Compra</th>
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
                                                                                              <!-- <button class="btnvent button " id="btnverordpagos"> Volver</button> -->
                                                                                          




<!-- ventana emergente factura -->
<div class="reg" id="ventcomp">
                        <div class="cont_vent cont_ventcomp" id="cont_ventcomp">
                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarcomp">
                            <div class="divtipocomprobante">
                                <div class="encabezadotipocomprobante">
                                    <p class="txt_registrar nomtipo" id="txttipo"></p>
                                    <p id="txtfecha" class="txttituloprov">Fecha:</p>

                                    <div class="contidorden">
                                                 <p class='txtinfoprov'>Orden: </p>

                                                <input type="text" class="inputidorden" id="inputidorden">   
                                            </div>
   
                                </div>
                                <div class="continfoproveedor">
                                    <!-- fecha calculada con js -->
                                    <p class="txttituloprov">Datos del Proveedor</p>
                                    <div class="infoproveedor">
                                        <p class="txtinfoprov">Proveedor</p><input type="text" id="nomprov" class="inputprov">
                                        <p class="txtinfoprov">Direccion</p><input type="text" id="dirprov" class="inputprov">
                                        <p class="txtinfoprov">Telefono</p><input type="text" id="telprov" class="inputprov">
                                        <p class="txtinfoprov">Correo</p><input type="text" id="correoprov" class="inputprov">
                                        <div class="contletra">
                                            <p class='txtinfoprov'>Letra: </p><input type="text" id="inputletra" class="inputprov">
                                            <!-- <select name="selectletra" class="selectedletra" id="selectletra">
                                                <option value="" selected disabled hidden>Seleccionar</option>

                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>   
                                            </select>
                                            -->
                                            
                                              </div>
                                    </div>                                                                                                      
                                </div>
                                                         
                                    <div class="tabla_total">

                                    
                                            <div class="datatable-container-remito dt-container-comp">
                                                                <table id="tablaordendetalle" class="table table-striped datatable table-bordered border-primary">
                                                                                <thead>       
                                                                                    <th id="">Insumo</th>
                                                                                    <th id="">Descripcion</th>
                                                                                    <th id="">Precio Unitario</th>
                                                                                    <th id="">Cantidad</th>

                                                                                </thead>
                                                                                                                        <!-- <?php
                                                                                    ?> -->
                                                                </table>
                                                                        
                                                                    
                                                                    
                                            </div>
                                            <div class="total">
                                                <p class="txtinfoprov">TOTAL $<input type="text" class="inputtotal" id="inputtotal"></p>

                                                <p class="txtinfoprov txtmonto" id="p_monto">Monto $<input type="text" class="inputtotal txtmonto"  id="input_monto"></p>
                                            </div>
                                    </div>        
                            </div>  
                            <button class="btnvent" id="btnregcomp">Seleccionar Comprobante a Pagar</button>                
                        </div>      
                        
                        
                </div>

                <!-- fin de ventana emergente factura -->


                <!-- ventana emergente de los comprobantes de tipo factura para las nota de credito y debito -->
                <div class="reg" id="ventcompnota">
                        <div class="cont_vent cont_ventcomp" id="cont_ventcompnota">
                              <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarcompnota">
                            <div class="divtipocomprobante">
                                <div class="datatable-container-compmin">

                                                    <div class="header-tools headerflex">
                                                        <div class="contbtnreg">
                                                        <p class="txt_registrar nomtipo">Comprobantes del Tipo Factura</p>

                                                        </div>
                                                        <div class="buscador">
                                                            <p class="txtbusq">Buscar</p>
                                                            <input type="text" id="busquedacompmin" class="busqueda" name="busqueda"> </input>

                                                        </div>  
                                                    </div>
                                                    <table id="tablacompmin" class="table table-striped datatable tablacompmin table-bordered border-primary">
                                                        <thead class="tablaenc">       
                                                            <th id="idproveedor">Id</th>
                                                            <th id="empresa">Nombre del proveedor</th>
                                                            <!-- <th id="telefono">Fecha</th> -->
                                                            <!-- <th id="telefono">Estado</th> -->
                                                            <th id="telefono">Monto</th>
                                                            <th id="telefono">Letra</th>
                                                            <th id="telefono">Orden de compra</th>
                                                            <th id="telefono">Tipo</th>
                                                            <th id="telefono">Accion</th>
                                                        </thead>
                                                        <!-- <tbody>
                                                        </tbody> -->
                                                    </table>
                                                    <div class="pages">
                                                        <ul>
                                                            <li><button id="btnpag6">1</button></li>    <!--cambie numeracion para no tener mismo id que arriba -->
                                                            <li><button id="btnpag7">2</button></li>
                                                            <li><button id="btnpag8">3</button></li>
                                                            <li><button id="btnpag9">4</button></li>
                                                            <li><button id="btnpag10">5</button></li>
                                                        </ul>
                                                    </div>
                                </div>
                                       
                            </div>  
                        </div>      
                        
                        
                </div>







                <!-- fin de ventana emergente -->
























                          <!-- ventana emergente con el total y el monto a pagar -->
                                                                                              
                          <div class="reg" id="ventordpagomonto">
                                        <div class="cont_vent cont_vent_ordpagomonto" id="cont_ordpagomonto">
                                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagomonto">
                                           
                                            <p class="txt_registrar" >Comprobantes a Pagar</p>
                                            <div class="texto_inputventmonto">
                                                         <p class="txtventmonto">Id de Orden:</p>
                                                     <input type="text inputventmonto" id="inputidorden">
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


                                                    </div>
                                 </div>
                    
                         </div>

                        
                </div>






</div>
</div>

<?php
include '../includes/footer.php';
?>
    <script src="../js/ordenpago.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/comprobante_pag.js?v=<?php  echo(rand()); ?>"></script>
</body>
</html>