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
        
        xhr.open('GET', "../php/insercion_orden.php")

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
                        const dataId_proveedor = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                        dataId_proveedor.textContent = orden [2]
                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        dataId_proveedor.classList.add('celda')
                        

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                        row.append(dataId_proveedor)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_orden.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataId = document.createElement('TD')
                const dataFecha = document.createElement('TD')
                const dataId_proveedor = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+orden.Id)

                dataId.textContent = orden[0]
                dataFecha.textContent = orden[1]
                dataId_proveedor.textContent = orden[2]
                

                

                dataId.classList.add('celda')
                dataFecha.classList.add('celda')
                dataId_proveedor.classList.add('celda')
                


                row.append(dataId)
                row.append(dataFecha)
                row.append(dataId_proveedor)
                
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





// const btnvent = document.getElementById('btnvent');
// const reg = document.getElementById('reg');
// const contvent = document.getElementById('cont_vent');
// const iconocerrar = document.getElementById('icono_cerrar');






getData() 
// btnvent.addEventListener('click', ()=>{
// 	reg.classList.add('activar');
//     console.log("aa")
// 	contvent.classList.add('activar');
// });

// iconocerrar.addEventListener('click', (e)=>{
// 	e.preventDefault();
// 	reg.classList.remove('activar');
// 	contvent.classList.remove('activar');
// });



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
         
         window.location.href="../php/edicionorden.php?t="+t
    }
})



