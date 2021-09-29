


// cargar ordenes de compra
const input=document.getElementById("input");



console.log("aaaaaaa");

const consulta=document.getElementById("txtconsulta");




const busq=document.getElementById("busqueda")
busq.addEventListener('keyup',
(e)=>{
  var x= e.target.value;
  console.log(x);
  getData(x);
    
}
)

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
        
        xhr.open('GET', "../php/insercion_orden.php")

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
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_orden.php?x=${x}`)

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









getData() 


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

const selectprov=document.getElementById('idprov')

selectprov.addEventListener('change',()=>{
    idprov=selectprov.options[selectprov.selectedIndex].value
    // cargar las ordenes de compra que se vinculen con ese proveedor
    console.log('idprove : ' +idprov)
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    xhr.open('GET', `../php/insercion_orden.php?pr=${idprov}`)

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
    xhr.send()



})
const p_monto=document.getElementById("p_monto");
const monto=document.getElementById("input_monto");
const selecttipo=document.getElementById('selecttipo')

selecttipo.addEventListener('change',()=>{
    tipo=selecttipo.options[selecttipo.selectedIndex].value
    if(tipo=='Notacredito'||tipo=='Notadebito'){
        // monto.setAttribute(visibility, 'visible');
        // p_monto.setAttribute(visibility, 'visible');
        monto.classList.add('activar')
         p_monto.classList.add('activar')
    }
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
    }

    
        
    
})


icono_cerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	ventcomp.classList.remove('activar');
    monto.classList.remove('activar')
    p_monto.classList.remove('activar')

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
    window.location.href=`../php/comprobantes.php?ip=${idprov}&io=${idorden}&l=${letra}&m=${totalcomp}&t=${tipo}&n=${nombres}&c=${cantidades}`
})
// --------------------------------------------

// nota de credito o debito 











