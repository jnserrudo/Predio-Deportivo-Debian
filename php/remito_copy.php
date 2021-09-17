<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    
   <!-- <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">  -->
</head>
<body>


<header class="header">
        <div class="logo">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            <button class="btnlogin"> <p class="text">CERRAR SESION</p> </button>

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino" alt="">
            </div>
        </div>
    </header>
    
    <div class="main">


   
    <h1 class="text_form">Seleccione Productos</h1>

    


    <?php  
    try{$conexion = mysqli_connect('localhost','root','','debian2');





    }
    catch(PDOException $e){
        echo "Error ".$e->getMessage();
    }
    $conexion = mysqli_connect('localhost','root','','debian2');
    
    
    
    ?>
    <div class="activar" id="reg">
   
    
    <div class="buscador">
    <p class="txtbusq">Buscar</p> <input type="text" id="busqueda_remito" class="busqueda" name="busqueda_remito"> </input>
    </div>     
    <div class="lbl_cantidad">

         <label class="text_form">Cantidad</label> <input type="text" id="txt_cantidad" name="txt_cantidad">
        
        </div>
<div class="tablasss">
    <div class="div_insumo">



   <table id="tablainsumo"class="table table-striped  table-bordered border-primary" >
        <thead>
            <th id="">Id</th>
            <th id="">Id_categoria</th>
            <th id="">Nombre</th>
            <th id=""> Descripcion</th>
            <th id=""> Precio</th>
            <th id=""> Stock</th>
           <!-- <th id=""> Cantidad</th>-->
            <td id=""> Accion </td>
            
        </thead>

</table>
    </div>
     
  
          

<div>
    <h3 class="h3_rem">Productos del Remito</h3>
</div>
<?php
            if(isset($_POST['accion'])){
                $t=$_POST["txt_cod_remito"]; //codigo remito
                  $_SESSION["codigo_remito"]=$t;
                  $o=$_POST["txtIDorden"]; //codigo oreden
                  $f=$_POST["date_fec_remito"]; //fecha

            ?>
                      
            <?php
            $sql="INSERT INTO remito(Id,Id_Orden,Fecha)Values($t,$o,'$f')";
                                                                                      
           $result=mysqli_query($conexion,$sql);
        }   
          ?>
          
<?php
          if(isset($_GET['m'])){ //si se selecciono un producto
           
            $remito=$_SESSION["codigo_remito"];
           
            $m=$_GET["m"];//m es el id del insumo

            $cantidad=$_GET["cantidad"];
            $sql="INSERT INTO remito_detalle(Id_remito,Id_insumo,Cantidad)Values($remito,$m,'$cantidad')";                                                                                      
           $result=mysqli_query($conexion,$sql);}   
          ?>
          <div class="div_remito">
   <table id="tablaremito" class="table table-striped  table-bordered border-primary">
                <tr>       
                       <td id="">Id</th>
                       <td id="">Id_Remito</th>
                       <td id="">Nombre del Insumo</th>
                       <td id="">Cantidad</th>           
                      </tr>
                    <?php 
                    if(isset($_SESSION["codigo_remito"])){
                        $mostrar_rem=$_SESSION["codigo_remito"];
                        

                   $sql1="SELECT remito_detalle.Id,Id_remito,Nombre,Cantidad 
                   FROM remito_detalle  
                   INNER JOIN insumo
                   ON remito_detalle.Id_insumo = insumo.Id
                   where remito_detalle.Id_remito=$mostrar_rem";
                    $result=mysqli_query($conexion,$sql1);
                    while($mostrar=mysqli_fetch_array($result)){
            ?>
                        <tr>
                                <td><?php echo $mostrar['Id'] ?></td>
                                <td><?php echo $mostrar['Id_remito'] ?></td>
                                <td><?php echo $mostrar['Nombre'] ?></td> <!--id_insumo -->
                                <td><?php echo $mostrar['Cantidad'] ?></td>
                        </tr>
                  <?php
                    }

                 } ?>  
            </table>
                </div>
            <div class="formu">
        <form method="get" action="remito1.php">
        <input class="btn_remito" type="submit"id="btn_cancelar" name="btn_cancelar"value="cancelar "><input type="submit"id="btn_remito" class="btn_remito" value="confirmar"> 
        </form>
    </div>


</div>
    <div class="mainflex">


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
    <script src="../js/mov_stock_remito.js"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>   
                    


                    

</body>

</html>