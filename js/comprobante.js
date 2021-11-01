


// cargar ordenes de compra
const input=document.getElementById("input");



console.log("aaaaaaa");

const consulta=document.getElementById("txtconsulta");




const busq=document.getElementById("busqueda")

const btnvolvercomprobante=document.getElementById('btnvolvercomprobante')

btnvolvercomprobante.addEventListener('click',()=>{
    window.location.href='../php/abmcomprobante.php'
})

const table = document.getElementById('tabla')





const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/registrarcomprobante.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataId = document.createElement('TD')
                        const dataFecha = document.createElement('TD')
                        const dataId_proveedor = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataId.textContent = orden[0]
                        dataFecha.textContent = orden[1]
                        dataId_proveedor.textContent = orden [2]
                        


                        dataId.classList.add('celda')
                        dataFecha.classList.add('celda')
                        dataId_proveedor.classList.add('celda')
                        

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataId)
                        row.append(dataFecha)
                        row.append(dataId_proveedor)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            const hijo=table.children[0];
                
            while(hijo.nextElementSibling){;
                table.removeChild(hijo.nextElementSibling);
            }
            
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/registrarcomprobante.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataId = document.createElement('TD')
                const dataFecha = document.createElement('TD')
                const dataId_proveedor = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+orden.Id)

                dataId.textContent = orden[0]
                dataFecha.textContent = orden[1]
                dataId_proveedor.textContent = orden[2]
                

                

                dataId.classList.add('celda')
                dataFecha.classList.add('celda')
                dataId_proveedor.classList.add('celda')
                


                row.append(dataId)
                row.append(dataFecha)
                row.append(dataId_proveedor)
                
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


const edicion=document.getElementById('tabla')


const reg=document.getElementById('ventcomp')
const ventcomp=document.getElementById('cont_ventcomp')
const icono_cerrar=document.getElementById('icono_cerrarcomp')
// inputsprov
const nomprov=document.getElementById('nomprov')
const dirprov=document.getElementById('dirprov')
const telprov=document.getElementById('telprov')
const correoprov=document.getElementById('correoprov')



// 

var idprov
var totalcomp
var idorden
var letra
var tipo






// ver todas las ordenes
//  estamos mostrando solo por proveedor( correccion del profe)
// const btnverordenes=document.getElementById('btnverordenes')




const selectprov=document.getElementById('idprov')

