<?php

class Servicio extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();

        
    }

    function render(){

        $this->view->render('servicio/index', ['user' => $this->user, 'servicios' => $this->model->getAll()]);
    }
    
    function verServicio($params){
        $id = $params[0];
        $this->view->render('servicio/verServicio', ['user' => $this->user, 'servicio' => $this->model->get($id)]);
    }

    function verServicioJSON(){
        if($this->existPOST(['id'])){
            $id = $this->getPost('id');
            $this->model->get($id);
            $servicio=[
                'id' => $this->model->getId(),
                'cuenta' => $this->model->getCuenta(),
                'fecha_alta' => $this->model->getFecha_alta(),
                'nombre' => $this->model->getNombre(),
                'status' => $this->model->getStatus(),
                'problema' => $this->model->getProblema(),
                'fecha_realizar' => $this->model->getFecha_realizar(),
                'hora_realizar' => $this->model->getHora_realizar(),
                'capturo_alta' => $this->model->getCapturo_alta(),
                'costo' => $this->model->getCosto(),
                'tecnico' => $this->model->getTecnico(),
                'capturo_baja' => $this->model->getCapturo_baja(),
                'fecha_baja' => $this->model->getFecha_baja(),
                'observacion_problema'  => $this->model->getObservacion_problema(),
                'direccion' => $this->model->getDireccion(),
                'colonia' => $this->model->getColonia(),
                'entre_calles' => $this->model->getEntre_calles(),
                'file' => $this->model->getFile(),
                'observacion_servicio' => $this->model->getObservacion_servicio(),
                'status_recorrido' => $this->model->getStatus_recorrido(),
                'seguimiento' => $this->model->getSeguimiento(),
                'folio' => $this->model->getFolio(),
                'no_reagendaciones' => $this->model->getNo_reagendaciones()
            ];

            echo json_encode($servicio, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
    }

    function editarServicio(){

        if($this->existPOST(['id'])){
            $id = $this->getPost('id');

            $this->view->render('servicio/editarServicio', ['user' => $this->user, 'servicio' => $this->model->get($id)]);
        }
    }

    function guardarServicio(){

        if($this->existPOST(['id', 'cuenta', 'fecha_alta', 'nombre', 'status', 'problema', 'fecha_realizar', 'hora_realizar', 'capturo_alta', 'costo', 'tecnico', 'capturo_baja', 'observacion_problema', 'direccion', 'colonia', 'entre_calles', 'observacion_servicio', 'status_recorrido', 'seguimiento', 'folio', 'no_reagendaciones'])){
            $id = $this->getPost('id');
            $cuenta = $this->getPost('cuenta');
            $fecha_alta = $this->getPost('fecha_alta');
            $nombre = $this->getPost('nombre');
            $status = $this->getPost('status');
            $problema = $this->getPost('problema');
            $fecha_realizar = $this->getPost('fecha_realizar');
            $hora_realizar = $this->getPost('hora_realizar');
            $capturo_alta = $this->getPost('capturo_alta');
            $costo = $this->getPost('costo');
            $tecnico = $this->getPost('tecnico');
            $capturo_baja = $this->getPost('capturo_baja');
            $observacion_problema = $this->getPost('observacion_problema');
            $direccion = $this->getPost('direccion');
            $colonia = $this->getPost('colonia');
            $entre_calles = $this->getPost('entre_calles');
            $observacion_servicio = $this->getPost('observacion_servicio');
            $status_recorrido = $this->getPost('status_recorrido');
            $seguimiento = $this->getPost('seguimiento');
            $folio = $this->getPost('folio');
            $no_reagendaciones = $this->getPost('no_reagendaciones');

            $this->model->setId($id);
            $this->model->setCuenta($cuenta);
            $this->model->setFecha_alta($fecha_alta);
            $this->model->setNombre($nombre);
            $this->model->setStatus($status);
            $this->model->setProblema($problema);
            $this->model->setFecha_realizar($fecha_realizar);
            $this->model->setHora_realizar($hora_realizar);
            $this->model->setCapturo_alta($capturo_alta);
            $this->model->setObservacion_problema($observacion_problema);
            $this->model->setDireccion($direccion);
            $this->model->setColonia($colonia);
            $this->model->setEntre_calles($entre_calles);
            $this->model->setObservacion_servicio($observacion_servicio);
            $this->model->setStatus_recorrido($status_recorrido);
            $this->model->setSeguimiento($seguimiento);
            $this->model->setFolio($folio);
            $this->model->setNo_reagendaciones($no_reagendaciones);

            $this->model->update();

            $this->redirect('servicio/verServicio/'.$id);
            
        }

    }
    
}

?>