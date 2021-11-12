// -------------------------------------Control de Busqueda de Socio

const buscar=document.getElementById("buscarcuota")
buscar.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  const p = 1;
  DatosCuotas(x,p);
})

const tablacuotas = document.getElementById('tablacuotas')


const DatosCuotas = (x,p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    const h = document.getElementById("txtidsocio").value;

    if ( x == undefined && p == undefined){
        xhr.open('GET', `../php/cobroscuotasinser.php?h=${h}`)
    }
    else if(x != undefined && p == undefined){
        xhr.open('GET', `../php/cobroscuotasinser.php?x=${x}&h=${h}`)
    }
    else if(x == undefined && p != undefined){
        xhr.open('GET', `../php/cobroscuotasinser.php?p=${p}&h=${h}`)
    }
    else{
        xhr.open('GET', `../php/cobroscuotasinser.php?x=${x}&h=${h}&p=${p}`)
    }

    xhr.addEventListener('load', (datosconsulta) => {
        const dataJSON = JSON.parse(datosconsulta.target.response)
        const fragment = document.createDocumentFragment()

        for (const cuota of dataJSON) {
            const row = document.createElement('TR')
            const dataid = document.createElement('TD')
            const datames = document.createElement('TD')
            const dataanio = document.createElement('TD')
            const dataimporte = document.createElement('TD')
            const dataseleccion = document.createElement('TD')
            const databtnedit=document.createElement('TD')
            const btnedit=document.createElement('button')
            btnedit.classList.add("btnseleccionardepo")
            btnedit.textContent="Pagar"
            databtnedit.append(btnedit)
                    
            dataid.textContent = cuota[0]
            datames.textContent = cuota[1]
            dataanio.textContent = cuota[2]
            dataimporte.textContent = '$'+cuota[3]
            //dataseleccion.textContent = "•"

            dataid.classList.add('celda')
            datames.classList.add('celda')
            dataanio.classList.add('celda')
            dataimporte.classList.add('celda')
            //dataseleccion.classList.add('celda')
            databtnedit.classList.add('celda')

            row.append(dataid)
            row.append(datames)
            row.append(dataanio)
            row.append(dataimporte)
            //row.append(dataseleccion)
            row.append(databtnedit)

            fragment.append(row)
        }
        const hijo=tablacuotas.children[0];
            
        while(hijo.nextElementSibling){;
            tablacuotas.removeChild(hijo.nextElementSibling);
        }
        
        tablacuotas.append(fragment);
    })
    /*
    if (x == undefined) {
        
        const h = document.getElementById("txtidsocio").value;
        xhr.open('GET', `../php/cobroscuotasinser.php?h=${h}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const cuota of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const dataimporte = document.createElement('TD')
                const dataseleccion = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Pagar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = cuota[0]
                datames.textContent = cuota[1]
                dataanio.textContent = cuota[2]
                dataimporte.textContent = '$'+cuota[3]
                dataseleccion.textContent = ""

                dataid.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                dataimporte.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datames)
                row.append(dataanio)
                row.append(dataimporte)
                row.append(dataseleccion)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablacuotas.appendChild(fragment)
        })
    } 
    else {
        const h = document.getElementById("txtidsocio").value;
        xhr.open('GET', `../php/cobroscuotasinser.php?x=${x}&h=${h}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const cuota of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const dataimporte = document.createElement('TD')
                const dataseleccion = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Pagar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = cuota[0]
                datames.textContent = cuota[1]
                dataanio.textContent = cuota[2]
                dataimporte.textContent = '$'+cuota[3]
                dataseleccion.textContent = ""

                dataid.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                dataimporte.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datames)
                row.append(dataanio)
                row.append(dataimporte)
                row.append(dataseleccion)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablacuotas.children[0];
                
            while(hijo.nextElementSibling){;
                tablacuotas.removeChild(hijo.nextElementSibling);
            }
            
            tablacuotas.append(fragment);
        })
    }*/

    xhr.send()
}

DatosCuotas();

// ------------------ boton pagar de la tabla

const txtmes = document.getElementById('txtmes');
const txtaño = document.getElementById('txtaño');
const txtsaldo = document.getElementById('txtsaldo');
const txtimporte = document.getElementById('txtpago');

tablacuotas.addEventListener('click',(e)=>{
    const pagar =e.target;
    if(pagar.classList.contains('btnseleccionardepo')){
        
        //obtengo el id
        
        //console.log("Mes:",m)
        txtmes.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
        //console.log("Mes:",m)
        txtaño.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
        //console.log("Año:",a)
        txtsaldo.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent

        var i = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
        txtimporte.setAttribute("max", i.substr(1));

        /*var valorpago = document.getElementById("txtpago");
        valorpago.setAttribute("max",txtsaldo)*/

        reg.classList.add('activar');
        console.log("aa")
	    cont_vent.classList.add('activar'); 
        //contvent
        //console.log("entro en ",t);
        //window.location.href=`../php/depositosxinsumos.php?t=${t}`;
    }
    else{
        console.log("entro aca");
    }
})

const iconocerrar = document.getElementById('icono_cerrar');
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	cont_vent.classList.remove('activar');
    txtimporte.value = "";
});

//------------------- Boton Volver

const btnvolver=document.getElementById("btnvolver")
btnvolver.addEventListener('click',(e)=>{
    window.location.href=`../php/cobros.php?`;
})

//-----------------  Paginacion

/*
const DatosCuotasPag = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    const h = document.getElementById("txtidsocio").value;
    if (p == undefined) {
        console.log("chauu:")

        xhr.open('GET', `../php/cobroscuotasinser.php?h=${h}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const cuota of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const dataimporte = document.createElement('TD')
                const dataseleccion = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Pagar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = cuota[0]
                datames.textContent = cuota[1]
                dataanio.textContent = cuota[2]
                dataimporte.textContent = '$'+cuota[3]
                dataseleccion.textContent = ""

                dataid.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                dataimporte.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datames)
                row.append(dataanio)
                row.append(dataimporte)
                row.append(dataseleccion)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablacuotas.appendChild(fragment)
        })
    } 
    else {
        xhr.open('GET', `../php/cobroscuotasinser.php?h=${h}&p=${p}`)
        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const cuota of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const dataimporte = document.createElement('TD')
                const dataseleccion = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Pagar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = cuota[0]
                datames.textContent = cuota[1]
                dataanio.textContent = cuota[2]
                dataimporte.textContent = '$'+cuota[3]
                dataseleccion.textContent = ""

                dataid.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                dataimporte.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datames)
                row.append(dataanio)
                row.append(dataimporte)
                row.append(dataseleccion)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablacuotas.children[0];     
            while(hijo.nextElementSibling){;
                tablacuotas.removeChild(hijo.nextElementSibling);
            }    
            tablacuotas.appendChild(fragment)
        })
    }
    xhr.send()

    
}*/


const pag1=document.getElementById('btnpagcuotas1')
const pag2=document.getElementById('btnpagcuotas2')
const pag3=document.getElementById('btnpagcuotas3')
const pag4=document.getElementById('btnpagcuotas4')
const pag5=document.getElementById('btnpagcuotas5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
    const x=document.getElementById("buscarcuota").value
    DatosCuotas(x,p);
})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    const x=document.getElementById("buscarcuota").value
    DatosCuotas(x,p);
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    const x=document.getElementById("buscarcuota").value
    DatosCuotas(x,p);
})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
    const x=document.getElementById("buscarcuota").value
    DatosCuotas(x,p);
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
    const x=document.getElementById("buscarcuota").value
    DatosCuotas(x,p);
})

