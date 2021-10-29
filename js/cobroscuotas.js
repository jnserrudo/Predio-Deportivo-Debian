// -------------------------------------Control de Busqueda de Socio

const buscar=document.getElementById("buscarcuota")
buscar.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  DatosCuotas(x);
})

const tablacuotas = document.getElementById('tablacuotas')


const DatosCuotas = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

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
                dataimporte.textContent = cuota[3]
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
                dataimporte.textContent = cuota[3]
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
    }

    xhr.send()
}

DatosCuotas();

// ------------------ boton pagar de la tabla
const txtmes = document.getElementById('txtmes');
const txtaño = document.getElementById('txtaño');
const txtsaldo = document.getElementById('txtsaldo');

tablacuotas.addEventListener('click',(e)=>{
    const pagar =e.target;
    if(pagar.classList.contains('btnseleccionardepo')){
        
        //obtengo el id
        var i = pagar.parentElement.parentElement.firstElementChild.textContent
        //console.log("Mes:",m)
        txtmes.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
        //console.log("Mes:",m)
        txtaño.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
        //console.log("Año:",a)
        txtsaldo.value = pagar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent

        
        /*
        let xhr3
        if (window.XMLHttpRequest) xhr3 = new XMLHttpRequest()
        else xhr3 = new ActiveXObject("Microsoft.XMLHTTP")
        xhr3.open('GET', `../php/cobroscuotasupdate.php?i=${i}&s=${s}`)
        xhr3.addEventListener('load',()=>
        {
            console.log("llegue")
        })
        xhr.send()
        */
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
});

//------------------- Boton Volver

const btnvolver=document.getElementById("btnvolver")
btnvolver.addEventListener('click',(e)=>{
    window.location.href=`../php/cobros.php?`;
})

//-----------------  Paginacion


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
                dataimporte.textContent = cuota[3]
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
                dataimporte.textContent = cuota[3]
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
}


const pag1=document.getElementById('btnpagcuotas1')
const pag2=document.getElementById('btnpagcuotas2')
const pag3=document.getElementById('btnpagcuotas3')
const pag4=document.getElementById('btnpagcuotas4')
const pag5=document.getElementById('btnpagcuotas5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
    DatosCuotasPag(p)
})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    DatosCuotasPag(p)
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    DatosCuotasPag(p)
})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
    DatosCuotasPag(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
    DatosCuotas(p)
})

