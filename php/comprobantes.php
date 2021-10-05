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
    include '../includes/panel.php'
    ?>
    <?php 
                        $conexion = NULL;
                                try{
                                    $conexion = mysqli_connect('localhost','root','','debian2');                                   
               
                                        $sql = "SELECT count(*) FROM comprobante";
                                        $resultadonro=mysqli_query($conexion,$sql);                                  
                                    $resultadosnro=mysqli_fetch_array($resultadonro);
                                    $j=json_encode($resultadosnro);
                                                                 
                                }catch (PDOException $e){
                                    echo "Error ".$e->getMessage();
                                }
                        ?>





<?php 

// Registrar en la tabla comprobante detalle usando el id  del comprobante
$conexion = mysqli_connect('localhost','root','','debian2');
if (isset($_GET['ip'])&& isset($_GET['io'])&& isset($_GET['l'])&& isset($_GET['m'])&& isset($_GET['t'])&& isset($_GET['n'])&& isset($_GET['c'])) {
    $ip=$_GET['ip'];
    $io=$_GET['io'];
    $l=$_GET['l'];
    $m=$_GET['m'];
    $t=$_GET['t'];


    $n=$_GET['n'];
  $c=$_GET['c'];

      $n=explode(',',$n);
      $c=explode(',',$c);

    if(isset($_GET['ic'])){
        $ic=$_GET['ic'];
        $sql = "INSERT INTO comprobante (Id_proveedor,Id_comprobante,Estado,Monto,Letra,Id_orden_compra,Tipo)
        values ($ip,$ic,'Registrado',$m,'$l',$io,'$t');";
    }
    else{
        $sql = "INSERT INTO comprobante (Id_proveedor,Id_comprobante,Estado,Monto,Letra,Id_orden_compra,Tipo)
                values ($ip,0,'Registrado',$m,'$l',$io,'$t');";
    }
  $resultado=mysqli_query($conexion,$sql);

  // Registrar detalle de la orden ------------
  $consultaidorden = "select Id from comprobante order by Id desc limit 1";
  $idcomp=mysqli_query($conexion,$consultaidorden);
  $resultados=mysqli_fetch_all($idcomp,PDO::FETCH_ASSOC);
  

        // insercion
        $i=0;
        ?>
        <?php

                while ($i<count($n)) {
                    $s="select Id from insumo where Nombre='$n[$i]'";
                    $rq=mysqli_query($conexion, $s);

                    $idnoms=mysqli_fetch_all($rq, PDO::FETCH_ASSOC);

                    //
                    $idc=$resultados[0][0];
                    $idn=$idnoms[0][0];
                    ///?>
                    <!-- <p id='nombres'> <?php //echo  var_dump($idmov[0]), var_dump($idnoms[0]); ?> </p>   -->
                    <?php
                    $c1=$c[$i];

                        
                    $sql = "INSERT INTO comprobante_detalle (Id_comprobante, Id_insumo,Cantidad) values ($idc,$idn,$c1);";
                    
                    
                    $resultado=mysqli_query($conexion, $sql);
                    $i=$i+1;
                }

        
}
            
            
            
            
            
        ?>
     



    <div class="mainmain">
        <p class="textordencompra">COMPROBANTES</p>
        <div class="divflex">
            <div class="divflexitem">
                <p class="txtprove">Nro Comprobante:</p>
                <input type="text" id='nrocomprobante' class="inputnrocomprobante" readonly value=<?php  echo intval($resultadosnro[0])+1; ?> >

            </div>
            <div class="divflexitem">
            <p class="txtprove"> Seleccione Proveedor </p>
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
            <div class="divflexitem">
                          <p class='txtprove'>Tipo: </p>
                        <select name="selecttipo" class="selected" id="selecttipo">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Factura">Factura</option>
                            <option value="Notacredito">Nota de Credito</option>
                            <option value="Notadebito">Nota de Debito</option>


                            
                        </select>
            </div>
             
        </div>

        <div class="datatable-container">

             <div class="header-tools">
             <div class="contbtnreg">
                 <button class="btnvent" id="btnvolvercomprobante">Volver</button>     
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
                        <th id="Id">Id</th>
                        <th id="Fecha">Fecha</th>
                        <th id="Id_proveedor">Nombre del Proveedor</th>                                                                                                   
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

<!-- ventana emergente factura -->
                  <div class="reg" id="ventcomp">
                        <div class="cont_vent cont_ventcomp" id="cont_ventcomp">
                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarcomp">
                            <div class="divtipocomprobante">
                                <div class="encabezadotipocomprobante">
                                    <p class="txt_registrar nomtipo" id="txttipo"></p>
                                    <p id="txtfecha" class="txttituloprov"></p>

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
                                            <p class='txtinfoprov'>Letra: </p>
                                            <select name="selectletra" class="selectedletra" id="selectletra">
                                                <option value="" selected disabled hidden>Seleccionar</option>

                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>   
                                            </select>
                                           
                                            
                                              </div>
                                    </div>
                                    
                                   
                                    

                                </div>
                                
                                <!-- <div class="contletra">
                                    <p class='txtprove'>Letra: </p>
                                    <select name="selectmot" class="selectedletra" id="selecttipo">
                                        <option value="" selected disabled hidden>Seleccionar</option>

                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>   
                                    </select>
                                </div> -->
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
                                                <p class="txtinfoprov">TOTAL $<input type="text" class="inputtotal" id="inputtotal"></p>

                                                <p class="txtinfoprov txtmonto" id="p_monto">Monto $<input type="text" class="inputtotal txtmonto"  id="input_monto"></p>
                                            </div>
                                    </div>        
                            </div>  
                            <button class="btnvent" id="btnregcomp">Registrar Comprobante</button>                
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




                </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    <script src="../js/comprobante.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/paginacioncomprobantes.js?v=<?php  echo(rand()); ?>"></script>
    <script src="../js/paginaciones/paginacioncompmin.js?v=<?php  echo(rand()); ?>"></script>
</body>
</html>