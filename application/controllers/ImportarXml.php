<?php

class importarXml extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("ImportarXml_model");
        define('URL_XML', base_url() . 'assets/xml_temporario/torcedores.xml');
    }

    function importarXml()
    {
        $xml = simplexml_load_file(URL_XML);

        foreach ($xml->torcedor as $torcedor) {
            $uf = $torcedor[0]['uf'];
            $cidade = $torcedor[0]['cidade'];
            $bairro = $torcedor[0]['bairro'];
            $nome = $torcedor[0]['nome'];
            $documento = $torcedor[0]['documento'];
            $telefone = $torcedor[0]['telefone'];
            $email = $torcedor[0]['email'];
            $cep = $torcedor[0]['cep'];
            $dataCadastro = date('Y/m/d');
            $ativo = $torcedor[0]['ativo'];

            // INSERIR UF
            $this->ImportarXml_model->validarEInserirUF($uf);

            // INSERIR CIDADE
            $data = array(
               'CIDADE' => $cidade,
               'ID_UF' => $idUF = $this->ImportarXml_model->retornarIdUF($uf),
            );
            $this->ImportarXml_model->validarEInserirCidade($data);

            //INSERIR BAIRRO
            $data = array(
                'BAIRRO' =>  $bairro,
                'ID_CIDADE' =>  $id_cidade = $this->ImportarXml_model->retornarIdCidade($cidade, $idUF),
            );
            $this->ImportarXml_model->validarEInserirBairro($data);

            //INSERIR E ATUALIZAR TORCEDOR
            $data = array(
                'ID_BAIRRO' => $this->ImportarXml_model->retornarIdBairro($bairro, $id_cidade),
                'NOME' => $nome,
                'DOCUMENTO' => $documento,
                'TELEFONE' => $telefone,
                'EMAIL' => $email,
                'CEP' => $cep,
                'DATA_CADASTRO' => $dataCadastro,
                'ATIVO' => $ativo == 1 ? $ativo : 0,
            );

            $this->ImportarXml_model->validarEInserirTorcedor($data);
        }
    }

}