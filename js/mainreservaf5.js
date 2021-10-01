const input=document.getElementById("input");
console.log("aaaaaaa");
const consulta=document.getElementById("txtconsulta");

const busq=document.getElementById("busqueda2")
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
        
        xhr.open('GET', "../php/insercionreservaf5.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const reservaf5 of dataJSON) {
                        console.log(reservaf5 +"y su primero seria"+reservaf5[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                        const dataHora = document.createElement('TD') 
                        const dataSolicitante = document.createElement('TD') 
                        const dataContacto = document.createElement('TD') 
                        const dataInstalacion = document.createElement('TD') 
                        const dataDisciplina = document.createElement('TD') 
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = reservaf5[0]
                        dataFecha.textContent = reservaf5[1]
                        dataHora.textContent = reservaf5[2]
                        dataSolicitante.textContent = reservaf5[3]
                        dataContacto.textContent = reservaf5[4]
                        dataInstalacion.textContent = reservaf5[5]
                        dataDisciplina.textContent = reservaf5[6]
                       

                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        dataHora.classList.add('celda')
                        dataSolicitante.classList.add('celda')
                        dataContacto.classList.add('celda')
                        dataInstalacion.classList.add('celda')
                        dataDisciplina.classList.add('celda')

                        
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                        row.append(dataHora)
                        row.append(dataSolicitante)
                        row.append(dataContacto)
                        row.append(dataInstalacion)
                        row.append(dataDisciplina)                       
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercionreservaf5.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const reservaf5 of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataId = document.createElement('TD')
                const dataFecha = document.createElement('TD')
                const dataHora = document.createElement('TD')    
                const dataSolicitante = document.createElement('TD') 
                const dataContacto = document.createElement('TD') 
                const dataInstalacion = document.createElement('TD') 
                const dataDisciplina = document.createElement('TD')           
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+ reservaf5.Id)
                  dataId.textContent = reservaf5[0]
                  dataFecha.textContent = reservaf5[1]
                  dataHora.textContent = reservaf5[2]
                  dataSolicitante.textContent = reservaf5[3]
                  dataContacto.textContent = reservaf5[4]
                  dataInstalacion.textContent = reservaf5[5]
                  dataDisciplina.textContent = reservaf5[6]
                
                  dataId.classList.add('celda')
                  dataFecha.classList.add('celda')
                  dataHora.classList.add('celda')
                  dataSolicitante.classList.add('celda')
                  dataContacto.classList.add('celda')
                  dataInstalacion.classList.add('celda')
                  dataDisciplina.classList.add('celda')

                  
                  databtnedit.classList.add('celda')

                 
                  // console.log("soy el data id :"+dataid.textContent)
                  row.append(dataId)
                  row.append(dataFecha)
                  row.append(dataHora)
                  row.append(dataSolicitante)
                  row.append(dataContacto)
                  row.append(dataInstalacion)
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





const btnvent = document.getElementById('btnvent');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');

const form= document.getElementById("f")

// form.addEventListener('submit',(e)=>{
//     // e.preventDefault()
//     // form.reset()
// })


if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

getData() 
btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});

iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});



const edicion=document.getElementById('tabla')


edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=editar.parentElement.parentElement.firstElementChild.textContent
         console.log(t)
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      console.log("llegue")
        //  })
         
        //  xhr.send()
         
         window.location.href="../php/edicionreservaf5.php?t="+t
    }
})



