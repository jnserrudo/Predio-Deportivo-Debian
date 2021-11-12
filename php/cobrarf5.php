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
<?php session_start() ?> 
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
           
           if ( isset($_GET['fr']) && isset($_GET['m']) && isset($_GET['fp']) && isset($_GET['idr'])) {
               
               $fr=$_GET['fr'];
               $m=$_GET['m'];
               $fp=$_GET['fp'];
               $idr=$_GET['idr'];
               $sql = "   
               UPDATE reservaf5 SET Estado = 'pagado' WHERE reservaf5.Id = '$idr';
                
               ";

               $resultado=mysqli_query($conexion,$sql);
               
               $sql = "   
               insert into socio_cuota_pagos (Id_reserva,Id_cuota,Id_socio,fecha_pago,monto_pago,forma_pago) values ('$idr','0','0','$fr','$m','$fp');
                
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
                                <p class="txt_registrar" >Registrar Pago</p>
                                <!-- <form  action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="forminsumo"> -->
                                <div class="registrar">
                                          <label class=label > Fecha:</label> <input type="date" id="fechavent" required placeholder="Ingrese Fecha" readonly> </input>
                                          <label class=label > Hora:</label> <input type="time" id="horavent" required placeholder="Ingrese Apellido" readonly> </input>
                                          <label class=label > Solicitante:</label> <input type="text" id="solicitantevent" required placeholder="Solicitante" readonly> </input>
                                          <label class=label > Monto:</label> <input type="text" id="montovent" required placeholder="Monto" readonly> </input>
                                          <label class=label > Forma de Pago:</label>
          <select class="form-select" id="formapago">
            <option>Efectivo</option>
            <option>Tarjeta de Debito</option>
            <option>Tarjeta de Credito</option>
            <option>Transferencia</option>
          </select>
                                    
                                    
                                      <input id="btnpagar"type="submit" name="registrar" value="Pagar" class="btnregistrar" required>
                                </div>
                                <!-- </form> -->
                      </div>
                    
               </div>
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
          
  
<!--mainmain-->
          <div class="mainmain">
          <p class="textordencompra"> COBRAR RESERVA </p>
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
                                                                              
                                                                                if (empty($_POST["txt_Apellido"])) {
                                                                                  $catErr = "Apellido is required";
                                                                                  

                                                                                } else {
                                                                                  $txt_Apellido= test_input($_POST["txt_Apellido"]);
                                                                                }
                                                                                
                                                                                if (empty($_POST["txt_DNI"])) {
                                                                                  
                                                                                 } else {
                                                                                   $txt_DNI = test_input($_POST["txt_DNI"]);
                                                                                 }
                                                                               
                                                                                 if (empty($_POST["txt_Estado"])) {
                                                                                   $txtErr = "Estado es requerido";
                                                                                  
                                                                                 } else {
                                                                                   $txt_Estado = test_input($_POST["txt_Estado"]);
                                                                                   
                                                                                 }
                                                                                 
                                                                                if (empty($_POST["txt_Email"])) {
                                                                                  
                                                                                 } else {
                                                                                   $txt_Email = test_input($_POST["txt_Email"]);
                                                                                 }
                                                                               
                                                                                 if (empty($_POST["txt_Direccion"])) {
                                                                                   $txtErr = "Direccion es requerido";
                                                                                  
                                                                                 } else {
                                                                                   $txt_Direccion = test_input($_POST["txt_Direccion"]);
                                                                                   
                                                                                 }
                                                                                 
                                                                                if (empty($_POST["txt_Telefono"])) {
                                                                                  
                                                                                 } else {
                                                                                   $txt_Telefono = test_input($_POST["txt_Telefono"]);
                                                                                 }
                                                                                                                                                    
                                                                              }
                                
                                                                              if(isset($_POST['registrar'])){
                                                                              if(strlen($_POST['txt_nom'])>=1 && strlen($_POST['txt_Apellido'])>=1 && strlen($_POST['txt_DNI'])>=1 && strlen($_POST['txt_Estado'])>=1 && strlen($_POST['txt_Email'])>=1 && strlen($_POST['txt_Direccion'])>=1 && strlen($_POST['txt_Telefono'])>=1){
                                                                               $txt_nom=$_POST['txt_nom'];
                                                                               $txt_Apellido=$_POST['txt_Apellido'];
                                                                               $txt_DNI=$_POST['txt_DNI'];
                                                                               $txt_Estado=$_POST['txt_Estado'];
                                                                               $txt_Email=$_POST['txt_Email'];
                                                                               $txt_Direccion=$_POST['txt_Direccion'];
                                                                               $txt_Telefono=$_POST['txt_Telefono'];
                                                                                 
                                                                                  
                                                                                  $comprobardato = mysqli_query($conexion,"select * from socio where Nombre = '$txt_nom' ");
                                                                                  if(mysqli_num_rows($comprobardato)>0)
                                                                                      {
                                                                                            }
                                                                                        else
                                                                                            {

                                                                                       $sql="INSERT INTO socio(Nombre,Apellido,DNI,Estado,Email,Direccion,Telefono)Values('$txt_nom','$txt_Apellido','$txt_DNI','$txt_Estado','$txt_Email','$txt_Direccion','$txt_Telefono')";
                                                                                      
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
                                                                                              <button class="btnvent button" id="btnvent">Volver</button>   
                                                                                              </div>
                                                                        
                                                                        <div class="buscador">
                                                                        
                                                                                              <p class="txtbusq">Buscar</p>
                                                                                             <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                                                             

                                                                </div>
                                                                </div>
                                                                

                                                                



                                                                                          <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead>       
                                                                                                    <th id="empresa">Id</th>
                                                                                                    <th id="empresa">Fecha</th>
                                                                                                    <th id="empresa">Hora</th>
                                                                                                    <th id="comercial">Solicitante</th>
                                                                                                    <th id="comercial">Contacto</th>
                                                                                                    <th id="comercial">Instalacion</th>       
                                                                                                    <th id="comercial">Precio</th>                                                                                                 
                                                                                                    <th id="comercial">Accion</th>
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


    
    

   

     




    



              <?php
    include '../includes/footer.php'
    ?>
    <script src="../js/maincobrarf5.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/cobrarf5.js?v=<?php  echo(rand()); ?>"></script>
                    


                    

</body>

</html>