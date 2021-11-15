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
    <link rel="stylesheet" href="../css/styleregventas.css?v=<?php echo(rand()); ?>">

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
        <p class="textordencompra"> VENTAS  </p>


        <!-- insert de la venta -->


        <?php
       
        
            try{
                    $conexion = mysqli_connect('localhost','root','','debian2');
                
                    if ( isset($_GET['dep'])&& isset($_GET['ins'])&& isset($_GET['c']) && isset($_GET['to']) ) {
                            $idep=$_GET['dep'];
                            //   idep es el id del deposito seleccionado
                            $ins=$_GET['ins'];
                            $c=$_GET['c'];
                            $t=$_GET['to'];
                
                            $cant=explode(',',$c);
                            $ins=explode(',',$ins);
             
                 
                 
                            $sql ="INSERT INTO ventas (Total) values ('$t')";
                            $resultado=mysqli_query($conexion,$sql);
                

                             $consultaidventa = "select Id from ventas order by Id desc limit 1";
                             $idventa=mysqli_query($conexion,$consultaidventa);
                             $resultados=mysqli_fetch_all($idventa,PDO::FETCH_ASSOC);
                            //insert en la tabla movimiento
            

                            $sql1="INSERT INTO movimientos(Id_deposito,Tipo,Motivo) values('$idep','Salida','Venta')";
                            $resultado1=mysqli_query($conexion, $sql1); 

                            $consultaidmov = "select Id from movimientos order by Id desc limit 1";
                             $idmov=mysqli_query($conexion,$consultaidmov);
                             $idmovs=mysqli_fetch_all($idmov,PDO::FETCH_ASSOC);
                             $idmov=$idmovs[0][0];
                    
                                // insercion    
                            $i=0;
                             ?>
                                <?php

                                        while($i<count($ins)){
                                            

                                            
                                            $resultados1=$resultados[0][0];
                                            //  $id1=$ins[$i];
                                            $c1=$cant[$i];
                                            //consulta para ingresar una vez
                                            

                                            $sql = "INSERT INTO ventas_detalle (Id_venta,Id_insumo,Cantidad,Id_deposito) values ('$resultados1',(select Id from insumo where Nombre='$ins[$i]'),'$c1','$idep');";    
                                            $resultado=mysqli_query($conexion, $sql);

                                                //  insert en la tabla movimiento_detalle
                                            $sql2="INSERT INTO movimiento_detalle(Id_insumo,Id_movimiento,Cantidad) values((select Id from insumo where Nombre='$ins[$i]'),'$idmov','$c1')";
                                            $resultado=mysqli_query($conexion, $sql2);

                                            // agregue
                                            // disminuir stock por deposito


//                                             UPDATE deposito_detalle
                                                // SET stock=(SELECT stock from deposito_detalle WHERE Id_deposito=1 and Id_insumo=21)+1
                                            $sql = "UPDATE deposito_detalle 
                                                    set  stock=(SELECT stock from deposito_detalle 
                                                    WHERE Id_deposito='$idep' and Id_insumo=(select Id from insumo where Nombre='$ins[$i]'))-$c1";                                  
                                            $resultado=mysqli_query($conexion, $sql);
                                            $i=$i+1;                                           
                                           
                                        }                                
                                        
                                        $_GET['dep']=null;
                                        $_GET['ins']=null;
                                        $_GET['c']=null;
                                        $_GET['to']=null;
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
                                                <!-- comente el buscador, primero quiero que ande, habria problema con los parametros que se envia al getdata -->
                                                <!-- <p class="txtbusq">Buscar:</p>
                                                <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input> -->

                                                <p class="txtbusq"> Deposito </p>
                                                    <Select class='selected' id="iddep" name="proveedor" >    
                                                        <option value="" selected disabled hidden>Seleccionar</option>
                                                                                                                
                                                        <?php
                                                        $conexion=mysqli_connect("localhost","root","","debian2");
                                                        $consulta="select * from deposito";
                                                        $ejecutar=mysqli_query($conexion,$consulta) 

                                                        ?>

                                                                                                                        
                                                             <?php foreach ($ejecutar as $opciones): ?>
                                                             <option id='idprov' class='option' value = "<?php echo $opciones['Id']?>"><?php echo $opciones['Nombre']?></option>
                                                             <?php endforeach ?>
                                                    </Select>
                                                    <button class="btnvent button " id="btnverdetalle">Ver Detalle</button>  
                                                <div class="busqdepo" id="busqdepo">
                                                    <p class="txtbusq">Buscar:</p>
                                                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                </div>
                                                   

                                            </div> 
                                            </div>
                                            <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                            <thead class="tablaenc">       
                                                <th id="empresa">Nombre</th>
                                                <th id="comercial">Stock x Deposito</th> 
                                                <th id="comercial">Cantidad</th> 
                                                <th id="comercial">Precio</th> 


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
           
             <!-- fin ventana emergente -->




             <!-- ventana emergente de los insumos por deposito -->
             

                                                      <!-- fin ventana emergente -->



                                                      <!-- ventana emergente detalle -->

                                                      

                                    <div class="reg" id="ventventadetalle">
                                        <div class="cont_vent cont_vent_ordpagodetalle" id="cont_venta_detalle">
                                        <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarventadetalle">
                                                                    <div class="datatable-container-venta-detalle">

                                                                
                                                                            <table id="tabla_ordpago" class="table table-striped datatable table-bordered border-primary">
                                                                                    <thead class="tablaenc">     
                                                                                        <th id="id_col_op1">Insumo</th>
                                                                                        <th id="id_col_op1">Precio</th>

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
   <!-- <script src="../js/paginaciones/depositos.js?v=<?php echo(rand()); ?>"></script>   -->
    <script src="../js/paginaciones/ventadetalle.js?v=<?php echo(rand()); ?>"></script>



</body>
</html>