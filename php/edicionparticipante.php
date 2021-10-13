<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleeditinsumo.css?v=<?php echo(rand()); ?>">
</head>
<body>
<header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>

    <div class="main">
<!--
    <div class="imgedit">
            <img src="../assets/imagenes/canchas.jpg"  class="imgcancha" alt="">
        </div>  -->
        <div class="cont_orden_pago">
            <div class="contedicion_orden_pago">
            <img src="../assets/imagenes/bebi.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/camiseta.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/pelota.png"class="imgicon" alt="">
                
            
            </div>
            <div class="contformsocios">
                <form class="form_orden_pago"action="abmparticipante.php" method="get" id="form">
                    <div class="contformitems_ordenpago_socios">

                                                                <?php 
                                                                        $conexion = NULL;
                                                                             try{
                                                                                 $conexion = mysqli_connect('localhost','root','','debian2');
                                                                                        
                                                                                if (isset($_GET['t'])) {
                                                                                            $z = $_GET['t'];
                                                                                            $GLOBALS['z']=$z;
                                                                                            
                                                                                            $sql = "SELECT * FROM participante where Id=$z";
                                                                                            
                                                                                            $resultado=mysqli_query($conexion,$sql);
                                                                                        
                                                                                        $resultados=mysqli_fetch_array($resultado);
                                                                                        
                                                                                        $j=json_encode($resultados);
                                                                                        
                                                                                        }
                                                                                        
                                                                                    }catch (PDOException $e){
                                                                                        echo "Error ".$e->getMessage();
                                                                                    }




                                                                            require('queryedicionparticipante.php');
                                                                            ?>








                    <!--<label for="precio"></label> -->
                    
                        <?php 
                        $conexion = NULL;
                                try{
                                    $conexion = mysqli_connect('localhost','root','','debian2');
                                    
                                    if (isset($_GET['t'])) {
                                        $z = $_GET['t'];
                                        $GLOBALS['z']=$z;
                                        
                                        $sql = "SELECT * FROM participante where Id=$z";
                                        
                                    $resultado=mysqli_query($conexion,$sql);                             
                                    $resultados=mysqli_fetch_array($resultado);
                                    
                                    $j=json_encode($resultados);
                                    
                                    }
                                    
                                } catch (PDOException $e){
                                    echo "Error ".$e->getMessage();
                                } 

                        require('queryedicionparticipante.php');
                        ?>
                        <label for="id">id:</label>
                         <input type="text" id="id" class="input_ordenpago" name="id" value=<?php  echo $resultados[0]; ?>>  

                        <label for="nom">
                        Nombre:</label> <input type="text" id="nom" class="input_ordenpago" name="nom" value=<?php  echo $resultados[1]; ?>>  

                        <label for="apellido">Apellido:</label>
                        <input type="text" id="tel" class="input_ordenpago" name="Apellido" value=<?php  echo $resultados[2]; ?>>

                        <label for="DNI">DNI:</label>
                        <input type="text" id="DNI" class="input_ordenpago" name="DNI" value=<?php  echo $resultados[3]; ?>>
                        
                        <label for="Estado">Estado:</label>
                        <input type="text" id="Estado" class="input_ordenpago" name="Estado" value=<?php  echo $resultados[4]; ?>>

                        <label for="Email">Email:</label>
                        <input type="text" id="Email" class="input_ordenpago" name="Email" value=<?php  echo $resultados[5]; ?>>

                        <label for="Direccion">Direccion:</label>
                        <input type="text" id="Direccion" class="input_ordenpago" name="Direccion" value=<?php  echo $resultados[6]; ?>>

                        <label for="Telefono">Telefono:</label>
                        <input type="text" id="Telefono" class="input_ordenpago" name="Telefono" value=<?php  echo $resultados[7]; ?>>








                    
                        </div>
                </form>
                <div class="div_contbtn_orden_pago">
                <!--    <div class="contbtneliminar"> -->
                         <button class="btn_editar_orden_pago" id="btnrip" >Eliminar Participante</button>
                <!--    </div>
                </div>
               
            <div class="contbtn">   -->
           
             <button class="btn_editar_orden_pago" id="btnconf" >Confirmar</button>    
                <button class="btn_editar_orden_pago" id="btncanc">Volver</button>
            </div>
        </div>
        <!-- <p id="prueba"> <?php // echo $resultados[0]; ?> </p> -->


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

      <script src="../js/editparticipante.js?v=<?php echo(rand()); ?>"></script>
   
                    
</body>
</html>