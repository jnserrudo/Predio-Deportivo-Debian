

const getDatadepo = (f) => {
    let xhr
    
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (f == undefined) {
        
        const h = document.getElementById("txtiddeposito").value;
        console.log(h);
        const x = document.getElementById("busquedainsumo").value;
        console.log(x);
        xhr.open('GET', `../php/inserinsumdepo.php?h=${h}&x=${x}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                let x=parseInt(insumo[3])//stock deposito
                let s=parseInt(insumo[4])//stock minimo
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                const datastock = document.createElement('TD')
                const dataestado=document.createElement('TD')
                const datadivicono=document.createElement('DIV')
                const dataicono=document.createElement('IMG')
             //   datadivicono.classList.add('div_icono_estado')
                dataestado.classList.add('celdaestado')

               // dataicono.classList.add('icono_estado')
               // datadivicono.append(dataicono)
              
               dataestado.append(datadivicono)
                /*const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)*/
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                datastock.classList.add('celda')
                // comparamos estado
                if(s>x){
                    //stock por deposito menor al stock minimo
                    datadivicono.classList.add('cruz')

                }
                else{
                    if(s===x){
                        // alerta dea
                        datadivicono.classList.add('alerta')
                    }
                    else{
                        //stock deposito mayor al stock minimo
                        datadivicono.classList.add('tilde')
                    }
                }
                dataestado.classList.add('celda')
                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                row.append(datastock)
                row.append(dataestado)
                fragment.append(row)
            }
            tabla.appendChild(fragment)
        })
    } 
    else {
        const h = document.getElementById("txtiddeposito").value;
        console.log(h);
        const x = document.getElementById("busquedainsumo").value;
        console.log(x);
        xhr.open('GET', `../php/inserinsumdepo.php?f=${f}&h=${h}&x=${x}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                let x=parseInt(insumo[3])//stock deposito
                let s=parseInt(insumo[4])//stock minimo
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                const datastock = document.createElement('TD')
                const dataestado=document.createElement('TD')
                const datadivicono=document.createElement('DIV')
                //const dataicono=document.createElement('IMG')
                datadivicono.classList.add('div_icono_estado')
                dataestado.classList.add('celdaestado')

               // datadivicono.append(dataicono)
               
               dataestado.append(datadivicono)





                /*const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btnseleccionardepo")
                btnedit.textContent="Seleccionar"
                databtnedit.append(btnedit)*/
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                datastock.classList.add('celda')
                // comparamos estado
                if(s>x){
                    //stock por deposito menor al stock minimo
                    datadivicono.classList.add('cruz')

                }
                else{
                    if(s===x){
                        // alerta dea
                        datadivicono.classList.add('alerta')
                    }
                    else{
                        //stock deposito mayor al stock minimo
                        datadivicono.classList.add('tilde')
                    }
                }
                dataestado.classList.add('celda')
                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                row.append(datastock)
                row.append(dataestado)
                fragment.append(row)
            }
            const hijo=tabla.children[0];     
            while(hijo.nextElementSibling){;
                tabla.removeChild(hijo.nextElementSibling);
            }    
            tabla.append(fragment);
        })
    }
    xhr.send()
}


const pag1=document.getElementById('btnpag1')
const pag2=document.getElementById('btnpag2')
const pag3=document.getElementById('btnpag3')
const pag4=document.getElementById('btnpag4')
const pag5=document.getElementById('btnpag5')


pag1.addEventListener('click',()=>{
    let f=pag1.textContent
    getDatadepo(f)
})

pag2.addEventListener('click',()=>{
    let f=pag2.textContent
    getDatadepo(f)
})

pag3.addEventListener('click',()=>{
    let f=pag3.textContent
    getDatadepo(f)
})
pag4.addEventListener('click',()=>{
    let f=pag4.textContent
    getDatadepo(f)
})

pag5.addEventListener('click',()=>{
    let f=pag5.textContent
    getDatadepo(f)
})



//----------------------------------- PAGINACION INSUMOS ----------------------------


const getDatosInsumos = (p) => {
    let xhr
    var depo=txtDeposito.value
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")

    if (p == undefined) {

        const z = document.getElementById("busquedainsumo2").value;
        console.log(z);
        
        xhr.open('GET', `../php/insercioninsumos_depo.php?z=${z}&depo=${depo}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                // const datastock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btninsumosdepo")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                // datastock.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                // row.append(datastock)
                row.append(databtnedit)

                fragment.append(row)
            }
            tablainsumos.appendChild(fragment)
        })
    } 
    else {
        var depo=txtDeposito.value
        const z = document.getElementById("busquedainsumo2").value;
        console.log(z);

        xhr.open('GET', `../php/insercioninsumos_depo.php?p=${p}&z=${z}&depo=${depo}`)

        xhr.addEventListener('load', (datosconsulta) => {
            const dataJSON = JSON.parse(datosconsulta.target.response)
            //console.log(dataJSON)
            const fragment = document.createDocumentFragment()

            for (const insumo of dataJSON) {
                //console.log(insumo+"y su primero seria"+insumo[0])
                const row = document.createElement('TR')
                const dataid = document.createElement('TD')
                const datanombre = document.createElement('TD')
                const datadescripcion = document.createElement('TD')
                // const datastock = document.createElement('TD')
                const databtnedit=document.createElement('TD')
                const btnedit=document.createElement('button')
                btnedit.classList.add("btninsumosdepo")
                btnedit.textContent="Añadir"
                databtnedit.append(btnedit)
                        
                dataid.textContent = insumo[0]
                datanombre.textContent = insumo[1]
                datadescripcion.textContent = insumo[2]
                // datastock.textContent = insumo[3]

                dataid.classList.add('celda')
                datanombre.classList.add('celda')
                datadescripcion.classList.add('celda')
                // datastock.classList.add('celda')
                databtnedit.classList.add('celda')

                row.append(dataid)
                row.append(datanombre)
                row.append(datadescripcion)
                // row.append(datastock)
                row.append(databtnedit)

                fragment.append(row)
            }
            const hijo=tablainsumos.children[0];
                
            while(hijo.nextElementSibling){;
                tablainsumos.removeChild(hijo.nextElementSibling);
            }
            
            tablainsumos.append(fragment);
        })
    }

    xhr.send()
}


const pagina1=document.getElementById('btnpagina1')
const pagina2=document.getElementById('btnpagina2')
const pagina3=document.getElementById('btnpagina3')
const pagina4=document.getElementById('btnpagina4')
const pagina5=document.getElementById('btnpagina5')


pagina1.addEventListener('click',()=>{
    let p=pagina1.textContent
    console.log(p)
    getDatosInsumos(p)
})

pagina2.addEventListener('click',()=>{
    let p=pagina2.textContent
    console.log(p)

    getDatosInsumos(p)
})

pagina3.addEventListener('click',()=>{
    let p=pagina3.textContent
    getDatosInsumos(p)
})
pagina4.addEventListener('click',()=>{
    let p=pagina4.textContent
    getDatosInsumos(p)
})

pagina5.addEventListener('click',()=>{
    let p=pagina5.textContent
    getDatosInsumos(p)
})