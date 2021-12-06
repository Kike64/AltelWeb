<?php

    $user = $this->d['user'];
    $servicios = $this->d['servicios'];
    
    require 'views/header.php';

?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                    echo        "<td>".$servicio->getStatus_recorrido()."</td>";
                                    echo        "<td>".$servicio->getFecha_realizar()."</td>";
                                    echo        "<td><a href=".constant('URL')."servicio/verServicio/".$servicio->getID().">ver</a></td>";
                                    echo    "</tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require 'views/footer.php';
?>