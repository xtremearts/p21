<?php

class Torcedores extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Torcedores_model");
        
    }
    
    function index(){
        $this->load->view('torcedores/cadastrar');
    }
    

    
    
}