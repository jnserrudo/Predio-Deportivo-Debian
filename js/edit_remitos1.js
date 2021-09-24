const id=document.getElementById('id')
const nom=document.getElementById('nom')
const direc=document.getElementById('direc')
const tel=document.getElementById('tel')
const correo=document.getElementById('correo')
const input=document.getElementById('input')

const form=document.getElementById('form')

const btnconf=document.getElementById('btnconf')
const btncanc=document.getElementById('btncanc')
const btnrip=document.getElementById('btnrip')


 btnconf.addEventListener('click',()=>{


   var opcion = confirm("Esta seguro de editar el remito?");
  if (opcion == true) {
       mensaje = "Has clickado OK";
        //var id1 =document.getElementById('id1').textContent
       // var nom1=document.getElementById('nom1').textContent
       // var direc1=document.getElementById('direc1').textContent
       // var tel1=document.getElementById('tel1').textContent
       // var correo1=document.getElementById('correo1').textContent
        form.submit();
      //  nom.submit();
        //direc.submit();
        //tel.submit();
        //correo.submit();

     //   window.location.href="../php/abminsumo.php?nom="+nom+'&direc='+direc+'&id='+id+'&tel='+tel+'&correo='+correo        
       
	} 
}) 
btnrip.addEventListener('click',()=>{
    var opcion = confirm("Esta seguro de eliminar el remito?");
    var r=document.getElementById('prueba').textContent
    if (opcion == true) {
        mensaje = "Has clickado OK";
        window.location.href="../php/abmremitos1.php?r="+r
	} 
})

btncanc.addEventListener('click',()=>{

    window.location.href="../php/abmremitos1.php"
})