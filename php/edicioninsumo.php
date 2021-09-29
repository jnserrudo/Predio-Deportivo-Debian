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
       <!-- <div class="imgedit">
            <img src="../assets/imagenes/canchas.jpg"  class="imgcancha" alt="">
        </div> -->
        <div class="cont_orden_pago">

        
            <div class="contedicion_orden_pago">
                    <img src="../assets/imagenes/bebi.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/camiseta.png"class="imgicon" alt="">
                    <img src="../assets/imagenes/pelota.png"class="imgicon" alt="">
            </div>
            <div class="contform_orden_pago">
                <form class="form_orden_pago"action="abminsumo.php" method="POST" id="form">
                    <div class="contformitems_ordenpago">

                                                                        <?php 
                                                                            $conexion = NULL;
                                                                                    try{
                                                                                        $conexion = mysqli_connect('localhost','root','','debian2');
                                                                                        
                                                                                        if (isset($_GET['t'])) {
                                                                                            $z = $_GET['t'];
                                                                                            $GLOBALS['z']=$z;
                                                                                            
                                                                                            $sql = "SELECT * FROM insumo where Id=$z";
                                                                                            
                                                                                            $resultado=mysqli_query($conexion,$sql);
                                                                                        
                                                                                        $resultados=mysqli_fetch_array($resultado);
                                                                                        
                                                                                        $j=json_encode($resultados);
                                                                                        
                                                                                        }
                                                                                        
                                                                                    }catch (PDOException $e){
                                                                                        echo "Error ".$e->getMessage();
                                                                                    }




                                                                            require('queryedicion.php');
                                                                            ?>



                        <?php 
                        $conexion = NULL;
                                try{
                                    $conexion = mysqli_connect('localhost','root','','debian2');                                   
                                   if (isset($_GET['t'])) {
                                        $z = $_GET['t'];
                                        $GLOBALS['z']=$z;
                                        $sql = "SELECT * FROM insumo where Id=$z";
                                        $resultado=mysqli_query($conexion,$sql);                                  
                                    $resultados=mysqli_fetch_array($resultado);
                                    $j=json_encode($resultados);
 
                                    }
                                    
                                }catch (PDOException $e){
                                    echo "Error ".$e->getMessage();
                                }

                        require('queryedicion.php');
                        ?>

                        <label for="id" class="label">Id:</label>
                    <!-- este no se deberia editar -->

                                <input type="text" id="id" class="input_ordenpago" name="id" value=<?php  echo $resultados[0]; ?>>
                                
                        <label for="nom" class="label">Nombre:</label>
                        
                        <input type="text" id="nom" class="input_ordenpago" name="nom" value=<?php  echo $resultados[2]; ?>>

                        <label for="desc" class="label">Descripcion:</label>
                        <textarea id="desc" cols="15" rows="3" class="input_ordenpago" name="desc" ><?php  echo $resultados[3]; ?></textarea>

                        <label for="precio" class="label">Precio:</label>
                        <input type="text" id="precio" class="input_ordenpago" name="precio" value=<?php  echo $resultados[4]; ?>>

                        <label for="stock" class="label">Stock:</label>
                        <input type="text" id="stock" class="input_ordenpago" name="stock" value=<?php  echo $resultados[5]; ?>>
                        
                    
                    </div>
                        
                </form>
                <div class="div_contbtn_orden_pago">
            <!--  <div class="contbtneliminar">  -->
                         <button class="btn_editar_orden_pago" id="btnrip" >Eliminar Insumo</button>
              <!--      </div>  
                    
                </div>
                            
            <div class="contbtn"> -->
                <button class="btn_editar_orden_pago" id="btnconf" >Confirmar</button>
                <button class="btn_editar_orden_pago" id="btncanc">Volver</button>
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
    <script src="../js/editinsumo.js?v=<?php echo(rand()); ?>"></script>
                    
</body>
</html>