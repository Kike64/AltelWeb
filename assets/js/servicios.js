
$(document).ready(function(){


    $('.verservicio').click(function(e){

        e.preventDefault();
        var id = $(this).attr('servicio_id');

        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/servicio/verServicioJSON",
            data: {id:id},
            async: true,
            success: function (response) {

                if(response != 'error'){

                    var servicio = JSON.parse(response);
                    console.log(servicio);

                    $('#id').val(servicio.id);
                    $('#cuenta').val(servicio.cuenta);
                    $('#fecha_alta').val(servicio.fecha_alta);
                    $('#nombre').val(servicio.nombre);
                    $('#status').val(servicio.status);
                    $('#problema').val(servicio.problema);
                    $('#fecha_realizar').val(servicio.fecha_realizar);
                    $('#hora').val(servicio.hora_realizar);
                    $('#capturo_alta').val(servicio.capturo_alta);
                    $('#costo').val(servicio.costo);
                    $('#tecnico').val(servicio.tecnico);
                    $('#capturo_baja').val(servicio.capturo_baja);
                    $('#observacion_problema').val(servicio.observacion_problema);
                    $('#direccion').val(servicio.direccion);
                    $('#colonia').val(servicio.colonia);
                    $('#entre_calles').val(servicio.entre_calles);
                    $('#observacion_servicio').val(servicio.observacion_servicio);
                    $('#status_recorrido').val(servicio.status_recorrido);
                    $('#seguimiento').val(servicio.seguimiento);
                    $('#folio').val(servicio.folio);
                    $('#reagendaciones').val(servicio.no_reagendaciones);

                }

            },
            error: function(error){
                console.log(error);
            }
        });

        
    });

    $('.buscarcuenta').click(function(e){

        e.preventDefault();
        var cuenta = $('.cuentaservicioinput').val();

        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/cuenta/verCuentaJSON",
            data: {cuenta:cuenta},
            async: true,
            
            success: function (response) {
                if(response != 'error'){

                    var cuenta = JSON.parse(response);
                    console.log(cuenta);

                    $('#nuevoservicioinput_cuenta').val(cuenta.no_cuenta);
                    $('#nuevoservicioinput_nombre').val(cuenta.nombre);
                    $('#nuevoservicioinput_direccion').val(cuenta.direccion);
                    $('#nuevoservicioinput_colonia').val(cuenta.colonia);
                    $('#nuevoservicioinput_cruce').val(cuenta.cruces);

                }

            },
            error: function(error){
                console.log(error);
            }
        });

        
    });



    $("#cuentaservicio").keypress(function(e) {
        
        if(e.which == 13) {

        $('#nuevoservicio').modal('show');
        e.preventDefault();

        }
        
    });


    $('.editarservicio').click(function(e){
        e.preventDefault();
        $('.verservicioinput').removeAttr('disabled');
    });


    $('#verserviciomodal').on('hidden.bs.modal', function () {
        $(".verservicioinput").attr('disabled','true');
    })

    $('#cuentaservicio').on('hidden.bs.modal', function () {
        $(".cuentaservicioinput").val('');
    })

    $('#nuevoservicio').on('hidden.bs.modal', function () {
        $(".nuevoservicioinput").val('');
    })


    function cargarCuenta(){
        
    }

});