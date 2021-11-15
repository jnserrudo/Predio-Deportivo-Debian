const input=document.getElementById("input");



console.log("aaaaaaa");

const consulta=document.getElementById("txtconsulta");















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
        
        xhr.open('GET', "../php/insercion.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        console.log(insumo+"y su primero seria"+insumo[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataidcat = document.createElement('TD')
                        const datanom = document.createElement('TD')
                        const datadesc = document.createElement('TD')
                        const dataprecio = document.createElement('TD')
                        // const dataStock = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = insumo[0]
                        dataidcat.textContent = insumo[1]
                        datanom.textContent = insumo[2]
                        datadesc.textContent = insumo[3]
                        dataprecio.textContent = insumo[4]
                        // dataStock.textContent = insumo[5]

                        dataid.classList.add('celda')
                        dataidcat.classList.add('celda')
                        datanom.classList.add('celda')
                        datadesc.classList.add('celda')
                        dataprecio.classList.add('celda')
                        // dataStock.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataidcat)
                        row.append(datanom)
                        row.append(datadesc)
                        row.append(dataprecio)
                        // row.append(dataStock)
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataidcat = document.createElement('TD')
                const datanom = document.createElement('TD')
                const datadesc = document.createElement('TD')
                const dataprecio = document.createElement('TD')
                // const dataStock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+insumo.Id)
                dataid.textContent = insumo[0]
                dataidcat.textContent = insumo[1]
                datanom.textContent = insumo[2]
                datadesc.textContent = insumo[3]
                dataprecio.textContent = insumo[4]
                // dataStock.textContent = insumo[5]
                


                dataid.classList.add('celda')
                dataidcat.classList.add('celda')
                datanom.classList.add('celda')
                datadesc.classList.add('celda')
                dataprecio.classList.add('celda')
                // dataStock.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataidcat)
                row.append(datanom)
                row.append(datadesc)
                row.append(dataprecio)
                // row.append(dataStock)
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
         
         window.location.href="../php/edicioninsumo.php?t="+t
    }
})



const btnregistrar=document.getElementById('btnregistrar')
btnregistrar.addEventListener('click',()=>{
    let n=document.getElementById('nom').value
    let c=document.getElementById('cat').value
    let p=document.getElementById('precio').value
    let d=document.getElementById('desc').value
    console.log(d)
    window.location.href=`../php/abminsumo.php?c=${c}&n=${n}&p=${p}&d=${d}`

})