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
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->

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
    
  <div class="reg" id="reg">
    <div class="cont_vent" id="cont_vent">
      <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
      <p class="txt_registrar" >Registrar Deposito</p>                    
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



    <div class="mainmain">
      <p class="textordencompra"> ADMINISTRACION DE DEPOSITOS  </p>
      <p id="txtconsulta"></p>
      <?php  $conexion=mysqli_connect('localhost','root','','debian2');?>

      <div class="datatable-container">
        <div class="header-tools">
          <div class="contbtnreg">
            <button class="btnvent button " id="btnvent">Registrar Nuevo Deposito</button>   
          </div>
          <div class="buscador">
            <p class="txtbusq">Buscar:</p>
            <input type="text" id="busqueda" class="busqueda" name="busqueda"> </input>
            <button class="btnvent button " id="btnverinsumos">Ver insumos x dep</button>  
          </div> 
        </div>
        <table id="tabla" class="table table-striped datatable table-bordered border-primary">
          <thead class="tablaenc">       
            <th id="idproveedor">Id</th>
            <th id="empresa">Nombre</th>
            <th id="comercial">Tipo</th>   
          </thead>
        </table>
        <div class="pages">
          <ul>
            <li><button id="btnpag1">1</button></li>
            <li><button id="btnpag2">2</button></li>
            <li><button id="btnpag3">3</button></li>
            <li><button id="btnpag4">4</button></li>
            <li><button id="btnpag5">5</button></li>
          </ul>
        </div>
      </div>
      <!--<button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block"> Ver insumos por depositos</button>-->

      <!-- VENTANA EMERGENTE DE INSUMOS POR DEPOSITOS -->
      <div class="reg" id="ventinsumoxdepo">
        <div class="cont_vent cont_vent_mov_stock cont_ventinsumoorden" id="contenidoventinsumo">
          <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="cerrarinsumosxdepo">
          <p class="txt_registrar" >Seleccionar Insumo</p>
          <div class="buscador">
            <p class="txtbusq">Buscar</p>
            <input type="text" id="busquedainsumo" class="busquedamov" name="busquedamov"> </input>
          </div>
          <div class="datatable-container-insumo-ordencompra">
            <table id="tablainsumo" class="table table-striped datatable table-bordered border-primary">
              <thead>       
                <th id="">Id</th>
                <th id="">Id_categoria</th>
                <th id="">Nombre</th>
                <th id="">Descripcion</th>
                <th id="">Precio</th>
                <th id="">Stock</th>
                <th id="">Accion</th>
              </thead>
            </table>
            <div class="pages">
              <ul>
                  <li><button id="pag1insumos">1</button></li>
                  <li><button id="pag2insumos">2</button></li>
                  <li><button id="pag3insumos">3</button></li>
                  <li><button id="pag4insumos">4</button></li>
                  <li><button id="pag5insumos">5</button></li>
              </ul>
            </div>
          </div>
        </div>
      </div>                                                                     
                        
    </div>
  </div>
  

                                                                                                                                                        


  <?php
    include '../includes/footer.php'
    ?>
    
    <script src="../js/maindepo.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/insumosxdeposito.js?v=<?php //echo(rand()); ?>"></script> -->

    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/paginaciones/depositos.js?v=<?php  echo(rand()); ?>"></script>


</body>
</html>