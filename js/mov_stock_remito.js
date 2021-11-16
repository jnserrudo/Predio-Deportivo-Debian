
const table = document.getElementById('tablainsumo')


const busq=document.getElementById("busqueda_remito")
busq.addEventListener('keyup',
(e)=>{
var x= e.target.value;
console.log(x);
getData(x);
}
)


const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (x == undefined) {
        
        xhr.open('GET', "../php/insercion_remito.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const dataid_categoria = document.createElement('TD')
                        const datanombre = document.createElement('TD')
                        const data_descripcion = document.createElement('TD')
                        const data_precio = document.createElement('TD')
                        const data_stock = document.createElement('TD')
                       // const data_cantidad=document.createElement('TD')
                       // const lbl_cant=document.createElement('input')
                       // lbl_cant.classList.add("lblcantidad")
                        

                        
                        const databtnedit=document.createElement('TD') /*creo columna para edita*/
                        const btnedit=document.createElement('button') /*creo boton*/
                        btnedit.classList.add("btneditar")
                           /*meto boton*/
                        btnedit.textContent="Añadir"   /*texto del boton*/
                        databtnedit.append(btnedit) 
                        
                      //  lbl_cant.textContent="0"   /*texto del boton*/
                      //  data_cantidad.append(lbl_cant) 
                        


                        dataid.textContent = insumo[0]
                        dataid_categoria.textContent = insumo[1]
                        datanombre.textContent = insumo[2]
                        data_descripcion.textContent = insumo[3]
                        data_precio.textContent = insumo[4]
                        data_stock.textContent = insumo[5]

                        dataid.classList.add('celda')
                        dataid_categoria.classList.add('celda')
                        datanombre.classList.add('celda')
                        data_descripcion.classList.add('celda')
                        data_precio.classList.add('celda')
                        data_stock.classList.add('celda')
                      //  data_cantidad.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(dataid_categoria)
                        row.append(datanombre)
                        row.append(data_descripcion)
                        row.append(data_precio)
                        row.append(data_stock)
                       // row.append(data_cantidad)
                        row.append(databtnedit)
                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_remito.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const dataid_categoria = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const data_descripcion= document.createElement('TD')
                const data_precio = document.createElement('TD')
                const data_stock= document.createElement('TD')

                
               // const data_cantidad=document.createElement('TD')
               // const lbl_cant=document.createElement('input')
              //  lbl_cant.classList.add("lblcantidad")

                
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)

               // lbl_cant.textContent=""   /*texto del boton*/
              //  data_cantidad.append(lbl_cant) 


                  console.log("soy el id nro"+insumo[0])
                dataid.textContent = insumo[0]
                dataid_categoria.textContent = insumo[1]
                datanombre.textContent = insumo[2]
                data_descripcion.textContent = insumo[3]
                data_precio.textContent = insumo[4]
                data_stock.textContent = insumo[5]

                  

                dataid.classList.add('celda')
                dataid_categoria.classList.add('celda')
                datanombre.classList.add('celda')
                data_descripcion.classList.add('celda')
                data_precio.classList.add('celda')
                data_stock.classList.add('celda')
               // data_cantidad.classList.add('celda')
                databtnedit.classList.add('celda')
                

                row.append(dataid)
                row.append(dataid_categoria)
                row.append(datanombre)
                row.append(data_descripcion)
                row.append(data_precio)
                row.append(data_stock)
               // row.append(data_cantidad)

                
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



//-----------------------------------   Mostrar Productos Agregados

const tabladetalle = document.getElementById('tablaremito')

const getDetalle = (p) => {
    let xhr3
    if (window.XMLHttpRequest) xhr3 = new XMLHttpRequest()
    else xhr3 = new ActiveXObject("Microsoft.XMLHTTP")

    
    xhr3.open('GET', `../php/remitodetalleselect.php`)
    if ( p == undefined){
        xhr3.open('GET', `../php/remitodetalleselect.php`)
    }
    else{
        xhr3.open('GET', `../php/remitodetalleselect.php?p=${p}`)
    }

    xhr3.addEventListener('load', (data) => {
            const dataJSON2 = JSON.parse(data.target.response)
            const fragment2 = document.createDocumentFragment()

            for (const detalle of dataJSON2) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datacantidad= document.createElement('TD')
            
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Eliminar"
                databtnedit.append(btnedit)

                dataid.textContent = detalle[0]
                datanombre.textContent = detalle[1]
                datacantidad.textContent = detalle[2]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datacantidad.classList.add('celda')
                databtnedit.classList.add('celda')
                
                row.append(dataid)
                row.append(datanombre)
                row.append(datacantidad)
                row.append(databtnedit)

                fragment2.append(row)
            }
            const hijotabla=tabladetalle.children[0];
                
            while(hijotabla.nextElementSibling){;
                tabladetalle.removeChild(hijotabla.nextElementSibling);
            }
            
            tabladetalle.append(fragment2);
        })
    xhr3.send()
}

getDetalle()

//------------------------------------   Quitar Productos

