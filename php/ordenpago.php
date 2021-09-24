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

    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">
</head>
<body>
<?php
session_start();

include '../includes/encabezado.php'
?>


<div class="main">
<!-- que el main contenga al include -->
    <?php
    include '../includes/panel.php'
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

                  
            $sql = "INSERT INTO ordenpago_detalle (Id_orden_pago, Id_orden_compra, Monto) values ($resultados1,$id1,$mp1);";
            
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

<!-- idorden , el total de esa orden, monto a pagar, mas la accion, el boton dira quitar -->


<div class="reg" id="ventordpago">
             <div class="cont_vent cont_vent_ordpagodetalle" id="cont_ordpago_detalle">
             <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagodetalle">
                                                            <div class="datatable-container-ord-pago-detalle">

                                       
                                                                                          <table id="tabla_ordpago" class="table table-striped datatable table-bordered border-primary">
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




<!--  -->

                                                            <div class="datatable-container-ord-pago">

                                                                                  <div class="header-tools">
                                                                                  <div class="contbtnreg">
                                                                                              <button class="btnvent button " id="btnvent">Ver detalle</button>   
                                                                                              <!-- tendria que estar oculto hasta que se seleccione una orden -->
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
                                                                                                    
                                                                                                    <th id="comercial">Id Proveedor</th>
                                                                                                    <th id="telefono">Accion</th>
                                                                                                </thead>
                                                                                                <!-- <tbody>

                                                                                                </tbody> -->
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
                                                                                              <!--<button>Ant</button><button>Sig</button> -->
                                                                                              </div>

                                                                                              <button class="btnvent button " id="btnverordpagos"> Ver Ordenes de pagos</button>
                                                                                          


                          <!-- ventana emergente con el total y el monto a pagar -->
                                                                                              
                          <div class="reg" id="ventordpagomonto">
                                        <div class="cont_vent cont_vent_ordpagomonto" id="cont_ordpagomonto">
                                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarordpagomonto">
                                           
                                            <p class="txt_registrar" >Monto a Pagar</p>
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
    <script src="../js/paginaciones/orden_pago.js?v=<?php  echo(rand()); ?>"></script>
</body>
</html>