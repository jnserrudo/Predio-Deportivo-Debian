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

</head>
<body>
        
<?php
session_start();
$conexion = NULL;
    try{

      $conexion = mysqli_connect('localhost','root','','debian2');

        if (isset($_GET['x'])) {
            $x = $_GET['x'];


            // echo $c;
            // if(!$c=""){
            $sql = "SELECT r.Rol 
            FROM usuario as u
            inner join rol_usuario as ru on ru.Id_usuario=u.Id
            inner join rol as r on ru.Id_rol=r.Id
            where u.Id=$x
             ";
            // }else{
            //   $sql = "SELECT * FROM insumo";
        }
        


        // $resultado=mysqli_query($conexion,$sql);
        
        // $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
        // session_start();
        // $_SESSION['usuario']=$resultados[0][0];


        
        
    }catch (PDOException $e){
        echo "Error ".$e->getMessage();
    }









?>





<?php 

// Registrar en la tabla orden de compra usando el id del proveedor

if (isset($_GET['u'])&& isset($_GET['n'])&& isset($_GET['t'])&& isset($_GET['c'])&& isset($_GET['m'])) {
    $t = $_GET['t'];
    $c=$_GET['c'];
    $u=$_GET['u'];
    $n=$_GET['n'];
    $m=$_GET['m'];

    $comprobardato = mysqli_query($conexion, "select * from movimientos where Ubicacion = '$u' and Tipo='$t' and Motivo='$m' ");
    if (mysqli_num_rows($comprobardato)>0) {
    } else {

  //-------------------------------------------
  

        $c=explode(',', $c);
        $n=explode(',', $n);


                                                                
        $sql = "INSERT INTO movimientos (Ubicacion,Tipo,Motivo) values ('$u','$t','$m')";

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
                                                                            <!-- <p id='nombres'> <?php //echo  var_dump($idmov[0]), var_dump($idnoms[0]); ?> </p>   -->
                                                                            <?php
                                                                            $c1=$c[$i];

                                                                                
                                                                            $sql = "INSERT INTO movimiento_detalle (Id_insumo, Id_movimiento,Cantidad) values ($idn,$idm,$c1);";
                                                                            
                                                                            
                                                                            $resultado=mysqli_query($conexion, $sql);
                                                                            $i=$i+1;
                                                                        }
                     }
                     unset($comprobardato);
}
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
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>
    <div class="main">
        <!-- <img src="../assets/imagenes/NOTCIAS 4.jpg" class="aa" alt=""> -->
        <!-- <img src="../assets/imagenes/fondodebian (1).png" class="fondoimg" alt=""> -->
        

        <div class="side-navbar  d-flex justify-content-between flex-wrap flex-column sidebar" id="sidebar">
            <ul class="nav flex-column text-white w-100">
              <a href="#" class="nav-link h3 text-white my-2">
                Areas
              </a>
              <li href="#" class="nav-link lis" id="irinsumo">
                <span class="mx-2">Insumos</span>
              </li>
              <li href="#" class="nav-link lis" id="irproveedores">
                <span class="mx-2">Proveedores</span>
              </li>
              <li href="#" class="nav-link lis" id="irorden">
                <span class="mx-2">Ventas</span>
                <li href="#" class="nav-link lis" id="irmov">
                <span class="mx-2">Movimientos Stock</span>
              </li>
            </ul>
          </div>

          <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              <!-- <i class="bx bx-menu "></i> -->
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div>



                <div class="contdetalle">


                    <div class="contselected">
                        <p class='selecttxt'>Ubicacion: </p>
                        <select name="selectubi" id="selectubi">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Kiosko">Kiosko</option>
                            <option value="Accesorios">Accesorios</option>
                        </select>
                    </div>


                    <div class="contselected">
                        <p class='selecttxt'>Tipo: </p>
                        <select name="selecttipo" id="selecttipo">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Entrada">Entrada</option>
                            <option value="Salida">Salida</option>
                        </select>
                    </div>


                    <div class="contselected">
                        <p class='selecttxt'>Motivo: </p>
                        <select name="selectmot" id="selectmot">
                        <option value="" selected disabled hidden>Seleccionar</option>

                            <option value="Recepcion de Mercaderia">Recepcion de Mercaderia</option>
                            <option value="Venta">Venta</option>
                            <option value="Donacion">Donacion</option>
                            <option value="Defecto">Defecto</option>
                            <option value="Vencimiento">Vencimiento</option>
                            <option value="Remito">Remito</option>


                            
                        </select>
                    </div>
