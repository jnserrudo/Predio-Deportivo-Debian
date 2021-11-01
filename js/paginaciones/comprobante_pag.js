
const getDatacom = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        const selectprov=document.getElementById('idprov')
        
        idprov=selectprov.options[selectprov.selectedIndex].value
        if(selectprov==undefined){
        
          xhr.open('GET', "../php/insercion_comprobante.php?")
       // xhr.open('GET', "../php/insercion_comprobante.php")  
          }
        else{
          
          xhr.open('GET', `../php/insercion_comprobante.php?pr=${idprov}`) 
        }
        
        
        
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
                        const datafecha = document.createElement('TD')
                        const dataestado = document.createElement('TD')
                        const datamonto = document.createElement('TD')

                        const dataletra = document.createElement('TD')
                        const dataId_orden_compra = document.createElement('TD')
                        const datatipo = document.createElement('TD') 
                        const datanro_fac = document.createElement('TD') 
                        const data_fecha= document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = comprobante[0]
                        dataid_proveedor.textContent = comprobante[1]
                      //  dataid_comprobante.textContent = comprobante[2]
                        datafecha.textContent = comprobante[2]
                        dataestado.textContent = comprobante[3]
                        datamonto.textContent = comprobante[4]

                        dataletra.textContent = comprobante[5]
                        dataId_orden_compra.textContent = comprobante[6]
                        datatipo.textContent = comprobante[7]
                        datanro_fac.textContent = comprobante[8]
                        data_fecha.textContent = comprobante[9]



                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                        datafecha.classList.add('celda')
                        dataestado.classList.add('celda')
                        datamonto.classList.add('celda')

                   
                        dataletra.classList.add('celda')
                        dataId_orden_compra.classList.add('celda')
                        datatipo.classList.add('celda')
                        datanro_fac.classList.add('celda')
                        data_fecha.classList.add('celda')




                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataid_proveedor)
                      //  row.append(dataid_comprobante)
                        row.append(datafecha)
                        row.append(dataestado)
                        row.append(datamonto)


                        
                        row.append(dataletra)
                        row.append(dataId_orden_compra)
                        row.append(datatipo)
                        row.append(datanro_fac)
                         row.append(data_fecha)

                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
         const selectprov=document.getElementById('idprov')
        var idprov
        idprov=selectprov.options[selectprov.selectedIndex].value
        if(selectprov==undefined){

          xhr.open('GET', `../php/insercion_comprobante.php?p=${p}`)
        }else{

          xhr.open('GET', `../php/insercion_comprobante.php?p=${p}&pr=${idprov}`)

        }


        

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
                const datafecha = document.createElement('TD')
                const dataestado = document.createElement('TD')
                const datamonto = document.createElement('TD')


                const dataletra = document.createElement('TD')
                const dataId_orden_compra = document.createElement('TD')
                const datatipo = document.createElement('TD') 
                const datanro_fac = document.createElement('TD') 
                const data_fecha= document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+comprobante.Id)
                dataid.textContent = comprobante[0]
                dataid_proveedor.textContent = comprobante[1]
               // dataid_comprobante.textContent = comprobante[2]
                datafecha.textContent = comprobante[2]
                dataestado.textContent = comprobante[3]
                datamonto.textContent = comprobante[4]
                dataletra.textContent = comprobante[5]
                dataId_orden_compra.textContent = comprobante[6]
                datatipo.textContent = comprobante[7]
                datanro_fac.textContent = comprobante[8]
                data_fecha.textContent = comprobante[9]


                dataid.classList.add('celda')
                dataid_proveedor.classList.add('celda')
              //  dataid_comprobante.classList.add('celda')
                datafecha.classList.add('celda')
                dataestado.classList.add('celda')
                datamonto.classList.add('celda')
                dataletra.classList.add('celda')
                dataId_orden_compra.classList.add('celda')
                datatipo.classList.add('celda')
                datanro_fac.classList.add('celda')
                data_fecha.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataid_proveedor)
               // row.append(dataid_comprobante)
                row.append(datafecha)
                row.append(dataestado)
                row.append(datamonto)
                row.append(dataletra)
                row.append(dataId_orden_compra)
                row.append(datatipo)
                row.append(datanro_fac)
                row.append(data_fecha)
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


const pag1=document.getElementById('btnpag1')
const pag2=document.getElementById('btnpag2')
const pag3=document.getElementById('btnpag3')
const pag4=document.getElementById('btnpag4')
const pag5=document.getElementById('btnpag5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacom(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatacom(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatacom(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacom(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatacom(p)

})