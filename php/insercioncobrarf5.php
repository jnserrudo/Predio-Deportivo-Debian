<?php


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');



// de aca
          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM reservaf5");
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
                /*    
                $sql = "SELECT * FROM reservaf5 where Id like '%$c%' or Fecha like '%$c%' or Hora like '%$c%'
                 or Solicitante like '%$c%' or Contacto like '%$c%' or Instalacion like '%$c%'
                LIMIT $desde,$por_pagina";*/

                $sql = "SELECT  Id,Fecha,Hora,Solicitante,Contacto,instalacion.Nombre,instalacion.Precio FROM reservaf5 INNER JOIN instalacion ON reservaf5.Instalacion = instalacion.Id
                where Solicitante like '%$c%' and Estado='deuda'
                LIMIT $desde,$por_pagina";

                //SELECT Fecha,Hora,Solicitante,Contacto,instalacion.Nombre FROM reservaf5 INNER JOIN instalacion ON reservaf5.Instalacion = instalacion.Id;


            }
            else{
                    $sql = "SELECT reservaf5.Id,Fecha,Hora,Solicitante,Contacto,instalacion.Nombre,instalacion.Precio 
                    FROM reservaf5 INNER JOIN instalacion ON reservaf5.Instalacion = instalacion.Id where Estado='deuda'
                    LIMIT $desde,$por_pagina";
 
                    //"SELECT * FROM reservaf5 LIMIT $desde,$por_pagina";
                     // se agrega el limit
            }



            $resultado=mysqli_query($conexion,$sql);

            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);

        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }