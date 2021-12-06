<?php

    //$user = $this->d['user'];
    //$servicios = $this->d['servicios'];
    $servicio = $this->d['servicio'];
    
    require 'views/header.php';

?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Servicio</h4>
                        </div>
                        <div class="card-body">
                            <form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    require 'views/footer.php';
?>