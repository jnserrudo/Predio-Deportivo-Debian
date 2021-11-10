
const getDataop = (p) => {
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p== undefined) {
        
        xhr.open('GET', "../php/consultaordenpago.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                        console.log(orden+"y su primero seria"+orden[0])
                        const row = document.createElement('TR')
                        // row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datafecha = document.createElement('TD')
                        const datairproveedor = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Elegir"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = orden[0]
                        datafecha.textContent = orden[1]
                        datairproveedor.textContent = orden[2]                      

                        dataid.classList.add('celda')
                        datafecha.classList.add('celda')
                        datairproveedor.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datafecha)
                        row.append(datairproveedor)
                        
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consultaordenpago.php?p=${p}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const orden of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const datairproveedor = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Elegir"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+orden.Id)
                dataid.textContent = orden[0]
                datafecha.textContent = orden[1]
                datairproveedor.textContent = orden[2]  
                


                dataid.classList.add('celda')
                datafecha.classList.add('celda')
                datairproveedor.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datafecha)
                row.append(datairproveedor)
                
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

const pag1=document.getElementById('btnpag1p')
const pag2=document.getElementById('btnpag2p')
const pag3=document.getElementById('btnpag3p')
const pag4=document.getElementById('btnpag4p')
const pag5=document.getElementById('btnpag5p')


pag1.addEventListener('click',()=>{
    let p=pag1.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataop(p)

})

pag2.addEventListener('click',()=>{
    let p=pag2.textContent
    // window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataop(p)
    
})

pag3.addEventListener('click',()=>{
    let p=pag3.textContent
    //window.location.href=`../../php/abminsumo.php?p=${p}`
    getDataop(p)

})
pag4.addEventListener('click',()=>{
    let p=pag4.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataop(p)
})

pag5.addEventListener('click',()=>{
    let p=pag5.textContent
  //  window.location.href=`../../php/abminsumo.php?p=${p}`
  getDataop(p)

})




// funciones para las ventanas emergentes
const tablaordpago=document.getElementById('tabla')
const inputidorden=document.getElementById('inputidorden')
const inputidordentotal=document.getElementById('inputidordentotal')
const inputmonto=document.getElementById('inputmonto')
const ventregmonto=document.getElementById('ventordpagomonto')
const contventmonto=document.getElementById('cont_ordpagomonto')
const iconocerrar = document.getElementById('icono_cerrarordpagomonto');
const btnaceptarmonto=document.getElementById('btnaceptarmonto')





const tablaordpagodetalle=document.getElementById('tabla_ordpago')
const ventregordpagodetalle=document.getElementById('ventordpago')
const contventordpagodetalle=document.getElementById('cont_ordpago_detalle')
const iconocerrarordpagodetalle = document.getElementById('icono_cerrarordpagodetalle');
const btnverdetalle=document.getElementById('btnvent')



var idorden
var ordentotal
var monto
tablaordpago.addEventListener('click',(e)=>{
    const editar=e.target;
    if(editar.classList.contains('btneditar')){
        idorden=editar.parentElement.parentElement.firstElementChild.textContent
        
        inputidorden.value=idorden
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



//




        ventregmonto.classList.add('activar')
        contventmonto.classList.add('activar')

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


 //const btnirabmordpagos= document.getElementById('btnverordpagos')
 //btnirabmordpagos.addEventListener('click',()=>{
   //  window.location.href=`./../../php/abmorden_pago.php`
 //})

 const btnirgraficocompras= document.getElementById('btnirgraficocompras')
 btnirabmordpagos.addEventListener('click',()=>{
  window.location.href=`./../../php/informe_ord_pago.php`
 })
 