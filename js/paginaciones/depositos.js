



const getDatadep = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/inserciondepo.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                        console.log(depositos +"y su primero seria"+ depositos[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataNombre = document.createElement('TD')
                        const dataTipo = document.createElement('TD') 
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
        xhr.open('GET', `../php/inserciondepo.php?p=${p}`)

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
                  console.log("soy el id nro"+ depositos.Id)
                dataId.textContent = depositos[0]
                dataNombre.textContent = depositos[1]
                dataTipo.textContent = depositos[2]
                
            

                dataId.classList.add('celda')
                dataNombre.classList.add('celda')
                dataTipo.classList.add('celda')
                databtnedit.classList.add('celda')


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


const pag1=document.getElementById('btnpag1')
const pag2=document.getElementById('btnpag2')
const pag3=document.getElementById('btnpag3')
const pag4=document.getElementById('btnpag4')
const pag5=document.getElementById('btnpag5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatadep(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatadep(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatadep(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatadep(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatadep(p)

})



//----------------INSUMOS POR DEPOSITO ------------------

/*

const getDatar = (r) => {
    let xhrr
    if (window.XMLHttpRequest) xhrr = new XMLHttpRequest()
    else xhrr = new ActiveXObject("Microsoft.XMLHTTP")

    if (r == undefined) {
        
        xhrr.open('GET', "../php/verinsumosxdepo.php")

        xhrr.addEventListener('load', (data) => {
            const rdataJSON = JSON.parse(data.target.response)
            console.log(rdataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                console.log(insumo+"y su primero seria"+insumo[0])
                const rowr = document.createElement('TR')
                rowr.classList.add('fila')
                const rdataid = document.createElement('TD')
                const rdataidcat = document.createElement('TD')
                const rdatanom = document.createElement('TD')
                const rdatadesc = document.createElement('TD')
                const rdataprecio = document.createElement('TD')
                const rdataStock = document.createElement('TD')
                const rdatabtnedit=document.createElement('TD')
                const rbtnedit=document.createElement('button')
                rbtnedit.classList.add("btneditar")
                rbtnedit.textContent="Añadir"
                rdatabtnedit.append(btnedit)
                
                rdataid.textContent = insumo[0]
                rdataidcat.textContent = insumo[1]
                rdatanom.textContent = insumo[2]
                rdatadesc.textContent = insumo[3]
                rdataprecio.textContent = insumo[4]
                rdataStock.textContent = insumo[5]

                rdataid.classList.add('celda')
                rdataidcat.classList.add('celda')
                rdatanom.classList.add('celda')
                rdatadesc.classList.add('celda')
                rdataprecio.classList.add('celda')
                rdataStock.classList.add('celda')
                rdatabtnedit.classList.add('celda')

               
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
            tablainsumo.appendChild(fragment)
        })
    } else {
        xhrr.open('GET', `../php/verinsumosxdepo.php?r=${r}`)

        xhrr.addEventListener('load', (data) => {
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
            const hijo=tablainsumo.children[0];
                
            while(hijo.nextElementSibling){;
                tablainsumo.removeChild(hijo.nextElementSibling);
            }
            
            tablainsumo.append(fragment);
        })
    }

    xhrr.send()
}


const pag1insumo=document.getElementById('pag1insumos')
const pag2insumo=document.getElementById('pag2insumos')
const pag3insumo=document.getElementById('pag3insumos')
const pag4insumo=document.getElementById('pag4insumos')
const pag5insumo=document.getElementById('pag5insumos')


pag1insumo.addEventListener('click',()=>{
    let r=pag1insumo.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatar(r)

})

pag2insumo.addEventListener('click',()=>{
    let r=pag2insumo.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatar(r)
    
})

pag3insumo.addEventListener('click',()=>{
    let r=pag3insumo.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatar(r)

})
pag4insumo.addEventListener('click',()=>{
    let r=pag4insumo.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatar(r)
})

pag5insumo.addEventListener('click',()=>{
    let r=pag5insumo.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatar(r)

})




*/






