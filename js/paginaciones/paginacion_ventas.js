

const getDatavent = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        xhr.open('GET', `../php/insumosxdeposito.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataNombre = document.createElement('TD')
                const datastockxdep = document.createElement('TD')
                const datacant=document.createElement('TD')
                const cant=document.createElement('input')
                const dataprecio = document.createElement('TD')

                cant.classList.add('inputventas')
                datacant.append(cant)

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                dataNombre.textContent = depositos[0]
                datastockxdep.textContent = depositos[1]
                dataprecio.textContent = depositos[2]

                
                dataNombre.classList.add('celda')
                datastockxdep.classList.add('celda')
                datacant.classList.add('celda')

                dataprecio.classList.add('celda')

                databtnedit.classList.add('celda')

               
                // console.log("soy el data id :"+dataid.textContent)
                row.append(dataNombre)
                row.append(datastockxdep) 
                row.append(datacant)
                       
                row.append(dataprecio)

                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.append(fragment);
        })

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