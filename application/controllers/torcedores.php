<?php

class Torcedores extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Torcedores_model");
        $this->load->model("CidadesEBairros_model");
    }
    
    function index()
    {
        $dadosTorcedores = $this->Torcedores_model->listarTorcedoresHome();
        $this->data['torcedores'] = $dadosTorcedores;
                
        $contarTorcedoresAtivos = $this->Torcedores_model->contarTorcedoresAtivos();
        $this->data['torcedoresAtivos'] = $contarTorcedoresAtivos;
        
        $contarTorcedoresInativos = $this->Torcedores_model->contarTorcedoresInativos();
        $this->data['torcedoresInativos'] = $contarTorcedoresInativos;
        
        $contarTorcedoresTotal = $this->Torcedores_model->contarTorcedoresTotal();
        $this->data['torcedoresTotal'] = $contarTorcedoresTotal;
                
        $this->load->view('home/home', $this -> data);
    }
        
    function cadastrarTorcedor(){
        $exibirCidades = $this->CidadesEBairros_model->exibirCidades();
        $this->data['cidades'] = $exibirCidades;
        $this->load->view('torcedores/cadastrar', $this-> data);
    }
       
    function criarTorcedor(){
        $data = array(
            "ID_BAIRRO" => $this->input->post("id_bairro"),
            "NOME" => $this->input->post("nome"),
            "DOCUMENTO" => $this->input->post("documento"),
            "TELEFONE" => $this->input->post("telefone"),
            "EMAIL" => $this->input->post("email"),
            "CEP" => $this->input->post("cep"),
            "ATIVO" => $this->input->post("ativo"),
            "DATA_CADASTRO" => date('Y/m/d'),
        );
        $this->Torcedores_model->inserirTorcedor($data);
        redirect('torcedores');
    }
   
    
    function listarTorcedorEdicao(){
        $idUsuario = $this->uri->segment(3);
        $this->data['listarTorcedorEdicao'] = $this->Torcedores_model->listarTorcedorEdicao($idUsuario);
        
        $exibirCidades = $this->CidadesEBairros_model->exibirCidades();
        $this->data['cidades'] = $exibirCidades;

        $this->load->view('torcedores/editar', $this->data);
        
    }
   
    
    function editarTorcedor(){
        $idUsuario = $this->input->post("salvar_id");
        $data = array(
            "ID_BAIRRO" => $this->input->post("id_bairro"),
            "NOME" => $this->input->post("nome"),
            "DOCUMENTO" => $this->input->post("documento"),
            "TELEFONE" => $this->input->post("telefone"),
            "EMAIL" => $this->input->post("email"),
            "CEP" => $this->input->post("cep"),
            "ATIVO" => $this->input->post("ativo"),
        );
        
        $this->Torcedores_model->editarTorcedor($idUsuario, $data);
        $this->data['editarTorcedor'] = $this->Torcedores_model->listarTorcedorEdicao($idUsuario, $data);
        
        redirect('torcedores');
    }
    
    function deletarTorcedor()
    {
        $id = $this->uri->segment(3);
        $this->Torcedores_model->deletarTorcedor($id);
        redirect('torcedores');
    }
    

    function gerarJsonConsultaDocumento()
    {
        $numeroDocumento = $this->uri->segment(3);
        $exibirNumeroDocumento = $this->Torcedores_model->gerarJsonDocumentoTorcedores($numeroDocumento);
        return print json_encode($exibirNumeroDocumento);
    }
    

    
    
}