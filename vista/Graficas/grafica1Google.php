<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    generarGrafico();
    function generarGrafico() {
    

      //parametros necesarios para crear graficos utilizando la api de google  
      google.charts.load('current', {'packages':['corechart', 'bar']});
      //se hace la funcion que crea el grafico y lo muestra
      google.charts.setOnLoadCallback(graficar);

      function graficar() {


        var data = google.visualization.arrayToDataTable([
          ['meses', 'computadores'],
          ['enero', 80],
          ['febrero',180],
          ['marzo',35]
 
        
        ]);
//configuracion de opciones de grafico
        var options = {
            title: "relación de ventas de computadores de primer trimestre",
            hAxis:{title:'meses',titletextstyle:{color:'red'}},
            vAxis:{title:'cantidad',titletextstyle:{color:'red'}},
            legend: {position:'bottom', textstyle:{color:'red',size:13}}
        };
        
    //validar tipo de grafica
    
    if (document.getElementById('tipoGrafico').value==='1') {
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    }else{
         var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    }
    
        chart.draw(data,options);
    };
    }
    

       </script>
  </head>
  <body>
   
  <center>
    <h2>graficas api google</h2>
      <div id="chart_div" style="width:60%; height: 85%;"> </div>
      <br>Seleccione tipo de grafica:
      <select id="tipoGrafico" onchange="">
        <option value="1">Tipo columna</option>
        <option value="2">Tipo circular</option>
      </select>
</center>
  </body>
</html>