tabladetalle.addEventListener('click',(e)=>
{
    const quitar=e.target;
    var id=quitar.parentElement.parentElement.firstElementChild.textContent
    var cant=quitar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent

    var idproducto = parseInt(id)
    var cantidad = parseInt(cant)

    const tipo = 3 // el 3 define que se van a eliminar datos

    let xhr5
    if (window.XMLHttpRequest) xhr5 = new XMLHttpRequest()
    else xhr5 = new ActiveXObject("Microsoft.XMLHTTP")
    xhr5.open('GET', `../php/remitodetalledelete.php?id=${idproducto}&cant=${cantidad}&tipo=${tipo}`)
    xhr5.send()
    getDetalle()
    getDetalle()
    getDetalle()
})

//-----------------------------------       Agregado de Productos

table.addEventListener('click',(e)=>
{
    const añadir=e.target;
    const cantidad = document.getElementById("txt_cantidad").value
    var idproducto=añadir.parentElement.parentElement.firstElementChild.textContent

    //console.log(idproducto,'++', cantidad)
    if(cantidad == '' || cantidad == undefined || cantidad==0){
        window.alert('Debe ingresar la cantidad')
    }
    else if(cantidad==0){
        window.alert('Debe ingresar una cantidad mayor a cero')
    }
    else{
        const tipo = 2 // el 2 define que se van a insertar datos

        let xhr2
        if (window.XMLHttpRequest) xhr2 = new XMLHttpRequest()
        else xhr2 = new ActiveXObject("Microsoft.XMLHTTP")
        xhr2.open('GET', `../php/remitodetalledelete.php?id=${idproducto}&cant=${cantidad}&tipo=${tipo}`)
        xhr2.send()

        getDetalle()

    }
    getDetalle()
    getDetalle()
    getDetalle()
    
})

//-------------------------------  CANCELAR O CONFIRMAR

const btnrechazar = document.getElementById('btncancelar')
btnrechazar.addEventListener('click', (e)=>{
	
    const cantidad = document.getElementById("txt_cantidad")
    cantidad.value = ''

    const tipo = 0 // Tipo define si se crea o se elimina la tabla temporal

    let xhr4
    if (window.XMLHttpRequest) xhr4 = new XMLHttpRequest()
    else xhr4 = new ActiveXObject("Microsoft.XMLHTTP")
    xhr4.open('GET', `../php/remitodetalledelete.php?tipo=${tipo}`)
    xhr4.send()

    window.location.href='../php/remito1.php'
});

const btnaceptar = document.getElementById('btnconfirmar')
btnaceptar.addEventListener('click', (e)=>{


    var hijoinsert=tabladetalle.lastElementChild
    var i;
    var c;

    var codigo = document.getElementById('txt_cod_remito').innerHTML;
    var orden = document.getElementById('txt_orden_compra').innerHTML;
    var tipo = 4 // Inserta el remito

    let xhr6
    if (window.XMLHttpRequest) xhr6 = new XMLHttpRequest()
    else xhr6 = new ActiveXObject("Microsoft.XMLHTTP")
    xhr6.open('GET', `../php/remitodetalledelete.php?tipo=${tipo}&cod=${codigo}&orden=${orden}`)
    xhr6.send()

    while(hijoinsert!=tabladetalle.children[0]){
        i = hijoinsert.firstElementChild.textContent
        c = hijoinsert.firstElementChild.nextElementSibling.nextElementSibling.textContent
        
        tipo = 5 // Inserta el detalle del remito
        let xhr7
        if (window.XMLHttpRequest) xhr7 = new XMLHttpRequest()
        else xhr7 = new ActiveXObject("Microsoft.XMLHTTP")
        xhr7.open('GET', `../php/remitodetalledelete.php?tipo=${tipo}&orden=${orden}&id=${i}&cant=${c}`)
        xhr7.send()

        hijoinsert = hijoinsert.previousElementSibling  
    }
    
    //borra todo y vuelve atras
    const cantidad = document.getElementById("txt_cantidad")
    cantidad.value = ''

    tipo = 0 // Tipo define si se crea o se elimina la tabla temporal, el 0 elimina

    let xhr8
    if (window.XMLHttpRequest) xhr8 = new XMLHttpRequest()
    else xhr8 = new ActiveXObject("Microsoft.XMLHTTP")
    xhr8.open('GET', `../php/remitodetalledelete.php?tipo=${tipo}`)
    xhr8.send()

    window.location.href='../php/remito1.php'
});


//----------------------- Paginacion


const paga=document.getElementById('btnpaga')
const pagb=document.getElementById('btnpagb')
const pagc=document.getElementById('btnpagc')
const pagd=document.getElementById('btnpagd')
const page=document.getElementById('btnpage')

paga.addEventListener('click',()=>{
    let p=paga.textContent
    getDetalle(p);
})

pagb.addEventListener('click',()=>{
    let p=pagb.textContent
    getDetalle(p);
})

pagc.addEventListener('click',()=>{
    let p=pagc.textContent
    getDetalle(p);
})
pagd.addEventListener('click',()=>{
    let p=pagd.textContent
    getDetalle(p);
})

page.addEventListener('click',()=>{
    let p=page.textContent
    getDetalle(p);
})