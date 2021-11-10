








const table = document.getElementById('tabla')

const tabladetalle=document.getElementById('tablaordendetalle')

const inputtotal=document.getElementById('inputtotal')

const inputidorden=document.getElementById('inputidorden')

const txttipo=document.getElementById('txttipo')

const txtfecha=document.getElementById('txtfecha')

const inputletra=document.getElementById('inputletra')



// const getData = (x) => {
//     let xhr
//     if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
//     else xhr = new ActiveXObject("Microsoft.XMLHTTP")

//     if (x == undefined) {
        
//         xhr.open('GET', "../php/consultaordenpago.php")

//         xhr.addEventListener('load', (data) => {
//             const dataJSON = JSON.parse(data.target.response)
//             console.log(dataJSON)

//             const fragment = document.createDocumentFragment()

//             for (const orden of dataJSON) {
//                         console.log(orden+"y su primero seria"+orden[0])
//                         const row = document.createElement('TR')
//                         // row.classList.add('fila')
//                         const dataid = document.createElement('TD')
//                         const datafecha = document.createElement('TD')
//                         const datairproveedor = document.createElement('TD')
//                         const databtnedit=document.createElement('TD')
//                         const btnedit=document.createElement('button')
//                         btnedit.classList.add("btneditar")
//                         btnedit.textContent="Elegir"
//                         databtnedit.append(btnedit)
                        
//                         dataid.textContent = orden[0]
//                         datafecha.textContent = orden[1]
//                         datairproveedor.textContent = orden[2]                      

//                         dataid.classList.add('celda')
//                         datafecha.classList.add('celda')
//                         datairproveedor.classList.add('celda')
//                         databtnedit.classList.add('celda')

                       
//                         // console.log("soy el data id :"+dataid.textContent)
//                         row.append(dataid)
//                         row.append(datafecha)
//                         row.append(datairproveedor)
                        
//                         row.append(databtnedit)

//                         fragment.append(row)
//             }
//             table.appendChild(fragment)
//         })
//     } else {
//         xhr.open('GET', `../php/consultaordenpago.php?x=${x}`)

//         xhr.addEventListener('load', (data) => {
//             const dataJSON = JSON.parse(data.target.response)
//             console.log(dataJSON)

//             const fragment = document.createDocumentFragment()

//             for (const orden of dataJSON) {
//                 const row = document.createElement('TR')
//                 row.classList.add('fila')
//                 const dataid = document.createElement('TD')
//                 const datafecha = document.createElement('TD')
//                 const datairproveedor = document.createElement('TD')
//                 const databtnedit=document.createElement('TD')
//                 const btnedit=document.createElement('button')
//                 btnedit.classList.add("btneditar")
//                 btnedit.textContent="Elegir"
//                 databtnedit.append(btnedit)
//                   console.log("soy el id nro"+orden.Id)
//                 dataid.textContent = orden[0]
//                 datafecha.textContent = orden[1]
//                 datairproveedor.textContent = orden[2]  
                


//                 dataid.classList.add('celda')
//                 datafecha.classList.add('celda')
//                 datairproveedor.classList.add('celda')
//                 databtnedit.classList.add('celda')


//                 row.append(dataid)
//                 row.append(datafecha)
//                 row.append(datairproveedor)
                
//                 row.append(databtnedit)

//                 fragment.append(row)
//             }
//             const hijo=table.children[0];
                
//             while(hijo.nextElementSibling){;
//                 table.removeChild(hijo.nextElementSibling);
//             }
            
//             table.append(fragment);
//         })
//     }

//     xhr.send()
// }

// getData()





