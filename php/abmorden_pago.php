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
           
           if ( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['desc']) ) {
                $i=$_POST['id'];
               $n=$_POST['nom'];
               $d = $_POST['desc'];                   
               $sql = "   
               update ordenpago
               set Fecha='$n',Descripcion='$d'
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
               delete from ordenpago
               where Id=$r;
                
               ";              
               $resultado=mysqli_query($conexion,$sql);         
           }           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }
?>





















    <!-- <div class="reg" id="reg">
                        <div class="cont_vent" id="cont_vent">
                            <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                <p class="txt_registrar" >Registrar Orden de Pago</p>
                            
                                <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="f"  class="forminsumo">
                                <div class="registrar" >
                                          
                                          <label class=label > Id Orden:</label> <input type="text" name="txt_nom" required> </input>
                                    
                                          <label class=label > Fecha:</label> <input type="date" name="txt_cat" required> </input>
                                    
                  
                       
                                      <input type="submit" name="registrar" value="Registrar"  class="btnregistrar">
                                </div>
                                </form>
                      </div>
                    
               </div> -->
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

          <!-- <div class="p-0 my-container divcontside ">
            
            <a class="btn contbtnnav" id="menu-btn">
              
                  <img src="../assets/imagenes/iconham.svg" class="iconham" alt="">
            </a>
            
          </div> -->


<div class="mainmain">
<p class="textordencompra"> ADMINISTRACION DE ORDENES DE PAGO  </p>
                  

                                  
                                                                      

<div class="datatable-container-ord-pago-abm">  <!---ord-pago-detalle -->

    <div class="header-tools">
<div class="contbtnreg">
            <button class="btnvent button " id="btnvolverordenpago">Volver</button>   
            <!-- tendria que estar oculto hasta que se seleccione una orden -->
            </div>
  <div class="buscador">
      <p class="txtbusq">Buscar</p>
      <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
      
      </div>  

</div>
        <table id="tabla" class="table table-striped datatable table-bordered border-primary">
              <thead class="tablaenc">       
                  <th id="idproveedor">Id</th>
                  <th id="empresa">Fecha</th>                  
                  <th id="comercial">Descripcion</th>
                  <th id="telefono">Accion</th>
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
    <!-- <script src="../js/main.js?v=<?php //echo(rand()); ?>"></script> -->

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/abmorden_pago.js?php  echo(rand()); ?>"></script>
    <script src="../js/orden_pago_pago.js?php  echo(rand()); ?>"></script>

                    


                    

</body>
</html>