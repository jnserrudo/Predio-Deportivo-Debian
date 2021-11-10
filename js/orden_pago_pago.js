


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

const btnvolverordenpago=document.getElementById("btnvolverordenpago");
btnvolverordenpago.addEventListener('click',()=>{
    window.location.href="../php/ordenpago.php"
})



const table = document.getElementById('tabla')
const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/insercion_orden_pago.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const datairproveedor = document.createElement('TD')
                        const dataformpg = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = orden[0]
                        datafecha.textContent = orden[1]
                        datairproveedor.textContent = orden[2]                      
                        dataformpg.textContent = orden[3]                      

                        
                        dataid.classList.add('celda')
                        datafecha.classList.add('celda')
                        datairproveedor.classList.add('celda')

                        dataformpg.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datafecha)
                        row.append(datairproveedor)

                        row.append(dataformpg)

                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_orden_pago.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const datairproveedor = document.createElement('TD')
                const dataformpg = document.createElement('TD')

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+orden.Id)
                dataid.textContent = orden[0]
                datafecha.textContent = orden[1]
                datairproveedor.textContent = orden[2]  

                dataformpg.textContent = orden[3]  



                dataid.classList.add('celda')
                datafecha.classList.add('celda')
                datairproveedor.classList.add('celda')
                dataformpg.classList.add('celda')

                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datafecha)
                row.append(datairproveedor)

                row.append(dataformpg)

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
const edicion=document.getElementById('tabla')
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        // let xhr
        //  if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        //  else xhr = new ActiveXObject("Microsoft.XMLHTTP")
        //  //obtengo el id
        //  var t=editar.parentElement.parentElement.firstElementChild.textContent
        //  console.log(t)
        // //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        // //  xhr.addEventListener('load',()=>
        // //  {
        // //      console.log("llegue")
        // //  })
         
        // //  xhr.send()
         
        //  window.location.href="../php/edicionordenpago.php?t="+t

        // ver en pdf
      var t=editar.parentElement.parentElement.firstElementChild.textContent
      window.location.href="../php/crearPdf.php"
    


    }
})