selectprov.addEventListener('change',()=>{
    idprov=selectprov.options[selectprov.selectedIndex].value
    // cargar las ordenes de compra que se vinculen con ese proveedor
    console.log('idprove : ' +idprov)
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    xhr.open('GET', `../php/registrarcomprobante.php?pr=${idprov}`)

    xhr.addEventListener('load', (data) => {
        const dataJSON = JSON.parse(data.target.response)
        console.log(dataJSON)

        const fragment = document.createDocumentFragment()

        for (const orden of dataJSON) {
            const row = document.createElement('TR')
            row.classList.add('fila')
            const dataId = document.createElement('TD')
            const dataFecha = document.createElement('TD')
            const dataId_proveedor = document.createElement('TD')

            const databtnedit=document.createElement('TD')
            const btnedit=document.createElement('button')
            btnedit.classList.add("btneditar")
            btnedit.textContent="Elegir"
            databtnedit.append(btnedit)
            //   console.log("soy el id nro"+orden.Id)

            dataId.textContent = orden[0]
            dataFecha.textContent = orden[1]
            dataId_proveedor.textContent = orden[2]
            

            

            dataId.classList.add('celda')
            dataFecha.classList.add('celda')
            dataId_proveedor.classList.add('celda')
            


            row.append(dataId)
            row.append(dataFecha)
            row.append(dataId_proveedor)
            
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

// btnverordenes.addEventListener('click',()=>{
//     btnverordenes.classList.remove('activarcomp')
//     // getData() 
//     selectprov.selectedIndex=0
//     selecttipo.selectedIndex=0

// })


const p_monto=document.getElementById("p_monto");
const monto=document.getElementById("input_monto");
const selecttipo=document.getElementById('selecttipo')





// para ventana emergente de las notas

const ventcompnota=document.getElementById('ventcompnota')
const cont_ventcompnota=document.getElementById('cont_ventcompnota')
const iconocerrarcompnota=document.getElementById('icono_cerrarcompnota')


selecttipo.addEventListener('change',()=>{
    tipo=selecttipo.options[selecttipo.selectedIndex].textContent
    if(tipo=='Nota de Credito'||tipo=='Nota de Debito'){
       ventcompnota.classList.add('activarcomp')
       cont_ventcompnota.classList.add('activarcomp')
       getDatacomp()
    }
   
})

iconocerrarcompnota.addEventListener('click',()=>{
    ventcompnota.classList.remove('activarcomp')
    cont_ventcompnota.classList.remove('activarcomp')
})


const selectletra=document.getElementById('selectletra')

selectletra.addEventListener('change',()=>{
    letra=selectletra.options[selectletra.selectedIndex].value


})

const tabladetalle=document.getElementById('tablaordendetalle')

const inputtotal=document.getElementById('inputtotal')

const inputidorden=document.getElementById('inputidorden')

const txttipo=document.getElementById('txttipo')

const txtfecha=document.getElementById('txtfecha')

const fecha=new Date()

edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    
    if(editar.classList.contains('btneditar')){
        // antes de mostrar consulto a la bd
        let xhr
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        // los datos del proveedor
        
        xhr.open('GET', `../php/consultas_comprobantes/consultaprov.php?x=${idprov}`)

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

        idorden=editar.parentElement.parentElement.firstElementChild.textContent
        
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


        xhr2.open('GET', `../php/consultatotalorden.php?i=${idorden}`)

        xhr2.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)
            inputtotal.value=dataJSON[0][0]
            totalcomp=inputtotal.value
                
            
        })    
        inputidorden.value=idorden

        xhr2.send()


        // activo la ventana emergente
        txttipo.textContent=tipo
        txtfecha.textContent='Fecha:'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear()
       reg.classList.add('activar')
       if(tipo=='Notacredito'||tipo=='Notadebito'){
        
        monto.classList.add('activar')
        p_monto.classList.add('activar')
    }
    }

    
        
    
})


icono_cerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	ventcomp.classList.remove('activar');
    monto.classList.remove('activar')
    p_monto.classList.remove('activar')

    

    const hijo=edicion.children[0];
                
    while(hijo.nextElementSibling){;
                edicion.removeChild(hijo.nextElementSibling);
    }
    // getData() 
    selectprov.selectedIndex=0
    selecttipo.selectedIndex=0

});



const btnregcomp=document.getElementById('btnregcomp')

btnregcomp.addEventListener('click',()=>{

    // insert
    
    // idprov idorden letra totalcomp tipo
    // //sera el monto
    // totalcomp
    // tipo
    
    var hijo=tabladetalle.lastElementChild

    var nombre
    var cant
// agrego el nro de factura y la fecha
    var fechafactura=document.getElementById('fechafactura').value
    var nrofactura=document.getElementById('nrofactura').value
    console.log('fecha factura: '+ fechafactura +'nrofactura: '+nrofactura)


    var nombres = []
    var cantidades = []

    console.log(hijo)
    // nextElementSibling

    while(hijo!=tabladetalle.children[0]){
        nombre=hijo.firstElementChild.textContent
        cant=hijo.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
        
        // console.log(`nombre: ${nombre} cantidad: ${cant} id prov:${idprov}  idorden: ${idorden} letra: ${letra} monto:${totalcomp} tipo: ${tipo}`)
        
        nombres.push(nombre)
        cantidades.push(cant)
        hijo=hijo.previousElementSibling
        
    }

    if(tipo=='Nota de Credito'||tipo=='Nota de Debito'){

        window.location.href=`../php/comprobantes.php?ip=${idprov}&ic=${idcomp}&io=${idorden}&l=${letra}&m=${monto.value}&t=${tipo}&n=${nombres}&c=${cantidades}&nrof=${nrofactura}&ffactura=${fechafactura}`

    }
    else{
    window.location.href=`../php/comprobantes.php?ip=${idprov}&io=${idorden}&l=${letra}&m=${totalcomp}&t=${tipo}&n=${nombres}&c=${cantidades}&nrof=${nrofactura}&ffactura=${fechafactura}`
    }
})
// --------------------------------------------

// nota de credito o debito 
// consulta a la bd comprobante

