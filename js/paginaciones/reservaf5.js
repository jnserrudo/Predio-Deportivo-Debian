



const getDatares = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/insercioreservaf5.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const reservaf5 of dataJSON) {
                console.log(reservaf5 +"y su primero seria"+reservaf5[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        
                        const dataFecha = document.createElement('TD')
                const dataHora = document.createElement('TD')    
                const dataSolicitante = document.createElement('TD') 
                const dataContacto = document.createElement('TD') 
                const dataInstalacion = document.createElement('TD') 
                const dataDisciplina = document.createElement('TD')           
                const databtnedit=document.createElement('TD')
                const databtnreservar=document.createElement('TD')
                const btnedit=document.createElement('button')
                const btnreservar=document.createElement('button')
                        btnedit.classList.add("btneditar")
                btnreservar.classList.add("btnreservar")
                btnedit.textContent="Anular"
                btnreservar.textContent="Reservar"
                databtnedit.append(btnedit)
                databtnreservar.append(btnreservar)
                        
                        dataInstalacion.textContent = reservaf5[0]
                  dataSolicitante.textContent = reservaf5[1]



                
                  /*
                  dataFecha.classList.add('celda')
                  dataHora.classList.add('celda')
                  dataSolicitante.classList.add('celda')
                  dataContacto.classList.add('celda')
                  dataInstalacion.classList.add('celda')
                  dataDisciplina.classList.add('celda')*/
                  dataInstalacion.classList.add('celda')
                  dataSolicitante.classList.add('celda')

                  


                  
                  databtnedit.classList.add('celda')

                 
                  // console.log("soy el data id :"+dataid.textContent)
                  /*
                  row.append(dataFecha)
                  row.append(dataHora)
                  row.append(dataSolicitante)
                  row.append(dataContacto)
                  row.append(dataInstalacion)
                  row.append(dataDisciplina)                       
                  row.append(databtnedit)*/

                  row.append(dataInstalacion)
                  row.append(dataSolicitante)
                  

                  if(dataSolicitante.innerText==''){
                    //console.log("No hay solicitante")
                    //row.append(databtnedit)
                    row.append(databtnreservar)
                }
                else{
                  row.append(databtnedit)

                }

                  fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } 
                else {
        xhr.open('GET', `../php/insercionreservaf5.php?p=${p}&x=${x}&y=${y}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const reservaf5 of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')                
                const dataFecha = document.createElement('TD')
                const dataHora = document.createElement('TD')    
                const dataSolicitante = document.createElement('TD') 
                const dataContacto = document.createElement('TD') 
                const dataInstalacion = document.createElement('TD') 
                const dataDisciplina = document.createElement('TD')           
                const databtnedit=document.createElement('TD')
                const databtnreservar=document.createElement('TD')
                const btnedit=document.createElement('button')
                const btnreservar=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnreservar.classList.add("btnreservar")
                btnedit.textContent="Anular"
                btnreservar.textContent="Reservar"
                databtnedit.append(btnedit)
                databtnreservar.append(btnreservar)
                
                  console.log("soy el id nro"+ reservaf5.Id)
                  
                  /*
                  dataFecha.textContent = reservaf5[1]
                  dataHora.textContent = reservaf5[2]
                  dataSolicitante.textContent = reservaf5[3]
                  dataContacto.textContent = reservaf5[4]
                  dataInstalacion.textContent = reservaf5[5]
                  dataDisciplina.textContent = reservaf5[6]
                  */

                  dataInstalacion.textContent = reservaf5[0]
                  dataSolicitante.textContent = reservaf5[1]



                
                  /*
                  dataFecha.classList.add('celda')
                  dataHora.classList.add('celda')
                  dataSolicitante.classList.add('celda')
                  dataContacto.classList.add('celda')
                  dataInstalacion.classList.add('celda')
                  dataDisciplina.classList.add('celda')*/
                  dataInstalacion.classList.add('celda')
                  dataSolicitante.classList.add('celda')

                  


                  
                  databtnedit.classList.add('celda')
                  databtnreservar.classList.add('celda')


                 
                  // console.log("soy el data id :"+dataid.textContent)
                  /*
                  row.append(dataFecha)
                  row.append(dataHora)
                  row.append(dataSolicitante)
                  row.append(dataContacto)
                  row.append(dataInstalacion)
                  row.append(dataDisciplina)                       
                  row.append(databtnedit)*/
                  

                  row.append(dataInstalacion)
                  row.append(dataSolicitante)
                  if(dataSolicitante.innerText==''){
                      //console.log("No hay solicitante")
                      //row.append(databtnedit)
                      row.append(databtnreservar)
                  }
                  else{
                    row.append(databtnedit)

                  }
                  

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
  getDatares(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatares(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDatares(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatares(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDatares(p)

})












