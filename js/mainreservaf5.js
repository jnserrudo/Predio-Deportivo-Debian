const input=document.getElementById("input");
console.log("aaaaaaa");
const consulta=document.getElementById("txtconsulta");

// calendario
const busq=document.getElementById("busqueda2")
// lista de disciplina
const disc=document.getElementById("idprov")
// buscador global

//const busqueda=document.getElementById('busqueda')

// definicion de variables

var disciplina=disc.value
console.log(disciplina)

var fecha=busq.value
console.log(fecha)



//var busqglobal


// 
busq.addEventListener('change',
(e)=>{
  fecha= e.target.value;
  console.log(fecha);
  getData(fecha,disciplina);

    
    
}
)
/*
busqueda.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getDataglobal(x);
    
}
)
*/



busq.addEventListener('click',
(e)=>{
    console.log(e.target);
    console.log("nashe")

}
)

const table = document.getElementById('tabla')

// buscador calendario
const getData = (x,y) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', `../php/insercionreservaf5.php?y=${y}`)

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
    } else {
        console.log(x +'  '+ y)

        xhr.open('GET', `../php/insercionreservaf5.php?x=${x}&y=${y}`)

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

console.log(fecha +'  '+ disciplina)
getData(fecha,disciplina) 

/*buscador global
const getDataglobal = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/insercionreservaf5global.php")

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
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        
                        dataFecha.textContent = reservaf5[1]
                        dataHora.textContent = reservaf5[2]
                        dataSolicitante.textContent = reservaf5[3]
                        dataContacto.textContent = reservaf5[4]
                        dataInstalacion.textContent = reservaf5[5]
                        dataDisciplina.textContent = reservaf5[6]
                       

                        
                        dataFecha.classList.add('celda')
                        dataHora.classList.add('celda')
                        dataSolicitante.classList.add('celda')
                        dataContacto.classList.add('celda')
                        dataInstalacion.classList.add('celda')
                        dataDisciplina.classList.add('celda')

                        
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        
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
        xhr.open('GET', `../php/insercionreservaf5global.php?x=${x}`)

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
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+ reservaf5.Id)
        
                  dataFecha.textContent = reservaf5[1]
                  dataHora.textContent = reservaf5[2]
                  dataSolicitante.textContent = reservaf5[3]
                  dataContacto.textContent = reservaf5[4]
                  dataInstalacion.textContent = reservaf5[5]
                  dataDisciplina.textContent = reservaf5[6]
                
          
                  dataFecha.classList.add('celda')
                  dataHora.classList.add('celda')
                  dataSolicitante.classList.add('celda')
                  dataContacto.classList.add('celda')
                  dataInstalacion.classList.add('celda')
                  dataDisciplina.classList.add('celda')

                  
                  databtnedit.classList.add('celda')

                 
                  // console.log("soy el data id :"+dataid.textContent)
                
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
*/

const getDataDisciplina = (x,y) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', `../php/insercionreservaf5disciplina.php?y=${y}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const reservaf5 of dataJSON) {
                        console.log(reservaf5 +"y su primero seria"+reservaf5[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                      
                //         const dataFecha = document.createElement('TD')
                // const dataHora = document.createElement('TD')    
                const dataSolicitante = document.createElement('TD') 
                // const dataContacto = document.createElement('TD') 
                const dataInstalacion = document.createElement('TD') 
                // const dataDisciplina = document.createElement('TD')           
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

            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.append(fragment);

        })
    } else {
        xhr.open('GET', `../php/insercionreservaf5disciplina.php?x=${x}&y=${y}`)

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

const form= document.getElementById("f")

// form.addEventListener('submit',(e)=>{
//     // e.preventDefault()
//     // form.reset()
// })


if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

btnvent.addEventListener('click', ()=>{
	//reg.classList.add('activar');
    window.location.href="../php/cobrarf5.php?"
    console.log("aa")
	//contvent.classList.add('activar');
});

iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});


/*
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

*/

disc.addEventListener('change',
()=>{
    tipo=disc.value
    //if(fecha===undefined){} 
    console.log(tipo)
    getDataDisciplina(fecha,tipo);
    
}
)

//---------------------------------------------------------------------


const edicion=document.getElementById('tabla')

const fecha_reg=document.getElementById("busqueda2")

const horario_reg =document.getElementById("idprov")

const fechavent=document.getElementById("fechavent")

const horavent =document.getElementById("horavent")

const instalacionvent=document.getElementById("instalacionvent")



// obtengo nombre de la instalacion y el solicitante
var instalacion
var solicitante
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btnreservar')){
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
         instalacion=editar.parentElement.parentElement.firstElementChild.textContent

         
        fechavent.value=fecha_reg.value
        horavent.value=horario_reg.value
        instalacionvent.value=instalacion
         reg.classList.add('activar');
         console.log("aa")
        //  cont_vent.classList.add('activar'); 

        //  cargar fecha hora instalacion


       
        // 
         //contvent
         //console.log("entro en ",t);
         //window.location.href=`../php/depositosxinsumos.php?t=${t}`;
     }
     else{
        if(editar.classList.contains('btneditar')){
                console.log("entro aca");
                reg2.classList.add('activar');
                // ventana de anulacion
                instalacion=editar.parentElement.parentElement.firstElementChild.textContent
                solicitante=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent

                console.log('la instalacion es: '+instalacion+'el solicitante es:'+ solicitante)
                
        }
               
     }
    
})



// ventana de anulacion

const btncancelar=document.getElementById('btncancelar')
const btnconfirmar=document.getElementById('btnconfirmar')

btncancelar.addEventListener('click',()=>{

    reg2.classList.remove('activar')
})


btnconfirmar.addEventListener('click',()=>{
    window.location.href=`../php/abmreservaf5.php?ni=${instalacion}&s=${solicitante}`
})

// registrar reserva

const btnregistrar=document.getElementById('btnregistrar')

btnregistrar.addEventListener('click',()=>{
    
    
    var solicitanteres=document.getElementById('solicitantevent').value
    var contacto=document.getElementById('contactovent').value

    window.location.href=`../php/abmreservaf5.php?ni=${instalacion}&sr=${solicitanteres}&cont=${contacto}&fecha=${fechavent.value}&hora=${horavent.value}`

})