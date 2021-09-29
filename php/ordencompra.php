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
        <?php

        while($i<count($n)){
      

            $s="select Id from insumo where Nombre='$n[$i]'";
            $rq=mysqli_query($conexion,$s);
          
            $rqs=mysqli_fetch_all($rq,PDO::FETCH_ASSOC);


            //
            $resultados1=$resultados[0][0];
            $rqs1=$rqs[0][0];
          
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

   <?php
   include '../includes/panel.php'
   ?>

         

<div class="mainmain">
<p class="textordencompra"> GENERAR UNA NUEVA ORDEN DE COMPRA</p>
<div class="divflex">

<script> if (window.history.replaceState) { // verificamos disponibilidad
window.history.replaceState(null, null, window.location.href);
}  </script>

                      <p class="txtprove"> Seleccione </p><p class="txtprove">Proveedor </p>
                      <Select class='selected' id="idprov" name="proveedor" >
                        
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

                            
      <div class="mainflex">

        <?php 

          $conexion=mysqli_connect('localhost','root','','debian2');

        ?>

        

                                                                            
                                                                           
                                                                          
                                                                      


                                                                          <div class="datatable-container">
                                                                          <button class="btnvent" id="btnbuscarinsumo"> Buscar Insumo</button>

                                                                                <div class="header-tools">

                                                                                    <div class="contbtnreg">
                                                                                    <button id="registrarorden" class="btnvent">Registrar orden de compra</button>
                                                                                    <button id='irabmorden' class='btnvent'> Ver Ordenes de Compras</button>
                                                                                                                        </div>
                                                                                                  
                                                                                                                        
                                                    

                                                                                          </div>




                                                                                      
                                                                                      

                                                                                      <table id="tabla2" class="table tablaorden table-striped  datatable table-bordered border-primary">
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
                                                                                            <button id="calcular" class="btnvent">Calcular</button>
                                                                                                 </div>
                                                                                                
                                                                      </div>
                                                                                                                                          
                                                <div class="reg" id="reg">
                                                      <div class="cont_vent cont_ventinsumoorden" id="cont_ventinsumoordcompra">
                                                      <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarinsumoordcompra">
                                                      <p class="txt_registrar" >Seleccionar Insumo</p>
                                                      <div class="buscador_insumoorden">
                                                             <p class="txtbusq">Buscar Insumo</p>
                                                              <input type="text" id="busqueda" class="busquedacant" name="busqueda"> </input>
                                                     
                                                      
                                                                    <p class="txtbusq">Cantidad</p>                                                                 
                                                                    <input type="number" id="input11" class="busquedacant" pattern="[0-9]+" name="busqueda"> </input>               
                                                                    </div>
                                                          <div class="datatable-container-insumo-ordencompra">             
                                                                          <table id="tabla" class="table table-striped datatable table-bordered border-primary">
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

                        
                </div>
                </div>






              </div>


    
   



   <?php
   include '../includes/footer.php'
   ?>
    <script src="../js/mainorden.js ?v=<?php echo(rand()); ?>"></script>
    <script src="../js/agregarorden.js ?v=<?php echo(rand()); ?>"></script>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    // borre el de paginaciones de ordenes compra y login


    <script src="../js/prueba_orden_pag_martin.js?v=<?php echo(rand()); ?>"></script>


                    

</body>
</html>