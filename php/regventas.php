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
    <link rel="stylesheet" href="../css/stylemovstock.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleregventas.css?php echo(rand()); ?>">

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
        <p class="textordencompra"> VENTAS  </p>


        <!-- insert de la venta -->


        <?php
       
        
            try{
           $conexion = mysqli_connect('localhost','root','','debian2');
          
                if ( isset($_GET['dep'])&& isset($_GET['ins'])&& isset($_GET['c']) && isset($_GET['to']) ) {
                  $idep=$_GET['dep'];
                  
                  $ins=$_GET['ins'];
                  $c=$_GET['c'];
                  $t=$_GET['to'];
                  $idep=explode(',',$idep);

                    $cant=explode(',',$c);
                    $ins=explode(',',$ins);
             

                  
               $sql ="INSERT INTO ventas (Total) values ('$t')";
               $resultado=mysqli_query($conexion,$sql);

             $consultaidventa = "select Id from ventas order by Id desc limit 1";
             $idventa=mysqli_query($conexion,$consultaidventa);
             $resultados=mysqli_fetch_all($idventa,PDO::FETCH_ASSOC);
             
                    // insercion    
                    $i=0;
                    ?>
                    <?php

                        while($i<count($ins)){
                            // $s="select Id from insumo where Nombre='$ins[$i]'";
                            // $rq=mysqli_query($conexion, $s);
        
                            // $idnoms=mysqli_fetch_all($rq, PDO::FETCH_ASSOC);
                            // $idn=$idnoms[0][0];

                            
                             $resultados1=$resultados[0][0];
                             $id0=$idep[$i];
                            //  $id1=$ins[$i];
                             $c1=$cant[$i];
                                           
                             $sql = "INSERT INTO ventas_detalle (Id_venta,Id_insumo,Cantidad,Id_deposito) values ('$resultados1',(select Id from insumo where Nombre='$ins[$i]'),'$c1',(select Id from deposito where Nombre='$id0'));";
            
                                $resultado=mysqli_query($conexion, $sql);
                                $i=$i+1;
                         }

        
}
            

               
              
               

       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

        
       
         ?> 


        <!-- fin insert -->

                                            <div class="datatable-container">
                                            <div class="header-tools">
                                            <div class="contbtnreg">
                                                <button class="btnvent button " id="btnvolver">Volver</button>   
                                            </div>
                                            <div class="buscador">
                                                <p class="txtbusq">Buscar:</p>
                                                <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                <button class="btnvent button " id="btnverdetalle">Ver Detalle</button>  
                                            </div> 
                                            </div>
                                            <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                            <thead class="tablaenc">       
                                                <th id="idproveedor">Id</th>
                                                <th id="empresa">Nombre</th>
                                                <th id="comercial">Tipo</th> 
                                                <th id="comercial">Accion</th>   
                                    
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



                                        
<!-- ventana emergente que usare para los insumos por depositos y ver su detalle -->
            <div class="reg" id="reg">
                        <div class="cont_vent cont_vent_ordpagodetalle" id="cont_vent">
                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                                <div class="datatable-container-ord-pago-detalle">                                          
                                                        <table id="tablainsumodep" class="table table-striped datatable table-bordered border-primary">
                                                                <thead class="tablaenc">       
                                                                    <th id="id_col_op1">Deposito</th>
                                                                    <th id="id_col_op2">Insumo</th>
                                                                    
                                                                    <th id="id_col_op3">Stock</th>

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
             <!-- fin ventana emergente -->




             <!-- ventana emergente de los insumos por deposito -->
             <div class="reg" id="regins">
                    <div class="cont_vent cont_vent_mov_stock cont_ventinsumoorden" id="cont_ventins">
                    <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarins">
                                           <p class="txt_registrar" >Seleccionar Insumo</p>

                                                          <div class="buscador">
                                                          <p class="txtbusq">Deposito:</p> <input type="text" class="inputventas" id="inputdeposito">

                                                        <p class="txtbusq">Buscar</p>
                                                           <input type="text" id="busquedamov" class="busquedamov" name="busquedamov"> </input>
                                                                                    
                                                        </div>

                                                        <div class="datatable-container-insumo-ordencompra">
                                                                <table id="tablainsumo" class="table table-striped datatable table-bordered border-primary">
                                                                                                              
                                                                          
                                                                            <thead>       
                                                                                <th id="">Id</th>
                                                                                <th id="">Nombre</th>
                                                                                <th id="">Descripcion</th>
                                                                                <th id="">Precio</th>
                                                                                <th id="">Stock por Deposito</th>
                                                                                <th id="">Cantidad</th>

                                                                                <th id="">Accion</th>
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

                                                        </div>
                                                                                        
                                                                 </div>
                    
                                                      </div>

                                                      <!-- fin ventana emergente -->



                                                      <!-- ventana emergente detalle -->

                                                      

                                    <div class="reg" id="ventventadetalle">
                                        <div class="cont_vent cont_vent_ordpagodetalle" id="cont_venta_detalle">
                                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarventadetalle">
                                                                    <div class="datatable-container-venta-detalle">

                                                                
                                                                            <table id="tabla_ordpago" class="table table-striped datatable table-bordered border-primary">
                                                                                    <thead class="tablaenc">  
                                                                                        <th id="id_col_op1">Deposito</th>
     
                                                                                        <th id="id_col_op1">Insumo</th>
                                                                                        <th id="id_col_op2">Precio</th>
                                                                                        
                                                                                        <th id="id_col_op3">Cantidad</th>
                                                                                        <th id="id_col_op3">Total</th>

                                                                                        <th id="id_col_op4">Accion</th>
                                                                                    </thead>
                                                                                
                                                                                </table>
                                                                                
                                                                                </div>
                                                                               
                                                                                <button class="btnvent button btnconfordpago" id="btnconfventa">Confirmar Venta</button>

                                        </div>
                                        </div>                                                                             







                                                                                          

    </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/regventas.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/depositos.js?v=<?php echo(rand()); ?>"></script>


</body>
</html>