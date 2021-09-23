

<?php 

// Registrar en la tabla orden de paga usando el id 

if (isset($_GET['ido'])&& isset($_GET['mp'])&& isset($_GET['d'])) {
  $id = $_GET['ido'];
  $mp=$_GET['mp'];
  $d=$_GET['d'];

      $id=explode(',',$id);
      $mp=explode(',',$mp);

  $sql = "INSERT INTO ordenpago (Descripcion) values ($d)";

  $resultado=mysqli_query($conexion,$sql);

  // Registrar detalle de la orden ------------
  $consultaidorden = "select Id from ordenpago order by Id desc limit 1";
  $idorden=mysqli_query($conexion,$consultaidorden);
  $resultados=mysqli_fetch_all($idorden,PDO::FETCH_ASSOC);
  

        // insercion
        $i=0;
        ?>
        <?php

        while($i<count($id)){
      

            
            $resultados1=$resultados[0][0];
            // $rqs1=$rqs[0][0];
            $id1=$id[$i];
            $mp1=$mp[$i];

                  
            $sql = "INSERT INTO ordenpago_detalle (Id_orden_pago, Id_orden_compra, Monto) values ($resultados1,$id1,$mp1);";
            
            //ejemplo de insert 
            //INSERT INTO orden_detalle (Id_orden, Id_insumo, Precio, Cantidad) values (2,1,2,3);
            
            $resultado=mysqli_query($conexion, $sql);
            $i=$i+1;
        }

        
}
            
            
            
            
            
        ?>