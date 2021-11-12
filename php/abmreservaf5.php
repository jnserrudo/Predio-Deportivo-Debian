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
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"/> -->

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
           
           if ( isset($_POST['Id']) && isset($_POST['Fecha']) && isset($_POST['Hora']) && isset($_POST['Solicitante'] ) && isset($_POST['Contacto']) && isset($_POST['Instalacion']) && isset($_POST['Disciplina'])){
                $i=$_POST['Id'];
               $d = $_POST['Fecha'];
               $f = $_POST['Hora'];
               $g = $_POST['Solicitante'];
               $h = $_POST['Contacto'];
               $k = $_POST['Instalacion'];
               $j = $_POST['Disciplina'];

               $sql = "   
               update reservaf5
               set Fecha='$d', Hora='$f', Solicitante='$g', Contacto='$h', Instalacion='$k', Disciplina='$j' 
               where Id='$i';
                
               ";
               
               $resultado=mysqli_query($conexion,$sql);
              
           
          
           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>

<?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['r'])) {
               
               $r=$_GET['r'];
               
               $sql = "   
               delete from reservaf5
               where Id=$r;
                
               ";
               
               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>

<!-- eliminacion de la reserva, atraves del nombre -->
<?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['ni'])&& isset($_GET['s'])) {
               
               $ni=$_GET['ni'];
               $s=$_GET['s'];
               
               $sql = "   
               delete from reservaf5
               where Instalacion=(select Id from instalacion where Nombre='$ni') and Solicitante='$s';
                
               ";
               
               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>

<!-- insert de una nueva reserva -->
<?php
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['ni'])&& isset($_GET['sr']) && isset($_GET['cont'])&& isset($_GET['hora'])&& isset($_GET['fecha']) ) {
               
               $ni=$_GET['ni'];
               $s=$_GET['sr'];
               $cont=$_GET['cont'];
               $hora=$_GET['hora'];
               $fecha=$_GET['fecha'];
               
               $sql = "   
                  insert into reservaf5(Fecha,Hora,Solicitante,Contacto,Instalacion,Estado) values('$fecha','$hora','$s',$cont,(select Id from instalacion as i where i.Nombre='$ni'),'deuda' );
                  ";
               //---------modelo-----------------
               //INSERT INTO `reservaf5` (`Id`, `Fecha`, `Hora`, `Solicitante`, `Contacto`, `Instalacion`, `Estado`) VALUES (NULL, '2021-11-10', '09:00:00', 'Juancito', '34433', '2', 'deuda');
               //insert into reservaf5(Fecha,Hora,Solicitante,Contacto,Instalacion,Estado) values('2021-11-11','09:00:00','HGGGG',123,(select Id from instalacion as i where i.Nombre='Cancha 1 Futbol 5'),'deuda' );
               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }

?>






















    <div class="reg" id="reg">
                        <div class="cont_vent" id="cont_vent">
                            <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                <p class="txt_registrar" >Registrar Nueva Reserva</p>
                            
                                <!-- <form action="<?php// echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="f"  class="forminsumo"> -->
                                <div class="registrar" >
                                          <!--<label class=label > ID: </label> <input type="text" name="txt_Id" required> </input>-->
                                    
                                      <label class=label > Fecha: </label> <input type="date" name="txt_Fecha" id='fechavent' readonly required  > </input>
                                      <label class=label > Hora: </label> <input type="time" name="txt_Hora" id='horavent' readonly required> </input>
                                      <label class=label > Instalacion: </label> <input type="text" name="txt_Instalacion" id='instalacionvent' readonly required> </input>

                                      <label class=label > Solicitante: </label> <input type="text" name="txt_Solicitante"  id ='solicitantevent'required> </input>
                                      <label class=label > Contacto: </label> <input type="text" name="txt_Contacto" id='contactovent' required> </input>
                                  
                                      <input type="submit" name="registrar" value="Registrar" id='btnregistrar' class="btnregistrar">
                                </div>
                                <!-- </form> -->
                      </div>
                    
               </div>

               <div class="reg" id="reg2">
    <div class="cont_vent" id="cont_vent">
      
      <br>
      <h5>¿Desea anular la reserva?</h5>
      <br>
      <!-- <form method="POST" > -->
      <div class="row">
          <div class="col-md-6">
            <button type="submit" id='btncancelar' class="btncancelarnew" name="accion" value="btncancelar">Cancelar</button>
          </div>
          <div class="col-md-6">
            <button type="submit" id='btnconfirmar' class="btnconfirmarnew" name="accion" value="btnconfirmar">Confirmar</button>
          </div>
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

