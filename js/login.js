const btnlogin=document.getElementById('btnlogin')
const usuario=document.getElementById('usuario')
const contra=document.getElementById('contra')
const error=document.getElementById('error')
const contventl=document.getElementById('cont_vent')
const iconocerrarl=document.getElementById('icono_cerrar')
console.log('dea')
var er="error"
const txterror=document.getElementById('txt_error')
iconocerrarl.addEventListener('click', (e)=>{
	e.preventDefault();
	error.classList.remove('activar');
	contventl.classList.remove('activar');
    txterror.textContent='Usuario o Contraseña Incorrecta'
});

btnlogin.addEventListener('click',(e)=>{
   e.preventDefault()
    var x=usuario.value.toString()
    var y=contra.value.toString()
    if(x==''|| y==''){
        txterror.textContent='Debe Ingresar Usuario y Contraseña'
        error.classList.add('activar');
                    console.log("aa")
                	contventl.classList.add('activar');
    }
    else{

    console.log("usuario: "+x+"contra: "+y)
    let xhr
    var b
    
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    xhr.open('GET', `../php/validarlogin.php?x=${x}&y=${y}`)
    xhr.addEventListener('load',(data)=>{
        console.log(typeof(data.target.response))
        // var er="error"
        // console.log(typeof(er))
        console.log(data.target.response)
        // console.log(Array.isArray(data.target.response))
        // console.log(typeof(er))
        console.log(data.target.response===er)
        var datajson
        
        if(!typeof(data.target.response)==='string')  {      
            b=0
        }
        else{
           
            datajson=JSON.parse(data.target.response)
            console.log(datajson)
           
             b=1;
             console.log(b)
        }
        // typeof(datajson)
        console.log(b)
            if(b==1){
                
            
               if(datajson.length>0){

                for (const u of datajson) {
                    console.log(u)
                    x=u[0]
                    window.location.href=`../php/inicio.php?x=${x}`         
                }

               }
               else{
                console.log('no hay niaca')
                
                error.classList.add('activar');
                console.log("aa")
                contventl.classList.add('activar');

               }
                
            }
            else{
                console.log(b)
                console.log('no hay niaca')
                
                    error.classList.add('activar');
                    console.log("aa")
                	contventl.classList.add('activar');

            }
    })
    xhr.send()

    
    }
})



//datajson.length!=0



const ventreg=document.getElementById('ventreg')
const contventreg=document.getElementById('cont_ventreg')
const iconocerrarreg=document.getElementById('icono_cerrarreg')


iconocerrarreg.addEventListener('click',(e)=>{
    e.preventDefault();
	ventreg.classList.remove('activar');
	contventreg.classList.remove('activar');
})

const btnregistrar=document.getElementById('btnregistrarse')


btnregistrar.addEventListener('click',()=>{
    ventreg.classList.add('activar')
    contventreg.classList.add('activar')

})

const logoinicio=document.getElementById('logoinicio')

logoinicio.addEventListener('click',()=>{
    window.location.href='../php/primerapagina.php'
})