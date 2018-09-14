
generarGrafico();
function generarGrafico() {


    //parametros necesarios para crear graficos utilizando la api de google  
    google.charts.load('current', {'packages': ['corechart', 'bar']});
    //se hace la funcion que crea el grafico y lo muestra
    google.charts.setOnLoadCallback(graficar);

    function graficar() {
        var datos = $.ajax({
            url: '../../controlador/ctrlGraficas.php',
            dataType: 'json',
            data: {opcion: '1'},
            async: false
        }).responseText;
        datos = JSON.parse(datos);



        var data = google.visualization.arrayToDataTable(datos);
//configuracion de opciones de grafico
        var options = {
            title: "cantidad de carros alquilados por mes ",
            hAxis: {title: 'Meses', titletextstyle: {color: 'red'}},
            vAxis: {title: 'Cantidad', titletextstyle: {color: 'red'}},
            legend: 'bottom'
        };

        //validar tipo de grafica

        if (document.getElementById('tipoGrafico').value === '1') {
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        } else {
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        }

        chart.draw(data, options);
    };
}


