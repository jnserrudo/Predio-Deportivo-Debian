const btnvolver=document.getElementById('btnvolver')
btnvolver.addEventListener('click',()=>{
    window.location.href='../php/pagina_ventas.php'
})


const busqins=document.getElementById("busquedamov")
busqins.addEventListener('keyup',
(e)=>{
var x= e.target.value;
console.log(x);
// getData(x);

}
)

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
        
        xhr.open('GET', "../php/inserciondepo.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                        console.log(depositos +"y su primero seria"+depositos[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataNombre = document.createElement('TD')
                        const dataTipo = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = depositos[0]
                        dataNombre.textContent = depositos[1]
                        dataTipo.textContent = depositos[2]
                        

                        dataId.classList.add('celda')
                        dataNombre.classList.add('celda')
                        dataTipo.classList.add('celda')
                       
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataNombre)
                        row.append(dataTipo)                        
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/inserciondepo.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataId = document.createElement('TD')
                const dataNombre = document.createElement('TD')
                const dataTipo = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                console.log("soy el id nro"+depositos.Id)
                dataId.textContent = depositos[0]
                dataNombre.textContent = depositos[1]
                dataTipo.textContent = depositos[2]
                
                dataId.classList.add('celda')
                dataNombre.classList.add('celda')
                dataTipo.classList.add('celda')
               
                databtnedit.classList.add('celda')

               
                // console.log("soy el data id :"+dataid.textContent)
                row.append(dataId)
                row.append(dataNombre)
                row.append(dataTipo)                        
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





const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');

const form= document.getElementById("f")

// form.addEventListener('submit',(e)=>{
//     // e.preventDefault()
//     // form.reset()
// })


if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

getData()




iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});



const edicion=document.getElementById('tabla')


const regins = document.getElementById('regins');
const contventins = document.getElementById('cont_ventins');
const iconocerrarins = document.getElementById('icono_cerrarins');
const tablainsumo =document.getElementById('tablainsumo')
const inputdeposito=document.getElementById('inputdeposito')

edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         var idd=editar.parentElement.parentElement.firstElementChild.textContent
         var nomdep=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
         inputdeposito.value=nomdep

         console.log(idd)
        

        xhr.open('GET', `../php/consultadepositodetalle.php?x=${idd}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
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
                datanom.textContent = insumo[1]
                datadesc.textContent = insumo[2]
                dataprecio.textContent = insumo[3]
                dataStock.textContent = insumo[4]
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                datadesc.classList.add('celda')
                dataprecio.classList.add('celda')
                dataStock.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(datadesc)
                row.append(dataprecio)
                row.append(dataStock)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablainsumo.children[0];
                
            while(hijo.nextElementSibling){;
                tablainsumo.removeChild(hijo.nextElementSibling);
            }
            
            tablainsumo.append(fragment);
        })
        xhr.send()

         
         regins.classList.add('activar');
	    contventins.classList.add('activar');
        
    }
})

iconocerrarins.addEventListener('click',()=>{
    regins.classList.remove('activar');
	    contventins.classList.remove('activar');
})
