<?php

class Dashboard extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();

    }

     function render(){


        $this->view->render('dashboard/index', ['user' => $this->user]);
    }
    
    
}

?>