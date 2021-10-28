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
    <link rel="stylesheet" href="../css/insuposxdepo.css?v=<?php echo(rand()); ?>">


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

   //Toma el id del deposito de la pagina abmdepositos.php y encuentra el nombre del deposito seleccionado
    $t = $_GET['t'];
    include("configcomprobante/confg.php");//incluye la conexion
    $SQLdepositonombre = $conexion-> prepare ("SELECT Nombre from deposito where Id = :iddeposito");
    $SQLdepositonombre->bindParam(':iddeposito',$t);
    $SQLdepositonombre->execute();
    $NombreDeposito=$SQLdepositonombre->fetch(PDO::FETCH_LAZY);

    $txtDeposito=$NombreDeposito[0];


    $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
           
           if ( isset($_GET['q'])) {
               
               $q=$_GET['q'];
               
               $sql = "   
               delete from deposito_detalle
               where Id_insumo=$q and Id_deposito=$t ;
                
               ";
               
               $resultado=mysqli_query($conexion,$sql);
           

           }
           
       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }
  ?>

  <div class="reg" id="reg">
    <div class="cont_vent_insumxdepo" id="cont_vent">
      <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
      <p class="txt_registrar" >Agregar Insumos</p> 
      <div class="container">
        <div class="header-tools">
          <div class="buscador">
            <p class="txtbusq">Buscar:</p>
            <input type="text" id="busquedainsumo2" class="busqueda" name="busquedainsumo2"> </input>
          </div> 
        </div>
        <br>
        <div class="header-tools">
          <div class="row">
            <div class="col-md-2">
              <p class="txtbusq invisible">Cantidad:</p>
            </div>
            <div class="col-md-3">
              <input type="number" class="form-control invisible" value="" name ="inputcant" id="inputcant" required placeholder="Cantidad a agregar">
            </div>
            <div class="col-md-4">
              <p class="txtbusq">Nombre del Deposito:</p>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" value="<?php echo $txtDeposito; ?>" name ="txtDepositoventana" id="txtDepositoventana" readonly="">
            
            </div>
             
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
          <div class="datatable-container-depositos-insumos">
            <table id="tablatotalinsumos" class="table table-striped datatable table-bordered border-primary">
              <thead class="tablaenc">       
                <th id="idproduc">Id</th>
                <th id="nomproduc">Nombre</th>
                <th id="descripproduc">Descripcion</th>
                <th id="stockproduc">Stock</th>
                <th id="btnagregar">Acción</th>
              </thead>
            </table>
            <div class="pages">
              <ul>
                <li><button id="btnpagina1">1</button></li>
                <li><button id="btnpagina2">2</button></li>
                <li><button id="btnpagina3">3</button></li>
                <li><button id="btnpagina4">4</button></li>
                <li><button id="btnpagina5">5</button></li>
              </ul>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="datatable-container-depositos-insumos">
            <table id="tablainsumosnew" class="table table-striped datatable table-bordered border-primary">
              <thead class="tablaenc">       
                <th id="idproducnew">Id</th>
                <th id="nomproducnew">Nombre</th>
                <th id="descripproducnew">Descripcion</th>
                <th id="cantproducnew">Cant</th>
                <th id="btneliminar">Acción</th>
              </thead>
            </table>
            <!--<div class="pages">
              <ul>
                <li><button id="btnpag1">1</button></li>
                <li><button id="btnpag2">2</button></li>
                <li><button id="btnpag3">3</button></li>
                <li><button id="btnpag4">4</button></li>
                <li><button id="btnpag5">5</button></li>
              </ul>
            </div>-->
          </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
          </div>  
          <div class="col-md-3">
            <!--<input id="submit"type="submit" name="btncancelar" value="Cancelar" class="btncancelarnew" required>-->
            <button class="btncancelarnew" id="btncancelar">Cancelar</button> 
          </div>
          <div class="col-md-3">
            <!--<input id="submit"type="submit" name="btnconfirmar" value="Confirmar" class="btnconfirmarnew" required>-->
            <button class="btnconfirmarnew" id="btnconfirmar">Confirmar</button> 
          </div>
        </div>

      </div>
    </div>
  </div>


  
<div class="reg" id="ventquitar">
             <div class="cont_vent cont_vent_quitar" id="cont_quitar">
             <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarquitar">
                                <div class="divquitar">
                                    <p class="txtbusq">Estas seguro de quitar este insumo del Deposito?</p>
                                    <button class="btnvent butto" id="btnsi">Si</button>
                                    <button class="btnvent butto" id="btnno">No</button>

                                </div>
                                                

             </div>
             </div>

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
              <div class="row">
                <div class="col-md-3">
                  <p class="txtbusq">Id del Deposito:</p>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control" value="<?php echo $t; ?>" name ="txtiddeposito" id="txtiddeposito" readonly="">
                </div>
                <div class="col-md-3">
                  <p class="txtbusq">Nombre del Deposito:</p>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control" value="<?php echo $txtDeposito; ?>" name ="txtDeposito" id="txtDeposito" readonly="">
                </div>
              </div>
            </div>
            <div class="header-tools">
              <div class="contbtnreg">
                <button class="btnvent button " id="btnnuevinsumo">Agregar Insumos</button>
                <button class="btnvent button " id="btnvolver"> Volver </button> 
              </div>
              <div class="buscador">
                <p class="txtbusq">Buscar:</p>
                <input type="text" id="busquedainsumo" class="busqueda" name="busquedainsumo"> </input>
              </div> 
            </div>
            <table id="tablainsumos" class="table table-striped datatable table-bordered border-primary">
              <thead class="tablaenc">       
                <th id="idproduc">Id</th>
                <th id="nomproduc">Nombre</th>
                <th id="descripproduc">Descripcion</th>
                <th id="stockproduc">Stock Minimo</th>
                <th id="stockproduc">Stock</th>
                <th id="stockproduc">Estado</th>
                <th id="stockproduc">Accion</th>


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





  <script src="../js/insumosdepo.js?v=<?php echo(rand()); ?>"></script>
  <!-- DEBO AGREGAR ESTOS DOS EN TODOS -->
  <script src="../js/prueba.js?v=<?php echo(rand()); ?>"></script>
  <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
  <script src="../js/paginaciones/insumosdepopag.js?v=<?php  echo(rand()); ?>"></script>

</body>
</html>