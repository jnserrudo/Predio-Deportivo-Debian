const getDatavent = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/consultapaginaventa.php")  

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const venta of dataJSON) {
                        console.log(venta+"y su primero seria"+venta[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const datanom_dep = document.createElement('TD')            
                        const datatotal = document.createElement('TD') 


                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Ver"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = venta[0]   
                        datafecha.textContent = venta[1]
                        datanom_dep.textContent = venta[2]
                        datatotal.textContent = venta[3]

              
                        dataid.classList.add('celda')
                        datafecha.classList.add('celda')                     
                        datanom_dep.classList.add('celda')
                        datatotal.classList.add('celda')
                      
                        databtnedit.classList.add('celda')
                       
                        row.append(dataid)
                        row.append(dataid_proveedor)
                        row.append(datafecha)
                        row.append(dataestado)                  
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultapaginaventa.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const venta of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datafecha = document.createElement('TD')              
                const datanom_dep = document.createElement('TD')
                const datatotal = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Ver"
                databtnedit.append(btnedit)
                console.log("soy el id nro"+venta.Id)
                dataid.textContent = venta[0]
                datafecha.textContent = venta[1]        
                datanom_dep.textContent = venta[2]
                datatotal.textContent = venta[3]

                dataid.classList.add('celda')
                datafecha.classList.add('celda')            
                datanom_dep.classList.add('celda')
                datatotal.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datafecha)
                row.append(datanom_dep)
                row.append(datatotal)           
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
  getDatavent(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatavent(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatavent(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatavent(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatavent(p)

})