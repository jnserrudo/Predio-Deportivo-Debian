const input=document.getElementById("input");
var elementosnew = 0;
const consulta=document.getElementById("txtconsulta");

const btnvolver=document.getElementById("btnvolver");

btnvolver.addEventListener('click',()=>{
    window.location.href='../php/abmdepositos.php'
})

//  Control de la busqueda de los insumos de un deposito


const busq=document.getElementById("busquedainsumo")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
})

const tabla = document.getElementById('tablainsumos')
const tablanew=document.getElementById('tablainsumosnew')



const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {

        const h = document.getElementById("txtiddeposito").value;
        console.log(h);
        xhr.open('GET', `../php/inserinsumdepo.php?h=${h}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                let x=parseInt(insumo[3])//stock deposito
                let s=parseInt(insumo[4])//stock minimo

                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                const datastockmin = document.createElement('TD')
                const datastock = document.createElement('TD')
                
                const dataestado=document.createElement('TD')
                const datadivicono=document.createElement('DIV')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                // const dataicono=document.createElement('IMG')

                btnedit.classList.add("btninsumosdepo")
                btnedit.textContent="Quitar"
                databtnedit.append(btnedit)
                datadivicono.classList.add('div_icono_estado')
                dataestado.classList.add('celdaestado')
                // dataicono.classList.add('icono_estado')
                // datadivicono.append(dataicono)
                dataestado.append(datadivicono)
                



                /*const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)*/
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                datastock.textContent = insumo[3]
                datastockmin.textContent = insumo[4]



                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                datastock.classList.add('celda')
                datastockmin.classList.add('celda')

                dataestado.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                row.append(datastockmin)

                row.append(datastock)
                // comparamos estado
                console.log('s: '+s +' x: '+x)
                console.log(typeof(s)+' '+typeof(x))

                console.log(s>x)

                if(s>x){
                    console.log('s: '+s +'x: '+x)
                    //stock por deposito menor al stock minimo
                    datadivicono.classList.add('cruz')

                }
                else{
                    if(s===x){
                        // alerta dea
                        console.log('s: '+s +'x: '+x)

                        datadivicono.classList.add('alerta')
                    }
                    else{
                        //stock deposito mayor al stock minimo
                        console.log('s: '+s +'x: '+x)

                        datadivicono.classList.add('tilde')
                    }
                }
                row.append(dataestado)
                row.append(databtnedit)
                

                fragment.append(row)
            }
            const hijo=tabla.children[0];
                
            while(hijo.nextElementSibling){;
                tabla.removeChild(hijo.nextElementSibling);
            }

            tabla.appendChild(fragment)
        })
    } 
    else {
        const h = document.getElementById("txtiddeposito").value;
        console.log(h);
        xhr.open('GET', `../php/inserinsumdepo.php?x=${x}&h=${h}&depo=${depo}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                let x=parseInt(insumo[3])//stock deposito
                let s=parseInt(insumo[4])//stock minimo
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                const datastock = document.createElement('TD')
                const dataestado=document.createElement('TD')
                const datadivicono=document.createElement('DIV')
                //const dataicono=document.createElement('IMG')
                datadivicono.classList.add('div_icono_estado')
                dataestado.classList.add('celdaestado')

                //dataicono.classList.add('icono_estado')
               // datadivicono.append(dataicono)
                /*const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)*/
                
                dataestado.append(datadivicono)
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                datastock.classList.add('celda')
                dataestado.classList.add('celda')
                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                row.append(datastock)
                // comparamos estado
                if(s>x){
                    //stock por deposito menor al stock minimo
                    dataicono.classList.add('cruz')

                }
                else{
                    if(s===x){
                        // alerta dea
                        dataicono.classList.add('alerta')
                    }
                    else{
                        //stock deposito mayor al stock minimo
                        dataicono.classList.add('tilde')
                    }
                }
                row.append(dataestado)

                fragment.append(row)
            }
            const hijo=tabla.children[0];
                
            while(hijo.nextElementSibling){;
                tabla.removeChild(hijo.nextElementSibling);
            }
            
            tabla.append(fragment);
        })
    }

    xhr.send()
}

getData();

// eliminar un insumo x deposito
var id
const regquitar=document.getElementById('ventquitar')
const contquitar=document.getElementById('cont_quitar')
const icono_cerrarquitar=document.getElementById('icono_cerrarquitar')
const btnsi=document.getElementById('btnsi')
const btnno=document.getElementById('btnno')

tabla.addEventListener('click',(e)=>{
    let x=e.target
    
    if(x.classList.contains('btninsumosdepo')){
        id=x.parentElement.parentElement.firstElementChild.textContent
        regquitar.classList.add('activar')
        contquitar.classList.add('activar')

    }
})
icono_cerrarquitar.addEventListener('click',(e)=>{
    e.preventDefault();
    regquitar.classList.remove('activar')
    contquitar.classList.remove('activar')

})
btnno.addEventListener('click',()=>{
    regquitar.classList.remove('activar')
    contquitar.classList.remove('activar')
    let b= document.getElementById('txtiddeposito').value
    console.log(b)

})
btnsi.addEventListener('click',()=>{
    regquitar.classList.remove('activar')
    contquitar.classList.remove('activar')
    let b= document.getElementById('txtiddeposito').value

    window.location.href=`../php/depositosxinsumos.php?q=${id}&t=${b}`
})


//---------------- BOTON AGREGAR PRODUCTOS -----------------------

