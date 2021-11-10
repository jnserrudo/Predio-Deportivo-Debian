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

// lleno la tabla de detalles venta

const edicion = document.getElementById('tabla')



    // ventana emergente de los insumos 


const regventa = document.getElementById('ventventa');
const contventventa = document.getElementById('cont_ventventa');
const iconocerrarventadetalle = document.getElementById('icono_cerrarventa');
const tablaventadetalle =document.getElementById('tablaventadetalle')


iconocerrarventadetalle.addEventListener('click', (e)=>{
    e.preventDefault();
    regventa.classList.remove('activar')
    contventventa.classList.remove('activar')
    });

var idv
var fecha
var total

const deposito=document.getElementById('nomdeposito')
const inputtotal=document.getElementById('inputtotal')
const txtfecha=document.getElementById('txtfecha')
const inputventa=document.getElementById('inputventa')


edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         idv=editar.parentElement.parentElement.firstElementChild.textContent
         fecha=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
         txtfecha.textContent='Fecha'+fecha
         inputventa.value=idv


         console.log(idv)
        

        xhr.open('GET', `../php/consulta_ventadetalle.php?x=${idv}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)
            total=dataJSON[0][2]
            deposito.textContent=dataJSON[0][3]

            inputtotal.value=total
            


            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')

                const datanom = document.createElement('TD')
                const datacant=document.createElement('TD')
            
                datanom.textContent = insumo[0]
                datacant.textContent = insumo[1]

                datanom.classList.add('celda')
                datacant.classList.add('celda')

                row.append(datanom)

                row.append(datacant)

                fragment.append(row)
            }
            const hijo=tablaventadetalle.children[0];
                
            while(hijo.nextElementSibling){
                tablaventadetalle.removeChild(hijo.nextElementSibling);
            }
            
            tablaventadetalle.append(fragment);
        })
        xhr.send()

         
         regventa.classList.add('activar');
	    contventventa.classList.add('activar');
        
    }
})

const btnifgraficoventas=document.getElementById('btnirgraficoventas')

btnifgraficoventas.addEventListener('click',()=>{
    window.location.href='../php/informe_ventas.php'
})
