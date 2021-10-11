const btnvolver=document.getElementById('btnvolver')
btnvolver.addEventListener('click',()=>{
    window.location.href='../php/pagina_ventas.php'
})


// const busqins=document.getElementById("busquedamov")
// busqins.addEventListener('keyup',
// (e)=>{
// var x= e.target.value;
// console.log(x);
// // getData(x);

// }
// )
//comento el buscador
// busq.addEventListener('click',
// (e)=>{
//     console.log(e.target);
//     console.log("nashe")

// }
// )

const table = document.getElementById('tabla')


const selectdep=document.getElementById('iddep')

const busqdepo=document.getElementById('busqdepo')

// id del deposito
var iddepo

selectdep.addEventListener('change',()=>{
    if(selectdep.selectedIndex!=0){
        iddepo = selectdep.options[selectdep.selectedIndex].value
        getData(iddepo)
        busqdepo.classList.add('activar')
    }else{
        busqdepo.classList.remove('activar')

    }
        

    // selectdep.selectedIndex=0
})




const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x+' es de tipo: '+typeof(x)+'y su length : '+x.length);
    if(x.length!=0){
        getDatabusqdepo(iddepo,x);

    }else{
        selectdep.selectedIndex=0
        busqdepo.classList.remove('activar')


        const hijo=table.children[0];

                
        while(hijo.nextElementSibling){;
            table.removeChild(hijo.nextElementSibling);
        }
    }
    
    
}
)





const getData = (x) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        xhr.open('GET', `../php/insumosxdeposito.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataNombre = document.createElement('TD')
                const datastockxdep = document.createElement('TD')
                const datacant=document.createElement('TD')
                const cant=document.createElement('input')
                const dataprecio = document.createElement('TD')

                cant.classList.add('inputventas')
                datacant.append(cant)

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                dataNombre.textContent = depositos[0]
                datastockxdep.textContent = depositos[1]
                dataprecio.textContent = depositos[2]

                
                dataNombre.classList.add('celda')
                datastockxdep.classList.add('celda')
                datacant.classList.add('celda')

                dataprecio.classList.add('celda')

                databtnedit.classList.add('celda')

               
                // console.log("soy el data id :"+dataid.textContent)
                row.append(dataNombre)
                row.append(datastockxdep) 
                row.append(datacant)
                       
                row.append(dataprecio)

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

    }



    
const getDatabusqdepo = (b,c) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

        xhr.open('GET', `../php/busqdepo.php?b=${b}&c=${c}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const depositos of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataNombre = document.createElement('TD')
                const datastockxdep = document.createElement('TD')
                const datacant=document.createElement('TD')
                const cant=document.createElement('input')
                const dataprecio = document.createElement('TD')

                cant.classList.add('inputventas')
                datacant.append(cant)

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                dataNombre.textContent = depositos[0]
                datastockxdep.textContent = depositos[1]
                dataprecio.textContent = depositos[2]

                
                dataNombre.classList.add('celda')
                datastockxdep.classList.add('celda')
                datacant.classList.add('celda')

                dataprecio.classList.add('celda')

                databtnedit.classList.add('celda')

               
                // console.log("soy el data id :"+dataid.textContent)
                row.append(dataNombre)
                row.append(datastockxdep) 
                row.append(datacant)
                       
                row.append(dataprecio)

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

    }







const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');

const form= document.getElementById("f")

// form.addEventListener('submit',(e)=>{
//     // e.preventDefault()
//     // form.reset()
// })


if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}




// iconocerrar.addEventListener('click', (e)=>{
// 	e.preventDefault();
// 	reg.classList.remove('activar');
// 	contvent.classList.remove('activar');
// });



const edicion=document.getElementById('tabla')


const regins = document.getElementById('regins');
const contventins = document.getElementById('cont_ventins');
const iconocerrarins = document.getElementById('icono_cerrarins');
// const tablainsumo =document.getElementById('tablainsumo')
const inputdeposito=document.getElementById('inputdeposito')

