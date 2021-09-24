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
    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">

</head>
<body>
<?php session_start()?> 
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
       date_default_timezone_set("America/Argentina/Buenos_Aires");
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
          
                if ( isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['direc']) && isset($_GET['tel']) && isset($_GET['correo'])) {
                  $i=$_GET['id'];
                  $n=$_GET['nom'];
                  $d=$_GET['direc'];
                  $p=$_GET['tel'];
                  $s=$_GET['correo'];
        

               $sql = "   
               update proveedor
               set Nombre='$n', Direccion='$d', Telefono=$p, Correo='$s'
               where Id=$i;";

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
               delete from proveedor
               where id=$r;
                
               ";
               
               $resultado=mysqli_query($conexion,$sql);

           }          
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }
?>

    <div class="reg" id="reg">
                        <div class="cont_vent" id="cont_vent">
                            <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                <p class="txt_registrar" >Registrar Proveedor</p>
                                  
                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="forminsumo">
                                <div class="registrar">
                                          <label class=label > Nombre:</label> <input type="text" name="txt_nom" required placeholder="Ingrese Nombre"> </input>
                                    
                                      <label class=label > Direccion:</label> <input type="text" name="txt_direc" required placeholder="ingrese Direccion"> </input>
                                    
                                      <label class=label > Telefono:</label> <input type="text" name="txt_tel" required placeholder="Ingrese Telefono"> </input>
                                    
                                      <label class=label > Correo:</label> <input type="text" name="txt_correo" required placeholder="Ingrese Correo"> </input>

                                     <label class=label > Fecha de registro:</label> <input type="text" name="txt_fecha_reg" readonly value="<?php echo date('Y-m-d'); ?>"> </input>  

                                      <input id="submit"type="submit" name="registrar" value="registrar" class="btnregistrar" required>
                                </div>
                                </form>
                      </div>
                    
               </div>
    <div class="main">
    <?php
    include '../includes/panel.php'
    ?>

          <!-- <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div> -->



          
               <div class="mainmain">
               <p class="textordencompra"> ADMINISTRACION DE PROVEEDORES  </p>
  <script> if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}  </script>
                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');
    
                                                              ?>

                                                                      <?php
                                                                     
                                                                      if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                                                        
                                                                          if (empty($_POST["txt_nom"])) {
                                                                                  $nameErr = "Name is required";
                                                                                 
                                                                                } else {
                                                                                  $txt_nom = test_input($_POST["txt_nom"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_direc"])) {
                                                                                  $catErr = "Email is required";
                                                                                  

                                                                                } else {
                                                                                  $txt_direc= test_input($_POST["txt_direc"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_fecha_reg"])) {
                                                                                  $catErr = "Fecha is required";
                                                                                 
                                                                                } else {
                                                                                  $txt_fecha_reg = test_input($_POST["txt_fecha_reg"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_tel"])) {
                                                                                
                                                                                } else {
                                                                                  $txt_tel = test_input($_POST["txt_tel"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_correo"])) {
                                                                                  $txtErr = "stock es requerido";
                                                                                 
                                                                                } else {
                                                                                  $txt_correo = test_input($_POST["txt_correo"]);
                                                                                  
                                                                                }
                                                                              }
                                                                              
                                                                              if(isset($_POST['registrar'])){
                                                                              if(strlen($_POST['txt_nom'])>=1 && strlen($_POST['txt_direc'])>=1 && strlen($_POST['txt_tel'])>=1 && strlen($_POST['txt_correo'])>=1  ){
                                                                               $txt_nom=$_POST['txt_nom'];
                                                                               $txt_direc=$_POST['txt_direc'];
                                                                               $txt_tel=$_POST['txt_tel'];
                                                                               $txt_correo=$_POST['txt_correo'];
                                                                               $txt_fecha_reg=$_POST['txt_fecha_reg'];
                                                                               
                                                                                  
                                                                                  $comprobardato = mysqli_query($conexion,"select * from proveedor where Nombre = '$txt_nom' ");
                                                                                  if(mysqli_num_rows($comprobardato)>0)
                                                                                      {
                                                                                            }
                                                                                        else
                                                                                            {

                                                                                       $sql="INSERT INTO proveedor(Nombre,Direccion,Telefono,Correo,Fecha_reg)Values('$txt_nom','$txt_direc','$txt_tel','$txt_correo','$txt_fecha_reg')";
                                                                                      
                                                                                       $result=mysqli_query($conexion,$sql);}


                                                                                       unset($comprobardato);
                                                                                     

                                                                                }
                                                                                
                                                                              
                                                                                }
                                                                              

                                                                               

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
                                                              
                                                                   ?>
                                                                  <h3>se registro correctamaente</h3>
                                                                <?php
                                                              
                                                                   ?>
                                                                   <h3> No se registro correctamaente </h3>
                                                               <?php

                                                              

                                                              
                                                                   ?>
                                                                  <h3>Cpmplete los campos</h3>
                                                                   
                                                              <!-- <button id="btneditar" class="btneditar" >Editar</button>
                                                              <button id="btneliminar" class="btneliminar" >Editar</button> -->
                                                              <!-- <a href="../html/index.html"><button>al index</button></a> -->

                                                              <!-- <?php 
                                                            
                                                            ?>-->





                                                          <div class="datatable-container">

                                                                <div class="header-tools">
                                                                        
                                                                        <div class="contbtnreg">
                                                                                              <button class="btnvent button" id="btnvent">Registrar Nuevo Proveedor</button>   
                                                                                              </div>
                                                                 <div class="buscador">
                                                                            <p class="txtbusq">Buscar</p>
                                                                            <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
      
                                                                  </div>  

                                                                </div>
                                                                



                                                                                          <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead>       
                                                                                                    <th id="idproveedor">Id</th>
                                                                                                    <th id="nombre_1">Nombre</th>
                                                                                                    <th id="direccion_1">Direccion</th>                                                                                                  
                                                                                                    <th id="telefono_1">Telefono</th>
                                                                                                    <th id="correo_1">Correo</th>
                                                                                                  <th id="fecha_registro_1">Fecha de registro</th>  
                                                                                                    <th id="accion_1">Accion</th>
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
    <script src="../js/main_prov.js"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/proveedores.js?v=<?php  echo(rand()); ?>"></script>



                    

</body>

</html>