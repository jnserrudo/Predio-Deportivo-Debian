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
           
           if ( isset($_POST['Id']) && isset($_POST['Nombre']) && isset($_POST['Tipo']) ) {
                $i=$_POST['Id'];
               $n=$_POST['Nombre'];
               $d = $_POST['Tipo'];
               
               $sql = "   
               update instalacion
               set Nombre='$n', Tipo='$d'
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
               delete from instalacion
               where Id=$r;
                
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
                                <p class="txt_registrar" >Registrar Instalacion</p>
                            
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="f"  class="forminsumo">
                                <div class="registrar" >
                                          <label class=label > Nombre: </label> <input type="text" name="txt_Nombre" required> </input>
                                    
                                      <label class=label > Tipo: </label> <input type="text" name="txt_Tipo" required> </input>
                                  
                                      <input type="submit" name="registrar" value="Registrar"  class="btnregistrar">
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
<p class="textordencompra"> ADMINISTRACION DE INSTALACIONES  </p>
                  <!-- <div class="buscador">
                    <p class="txtbusq">Buscar</p>
                    <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                    
                    </div> -->

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

                                                                          
                                                                          if (!isset($_POST["txt_Nombre"])) {
                                                                              $nameErr = "Nombre is required";
                                                                              $_POST["txt_Nombre"]=array();
                                                                              $x=1;
                                                                          
                                                                          } else {
                                                                              $txt_Nombre = test_input($_POST["txt_Nombre"]);
                                                                          }
                                                                              
                                                                          if (!isset($_POST["txt_Tipo"])) {
                                                                              $catErr = "Tipo is required";
                                                                              $_POST["txt_Tipo"]=array();
                                                                              $x=1;
                                                                          
                                                                          } else {
                                                                              $txt_Tipo= test_input($_POST["txt_Tipo"]);
                                                                          }
                
                                                                          if ($x==0) {
                                                                              
                                                                              $txt_Nombret=$_POST['txt_Nombre'];
                                                                              $txt_Tipo=$_POST['txt_Tipo'];
                                        

                                                                              $comprobardato = mysqli_query($conexion,"select * from instalacion where Nombre = '$txt_Nombre' ");
                                                                              if(mysqli_num_rows($comprobardato)>0)
                                                                              {
                                                                              }
                                                                              else
                                                                              {
                                                                
                                                                              //-------------------------------------------
                                                                              $sql="INSERT INTO instalacion (Nombre, Tipo)Values('$txt_Nombre','$txt_Tipo')";
                                                                                $result=mysqli_query($conexion,$sql);
                                                                                $_SESSION['inserted_db'] = FALSE;
                                                                
                                                                              }
                                                                              unset($comprobardato);


                                                                              unset($_POST['txt_Nombre']);
                                                                              unset($_POST['txt_Tipo']);
               
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
                                                                                  <div class="contbtnreg">
                                                                                              <button class="btnvent button " id="btnvent">Registrar Nueva Instalacion</button>   
                                                                                              </div>
                                                                                    <div class="buscador">
                                                                                        <p class="txtbusq">Buscar</p>
                                                                                        <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
                                                                                        
                                                                                        </div>  

                                                                                  </div>
                                                                                          <table id="tabla" class="table table-striped datatable table-bordered border-primary">
                                                                                                <thead class="tablaenc">       
                                                                                                    <th id="idproveedor">Id</th>
                                                                                                    <th id="empresa">Nombre</th>
                                                                                                    <th id="comercial">Tipo</th>
                                                                                                    
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
                                                                                              <!--<button>Ant</button><button>Sig</button> -->
                                                                                              </div>
                                                                                          
                        
                </div>

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
    <script src="../js/maininstalacion.js?v=<?php echo(rand()); ?>"></script>

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/instalacion.js?v=<?php  echo(rand()); ?>"></script>

                    


                    

</body>
</html>