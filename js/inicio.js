const sesion=document.getElementById('btnsesion')
sesion.addEventListener('click',()=>{
    var opcion = confirm("Esta seguro de cerrar sesion?");
    var x=1
    if (opcion == true) {
        mensaje = "Has clickado OK";
        window.location.href=`../php/login.php?x=${x}`;
	} 
})


const irinsumo=document.getElementById('irinsumo')

irinsumo.addEventListener('click',()=>
{
    window.location.href='../php/abminsumo.php'
})

const irproveedores=document.getElementById('irproveedores')

irproveedores.addEventListener('click',()=>
{
    window.location.href='../php/abmproveedores.php'
})

const irorden=document.getElementById('irorden')

irorden.addEventListener('click',()=>
{
    window.location.href='../php/ordencompra.php'
})

const logoinicio=document.getElementById('logoinicio')

logoinicio.addEventListener('click',()=>{
    window.location.href='../php/primerapagina.php'
})

const irmov=document.getElementById('irmov')

irmov.addEventListener('click',()=>{
    window.location.href='../php/movstock.php.php'
})