

const getDataabmop = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/insercion_orden_pago.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        console.log(insumo+"y su primero seria"+insumo[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                       
                        const datanom = document.createElement('TD')
                        const datadesc = document.createElement('TD')
                        const dataformpg = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = insumo[0]
                        
                        datanom.textContent = insumo[1]
                        datadesc.textContent = insumo[2]
                        dataformpg.textContent = insumo[3]                      


                        dataid.classList.add('celda')
                       
                        datanom.classList.add('celda')
                        datadesc.classList.add('celda')
                        dataformpg.classList.add('celda')

                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        
                        row.append(datanom)
                        row.append(datadesc)
                        row.append(dataformpg)

                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_orden_pago.php?p=${p}`)

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
                const dataformpg = document.createElement('TD')

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+insumo.Id)
                dataid.textContent = insumo[0]
                datanom.textContent = insumo[1]
                datadesc.textContent = insumo[2]
                dataformpg.textContent = insumo[3]  

                


                dataid.classList.add('celda')
                
                datanom.classList.add('celda')
                datadesc.classList.add('celda')
                dataformpg.classList.add('celda')

                databtnedit.classList.add('celda')


                row.append(dataid)
               
                row.append(datanom)
                row.append(datadesc)
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


const pag1=document.getElementById('btnpag1')
const pag2=document.getElementById('btnpag2')
const pag3=document.getElementById('btnpag3')
const pag4=document.getElementById('btnpag4')
const pag5=document.getElementById('btnpag5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataabmop(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataabmop(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataabmop(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataabmop(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataabmop(p)

})

const btnirgraficocompras=document.getElementById('btnirgraficocompras')
btnirgraficocompras.addEventListener('click',()=>{
    window.location.href='../php/informe_ord_pago.php'
})











