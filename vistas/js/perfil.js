//una vez se da click a submit se llama a la funcion editar_perfil(e)

$("#perfil_form").on("submit", function(e) {
    editar_perfil(e);
});


//MOSTRAR PERFIL DE USUARIO
function mostrar_perfil(id_usuario_perfil) {
    $.post("../ajax/perfil.php?op=mostrar_perfil", { id_usuario_perfil: id_usuario_perfil }, function(data, status) {
        data = JSON.parse(data);

        //alert(data.dni);

        //console.log(data.dni);

        $('#perfilModal').modal('show');
        $('#dni_perfil').val(data.dni);
        $('#nombre_perfil').val(data.nombre);
        $('#apellido_perfil').val(data.apellido);
        //$('#cargo').val(data.cargo);
        $('#usuario_perfil').val(data.usuario_perfil);
        $('#password_perfil').val(data.password);
        $('#password2_perfil').val(data.password2);
        $('#telefono_perfil').val(data.telefono);
        $('#correo_perfil').val(data.correo);
        $('#direccion_perfil').val(data.direccion);
        //$('#estado').val(data.estado);
        $('.modal-title').text("Editar Usuario");
        $('#id_usuario_perfil').val(id_usuario_perfil);
        $('#action').val("Edit");
        $('#operation').val("Edit");


    });

}



//EDITAR PERFIL

//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function editar_perfil(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    //$("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#perfil_form")[0]);


    var password = $("#password_perfil").val();
    var password2 = $("#password2_perfil").val();

    //var id_usuario= $("#usuario_perfil_id").val();

    //alert(id_usuario);

    if (password == password2) {

        $.ajax({
            url: "../ajax/perfil.php?op=editar_perfil",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos) {
                /*bootbox.alert(datos);	          
                mostrarform(false);
                tabla.ajax.reload();*/

                //alert(datos);

                console.log(datos);

                //$('#perfil_form')[0].reset();
                $('#perfilModal').modal('hide');

                $('#resultados_ajax').html(datos);
                //$('#usuario_data').DataTable().ajax.reload();



            }

        });

    } //cierre del condicional


}