const tabla = document.getElementById('tabla2')

const input= document.getElementById('input11')



// const btn=document.getElementById('btneditar')


var total = 0;



const edicion=document.getElementById('tabla')

var w 
edicion.addEventListener('click',(e)=>{
    w=input.value
    const editar=e.target;
    console.log(input.value)
    console.log(editar.classList.contains('btneditar'))
    if(editar.classList.contains('btneditar')){
        let xhr
         if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
         else xhr = new ActiveXObject("Microsoft.XMLHTTP")
         //obtengo el ids
         
         var t=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent
         var x=editar.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent
         console.log(t + " " + x + " " + w + " ")
        //  xhr.open('GET', `../php/queryedicion.php?t=${t}`)
        //  xhr.addEventListener('load',()=>
        //  {
        //      cconst fragment = document.createDocumentFragment()
        const fragment = document.createDocumentFragment()


    console.log("y su primero seria")
    const row = document.createElement('TR')
    row.classList.add('fila')
    const datanom = document.createElement('TD')
    const dataprecio = document.createElement('TD')
    const datacantidad = document.createElement('TD')
    const btneliminar = document.createElement('TD')


    datanom.textContent = t
    dataprecio.textContent = x
    datacantidad.textContent = w
    let deleteButton = document.createElement("button");
    btneliminar.appendChild(deleteButton)
    deleteButton.textContent = "Eliminar";

  
    datanom.classList.add('celda')
    dataprecio.classList.add('celda')
    dataprecio.classList.add('tdprecio')
    datacantidad.classList.add('celda')
    btneliminar.classList.add('celda')

    // console.log("soy el data id :"+dataid.textContent)
    row.append(datanom)
    row.append(dataprecio)
    row.append(datacantidad)
    row.append(btneliminar)

    total =0;

    
    deleteButton.addEventListener("click",(event) => {
        //total= total-event.target.parentElement.parentElement.firstElementChild.nextElementSibling.textContent

        event.target.parentElement.parentElement.remove()
        console.log("entro al delete")
    
    })
    /*
    let preciototal = 0;
    let cantidad = 0;
    let celdasprecio = document.querySelectorAll('td + td')
    let celdascantidad = document.querySelectorAll('td + td + td')

    for (let i=0; i< celdasprecio.length;i++){
        total += parseFloat(celdasprecio[i].firstChild.data);
        cantidad += parseFloat(celdascantidad[i].firstChild.data);
    }

    let precioporcantidad = preciototal*cantidad;

    total.textContent = precioporcantidad;
    */



    fragment.append(row)

tabla.appendChild(fragment)
console.log("llegue")
        //  })
         
        //  xhr.send()
         
    }

})



const inputtotal = document.getElementById('total')
// inputtotal.value = total;
const btntotal=document.getElementById('calcular')

btntotal.addEventListener('click',()=>{

    
    if(tabla.childNodes.length = 0){
        total=0
    }else{

    var celdasPrecio = document.querySelectorAll('td');

    console.log(celdasPrecio)

    for(let i = 0; i < celdasPrecio.length; ++i){
            if(celdasPrecio[i].classList.contains('tdprecio')){
                console.log(celdasPrecio[i].textContent)
                console.log(celdasPrecio[i+1].textContent)
                total = total + parseInt(celdasPrecio[i].textContent)*parseInt(celdasPrecio[i+1].textContent);
                console.log(total)
                
            }
        }
    }
    inputtotal.value = total;
    total=0;


    // let nuevaFila = document.createElement('tr');

    // let celdaTotal = document.createElement('td');
    // let textoCeldaTotal = document.createTextNode('Total:');
    // celdaTotal.appendChild(textoCeldaTotal);
    // nuevaFila.appendChild(celdaTotal);

    // let celdaValorTotal = document.createElement('td');
    // let textoCeldaValorTotal = document.createTextNode(total);
    // celdaValorTotal.appendChild(textoCeldaValorTotal);
    // nuevaFila.appendChild(celdaValorTotal);

    // document.getElementById('tabla2').appendChild(nuevaFila);


})

                                                                // var total = 0;

                                                                // var celdasPrecio = document.querySelectorAll('td');

                                                                // console.log(celdasPrecio)

                                                                // // for(let i = 0; i < celdasPrecio.length; ++i){
                                                                // //     console.log(celdasPrecio[i].textContent)
                                                                // //     total += parseFloat(celdasPrecio[i].textContent);
                                                                // //     console.log(total)
                                                                // // }

                                                                // let nuevaFila = document.createElement('tr');

                                                                // let celdaTotal = document.createElement('td');
                                                                // let textoCeldaTotal = document.createTextNode('Total:');
                                                                // celdaTotal.appendChild(textoCeldaTotal);
                                                                // nuevaFila.appendChild(celdaTotal);

                                                                // let celdaValorTotal = document.createElement('td');
                                                                // let textoCeldaValorTotal = document.createTextNode(total);
                                                                // celdaValorTotal.appendChild(textoCeldaValorTotal);
                                                                // nuevaFila.appendChild(celdaValorTotal);

                                                                // document.getElementById('tabla2').appendChild(nuevaFila);






