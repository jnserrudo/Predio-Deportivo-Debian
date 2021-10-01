const btnircomprobante=document.getElementById('btnvent')
btnircomprobante.addEventListener('click',()=>{
    window.location.href='../php/comprobantes.php'
})


const tabla = document.getElementById('tabla')
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
        
        xhr.open('GET', "../php/insercion_comprobante.php")  

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const comprobante of dataJSON) {
                        console.log(comprobante+"y su primero seria"+comprobante[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataid_proveedor = document.createElement('TD')
                      //  const dataid_comprobante = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const dataestado = document.createElement('TD')
                        const datamonto = document.createElement('TD')

                        const dataletra = document.createElement('TD')
                        const dataId_orden_compra = document.createElement('TD')
                        const datatipo = document.createElement('TD') 


                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = comprobante[0]
                        dataid_proveedor.textContent = comprobante[1]
                      //  dataid_comprobante.textContent = comprobante[2]
                        datafecha.textContent = comprobante[2]
                        dataestado.textContent = comprobante[3]
                        datamonto.textContent = comprobante[4]

                        dataletra.textContent = comprobante[5]
                        dataId_orden_compra.textContent = comprobante[6]
                        datatipo.textContent = comprobante[7]




                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                        datafecha.classList.add('celda')
                        dataestado.classList.add('celda')
                        datamonto.classList.add('celda')

                   
                        dataletra.classList.add('celda')
                        dataId_orden_compra.classList.add('celda')
                        datatipo.classList.add('celda')





                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataid_proveedor)
                      //  row.append(dataid_comprobante)
                        row.append(datafecha)
                        row.append(dataestado)
                        row.append(datamonto)


                        
                        row.append(dataletra)
                        row.append(dataId_orden_compra)
                        row.append(datatipo)


                        row.append(databtnedit)
                        fragment.append(row)
            }
                        
            
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_comprobante.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const comprobante of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataid_proveedor = document.createElement('TD')
               // const dataid_comprobante = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const dataestado = document.createElement('TD')
                const datamonto = document.createElement('TD')


                const dataletra = document.createElement('TD')
                const dataId_orden_compra = document.createElement('TD')
                const datatipo = document.createElement('TD') 

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+comprobante.Id)
                dataid.textContent = comprobante[0]
                dataid_proveedor.textContent = comprobante[1]
               // dataid_comprobante.textContent = comprobante[2]
                datafecha.textContent = comprobante[2]
                dataestado.textContent = comprobante[3]
                datamonto.textContent = comprobante[4]
                dataletra.textContent = comprobante[5]
                dataId_orden_compra.textContent = comprobante[6]
                datatipo.textContent = comprobante[7]


                dataid.classList.add('celda')
                dataid_proveedor.classList.add('celda')
              //  dataid_comprobante.classList.add('celda')
                datafecha.classList.add('celda')
                dataestado.classList.add('celda')
                datamonto.classList.add('celda')
                dataletra.classList.add('celda')
                dataId_orden_compra.classList.add('celda')
                datatipo.classList.add('celda')

                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(dataid_proveedor)
               // row.append(dataid_comprobante)
                row.append(datafecha)
                row.append(dataestado)
                row.append(datamonto)
                row.append(dataletra)
                row.append(dataId_orden_compra)
                row.append(datatipo)
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
getData() 





// --------------------------------------------------------------------------- monto total tipo de comprobante



// funciones para las ventanas emergentes
const tablaordpago=document.getElementById('tabla')
const inputidorden=document.getElementById('inputidorden')
const inputidordentotal=document.getElementById('inputidordentotal')
const inputmonto=document.getElementById('inputmonto')
const ventregmonto=document.getElementById('ventordpagomonto')
const contventmonto=document.getElementById('cont_ordpagomonto')
const iconocerrar = document.getElementById('icono_cerrarordpagomonto');
const btnaceptarmonto=document.getElementById('btnaceptarmonto')





