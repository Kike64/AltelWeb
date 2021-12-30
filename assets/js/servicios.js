
$(document).ready(function(){

    $('#servicios_hoy').click(function(e){

        e.preventDefault();

        var date = new Date();
        var anio = date.getFullYear();
        var mes = date.getMonth() + 1;
        var dia = date.getDate();
        var hoy = anio+"-"+mes+'-'+dia;
        consultarTablaPorDia(hoy);

    });

    $('#servicios_ayer').click(function(e){

        e.preventDefault();

        var date = new Date();
        var ayer = new Date(date.getTime() - 24*60*60*1000);
        var anio = ayer.getFullYear();
        var mes = ayer.getMonth() + 1;
        var dia = ayer.getDate();
        var fecha = anio+"-"+mes+'-'+dia;
        consultarTablaPorDia(fecha);

    });

    $('#servicios_manana').click(function(e){

        e.preventDefault();

        var date = new Date();
        var manana = new Date(date.getTime() + 24*60*60*1000);
        var anio = manana.getFullYear();
        var mes = manana.getMonth() + 1;
        var dia = manana.getDate();
        var fecha = anio+"-"+mes+'-'+dia;
        consultarTablaPorDia(fecha);

    });

    $('#servicios_tecnicos').click(function(e){

        e.preventDefault();
        consultarTablaPorRecorrido(1);

    });

    $('#servicios_bajas').click(function(e){

        e.preventDefault();
        consultarTablaPorRecorrido(3);

    });

    $('#servicios_hechos').click(function(e){

        e.preventDefault();
        consultarTablaPorRecorrido(2);

    });

    $('#servicios_pendientes').click(function(e){

        e.preventDefault();
        consultarTablaPorPendientes();

    });


    $('.verservicio').click(function(e){

        e.preventDefault();
        var id = $(this).attr('servicio_id');
        getServicioInfo(id);
        
    });

    $('.buscarcuenta').click(function(e){

        e.preventDefault();
        var cuenta = $('.cuentaservicioinput').val();
            
        if(cuenta){cargarCuenta(cuenta);}

        
    });

    $('#guardarservicio').click(function(e){

        e.preventDefault();
        
        servicio = {
            "id":"",
            "cuenta" : $('#nuevoservicioinput_cuenta').val(),
            "fecha_alta" : "",
            "nombre" : $('#nuevoservicioinput_nombre').val(),
            "status" : "",
            "problema" : $('#nuevoservicioinput_problema').val(),
            "fecha_realizar" : $('#nuevoservicioinput_fecha').val(),
            "hora_realizar" : $('#nuevoservicioinput_hora').val(),
            "capturo_alta" : "",
            "costo" : "",
            "tecnico" : "",
            "capturo_baja" : "",
            "fecha_baja" : "",
            "observacion_problema" : "",
            "direccion" : $('#nuevoservicioinput_direccion').val(),
            "colonia" : $('#nuevoservicioinput_colonia').val(),
            "entre_calles" : $('#nuevoservicioinput_cruce').val(),
            "file" : "",
            "observacion_servicio" : "",
            "status_recorrido" : "",
            "seguimiento" : "",
            "folio" : "",
            "no_reagendaciones" : "",
        };
        
        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/servicio/guardarServicioJSON",
            data: {servicio:servicio},
            async: true,
            success: function (response) {
                
                if(response != 'error'){
                    console.log(response);
                    var servicio = JSON.parse(response);
                    console.log(servicio);

                }

            },
            error: function(error){
                console.log(error);
            }
        });

    });


    $("#cuentaservicio").keypress(function(e) {
        
        if(e.which == 13) {
        
        var cuenta = $('.cuentaservicioinput').val();

        if (cuenta){
            cargarCuenta(cuenta);
            e.preventDefault();
        }
        

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


    function cargarCuenta(cuenta){

        $('#nuevoservicio').modal('show');
        $('#cuentaservicio').modal('hide');

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
    }

    function limpiarVerServicio(){
        $('#id').val("");
        $('#cuenta').val("");
        $('#fecha_alta').val("");
        $('#nombre').val("");
        $('#status').val("");
        $('#problema').val("");
        $('#fecha_realizar').val("");
        $('#hora').val("");
        $('#capturo_alta').val("");
        $('#costo').val("");
        $('#tecnico').val("");
        $('#capturo_baja').val("");
        $('#observacion_problema').val("");
        $('#direccion').val("");
        $('#colonia').val("");
        $('#entre_calles').val("");
        $('#observacion_servicio').val("");
        $('#status_recorrido').val("");
        $('#seguimiento').val("");
        $('#folio').val("");
        $('#reagendaciones').val("");
    }

    function consultarTablaPorDia(fecha){        

        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/servicio/verServicioDiaJSON",
            data: {fecha:fecha},
            async: true,
            success: function (response) {
                
                if(response != 'error'){
                    console.log(response);
                    var servicio = JSON.parse(response);
                    console.log(servicio);
                    crearTabla(servicio);

                }

            },
            error: function(error){
                console.log(error);
            }
        });
    }


    function consultarTablaPorRecorrido(status){       

        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/servicio/verServicioRecorridoJSON",
            data: {status_recorrido:status},
            async: true,
            success: function (response) {
                
                if(response != 'error'){
                    console.log(response);
                    var servicio = JSON.parse(response);
                    console.log(servicio);
                    crearTabla(servicio);

                }

            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function consultarTablaPorPendientes(){       

        $.ajax({
            type: "POST",
            url: "http://localhost/SistemaAltelWeb/servicio/verServicioPendientesJSON",
            async: true,
            success: function (response) {
                
                if(response != 'error'){
                    console.log(response);
                    var servicio = JSON.parse(response);
                    console.log(servicio);
                    crearTabla(servicio);

                }

            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function crearTabla(datos){

        $('#tabla_servicios tbody').empty();

        datos.forEach(element => {

            var tr_class = "";
            var st_text = "";
            if(element.status_recorrido == 1){
                tr_class = "amarillo";
                st_text = "En Proceso";
            }
            if(element.status_recorrido == 2){
                tr_class = "rojo";
                st_text = "Listo Para Baja";
            }
            if(element.status_recorrido == 3){
                tr_class = "verde";
                st_text = "Baja";
            }

            var tr = "<tr class="+tr_class+">\n\
                            <td>"+element.cuenta+"</td>\n\
                            <td>"+element.nombre+"</td>\n\
                            <td>"+element.problema+"</td>\n\
                            <td>"+element.direccion+"</td>\n\
                            <td>"+element.colonia+"</td>\n\
                            <td>"+st_text+"</td>\n\
                            <td>"+element.fecha_realizar+"</td>\n\
                            <td><button type='button'  class='btn btn-dark btn-sm verservicio' servicio_id="+element.id+" data-toggle='modal' data-target='#verserviciomodal'>ver</button></td>\n\
                        </tr>";

            $('#tabla_servicios tbody').append(tr);
        });

        $('.verservicio').click( function(e){           
            e.preventDefault();
            var id = $(this).attr('servicio_id');
            getServicioInfo(id);
        });
        

    }
    
    function getServicioInfo(id){

        limpiarVerServicio();

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
    }

});