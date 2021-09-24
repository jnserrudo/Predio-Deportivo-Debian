

const tablaremitopag=document.getElementById('tablaremito')

const getDatarm = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/traerremitos.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const remito of dataJSON) {
                        console.log(insumo+"y su primero seria"+insumo[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataidorden = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Seleccionar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = remito[0]
                        dataidorden.textContent = remito[1]
                        datafecha.textContent = remito[2]
                        
                        dataid.classList.add('celda')
                        dataidorden.classList.add('celda')
                        datafecha.classList.add('celda')
                        
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataorden)
                        row.append(datafecha)
                        
                        row.append(databtnedit)

                        fragment.append(row)
            }
            tablaremitopag.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/traerremitos.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const remito of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataidorden = document.createElement('TD')
                const datafecha = document.createElement('TD')
                        
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                //   console.log("soy el id nro"+insumo.Id)
                  dataid.textContent = remito[0]
                  dataidorden.textContent = remito[1]
                  datafecha.textContent = remito[2]
                


                  dataid.classList.add('celda')
                  dataidorden.classList.add('celda')
                  datafecha.classList.add('celda')

                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataidorden)
                row.append(datafecha)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablaremitopag.children[0];
                
            while(hijo.nextElementSibling){;
                tablaremitopag.removeChild(hijo.nextElementSibling);
            }
            
            tablaremitopag.append(fragment);
        })
    }

    xhr.send()
}

// se cambia la numeracion para que no se interrumpa la funcionalidad del paginador del insumo
const pag6=document.getElementById('btnpag6')
const pag7=document.getElementById('btnpag7')
const pag8=document.getElementById('btnpag8')
const pag9=document.getElementById('btnpag9')
const pag10=document.getElementById('btnpag10')


pag6.addEventListener('click',()=>{
    let p=pag6.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatarm(p)

})

pag7.addEventListener('click',()=>{
    let p=pag7.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatarm(p)
    
})

pag8.addEventListener('click',()=>{
    let p=pag8.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatarm(p)

})
pag9.addEventListener('click',()=>{
    let p=pag9.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatarm(p)
})

pag10.addEventListener('click',()=>{
    let p=pag10.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatarm(p)

})












