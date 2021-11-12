

/*var di = fechadesde.getValue()
var df = fechahasta.getValue()*/
//fecha = fechahasta.value

//const fecha = querySelector('input[type="date"]')


const btnbuscar = document.getElementById('btnbuscar');

btnbuscar.addEventListener('click',(e)=>{

    const fechadesde = document.getElementById("fechadesde").value;
    const fechahasta = document.getElementById("fechahasta").value;
    
    //console.log (fechadesde,'///////',fechahasta)
    DatosCuotas();

})

const buscarsocio=document.getElementById("buscarsocio")
buscarsocio.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  //console.log(x);
  const p = 1;
  DatosCuotas(x,p);
})


const tablapagos = document.getElementById('tablapagos')


const DatosCuotas = (x,p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    const fechadesde = document.getElementById("fechadesde").value;
    const fechahasta = document.getElementById("fechahasta").value;

    let di = String(fechadesde)
    let df = String(fechahasta)
    
    if ( x == undefined && p == undefined){
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}`)
    }
    else if(x != undefined && p == undefined){
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}&x=${x}`)
    }
    else if(x == undefined && p != undefined){
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}&p=${p}`)
    }
    else{
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}&x=${x}&p=${p}`)
    }
    
    xhr.addEventListener('load', (datosconsulta) => {
        const dataJSON = JSON.parse(datosconsulta.target.response)
        const fragment = document.createDocumentFragment()

        for (const pago of dataJSON) {
            const row = document.createElement('TR')
            const dataid = document.createElement('TD')
            const datasocio = document.createElement('TD')
            const datames = document.createElement('TD')
            const dataanio = document.createElement('TD')
            const datasaldo = document.createElement('TD')
            const dataformapago = document.createElement('TD')

            dataid.textContent = pago[0]
            datasocio.textContent = pago[1]
            datames.textContent = pago[2]
            dataanio.textContent = pago[3]
            datasaldo.textContent = '$'+pago[4]
            dataformapago.textContent = pago[5]

            dataid.classList.add('celda')
            datasocio.classList.add('celda')
            datames.classList.add('celda')
            dataanio.classList.add('celda')
            datasaldo.classList.add('celda')
            dataformapago.classList.add('celda')

            row.append(dataid)
            row.append(datasocio)
            row.append(datames)
            row.append(dataanio)
            row.append(datasaldo)
            row.append(dataformapago)
            //row.append(datasaldo)

            fragment.append(row)
        }
        const hijo=tablapagos.children[0];
            
        while(hijo.nextElementSibling){;
            tablapagos.removeChild(hijo.nextElementSibling);
        }
        
        tablapagos.append(fragment);
        //tablapagos.appendChild(fragment)
    })

    xhr.send()

    /*
    if (x == undefined && p == undefined) {
        
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const pago of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datasocio = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const datasaldo = document.createElement('TD')
                const dataformapago = document.createElement('TD')
                      
                dataid.textContent = pago[0]
                datasocio.textContent = pago[1]
                datames.textContent = pago[2]
                dataanio.textContent = pago[3]
                datasaldo.textContent = '$'+pago[4]
                dataformapago.textContent = pago[5]

                dataid.classList.add('celda')
                datasocio.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                datasaldo.classList.add('celda')
                dataformapago.classList.add('celda')

                row.append(dataid)
                row.append(datasocio)
                row.append(datames)
                row.append(dataanio)
                row.append(datasaldo)
                row.append(dataformapago)
                //row.append(datasaldo)

                fragment.append(row)
            }
            const hijo=tablapagos.children[0];
                
            while(hijo.nextElementSibling){;
                tablapagos.removeChild(hijo.nextElementSibling);
            }
            
            tablapagos.append(fragment);
            //tablapagos.appendChild(fragment)
        })
    } 
    else if (x != undefined && p == undefined) {
        xhr.open('GET', `../php/cobroscuotasreporteinser.php?di=${di}&df=${df}&x=${x}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            const fragment = document.createDocumentFragment()

            for (const pago of dataJSON) {
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datasocio = document.createElement('TD')
                const datames = document.createElement('TD')
                const dataanio = document.createElement('TD')
                const datasaldo = document.createElement('TD')
                const dataformapago = document.createElement('TD')
                
                dataid.textContent = pago[0]
                datasocio.textContent = pago[1]
                datames.textContent = pago[2]
                dataanio.textContent = pago[3]
                datasaldo.textContent = '$'+pago[4]
                dataformapago.textContent = pago[5]

                dataid.classList.add('celda')
                datasocio.classList.add('celda')
                datames.classList.add('celda')
                dataanio.classList.add('celda')
                datasaldo.classList.add('celda')
                dataformapago.classList.add('celda')

                row.append(dataid)
                row.append(datasocio)
                row.append(datames)
                row.append(dataanio)
                row.append(datasaldo)
                row.append(dataformapago)
                //row.append(datasaldo)

                fragment.append(row)
            }
            const hijo=tablapagos.children[0];
                
            while(hijo.nextElementSibling){;
                tablapagos.removeChild(hijo.nextElementSibling);
            }
            
            tablapagos.append(fragment);
        })
    }   
    */
    
}


//---------------------------------------------  PAGINACION -----------------------------



const pag1=document.getElementById('btnpagcuotas1')
const pag2=document.getElementById('btnpagcuotas2')
const pag3=document.getElementById('btnpagcuotas3')
const pag4=document.getElementById('btnpagcuotas4')
const pag5=document.getElementById('btnpagcuotas5')

pag1.addEventListener('click',()=>{
    let p=pag1.textContent
    const x=document.getElementById("buscarsocio").value
    DatosCuotas(x,p);
})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    const x=document.getElementById("buscarsocio").value
    DatosCuotas(x,p);
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    const x=document.getElementById("buscarsocio").value
    DatosCuotas(x,p);
})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
    const x=document.getElementById("buscarsocio").value
    DatosCuotas(x,p);
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
    const x=document.getElementById("buscarsocio").value
    DatosCuotas(x,p);
})