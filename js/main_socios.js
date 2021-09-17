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
        
        xhr.open('GET', "../php/insercion_socios.php")

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
                        const dataDNI = document.createElement('TD')
                        const dataEstado = document.createElement('TD')
                        const dataEmail = document.createElement('TD')
                        const dataDireccion = document.createElement('TD')
                        const dataTelefono = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = socio[0]
                        datanom.textContent = socio[1]
                        dataApellido.textContent = socio [2]
                        dataDNI.textContent = socio [3]
                        dataEstado.textContent = socio [4]
                        dataEmail.textContent = socio [5]
                        dataDireccion.textContent = socio [6]
                        dataTelefono.textContent = socio [7]


                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        dataApellido.classList.add('celda')
                        dataDNI.classList.add('celda')
                        dataEstado.classList.add('celda')
                        dataEmail.classList.add('celda')
                        dataDireccion.classList.add('celda')
                        dataTelefono.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(dataApellido)
                        row.append(dataDNI)
                        row.append(dataEstado)
                        row.append(dataEmail)
                        row.append(dataDireccion)
                        row.append(dataTelefono)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_socios.php?x=${x}`)

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
                const dataDNI = document.createElement('TD')
                const dataEstado = document.createElement('TD')
                const dataEmail = document.createElement('TD')
                const dataDireccion = document.createElement('TD')
                const dataTelefono = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+socio.Id)
                dataid.textContent = socio[0]
                datanom.textContent = socio[1]
                dataApellido.textContent = socio[2]
                dataDNI.textContent = socio[3]
                dataEstado.textContent = socio[4]
                dataEmail.textContent = socio[5]
                dataDireccion.textContent = socio[6]
                dataTelefono.textContent = socio[7]

                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataDNI.classList.add('celda')
                dataEstado.classList.add('celda')
                dataEmail.classList.add('celda')
                dataDireccion.classList.add('celda')
                dataTelefono.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataDNI)
                row.append(dataEstado)
                row.append(dataEmail)
                row.append(dataDireccion)
                row.append(dataTelefono)
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
         
         window.location.href="../php/edicionsocios.php?t="+t
    }
})