const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/comprobanteordpago.php")  

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
                        const datanro_fac = document.createElement('TD') 
                        const data_fecha= document.createElement('TD')

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
                        datanro_fac.textContent = comprobante[8]
                        data_fecha.textContent = comprobante[9]



                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                        datafecha.classList.add('celda')
                        dataestado.classList.add('celda')
                        datamonto.classList.add('celda')

                   
                        dataletra.classList.add('celda')
                        dataId_orden_compra.classList.add('celda')
                        datatipo.classList.add('celda')
                        datanro_fac.classList.add('celda')
                        data_fecha.classList.add('celda')




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
                        row.append(datanro_fac)
                        row.append(data_fecha)

                        row.append(databtnedit)
                        fragment.append(row)
            }
                        
            
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/comprobanteordpago.php?x=${x}`)

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
                const datanro_fac = document.createElement('TD') 
                const data_fecha= document.createElement('TD')
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
                datanro_fac.textContent = comprobante[8]
                data_fecha.textContent = comprobante[9]


                dataid.classList.add('celda')
                dataid_proveedor.classList.add('celda')
              //  dataid_comprobante.classList.add('celda')
                datafecha.classList.add('celda')
                dataestado.classList.add('celda')
                datamonto.classList.add('celda')
                dataletra.classList.add('celda')
                dataId_orden_compra.classList.add('celda')
                datatipo.classList.add('celda')
                datanro_fac.classList.add('celda')
                data_fecha.classList.add('celda')
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
                row.append(data_fecha)
                row.append(databtnedit)
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
// getData() 


const btnirabmordpagos= document.getElementById('btnverordpagos')
btnirabmordpagos.addEventListener('click',()=>{

    window.location.href=`../php/abmorden_pago.php`
})



// eleccion de un comprobante a 



const reg=document.getElementById('ventcomp')
const ventcomp=document.getElementById('cont_ventcomp')
const icono_cerrar=document.getElementById('icono_cerrarcomp')
// inputsprov
const nomprov=document.getElementById('nomprov')
const dirprov=document.getElementById('dirprov')
const telprov=document.getElementById('telprov')
const correoprov=document.getElementById('correoprov')


const p_monto=document.getElementById("p_monto");
const inputmonto=document.getElementById("input_monto");

const inputnrofactura=document.getElementById('nrofactura')
const inputfechafactura=document.getElementById('fechafactura')

var prov
var totalcomp
var monto
var idorden
var idcomp
var letra
var tipo
var fecha



const edicion=document.getElementById('tabla')

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

        idorden=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
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
            inputnrofactura.value=dataJSON[0][3]
            inputfechafactura.value=dataJSON[0][4]
                
            
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



//-----------


const btnregcomp=document.getElementById('btnregcomp')

const a=document.getElementById('apdf')




const tablaordpagodetalle=document.getElementById('tabla_ordpago')
const ventregordpagodetalle=document.getElementById('ventordpago')
const contventordpagodetalle=document.getElementById('cont_ordpago_detalle')
const iconocerrarordpagodetalle = document.getElementById('icono_cerrarordpagodetalle');
const btnverdetalle=document.getElementById('btnvent')
const nombre_proveedor=document.getElementById('nomprov')


btnregcomp.addEventListener('click',()=>{
    // monto=inputmonto.value
    const fragment= document.createDocumentFragment()
    const row=document.createElement('tr')
    const tdproveedor=document.createElement('td')
    const tdid=document.createElement('td')
    const tdmonto=document.createElement('td')
    const tdtipo=document.createElement('td')
    const tdletra=document.createElement('td')

    const tdbtn=document.createElement('td')
    const btn=document.createElement('button')
    btn.textContent='Quitar'
    
    btn.classList.add("btneditar")

    tdproveedor.textContent=nombre_proveedor.value
    tdid.textContent=idcomp
    tdmonto.textContent=monto
    tdtipo.textContent=tipo
    tdletra.textContent=letra
    tdbtn.append(btn)
     row.append(tdproveedor)
    row.append(tdid)
    row.append(tdmonto)
    row.append(tdtipo)
    row.append(tdletra)

    row.append(tdbtn)
    fragment.append(row)
    tablaordpagodetalle.append(fragment)
    reg.classList.remove('activar');
	ventcomp.classList.remove('activar');
    inputmonto.value=0


    // elimino la ultima columna
    // var tablitadoc=document.createDocumentFragment()
    // tablita=tablaordpagodetalle.cloneNode(true)
    // console.log(tablita)
    // var m=tablita.lastElementChild
    // while(m!=tablita.children[0]){
    //     m.removeChild(m.lastElementChild)
    //     console.log(m)
    //     m=m.previousElementSibling
    // }
    // tablita.children[0].removeChild(tablita.children[0].lastElementChild)
    // tablitadoc.appendChild(tablita)

    // let z=tablitadoc.outerHTML
    // console.log(z)
    // a.classList.add('activar')


    // -----------------------------
    let z=tablaordpagodetalle.outerHTML

        a.classList.add('activar')

    a.setAttribute('href',`../php/pdfprueba.php?pdf=${z}`)
//     va prov
// totalcomp
// monto
// idorden
//  idcomp
//  letra
// tipo
//  fecha

})

tablaordpagodetalle.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        console.log(editar.parentElement.parentElement)
        tablaordpagodetalle.removeChild(editar.parentElement.parentElement)
        

    }
    const hijo=tablaordpagodetalle.children[0];
                
    if(!hijo.nextElementSibling){;
        a.classList.remove('activar')
    }})


btnverdetalle.addEventListener('click',(e)=>{

    ventregordpagodetalle.classList.add('activar')
    contventordpagodetalle.classList.add('activar')


})


iconocerrarordpagodetalle.addEventListener('click', (e)=>{
e.preventDefault();
ventregordpagodetalle.classList.remove('activar')
contventordpagodetalle.classList.remove('activar')
});


const btnconfordpago=document.getElementById('btnconfordpago')

// forma de pago

const selectformpago=document.getElementById('selectformpago')
var formpago=selectformpago.options[0].textContent
console.log(formpago)

selectformpago.addEventListener('change',()=>{
    formpago=selectformpago.options[selectformpago.selectedIndex].textContent
    console.log(formpago)
})


btnconfordpago.addEventListener('click',()=>{
    let pdf= tablaordpagodetalle.outerHTML
    console.log(pdf)
    // 
    // let xhr2
    // if (window.XMLHttpRequest) xhr2 = new XMLHttpRequest()
    // else xhr2 = new ActiveXObject("Microsoft.XMLHTTP")


    // xhr2.open('GET', `../includes/ordpagopdf.php?pdf=${pdf}`)
    // xhr2.send()

    // window.open(`../php/pdfprueba.php`, '_blank');

    // 

    var hijo=tablaordpagodetalle.lastElementChild
    
    var idcomprobante
    var tipoo
    var letraa

    var tipoo=[]
    var letraa=[]
    // var totalorden
    var montopagar
    var desc = document.getElementById('desc').value
    console.log(desc)


    var idcomprobantes = []
    // var totalordens = []
    var montopagars = []

    console.log(hijo)
    // nextElementSibling
   
    
    while(hijo!=tablaordpagodetalle.children[0]){
        idcomprobante=hijo.firstElementChild.nextElementSibling.textContent
        //

        // totalorden = hijo.firstElementChild.nextElementSibling.textContent
        montopagar=hijo.firstElementChild.nextElementSibling.nextElementSibling.textContent
        
        console.log(`id comprobante : ${idcomprobante} descripcion: ${desc} monto a pagar: ${montopagar}`)
        
        idcomprobantes.push(idcomprobante)
        // totalordens.push(totalorden)//acaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        montopagars.push(montopagar)
        // previousElementSibling
        hijo=hijo.previousElementSibling
        
    }

    ventregordpagodetalle.classList.remove('activar')
    contventordpagodetalle.classList.remove('activar')

    // comento para prueba
    window.location.href=`../php/ordenpago.php?ido=${idcomprobantes}&mp=${montopagars}&d=${desc}&fp=${formpago}`


})


// select proveedor
const selectprov=document.getElementById('idprov')

var idprov

selectprov.addEventListener('change',()=>{
    idprov=selectprov.options[selectprov.selectedIndex].value
    // cargar las ordenes de compra que se vinculen con ese proveedor
    console.log('idprove : ' +idprov)
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    xhr.open('GET', `../php/comprobanteordpago.php?pr=${idprov}`)

    xhr.addEventListener('load', (data) => {
        const dataJSON = JSON.parse(data.target.response)
        console.log(dataJSON)

        const fragment = document.createDocumentFragment()

        for (const comprobante of dataJSON) {
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

                        const datanro_fac = document.createElement('TD') 
                        const data_fecha= document.createElement('TD')
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
                        datanro_fac.textContent = comprobante[8]
                        data_fecha.textContent = comprobante[9]




                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                        datafecha.classList.add('celda')
                        dataestado.classList.add('celda')
                        datamonto.classList.add('celda')

                   
                        dataletra.classList.add('celda')
                        dataId_orden_compra.classList.add('celda')
                        datatipo.classList.add('celda')
                        datanro_fac.classList.add('celda')
                        data_fecha.classList.add('celda')





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

                        row.append(datanro_fac)
                        row.append(data_fecha)
                        row.append(databtnedit)
                        fragment.append(row)
        }
        const hijo=table.children[0];
            
        while(hijo.nextElementSibling){;
            table.removeChild(hijo.nextElementSibling);
        }
        
        table.append(fragment);
    })
    xhr.send()


    // btnverordenes.classList.add('activarcomp')


})




const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x+' es de tipo: '+typeof(x)+'y su length : '+x.length);
    if(x.length!=0){
        getData(x);
        selectprov.selectedIndex=0

    }else{
        const hijo=table.children[0];
        selectprov.selectedIndex=0

                
        while(hijo.nextElementSibling){;
            table.removeChild(hijo.nextElementSibling);
        }
    }
    
}
)