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
    <link rel="stylesheet" href="../css/styleorden.css?v=<?php echo(rand()); ?>">

</head>
<body>
<?php // $_SESSION['post']=false; ?> 
<header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->
            <p class="usuario" ><?php session_start(); echo $_SESSION['usuario']?></p>
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
           
        // if ( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['direc']) && isset($_POST['tel']) && isset($_POST['correo'])) {
       //   $i=$_POST['id'];
       //   $n=$_POST['nom'];
       //   $d = $_POST['direc'];
       //   $p=$_POST['tel'];
        //  $s=$_POST['correo'];

           

         //  if ( isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['direc']) && isset($_GET['tel']) && isset($_GET['correo'])) {

            //  $i=$_GET['id'];
            //  $n=$_GET['nom'];
            //  $d = $_GET['direc'];
              //$p=$_GET['tel'];
            //  $s=$_GET['correo'];


               //$f=$_POST['fecha_reg'];

               // echo $c;
               // if(!$c=""){
               




                if ( isset($_GET['Id']) && isset($_GET['Fecha']) && isset($_GET['Id_proveedor']) ) {
                  $i=$_GET['Id'];
                  $n=$_GET['Fecha'];
                  $d=$_GET['Id_proveedor'];
                  

               $sql = "   
               update orden
               set Fecha='$n', Id_proveedor='$d'
               where Id=$i;";
               //consulta bien hecha
                //update socio set Nombre='n', Apellido='d', DNI=31231, Email='v', Estado='s', Direccion='w', Telefono=31231 where Id=1

               // }else{
               //   $sql = "SELECT * FROM insumo";
               $resultado=mysqli_query($conexion,$sql);

              
           
           // $GLOBALS['res']=$resultados;
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
               // echo $c;
               // if(!$c=""){
               $sql = "   
               delete from orden
               where id=$r;
                
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
                                <p class="txt_registrar" >Volver</p>
                                  <?php //$_SESSION['post']=true; ?>
                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="forminsumo">
                                <div class="registrar">
                                          <label class=label > Fecha:</label> <input type="text" name="txt_Fecha" required placeholder="Ingrese Fecha"> </input>
                                          <label class=label > Id_proveedor:</label> <input type="text" name="txt_Id_proveedor" required placeholder="Ingrese Id_proveedor"> </input>
                                          
                                    

                                    

                                   <!--  <label class=label > Fecha de registro:</label> <input type="text" name="txt_fecha_reg" required> </input>  -->
                                      
                                      
                                      <!--<textarea name="txt_desc" id="" cols="15" rows="3"></textarea>  -->
                                    
                                      <input id="submit"type="submit" name="registrar" value="registrar" class="btnregistrar" required>
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
              <li href="#" class="nav-link lis" id="irorden">
                <span class="mx-2">Compras</span>
               
              </li>
              <li href="#" class="nav-link lis" id="irventas">
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
              
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div>




     <p class="txt" > ADMINISTRACION DE ORDENES DE COMPRA </p>
                  <div class="buscador">
                    <p class="txt">Buscar </p>
                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>

                    <!-- <img src="../assets/imagenes/fondodebian (1).png" class="fondoimg" alt=""> -->
                    </div>

                    <p id="txtconsulta">
                     
                    

                    </p>
               <div class="mainflex">

  <script> if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}  </script>
                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');

                                                                 
                                                              ?>





                                                                      <?php
                                                                     // $x=0;
                                                                      //session_start();
                                                                      if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                                                        //$_SESSION['inserted_db'] = true;
                                                                          if (empty($_POST["txt_Fecha"])) {
                                                                                  $nameErr = "Fecha is required";
                                                                                 // $_POST["txt_nom"]="";
                                                                                  //$_POST["txt_nom"]=array();
                                                                                  //$x=1;
                                                                                  //$_SESSION['inserted_db'] = FALSE;
                                                                                } else {
                                                                                  $txt_nom = test_input($_POST["txt_Fecha"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_Id_proveedor"])) {
                                                                                  $catErr = "Id_proveedor is required";
                                                                                  //$_POST["txt_direc"]="";
                                                                                 // $_POST["txt_direc"]=array();
                                                                                  //$x=1;
                                                                                 // $_SESSION['inserted_db'] = FALSE;

                                                                                } else {
                                                                                  $txt_Apellido= test_input($_POST["txt_Id_proveedor"]);
                                                                                }
                                                                                
                                                                           
                                                                              }
                                                                              //if($x==0){





                                                                              if(isset($_POST['registrar'])){
                                                                              if(strlen($_POST['txt_Fecha'])>=1 && strlen($_POST['txt_Id_proveedor'])>=1 ){
                                                                               $txt_nom=$_POST['txt_Fecha'];
                                                                               $txt_Apellido=$_POST['txt_Id_proveedor'];
                                                                               
                                                                               
                                                                               //    if($_SESSION['post']){
                                                                                //   if($_SESSION['inserted_db'] == true){
                                                                                 // if($_SESSION['post']==true) {
                                                                                   
                                                                                  
                                                                                  $comprobardato = mysqli_query($conexion,"select * from orden where Nombre = '$txt_Fecha','$txt_Id_proveedor' ");
                                                                                  if(mysqli_num_rows($comprobardato)>0)
                                                                                      {
                                                                                            }
                                                                                        else
                                                                                            {

                                                                                       $sql="INSERT INTO orden (Fecha, Id_proveedor)Values('$txt_Fecha','$txt_Id_proveedor')";
                                                                                      
                                                                                       $result=mysqli_query($conexion,$sql);}


                                                                                       unset($comprobardato);
                                                                                     //  $_SESSION['post']=false;
                                                                                //  }
                                                                               // }
                                                                                     //  else {
                                                                                      //  $_SESSION['post']=true;}
                                                                                       
                                                                                      // header ("location:/abmproveedores.php");

                                                                                      //$_SESSION['inserted_db'] = FALSE;
                                                                                   // }
                                                                                  //}
                                                                                // unset( $_POST['txt_nom']);
                                                                               //  unset($_POST['txt_direc']);
                                                                                // unset($_POST['txt_tel']);
                                                                                // unset($_POST['txt_correo']);
                                                                                // unset( $_POST['txt_fecha_reg']);
                                                                                      

                                                                                }
                                                                                 //$_POST['txt_nom']="";
                                                                                 //$_POST['txt_direc']="";
                                                                                // $_POST['txt_tel']="";
                                                                                 //$_POST['txt_correo']="";
                                                                                // $_POST['txt_fecha_reg']="";


                                                                                 // $_POST['txt_nom']=array();
                                                                                //  $_POST['txt_direc']=array();
                                                                                //  $_POST['txt_tel']=array();
                                                                                //  $_POST['txt_correo']=array();
                                                                                //  $_POST['txt_fecha_reg']=array();
                                                                                 
                                                                              
                                                                                }
                                                                              //}

                                                                               

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
                                                              <label class="col-1">Fecha:</label>
                                                              <input type="text" id="input1" name="txt_Fecha" value="" required class="col-2" ><br><br>
                                                              <label class="col-1">Id_proveedor:</label>
                                                              <input type="text" id="inpu2" name="txt_Id_proveedor" value="" required class="col-2"><br><br>
                                                              
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
                                                                                                    <th id="Id">Id</th>
                                                                                                    <th id="Fecha">Fecha</th>
                                                                                                    <th id="Id_proveedor">ID Proveedor</th>                                                                                                   
                                                                                                    
                                                                                                </thead>
                                                                                              </table>
                                                                                          <div class="contbtnreg">
                                                                                              <button class="btnvent" id="btnvolverord">Volver</button>   
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
    <script src="../js/main_abmorden.js?v=<?php echo(rand()); ?>"></script>

    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/abmorden.js?v=<?php echo(rand()); ?>"></script>

                    

</body>

</html>