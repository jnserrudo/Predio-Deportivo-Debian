const btnabmremito=document.getElementById('verremitos')
btnabmremito.addEventListener('click',()=>{
    window.location.href='../php/abmremitos1.php'
})


const btnsiguiente = document.getElementById('btnsiguiente')

const idordencompra = document.getElementById("txtIDorden").value;
const codremito = document.getElementById("txt_cod_remito").value;
const fecharecepcion = document.getElementById("date_fec_remito").value;

//const x=document.getElementById("buscarcuota").value


btnsiguiente.addEventListener('click',(e)=>{

    const idordencompra = document.getElementById("txtIDorden").value;
    const codremito = document.getElementById("txt_cod_remito").value;
    const fecharecepcion = document.getElementById("date_fec_remito").value;

    console.log(idordencompra,'+',codremito,'+',fecharecepcion)

    if(idordencompra == undefined || codremito == undefined || fecharecepcion == undefined){
        window.alert("Porfavor ingrese todos los datos.");
    }
    else if(idordencompra == '' || codremito == '' || fecharecepcion == ''){
        window.alert("Porfavor ingrese todos los datos.");
    }
    else{
        const tipo = 1 // Tipo define si se crea o se elimina la tabla temporal

        let xhr4
        if (window.XMLHttpRequest) xhr4 = new XMLHttpRequest()
        else xhr4 = new ActiveXObject("Microsoft.XMLHTTP")
        xhr4.open('GET', `../php/remitodetalledelete.php?tipo=${tipo}`)
        xhr4.send()

        window.location.href=`../php/remito_copy.php?cod=${codremito}&fec=${fecharecepcion}&ord=${idordencompra}`
    }
    
})

