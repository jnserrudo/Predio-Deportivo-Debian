<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleorden.css?v=<?php echo(rand()); ?>">

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
    
    <!-- EDICION INSUMO -->
    <?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['desc']) && isset($_POST['precio']) && isset($_POST['stock'])) 
           {
              $i=$_POST['id'];
              $n=$_POST['nom'];
              $d = $_POST['desc'];
              $p=$_POST['precio'];
              $s=$_POST['stock'];

              $sql = "update insumo set Nombre=$n, Descripcion=$d, Precio=$p, Stock=$s where id=$i;";

               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>


<!-- eliminacion -->

<?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['r'])) {
               
               $r=$_GET['r'];

               $sql = "   
               delete from insumo
               where id=$r;
                
               ";

               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>



<?php 

// Registrar en la tabla orden de compra usando el id del proveedor

if (isset($_GET['t'])&& isset($_GET['n'])&& isset($_GET['p'])&& isset($_GET['c'])) {
  $z = $_GET['t'];
  $c=$_GET['c'];
  $p=$_GET['p'];
  $n=$_GET['n'];

      $c=explode(',',$c);
      $p=explode(',',$p);
      $n=explode(',',$n);

  $GLOBALS['z']=$z;

  
  $sql = "INSERT INTO orden (Id_proveedor) values ($z)";

  $resultado=mysqli_query($conexion,$sql);

  // Registrar detalle de la orden ------------
  $consultaidorden = "select Id from orden order by Id desc limit 1";
  $idorden=mysqli_query($conexion,$consultaidorden);
  $resultados=mysqli_fetch_all($idorden,PDO::FETCH_ASSOC);
  

        // insercion
        $i=0;
        ?>
        <!-- <p id='nombres'> <?// echo var_dump( $n), var_dump( $p), var_dump( $c), var_dump($resultados[0]);?> </p>   -->
        <?php

        while($i<count($n)){
      

            $s="select Id from insumo where Nombre='$n[$i]'";
            $rq=mysqli_query($conexion,$s);
          
            $rqs=mysqli_fetch_all($rq,PDO::FETCH_ASSOC);


            //
            $resultados1=$resultados[0][0];
            $rqs1=$rqs[0][0];
          ///





            ?>
            <p id='nombres'> <?php echo  var_dump($resultados[0][0]), var_dump( $rqs[0][0]), var_dump( $p[0]), var_dump( $c);?> </p>  
            <?php
            $p1=$p[$i];
            $c1=$c[$i];

                  
            $sql = "INSERT INTO orden_detalle (Id_orden, Id_insumo, Precio, Cantidad) values ($resultados1,$rqs1,$p1,$c1);";
            
            //ejemplo de insert 
            //INSERT INTO orden_detalle (Id_orden, Id_insumo, Precio, Cantidad) values (2,1,2,3);
            
            $resultado=mysqli_query($conexion, $sql);
            $i=$i+1;
        }

        
}
            
            
            
            
            
        ?>
            
            
            
            
            
            
            
         















               
    <div class="main">

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
                <span class="mx-2">Compras</span>
               
              </li>
              <li href="#" class="nav-link lis" id="irorden">
                <span class="mx-2">Ventas</span>
                <!-- falta ventas -->
              </li>
              <li href="#" class="nav-link lis" id="irremitos">
                <span class="mx-2">Remitos</span>
              </li>
              <li href="#" class="nav-link lis" id="irmov">
                <span class="mx-2">Movimientos de Stock</span>
              </li>
              <li href="#" class="nav-link lis" id="irsocios">
                <span class="mx-2">Socios</span>
              </li>
            </ul>
          </div>

          <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              <!-- <i class="bx bx-menu "></i> -->
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div>



                                  <p class="textordencompra"> GENERAR UNA NUEVA ORDEN DE COMPRA</p>
                                  <div class="divflex">



                      <p class="txt"> Seleccione Proveedor </p>
                      <Select class=select id="idprov" name="proveedor" >
                        
                          <?php
                          $conexion=mysqli_connect("localhost","root","","debian2");
                          $consulta="select * from proveedor";
                          $ejecutar=mysqli_query($conexion,$consulta) 

                      ?>

                          
                          <?php foreach ($ejecutar as $opciones): ?>
                              <option id='idprov' class='option' value = "<?php echo $opciones['Id']?>"><?php echo $opciones['Nombre']?></option>
                          <?php endforeach ?>
                          </Select>

                      <p class="txt">Buscar Insumo</p>

                      <input type="text" id="busqueda" class="busquedacant" name="busqueda"> </input>
                            <div class="buscador">

                            </div>
                            <br></br>
                            <p class="txt">Cantidad</p>
                            <p id="txtconsulta"> 
                            
                                        <div class="cantidad">
                                
                                <input type="number" id="input11" class="busquedacant" pattern="[0-9]+" name="busqueda"> </input>               
                              </div>
                              
                            </p>



                            </div>

                            
      <div class="mainflex">

        <?php 

          $conexion=mysqli_connect('localhost','root','','debian2');

        ?>

        <?php
          $x=0;
          
          if ($_SERVER["REQUEST_METHOD"] == "POST")
          {
            $_SESSION['inserted_db'] = true;
            if (empty($_POST["txt_nom"])) 
            {
              $nameErr = "Name is required";
              $_POST["txt_nom"]="";
              $_SESSION['inserted_db'] = FALSE;
            } else {
                                                                                  $txt_nom = test_input($_POST["txt_nom"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_cat"])) {
                                                                                  $catErr = "Email is required";
                                                                                  $_POST["txt_cat"]="";
                                                                                  $_SESSION['inserted_db'] = FALSE;

                                                                                } else {
                                                                                  $txt_cat= test_input($_POST["txt_cat"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_desc"])) {
                                                                                  $_POST["txt_desc"] = "";
                                                                                  $_SESSION['inserted_db'] = FALSE;
                                                                                } else {
                                                                                  $txt_desc = test_input($_POST["txt_desc"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_precio"])) {
                                                                                  $_POST["txt_precio"] = "";
                                                                                  $_SESSION['inserted_db'] = FALSE;
                                                                                } else {
                                                                                  $txt_precio = test_input($_POST["txt_precio"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_stock"])) {
                                                                                  $txtErr = "stock es requerido";
                                                                                  $_POST["txt_stock"]="";
                                                                                  $_SESSION['inserted_db'] = FALSE;
                                                                                } else {
                                                                                  $txt_stock = test_input($_POST["txt_stock"]);
                                                                                  $x=1;
                                                                                }
                                                                              }


                                                                            
                                                                                
                                                                              function test_input($data) {
                                                                                    $data = trim($data);
                                                                                    $data = stripslashes($data);
                                                                                    $data = htmlspecialchars($data);
                                                                                    return $data;
                                                                                  }
                                                                                  ?>
                                                                          
                                                                      



                                                            <table id="tabla" class="table table-striped  table-bordered border-primary">
                                                              <thead>       
                                                                <th id="idproveedor">Id</th>
                                                                <th id="empresa">Id_categoria</th>
                                                                <th id="comercial">Nombre</th>
                                                                <th id="telefono">Descripcion</th>
                                                                <th id="telefono">Precio</th>
                                                                <th id="telefono">Stock</th>
                                                                <th id="telefono">Accion</th>
                                                              </thead>
                                                            </table>

                                                            

                                                            <table id="tabla2" class="table tablaorden table-striped  table-bordered border-primary">
                                                              <thead>       
                                                                <th id="idproveedor">Nombre</th>
                                                                <th id="empresa">Precio por Unidad</th>
                                                                <th id="comercial">Cantidad</th>
                                                                <th id="">Quitar</th>
                                                                              
                                                              </thead>
                                                            </table>
                                                                      
                                                                                          






                                                            <div class="divreg">
                        <label class="txt"> TOTAL </label>
                          <input type="text" id="total" class="total"></input>
                          <button id="calcular" class="btncalcular">Calcular</button>
                          <button id="registrarorden" class="btnregorden">Registrar orden de compra</button>




                          <button id='irabmorden' class='btnregorden'> Ver Ordenes de Compras</button>


                          </div>



                        </div>

                        
                </div>






              </div>


    
    <!-- ABM INSUMO -->



    <!--  -->





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
    <script src="../js/mainorden.js ?v=<?php echo(rand()); ?>"></script>
    <script src="../js/agregarorden.js ?v=<?php echo(rand()); ?>"></script>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/login.js?v=//<?// echo(rand()); ?>"></script> -->


                    

</body>
</html>