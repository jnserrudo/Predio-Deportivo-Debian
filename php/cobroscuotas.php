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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
  <?php

  $t = $_GET['t'];
  include("configcomprobante/confg.php");//incluye la conexion
  $SQLSocio = $conexion-> prepare ("SELECT Apellido,Nombre from socio where Id = :idsocio");
  $SQLSocio->bindParam(':idsocio',$t);
  $SQLSocio->execute();
  $Socio=$SQLSocio->fetch(PDO::FETCH_LAZY);

  $txtsocio=$Socio[0];
  $txtsocio=$txtsocio.' '.$Socio[1];

  $m=intval((isset($_POST['txtmes']))?$_POST['txtmes']:"");
  $a=intval((isset($_POST['txtaño']))?$_POST['txtaño']:"");
  //$s=intval((isset($_POST['txtsaldo']))?$_POST['txtsaldo']:"");
  $p=intval((isset($_POST['txtpago']))?$_POST['txtpago']:"");
  $tipo=intval((isset($_POST['tipopago']))?$_POST['tipopago']:"");
/*
  intval($m);
  intval($a);
  intval($s);
  intval($p);
*//*
  $saldo = $s;
  $pago = $s;
  //intval($saldo);
  if($s>=$p){
    $saldo = $s-$p;
    $pago = $p;
  }*/

  $accion=(isset($_POST['accion']))?$_POST['accion']:"";
  switch($accion){
    case "btnpagar":

      $SQLidcuota = $conexion-> prepare ("SELECT Id FROM socio_cuota WHERE Id_socio=$t and Mes=$m AND Anio = $a;");
      $SQLidcuota->execute();
      $resultadoIDcuota=$SQLidcuota->fetch(PDO::FETCH_LAZY);
      $Idcuota=$resultadoIDcuota[0];

      $SQLsaldocuota = $conexion-> prepare ("SELECT Saldocuota FROM socio_cuota WHERE Id=$Idcuota;");
      $SQLsaldocuota->execute();
      $resultadosaldo=$SQLsaldocuota->fetch(PDO::FETCH_LAZY);
      $s=$resultadosaldo[0];

      $saldo = intval($s);
      $pago = intval($s);
      if($s>=$p){
        $saldo = intval($s)-$p;
        $pago = $p;
      }

      $SQLpagar = $conexion-> prepare("UPDATE socio_cuota SET Saldocuota = $saldo WHERE Id_socio=$t and Mes=$m AND Anio = $a;");
      $SQLpagar->execute();
      /*
      date_default_timezone_get();
      $fechaactual = date("Y-m-d");*/
      
      $SQLpagar = $conexion-> prepare("INSERT INTO socio_cuota_pagos VALUES (null,$Idcuota,$t,curdate(),$pago,(SELECT fp.Detalle FROM formas_pago as fp WHERE fp.Id = $tipo))");
      $SQLpagar->execute();


    break;
  }

  ?>

  <div class="reg" id="reg">
    <div class="cont_vent" id="cont_vent">
      <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
      <p class="txt_registrar" >Registrar Nuevo Deposito</p> 
      <form  method="POST" class="forminsumo">
        <div class="registrar">
          <label class=label > Cuota Mes:</label> <input type="number" name="txtmes"  id="txtmes" readonly > </input>
          <label class=label > Cuota Año:</label> <input type="number" name="txtaño" id="txtaño" readonly > </input>
          <label class=label > Importe Cuota:</label> <input type="text" name="txtsaldo" id="txtsaldo" readonly> </input>
          <label class=label > Importe a Pagar:</label> <input type="number" id="txtpago" name="txtpago" min="1"  required placeholder="$"> </input>
          <label class=label > Forma de Pago:</label>
          <select class="form-select" name="tipopago" id="tipopago">
            <option value="0">Efectivo</option>
            <option value="1">Tarjeta de Debito</option>
            <option value="2">Tarjeta de Credito</option>
            <option value="3">Transferencia</option>
          </select>
          <button type="submit"  class="btnconfirmarnew" name="accion" value="btnpagar">Pagar</button>
        </div>
      </form>
    </div>
  </div>

<!--




  AGREGAR FORMA DE PAGO
  VER SI SE PUEDEN SELECCIONAR VARIAS CUOTAS PARA PAGAR
  LA PARTE DE DEUDORES SACAR DE ESTA PARTE Y PONER EN EL MENU DE LA IZQUIERA UN COSO QUE DIGA VER DEUDORES




-->
    <div class="main">
    <?php
    /*
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
    */
    ?>
    <div class="mainmain">
      <p class="textordencompra">COBRO DE CUOTAS</p>
      <div class="datatable-container-depositos">
        <div class="container">
            <div class="header-tools">
                <div class="row">
                    <div class="col-md-3">
                        <p class="txtbusq">Id:</p>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="<?php echo $t; ?>" name ="txtidsocio" id="txtidsocio" readonly="">
                    </div>
                    <div class="col-md-3">
                        <p class="txtbusq">Socio:</p>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="<?php echo $txtsocio; ?>" name ="txtsocio" id="txtsocio" readonly="">
                    </div>
                </div>
            </div>
          <div class="header-tools">
            <div class="contbtnreg">
              <button class="btnvent button " id="btnvolver">Volver</button> 
            </div>
            <div class="buscador">
              <p class="txtbusq">Buscar:</p>
              <input type="text" id="buscarcuota" class="busqueda" name="buscarcuota"> </input>
            </div>     
          </div>
          <table id="tablacuotas" class="table table-striped datatable table-bordered border-primary">
            <thead class="tablaenc">       
              <th id="idcuota">Id</th>
              <th id="mescuota">Mes</th>
              <th id="añocuota">Año</th>
              <th id="importecuota">Saldo</th>
              <!--<th id="seleccioncuota">Seleccion</th>-->
              <th id="accion">Accion</th>
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


    <script src="../js/cobroscuotas.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/insumosxdeposito.js?v=<?php //echo(rand()); ?>"></script> -->
    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <!--<script src="../js/paginaciones/socioscuotaspag.js?v=<?php  //echo(rand()); ?>"></script>-->

</body>
</html>
