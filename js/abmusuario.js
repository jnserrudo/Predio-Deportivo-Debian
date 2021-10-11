const table = document.getElementById('tabla')

const busq=document.getElementById("busqueda")
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
        
        xhr.open('GET', "../php/consulta_usuarios.php")

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanom = document.createElement('TD')
                const dataApellido = document.createElement('TD')
                const dataCorreo = document.createElement('TD')
                const dataDNI = document.createElement('TD')
                const dataDireccion = document.createElement('TD')
                const dataUsu = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const datarol = document.createElement('TD')

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Borrar"
                databtnedit.append(btnedit)
                dataid.textContent = socio[0]
                datanom.textContent = socio[1]
                dataApellido.textContent = socio[2]
                dataCorreo.textContent = socio[3]
                dataDNI.textContent = socio[4]
                dataDireccion.textContent = socio[5]
                dataUsu.textContent = socio[6]
                datafecha.textContent = socio[7]
                datarol.textContent = socio[8]



                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataCorreo.classList.add('celda')
                dataDNI.classList.add('celda')
                dataDireccion.classList.add('celda')
                dataUsu.classList.add('celda')
                datafecha.classList.add('celda')
                datarol.classList.add('celda')



                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataCorreo)
                row.append(dataDNI)
            
                row.append(dataDireccion)
                row.append(dataUsu)
                row.append(datafecha)
                row.append(datarol)

                row.append(databtnedit)

                fragment.append(row)
            }
            table.appendChild(fragment)
        })
    } else {
        xhr.open('GET', `../php/consulta_usuarios.php?x=${x}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()

            for (const socio of dataJSON) {
                const row = document.createElement('TR')
                row.classList.add('fila')
                const dataid = document.createElement('TD')
                const datanom = document.createElement('TD')
                const dataApellido = document.createElement('TD')
                const dataCorreo = document.createElement('TD')
                const dataDNI = document.createElement('TD')
                const dataDireccion = document.createElement('TD')
                const dataUsu = document.createElement('TD')
                const datafecha = document.createElement('TD')
                const datarol = document.createElement('TD')

                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btneditar")
                btnedit.textContent="Borrar"
                databtnedit.append(btnedit)
                  console.log("soy el id nro"+socio.Id)
                dataid.textContent = socio[0]
                datanom.textContent = socio[1]
                dataApellido.textContent = socio[2]
                dataCorreo.textContent = socio[3]
                dataDNI.textContent = socio[4]
                dataDireccion.textContent = socio[5]
                dataUsu.textContent = socio[6]
                datafecha.textContent = socio[7]
                datarol.textContent = socio[8]



                
                


                dataid.classList.add('celda')
                datanom.classList.add('celda')
                dataApellido.classList.add('celda')
                dataCorreo.classList.add('celda')
                dataDNI.classList.add('celda')
                dataDireccion.classList.add('celda')
                dataUsu.classList.add('celda')
                datafecha.classList.add('celda')
                datarol.classList.add('celda')



                row.append(dataid)
                row.append(datanom)
                row.append(dataApellido)
                row.append(dataCorreo)
                row.append(dataDNI)
            
                row.append(dataDireccion)
                row.append(dataUsu)
                row.append(datafecha)
                row.append(datarol)

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
    if(e.target.classList.contains('btneditar')){
        var id=e.target.parentElement.parentElement.firstElementChild
        console.log('id: '+id)
        var opcion = confirm("Esta seguro de eliminar el usuario?");

        console.log(r)
        if (opcion == true) {
            mensaje = "Has clickado OK";
            window.location.href="../php/usuario.php?r="+id
        } 
    }
           
})