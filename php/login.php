<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <!-- <button class="btnlogin"> <p class="text">INICIAR SESION</p> </button> -->

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


        <?php   
                $_SESSION["usuario"]=-1;


                if(isset($_GET['x'])){
                    unset($_SESSION["usuario"]);


                }
        
        ?>




        <div class="container w-75 mt-5 rounded shadow contlogin ">
            <div class="row align-center">
                <div class="col bg">

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
                        <div class="divbtnlogin">
                            <button class="btnlogin btn"  id="btnlogin"> <p class="text">Iniciar Sesion</p> </button>
                            <!-- quite el submit del boton, asi lo hago a traves del evento click del btn -->
                        </div>


                    </form>
                </div>
            </div>

        </div>



    </div>



    <footer class="w-100 footer d-flex  align-items-center justify-content-start flex-wrap">
        <!-- <p class="fs-5 px-3  pt-3">ExpertD. &copy; Todos Los Derechos Reservados 2021</p> -->
        <div id="iconos" class="iconos" >
            <!-- logos -->
            <div class="conticono">
               <img src="../assets/imagenes/iconos/face.png" class="icono" alt=""> DEBIANfc 
            </div>

            <div class="conticono">
                <img src="../assets/imagenes/iconos/ig.png" class="icono" alt=""> @DEBIANfc
            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/tel.png" class="icono" alt=""> 4229-7600

            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/gmail.png" class="icono" alt=""> Debian@gmail.com.ar
            </div>
            <div class="conticono">
                <img src="../assets/imagenes/iconos/map.png" class="icono" alt=""> Av. Mitre 470 (1870).

            </div>
                 
        </div>
        <p class="frasefooter"> Mas que un club... <br> una Familia</p>  

        <p class="text_debsw"> Desarrollado por Debian Software <br> &copy Derechos Reservados</p>
      </footer>
      <script src="../js/login.js?v=<?php echo(rand()); ?>"></script>
</body>
</html>