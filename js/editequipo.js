const Nombre=document.getElementById('Nombre')
const Disciplina=document.getElementById('Disciplina')

const form=document.getElementById('form')

const btnconf=document.getElementById('btnconf')
const btncanc=document.getElementById('btncanc')
const btnrip=document.getElementById('btnrip')


btnconf.addEventListener('click',()=>{


    var opcion = confirm("Esta seguro de editar el Equipo?");
    if (opcion == true) {
        mensaje = "Has clickado OK";
        form.submit()
	} 
})
btnrip.addEventListener('click',()=>{
    var opcion = confirm("Esta seguro de eliminar el Equipo?");
    var r=document.getElementById('Id').value
    console.log(r)
    if (opcion == true) {
        mensaje = "Has clickado OK";
        window.location.href="../php/abmequipo.php?r="+r
	} 
})

btncanc.addEventListener('click',()=>{

    window.location.href="../php/abmequipo.php"
})