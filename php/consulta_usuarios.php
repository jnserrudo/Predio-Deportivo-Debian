<?php  

    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

        
          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM usuario");
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
            if (isset($_GET['x'])) {
                $c = $_GET['x'];
                $sql = "SELECT u.Id,u.Nombre,u.Apellido,u.Correo,u.DNI,u.Direccion,u.Usuario,u.Fecha_reg,r.rol FROM usuario as u 
                inner join rol_usuario as ru on ru.Id_usuario=u.Id
                inner join  rol as r on   r.Id=ru.Id_rol     
                where  u.Id like '%$c%' or u.Nombre like '%$c%' or u.Apellido like '%$c%' or u.Correo like '%$c%'or 
                u.DNI like '%$c%'or u.Direccion like '%$c%'or u.Usuario like '%$c%' or u.Fecha_reg like '%$c%' or r.rol like '%$c%'
                LIMIT $desde,$por_pagina";


            }
            else{
                $sql = "SELECT u.Id,u.Nombre,u.Apellido,u.Correo,u.DNI,u.Direccion,u.Usuario,u.Fecha_reg,r.rol FROM usuario as u

                inner join rol_usuario as ru on ru.Id_usuario=u.Id
                inner join  rol as r on   r.Id=ru.Id_rol
                 LIMIT $desde,$por_pagina";
            }
          
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }