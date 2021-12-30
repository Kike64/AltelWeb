<?php

    $user = $this->d['user'];
    $servicios = $this->d['servicios'];
    
    require 'views/header.php';

?>



    <div class="content">
                                
        <div class="container-fluid"> 
            <div class="container">
                <div class="row" style="margin-bottom:15px">
                    <div class="col">
                        <div class="row">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary btn-fill" id="servicios_ayer">Ayer</button>
                                <button type="button" class="btn btn-secondary btn-fill" id="servicios_hoy">Hoy</button>
                                <button type="button" class="btn btn-secondary btn-fill" id="servicios_manana">Mañana</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary btn-fill" id="servicios_bajas">Bajas</button>
                                <button type="button" class="btn btn-primary btn-fill" id="servicios_hechos">Hechos</button>
                                <button type="button" class="btn btn-primary btn-fill" id="servicios_pendientes">Pendientes</button>
                                <button type="button" class="btn btn-primary btn-fill" id="servicios_tecnicos">Tecnicos</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-end">
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#cuentaservicio">
                                Nuevo Servicio
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" id="button_buscar"><i class="nc-icon heavy nc-zoom-split"></i></button>
                        <input type="text" class="form-control" placeholder="" id="input_buscar" >
                    </div> 
                </div>
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
                            $tr_class = "";
                            $st_text = "";
                            if($servicio->getStatus_recorrido() == 1){
                                $tr_class = "amarillo";
                                $st_text = "En Proceso";
                            }
                            if($servicio->getStatus_recorrido() == 2){
                                $tr_class = "rojo";
                                $st_text = "Listo Para Baja";
                            }
                            if($servicio->getStatus_recorrido() == 3){
                                $tr_class = "verde";
                                $st_text = "Baja";
                            }
                            echo    "<tr class=".$tr_class.">";
                            echo        "<td>".$servicio->getCuenta()."</td>";
                            echo        "<td>".$servicio->getNombre()."</td>";
                            echo        "<td>".$servicio->getProblema()."</td>";
                            echo        "<td>".$servicio->getDireccion()."</td>";
                            echo        "<td>".$servicio->getColonia()."</td>";
                            echo        "<td>".$st_text."</td>";                           
                            echo        "<td>".$servicio->getFecha_realizar()."</td>";
                            echo        "<td><button type=button  class='btn btn-dark btn-sm verservicio' servicio_id=".$servicio->getId()." data-toggle=modal data-target=#verserviciomodal>ver</button></td>";
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
                                <label class="label-s">Cuenta</label>
                                <input type="text" id="cuenta" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label class="label-s">Fecha de alta</label>
                                <input type="text" id="fecha_alta" class="form-control form-control-sm  verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label class="label-s">Nombre</label>
                                <input type="text" id="nombre" class="form-control form-control-sm  verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label class="label-s">Status</label>
                                <input type="text" id="status" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label class="label-s">status del recorrido</label>
                                <select id="status_recorrido" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                                    <option value="0"></option>
                                    <option value="1">En proceso</option>
                                    <option value="2">Listo para dar de baja</option>
                                    <option value="3">Baja</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label-s">Problema</label>
                                <input type="text" id="problema" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label class="label-s">fecha a realizar</label>
                                <input type="text" id="fecha_realizar" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label class="label-s">hora</label>
                                <input type="text" id="hora" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label class="label-s">capturo alta</label>
                                <input type="text" id="capturo_alta" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label class="label-s">costo</label>
                                <input type="text" id="costo" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label class="label-s">tecnico</label>
                                <input type="text" id="tecnico" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label class="label-s">capturo baja</label>
                                <input type="text" id="capturo_baja" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label-s">observacion del Problema</label>
                                <input type="text" id="observacion_problema" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label class="label-s">direccion</label>
                                <input type="text" id="direccion" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label class="label-s">colonia</label>
                                <input type="text" id="colonia" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label-s">entre calles</label>
                                <input type="text" id="entre_calles" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label-s">observacion del servicio</label>
                                <input type="text" id="observacion_servicio" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label class="label-s">Fecha de baja</label>
                                <input type="text" id="fecha_baja" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label class="label-s">seguimiento</label>
                                <input type="text" id="seguimiento" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label class="label-s">folio</label>
                                <input type="text" id="folio" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                        <div class="col-md-2 px-1">
                            <div class="form-group">
                                <label class="label-s">reagendaciones</label>
                                <input type="text" id="reagendaciones" class="form-control form-control-sm verservicioinput" style="color:black" disabled>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger cerrar" data-dismiss="modal" >CERRAR</button>
                <button type="button" class="btn btn-primary editarservicio" >EDITAR</button>
                <button type="button" class="btn btn-success" id="info_guardar" >GUARDAR</button>
            </div>
            </div>
        </div>
    </div>
    

    
<?php
    require 'views/footer.php';
?>
<script src="assets/js/servicios.js"></script>