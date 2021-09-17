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
        <div class="logo">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->

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
                <!--<p style="position: relative;font-size:50px; padding-left:35%;padding-top:5%;"> Editar</p> -->
            
            </div>
            <div class="contform">
                <form action="abmsocios.php" method="get" id="form">
                    <div class="contformitems">

                                                                <?php 
                                                                        $conexion = NULL;
                                                                             try{
                                                                                 $conexion = mysqli_connect('localhost','root','','debian2');
                                                                                        
                                                                                if (isset($_GET['t'])) {
                                                                                            $z = $_GET['t'];
                                                                                            $GLOBALS['z']=$z;
                                                                                            // echo $c;
                                                                                            // if(!$c=""){
                                                                                            $sql = "SELECT * FROM orden where Id=$z";
                                                                                            // }else{
                                                                                            //   $sql = "SELECT * FROM insumo";
                                                                                            $resultado=mysqli_query($conexion,$sql);
                                                                                        
                                                                                        $resultados=mysqli_fetch_array($resultado);
                                                                                        // var_dump($resultados);
                                                                                        $j=json_encode($resultados);
                                                                                        // $GLOBALS['res']=$resultados;
                                                                                        }
                                                                                        
                                                                                    }catch (PDOException $e){
                                                                                        echo "Error ".$e->getMessage();
                                                                                    }




                                                                            require('queryedicion_socios.php');
                                                                            ?>








                    <label for="precio"></label>
                    <!-- este no se deberia editar -->
                        <?php 
                        $conexion = NULL;
                                try{
                                    $conexion = mysqli_connect('localhost','root','','debian2');
                                    
                                    if (isset($_GET['t'])) {
                                        $z = $_GET['t'];
                                        $GLOBALS['z']=$z;
                                        // echo $c;
                                        // if(!$c=""){
                                        $sql = "SELECT * FROM orden where Id=$z";
                                        // }else{
                                        //   $sql = "SELECT * FROM insumo";
                                    $resultado=mysqli_query($conexion,$sql);                             
                                    $resultados=mysqli_fetch_array($resultado);
                                    // var_dump($resultados);
                                    $j=json_encode($resultados);
                                    // $GLOBALS['res']=$resultados;
                                    }
                                    
                                } catch (PDOException $e){
                                    echo "Error ".$e->getMessage();
                                } 

                        require('queryedicion_socios.php');
                        ?>
                                               Id: <input type="text" id="id" class="input" name="id" value=<?php  echo $resultados[0]; ?>>  

                        <label for="nom"></label>
                        Fecha: <input type="text" id="Fecha" class="input" name="Fecha" value=<?php  echo $resultados[1]; ?>>  

                        <label for="apellido">Id_proveedor:</label>
                        <input type="text" id="tel" class="imput" name="Id_proveedor" value=<?php  echo $resultados[2]; ?>>

                     
                        </div>
                </form>
                    <div class="contbtneliminar">
                         <button class="btn" id="btnrip" >Eliminar Orden de Compra</button>
                    </div>
                </div>
               
            <div class="contbtn">
           <!-- <input type="submit" class="btn btnconfirmar" id="btnconf" value="confirmar"> -->
             <button class="btn btnconfirmar" id="btnconf" >Confirmar</button>    
                <button class="btn btncancelar" id="btncanc">Volver</button>
            </div>
        </div>
        <p id="prueba"> <?php  echo $resultados[0]; ?> </p>



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

      <script src="../js/edit_orden.js?v=<?php echo(rand()); ?>"></script>
   <!-- <script src="../js/editinsumo.js?v=<?php echo(rand()); ?>"></script>  -->
                    
</body>
</html>