<!-- 
                    <div class="divremito">
                        <button class='btnremito' id="btnremito" >Seleccionar Remito</button>
                    </div>
                     -->


                </div>
                

                <div class="contablaimg">
                    <div class="contimg">
                        <img src="../assets/imagenes/stock.png" alt="stock imagen">
                    </div>



                    
                <div class="divremito">
                        <button class='btnremito' id="btnremito" >Seleccionar Remito</button>
                        <button class='btnagregarmov' id="btnagregarmov" >Agregar</button>
                    </div>

<!-- ventana emergente con los remitos -->
                                                        <div class="reg" id="ventrem">
                                                                <div class="cont_vent cont_vent_mov_stock" id="cont_ventrem">
                                                                <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarrem">
                                                                       <p class="txt_registrar" >Seleccionar Remito</p>

                                                                                     

                                                                                         <table id="tablaremito" class="table table-striped  table-bordered border-primary">
                                                                                                <thead>       
                                                                                                    <th id="">Id</th>
                                                                                                    <th id="">Id_Orden</th>
                                                                                                    <th id="">Fecha</th>
                                                                                                    <th id="">Accion</th>
                                                                                                </thead>

                                                                                                <!-- <?php

                                                                                                            // if(isset($_GET['idr'])){
                                                                                                            //     $reminner=''
                                                                                                            // }

                                                                                                        ?> -->
                                                                                         </table>
                                                                 </div>
                    
                                                      </div>












                    <!-- <button class='btnagregarmov' id="btnagregarmov" >Agregar</button> -->

                    <div class="">
                    <!-- <button class='btnagregarmov' >Agregar</button> -->

                        <table id="tablamov" class="tablita table-bordered border-primary">
                            <thead>       
                                <th id="nominsumo">Nombre</th>
                                <th id="cantinsumo">Cantidad</th>
                                <th id="cantinsumo">Accion</th>
                                                                                                    
                            </thead>
                        </table>
                    </div>
                </div>








                <!-- VENTANA EMERGENTE CON EL BUSCADOR DE INSUMOS -->
                                                        <div class="reg" id="reg">
                                                                <div class="cont_vent cont_vent_mov_stock" id="cont_vent">
                                                                <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                                                       <p class="txt_registrar" >Seleccionar Insumo</p>

                                                                                      <div class="buscador">
                                                                                    <p class="txtbusq">Buscar</p>
                                                                                    <input type="text" id="busquedamov" class="busquedamov" name="busquedamov"> </input>
                                                                                    <!-- <img src="../assets/imagenes/fondodebian (1).png" class="fondoimg" alt=""> -->
                                                                                    </div>

                                                                                         <table id="tablainsumo" class="table table-striped  table-bordered border-primary">
                                                                                                <thead>       
                                                                                                    <th id="">Id</th>
                                                                                                    <th id="">Id_categoria</th>
                                                                                                    <th id="">Nombre</th>
                                                                                                    <th id="">Descripcion</th>
                                                                                                    <th id="">Precio</th>
                                                                                                    <th id="">Stock</th>
                                                                                                    <th id="">Accion</th>
                                                                                                </thead>
                                                                                         </table>
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
            <button class="btnconfmov" id="btnconfirmar">Confirmar</button>


            </div>







    </div>
























        
        
    



























    <footer class="w-100 footer d-flex  align-items-center justify-content-start flex-wrap">
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
    <script src="../js/movstock.js?v=<?php echo(rand()); ?>"></script>

    
</body>
</html>