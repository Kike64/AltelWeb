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
    
    function verServicio($params)
    {
        $id = $params[0];
        $this->view->render('servicio/verServicio', ['user' => $this->user, 'servicio' => $this->model->get($id)]);
    }
    
}

?>