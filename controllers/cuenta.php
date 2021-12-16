<?php

class Cuenta extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();

        
    }

    function render(){

        $this->view->render('cuenta/index', ['user' => $this->user, 'cuentas' => $this->model->getAll()]);
    }

    function verCuentaJSON(){
        if($this->existPOST(['cuenta'])){
            $cuentaPOST = $this->getPost('cuenta');
            $this->model->getByCuenta($cuentaPOST);
            $cuenta=[
                'id' => $this->model->getId(),
                'no_cuenta' => $this->model->getNo_cuenta(),
                'fecha_alta' => $this->model->getFecha_alta(),
                'fecha_baja' => $this->model->getFecha_baja(),
                'nombre' => $this->model->getNombre(),
                'direccion' => $this->model->getDireccion(),
                'colonia' => $this->model->getColonia(),
                'cruces' => $this->model->getCruces(),
                'lugar_cobro' => $this->model->getLugar_cobro(),
                'notas' => $this->model->getNotas(),
                'maps' => $this->model->getMaps(),
                'email_1' => $this->model->getEmail_1(),
                'email_2' => $this->model->getEmail_2()
            ];

            echo json_encode($cuenta, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
    }

}