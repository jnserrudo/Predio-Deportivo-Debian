// -------------------------------------Control de Busqueda de Socio

const buscar=document.getElementById("buscarsocio")
buscar.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  const p = 1;
  DatosSocios(x,p);
})

//---------------------------------Cargar Socios

const tablasocios = document.getElementById('tablasocios')


const DatosSocios = (x,p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if ( x == undefined && p == undefined){
        xhr.open('GET', "../php/cobrossociosinser.php")
    }
    else if(x != undefined && p == undefined){
        xhr.open('GET', `../php/cobrossociosinser.php?x=${x}`)
    }
    else if(x == undefined && p != undefined){
        xhr.open('GET', `../php/cobrossociosinser.php?p=${p}`)
    }
    else{
        xhr.open('GET', `../php/cobrossociosinser.php?x=${x}&p=${p}`)
    }

    xhr.addEventListener('load', (datosconsulta) => {
        const dataJSON = JSON.parse(datosconsulta.target.response)
        const fragment = document.createDocumentFragment()

        for (const socio of dataJSON) {
            const row = document.createElement('TR')
            const dataid = document.createElement('TD')
            const dataapellido = document.createElement('TD')
            const datanombre = document.createElement('TD')
            const datadni = document.createElement('TD')
            const databtnedit=document.createElement('TD')
            const btnedit=document.createElement('button')
            btnedit.classList.add("btnseleccionardepo")
            btnedit.textContent="Seleccionar"
            databtnedit.append(btnedit)
                    
            dataid.textContent = socio[0]
            dataapellido.textContent = socio[1]
            datanombre.textContent = socio[2]
            datadni.textContent = socio[3]

            dataid.classList.add('celda')
            dataapellido.classList.add('celda')
            datanombre.classList.add('celda')
            datadni.classList.add('celda')
            databtnedit.classList.add('celda')

            row.append(dataid)
            row.append(dataapellido)
            row.append(datanombre)
            row.append(datadni)
            row.append(databtnedit)

            fragment.append(row)
        }
        const hijo=tablasocios.children[0];
            
        while(hijo.nextElementSibling){;
            tablasocios.removeChild(hijo.nextElementSibling);
        }
        
        tablasocios.append(fragment);
    })

    xhr.send()
}

DatosSocios();
/*
const DatosSocios = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/cobrossociosinser.php")

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const dataapellido = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadni = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = socio[0]
                dataapellido.textContent = socio[1]
                datanombre.textContent = socio[2]
                datadni.textContent = socio[3]

                dataid.classList.add('celda')
                dataapellido.classList.add('celda')
                datanombre.classList.add('celda')
                datadni.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(dataapellido)
                row.append(datanombre)
                row.append(datadni)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablasocios.appendChild(fragment)
        })
    } 
    else {
        xhr.open('GET', `../php/cobrossociosinser.php?x=${x}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const dataapellido = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadni = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = socio[0]
                dataapellido.textContent = socio[1]
                datanombre.textContent = socio[2]
                datadni.textContent = socio[3]

                dataid.classList.add('celda')
                dataapellido.classList.add('celda')
                datanombre.classList.add('celda')
                datadni.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(dataapellido)
                row.append(datanombre)
                row.append(datadni)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablasocios.children[0];
                
            while(hijo.nextElementSibling){;
                tablasocios.removeChild(hijo.nextElementSibling);
            }
            
            tablasocios.append(fragment);
        })
    }

    xhr.send()
}

DatosSocios();*/

// ------------------ boton seleccionar de la tabla

tablasocios.addEventListener('click',(e)=>{
    const seleccion =e.target;
    if(seleccion.classList.contains('btnseleccionardepo')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=seleccion.parentElement.parentElement.firstElementChild.textContent
         console.log(t)

        //console.log("entro en ",t);
        window.location.href=`../php/cobroscuotas.php?t=${t}`;
    }
    else{
        //console.log("entro aca");
    }
})

//-----------------------------  Paginacion
/*
const DatosSociosPag = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {
        
        xhr.open('GET', "../php/cobrossociosinser.php")

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const dataapellido = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadni = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = socio[0]
                dataapellido.textContent = socio[1]
                datanombre.textContent = socio[2]
                datadni.textContent = socio[3]

                dataid.classList.add('celda')
                dataapellido.classList.add('celda')
                datanombre.classList.add('celda')
                datadni.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(dataapellido)
                row.append(datanombre)
                row.append(datadni)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablasocios.appendChild(fragment)
        })
    } 
    else {
        xhr.open('GET', `../php/cobrossociosinser.php?p=${p}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const dataapellido = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadni = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = socio[0]
                dataapellido.textContent = socio[1]
                datanombre.textContent = socio[2]
                datadni.textContent = socio[3]

                dataid.classList.add('celda')
                dataapellido.classList.add('celda')
                datanombre.classList.add('celda')
                datadni.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(dataapellido)
                row.append(datanombre)
                row.append(datadni)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablasocios.children[0];
                
            while(hijo.nextElementSibling){;
                tablasocios.removeChild(hijo.nextElementSibling);
            }
            
            tablasocios.append(fragment);
        })
    }

    xhr.send()
}*/

const pag1=document.getElementById('btnpagsocios1')
const pag2=document.getElementById('btnpagsocios2')
const pag3=document.getElementById('btnpagsocios3')
const pag4=document.getElementById('btnpagsocios4')
const pag5=document.getElementById('btnpagsocios5')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
    const x = document.getElementById('buscarsocio').value
    DatosSocios(x,p);
})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    const x = document.getElementById('buscarsocio').value
    DatosSocios(x,p);
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    const x = document.getElementById('buscarsocio').value
    DatosSocios(x,p);
})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
    const x = document.getElementById('buscarsocio').value
    DatosSocios(x,p);
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
    const x = document.getElementById('buscarsocio').value
    DatosSocios(x,p);
})


// ----------------------------------  Generar Deuda
/*
const btngenerardeuda=document.getElementById("btngenerardeuda")
btngenerardeuda.addEventListener('click',(e)=>{
    const d=0;
    let xhr2
    if (window.XMLHttpRequest) xhr2 = new XMLHttpRequest()
    else xhr2 = new ActiveXObject("Microsoft.XMLHTTP")
    xhr2.addEventListener('load', (dat) => {})
    xhr2.open('GET', `../php/cobrossociosinser.php?d=${d}`)
    xhr2.send()

})*/

const btnnuevodepo = document.getElementById('btngenerardeuda');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');
btnnuevodepo.addEventListener('click', ()=>{
	reg.classList.add('activar');
	contvent.classList.add('activar');
});
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});
/*
const btnrechazar = document.getElementById('btncancelar')
btnrechazar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});

const btnaceptar = document.getElementById('btnconfirmar')
btnaceptar.addEventListener('click', (e)=>{
    e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');    
});*/