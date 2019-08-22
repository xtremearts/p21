<?php

class CidadesEBairros extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CidadesEBairros_model');
    }
  
    function gerarJsonCidadesEBairros()
    {
        $id_cidade = $this->uri->segment(3);
        $exibirCidades = $this->CidadesEBairros_model->gerarJsonCidadesEBairros($id_cidade);
        return print json_encode($exibirCidades);
    }
    

    
    function listarCadastroUf(){
       
        $this->load->view('uf/cadastrar');
        
    }
    
    function cadastrarUF(){
        $data = array(
            "UF" => $this->input->post("uf"),

        );
        $this->CidadesEBairros_model->cadastrarUF($data);
        redirect('cidadesEBairros/listarCadastroUf');
    }
    
    
    function listarCadastroCidade(){
        
        $exibirUf = $this->CidadesEBairros_model->exibirUf();
        $this->data['uf'] = $exibirUf;
        
        $this->load->view('cidade/cadastrar', $this->data);
        
    }
    
    function cadastrarCidade(){
        $data = array(
            "ID_UF" => $this->input->post("id_uf"),
            "CIDADE" => $this->input->post("cidade"),
            
        );
        $this->CidadesEBairros_model->cadastrarCidade($data);
        redirect('cidadesEBairros/listarCadastroCidade');
    }
    

    
    function listarCadastroBairro(){
        $exibirCidades = $this->CidadesEBairros_model->exibirCidades();
        $this->data['cidades'] = $exibirCidades;
        $this->load->view('bairro/cadastrar', $this-> data);
    }
    
    function cadastrarBairro(){
        $data = array(
            "ID_CIDADE" => $this->input->post("id_cidade"),
            "BAIRRO" => $this->input->post("bairro"),
            
        );
        $this->CidadesEBairros_model->cadastrarBairro($data);
        redirect('cidadesEBairros/listarCadastroBairro');
    }
    
    
    

}