<div class="mainmain">
<p class="textordencompra">RESERVAS</p>

  
                          

                          

                          
                    <p id="txtconsulta">
                     
                    

                    </p>


                                                                      <?php 

                                                                  $conexion=mysqli_connect('localhost','root','','debian2');

                                                              ?>





                                                                      <?php
                                                                      $x=0;
                                                                      
                                                                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                        ?>
                                                                                     <!-- CAMBIE TODOS LOS EMPTY A ISSET EN LOS IF -->
                                                                                    <?php

                                                                          
                                                                          if (!isset($_POST["txt_Fecha"])) {
                                                                              $nameErr = "Fecha is required";
                                                                              $_POST["txt_Fecha"]=array();
                                                                              $x=1;
                                                                          
                                                                          } else {
                                                                              $txt_Fecha = test_input($_POST["txt_Fecha"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_Hora"])) {
                                                                              $catErr = "Hora is required";
                                                                              $_POST["txt_Hora"]=array();
                                                                              $x=1;
                                                                          
                                                                          } else {
                                                                              $txt_Hora= test_input($_POST["txt_Hora"]);
                                                                          }

                                                                          if (!isset($_POST["txt_Solicitante"])) {
                                                                            $catErr = "Solicitante is required";
                                                                            $_POST["txt_Solicitante"]=array();
                                                                            $x=1;
                                                                        
                                                                        } else {
                                                                            $txt_Solicitante= test_input($_POST["txt_Solicitante"]);
                                                                        }

                                                                        if (!isset($_POST["txt_Contacto"])) {
                                                                            $catErr = "Contacto is required";
                                                                            $_POST["txt_Contacto"]=array();
                                                                            $x=1;
                                                                        
                                                                        } else {
                                                                            $txt_Contacto= test_input($_POST["txt_Contacto"]);
                                                                        }
                                                                        if (!isset($_POST["txt_Instalacion"])) {
                                                                            $catErr = "Instalacion is required";
                                                                            $_POST["txt_Instalacion"]=array();
                                                                            $x=1;
                                                                        
                                                                        } else {
                                                                            $txt_Instalacion= test_input($_POST["txt_Instalacion"]);
                                                                        }
                                                                        if (!isset($_POST["txt_Disciplina"])) {
                                                                          $catErr = "Disciplina is required";
                                                                          $_POST["txt_Disciplina"]=array();
                                                                          $x=1;
                                                                      
                                                                      } else {
                                                                          $txt_Disciplina= test_input($_POST["txt_Disciplina"]);
                                                                      }









                
                                                                          if ($x==0) {
                                                                              
                                                                              $txt_Fecha=$_POST['txt_Fecha'];
                                                                              $txt_Hora=$_POST['txt_Hora'];
                                                                              $txt_Solicitante=$_POST['txt_Solicitante'];
                                                                              $txt_Contacto=$_POST['txt_Contacto'];
                                                                              $txt_Instalacion=$_POST['txt_Instalacion'];
                                                                              $txt_Disciplina=$_POST['txt_Disciplina'];
                                        

                                                                              $comprobardato = mysqli_query($conexion,"select * from reservaf5 where Fecha = '$txt_Fecha' ");
                                                                              if(mysqli_num_rows($comprobardato)>0)
                                                                              {
                                                                              }
                                                                              else
                                                                              {
                                                                
                                                                              //-------------------------------------------
                                                                              $sql="INSERT INTO reservaf5 (Fecha,Hora,Solicitante,Contacto,Instalacion,Disciplina)Values('$txt_Fecha','$txt_Hora','$txt_Solicitante','$txt_Contacto','$txt_Instalacion','$txt_Disciplina')";
                                                                                $result=mysqli_query($conexion,$sql);
                                                                                $_SESSION['inserted_db'] = FALSE;
                                                                
                                                                              }
                                                                              unset($comprobardato);


                                                                              unset($_POST['txt_Fecha']);
                                                                              unset($_POST['txt_Hora']);
                                                                              unset($_POST['txt_Solicitante']);
                                                                              unset($_POST['txt_Contacto']);
                                                                              unset($_POST['txt_Instalacion']);
                                                                              unset($_POST['txt_Disciplina']);
               
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
                                                                          
                                                                      

                                                            <div class="datatable-container">

                                                                                  <div class="header-tools">
                                                                                  <p class="txtbusq"> Fecha </p>
                                                                                  <input type="date" class="txtbusq" name ="date_fec_remito" id="busqueda2" placeholder=".col-xs-3" value="2021-11-10">
                                                                                  

                                                                                  <p class="txtbusq"> Horario </p>
                                                                                  <input type="time" class=select id="idprov" name="proveedor" min="09:00" max="22:00" value="09:00:00"></input>
                                                                                  <div class="contbtnreg">
                                                                                                
                                                                                              </div>
                                                                                    
                                                                                        <button class="btnvent button " id="btnvent">Cobrar</button>
                                                                                       
                                                                                              <!--<button>Ant</button><button>Sig</button> -->
                                                                                              </div>
                                                                                              <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead class="tablaenc">       
                                                                                                    <th id="comercial">Instalación</th>
                                                                                                
                                                                                                    <th id="comercial">Solicitante</th>                
                                                                                                    <th id="comercial">Acción</th>
                                                                                                    

                                                                                                    
                                                                                                </thead>
                                                                                                <!-- <tbody>

                                                                                                </tbody> -->
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

    <script src="../js/mainreservaf5.js?v=<?php echo(rand()); ?>"></script>

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/reservaf5.js?v=<?php  echo(rand()); ?>"></script>

                    


                    

</body>
</html>