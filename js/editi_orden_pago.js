const nom=document.getElementById('nom')
const desc=document.getElementById('desc')
//const precio=document.getElementById('precio')
const input=document.getElementById('input')

const form=document.getElementById('form')

const btnconf=document.getElementById('btnconf')
const btncanc=document.getElementById('btncanc')
const btnrip=document.getElementById('btnrip')


btnconf.addEventListener('click',()=>{


    var opcion = confirm("Esta seguro de editar la orden de pago?");
    if (opcion == true) {
        mensaje = "Has clickado OK";
        form.submit()
	} 
})
btnrip.addEventListener('click',()=>{
    var opcion = confirm("Esta seguro de eliminar la orden de pago?");
    var r=document.getElementById('id').value
    console.log(r)
    if (opcion == true) {
        mensaje = "Has clickado OK";
        window.location.href="../php/abmorden_pago.php?r="+r
	} 
})

btncanc.addEventListener('click',()=>{
    window.location.href="../php/abmorden_pago.php"
})