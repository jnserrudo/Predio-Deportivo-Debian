<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
</head>
<body>
<?php // $_SESSION['post']=false; ?> 
<header class="header">
        <div class="logo">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button>

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
               




                if ( isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['Apellido']) && isset($_GET['DNI']) && isset($_GET['Estado']) && isset($_GET['Email']) && isset($_GET['Direccion']) && isset($_GET['Telefono'])) {
                  $i=$_GET['id'];
                  $n=$_GET['nom'];
                  $d=$_GET['Apellido'];
                  $p=$_GET['DNI'];
                  $s=$_GET['Estado'];
                  $v=$_GET['Email'];
                  $w=$_GET['Direccion'];
                  $x=$_GET['Telefono'];

               $sql = "   
               update socio
               set Nombre='$n', Apellido='$d', DNI=$p, Email='$v', Estado='$s', Direccion='$w', Telefono=$x
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
               delete from socio
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
                                <p class="txt_registrar" >Registrar Socio</p>
                                  <?php //$_SESSION['post']=true; ?>
                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="forminsumo">
                                <div class="registrar">
                                          <label class=label > Nombre:</label> <input type="text" name="txt_nom" required placeholder="Ingrese Nombre"> </input>
                                          <label class=label > Apellido:</label> <input type="text" name="txt_Apellido" required placeholder="Ingrese Apellido"> </input>
                                          <label class=label > DNI:</label> <input type="text" name="txt_DNI" required placeholder="Ingrese DNI"> </input>
                                          <label class=label > Estado:</label> <input type="text" name="txt_Estado" required placeholder="Ingrese Estado"> </input>
                                          <label class=label > Email:</label> <input type="text" name="txt_Email" required placeholder="Ingrese Email"> </input>
                                    
                                      <label class=label > Direccion:</label> <input type="text" name="txt_Direccion" required placeholder="ingrese Direccion"> </input>
                                    
                                      <label class=label > Telefono:</label> <input type="text" name="txt_Telefono" required placeholder="Ingrese Telefono"> </input>
                                    

                                    

                                   <!--  <label class=label > Fecha de registro:</label> <input type="text" name="txt_fecha_reg" required> </input>  -->
                                      
                                      
                                      <!--<textarea name="txt_desc" id="" cols="15" rows="3"></textarea>  -->
                                    
                                      <input id="submit"type="submit" name="registrar" value="registrar" class="btnregistrar" required>
                                </div>
                                </form>
                      </div>
                    
               </div>
    <div class="main">
     <p class="textordencompra"> ADMINISTRACION DE SOCIOS </p>
                  <div class="buscador">
                    <p class="txtbusq">Buscar</p>
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
                                                                          if (empty($_POST["txt_nom"])) {
                                                                                  $nameErr = "Name is required";
                                                                                 // $_POST["txt_nom"]="";
                                                                                  //$_POST["txt_nom"]=array();
                                                                                  //$x=1;
                                                                                  //$_SESSION['inserted_db'] = FALSE;
                                                                                } else {
                                                                                  $txt_nom = test_input($_POST["txt_nom"]);
                                                                                }
                                                                              
                                                                                if (empty($_POST["txt_Apellido"])) {
                                                                                  $catErr = "Apellido is required";
                                                                                  //$_POST["txt_direc"]="";
                                                                                 // $_POST["txt_direc"]=array();
                                                                                  //$x=1;
                                                                                 // $_SESSION['inserted_db'] = FALSE;

                                                                                } else {
                                                                                  $txt_Apellido= test_input($_POST["txt_Apellido"]);
                                                                                }
                                                                                
                                                                                if (empty($_POST["txt_DNI"])) {
                                                                                  // $_POST["txt_tel"] = "";
                                                                                 // $_POST["txt_tel"] =array();
                                                                                  //$x=1;
                                                                                   //$_SESSION['inserted_db'] = FALSE;
                                                                                 } else {
                                                                                   $txt_DNI = test_input($_POST["txt_DNI"]);
                                                                                 }
                                                                               
                                                                                 if (empty($_POST["txt_Estado"])) {
                                                                                   $txtErr = "Estado es requerido";
                                                                                  // $_POST["txt_correo"]="";
                                                                                 // $_POST["txt_correo"]=array();
                                                                                  //$x=1;
                                                                                   //$_SESSION['inserted_db'] = FALSE;
                                                                                 } else {
                                                                                   $txt_Estado = test_input($_POST["txt_Estado"]);
                                                                                   //$x=1;
                                                                                 }
                                                                                 
                                                                                if (empty($_POST["txt_Email"])) {
                                                                                  // $_POST["txt_tel"] = "";
                                                                                 // $_POST["txt_tel"] =array();
                                                                                  //$x=1;
                                                                                   //$_SESSION['inserted_db'] = FALSE;
                                                                                 } else {
                                                                                   $txt_Email = test_input($_POST["txt_Email"]);
                                                                                 }
                                                                               
                                                                                 if (empty($_POST["txt_Direccion"])) {
                                                                                   $txtErr = "Direccion es requerido";
                                                                                  // $_POST["txt_correo"]="";
                                                                                 // $_POST["txt_correo"]=array();
                                                                                  //$x=1;
                                                                                   //$_SESSION['inserted_db'] = FALSE;
                                                                                 } else {
                                                                                   $txt_Direccion = test_input($_POST["txt_Direccion"]);
                                                                                   //$x=1;
                                                                                 }
                                                                                 
                                                                                if (empty($_POST["txt_Telefono"])) {
                                                                                  // $_POST["txt_tel"] = "";
                                                                                 // $_POST["txt_tel"] =array();
                                                                                  //$x=1;
                                                                                   //$_SESSION['inserted_db'] = FALSE;
                                                                                 } else {
                                                                                   $txt_Telefono = test_input($_POST["txt_Telefono"]);
                                                                                 }
                                                                           
                                                                            
                                                                              
                                                                              }
                                                                              //if($x==0){





                                                                              if(isset($_POST['registrar'])){
                                                                              if(strlen($_POST['txt_nom'])>=1 && strlen($_POST['txt_Apellido'])>=1 && strlen($_POST['txt_DNI'])>=1 && strlen($_POST['txt_Estado'])>=1 && strlen($_POST['txt_Email'])>=1 && strlen($_POST['txt_Direccion'])>=1 && strlen($_POST['txt_Telefono'])>=1){
                                                                               $txt_nom=$_POST['txt_nom'];
                                                                               $txt_Apellido=$_POST['txt_Apellido'];
                                                                               $txt_DNI=$_POST['txt_DNI'];
                                                                               $txt_Estado=$_POST['txt_Estado'];
                                                                               $txt_Email=$_POST['txt_Email'];
                                                                               $txt_Direccion=$_POST['txt_Direccion'];
                                                                               $txt_Telefono=$_POST['txt_Telefono'];
                                                                               
                                                                               //    if($_SESSION['post']){
                                                                                //   if($_SESSION['inserted_db'] == true){
                                                                                 // if($_SESSION['post']==true) {
                                                                                   
                                                                                  
                                                                                  $comprobardato = mysqli_query($conexion,"select * from socio where Nombre = '$txt_nom' ");
                                                                                  if(mysqli_num_rows($comprobardato)>0)
                                                                                      {
                                                                                            }
                                                                                        else
                                                                                            {

                                                                                       $sql="INSERT INTO socio(Nombre,Apellido,DNI,Estado,Email,Direccion,Telefono)Values('$txt_nom','$txt_Apellido','$txt_DNI','$txt_Estado','$txt_Email','$txt_Direccion','$txt_Telefono')";
                                                                                      
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
                                                              <label class="col-1">Nombre:</label>
                                                              <input type="text" id="input1" name="txt_nom" value="" required class="col-2" ><br><br>
                                                              <label class="col-1">Apellido:</label>
                                                              <input type="text" id="inpu2" name="txt_Apellido" value="" required class="col-2"><br><br>
                                                              <label class="col-1">DNI:</label>
                                                              <input type="text" id="input3" name="txt_DNI" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Estado:</label>
                                                              <input type="text" id="inpu4" name="txt_Estado" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Email:</label>
                                                              <input type="text" id="input5" name="txt_Email" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Direccion:</label>
                                                              <input type="text" id="input6" name="txt_Direccion" value="" required class="col-2"><br><br>
                                                              <label class="col-1">Telefono:</label>
                                                              <input type="text" id="input7" name="txt_Telefono" value="" required class="col-2"><br><br>
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
                                                                                                    <th id="idsocio">Id</th>
                                                                                                    <th id="nom">Nombre</th>
                                                                                                    <th id="Apellido">Apellido</th>                                                                                                   
                                                                                                    <th id="DNI">DNI</th>
                                                                                                    <th id="Estado">Estado</th>
                                                                                                  <th id="Email">Email</th>
                                                                                                    <th id="Direccion">Direccion</th>
                                                                                                    <th id="Telefono">Telefono</th>
                                                                                                </thead>
                                                                                              </table>
                                                                                          <div class="contbtnreg">
                                                                                              <button class="btnvent" id="btnvent">Registrar Nuevo Socio</button>   
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
    <script src="../js/main_socios.js?v=<?php echo(rand()); ?>"></script>
                    


                    

</body>

</html>