const btnnuevinsumo = document.getElementById('btnnuevinsumo');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');
btnnuevinsumo.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
    const hijoborrar=tablainsumos.children[0];     
    while(hijoborrar.nextElementSibling){;
        tablainsumos.removeChild(hijoborrar.nextElementSibling);
    }
    const hijo=tablanew.children[0];     
    while(hijo.nextElementSibling){;
        tablanew.removeChild(hijo.nextElementSibling);
    }
    inputcant.value = "";
    busqueda.value="";
    elementosnew=0;
    DatosInsumos();
});
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});

const btnrechazar = document.getElementById('btncancelar')
btnrechazar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
    const hijo=tablanew.children[0];     
    while(hijo.nextElementSibling){;
        tablanew.removeChild(hijo.nextElementSibling);
    }
    inputcant.value = "";
    busqueda.value="";
    getData();
});


const btnaceptar = document.getElementById('btnconfirmar')
btnaceptar.addEventListener('click', (e)=>{
    e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');

    var hijo=tablanew.lastElementChild
    var i;
    var c;

    console.log(hijo)

    while(hijo!=tablanew.children[0]){
        i = hijo.firstElementChild.textContent
        c = hijo.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        const d = document.getElementById("txtiddeposito").value
        
        console.log(`ACAAAA nombre: ${i} precio: ${d} cantidad: ${c}`)
        let xhr
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        xhr.open('GET', `../php/depodetalleinsercion.php?i=${i}&d=${d}&c=${c}`)
        /*xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            console.log(dataJSON)
        })*/
        xhr.send()
        hijo =hijo.previousElementSibling  
        getData();
    }
    const hijoborrar=tablanew.children[0];     
    while(hijoborrar.nextElementSibling){
        tablanew.removeChild(hijoborrar.nextElementSibling);
    }
    inputcant.value = "";
    busqueda.value="";
    getData();
});

/*--------------------Insumos de la tbala-----------------------------*/

const tablainsumos = document.getElementById('tablatotalinsumos')
// var depo=txtDeposito.value
const txtDeposito = document.getElementById('txtDeposito')

const DatosInsumos = (z) => {
    var depo=txtDeposito.value

    let xhr
//cons deposi== document.getElementById('')  
  if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (z == undefined) {
        
        xhr.open('GET',`../php/insercioninsumos_depo.php?depo=${depo}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                // const datastock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btninsumosdepo")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                // datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                // datastock.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                // row.append(datastock)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablainsumos.appendChild(fragment)
        })
    } 
    else {
        var depo=txtDeposito.value
        xhr.open('GET',` ../php/insercioninsumos_depo.php?z=${z}&depo=${depo}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                // const datastock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btninsumosdepo")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                // datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                // datastock.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                // row.append(datastock)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablainsumos.children[0];
                
            while(hijo.nextElementSibling){;
                tablainsumos.removeChild(hijo.nextElementSibling);
            }
            
            tablainsumos.append(fragment);
        })
    }

    xhr.send()
}

//DatosInsumos();

const busqueda=document.getElementById("busquedainsumo2")
busqueda.addEventListener('keyup',
(e)=>{
  var z= e.target.value;
  console.log(z);
  DatosInsumos(z);
})

//------------------- AGREGACION DE PRODUCTOS A LA TABLA DE AL LADO ----------------------

/*const tablainsumos = document.getElementById('tablatotalinsumos');*/

const inputcant= document.getElementById('inputcant');



tablainsumos.addEventListener('click',(e)=>
{
    if(elementosnew==6){   
        window.alert("No se puede agregar mas de 6 productos.")
    }
    else{
    var cant=inputcant.value
    console.log(cant)
    const añadir=e.target;
    console.log(inputcant.value)
    console.log(añadir.classList.contains('btninsumosdepo'))
    if(añadir.classList.contains('btninsumosdepo')){
        let xhr
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el ids
         
        var id=añadir.parentElement.parentElement.firstElementChild.textContent
        var nom=añadir.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
        var descrip=añadir.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent

        console.log(id + " " + nom + " " + descrip + " ")
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      cconst fragment = document.createDocumentFragment()
        const fragment = document.createDocumentFragment()

        console.log("y su primero seria")
        const row = document.createElement('TR')
        row.classList.add('fila')

        const dataid = document.createElement('TD')
        const datanom = document.createElement('TD')
        const datadescrip = document.createElement('TD')
        const datacant = document.createElement('TD')
        const btneliminar = document.createElement('TD')


        dataid.textContent = id
        datanom.textContent = nom
        datadescrip.textContent = descrip
        datacant.textContent = cant

        let deleteButton = document.createElement("button");
        btneliminar.appendChild(deleteButton)
        deleteButton.textContent = "Eliminar";
        deleteButton.classList.add("btninsumosdepo");

        dataid.classList.add('celda')
        datanom.classList.add('celda')
        datadescrip.classList.add('celda')
        datacant.classList.add('tdprecio')
        btneliminar.classList.add('celda')

        // console.log("soy el data id :"+dataid.textContent)
        row.append(dataid)
        row.append(datanom)
        row.append(datadescrip)
        row.append(datacant)
        row.append(btneliminar)

        total =0;

    
        deleteButton.addEventListener("click",(event) => {
            //total= total-event.target.parentElement.parentElement.firstElementChild.nextElementSibling.textContent

            event.target.parentElement.parentElement.remove()
            console.log("entro al delete")
        })

        fragment.append(row)
        tablanew.appendChild(fragment)
        console.log("llegue") 
        elementosnew = elementosnew + 1;   
    }
    }
})