



const getDataequipo = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/insercionequipo.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const equipo of dataJSON) {
                        console.log(equipo +"y su primero seria"+ equipo[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataNombre = document.createElement('TD')
                        const dataDisciplina = document.createElement('TD') 
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = equipo[0]
                        dataNombre.textContent = equipo[1]
                        dataDisciplina.textContent = equipo[2]
                       

                        dataId.classList.add('celda')
                        dataNombre.classList.add('celda')
                        dataDisciplina.classList.add('celda')
                        
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataNombre)
                        row.append(dataDisciplina)                       
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercionequipo.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const equipo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataId = document.createElement('TD')
                const dataNombre = document.createElement('TD')
                const dataDisciplina = document.createElement('TD')               
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+ equipo.Id)
                dataId.textContent = equipo[0]
                dataNombre.textContent = equipo[1]
                dataDisciplina.textContent = equipo[2]
                
            

                dataId.classList.add('celda')
                dataNombre.classList.add('celda')
                dataDisciplina.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataId)
                row.append(dataNombre)
                row.append(dataDisciplina)                       
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
  //  window.location.href=`../../php/abminstalacion.php?p=${p}`
  getDataequipo(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminstalacion.php?p=${p}`
    getDataequipo(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminstalacion.php?p=${p}`
    getDataequipo(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminstalacion.php?p=${p}`
  getDataequipo(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminstalacion.php?p=${p}`
  getDataequipo(p)

})












