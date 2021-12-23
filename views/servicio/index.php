<?php

    $user = $this->d['user'];
    $servicios = $this->d['servicios'];
    
    require 'views/header.php';

?>



    <div class="content">                             
        <div class="container-fluid">
            
            <div class="row justify-content-end">
                <button type="button" class="btn btn-info" style="margin:15px" data-toggle="modal" data-target="#cuentaservicio">
                    Nuevo Servicio
                </button> 
            </div>
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Servicios</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped" id="tabla_servicios">
                        <thead>
                            <th>Cuenta</th>
                            <th>Nombre</th>
                            <th>Problema</th>
                            <th>Direccion</th>
                            <th>Colonia</th>
                            <th>Status Recorrido</th>
                            <th>Fecha Realizar</th>
                        </thead>
                        <tbody>

                        <?php
                            foreach($servicios as $servicio){
                            echo    "<tr>";
                            echo        "<td >".$servicio->getCuenta()."</td>";
                            echo        "<td>".$servicio->getNombre()."</td>";
                            echo        "<td>".$servicio->getProblema()."</td>";
                            echo        "<td>".$servicio->getDireccion()."</td>";
                            echo        "<td>".$servicio->getColonia()."</td>";
                            echo        "<td>".$servicio->getStatus_recorrido()."</td>";                           
                            echo        "<td>".$servicio->getFecha_realizar()."</td>";
                            echo        "<td><button type=button  style=margin-top:5px class='btn btn-info btn-sm verservicio' servicio_id=".$servicio->getId()." data-toggle=modal data-target=#verserviciomodal>ver</button></td>";
                            echo    "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cuentaservicio" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label>Cuenta</label>
                        <input type="text" class="form-control cuentaservicioinput" style="color:black" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary buscarcuenta" >ACEPTAR</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nuevoservicio" tabindex="-1"  role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Cuenta</label>
                                <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_cuenta" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_nombre" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_direccion" style="color:black" disabled>
                    </div>
                    <div class="form-group">
                        <label>Colonia</label>
                        <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_colonia" style="color:black" disabled>
                    </div>
                    <div class="form-group">
                        <label>Cruce</label>
                        <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_cruce" style="color:black" disabled>
                    </div>
                    <div class="form-group">
                        <label>Problema</label>
                        <input type="text" class="form-control nuevoservicioinput" id="nuevoservicioinput_problema" style="color:black">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control nuevoservicioinput" id="nuevoservicioinput_fecha" style="color:black">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Hora</label>
                                <input type="time" class="form-control nuevoservicioinput" id="nuevoservicioinput_hora" style="color:black">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary" id="guardarservicio">ACEPTAR</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="verserviciomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id" id="id" >
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Cuenta</label>
                                <input type="text" id="cuenta" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Fecha de alta</label>
                                <input type="text" id="fecha_alta" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" id="nombre" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" id="status" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Problema</label>
                                <input type="text" id="problema" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>fecha a realizar</label>
                                <input type="text" id="fecha_realizar" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>hora</label>
                                <input type="text" id="hora" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>capturo alta</label>
                                <input type="text" id="capturo_alta" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>costo</label>
                                <input type="text" id="costo" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>tecnico</label>
                                <input type="text" id="tecnico" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>capturo baja</label>
                                <input type="text" id="capturo_baja" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>observacion del Problema</label>
                                <input type="text" id="observacion_problema" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>direccion</label>
                                <input type="text" id="direccion" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>colonia</label>
                                <input type="text" id="colonia" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>entre calles</label>
                                <input type="text" id="entre_calles" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>observacion del servicio</label>
                                <input type="text" id="observacion_servicio" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>status del recorrido</label>
                                <input type="text" id="status_recorrido" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>seguimiento</label>
                                <input type="text" id="seguimiento" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>folio</label>
                                <input type="text" id="folio" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-2 px-1">
                            <div class="form-group">
                                <label>reagendaciones</label>
                                <input type="text" id="reagendaciones" class="form-control verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger cerrar" data-dismiss="modal" >CERRAR</button>
                <button type="button" class="btn btn-primary editarservicio" >EDITAR</button>
            </div>
            </div>
        </div>
    </div>
    

    
<?php
    require 'views/footer.php';
?>
<script src="assets/js/servicios.js"></script>