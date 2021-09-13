


console.log("aaaaaaa");

const consulta=document.getElementById("txtconsulta");



const idprov=document.getElementById('idprov')

var idproveedor =  idprov.options[idprov.selectedIndex].value
console.log(idprov.options[idprov.selectedIndex].value)

//se muestra el seleccionado 

idprov.addEventListener('change',()=>{
    
    idproveedor =  idprov.options[idprov.selectedIndex].value  
    console.log(idprov.options[idprov.selectedIndex].value)
})


//  aca se muestra el id prov por defecto(el primero)

const btnregistrar = document.getElementById("registrarorden")

btnregistrar.addEventListener("click",()=>{
    //window.location.href="../php/ordencompra.php?t="+idproveedor

    const tablita = document.getElementById("tabla2")
    console.log(tablita)
    var hijo=tablita.lastElementChild

    var nombre
    var precio
    var cant

    var nombres = []
    var precios = []
    var cantidades = []

    console.log(hijo)
    // nextElementSibling

    while(hijo!=tablita.children[0]){
        nombre=hijo.firstElementChild.textContent
        precio = hijo.firstElementChild.nextElementSibling.textContent
        cant=hijo.firstElementChild.nextElementSibling.nextElementSibling.textContent
        
        console.log(`nombre: ${nombre} precio: ${precio} cantidad: ${cant}`)
        
        nombres.push(nombre)
        precios.push(precio)//acaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        cantidades.push(cant)
        console.log(nombres)
        // previousElementSibling
        hijo=hijo.previousElementSibling
        
    }

    // probando
    // let xhr
    // if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    // else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    // xhr.open('POST', `../php/abminsumo.php?n=${nombres}&p=${precios}&c=${cantidades}&t=${idproveedor}`)
    // xhr.addEventListener('load', (data) => {
    //     const dataJSON = JSON.parse(data.target.response)
    //     console.log(dataJSON)
    // })

    // xhr.send()

    // // 

    window.location.href=`../php/ordencompra.php?n=${nombres}&p=${precios}&c=${cantidades}&t=${idproveedor}`



})


// btnregistrar.addEventListener("click",()=>{
//     var tablita=document.getElementById("tabla2")
//     var precio
//     var cant
//     const hijo=tablita.lastElementSibling;
//     console.log(hijo)
    
     
//     while(hijo=!tablita.children[0]){
//         nombre=hijo.firstElementChild.textContent
//         precio=hijo.firstElementChild.nextElementSibling.textContent
//         cant=hijo.firstElementChild.nextElementSibling.nextElementSibling.textContent

        

//         console.log(`nombre: ${nombre} precio: ${precio} cant: ${cant}`)
//         // <?php
//         //           $PHPnombre = "<script> document.write(nombre)</script>";
//         //           $sql = "Select Id from insumo where=$PHPnombre ";
//         //           $resultado=mysqli_query($conexion,$sql);
//         //           $nombre=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
                  
//         //           // echo "PHPvariable = ".$PHPnombre;
                  
//         //           $PHPprecio = "<script> document.write(precio) </script>";
//         //           $PHPcant = "<script> document.write(cant) </script>";´
//         //           //$PHPnombre = "<script> document.write(nombre) </script>";


//         //           //$sql = "INSERT INTO orden_detalle (Id_orden, Id_insumo, Precio, Cantidad) values ($z,$nombre[0],$PHPprecio,$PHPcant)";
//         //           //$resultado=mysqli_query($conexion,$sql);

//         // ?>
//         hijo=hijo.previousElementSibling
//       }

//     window.location.href="../php/abminsumo.php?t="+idproveedor+"&p="+

// })

/*
const btnregistrardetalle = document.getElementById( "registraroden")
btnregistrardetalle.addEventListener("click", ()=>{
    window.location.href= "../php/abminsumo.php?t="+idproveedor
})

*/




const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
    
}
)

busq.addEventListener('click',
(e)=>{
    console.log(e.target);
    console.log("nashe")

}
)

const table = document.getElementById('tabla')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/insercion.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        console.log(insumo+"y su primero seria"+insumo[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataidcat = document.createElement('TD')
                        const datanom = document.createElement('TD')
                        const datadesc = document.createElement('TD')
                        const dataprecio = document.createElement('TD')
                        const dataStock = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Añadir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = insumo[0]
                        dataidcat.textContent = insumo[1]
                        datanom.textContent = insumo[2]
                        datadesc.textContent = insumo[3]
                        dataprecio.textContent = insumo[4]
                        dataStock.textContent = insumo[5]

                        dataid.classList.add('celda')
                        dataidcat.classList.add('celda')
                        datanom.classList.add('celda')
                        datadesc.classList.add('celda')
                        dataprecio.classList.add('celda')
                        dataStock.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataidcat)
                        row.append(datanom)
                        row.append(datadesc)
                        row.append(dataprecio)
                        row.append(dataStock)
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataidcat = document.createElement('TD')
                const datanom = document.createElement('TD')
                const datadesc = document.createElement('TD')
                const dataprecio = document.createElement('TD')
                const dataStock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+insumo.Id)
                dataid.textContent = insumo[0]
                dataidcat.textContent = insumo[1]
                datanom.textContent = insumo[2]
                datadesc.textContent = insumo[3]
                dataprecio.textContent = insumo[4]
                dataStock.textContent = insumo[5]
                


                dataid.classList.add('celda')
                dataidcat.classList.add('celda')
                datanom.classList.add('celda')
                datadesc.classList.add('celda')
                dataprecio.classList.add('celda')
                dataStock.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataidcat)
                row.append(datanom)
                row.append(datadesc)
                row.append(dataprecio)
                row.append(dataStock)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.append(fragment);
        })
    }

    xhr.send()
}





// //const btnvent = document.getElementById('btnvent');
// const reg = document.getElementById('reg');
// const contvent = document.getElementById('cont_vent');
// const iconocerrar = document.getElementById('icono_cerrar');






getData() 
/*
btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});
*/
// iconocerrar.addEventListener('click', (e)=>{
// 	e.preventDefault();
// 	reg.classList.remove('activar');
// 	contvent.classList.remove('activar');
// });



//const edicion=document.getElementById('tabla')

/*
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    console.log(editar.classList.contains('btneditar'))
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
         var x=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
         console.log(t)
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      console.log("llegue")
        //  })
         
        //  xhr.send()
         
         window.location.href="../php/edicioninsumo.php?t="+t
    }
})
*/


