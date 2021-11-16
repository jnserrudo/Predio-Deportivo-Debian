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
</head>
<body>
<?php
    session_start()
    ?>

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


    
<div class="main">
<!-- que el main contenga al include -->
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
            break;
    }

?>

    <div class="mainmain" id="main">
        <p class="textordencompra"> Informe Egreso</p>

        <div class="divrangofechas">
            <p class=" fecha">Fechas</p>
            <div class="divfechas">
            Fecha inicio<input type="date" class="inputfecha" id="fechaini">
            Fecha Final<input type="date" class="inputfecha" id="fechafin">
            <button class="btnvent button verinforme" id="ver">Ver</button>
            </div>
            <button class="btnvent button btnotrafecha otrafecha" id="otra">Cargar otra Fecha</button>


        </div>



        <canvas id="myChart" style="position: absolute; height: 40%; width: 80%; margin-top:50px"></canvas>

       
                                                                                          

    </div>
</div>
                    
                        






    <?php
    include '../includes/footer.php'
    ?>
    
    <script src="../js/inicio.js?v=<?php echo(rand()); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/infegreso.js?v=<?php echo(rand()); ?>"></script>


<script>
  
    // console.log(myChart.data)


//     const main=document.getElementById('main')
//     var ctx = document.getElementById('myChart').getContext('2d')
//     // const ctx=document.createElement('canvas')
//     // main.append(ctx)
//     var myChart = new Chart(ctx, {
//         type: 'bar',
// data: {
//      labels: [],
//     // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],

//     datasets: [{
//         label: 'Egreso',
//         //  data: [],
//         // data: [12, 19, 3, 5, 2],

//         backgroundColor: [
//             'rgba(255, 99, 132, 0.2)',
//             'rgba(54, 162, 235, 0.2)',
//             'rgba(255, 206, 86, 0.2)',
//             'rgba(75, 192, 192, 0.2)',
//             'rgba(153, 102, 255, 0.2)'
//         ],
//         borderColor: [
//             'rgba(255, 99, 132, 1)',
//             'rgba(54, 162, 235, 1)',
//             'rgba(255, 206, 86, 1)',
//             'rgba(75, 192, 192, 1)',
//             'rgba(153, 102, 255, 1)'
            
//         ],
//         borderWidth: 1
//     }]
// },
// options: {
//     scales: {
//         y: {
//             beginAtZero: true
//         }
//     }
// }
// });



// const getDatagrafico = () => {
//     console.log('hola')
//     let xhr
//     if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
//     else xhr = new ActiveXObject("Microsoft.XMLHTTP")
//     let fi=fechaini.value
//     let ff=fechafin.value

//         xhr.open('GET', `../php/consulta_informecompras.php`)
//         // xhr.open('GET', `../php/consulta_informecompras.php?fi=${fi}&ff=${ff}`)

//         xhr.addEventListener('load', (data) => {
//             const dataJSON = JSON.parse(data.target.response)
//             console.log(dataJSON)

//             const fragment = document.createDocumentFragment()
//             // console.log('hola')

//             for (const venta of dataJSON) {
//                 console.log(typeof(parseInt(venta[1])))
//             //    console.log(myChart.data['labels'])
//             //     console.log(myChart.data['datasets'])
//                 myChart.data['labels'].push(venta[0])
//                 myChart.data['datasets'][0].data.push(parseInt(venta[1]))
//                 myChart.data['datasets'][0].backgroundColor.push('red')
//                 myChart.data['datasets'][0].borderColor.push('green')



                      
//             }
//         })
//        xhr.send() 

// window.moveTo(0,0);
// window.resizeTo(screen.availWidth, screen.availHeight);
//     }

//     getDatagrafico()


// let url='../php/consulta_informeventas.php'

// fetch(url)
//     .then(response=> response.json())
//     .then(datos => mostrar(datos))
//     .catch(error => console.log(error))

// const  mostrar= (articulos)=>{
//     articulos.forEach(element=>{
//         myChart.data['labels'].push(element.Fecha)
//         myChart.data['datasets'][0].data.push(element.Total)
//     })
// }
//     console.log(myChart.data)


</script>
</body>
</html>