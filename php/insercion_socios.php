<?php


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');



// de aca
          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM socio");
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

        //   aca


            if (isset($_GET['x'])) {
                $c = $_GET['x'];

                $sql = "SELECT * FROM socio where Id like '%$c%' or Nombre like '%$c%' or Apellido like '%$c%'
                 or DNI like '%$c%' or Estado like '%$c%' or Email like '%$c%' or Direccion like '%$c%'
                or Telefono like '%$c%' LIMIT $desde,$por_pagina";

            }
            else{
                    $sql = "SELECT * FROM socio LIMIT $desde,$por_pagina";
                     // se agrega el limit
            }



            $resultado=mysqli_query($conexion,$sql);

            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);

        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }