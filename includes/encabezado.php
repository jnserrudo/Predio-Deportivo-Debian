<?php
$encabezado="
<header class='header'>
        <div class='logo' id='logoinicio'>
            <img  src='../assets/imagenes/DEBIANfc.png' class='logodebian' alt=''>
        </div>
        <p class='ptitulo'> Debian Futbol Club</p>
        <div class='login_logo'>
            

            <p class='usuario' ><?php echo" .$_SESSION['usuario'].";?></p>
            <div class='logo_usuario'>
                <img src='../assets/imagenes/logousuario.png' alt=''>
            </div>
            <button class='btnlogin' id='btnsesion'> <p class='text'>CERRAR SESION</p> </button>




            <div class='pinguino'>
                <img src='../assets/imagenes/pinguidebian.png' class='logopinguino' alt=''>
            </div>
        </div>
    </header>";
    echo $encabezado;

?>