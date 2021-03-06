
const getDatadepo = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/inserciondepo.php")

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const deposito of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datatipo = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = deposito[0]
                datanombre.textContent = deposito[1]
                datatipo.textContent = deposito[2]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datatipo.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datatipo)
                row.append(databtnedit)

                fragment.append(row)
            }
            tabla.appendChild(fragment)
        })
    } 
    else {
        xhr.open('GET', `../php/inserciondepo.php?p=${p}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const deposito of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datatipo = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = deposito[0]
                datanombre.textContent = deposito[1]
                datatipo.textContent = deposito[2]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datatipo.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datatipo)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tabla.children[0];     
            while(hijo.nextElementSibling){;
                tabla.removeChild(hijo.nextElementSibling);
            }    
            tabla.append(fragment);
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
    getDatadepo(p)
})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    getDatadepo(p)
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    getDatadepo(p)
})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
    getDatadepo(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
    getDatadepo(p)
})


