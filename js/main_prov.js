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
        
        xhr.open('GET', "../php/insercion_prov.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const proveedor of dataJSON) {
                        console.log(proveedor+"y su primero seria"+proveedor[0])
                        const row = document.createElement('TR')
                        row.classList.add('fila')
                        const dataid = document.createElement('TD')
                        const datanom = document.createElement('TD')
                        const datadirec = document.createElement('TD')
                        const datatel = document.createElement('TD')
                        const datacorreo = document.createElement('TD')
                        const datafecha_reg = document.createElement('TD')
                        const databtnedit=document.createElement('TD')
                        const btnedit=document.createElement('button')
                        btnedit.classList.add("btneditar")
                        btnedit.textContent="Editar"
                        databtnedit.append(btnedit)
                        
                        dataid.textContent = proveedor[0]
                        datanom.textContent = proveedor[1]
                        datadirec.textContent = proveedor[2]
                        datatel.textContent = proveedor[3]
                        datacorreo.textContent = proveedor[4]
                        datafecha_reg.textContent = proveedor[5]

                        dataid.classList.add('celda')
                        datanom.classList.add('celda')
                        datadirec.classList.add('celda')
                        datatel.classList.add('celda')
                        datacorreo.classList.add('celda')
                        datafecha_reg.classList.add('celda')
                        databtnedit.classList.add('celda')

                       
                        // console.log("soy el data id :"+dataid.textContent)
                        row.append(dataid)
                        row.append(datanom)
                        row.append(datadirec)
                        row.append(datatel)
                        row.append(datacorreo)
                        row.append(datafecha_reg)
                        row.append(databtnedit)

                        fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/insercion_prov.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const proveedor of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanom = document.createElement('TD')
                const datadirec = document.createElement('TD')
                const datatel = document.createElement('TD')
                const datacorreo = document.createElement('TD')
                const datafecha_reg = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Editar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+proveedor.Id)
                dataid.textContent = proveedor[0]
                datanom.textContent = proveedor[1]
                datadirec.textContent = proveedor[2]
                datatel.textContent = proveedor[3]
                datacorreo.textContent = proveedor[4]
                datafecha_reg.textContent = proveedor[5]
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                datadirec.classList.add('celda')
                datatel.classList.add('celda')
                datacorreo.classList.add('celda')
                datafecha_reg.classList.add('celda')
                databtnedit.classList.add('celda')


                row.append(dataid)
                row.append(datanom)
                row.append(datadirec)
                row.append(datatel)
                row.append(datacorreo)
                row.append(datafecha_reg)
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





const btnvent = document.getElementById('btnvent');
const reg = document.getElementById('reg');
const contvent = document.getElementById('cont_vent');
const iconocerrar = document.getElementById('icono_cerrar');






getData() 
btnvent.addEventListener('click', ()=>{
	reg.classList.add('activar');
    console.log("aa")
	contvent.classList.add('activar');
});

iconocerrar.addEventListener('click', (e)=>{
	e.preventDefault();
	reg.classList.remove('activar');
	contvent.classList.remove('activar');
});



const edicion=document.getElementById('tabla')


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
         
         window.location.href="../php/edicionproveedores.php?t="+t
    }
})