const tablacompmin=document.getElementById('tablacompmin')

const busquedacompmin=document.getElementById("busquedacompmin")
busquedacompmin.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getDatacomp(x);
    
})




// aqui de vuelta
const getDatacomp = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', `../php/consulta_comprobante.php?ip=${idprov}`)  

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
                      //  const datafecha = document.createElement('TD')
                       // const dataestado = document.createElement('TD')
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
                      //  datafecha.textContent = comprobante[2]
                      //  dataestado.textContent = comprobante[3]
                        datamonto.textContent = comprobante[2]

                        dataletra.textContent = comprobante[3]
                        dataId_orden_compra.textContent = comprobante[4]
                        datatipo.textContent = comprobante[5]
                        datanro_fac.textContent = comprobante[6]
                        data_fecha.textContent = comprobante[7]



                        dataid.classList.add('celda')
                        dataid_proveedor.classList.add('celda')
                      //  dataid_comprobante.classList.add('celda')
                      //  datafecha.classList.add('celda')
                      //  dataestado.classList.add('celda')
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
                      // row.append(datafecha)
                      //  row.append(dataestado)
                        row.append(datamonto)


                        
                        row.append(dataletra)
                        row.append(dataId_orden_compra)
                        row.append(datatipo)
                        row.append(datanro_fac)
                        row.append(data_fecha)

                        row.append(databtnedit)
                        fragment.append(row)

            }
            const hijo=tablacompmin.children[0];
                
            while(hijo.nextElementSibling){;
                tablacompmin.removeChild(hijo.nextElementSibling);
            }
            tablacompmin.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consulta_comprobante.php?x=${x}&ip=${idprov}`)

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
               // const datafecha = document.createElement('TD')
               // const dataestado = document.createElement('TD')
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
                  console.log("soy el id nro"+comprobante.Id)
                dataid.textContent = comprobante[0]
                dataid_proveedor.textContent = comprobante[1]
               // dataid_comprobante.textContent = comprobante[2]
               // datafecha.textContent = comprobante[2]
               // dataestado.textContent = comprobante[3]
                datamonto.textContent = comprobante[2]
                dataletra.textContent = comprobante[3]
                dataId_orden_compra.textContent = comprobante[4]
                datatipo.textContent = comprobante[5]
                datanro_fac.textContent = comprobante[6]
                data_fecha.textContent = comprobante[7]

                dataid.classList.add('celda')
                dataid_proveedor.classList.add('celda')
              //  dataid_comprobante.classList.add('celda')
               // datafecha.classList.add('celda')
               // dataestado.classList.add('celda')
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
               // row.append(datafecha)
               // row.append(dataestado)
                row.append(datamonto)
                row.append(dataletra)
                row.append(dataId_orden_compra)
                row.append(datatipo)
                row.append(datanro_fac)
                row.append(data_fecha)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablacompmin.children[0];
                
            while(hijo.nextElementSibling){;
                tablacompmin.removeChild(hijo.nextElementSibling);
            }
            
            tablacompmin.append(fragment);
        })
    }

    xhr.send()
}


// cargar la factura una vez elegida la nota

var idcomp
tablacompmin.addEventListener('click',(e)=>{
    const editar=e.target;
    
    if(editar.classList.contains('btneditar')){
        // antes de mostrar consulto a la bd
        let xhr
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
        else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        // los datos del proveedor
        
        xhr.open('GET', `../php/consultas_comprobantes/consultaprov.php?x=${idprov}`)

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

        idcomp=editar.parentElement.parentElement.firstElementChild.textContent
        idorden=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
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


        xhr2.open('GET', `../php/consultatotalorden.php?i=${idorden}`)

        xhr2.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)
            inputtotal.value=dataJSON[0][0]
            totalcomp=inputtotal.value
                
            
        })    
        inputidorden.value=idorden

        xhr2.send()


        // activo la ventana emergente
        txttipo.textContent=tipo
        txtfecha.textContent='Fecha:'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear()
        ventcompnota.classList.remove('activarcomp')
        cont_ventcompnota.classList.remove('activarcomp')
       reg.classList.add('activar')
       if(tipo=='Nota de Credito'||tipo=='Nota de Debito'){
        
        monto.classList.add('activar')
        p_monto.classList.add('activar')
    }
    }

    
        
    
})








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