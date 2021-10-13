const input=document.getElementById("input");

console.log("MAIN DEPOSITOS");

const consulta=document.getElementById("txtconsulta");

const parrafo=document.getElementById("parrafo");
console.log("entro en ",parrafo);

//  Control de la busqueda de un deposito

const busq=document.getElementById("busquedadepo")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
})

const tabla = document.getElementById('tabladepositos')


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/inserciondepo.php")

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const deposito of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datatipo = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = deposito[0]
                datanombre.textContent = deposito[1]
                datatipo.textContent = deposito[2]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datatipo.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datatipo)
                row.append(databtnedit)

                fragment.append(row)
            }
            tabla.appendChild(fragment)
        })
    } 
    else {
        xhr.open('GET', `../php/inserciondepo.php?x=${x}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const deposito of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datatipo = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit =document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)
                        
                dataid.textContent = deposito[0]
                datanombre.textContent = deposito[1]
                datatipo.textContent = deposito[2]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datatipo.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datatipo)
                row.append(databtnedit)

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

const seleccionar =document.getElementById('tabladepositos')


seleccionar.addEventListener('click',(e)=>{
    const seleccion =e.target;
    if(seleccion.classList.contains('btnseleccionardepo')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=seleccion.parentElement.parentElement.firstElementChild.textContent
         console.log(t)
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      console.log("llegue")
        //  })
         
        //  xhr.send()
         
        
        console.log("entro en 1");
        window.location.href=`../php/depositosxinsumos.php?t=${t}`;
    }
    else{
        console.log("entro aca");
    }
})





const btnnuevodepo = document.getElementById('btnnuevodepo');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');
btnnuevodepo.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});