// id de los depositos
var idd
var nomdep


// agrego los insumos por el deposito que elegi
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
       
         var nominsumo=editar.parentElement.parentElement.firstElementChild.textContent
         var precioinsumo=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
         var cantinsumo=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value
         var stockdep=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
         if(parseInt(cantinsumo)<=parseInt(stockdep)){
         //  inputdeposito.value=nomdep

                        //  console.log(idd)

                        const fragment= document.createDocumentFragment()
                        const row=document.createElement('tr')

                        const tdnom=document.createElement('td')
                        const tdprecio=document.createElement('td')
                        const tdcant=document.createElement('td')
                        const tdtotal=document.createElement('td')
                    
                        const tdbtn=document.createElement('td')
                        const btn=document.createElement('button')
                        btn.textContent='Quitar'
                        
                        btn.classList.add("btneditar")
                    
                        tdnom.textContent=nominsumo
                        tdprecio.textContent=precioinsumo
                        tdcant.textContent=cantinsumo
                        tdtotal.textContent=precioinsumo*cantinsumo
                        tdbtn.append(btn)

                        row.append(tdnom)
                        row.append(tdprecio)
                        row.append(tdcant)
                        row.append(tdtotal)
                    
                        row.append(tdbtn)
                        fragment.append(row)
                        tablainsumodetalle.append(fragment)
                }
                else{

                }
      
        
    }
})



// 

// edicion.addEventListener('click',(e)=>{
//     const editar=e.target;
//     if(editar.classList.contains('btneditar')){
//         let xhr
//          if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
//          else xhr = new ActiveXObject("Microsoft.XMLHTTP")
//          idd=editar.parentElement.parentElement.firstElementChild.textContent
//          nomdep=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
//          inputdeposito.value=nomdep

//          console.log(idd)
        

//         xhr.open('GET', `../php/consultadepositodetalle.php?x=${idd}`)

//         xhr.addEventListener('load', (data) => {
//             const dataJSON = JSON.parse(data.target.response)
//             console.log(dataJSON)

//             const fragment = document.createDocumentFragment()

//             for (const insumo of dataJSON) {
//                 const row = document.createElement('TR')
//                 row.classList.add('fila')
//                 // const datadepo = document.createElement('TD')

//                 const dataid = document.createElement('TD')
//                 const datanom = document.createElement('TD')
//                 const datadesc = document.createElement('TD')
//                 const dataprecio = document.createElement('TD')
//                 const dataStock = document.createElement('TD')
//                 const datacant=document.createElement('TD')
//                 const cant=document.createElement('input')
//                 cant.classList.add('inputventas')

//                 const databtnedit=document.createElement('TD')
//                 const btnedit=document.createElement('button')
//                 btnedit.classList.add("btneditar")
//                 btnedit.textContent="Añadir"
//                 datacant.append(cant)
//                 databtnedit.append(btnedit)
//                 //   datadepo.textContent=idd
//                 dataid.textContent = insumo[0]
//                 datanom.textContent = insumo[1]
//                 datadesc.textContent = insumo[2]
//                 dataprecio.textContent = insumo[3]
//                 dataStock.textContent = insumo[4]
                

//                 // datadepo.classList.add('celda')

//                 dataid.classList.add('celda')
//                 datanom.classList.add('celda')
//                 datadesc.classList.add('celda')
//                 dataprecio.classList.add('celda')
//                 dataStock.classList.add('celda')
//                 datacant.classList.add('celda')
//                 databtnedit.classList.add('celda')

//                 // row.append(datadepo)

//                 row.append(dataid)
//                 row.append(datanom)
//                 row.append(datadesc)
//                 row.append(dataprecio)
//                 row.append(dataStock)
//                 row.append(datacant)

//                 row.append(databtnedit)

//                 fragment.append(row)
//             }
//             const hijo=tablainsumo.children[0];
                
//             while(hijo.nextElementSibling){;
//                 tablainsumo.removeChild(hijo.nextElementSibling);
//             }
            
