
const getDatas = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/insercion_socios.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        console.log(socio+"y su primero seria"+socio[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')                       
                        const datanom = document.createElement('TD')
                        const dataap = document.createElement('TD')
                        const datadni = document.createElement('TD')
                        const dataestado = document.createElement('TD')
                        const dataemail = document.createElement('TD')
                        const datadireccion = document.createElement('TD')
                        const datatelefono = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = socio[0]
                        datanom.textContent = socio[1]
                        dataap.textContent = socio[2]
                        datadni.textContent = socio[3]
                        dataestado.textContent = socio[4]
                        dataemail.textContent = socio[5]
                        datadireccion.textContent = socio[6]
                        datatelefono.textContent = socio[7]

                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        dataap.classList.add('celda')
                        datadni.classList.add('celda')
                        dataestado.classList.add('celda')
                        dataemail.classList.add('celda')
                        datadireccion.classList.add('celda')
                        datatelefono.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(dataap)
                        row.append(datadni)
                        row.append(dataestado)
                        row.append(dataemail)
                        row.append(datadireccion)
                        row.append(datatelefono)
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_socios.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanom = document.createElement('TD')
                const dataap = document.createElement('TD')
                const datadni = document.createElement('TD')
                const dataestado = document.createElement('TD')
                const dataemail = document.createElement('TD')
                const datadireccion = document.createElement('TD')
                const datatelefono = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+socio.Id)

                  dataid.textContent = socio[0]
                  datanom.textContent = socio[1]
                  dataap.textContent = socio[2]
                  datadni.textContent = socio[3]
                  dataestado.textContent = socio[4]
                  dataemail.textContent = socio[5]
                  datadireccion.textContent = socio[6]
                  datatelefono.textContent = socio[7]
                


                  dataid.classList.add('celda')
                  datanom.classList.add('celda')
                  dataap.classList.add('celda')
                  datadni.classList.add('celda')
                  dataestado.classList.add('celda')
                  dataemail.classList.add('celda')
                  datadireccion.classList.add('celda')
                  datatelefono.classList.add('celda')
                  databtnedit.classList.add('celda')


                  row.append(dataid)
                  row.append(datanom)
                  row.append(dataap)
                  row.append(datadni)
                  row.append(dataestado)
                  row.append(dataemail)
                  row.append(datadireccion)
                  row.append(datatelefono)
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
  getDatas(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatas(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatas(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatas(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatas(p)

})

