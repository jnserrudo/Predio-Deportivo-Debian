<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/stylelogin.css?v=<?php echo(rand()); ?>">
    

</head>
<body>
<header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.png" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo" >

            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.png" class="logopinguino " width="50" alt="">
            </div>
        </div>
    </header>
    
    <div class="main">

            <div class="error" id="error">
                <div class="cont_vent" id="cont_vent">
                         <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrar">
                                <p class="txt_error" id="txt_error" >Usuario o Contraseña Incorrecta</p>
                                
                </div>
            </div>

            <!-- insert -->
            <?php
       
       $conexion = NULL;
       try{
           $conexion = mysqli_connect('localhost','root','','debian2');
          

                if ( isset($_GET['nom']) && isset($_GET['ape']) && isset($_GET['DNI']) && isset($_GET['correo']) && isset($_GET['direc']) && isset($_GET['usu']) && isset($_GET['cont']) && isset($_GET['rol'])&& isset($_GET['desc'])) {
                  
                  $nom=$_GET['nom'];
                  $ape=$_GET['ape'];
                  $correo=$_GET['DNI'];
                  $DNI=$_GET['correo'];
                  $Direc=$_GET['direc'];
                  $usu=$_GET['usu'];
                  $cont=$_GET['cont'];
                  $rol=isset($_GET['rol']);
                  $desc=isset($_GET['desc']);

               $sql = "INSERT INTO usuario (Nombre,Apellido,Correo,DNI,Direccion,Usuario,Contraseña)Values('$nom','$ape','$correo','$DNI','$Direc','$usu',$cont)";

               $resultado=mysqli_query($conexion,$sql);

                            // Registrar id usuario ------------
                $consultaidorden = "select Id from usuario order by Id desc limit 1";
                $idorden=mysqli_query($conexion,$consultaidorden);
                $resultados=mysqli_fetch_all($idorden,PDO::FETCH_ASSOC);
                $idusuario=$resultados[0][0];


               $sql = "INSERT INTO rol_usuario (Nombre,Contraseña)Values('$nom','$ape','$correo','$DNI','$Direc','$usu',$cont)";

               $resultado=mysqli_query($conexion,$sql);

               }

       }catch (PDOException $e){
           echo "Error ".$e->getMessage();
       }
?>

<!--fin  -->
        



            

        <?php   
                $_SESSION["usuario"]=-1;


                if(isset($_GET['x'])){
                    unset($_SESSION["usuario"]);


                }
        
        ?>




        <div class="container w-75 mt-5 rounded shadow contlogin ">
            <div class="row align-center">
                <div class="col bg">
<!-- esto es la imagen de la izquierda del login -->
                </div>
                <div class="col ">
                    <div class="text-end">
                        <img src="../assets/imagenes/DEBIANfc.png" width="100" alt="">
                    </div>
                    <h2 class="fw-bold text-center bienvenido py-5" >Bienvenido</h2>
                    <form action="#">
                        <div class="mb-4">
                            <label class="form-label usercon" for="nomusuario" >Usuario</label>
                            <input type="text" name="nomusuario" class="form-control txtform" id="usuario">
                        </div>
                        <div class="mb-4">
                            <label class="form-label usercon" for="contra" >Contraseña</label>
                            <input type="password" name="contra" class="form-control txtform" id="contra">
                        </div>
                       


                    </form>
                    <div class="divbtnlogin">
                            <button class="btnlogin btn"  id="btnlogin"> <p class="text">Iniciar Sesion</p> </button>
                            <!-- quite el submit del boton, asi lo hago a traves del evento click del btn -->
                            <button class="btnlogin btn"  id="btnregistrarse"> <p class="text">Registrarse</p> </button>

                        </div>
                    
                </div>
            </div>

        </div>


        <!-- ventana emergente de registracion -->
         <div class="reg" id="ventreg">
                    <div class="cont_vent_reg" id="cont_ventreg">
                    <img src="../assets/cruz.svg" alt="" class="icono_cerrar" id="icono_cerrarreg">
                           <p class="txtreg" >Registrar Nuevo Usuario</p>
                            <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET" class="formreg">
                                <div class="contform">
                                    <label for="nom" class="lblreg">Nombre:</label>
                                    <input type="text" id="nom" name="nom"class="inputreg" required> 
                                </div>      
                                <div class="contform">
                                    <label for="ape" class="lblreg">Apellido:</label>
                                    <input type="text" id="ape" name="ape"class="inputreg"required>
                                </div>                               
                                <div class="contform">
                                    <label for="correo" class="lblreg">Correo:</label>
                                    <input type="email" id="correo" name="correo"class="inputreg"required>
                                </div>
                                   
                                <div class="contform">
                                    <label for="DNI" class="lblreg">DNI:</label>
                                    <input type="text" id="DNI" name="DNI"class="inputreg"required>
                                </div>
                                <div class="contform">
                                    <label for="direc" class="lblreg">Direccion:</label>
                                    <input type="text" id="direc" name="direc"class="inputreg"required>
                                </div>    
                                
                                <div class="contform">
                                    <label for="rol" class="lblreg">Rol:</label>
                                    <select name="rol" class="inputreg" id="rol" required>
                                        <option value="" selected disabled hidden class="inputreg">Seleccionar</option>              
                                        <option value="2" class="inputreg">Encargado de Deposito</option>
                                        <option value="3" class="inputreg">Encargado de Ventas</option>
                                        <option value="3" class="inputreg">Responsable de Atencion al Cliente</option>

                                    </select>                               
                                </div>  
                               
                                <div class="contform">
                                    <label for="usu" class="lblreg">Usuario:</label>
                                    <input type="text" id="usu" name="usu" class="inputreg"required>
                                </div>    
                                <div class="contform">
                                    <label for="cont" class="lblreg">Contraseña:</label>
                                    <input type="password" id="cont" name="cont" class="inputreg"required>

                                </div>  
                                <div class="contform">
                                    <label for="desc" class="lblreg">Descripcion:</label>
                                    <textarea type="textarea" id="desc" name="desc" class="inputreg" rows="2" cols="50"required></textarea>

                                </div>  

                                    
                                <div class="contbtns">
                                     <button class="btnlogin btn btnregnuevo" id="btnregnuevo">Registrar Nuevo Usuario</button>
                                </div>
                            </form>
                           
                                                                                
                                                                                        
                    </div>
                    
        </div> 



    </div>
                


   <?php
   include '../includes/footer.php';
   ?>

<script src="../js/login.js?v=<?php echo(rand()); ?>"></script>

</body>
</html>