//             tablainsumo.append(fragment);
//         })
//         xhr.send()

         
//          regins.classList.add('activar');
// 	    contventins.classList.add('activar');
        
//     }
// })

// iconocerrarins.addEventListener('click',()=>{
//     regins.classList.remove('activar');
// 	    contventins.classList.remove('activar');
// })



const tablainsumodetalle=document.getElementById('tabla_ordpago')

const regventadetalle = document.getElementById('ventventadetalle');
const contventadetalle = document.getElementById('cont_venta_detalle');
const iconocerrarventadetalle = document.getElementById('icono_cerrarventadetalle');


// tablainsumo.addEventListener('click',(e)=>{

//     const editar=e.target;
//     if(editar.classList.contains('btneditar')){
       
//          var nominsumo=editar.parentElement.parentElement.firstElementChild.nextElementSibling.textContent
//          var precioinsumo=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
//          var cantinsumo=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.value
//         //  inputdeposito.value=nomdep

//         //  console.log(idd)

//         const fragment= document.createDocumentFragment()
//         const row=document.createElement('tr')
//         const datadepo = document.createElement('TD')

//         const tdnom=document.createElement('td')
//         const tdprecio=document.createElement('td')
//         const tdcant=document.createElement('td')
//         const tdtotal=document.createElement('td')
    
//         const tdbtn=document.createElement('td')
//         const btn=document.createElement('button')
//         btn.textContent='Quitar'
        
//         btn.classList.add("btneditar")
    
//         datadepo.textContent=nomdep

//         tdnom.textContent=nominsumo
//         tdprecio.textContent=precioinsumo
//         tdcant.textContent=cantinsumo
//         tdtotal.textContent=precioinsumo*cantinsumo
//         tdbtn.append(btn)

//         row.append(datadepo)

//         row.append(tdnom)
//         row.append(tdprecio)
//         row.append(tdcant)
//         row.append(tdtotal)
    
//         row.append(tdbtn)
//         fragment.append(row)
//         tablainsumodetalle.append(fragment)
         
      
        
//     }

// })

iconocerrarventadetalle.addEventListener('click',(e)=>{
    e.preventDefault();
	regventadetalle.classList.remove('activar');
	contventadetalle.classList.remove('activar');
})


// boton ver detalle
const btnverdetalle=document.getElementById('btnverdetalle')

btnverdetalle.addEventListener('click',()=>{
    regventadetalle.classList.add('activar');
    contventadetalle.classList.add('activar');
})


tablainsumodetalle.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        tablainsumodetalle.removeChild(editar.parentElement.parentElement)
    }
})

const btnconfventa=document.getElementById('btnconfventa')

var total=0
var totals=0
btnconfventa.addEventListener('click',()=>{

    var hijo=tablainsumodetalle.lastElementChild
    var depo=selectdep.options[selectdep.selectedIndex].value
    var insumo
    var cantidad

    // var depos=[]
    var insumos=[]
    var cantidads=[]
   

    console.log(hijo)
    // nextElementSibling

    while(hijo!=tablainsumodetalle.children[0]){
        // depo=hijo.firstElementChild.textContent
        // totalorden = hijo.firstElementChild.nextElementSibling.textContent
        insumo=hijo.firstElementChild.textContent
        cantidad=hijo.firstElementChild.nextElementSibling.nextElementSibling.textContent
        total=hijo.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent
        
        // console.log(`id comprobante : ${idcomprobante} descripcion: ${desc} monto a pagar: ${montopagar}`)
        
        // depos.push(depo)
        insumos.push(insumo)
        cantidads.push(cantidad)
        totals+=total
        totals=parseInt(totals)

        hijo=hijo.previousElementSibling
        
    }
    regventadetalle.classList.remove('activar');
    contventadetalle.classList.remove('activar');
    console.log(`${depo} insumos: ${insumos} ${cantidads} ${totals}`)

    window.location.href=`../php/regventas.php?dep=${depo}&ins=${insumos}&c=${cantidads}&to=${totals}`
})