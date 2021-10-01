const getDatadi = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/consultadepositodetalle.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumodetalle of dataJSON) {
                        console.log(insumodetalle+"y su primero seria"+insumodetalle[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataidcat = document.createElement('TD')
                        const datanom = document.createElement('TD')
                        const datadesc = document.createElement('TD')
                        const datastock = document.createElement('TD')

                        
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = insumodetalle[0]
                        dataidcat.textContent = insumodetalle[1]
                        datanom.textContent = insumodetalle[2]
                        datadesc.textContent = insumodetalle[3]
                        datastock.textContent = insumodetalle[4]

                        dataid.classList.add('celda')
                        dataidcat.classList.add('celda')
                        datanom.classList.add('celda')
                        datadesc.classList.add('celda')
                        datastock.classList.add('celda')
                        
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataidcat)
                        row.append(datanom)
                        row.append(datadesc)
                        row.append(datastock)
                        row.append(databtnedit)

                        fragment.append(row)
            }
            tablainsumo.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultadepositodetalle.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumodetalle of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataidcat = document.createElement('TD')
                const datanom = document.createElement('TD')
                const datadesc = document.createElement('TD')
                const datastock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+insumodetalle.Id)
                dataid.textContent = insumodetalle[0]
                dataidcat.textContent = insumodetalle[1]
                datanom.textContent = insumodetalle[2]
                datadesc.textContent = insumodetalle[3]
                datastock.textContent = insumodetalle[4]
                


                dataid.classList.add('celda')
                dataidcat.classList.add('celda')
                datanom.classList.add('celda')
                datadesc.classList.add('celda')
                datastock.classList.add('celda')
                databtnedit.classList.add('celda')
                row.append(dataid)
                row.append(dataidcat)
                row.append(datanom)
                row.append(datadesc)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                tablainsumo.removeChild(hijo.nextElementSibling);
            }
            
            tablainsumo.append(fragment);
        })
    }

    xhr.send()
}


const pag6=document.getElementById('btnpaga')
const pag7=document.getElementById('btnpagb')
const pag8=document.getElementById('btnpagc')
const pag9=document.getElementById('btnpagd')
const pag10=document.getElementById('btnpage')


pag6.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumodetalle.php?p=${p}`
  getDatadi(p)

})

pag7.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumodetalle.php?p=${p}`
    getDatadi(p)
    
})

pag8.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumodetalle.php?p=${p}`
    getDatadi(p)

})
pag9.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumodetalle.php?p=${p}`
  getDatadi(p)
})

pag10.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumodetalle.php?p=${p}`
  getDatadi(p)

})