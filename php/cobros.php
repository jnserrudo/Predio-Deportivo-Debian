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

    <!-- ----------------------VENTANA EMERGENTE ------------------------------------- -->
    <div class="reg" id="reg">
    <div class="cont_vent" id="cont_vent">
      <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
      <br>
      <h5>¿Desea generar una deuda en concepto de cuota a todos los socios activos?</h5>
      <br>
      <form method="POST" >
      <div class="row">
          <div class="col-md-6">
            <button type="submit"  class="btncancelarnew" name="accion" value="btncancelar">Cancelar</button>
          </div>
          <div class="col-md-6">
            <button type="submit"  class="btnconfirmarnew" name="accion" value="btnconfirmar">Confirmar</button>
          </div>
      </div>
      </form>
    </div>
    </div>

    <?php
    include("configcomprobante/confg.php");//incluye la conexion

    $accion=(isset($_POST['accion']))?$_POST['accion']:""; //determina que boton se apreto   
    //verifica que boton se selecciono
    switch($accion)
    {
      case "btncancelar":
      //EL BOTON SIGUIENTE HACE UN INSERT Y VA A LA OTRA PAGINA
      /*
        $SQLinsertaremito = $conexion->prepare("INSERT INTO remito (`cod_remito`, `id_orden`, `fecha`) VALUES (:codremito, :idorden, :fecha)");
        $SQLinsertaremito->bindParam(':codremito',$txtcodremito);
        $SQLinsertaremito->bindParam(':idorden',$txtIDorden);
        $SQLinsertaremito->bindParam(':fecha',$txtfecha);
        $SQLinsertaremito->execute();
        header('Location: comprobante.php');*/
        //echo("cancelar");

        break;
        
      case "btnconfirmar":
        //EL BOTON SELECCIONAR LLENA LOS CAMPOS EN EL FORMULARIO 
        
        //$SQLseleccionarorden = $conexion->prepare("INSERT INTO cuotas VALUES (null, 20)");
        //$SQLseleccionarorden->bindParam(':idorden',$txtIDorden);
        //$SQLseleccionarorden->execute();
        //$ordenseleccionada=$SQLseleccionarorden->fetch(PDO::FETCH_LAZY); 
        //$txtIDorden=$ordenseleccionada['Id'];
        //$txtProveedor=$ordenseleccionada['Nombre'];
        $SQLobtenermesaño = $conexion-> prepare ("SELECT sc.Mes,sc.Anio FROM socio_cuota as sc JOIN socio as s on s.Id=sc.Id_socio where s.Estado = 'activo' ORDER BY sc.Anio,sc.Mes DESC LIMIT 1;");
        $SQLobtenermesaño->execute();
        $Cuota=$SQLobtenermesaño->fetch(PDO::FETCH_LAZY);

        $Mes=$Cuota[0];
        $Año=$Cuota[1];
        if($Mes==12){
          $Mes=1;
          $Año+=1;
        }
        else{
          $Mes+=1;
        }

        $SQLcantsocios = $conexion-> prepare("SELECT Id FROM socio ORDER BY Id DESC LIMIT 1;");
        $SQLcantsocios->execute();
        $Total=$SQLcantsocios->fetch(PDO::FETCH_LAZY);
        $Cant=$Total[0];

        $i = 1;

        while($i<=$Cant){
          $SQLEstado = $conexion-> prepare("SELECT Estado FROM socio WHERE Id = $i;");
          $SQLEstado->execute();
          $Estado=$SQLEstado->fetch(PDO::FETCH_LAZY);
          if($Estado){
            $Est=$Estado[0];
          }
          else{
            $Est="-/-nada ";
          }
          
          if($Est=="activo"){
            $SQLEstado = $conexion-> prepare("INSERT INTO socio_cuota VALUES (null,$i,$Mes,null,$Año,2500,2500);");
            $SQLEstado->execute();
          }
          $i++;
        }

        break;
    }
    ?>

    <!-- ---------------------- FIN VENTANA EMERGENTE ------------------------------------- -->


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
      <p class="textordencompra">ADMINISTRACION DE CUOTAS</p>
      <div class="datatable-container-depositos">
        <div class="container">
          <div class="header-tools">
            <div class="contbtnreg">
              <button class="btnvent button " id="btngenerardeuda">Generar Deuda</button> 
            </div>
            <div class="buscador">
              <p class="txtbusq">Buscar:</p>
              <input type="text" id="buscarsocio" class="busqueda" name="buscarsocio"> </input>
            </div>
          </div>
          <table id="tablasocios" class="table table-striped datatable table-bordered border-primary">
            <thead class="tablaenc">       
              <th id="idsocio">Id</th>
              <th id="apsocio">Apellido</th>
              <th id="nomsocio">Nombre</th>
              <th id="dnisocio">DNI</th>
              <th id="accion">Accion</th>
            </thead>
          </table>
          <div class="pages">
            <ul>
              <li><button id="btnpagsocios1">1</button></li>
              <li><button id="btnpagsocios2">2</button></li>
              <li><button id="btnpagsocios3">3</button></li>
              <li><button id="btnpagsocios4">4</button></li>
              <li><button id="btnpagsocios5">5</button></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include '../includes/footer.php'?>
    </div>


    <script src="../js/cobros.js?v=<?php echo(rand()); ?>"></script>
    <!-- <script src="../js/insumosxdeposito.js?v=<?php //echo(rand()); ?>"></script> -->
    <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
    <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <!--<script src="../js/paginaciones/depositos.js?v=<?php  //echo(rand()); ?>"></script>-->

</body>
</html>
