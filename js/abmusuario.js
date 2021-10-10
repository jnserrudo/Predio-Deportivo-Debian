const table = document.getElementById('tabla')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
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
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = socio[0]
                        datanom.textContent = socio[1]
                        dataApellido.textContent = socio [2]
                        dataCorreo.textContent = socio [3]
                        dataDNI.textContent = socio [4]
                        datadirec.textContent = socio [5]
                        dataDireccion.textContent = socio [6]
                        dataUsu.textContent = socio [7]


                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        dataApellido.classList.add('celda')
                        dataCorreo.classList.add('celda')
                        dataDNI.classList.add('celda')
                        datadirec.classList.add('celda')
                        dataDireccion.classList.add('celda')
                        dataUsu.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(dataApellido)
                        row.append(dataCorreo)
                        row.append(dataDNI)
                        row.append(datadirec)
                        row.append(dataDireccion)
                        row.append(dataUsu)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consulta_usuarios.php?x=${x}`)

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
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
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

                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataCorreo.classList.add('celda')
                dataDNI.classList.add('celda')
                datadirec.classList.add('celda')
                dataDireccion.classList.add('celda')
                dataUsu.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataCorreo)
                row.append(dataDNI)
                row.append(datadirec)
                row.append(dataDireccion)
                row.append(dataUsu)
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