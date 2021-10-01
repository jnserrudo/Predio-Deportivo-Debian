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
    window.location.href='../php/inicio.php'
})

const irmov=document.getElementById('irmov')

irmov.addEventListener('click',()=>{
    window.location.href='../php/movstock.php'
})


const irremitos=document.getElementById('irremitos')

irremitos.addEventListener('click',()=>{
    window.location.href='../php/remito1.php'
})

const irsocios=document.getElementById('irsocios')

irsocios.addEventListener('click',()=>{
    window.location.href='../php/abmsocios.php'
})


const ventas=document.getElementById('irventas')

ventas.addEventListener('click',()=>{
    window.location.href='../php/pagina_ventas.php'
})

const irordenpago=document.getElementById('irordenpago')

irordenpago.addEventListener('click',()=>{
    window.location.href='../php/abmorden_pago.php'
})

const ircomprobante=document.getElementById('ircomprobante')


ircomprobante.addEventListener('click',()=>{
    window.location.href='../php/abmcomprobante.php'
})

const irdeposito=document.getElementById('irdeposito')


irdeposito.addEventListener('click',()=>{
    window.location.href='../php/abmdepositos.php'
})

