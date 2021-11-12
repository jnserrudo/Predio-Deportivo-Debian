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
    

    date_default_timezone_get();
    $fechaactual = date("Y-m-d");
    //echo ($fechaactual);
    ?>
    <div class="mainmain">
      <p class="textordencompra">REPORTE DE COBRO DE CUOTAS</p>
      <div class="datatable-container-depositos">
        <div class="container">
            <div class="header-tools">
                <div class="row">
                    <div class="col-md-auto">
                        <p class="txtbusq">Fecha Desde:</p>
                    </div>
                    <div class="col-md-auto">
                        <input type="date" class="form-control" value="2000-01-01" name ="fechadesde" id="fechadesde" require >
                    </div>
                    <div class="col-md-auto">
                        <p class="txtbusq">Fecha Hasta:</p>
                    </div>
                    <div class="col-md-auto">
                        <input type="date" class="form-control" value="<?php echo ($fechaactual);?>" name ="fechahasta" id="fechahasta" require >
                    </div>
                    <div class="col-md-auto"></div>
                    <div class="col-md-auto"></div>
                    <div class="col-md-auto">
                        <button class="btnvent button " id="btnbuscar">Buscar</button> 
                    </div>
                </div>
            </div>
          <div class="header-tools">
            <div class="buscador">
              <p class="txtbusq">Buscar:</p>
              <input type="text" id="buscarsocio" class="busqueda" name="buscarcuota"> </input>
            </div>     
          </div>
          <table id="tablapagos" class="table table-striped datatable table-bordered border-primary">
            <thead class="tablaenc">       
              <th id="idpago">Id Pago</th>
              <th id="socio">Socio</th>
              <th id="mescuota">Mes</th>
              <th id="añocuota">Año</th>
              <th id="importe">Monto</th>
              <th id="formapago">Forma de Pago</th>
              <!--<th id="accion">Accion</th>-->
            </thead>
          </table>
          <div class="pages">
            <ul>
              <li><button id="btnpagcuotas1">1</button></li>
              <li><button id="btnpagcuotas2">2</button></li>
              <li><button id="btnpagcuotas3">3</button></li>
              <li><button id="btnpagcuotas4">4</button></li>
              <li><button id="btnpagcuotas5">5</button></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include '../includes/footer.php'?>
    </div>


    <script src="../js/cobroscuotasreporte.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/insumosxdeposito.js?v=<?php //echo(rand()); ?>"></script> -->
    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <!--<script src="../js/paginaciones/socioscuotaspag.js?v=<?php  //echo(rand()); ?>"></script>-->

</body>
</html>
