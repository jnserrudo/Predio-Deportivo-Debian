const input=document.getElementById("input");



console.log("aaaaaaa");

const consulta=document.getElementById("txtconsulta");




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
        
        xhr.open('GET', "../php/insercion_remitos1.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const proveedor of dataJSON) {
                        console.log(proveedor+"y su primero seria"+proveedor[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataid_orden = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const dataid_insumo = document.createElement('TD')
                        const datanombre = document.createElement('TD')
                        const datacantidad = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = proveedor[0]
                        dataid_orden.textContent = proveedor[1]
                        datafecha.textContent = proveedor[2]
                        dataid_insumo.textContent = proveedor[3]
                        datanombre.textContent = proveedor[4]
                        datacantidad.textContent = proveedor[5]

                        dataid.classList.add('celda')
                        dataid_orden.classList.add('celda')
                        datafecha.classList.add('celda')
                        dataid_insumo.classList.add('celda')
                        datanombre.classList.add('celda')
                        datacantidad.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataid_orden)
                        row.append(datafecha)
                        row.append(dataid_insumo)
                        row.append(datanombre)
                        row.append(datacantidad)
                       // row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_remitos1.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const proveedor of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataid_orden = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const dataid_insumo = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datacantidad = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+proveedor.Id)
                dataid.textContent = proveedor[0]
                dataid_orden.textContent = proveedor[1]
                datafecha.textContent = proveedor[2]
                dataid_insumo.textContent = proveedor[3]
                datanombre.textContent = proveedor[4]
                datacantidad.textContent = proveedor[5]
                


                dataid.classList.add('celda')
                dataid_orden.classList.add('celda')
                datafecha.classList.add('celda')
                dataid_insumo.classList.add('celda')
                datanombre.classList.add('celda')
                datacantidad.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataid_orden)
                row.append(datafecha)
                row.append(dataid_insumo)
                row.append(datanombre)
                row.append(datacantidad)
               // row.append(databtnedit)

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





//const btnvent = document.getElementById('btnvent');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');






getData() 
/*btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});*/

iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});



const edicion=document.getElementById('tabla')


edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=editar.parentElement.parentElement.firstElementChild.textContent
         console.log(t)
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      console.log("llegue")
        //  })
         
        //  xhr.send()
         
         window.location.href="../php/edicionremitos1.php?t="+t
    }
})

const btnvolver=document.getElementById('btn_volver')
btnvolver.addEventListener('click',()=>{
    window.location.href='../php/remito1.php'
})