const tablaordpagodetalle=document.getElementById('tablaordpago')
const ventregordpagodetalle=document.getElementById('ventordpago')
const contventordpagodetalle=document.getElementById('cont_ordpago_detalle')
const iconocerrarordpagodetalle = document.getElementById('icono_cerrarordpagodetalle');
const txtfecha=document.getElementById('txtfecha')


var idorden
var ordentotal
var monto
tablaordpago.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        idorden=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
        inputidorden.value=idorden
        console.log(idorden)
// conseguir el total de la orden
            let xhr
            if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
            else xhr = new ActiveXObject("Microsoft.XMLHTTP")

            xhr.open('GET', `../php/consultatotalorden.php?i=${idorden}`)

            xhr.addEventListener('load', (data) => {
                const dataJSON = JSON.parse(data.target.response)
                console.log(dataJSON)
                console.log(dataJSON[0][0])
                inputidordentotal.value=dataJSON[0][0]
                if(dataJSON[0][0]===null){
                    inputidordentotal.value=0
                }
                ordentotal=dataJSON[0][0]


               
            })
            xhr.send()
            inputidorden.value=idorden


//




       // ventregmonto.classList.add('activar')         aqui comente para sacar la ventana emergente
       // contventmonto.classList.add('activar')

        // ventcant.classList.add('activar')
        // contventcant.classList.add('activar')

        }
})


iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	ventregmonto.classList.remove('activar')
    contventmonto.classList.remove('activar')
});


btnaceptarmonto.addEventListener('click',()=>{
    monto=inputmonto.value
    const fragment= document.createDocumentFragment()
    const row=document.createElement('tr')
    const tdid=document.createElement('td')
    const tdtotalord=document.createElement('td')
    const tdmonto=document.createElement('td')
    const tdbtn=document.createElement('td')
    const btn=document.createElement('button')
    btn.textContent='Quitar'
    
    btn.classList.add("btneditar")


    tdid.textContent=idorden
    tdtotalord.textContent=ordentotal
    tdmonto.textContent=monto
    tdbtn.append(btn)
    row.append(tdid)
    row.append(tdtotalord)
    row.append(tdmonto)
    row.append(tdbtn)
    fragment.append(row)
    tablaordpagodetalle.append(fragment)
    ventregmonto.classList.remove('activar')
    contventmonto.classList.remove('activar')
    inputmonto.value=0

})


tablaordpagodetalle.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        console.log(editar.parentElement.parentElement)
        tablaordpagodetalle.removeChild(editar.parentElement.parentElement)
        

    }
})



//ventana emergente de ordpagodetalle




iconocerrarordpagodetalle.addEventListener('click', (e)=>{
	e.preventDefault();
	ventregordpagodetalle.classList.remove('activar')
    contventordpagodetalle.classList.remove('activar')
});

const btnconfordpago=document.getElementById('btnconfordpago')

btnconfordpago.addEventListener('click',()=>{

    var hijo=tablaordpagodetalle.lastElementChild

    var idordenc
    // var totalorden
    var montopagar
    var desc = document.getElementById('desc').value
    console.log(desc)

    var idordensc = []
    // var totalordens = []
    var montopagars = []

    console.log(hijo)
    // nextElementSibling

    while(hijo!=tablaordpagodetalle.children[0]){
        idordenc=hijo.firstElementChild.textContent
        // totalorden = hijo.firstElementChild.nextElementSibling.textContent
        montopagar=hijo.firstElementChild.nextElementSibling.nextElementSibling.textContent
        
        console.log(`id ordencompra : ${idordenc} descripcion: ${desc} monto a pagar: ${montopagar}`)
        
        idordensc.push(idordenc)
        // totalordens.push(totalorden)//acaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        montopagars.push(montopagar)
        // previousElementSibling
        hijo=hijo.previousElementSibling
        
    }

    ventregordpagodetalle.classList.remove('activar')
    contventordpagodetalle.classList.remove('activar')

    window.location.href=`../php/ordenpago.php?ido=${idordensc}&mp=${montopagars}&d=${desc}`


})




