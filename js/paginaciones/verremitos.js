
const getDataverremito = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
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
                        //row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_remitos1.php?p=${p}`)

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
                //row.append(databtnedit)

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






const pag1=document.getElementById('btnpag1')
const pag2=document.getElementById('btnpag2')
const pag3=document.getElementById('btnpag3')
const pag4=document.getElementById('btnpag4')
const pag5=document.getElementById('btnpag5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataverremito(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataverremito(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataverremito(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataverremito(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataverremito(p)

})













