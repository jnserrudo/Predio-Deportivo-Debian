<?php  

// function getTableFromDatabase()
// {
//   $server ="localhost"; 
//   $usuario = "test";
//   $password = "";
//   $bd = "debian2";
//   $conexion = mysqli_connect('localhost','root','','debian2') or die("error en la conexion");

// $consulta = mysqli_query($conexion, "SELECT * FROM insumo") or die("error al extraer los datos");

// $htmlTabla = ""; 

// $htmlTabla.= '<table border="1" class="table table-striped  table-bordered border-primary">';
// $htmlTabla.= '<tr>';
// $htmlTabla.=  '<th id="idproveedor">Id</th>';
// $htmlTabla.=  '<th id="empresa">Id_categoria</th>';
// $htmlTabla.= '<th id="comercial">Nombre</th>';
// $htmlTabla.= '<th id="telefono">Descripcion</th>';
// $htmlTabla.= '<th id="telefono">Precio</th>';
// $htmlTabla.= '<th id="telefono">Stock</th>';
// $htmlTabla.= '<th id="telefono">Editar</th>';
// $htmlTabla.= '</tr>';

//   while($extraido = mysqli_fetch_array($consulta)) {

//   $htmlTabla.=  '<tr>';
//     $htmlTabla.=   '<td>'.$extraido['Id'].'</td>';
//     $htmlTabla.=   '<td>'.$extraido['Id_categoria'].'</td>';
//     $htmlTabla.=   '<td>'.$extraido['Nombre'].'</td>';
//     $htmlTabla.=   '<td>'.$extraido['Descripcion'].'</td>';
//     $htmlTabla.=   '<td>'.$extraido['Precio'].'</td>';
//     $htmlTabla.=   '<td>'.$extraido['Stock'].'</td>';
//     $htmlTabla.=   '<td> <button id="btneditar" class="btneditar" >Editar</button><button id="btneliminar" class="btneliminar" >Eliminar</button></td>';

//     $htmlTabla.=  '</tr>';
//   }

// $htmlTabla.=  '</table>';





    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM orden");
          $result_register = mysqli_fetch_array($sql_registe);
          $total_registro = $result_register['total_registro'];

          $por_pagina = 5;
          if(empty($_GET['p']))
          {
              $pagina = 1;
          }else{
              $pagina = $_GET['p'];
          }

          $desde = ($pagina-1) * $por_pagina;



          if (isset($_GET['pr'])) {
            $c = $_GET['pr'];
            // echo $c;
            // if(!$c=""){
            $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id where o.Id_proveedor='$c' LIMIT $desde,$por_pagina";
            // }else{
            //   $sql = "SELECT * FROM insumo";
        }
        else{
             
            if (isset($_GET['x'])) {
                $c = $_GET['x'];
                // echo $c;
                // if(!$c=""){
                $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id where o.Id like '%$c%' or o.Fecha like '%$c%' or p.Nombre like '%$c%' LIMIT $desde,$por_pagina";
            
             } else {
                 $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id LIMIT $desde,$por_pagina";
             }  // POR SI HAY PROBLEMAS, SE COMENTO ESTE ELSE
        }
          


            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
























// mysqli_close($conexion);

// return $htmlTabla;

// }

// var_dump($_POST['x']);
// if(!$_POST['x']=""){
//   $v= $_POST['x'];
//   $c=$v;
//   $conexion = mysqli_connect('localhost','root','','debian2');
//   $query="Select * from insumo 
          
//   ";

//   $resultado=mysqli_query($conexion,$query);

//   $htmlTabla = ""; 
//   $htmlTabla.= '<table border="1" class="table table-striped  table-bordered border-primary">';
//   $htmlTabla.= '<tr>';
//   $htmlTabla.=  '<th id="idproveedor">Id</th>';
//   $htmlTabla.=  '<th id="empresa">Id_categoria</th>';
//   $htmlTabla.= '<th id="comercial">Nombre</th>';
//   $htmlTabla.= '<th id="telefono">Descripcion</th>';
//   $htmlTabla.= '<th id="telefono">Precio</th>';
//   $htmlTabla.= '<th id="telefono">Stock</th>';
//   $htmlTabla.= '<th id="telefono">Editar</th>';
//   $htmlTabla.= '</tr>';
  
//     while($extraido = mysqli_fetch_array($resultado)) {
  
//     $htmlTabla.=  '<tr>';
//       $htmlTabla.=   '<td>'.$extraido['Id'].'</td>';
//       $htmlTabla.=   '<td>'.$extraido['Id_categoria'].'</td>';
//       $htmlTabla.=   '<td>'.$extraido['Nombre'].'</td>';
//       $htmlTabla.=   '<td>'.$extraido['Descripcion'].'</td>';
//       $htmlTabla.=   '<td>'.$extraido['Precio'].'</td>';
//       $htmlTabla.=   '<td>'.$extraido['Stock'].'</td>';
//       $htmlTabla.=   '<td> <button id="btneditar" class="btneditar" >Editar</button><button id="btneliminar" class="btneliminar" >Eliminar</button></td>';
  
//       $htmlTabla.=  '</tr>';
//     }
  
//   $htmlTabla.=  '</table>';
//   echo $htmlTabla;

// }

// where Id like '%".$c."% or Id_categoria like '%".$c."% or Nombre like '%".$c."%
//           or Descripcion like '%".$c."% or Precio like '%".$c."% or Stock like '%".$c."%


//-------------------------------------------------------------