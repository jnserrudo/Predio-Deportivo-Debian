


const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
    
}
)





busq.addEventListener('click',
(e)=>{
    console.log(e.target);
    console.log("nashe")

}
)

const table = document.getElementById('tabla')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/consultaordenpago.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const datairproveedor = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = orden[0]
                        datafecha.textContent = orden[1]
                        datairproveedor.textContent = orden[2]                      

                        dataid.classList.add('celda')
                        datafecha.classList.add('celda')
                        datairproveedor.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datafecha)
                        row.append(datairproveedor)
                        
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultaordenpago.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const datairproveedor = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+orden.Id)
                dataid.textContent = orden[0]
                datafecha.textContent = orden[1]
                datairproveedor.textContent = orden[2]  
                


                dataid.classList.add('celda')
                datafecha.classList.add('celda')
                datairproveedor.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datafecha)
                row.append(datairproveedor)
                
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

const btnirabmordpagos= document.getElementById('btnverordpagos')
btnirabmordpagos.addEventListener('click',()=>{

    window.location.href=`../php/abmorden_pago.php`
})
