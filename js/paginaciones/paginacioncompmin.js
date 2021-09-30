const getDatacompmin = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', `../php/consulta_comprobante.php?ip=${idprov}`)  

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const comprobante of dataJSON) {
                        console.log(comprobante+"y su primero seria"+comprobante[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataid_proveedor = document.createElement('TD')
                      //  const dataid_comprobante = document.createElement('TD')
                       // const datafecha = document.createElement('TD')
                      //  const dataestado = document.createElement('TD')
                        const datamonto = document.createElement('TD')

                        const dataletra = document.createElement('TD')
                        const dataId_orden_compra = document.createElement('TD')
                        const datatipo = document.createElement('TD') 


                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = comprobante[0]
                        dataid_proveedor.textContent = comprobante[1]
                      //  dataid_comprobante.textContent = comprobante[2]
                       // datafecha.textContent = comprobante[2]
                       // dataestado.textContent = comprobante[3]
                        datamonto.textContent = comprobante[2]

                        dataletra.textContent = comprobante[3]
                        dataId_orden_compra.textContent = comprobante[4]
                        datatipo.textContent = comprobante[5]




                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                       // datafecha.classList.add('celda')
                       // dataestado.classList.add('celda')
                        datamonto.classList.add('celda')

                   
                        dataletra.classList.add('celda')
                        dataId_orden_compra.classList.add('celda')
                        datatipo.classList.add('celda')





                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataid_proveedor)
                      //  row.append(dataid_comprobante)
                      //  row.append(datafecha)
                      //  row.append(dataestado)
                        row.append(datamonto)


                        
                        row.append(dataletra)
                        row.append(dataId_orden_compra)
                        row.append(datatipo)


                        row.append(databtnedit)
            }
                        fragment.append(row)
            
            tablacompmin.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consulta_comprobante.php?p=${p}&ip=${idprov}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const comprobante of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataid_proveedor = document.createElement('TD')
               // const dataid_comprobante = document.createElement('TD')
               // const datafecha = document.createElement('TD')
               // const dataestado = document.createElement('TD')
                const datamonto = document.createElement('TD')


                const dataletra = document.createElement('TD')
                const dataId_orden_compra = document.createElement('TD')
                const datatipo = document.createElement('TD') 

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+comprobante.Id)
                dataid.textContent = comprobante[0]
                dataid_proveedor.textContent = comprobante[1]
               // dataid_comprobante.textContent = comprobante[2]
               // datafecha.textContent = comprobante[2]
               // dataestado.textContent = comprobante[3]
                datamonto.textContent = comprobante[2]
                dataletra.textContent = comprobante[3]
                dataId_orden_compra.textContent = comprobante[4]
                datatipo.textContent = comprobante[5]


                dataid.classList.add('celda')
                dataid_proveedor.classList.add('celda')
              //  dataid_comprobante.classList.add('celda')
              //  datafecha.classList.add('celda')
              //  dataestado.classList.add('celda')
                datamonto.classList.add('celda')
                dataletra.classList.add('celda')
                dataId_orden_compra.classList.add('celda')
                datatipo.classList.add('celda')

                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataid_proveedor)
               // row.append(dataid_comprobante)
               // row.append(datafecha)
              //  row.append(dataestado)
                row.append(datamonto)
                row.append(dataletra)
                row.append(dataId_orden_compra)
                row.append(datatipo)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablacompmin.children[0];
                
            while(hijo.nextElementSibling){;
                tablacompmin.removeChild(hijo.nextElementSibling);
            }
            
            tablacompmin.append(fragment);
        })
    }

    xhr.send()
}

const pag6=document.getElementById('btnpag6')
const pag7=document.getElementById('btnpag7')
const pag8=document.getElementById('btnpag8')
const pag9=document.getElementById('btnpag9')
const pag10=document.getElementById('btnpag10')


pag6.addEventListener('click',()=>{
    let p=pag6.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacompmin(p)

})

pag7.addEventListener('click',()=>{
    let p=pag7.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatacompmin(p)
    
})

pag8.addEventListener('click',()=>{
    let p=pag8.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatacompmin(p)

})
pag9.addEventListener('click',()=>{
    let p=pag9.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacompmin(p)
})

pag10.addEventListener('click',()=>{
    let p=pag10.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacompmin(p)

})