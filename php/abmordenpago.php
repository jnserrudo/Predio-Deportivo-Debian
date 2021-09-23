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
                  

                    <p id="txtconsulta">
                     
                    

                    </p>


                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');

                                                              ?>





                                                                          
                                                                  


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
                                                                                                            <li> <button id="btnpag1">1</button></li>
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