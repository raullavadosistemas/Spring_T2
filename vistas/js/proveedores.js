var tabla;

var tabla_en_compras;

//Función que se ejecuta al inicio
function init() {

    listar();

    //llama la lista de proveedores en ventana modal en compras.php
    listar_en_compras();

    //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
    $("#proveedor_form").on("submit", function(e) {

        guardaryeditar(e);
    })

    //cambia el titulo de la ventana modal cuando se da click al boton
    $("#add_button").click(function() {

        $(".modal-title").text("Agregar Proveedor");

    });


}


//Función limpiar
/*IMPORTANTE: no limpiar el campo oculto del id_usuario, sino no se registra
la categoria*/
function limpiar() {

    $('#dni').val("");
    $('#razon_social').val("");
    $('#telefono').val("");
    $('#correo').val("");
    $('#direccion').val("");
    $('#datepicker').val("");
    $('#estado').val("");
    $('#dni_proveedor').val("");
}


//Función Listar
function listar() {
    tabla = $('#proveedor_data').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/proveedor.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10, //Por cada 10 registros hace una paginación
        "order": [
            [0, "desc"]
        ], //Ordenar (columna,orden)

        "language": {

            "sProcessing": "Procesando...",

            "sLengthMenu": "Mostrar _MENU_ registros",

            "sZeroRecords": "No se encontraron resultados",

            "sEmptyTable": "Ningún dato disponible en esta tabla",

            "sInfo": "Mostrando un total de _TOTAL_ registros",

            "sInfoEmpty": "Mostrando un total de 0 registros",

            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

            "sInfoPostFix": "",

            "sSearch": "Buscar:",

            "sUrl": "",

            "sInfoThousands": ",",

            "sLoadingRecords": "Cargando...",

            "oPaginate": {

                "sFirst": "Primero",

                "sLast": "Último",

                "sNext": "Siguiente",

                "sPrevious": "Anterior"

            },

            "oAria": {

                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

                "sSortDescending": ": Activar para ordenar la columna de manera descendente"

            }

        } //cerrando language

    }).DataTable();
}


//Mostrar datos del proveedor en la ventana modal 
function mostrar(dni_proveedor) {
    $.post("../ajax/proveedor.php?op=mostrar", { dni_proveedor: dni_proveedor }, function(data, status) {
        data = JSON.parse(data);

        //alert(data.dni);

        console.log(data);

        $('#proveedorModal').modal('show');
        $('#dni').val(dni_proveedor);
        $('#razon_social').val(data.proveedor);
        $('#telefono').val(data.telefono);
        $('#correo').val(data.correo);
        $('#direccion').val(data.direccion);
        $('#datepicker').val(data.fecha);
        $('#estado').val(data.estado);
        $('.modal-title').text("Editar Proveedor");
        $('#dni_proveedor').val(dni_proveedor);


    });


}


//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#proveedor_form")[0]);


    $.ajax({
        url: "../ajax/proveedor.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            /*bootbox.alert(datos);	          
            mostrarform(false);
            tabla.ajax.reload();*/

            //alert(datos);

            /*imprimir consulta en la consola debes hacer un print_r($_POST) al final del metodo 
               y si se muestran los valores es que esta bien, y se puede imprimir la consulta desde el metodo
               y se puede ver en la consola o desde el mensaje de alerta luego pegar la consulta en phpmyadmin*/
            console.log(datos);

            $('#proveedor_form')[0].reset();
            $('#proveedorModal').modal('hide');

            $('#resultados_ajax').html(datos);
            $('#proveedor_data').DataTable().ajax.reload();

            limpiar();

        }

    });

}

//EDITAR ESTADO DEL PROVEEDOR
//importante:id_proveedor, est se envia por post via ajax


function cambiarEstado(id_proveedor, est) {


    bootbox.confirm("¿Está Seguro de cambiar de estado?", function(result) {
        if (result) {


            $.ajax({
                url: "../ajax/proveedor.php?op=activarydesactivar",
                method: "POST",
                //data:dataString,
                //toma el valor del id y del estado
                data: { id_proveedor: id_proveedor, est: est },
                //cache: false,
                //dataType:"html",
                success: function(data) {

                    $('#proveedor_data').DataTable().ajax.reload();

                }

            });

        }

    }); //bootbox



}


//Función Listar
function listar_en_compras() {

    tabla_en_compras = $('#lista_proveedores_data').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/proveedor.php?op=listar_en_compras',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10, //Por cada 10 registros hace una paginación
        "order": [
            [0, "desc"]
        ], //Ordenar (columna,orden)

        "language": {

            "sProcessing": "Procesando...",

            "sLengthMenu": "Mostrar _MENU_ registros",

            "sZeroRecords": "No se encontraron resultados",

            "sEmptyTable": "Ningún dato disponible en esta tabla",

            "sInfo": "Mostrando un total de _TOTAL_ registros",

            "sInfoEmpty": "Mostrando un total de 0 registros",

            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

            "sInfoPostFix": "",

            "sSearch": "Buscar:",

            "sUrl": "",

            "sInfoThousands": ",",

            "sLoadingRecords": "Cargando...",

            "oPaginate": {

                "sFirst": "Primero",

                "sLast": "Último",

                "sNext": "Siguiente",

                "sPrevious": "Anterior"

            },

            "oAria": {

                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

                "sSortDescending": ": Activar para ordenar la columna de manera descendente"

            }

        } //cerrando language

    }).DataTable();
}


//AUTOCOMPLETAR DATOS DEL PROVEEDOR EN COMPRAS


function agregar_registro(id_proveedor, est) {


    $.ajax({
        url: "../ajax/proveedor.php?op=buscar_proveedor",
        method: "POST",
        data: { id_proveedor: id_proveedor, est: est },
        dataType: "json",
        success: function(data) {


            /*si el proveedor esta activo entonces se ejecuta, de lo contrario 
            el formulario no se envia y aparecerá un mensaje */
            if (data.estado) {

                $('#modalProveedor').modal('hide');
                $('#dni').val(data.dni);
                $('#razon_social').val(data.razon_social);
                $('#direccion').val(data.direccion);
                $('#datepicker').val(data.fecha);
                $('#id_proveedor').val(id_proveedor);


            } else {

                bootbox.alert(data.error);



            } //cierre condicional error



        }
    })

}



init();