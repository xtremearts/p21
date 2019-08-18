<?php

class importarXml extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("ImportarXml_model");
        define('URL_XML', base_url() . 'assets/xml_temporario/torcedores.xml');
    }

    function importarXmlUf()
    {
        $xml = simplexml_load_file(URL_XML);
        foreach ($xml->torcedor as $torcedor) {
            $uf = $torcedor[0]['uf'];
            $cidade = $torcedor[0]['cidade'];
            $bairro = $torcedor[0]['bairro'];

            // INSERIR UF
            $this->ImportarXml_model->validarEInserirUF($uf);

            // INSERIR CIDADE
            $data = array(
                'CIDADE' => $cidade,
                'ID_UF' =>  $this->ImportarXml_model->retornarIdUF($uf),
            );
            $this->ImportarXml_model->validarEInserirCidade($data);

            //INSERIR BAIRRO
            $data = array(
                'BAIRRO' =>  $bairro,
            );

        }
    }

}