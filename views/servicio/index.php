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
                    <table class="table table-hover table-striped">
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
                        <input type="text" class="form-control" style="color:black">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#nuevoservicio">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nuevoservicio" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
                                <input type="text" class="form-control" style="color:black">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" style="color:black">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control" style="color:black">
                    </div>
                    <div class="form-group">
                        <label>Colonia</label>
                        <input type="text" class="form-control" style="color:black">
                    </div>
                    <div class="form-group">
                        <label>Cruce</label>
                        <input type="text" class="form-control" style="color:black">
                    </div>
                    <div class="form-group">
                        <label>Problema</label>
                        <input type="text" class="form-control" style="color:black">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" style="color:black">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Hora</label>
                                <input type="text" class="form-control" style="color:black">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" >Aceptar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="verserviciomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="../editarServicio" method="POST">
                                <input type="hidden" name="id" value=<?php echo $servicio->getId()?>>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Cuenta</label>
                                            <input type="text" class="form-control" style="color:black" disabled value=<?php echo $servicio->getCuenta()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>Fecha de alta</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getFecha_alta()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getNombre()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getStatus()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Problema</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getProblema()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>fecha a realizar</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getFecha_realizar()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>hora</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getHora_realizar()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>capturo alta</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getCapturo_alta()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>costo</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getCosto()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>tecnico</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getTecnico()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>capturo baja</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getCapturo_baja()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>observacion del Problema</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getObservacion_problema()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>direccion</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getDireccion()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>colonia</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getColonia()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>entre calles</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getEntre_calles()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>observacion del servicio</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getObservacion_servicio()?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>status del recorrido</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getStatus_recorrido()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>seguimiento</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getSeguimiento()?>>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>folio</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getFolio()?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <div class="form-group">
                                            <label>reagendaciones</label>
                                            <input type="text" class="form-control" style="color:black" disabled="" value=<?php echo $servicio->getNo_reagendaciones()?>>
                                        </div>
                                    </div>
                                </div> 
                                <button type="submit" class="btn btn-info btn-fill pull-right">Editar</button>
                                <div class="clearfix"></div>
                            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#nuevoservicio">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
    

    
<?php
    require 'views/footer.php';
?>
<script src="assets/js/servicios.js"></script>