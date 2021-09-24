
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
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                        console.log(insumo+"y su primero seria"+insumo[0])
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
                        btnedit.textContent="Elegir"   /*texto del boton*/
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
            console.log(dataJSON)

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
                btnedit.textContent="Elegir"
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

table.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        
       const m=editar.parentElement.parentElement.firstElementChild.textContent/*.nextElementSibling.nextElementSibling.textContent */
        console.log("el idd es:"+m)      
       // const c=editar.parentElement.parentElement.find(".cantidad").val();
      // const c=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent/*.nextElementSibling.nextElementSibling.textContent */
        //console.log("la cantidad es:"+c)

       // ventcant.classList.add('activar')
       // contventcant.classList.add('activar')
       //const remito = document.getElementById("valorremit").value;
       
      
      // console.log("el remito es:"+remito)
       const cantidad=document.getElementById('txt_cantidad').value;
       //const remito=document.getElementById('txt_cod').value;
       window.location="../php/remito_copy.php?m="+m+'&cantidad='+cantidad//+'&remito='+remito

    }
})




// const btnvent = document.getElementById('btnagregarmov');


// btnvent.addEventListener('click', ()=>{
//    const t=document.getElementById('txt_cod').value;
//    const  o=document.getElementById('txt_orden').value;
//     const f=document.getElementById('txt_fecha').value;
// 	window.location="../php/remito_copy.php?t="+t+'&o='+o+'&f='+f;

// });
// //const reg = document.getElementById('reg');
// //const contvent = document.getElementById('cont_vent');
// //const iconocerrar = document.getElementById('icono_cerrar');

// const btn_remito=document.getElementById('btn_remito');
// btn_remito.addEventListener('click', ()=>{
//     window.location='/../php/remito.php';

// });

/*
btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');

});
*/
/*
iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});*/
 
//var m
// //var c
// const ventcant = document.getElementById('vent_cant');
// //const contventcant = document.getElementById('cont_ventcant');
// //const icono_cerrarcant = document.getElementById('icono_cerrarcant');
// const inputcant=document.getElementById('inputcant')
// const btnaceptarcant=document.getElementById('btnaceptarcant')


//icono_cerrarcant.addEventListener('click', (e)=>{
//	e.preventDefault();
//	ventcant.classList.remove('activar');
//	contventcant.classList.remove('activar');
  //  inputcant.value=0
//});






/*

const btn_cancelar=document.getElementById("btn_cancelar");

btn_cancelar.addEventListener('click', ()=>{
    const p=
	window.location="../php/remito.php?p="+p;
});  */

/*
tablamov.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        console.log(editar.parentElement.parentElement.firstElementChild.nextElementSibling)
        tablamov.removeChild(editar.parentElement.parentElement.firstElementChild.nextElementSibling)

        
    }
})  
 */
// btnaceptarcant.addEventListener('click',()=>{
//     c=inputcant.value
//     ventcant.classList.remove('activar');
// 	contventcant.classList.remove('activar');

/*


    const fragmento=document.createDocumentFragment()
    const row = document.createElement('TR')
    const nombremov = document.createElement('TD')
    const cantmov = document.createElement('TD')
    const contbtnmov = document.createElement('TD')
    const btnedit=document.createElement('button')

    nombremov.classList.add('celda')
    cantmov.classList.add('celda')
    contbtnmov.classList.add('celda')
    btnedit.classList.add("btneditar")
    btnedit.textContent="Quitar"
    contbtnmov.append(btnedit)
    nombremov.textContent=m
    cantmov.textContent=c
    row.append(nombremov)
    row.append(cantmov)
    row.append(btnedit)
    fragmento.append(row)
    tablamov.append(fragmento)
    ventcant.classList.remove('activar');
	contventcant.classList.remove('activar'); */
//     inputcant.value=0
// })  
/*
edicion.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el id
         var t=editar.parentElement.parentElement.firstElementChild.textContent
         console.log(t)
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      console.log("llegue")
        //  })
         
        //  xhr.send()        
        // window.location="../php/remito.php?t="+t

                           
    }
})


*/