//cominzo de ventana emergente facturas
const edicion=document.getElementById('tabla')
const reg=document.getElementById('ventcomp')
const ventcomp=document.getElementById('cont_ventcomp')
const icono_cerrar=document.getElementById('icono_cerrarcomp')

edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
       reg.classList.add('activar')
    }
})


icono_cerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	ventcomp.classList.remove('activar');
});




//fin


//comienzo ultimo-----------------



// const table = document.getElementById('tabla')

const tabladetalle=document.getElementById('tablaremito')

const inputtotal=document.getElementById('inputtotal')

// const inputidorden=document.getElementById('inputidorden')

const txttipo=document.getElementById('txttipo')

// const txtfecha=document.getElementById('txtfecha')

const inputletra=document.getElementById('inputletra')



var prov
var totalcomp
var monto
var idorden
var idcomp
var letra
var tipo
var fecha
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    
    if(editar.classList.contains('btneditar')){
        // antes de mostrar consulto a la bd
        let xhr
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        // los datos del proveedor
     
        tipo=editar.parentElement.previousElementSibling.textContent
        prov=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
        console.log(prov)
        idcomp=editar.parentElement.parentElement.firstElementChild.textContent
        
        
        xhr.open('GET', `../php/consultas_comprobantes/consultaprovpornom.php?x=${prov}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)
            nomprov.value=dataJSON[0][1]
            dirprov.value=dataJSON[0][2]
            telprov.value=dataJSON[0][3]
            correoprov.value=dataJSON[0][4]
            
        })


        xhr.send()  




        // lleno la tabla de orden

        let xhr1
        if (window.XMLHttpRequest) xhr1 = new XMLHttpRequest()
        else xhr1 = new ActiveXObject("Microsoft.XMLHTTP")

        idorden=editar.parentElement.previousElementSibling.previousElementSibling.textContent
        
        xhr1.open('GET', `../php/consultas_comprobantes/consultaordendetalle.php?x=${idorden}`)

        xhr1.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const nominsumo = document.createElement('TD')
                const descinsumo = document.createElement('TD')
                const precioinsumo = document.createElement('TD')
                const cantinsumo = document.createElement('TD')

                nominsumo.textContent = insumo[0]
                descinsumo.textContent = insumo[1]
                precioinsumo.textContent = insumo[2]
                cantinsumo.textContent = insumo[3]

                
                


                nominsumo.classList.add('celda')
                descinsumo.classList.add('celda')
                precioinsumo.classList.add('celda')
                cantinsumo.classList.add('celda')

                

                row.append(nominsumo)
                row.append(descinsumo)
                row.append(precioinsumo)
                row.append(cantinsumo)

               

                fragment.append(row)
            }
            const hijo=tabladetalle.children[0];
                
            while(hijo.nextElementSibling){;
                tabladetalle.removeChild(hijo.nextElementSibling);
            }

            
            tabladetalle.append(fragment);
        })    
        

        xhr1.send()





        
        // consigo el total

        let xhr2
        if (window.XMLHttpRequest) xhr2 = new XMLHttpRequest()
        else xhr2 = new ActiveXObject("Microsoft.XMLHTTP")


        xhr2.open('GET', `../php/consultas_comprobantes/consultamontocomprobante.php?i=${idcomp}`)

        xhr2.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)
            inputtotal.value=dataJSON[0][0]
            monto=inputtotal.value
            totalcomp=inputtotal.value
            txtfecha.textContent='Fecha:'+dataJSON[0][1]
            inputletra.value=letra=dataJSON[0][2]
                
            
        })    
        inputidorden.value=idorden

        xhr2.send()


        // activo la ventana emergente
        txttipo.textContent=tipo
        // txtfecha.textContent='Fecha:'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear()
       reg.classList.add('activar')
       if(tipo=='Nota de Credito'||tipo=='Nota de Debito'){
        
        // inputmonto.classList.add('activar')
        // p_monto.classList.add('activar')
    }
    }

    
        
    
})




icono_cerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	ventcomp.classList.remove('activar');
    inputmonto.classList.remove('activar')
    p_monto.classList.remove('activar')


});

//termina