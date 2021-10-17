<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos de stocks</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/stylemovstock.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/insuposxdepo.css?v=<?php echo(rand()); ?>">

    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">

</head>
<body>
        
<?php
session_start();
$conexion = NULL;
    try{

      $conexion = mysqli_connect('localhost','root','','debian2');
     

        if (isset($_GET['x'])) {
            $x = $_GET['x'];

            $sql = "SELECT r.Rol 
            FROM usuario as u
            inner join rol_usuario as ru on ru.Id_usuario=u.Id
            inner join rol as r on ru.Id_rol=r.Id
            where u.Id=$x
             ";

        }
        
        
        
    }catch (PDOException $e){
        echo "Error ".$e->getMessage();
    }









?>





<?php 

// Registrar en la tabla orden de compra usando el id del proveedor

if (isset($_GET['u'])&& isset($_GET['n'])&& isset($_GET['t'])&& isset($_GET['c'])&& isset($_GET['m'])) {
    $t = $_GET['t'];
    
?>
    <?php 
    $c=$_GET['c'];
    $u=$_GET['u'];
    $n=$_GET['n'];
    $m=$_GET['m'];
    

    // $comprobardato = mysqli_query($conexion, "select * from movimientos where Id_deposito = $u and Tipo='$t' and Motivo='$m' ");
    // if (mysqli_num_rows($comprobardato)>0) {


    // } else {

  //-------------------------------------------
  

        $c=explode(',', $c);
        $n=explode(',', $n);


                                                                
        $sql = "INSERT INTO movimientos (Id_deposito,Tipo,Motivo) values ($u,'$t','$m')";

        $resultado=mysqli_query($conexion, $sql);

        // Registrar detalle de la orden ------------
        $consultaidmov = "select Id from movimientos order by Id desc limit 1";
        $idmovconsulta=mysqli_query($conexion, $consultaidmov);
        $idmov=mysqli_fetch_all($idmovconsulta, PDO::FETCH_ASSOC);
                                                                

        // insercion
        $i=0; ?>
                                                                        <?php

                                                                        while ($i<count($n)) {
                                                                            $s="select Id from insumo where Nombre='$n[$i]'";
                                                                            $rq=mysqli_query($conexion, $s);
                                                                        
                                                                            $idnoms=mysqli_fetch_all($rq, PDO::FETCH_ASSOC);

                                                                            //
                                                                            $idm=$idmov[0][0];
                                                                            $idn=$idnoms[0][0];
                                                                            ///?>
                                                                            <!-- <p id='nombres'> <?php //echo  var_dump($idmov[0]), var_dump($idnoms[0]);?> </p>   -->
                                                                            <?php
                                                                            $c1=$c[$i];
                                                                            $sql4 = "INSERT INTO movimiento_detalle (Id_insumo, Id_movimiento,Cantidad) values ($idn,$idm,$c1);";
                                                                            $resultado=mysqli_query($conexion, $sql4);

                                                                           if ($t='Entrada') {
                                                                                //le agregue lo de abajo
                                                                                $sql3 = "  UPDATE deposito_detalle 
                                                                                        set  stock=(SELECT stock from deposito_detalle 
                                                                                        WHERE Id_deposito=$u and Id_insumo=$idn)+$c1
                                                                                        WHERE Id_deposito=$u and Id_insumo=$idn";
                                                                                        $resultado3=mysqli_query($conexion, $sql3);
                                                                            } else {
                                                                                $sql3 = "  UPDATE deposito_detalle 
                                                                                    set  stock=(SELECT stock from deposito_detalle 
                                                                                    WHERE Id_deposito=$u and Id_insumo=$idn)-$c1
                                                                                    
                                                                                    WHERE Id_deposito=$u and Id_insumo=$idn
                                                                                    ";
                                                                                $resultado3=mysqli_query($conexion, $sql3);
                                                                            }
                                                                        
                                                                            //hasta aqui
                                                                            $i=$i+1;
                                                                        }
                                                                        
        //le agregue lo de abajo martin
        $t = $_GET['t']=null;
        $c=$_GET['c']=null;
        $u=$_GET['u']=null;
        $n=$_GET['n']=null;
        $m=$_GET['m']=null;
        //hasta aqui martin
                     
      //  unset($comprobardato);
    }
