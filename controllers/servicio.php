<?php

class Servicio extends SessionController{

    private $user;
    private $servicios;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        $this->servicios =  $this->model->getAll();
    }

     function render(){


        $this->view->render('servicio/index', ['user' => $this->user, 'servicios' => $this->servicios]);
    }
    
    
}

?>