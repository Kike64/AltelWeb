<?php

class Servicio extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();

        
    }

    function render(){
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
        $this->view->render('servicio/index', ['user' => $this->user, 'servicios' => $this->model->getByDay($fecha)]);
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


    function guardarServicioJSON(){

        if($this->existPOST(['servicio'])){
            
            $items = $this->getPost('servicio');
            $items['capturo_alta'] = $this->user->getUsername();
            $this->model->from($items);

            $this->model->save();

            echo json_encode($items, JSON_UNESCAPED_UNICODE);

        }else{
            echo 'error';
        }

    }

    function verServicioDiaJSON(){
        if($this->existPOST(['fecha'])){
            $fecha = $this->getPost('fecha');
            $servicios =  $this->model->getByDay($fecha);
            
            /*foreach($servicios  as $servicio){
                $item[
                    'id' => $servicio->getId(),
                    'cuenta' => $servicio->getCuenta(),
                    'fecha_alta' => $servicio->getFecha_alta(),
                    'nombre' => $servicio->getNombre(),
                    'status' => $serviciol->getStatus(),
                    'problema' => $servicio->getProblema(),
                    'fecha_realizar' => $servicio->getFecha_realizar(),
                    'hora_realizar' => $servicio->getHora_realizar(),
                    'capturo_alta' => $servicio->getCapturo_alta(),
                    'costo' => $servicio->getCosto(),
                    'tecnico' => $servicio->getTecnico(),
                    'capturo_baja' => $servicio->getCapturo_baja(),
                    'fecha_baja' => $servicio->getFecha_baja(),
                    'observacion_problema'  => $servicio->getObservacion_problema(),
                    'direccion' => $servicio->getDireccion(),
                    'colonia' => $servicio->getColonia(),
                    'entre_calles' => $servicio->getEntre_calles(),
                    'file' => $servicio->getFile(),
                    'observacion_servicio' => $servicio->getObservacion_servicio(),
                    'status_recorrido' => $servicio->getStatus_recorrido(),
                    'seguimiento' => $servicio->getSeguimiento(),
                    'folio' => $servicio->getFolio(),
                    'no_reagendaciones' => $servicio->getNo_reagendaciones()
                ]
            }*/

            //echo json_encode([$servicios[0]->getCuenta(),$servicios[1]->getCuenta(),$servicios[2]->getCuenta(),$servicios[0]->getFecha_realizar(),$servicios[1]->getFecha_realizar(),$servicios[2]->getFecha_realizar()], JSON_UNESCAPED_UNICODE);
            echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
    }

    function verServicioRecorridoJSON(){
        if($this->existPOST(['status_recorrido'])){
            $status = $this->getPost('status_recorrido');
            $servicios =  $this->model->getByRecorrido($status);
            
            echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
    }

    function verServicioPendientesJSON(){

        $servicios =  $this->model->getByPendientes();
            
        echo json_encode($servicios, JSON_UNESCAPED_UNICODE);

    }
    
    function actualizarServicioJSON(){

        if($this->existPOST(['servicio'])){
            
            $items = $this->getPost('servicio');
            $this->model->from($items);

            $this->model->update();

            echo json_encode($items, JSON_UNESCAPED_UNICODE);

        }else{
            echo 'error';
        }

    }

    function buscarServicioIndexJSON(){
        if($this->existPOST(['key'])){
            $key = $this->getPost('key');
            $servicios =  $this->model->getByIndex($key);
            
            echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
    }
}

?>