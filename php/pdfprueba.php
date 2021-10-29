<?php
ob_start();


?>



<!DOCTYPE html>

<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes de Pago</title>
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/styleordenpagos.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="../css/comprobantes.css?v=<?php echo(rand()); ?>">

    <link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">
    <style>
        

.usuario{
    font-size: 1em;
    margin-right: 20px;
    margin-top: 10px;
}
.logo_usuario{
    width: 50px;
    font-size: 2rem;
    height: 50px;
    margin-right: 10px;
    color:  rgb(23, 77, 194);

}
:root {
    --dt-padding: 12px;
    --dt-padding-sm: 6px;
    --dt-padding-xsm: 2px;
    --dt-border-color: #ddd;
    --dt-border-color-02: #ccc;
    --dt-cell-color: #fafafa;
    --dt-hover-color: #dadada;
    --dt-sorted-color: rgba(0,0,0,0.1);
    --dt-bg-color: #eee;
    --dt-bg-active-button: #eee;
    --dt-text-color-button: #222;
    --dt-text-color-active-button: #000;
}
.table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;
    caption-side: bottom; 
    border-collapse: collapse;
}
td{
    text-align: center;
}
.border-primary {
    border-color: #0d6efd !important;
    width: 100%;
    font-size: 1.5em;

}
.ptitulo {
    height: 50px
;
    margin-top: 0;
    /* border: 5
px
 solid black; */
    font-size: 2em;
    margin-left: 15px
;
    padding-top: 15px
;
    color: aliceblue;
 }
.header {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    max-width: 100%;
    height: 200px;
    background-color: rgb(23, 77, 194);
    background-color: #2874A6;
    display: flex;
    color: aliceblue;
} 
.logodebian {
    margin-left: 5
px
;
    width: 100%;
    object-fit: cover;
    height: 100%;
}
img {
    max-width: 100%;
    display: block;
}

    </style>
</head>
    <body>
    <!-- <header class="header">
        <div class="logo" id="logoinicio">
            <img  src="../assets/imagenes/DEBIANfc.jpg" class="logodebian" alt="">
        </div>
        <p class="ptitulo"> Debian Futbol Club</p>
        <div class="login_logo">
            
            <div class="pinguino">
                <img src="../assets/imagenes/pinguidebian.jpg" class="logopinguino" alt="">
            </div>
        </div>
    </header> -->
    <?php
    $pdf=$_GET['pdf'];
    echo $pdf;
    ?>
    <!-- <img src="../assets/imagenes/SLIDE 3.jpg" alt=""> -->

    </body>
</html>
      

<?php
$html='<link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo(rand()); ?>">
<link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>">
<link rel="stylesheet" href="../css/styleinicio.css?v=<?php echo(rand()); ?>">
<link rel="stylesheet" href="../css/styleordenpagos.css?v=<?php echo(rand()); ?>">
<link rel="stylesheet" href="../css/comprobantes.css?v=<?php echo(rand()); ?>">

<link rel="stylesheet" href="../css/datatable.css?v=<?php echo(rand()); ?>">'. ob_get_clean();
// echo $html;

require_once '../php/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

$options=$dompdf->getOptions(); 

$options->set(array('isRemoteEnabled'=>false));
$dompdf->setOptions($options);

$dompdf->setBasePath(realpath('./'));

$dompdf->loadHtml($html);

$dompdf->setPaper('letter'); 

// $dompdf->setPaper('A4','landscape'); //esto hace que se muestre en un pdf mas grande


$dompdf->render();

$dompdf->stream('archivo_pdf', array('Attachment'=>false))


?>