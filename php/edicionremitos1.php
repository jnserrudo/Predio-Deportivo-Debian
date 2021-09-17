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
            <!-- <?php echo $_SESSION['usuario']?></p> -->

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>

    <div class="main">

    <div class="imgedit">
            <img src="../assets/imagenes/canchas.jpg"  class="imgcancha" alt="">
        </div>
        <div class="cont">
            <div class="contedicion">
            <img src="../assets/imagenes/bebi.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/camiseta.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/pelota.png"class="imgicon" alt="">
                
            </div>
            <div class="contform">
                <form action="abmremitos1.php" method="get" id="form">
                    <div class="contformitems">

                                                                <?php 
                                                                        $conexion = NULL;
                                                                             try{
                                                                                 $conexion = mysqli_connect('localhost','root','','debian2');
                                                                                        
                                                                                if (isset($_GET['t'])) {
                                                                                            $z = $_GET['t'];
                                                                                            $GLOBALS['z']=$z;
                                                                                            
                                                                                                $sql = "SELECT remito.Id,remito.Id_orden,remito.Fecha,remito_detalle.Id_insumo,remito_detalle.Cantidad FROM remito INNER JOIN remito_detalle on remito_detalle.Id_remito=remito.Id WHERE remito.Id=$z;";
                                                                                           
                                                                                            $resultado=mysqli_query($conexion,$sql);
                                                                                        
                                                                                        $resultados=mysqli_fetch_array($resultado);
                                                                                        
                                                                                        $j=json_encode($resultados);
                                                                                        
                                                                                        }
                                                                                        
                                                                                    }catch (PDOException $e){
                                                                                        echo "Error ".$e->getMessage();
                                                                                    }




                                                                            require('queryedicion_remitos1.php');
                                                                            ?>



                    <label for="id">id:</label>
                    <!-- este no se deberia editar -->
                        <input id="id"type="text" readonly name="id" value=<?php  echo $resultados[0]; ?>>
                        <label for="Idorden1">Id Orden:</label>
                        <?php 
                        $conexion = NULL;
                                try{
                                    $conexion = mysqli_connect('localhost','root','','debian2');
                                    
                                    if (isset($_GET['t'])) {
                                        $z = $_GET['t'];
                                        $GLOBALS['z']=$z;
                                        
                                        $sql = "SELECT remito.Id,remito.Id_orden,remito.Fecha,remito_detalle.Id_insumo,remito_detalle.Cantidad FROM remito INNER JOIN remito_detalle on remito_detalle.Id_remito=remito.Id WHERE remito.Id=$z;";
                                        
                                    $resultado=mysqli_query($conexion,$sql);                             
                                    $resultados=mysqli_fetch_array($resultado);
                                    
                                    $j=json_encode($resultados);
                                    
                                    }
                                    
                                } catch (PDOException $e){
                                    echo "Error ".$e->getMessage();
                                } 

                        require('queryedicion_remitos1.php');
                        ?>
                        
                        <input type="text" id="Idorden1" class="input" name="Idorden1" value=<?php  echo $resultados[1]; ?>>

                        <label for="Fecha1">Fecha:</label>
                        <input name="Fecha1" id="Fecha1" cols="15" rows="3" name="Fecha1" value=<?php  echo $resultados[2]; ?>>

                        <label for="Idinsumo1">Id Insumo:</label>
                        <input type="text" id="Idinsumo1" class="precio" name="Idinsumo1" value=<?php  echo $resultados[3]; ?>>

                        <label for="Cantidad1">Cantidad:</label>
                        <input type="text" id="Cantidad1" class="input" name="Cantidad1" value=<?php  echo $resultados[4]; ?>>

                    
                        </div>
                </form>
                    <div class="contbtneliminar">
                         <button class="btn" id="btnrip" >Eliminar Remito</button>
                    </div>
                </div>
               
            <div class="contbtn">
           
             <button class="btn btnconfirmar" id="btnconf" >Confirmar</button>    
                <button class="btn btncancelar" id="btncanc">Volver</button>
            </div>
        </div>
        <p id="prueba"> <?php  echo $resultados[0]; ?> </p>



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

      <script src="../js/edit_remitos1.js?v=<?php echo(rand()); ?>"></script>
   
                    
</body>
</html>