// }
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
            <p class="textordencompra"> MOVIMIENTO DE STOCK  </p>      

                <div class="contdetalle">


                    <div class="contselected">
                        <p class='selecttxt'>Deposito: </p>
                        <select name="selectubi"  class="selected" id="selectubi">
                        <option value="" selected disabled hidden>Seleccionar</option>
                        
                          
                            <?php
                            $conexion=mysqli_connect("localhost","root","","debian2");
                            $consulta="select Id,Nombre from deposito";
                            $ejecutar=mysqli_query($conexion,$consulta) 

                            ?>

                                                                                                                        
                                <?php foreach ($ejecutar as $opciones): ?>
                                <option id='idprov' class='option' value = "<?php echo $opciones['Id']?>"><?php echo $opciones['Nombre']?></option>
                                <?php endforeach ?>

                            
                        </select>
                    </div>


                    <div class="contselected">
                        <p class='selecttxt'>Tipo: </p>
                        <select name="selecttipo" class="selected" id="selecttipo">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Entrada">Entrada</option>
                            <option value="Salida">Salida</option>
                        </select>
                    </div>


                    <div class="contselected">
                        <p class='selecttxt'>Motivo: </p>
                        <select name="selectmot" class="selected" id="selectmot">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Recepcion de Mercaderia">Recepcion de Mercaderia</option>
                            <option value="Venta">Venta</option>
                            <option value="Donacion">Donacion</option>
                            <option value="Defecto">Defecto</option>
                            <option value="Vencimiento">Vencimiento</option>
                            <option value="Remito">Remito</option>


                            
                        </select>
                    </div>
                </div>
              
                <div class="divremito">
                        <button class='btnremito btnvent' id="btnremito" >Seleccionar Remito</button>
                        <button class='btnagregarmov btnvent' id="btnagregarmov" >Agregar</button>
                    </div>

<!-- ventana emergente con los remitos -->
                                                        <div class="reg" id="ventrem">
                                                                <div class="cont_vent cont_vent_remito" id="cont_ventrem">
                                                                <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarrem">
                                                                       <p class="txt_registrar" >Seleccionar Remito</p>

                                                                                <div class="datatable-container-remito">
                                                                                            <table id="tablaremito" class="table table-striped datatable table-bordered border-primary">
                                                                                                            <thead>       
                                                                                                                <th id="">Id</th>
                                                                                                                <th id="">Id_Orden</th>
                                                                                                                <th id="">Fecha</th>
                                                                                                                <th id="">Accion</th>
                                                                                                            </thead>

                                                                                                            <!-- <?php

                                                                                                                    ?> -->
                                                                                                    </table>
                                                                                                    <div class="pages">
                                                                                                         <ul>
                                                                                                            <li> <button id="btnpag6">1</button></li>
                                                                                                            <li><button id="btnpag7">2</button></li>
                                                                                                             <li><button id="btnpag8">3</button></li>
                                                                                                            <li><button id="btnpag9">4</button></li>
                                                                                                              <li><button id="btnpag10">5</button></li>
                                                                                                               </ul>
                                                                                                         </div>

                                                                                </div>
                                                                                        
                                                                 </div>
                    
                                                      </div>




                    
                    <div class="datatable-container-cantinsumo-movstock">

                    <div class="header-tools">   
                                <table id="tablamov" class="table table-striped datatable table-bordered border-primary">
                                    <thead>       
                                        <th id="nominsumo">Nombre</th>
                                        <th id="cantinsumo">Cantidad</th>
                                        <th id="cantinsumo">Accion</th>
                                                                                                            
                                    </thead>
                                </table>
                                  </div>
                              </div>




                <!-- VENTANA EMERGENTE CON EL BUSCADOR DE INSUMOS (por deposito) -->
                                                        <div class="reg" id="reg">
                                                                <div class="cont_vent cont_vent_mov_stock cont_ventinsumoorden" id="cont_vent">
                                                                <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                                                       <p class="txt_registrar" >Seleccionar Insumo</p>

                                                                                      <div class="buscador">
                                                                                    <p class="txtbusq">Buscar</p>
                                                                                    <input type="text" id="busquedamov" class="busquedamov" name="busquedamov"> </input>
                                                                                    
                                                                                    </div>

                                                                                    <div class="datatable-container-insumo-ordencompra">
                                                                                            <table id="tablainsumo" class="table table-striped datatable table-bordered border-primary">
                                                                                                              
                                                                                                      
                                                                                                        <thead>       
                                                                                                            <th id="">Id</th>
                                                                                                            <th id="">Nombre</th>
                                                                                                            <th id="">Descripcion</th>
                                                                                                            <th id="">Stock x Deposito</th>
                                                                                                            <th id="">Estado</th>
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


                                                      <!-- ventana emergente con la cantidad -->
                                                      <div class="reg" id="vent_cant">
                                                                <div class="ventcant" id="cont_ventcant">
                                                                     <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarcant">
                                                                       <p class="txt_registrar"> Cantidad</p>
                                                                       <input type="number" name="cant" id="inputcant" required>
                                                                       <button id="btnaceptarcant" >Aceptar</button>
                                                                 </div>
                    
                                                      </div>
                                                                               
            <div class="divbtnconf">
                <button class="btnconfmov btnvent" id="btnconfirmar">Confirmar</button>

            </div>

            


            



    </div>

    </div>
    <?php
    include '../includes/footer.php'
    ?>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/movstock.js?v=<?php echo(rand()); ?>"></script>
  <!--  <script src="../js/prueba_orden_pag_martin.js?v=<?php //echo(rand()); ?>"></script>  -->
    <script src="../js/paginaciones/remito_movstock.js?v=<?php echo(rand()); ?>"></script>   
    <script src="../js/paginaciones/paginacionmov_stock.js?v=<?php echo(rand()); ?>"></script>

    
</body>
</html>