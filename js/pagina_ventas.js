const btnirregventas=document.getElementById('btnirregventas')
btnirregventas.addEventListener('click',()=>{
    window.location.href='../php/regventas.php'
})


const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
    
}
)


const table = document.getElementById('tabla')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/consultapaginaventa.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                      //  const datanomdep = document.createElement('TD')
                        const datatotal = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Ver"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                        //datanomdep.textContent = orden [2]
                        datatotal.textContent = orden [2]

                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        //datanomdep.classList.add('celda')
                        datatotal.classList.add('celda')


                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                      //  row.append(datanomdep)
                        row.append(datatotal)

                        row.append(databtnedit)
                        fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultapaginaventa.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                        //const datanomdep = document.createElement('TD')
                        const datatotal = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Ver"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                       // datanomdep.textContent = orden [2]
                        datatotal.textContent = orden [3]

                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        //datanomdep.classList.add('celda')
                        datatotal.classList.add('celda')


                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                       // row.append(datanomdep)
                        row.append(datatotal)

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

getData() 


// const edicion = document.getElementById('tabla')


// edicion.addEventListener('click',(e)=>{
//     const editar=e.target;
//     if(editar.classList.contains('btneditar')){
//         let xhr
//          if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
//          else xhr = new ActiveXObject("Microsoft.XMLHTTP")
//          idd=editar.parentElement.parentElement.firstElementChild.textContent
//          nomdep=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
//          inputdeposito.value=nomdep

//          console.log(idd)
        

//         xhr.open('GET', `../php/consultadepositodetalle.php?x=${idd}`)

//         xhr.addEventListener('load', (data) => {
//             const dataJSON = JSON.parse(data.target.response)
//             console.log(dataJSON)

//             const fragment = document.createDocumentFragment()

//             for (const insumo of dataJSON) {
//                 const row = document.createElement('TR')
//                 row.classList.add('fila')
//                 // const datadepo = document.createElement('TD')

//                 const dataid = document.createElement('TD')
//                 const datanom = document.createElement('TD')
//                 const datadesc = document.createElement('TD')
//                 const dataprecio = document.createElement('TD')
//                 const dataStock = document.createElement('TD')
//                 const datacant=document.createElement('TD')
//                 const cant=document.createElement('input')
//                 cant.classList.add('inputventas')

//                 const databtnedit=document.createElement('TD')
//                 const btnedit=document.createElement('button')
//                 btnedit.classList.add("btneditar")
//                 btnedit.textContent="Añadir"
//                 datacant.append(cant)
//                 databtnedit.append(btnedit)
//                   console.log("soy el id nro"+insumo.Id)
//                 //   datadepo.textContent=idd
//                 dataid.textContent = insumo[0]
//                 datanom.textContent = insumo[1]
//                 datadesc.textContent = insumo[2]
//                 dataprecio.textContent = insumo[3]
//                 dataStock.textContent = insumo[4]
                

//                 // datadepo.classList.add('celda')

//                 dataid.classList.add('celda')
//                 datanom.classList.add('celda')
//                 datadesc.classList.add('celda')
//                 dataprecio.classList.add('celda')
//                 dataStock.classList.add('celda')
//                 datacant.classList.add('celda')
//                 databtnedit.classList.add('celda')

//                 // row.append(datadepo)

//                 row.append(dataid)
//                 row.append(datanom)
//                 row.append(datadesc)
//                 row.append(dataprecio)
//                 row.append(dataStock)
//                 row.append(datacant)

//                 row.append(databtnedit)

//                 fragment.append(row)
//             }
//             const hijo=tablainsumo.children[0];
                
//             while(hijo.nextElementSibling){;
//                 tablainsumo.removeChild(hijo.nextElementSibling);
//             }
            
//             tablainsumo.append(fragment);
//         })
//         xhr.send()

         
//          regins.classList.add('activar');
// 	    contventins.classList.add('activar');
        
//     }
// })

    // ventana emergente de los insumos 


// const regventa = document.getElementById('ventventa');
// const contventventa = document.getElementById('cont_ventventa');
// const iconocerrarventadetalle = document.getElementById('icono_cerrarventa');
// const tablaventadetalle =document.getElementById('tablaventadetalle')