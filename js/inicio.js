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
if(irinsumo){
    irinsumo.addEventListener('click',()=>
    {
        window.location.href='../php/abminsumo.php'
    })
}
const irproveedores=document.getElementById('irproveedores')

if(irproveedores){
    irproveedores.addEventListener('click',()=>
    {
        window.location.href='../php/abmproveedores.php'
    })
}


const irorden=document.getElementById('irorden')

if(irorden){
    irorden.addEventListener('click',()=>
    {
        window.location.href='../php/abmorden.php'
    })
}
const logoinicio=document.getElementById('logoinicio')
if(logoinicio){
        logoinicio.addEventListener('click',()=>{
        window.location.href='../php/inicio.php'
            })
}

const irmov=document.getElementById('irmov')
if(irmov){
    irmov.addEventListener('click',()=>{
    window.location.href='../php/movstock.php'
        }   )
}

const irremitos=document.getElementById('irremitos')
if(irremitos){
    irremitos.addEventListener('click',()=>{
        window.location.href='../php/remito1.php'
    })
}
const irsocios=document.getElementById('irsocios')
if(irsocios){
    irsocios.addEventListener('click',()=>{
        window.location.href='../php/abmsocios.php'
    })
}

const ventas=document.getElementById('irventas')
if(ventas){
    ventas.addEventListener('click',()=>{
    window.location.href='../php/pagina_ventas.php'
    })
}
const irordenpago=document.getElementById('irordenpago')
if(irordenpago){
    irordenpago.addEventListener('click',()=>{
    window.location.href='../php/abmorden_pago.php'
    })
}
const ircomprobante=document.getElementById('ircomprobante')

if(ircomprobante){
        ircomprobante.addEventListener('click',()=>{
        window.location.href='../php/abmcomprobante.php'
    })
}
const irdeposito=document.getElementById('irdeposito')

if(irdeposito){
    irdeposito.addEventListener('click',()=>{
        window.location.href='../php/abmdepositos.php'
    })
}
const irreservas=document.getElementById('irreservas')

if(irreservas){
    irreservas.addEventListener('click',()=>{
        window.location.href='../php/abmreservaf5.php'
    })
}
const irinstalaciones=document.getElementById('irinstalaciones')

if(irinstalaciones){
    irinstalaciones.addEventListener('click',()=>{
        window.location.href='../php/abminstalacion.php'
    })
}

const irusuario=document.getElementById('irusuarios')

if(irusuario){
    irusuario.addEventListener('click',()=>{
        window.location.href='../php/usuario.php'
    })
}

const irequipo=document.getElementById('irequipos')

if(irequipo){
    irequipo.addEventListener('click',()=>{
        window.location.href='../php/abmequipo.php'
    })
}
const irdis=document.getElementById('irdis')

if(irdis){
    irdis.addEventListener('click',()=>{
        window.location.href='../php/abmdisciplina.php'
    })
}
const irparticipante=document.getElementById('irparticipantes')

if(irparticipante){
    irparticipante.addEventListener('click',()=>{
        window.location.href='../php/abmparticipante.php'
    })
}

const ircobros=document.getElementById('ircobros')

if(ircobros){
    ircobros.addEventListener('click',()=>{
        window.location.href='../php/cobros.php'
    })
}
