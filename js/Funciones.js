/**
 * funcion que carga el id del carro
 * desde las targetas a el modal de agregar alquiler
 * @param {type} idCarro
 * @return {undefined}
 */
function cargarIdcar(idCarro) {
    $("#modalAlquilar").dialog({
        autoOpen: true,
        open: function (event, ui) {
            $(".ui-dialog-titlebar").hide();
            $('.ui-widget-overlay').bind('click', function () {
                $("#modalAlquilar").dialog('close');


            });
        }
    }),
            document.getElementById("txtIdCarro").value = idCarro;


}



$(document).ready(function () {
    //ejeculta la lista de los carros
    listaCarros();

 $(document).on('click', '#aggCliente', function () {
      $("#modalAggCliente").dialog('open');
 
    })

    $("#modalAlquilar").dialog({
        autoOpen: false,
        width: 618,
        height: 450,
        resizable:false,
        show: "blind",
        hide: "explode",

        modal: true
    });

    $("#modalAggCliente").dialog({
        autoOpen: false,
        modal: true
     
    });
    
  

    /**
     * funcion que consulta un empleado 
     * para saber si existe o no existe
     */
    $("#txtIdentificacion").change(function () {
        var parametros = {
            "opcion": 3,
            "identificacion": $("#txtIdentificacion").val()
        };
        $.ajax({
            url: "../../controlador/ctrlEmpleado.php",
            data: parametros,
            type: 'post',
            success: function (response) {
                $("#mensaje").html(response);

            }
        });
    });

    /**
     * funcion que consulta si un cliente existe al
     *  poner la identificacion en el modal de alquilar vehiculo
     */
    $("#txtIdentificacionModal").change(function () {
//        alert("asddasd");
        var parametros = {
            "opcion": 2,
            "identificacion": $("#txtIdentificacionModal").val()
        };
        $.ajax({
            url: "../../controlador/ctrlAlquiler.php",
            data: parametros,
            type: 'post',
             dataType: 'JSON',
            success: function (JSON) {
                if (JSON.data===null){
                    alert("hola");
                }

            }
        });
    });


    /**
     * agregar el cliente por medio de json con el modal al hacer 
     * operaciones de incluir un alquiler
     * 
     */
//       $(document).on('click', '#btnAggClienteModal', function () {
//        $.ajax({
//            url: '../../controlador/ctrlAlquiler.php',
//            type: 'post',
//            dataType: 'JSON',
//            data:{opcion: '3'}, $('#formularioModalAlquilar').serialize(),
//            success: function (yeison) {
//                if (yeison.estado === null){
//                    alert("hola");
//                  
//                }else{
//                   alert("mal");
//                }
//            }
//        })
//    });



    /**
     * funcion que permite especificar el formato y tamaño para
     * subir una imagen
     */
    $("#foto").change(function () {

        var rutaArchivo = $("#foto").val();
        var extension = (rutaArchivo.substring(rutaArchivo.lastIndexOf("."))).toLowerCase();
        var sizeByte = this.files[0].size;
        var sizekiloByte = parseInt(sizeByte / 1024);
        if (extension !== ".jpg") {
            alert("la imagen solo debe ser tipo JPG.");
            $('#foto').val('');
            return false;
        }
        if (sizekiloByte > 2048) {
            alert("el archivo supera el tamaño permitido de 2 Megas");
            $('#foto').val('');
            return false;
        }
    });



});

/**
 * trae los elementos del controlador y los 
 * asigna a la vista en forma de lista de carros 
 * @return {undefined}
 */
function listaCarros() {
    $.ajax({
        url: '../../controlador/ctrlCarro.php',
        type: 'post',
        dataType: 'json',
        data: {opcion: '2'},
    })
            .done(function (json) {
//                console.log("success");
                $.each(json.datos, function (index, fila) {
                    $('#placa').html(fila.carPlaca);
                    $('#marca').html(fila.carMarca);
                    $('#color').html(fila.carColor);
                    $('#estado').html(fila.carEstado);
                    $('#foto').attr("src:", "../vista/fotosCarros/" + fila.carPlaca + '.jpg');
                    $('tbody').append($('#fila').clone(true));

                });
                $('tbody tr').first().hide();
            })
            .fail(function (json) {
                console.log(json.message);
            });

}


