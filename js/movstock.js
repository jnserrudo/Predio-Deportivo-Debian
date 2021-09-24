






const tablamov= document.getElementById('tablamov')



const table = document.getElementById('tablainsumo')

const busq=document.getElementById("busquedamov")
busq.addEventListener('keyup',
(e)=>{
var x= e.target.value;
console.log(x);
getData(x);

}
)


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


getData() 
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}


const btnvent = document.getElementById('btnagregarmov');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');


btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');

   
    



});

iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});




// m sera la el insumo seleccionado y c la cantidad
var m
var c


const ventcant = document.getElementById('vent_cant');
const contventcant = document.getElementById('cont_ventcant');
const icono_cerrarcant = document.getElementById('icono_cerrarcant');
const inputcant=document.getElementById('inputcant')

const btnaceptarcant=document.getElementById('btnaceptarcant')

icono_cerrarcant.addEventListener('click', (e)=>{
	e.preventDefault();
	ventcant.classList.remove('activar');
	contventcant.classList.remove('activar');
    inputcant.value=0
});

table.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        m=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
        console.log(m)
        ventcant.classList.add('activar')
        contventcant.classList.add('activar')

    }
})

tablamov.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        console.log(editar.parentElement.parentElement)
        tablamov.removeChild(editar.parentElement.parentElement)
        

    }
})


btnaceptarcant.addEventListener('click',()=>{
    c=inputcant.value
    ventcant.classList.remove('activar');
	contventcant.classList.remove('activar');
    const fragmento=document.createDocumentFragment()
    const row = document.createElement('TR')
    const nombremov = document.createElement('TD')
    const cantmov = document.createElement('TD')
    const contbtnmov = document.createElement('TD')
    const btnedit=document.createElement('button')

    nombremov.classList.add('celda')
    cantmov.classList.add('celda')
    contbtnmov.classList.add('celda')
    btnedit.classList.add("btneditar")
    btnedit.textContent="Quitar"
    contbtnmov.append(btnedit)
    nombremov.textContent=m
    cantmov.textContent=c
    row.append(nombremov)
    row.append(cantmov)
    row.append(btnedit)
    fragmento.append(row)
    tablamov.append(fragmento)
    ventcant.classList.remove('activar');
	contventcant.classList.remove('activar');
    inputcant.value=''
})


var ubi
var tipo
var motivo

const selectubi=document.getElementById('selectubi')

const selecttipo=document.getElementById('selecttipo')

const selectmot=document.getElementById('selectmot')
const btnremito=document.getElementById('btnremito')

selectubi.addEventListener('change',()=>{
    ubi=selectubi.options[selectubi.selectedIndex].value
})

selecttipo.addEventListener('change',()=>{
    tipo=selecttipo.options[selecttipo.selectedIndex].value
})

selectmot.addEventListener('change',()=>{
    motivo=selectmot.options[selectmot.selectedIndex].value
    console.log(motivo)
    if(motivo==='Remito'){
        btnremito.classList.add('activarbtnremito')
    }
    else{
        if(btnremito.classList.contains('activarbtnremito')){
            btnremito.classList.remove('activarbtnremito')
        }
    }
})




const btnconfirmar=document.getElementById('btnconfirmar')
btnconfirmar.addEventListener('click',()=>{

    var hijo=tablamov.lastElementChild

    var nombre
    var cant


    var nombres = []
    var cantidades = []

    console.log(hijo)
    // nextElementSibling

    while(hijo!=tablamov.children[0]){
        nombre=hijo.firstElementChild.textContent
        cant=hijo.firstElementChild.nextElementSibling.textContent
        
        
        console.log(`nombre: ${nombre} cantidad: ${cant}`)
        
        nombres.push(nombre)
        cantidades.push(cant)
        hijo=hijo.previousElementSibling
        
    }


    window.location.href=`../php/movstock.php?n=${nombres}&c=${cantidades}&u=${ubi}&t=${tipo}&m=${motivo}`




})


const tablaremito=document.getElementById('tablaremito')

const ventrem=document.getElementById('ventrem')
const contventrem=document.getElementById('cont_ventrem')
const iconocerrarrem=document.getElementById('icono_cerrarrem')

btnremito.addEventListener('click',()=>{
    ventrem.classList.add('activar');
	contventrem.classList.add('activar');
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        
        xhr.open('GET', "../php/traerremitos.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const remito of dataJSON) {
                        // console.log(insumo+"y su primero seria"+insumo[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataidorden = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = remito[0]
                        dataidorden.textContent = remito[1]
                        datafecha.textContent = remito[2]
                       

                        dataid.classList.add('celda')
                        dataidorden.classList.add('celda')
                        datafecha.classList.add('celda')
                        

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataidorden)
                        row.append(datafecha)
                        
                        row.append(databtnedit)

                        fragment.append(row)
            }

            const hijo=tablaremito.children[0];
                
            while(hijo.nextElementSibling){;
                tablaremito.removeChild(hijo.nextElementSibling);
            }

            tablaremito.appendChild(fragment)
        })
        xhr.send()

    
})

iconocerrarrem.addEventListener('click',(e)=>{
    e.preventDefault();
	ventrem.classList.remove('activar');
	contventrem.classList.remove('activar');
})







var idr




tablaremito.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){

        idr=editar.parentElement.parentElement.firstElementChild.textContent
        console.log(idr)
        ventrem.classList.remove('activar');
        contventrem.classList.remove('activar');
        
        
        
        let xhr

        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")


        xhr.open('GET', `../php/traerrem_ins.php?q=${idr}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumorem of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const nominsumo = document.createElement('TD')
                const cantinsumo = document.createElement('TD')
              
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Quitar"
                databtnedit.append(btnedit)
                nominsumo.textContent = insumorem[0]
                cantinsumo.textContent = insumorem[1]
                
                


                nominsumo.classList.add('celda')
                cantinsumo.classList.add('celda')
                databtnedit.classList.add('celda')
                

                row.append(nominsumo)
                row.append(cantinsumo)
                row.append(databtnedit)
               

                fragment.append(row)
            }
                
            
            tablamov.append(fragment);
        })    
        

        xhr.send()




        // window.location.href=`../php/movstock.php?idr=${idr}`
    }
})
