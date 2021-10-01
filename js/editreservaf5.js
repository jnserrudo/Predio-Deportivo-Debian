const Fecha=document.getElementById('Fecha')
const Hora=document.getElementById('Hora')
const Solicitante=document.getElementById('Solicitante')
const Contacto=document.getElementById('Contacto')
const Instalacion=document.getElementById('Instalacion')
const Disciplina=document.getElementById('Disciplina')

const form=document.getElementById('form')

const btnconf=document.getElementById('btnconf')
const btncanc=document.getElementById('btncanc')
const btnrip=document.getElementById('btnrip')


btnconf.addEventListener('click',()=>{


    var opcion = confirm("Esta seguro de editar la Reserva?");
    if (opcion == true) {
        mensaje = "Has clickado OK";
        form.submit()
	} 
})
btnrip.addEventListener('click',()=>{
    var opcion = confirm("Esta seguro de eliminar la Reserva?");
    var r=document.getElementById('Id').value
    console.log(r)
    if (opcion == true) {
        mensaje = "Has clickado OK";
        window.location.href="../php/abmreservaf5.php?r="+r
	} 
})

btncanc.addEventListener('click',()=>{

    window.location.href="../php/abmreservaf5.php"
})