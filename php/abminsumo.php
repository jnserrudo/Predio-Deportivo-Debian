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
</head>
<body>



<?php

// $conexion = NULL;
//     try{

//       $conexion = mysqli_connect('localhost','root','','debian2');

//         if (isset($_GET['x'])) {
//             $x = $_GET['x'];


//             // echo $c;
//             // if(!$c=""){
//             $sql = "SELECT r.Rol 
//             FROM usuario as u
//             inner join rol_usuario as ru on ru.Id_usuario=u.Id
//             inner join rol as r on ru.Id_rol=r.Id
//             where u.Id=$x
//              ";
//             // }else{
//             //   $sql = "SELECT * FROM insumo";
//         }
        


//         $resultado=mysqli_query($conexion,$sql);
        
//         $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
//         session_start();
//         $_SESSION['usuario']=$resultados[0][0];


        
        
//     }catch (PDOException $e){
//         echo "Error ".$e->getMessage();
//     }

session_start()
?>

<header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->

                <!--  -->


            <p class="usuario" ><?php echo $_SESSION['usuario']?></p>
            <div class="logo_usuario">
                <img src="../assets/imagenes/logousuario.png" alt="">
            </div>
            <button class="btnlogin" id="btnsesion"> <p class="text">CERRAR SESION</p> </button>



            
            <!--  -->



            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->


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
           
           if ( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['desc']) && isset($_POST['precio']) && isset($_POST['stock'])) {
                $i=$_POST['id'];
               $n=$_POST['nom'];
               $d = $_POST['desc'];
               $p=$_POST['precio'];
               $s=$_POST['stock'];
               // echo $c;
               // if(!$c=""){
               $sql = "   
               update insumo
               set Nombre='$n', Descripcion='$d', Precio='$p', Stock='$s'
               where Id='$i';
                
               ";
               // }else{
               //   $sql = "SELECT * FROM insumo";
               $resultado=mysqli_query($conexion,$sql);
              //  echo var_dump( $resultado);
           
          
           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>
 <!-- <p>  <?php 
 
//  session_start();

//   echo var_dump( $_SESSION['res']);

?> </p>  -->
<!-- eliminacion -->

<?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['r'])) {
               
               $r=$_GET['r'];
               // echo $c;
               // if(!$c=""){
               $sql = "   
               delete from insumo
               where Id=$r;
                
               ";
               // }else{
               //   $sql = "SELECT * FROM insumo";
               $resultado=mysqli_query($conexion,$sql);
           
           
           // $GLOBALS['res']=$resultados;
           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>





















    <div class="reg" id="reg">
                        <div class="cont_vent" id="cont_vent">
                            <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                <p class="txt_registrar" >Registrar Insumo</p>
                            
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="f"  class="forminsumo">
                                <div class="registrar" >
                                          <label class=label > Nombre:</label> <input type="text" name="txt_nom" required> </input>
                                    
                                      <label class=label > Id Categoria:</label> <input type="text" name="txt_cat" required> </input>
                                    
                                      <label class=label > Precio:</label> <input type="text" name="txt_precio" required> </input>
                                    
                                      <label class=label > Stock:</label> <input type="text" name="txt_stock" required> </input>
                                      
                                      <label class=label > Descripcion:</label> <textarea name="txt_desc" id="" cols="15" rows="3"></textarea>
                                    
                                      <input type="submit" name="registrar" value="Registrar"  class="btnregistrar">
                                </div>
                                </form>
                      </div>
                    
               </div>
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
              <li href="#" class="nav-link lis">
                <span class="mx-2" id="irorden">Compras</span>
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




                  <div class="buscador">
                    <p class="txtbusq">Buscar</p>
                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                    <!-- <img src="../assets/imagenes/fondodebian (1).png" class="fondoimg" alt=""> -->
                    </div>

                    <p id="txtconsulta">
                     
                    

                    </p>
               <div class="mainflex">


                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');

                                                              ?>





                                                                      <?php
                                                                      $x=0;
                                                                      // session_start();s
                                                                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                        ?>
                                                                                     <!-- CAMBIE TODOS LOS EMPTY A ISSET EN LOS IF -->
                                                                                    <?php

                                                                          // $_SESSION['inserted_db'] = true;
                                                                          if (!isset($_POST["txt_nom"])) {
                                                                              $nameErr = "Name is required";
                                                                              $_POST["txt_nom"]=array();
                                                                              $x=1;
                                                                          // $_SESSION['inserted_db'] = FALSE;
                                                                          } else {
                                                                              $txt_nom = test_input($_POST["txt_nom"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_cat"])) {
                                                                              $catErr = "Email is required";
                                                                              $_POST["txt_cat"]=array();
                                                                              $x=1;
                                                                          // $_SESSION['inserted_db'] = FALSE;
                                                                          } else {
                                                                              $txt_cat= test_input($_POST["txt_cat"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_desc"])) {
                                                                              $_POST["txt_desc"] = array();
                                                                              $x=1;
                                                                          // $_SESSION['inserted_db'] = FALSE;
                                                                          } else {
                                                                              $txt_desc = test_input($_POST["txt_desc"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_precio"])) {
                                                                              $_POST["txt_precio"] = array();
                                                                              $x=1;
                                                                          // $_SESSION['inserted_db'] = FALSE;
                                                                          } else {
                                                                              $txt_precio = test_input($_POST["txt_precio"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_stock"])) {
                                                                              // $txtErr = "stock es requerido";
                                                                              $x=1;
                                                                              $_POST["txt_stock"]=array();
                                                                          // $_SESSION['inserted_db'] = FALSE;
                                                                          } else {
                                                                              $txt_stock = test_input($_POST["txt_stock"]);
                                                                          }
                                                                              

                                                                          if ($x==0) {
                                                                              
                                                                              $txt_cat=$_POST['txt_cat'];
                                                                              $txt_nom=$_POST['txt_nom'];
                                                                              $txt_desc=$_POST['txt_desc'];
                                                                              $txt_precio=$_POST['txt_precio'];
                                                                              $txt_stock=$_POST['txt_stock'];
                                                                              
                                                                              // var_dump($x);
                                                                              // if($_SESSION['inserted_db'] == true){
                                                                              // var_dump($_POST['txt_cat']);
                                                                              




                                                                              $comprobardato = mysqli_query($conexion,"select * from insumo where Nombre = '$txt_nom' ");
                                                                              if(mysqli_num_rows($comprobardato)>0)
                                                                              {
                                                                              }
                                                                              else
                                                                              {
                                                                
                                                                              //-------------------------------------------
                                                                              $sql="INSERT INTO insumo(Id_categoria,Nombre,Descripcion,Precio,Stock)Values('$txt_cat','$txt_nom','$txt_desc','$txt_precio','$txt_stock')";
                                                                                $result=mysqli_query($conexion,$sql);
                                                                                $_SESSION['inserted_db'] = FALSE;
                                                                
                                                                              }
                                                                              unset($comprobardato);



                                                                                    // Lo de abajo lo comente, incorporando la idea del if de la cant de filas como resultado antes

                                                                                                                // $sql="INSERT INTO insumo(Id_categoria,Nombre,Descripcion,Precio,Stock)Values('$txt_cat','$txt_nom','$txt_desc','$txt_precio','$txt_stock')";
                                                                                                                                
                                                                                                                // $result=mysqli_query($conexion, $sql);


                                                                              // $_SESSION['inserted_db'] = FALSE;
                                                                              // }
                                                                             
                                                                              unset($_POST['txt_cat']);
                                                                              unset($_POST['txt_nom']);
                                                                              unset($_POST['txt_desc']);
                                                                              unset($_POST['txt_precio']);
                                                                              unset($_POST['txt_stock']);
                                                                                    // <!-- <script type="text/javascript">
                                                                                   
                                                                                    //      document.getElementById("f").reset();
                                                                                    //         console.log('se llego')
                                                                                    // </script> -->
                                                                              

                                                                              
                                                                          }


                                                                      } ?>
                                                                                    

                                                                                    <?php
                                                                              function test_input($data) {
                                                                                    $data = trim($data);
                                                                                    $data = stripslashes($data);
                                                                                    $data = htmlspecialchars($data);
                                                                                    return $data;
                                                                                  }
                                                                                  ?>
                                                                          
                                                                      



                                                              <!-- MARTIN -->
                                                              <!-- 
                                                              <form  method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                              <label class="col-1">Id_categoria:</label>
                                                              <input type="text" id="input1" name="txt_cat" value="" required class="col-2" ><br><br>
                                                              <label class="col-1">Nombre:</label>
                                                              <input type="text" id="inpu2" name="txt_nom" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Descripcion:</label>
                                                              <input type="text" id="input3" name="txt_desc" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Precio:</label>
                                                              <input type="text" id="inpu4" name="txt_precio" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Stock:</label>
                                                              <input type="text" id="input5" name="txt_stock" value="" required class="col-2"><br><br>
                                                              <input type="submit" value="Registrar" name="registrar" required>
                                                              </form>
                                                              <?php
                                                              // if(isset($_POST['registrar'])){
                                                              // if(strlen($_POST['txt_cat'])>=1 &&   strlen($_POST['txt_nom'])>=1 && strlen($_POST['txt_desc'])>=1 && strlen($_POST['txt_precio'])>=1 && strlen($_POST['txt_stock'])>=1  ){
                                                              // $txt_cat=$_POST['txt_cat'];
                                                              // $txt_nom=$_POST['txt_nom'];
                                                              // $txt_desc=$_POST['txt_desc'];
                                                              // $txt_precio=$_POST['txt_precio'];
                                                              // $txt_stock=$_POST['txt_stock'];
                                                              // $consulta="INSERT INTO Insumo(Id_categoria,Nombre,Descripcion,Precio,Stock)Values('$txt_cat','$txt_nom','$txt_desc','$txt_precio','$txt_stock');";
                                                              // $resultado1=mysqli_query($conexion,$consulta);
                                                              // if($resultado1){
                                                              //     ?>
                                                              //     <h3>se registro correctamaente</h3>
                                                              //     <?php
                                                              // }else{
                                                              //     ?>
                                                              //     <h3> No se registro correctamaente </h3>
                                                              // <?php

                                                              // }

                                                              // }else{
                                                              //     ?>
                                                              //     <h3>Cpmplete los campos</h3>
                                                              //     <?php
                                                              // }


                                                              // }?> -->
                                                              <!--  -->

                                                              <!-- <button id="btneditar" class="btneditar" >Editar</button>
                                                              <button id="btneliminar" class="btneliminar" >Editar</button> -->
                                                              <!-- <a href="../html/index.html"><button>al index</button></a> -->

                                                              <!-- <?php 
                                                            //  require('insercion.php'); 
                                                              // if(!$_POST['datos']="")
                                                              //  $tabla = getTableFromDatabase();
                                                                // $t=$_POST['busqueda'];
                                                                // $tablabusq=gettabla($t);
                                                            ?>-->

                                                                



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
                                                                                          <div class="contbtnreg">
                                                                                              <button class="btnvent" id="btnvent">Registrar Nuevo Insumo</button>   
                                                                                              </div>
                        </div>
                </div>

              </div>


    
    <!-- ABM INSUMO -->

   

     




    <!--  -->





    <footer class="w-100 footer d-flex  align-items-center justify-content-start flex-wrap">
        <!-- <p class="fs-5 px-3  pt-3">ExpertD. &copy; Todos Los Derechos Reservados 2021</p> -->
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
    <script src="../js/main.js?v=<?php echo(rand()); ?>"></script>

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
                    


                    

</body>
</html>