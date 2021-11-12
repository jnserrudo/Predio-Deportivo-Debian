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
        
        xhr.open('GET', "../php/insercioncobrarf5.php")

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
                        btnedit.textContent="Cobrar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = socio[0]
                        datanom.textContent = socio[1]
                        dataApellido.textContent = socio [2]
                        dataDNI.textContent = socio [3]
                        dataEstado.textContent = socio [4]
                        dataEmail.textContent = socio [5]
                        dataDireccion.textContent = socio [6]
                        //dataTelefono.textContent = socio [7]


                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        dataApellido.classList.add('celda')
                        dataDNI.classList.add('celda')
                        dataEstado.classList.add('celda')
                        dataEmail.classList.add('celda')
                        dataDireccion.classList.add('celda')
                        //dataTelefono.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(dataApellido)
                        row.append(dataDNI)
                        row.append(dataEstado)
                        row.append(dataEmail)
                        row.append(dataDireccion)
                        //row.append(dataTelefono)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercioncobrarf5.php?x=${x}`)

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
                btnedit.textContent="Cobrar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+socio.Id)
                dataid.textContent = socio[0]
                datanom.textContent = socio[1]
                dataApellido.textContent = socio[2]
                dataDNI.textContent = socio[3]
                dataEstado.textContent = socio[4]
                dataEmail.textContent = socio[5]
                dataDireccion.textContent = socio[6]
                //dataTelefono.textContent = socio[7]

                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataDNI.classList.add('celda')
                dataEstado.classList.add('celda')
                dataEmail.classList.add('celda')
                dataDireccion.classList.add('celda')
                //dataTelefono.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataDNI)
                row.append(dataEstado)
                row.append(dataEmail)
                row.append(dataDireccion)
                //row.append(dataTelefono)
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
const reg2 = document.getElementById('reg2');

const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');






getData() 

/*
btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});
*/
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});



const edicion=document.getElementById('tabla')
var idreserva

const fechavent=document.getElementById("fechavent")
var fecha_reg

var solicitante 
const solicitantevent=document.getElementById("solicitantevent")

var hora
const horavent=document.getElementById("horavent")

var monto
const montovent=document.getElementById("montovent")

const formapago=document.getElementById("formapago")

edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        /*let xhr
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
         
         window.location.href="../php/edicioncobrarf5.php?t="+t
         */
         idreserva=editar.parentElement.parentElement.firstElementChild.textContent
         fecha_reg=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
         //console.log(fecha_reg)
         fechavent.value=fecha_reg
         solicitante=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
         console.log(solicitante)
         solicitantevent.value=solicitante
         hora=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
         horavent.value=hora
         monto=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent
         montovent.value=monto




         reg.classList.add('activar');
         console.log("aa")
         //cont_vent.classList.add('activar'); 
         //contvent
         //console.log("entro en ",t);
         //window.location.href=`../php/depositosxinsumos.php?t=${t}`;
     }
     else{
         //console.log("entro aca");
         //reg2.classList.add('activar');
     }
    
})

const btnvolver=document.getElementById("btnvent")
btnvolver.addEventListener('click',(e)=>{
    window.location.href=`../php/abmreservaf5.php?`;
})


const btnpagar=document.getElementById('btnpagar')
btnpagar.addEventListener('click',()=>{
    let fp=formapago.options[formapago.selectedIndex].value
    console.log(fp+' '+ monto)
    window.location.href=`../php/cobrarf5.php?fr=${fecha_reg}&m=${monto}&fp=${fp}&idr=${idreserva}`

})