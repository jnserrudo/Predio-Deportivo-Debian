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
      <p class="textordencompra">DEPOSITOS</p>
      <div class="datatable-container-depositos">
        <div class="container">
          <div class="header-tools">
            <div class="contbtnreg">
              <button class="btnvent button " id="btnnuevodepo">Registrar Nuevo Deposito</button> 
              <button class="btnvent button " id="verinsumos">Ver Insumos del Deposito</button>  
            </div>
            <div class="buscador">
              <p class="txtbusq">Buscar:</p>
              <input type="text" id="busquedadepo" class="busqueda" name="busquedadepo"> </input>
            </div>
          </div>
          <table id="tabladepositos" class="table table-striped datatable table-bordered border-primary">
            <thead class="tablaenc">       
              <th id="iddepo">Id</th>
              <th id="nombredepo">Nombre</th>
              <th id="tipodepo">Tipo</th>
              <th id="accion">Accion</th>
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
      </div>

    </div>
    </div>

    <?php include '../includes/footer.php'?>
  </div>





  <script src="../js/maindepo.js?v=<?php echo(rand()); ?>"></script>
  <!-- <script src="../js/insumosxdeposito.js?v=<?php //echo(rand()); ?>"></script> -->
  <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
  <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
  <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
  <script src="../js/paginaciones/depositos.js?v=<?php  echo(rand()); ?>"></script>

</body>
</html>