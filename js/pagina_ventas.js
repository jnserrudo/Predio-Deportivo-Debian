const btnirregventas=document.getElementById('btnirregventas')
btnirregventas.addEventListener('click',()=>{
    window.location.href='../php/regventas.php'
})


const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
    
}
)


const table = document.getElementById('tabla')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/consultapaginaventa.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                      //  const datanomdep = document.createElement('TD')
                        const datatotal = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Ver"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                        //datanomdep.textContent = orden [2]
                        datatotal.textContent = orden [2]

                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        //datanomdep.classList.add('celda')
                        datatotal.classList.add('celda')


                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                      //  row.append(datanomdep)
                        row.append(datatotal)

                        row.append(databtnedit)
                        fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultapaginaventa.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                        //const datanomdep = document.createElement('TD')
                        const datatotal = document.createElement('TD')

                        const databtnedit=document.createElement('TD')
                        
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Ver"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                       // datanomdep.textContent = orden [2]
                        datatotal.textContent = orden [3]

                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        //datanomdep.classList.add('celda')
                        datatotal.classList.add('celda')


                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                       // row.append(datanomdep)
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

getData() 

