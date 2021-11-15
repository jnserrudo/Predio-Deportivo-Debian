const btnver=document.getElementById('ver')
const btnotra=document.getElementById('otra')

const fechaini=document.getElementById('fechaini')
const fechafin=document.getElementById('fechafin')

btnver.addEventListener('click',()=>{
    console.log(`fecha inicial es: ${fechaini.value} fecha final es: ${fechafin.value} `)


    const main=document.getElementById('main')
    var ctx = document.getElementById('myChart').getContext('2d')
    // const ctx=document.createElement('canvas')
    // main.append(ctx)
    var myChart = new Chart(ctx, {
        type: 'bar',
data: {
     labels: [],
    // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],

    datasets: [{
        label: 'Egresos',
        //  data: [],
        // data: [12, 19, 3, 5, 2],

        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
            
        ],
        borderWidth: 1
    }]
},
options: {
    scales: {
        y: {
            beginAtZero: true
        }
    }
}
});



const getDatagrafico = () => {
    console.log('hola')
    let xhr
    if (window.XMLHttpRequest) xhr = new XMLHttpRequest()
    else xhr = new ActiveXObject("Microsoft.XMLHTTP")
    let fi=fechaini.value
    let ff=fechafin.value
    console.log("fi"+fi+"ff"+ff)

        xhr.open('GET', `../php/consulta_informecompras.php?fi=${fi}&ff=${ff}`)

        xhr.addEventListener('load', (data) => {
            const dataJSON = JSON.parse(data.target.response)
            console.log(dataJSON)

            const fragment = document.createDocumentFragment()
            // console.log('hola')

            for (const venta of dataJSON) {
                console.log(typeof(parseInt(venta[1])))
            //    console.log(myChart.data['labels'])
            //     console.log(myChart.data['datasets'])
                myChart.data['labels'].push(venta[0])
                myChart.data['datasets'][0].data.push(parseInt(venta[1]))
                myChart.data['datasets'][0].backgroundColor.push('red')
                myChart.data['datasets'][0].borderColor.push('green')



                      
            }
        })
       xhr.send() 

window.moveTo(0,0);
window.resizeTo(screen.availWidth, screen.availHeight);
    }

    getDatagrafico()

    btnotra.classList.remove('otrafecha')

btnotra.classList.add('activar')
btnver.classList.add('otrafecha')
})

   
    // console.log(myChart.data)


    btnotra.addEventListener('click',()=>{
        window.location.href='../php/informe_ord_pago.php'
    })