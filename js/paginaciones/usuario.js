

const getDatausu = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/consulta_usuarios.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                        console.log(socio+"y su primero seria"+socio[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datanom = document.createElement('TD')
                        const dataApellido = document.createElement('TD')
                        const dataCorreo = document.createElement('TD')
                        const dataDNI = document.createElement('TD')
                        const datadirec = document.createElement('TD')
                        const dataDireccion = document.createElement('TD')
                        const dataUsu = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const databtnedit=document.createElement('TD')


                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Borrar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = socio[0]
                        datanom.textContent = socio[1]
                        dataApellido.textContent = socio [2]
                        dataCorreo.textContent = socio [3]
                        dataDNI.textContent = socio [4]
                        datadirec.textContent = socio [5]
                        dataDireccion.textContent = socio [6]
                        dataUsu.textContent = socio [7]
                        datafecha.textContent = socio [8]

                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        dataApellido.classList.add('celda')
                        dataCorreo.classList.add('celda')
                        dataDNI.classList.add('celda')
                        datadirec.classList.add('celda')
                        dataDireccion.classList.add('celda')
                        dataUsu.classList.add('celda')
                        datafecha.classList.add('celda')
                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(dataApellido)
                        row.append(dataCorreo)
                        row.append(dataDNI)
                        row.append(datadirec)
                        row.append(dataDireccion)
                        row.append(dataUsu)
                        row.append(datafecha)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consulta_usuarios.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanom = document.createElement('TD')
                const dataApellido = document.createElement('TD')
                const dataCorreo = document.createElement('TD')
                const dataDNI = document.createElement('TD')
                const datadirec = document.createElement('TD')
                const dataDireccion = document.createElement('TD')
                const dataUsu = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Borrar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+socio.Id)
                dataid.textContent = socio[0]
                datanom.textContent = socio[1]
                dataApellido.textContent = socio[2]
                dataCorreo.textContent = socio[3]
                dataDNI.textContent = socio[4]
                datadirec.textContent = socio[5]
                dataDireccion.textContent = socio[6]
                dataUsu.textContent = socio[7]
                datafecha.textContent = socio[8]
                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataCorreo.classList.add('celda')
                dataDNI.classList.add('celda')
                datadirec.classList.add('celda')
                dataDireccion.classList.add('celda')
                dataUsu.classList.add('celda')
                datafecha.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataCorreo)
                row.append(dataDNI)
                row.append(datadirec)
                row.append(dataDireccion)
                row.append(dataUsu)
                row.append(datafecha)
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
  getDatausu(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatausu(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatausu(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatausu(p)
})
pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatausu(p)

})