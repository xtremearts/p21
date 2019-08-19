<?php

class ImportarXml_model extends CI_Model
{
    function inserirUF($data)
    {
        $this->db->query
        (
            '
            INSERT INTO TB_UF
                (UF)
            VALUES
                ("'.$data.'")
            '
        );
    }

    function retornarIdUF($uf){
        $idUf = $this
            -> db
            -> query
            (
                'SELECT
                        ID
                     FROM
                        TB_UF
                     WHERE
                        UF = "'.$uf.'"
                     '
            )
            -> row();
        return $idUf -> ID;
    }

    function validarEInserirUF($uf)
    {
        $contarUF = $this
            -> db
            -> from('TB_UF')
            -> where('UF', $uf)
            -> count_all_results();

        if($contarUF < 1)
        {
            $this ->inserirUF($uf);
        }
    }

    function inserirCidade($data)
    {
        $this->db->insert('TB_CIDADES', $data);
    }
    
    function validarEInserirCidade($data)
    {
        $contarCidade = $this
            -> db
            -> query
            (
                '
                     SELECT
                        CIDADE
                     FROM
                        TB_CIDADES
                     WHERE
                        CIDADE = "'.$data['CIDADE'].'"
                        AND ID_UF = "'.$data['ID_UF'].'"
                     '
            )
            -> result();

        if((count($contarCidade) < 1))
        {
            $this->inserirCidade($data);
        }
    }

    function retornarIdCidade($cidade, $idUf)
    {
        $idCidade = $this
            ->db
            ->query
            (
                'SELECT
                        ID
                     FROM
                        TB_CIDADES
                     WHERE
                        CIDADE = "' . $cidade . '"
                        AND ID_UF = "' . $idUf . '"
                     '
            )
            -> row();
        return $idCidade -> ID;
    }


    function inserirBairro($data)
    {
        $this->db->insert('TB_BAIRROS', $data);
    }

    function validarEInserirBairro($data)
    {
        $contarBairro = $this
            -> db
            -> query
            (
                '
                     SELECT
                        BAIRRO
                     FROM
                        TB_BAIRROS
                     WHERE
                        BAIRRO = "'.$data['BAIRRO'].'"
                        AND ID_CIDADE = "'.$data['ID_CIDADE'].'"
                     '
            )
            -> result();

        if((count($contarBairro) < 1))
        {
            $this->inserirBairro($data);
        }
    }

    function retornarIdBairro($bairro, $idCidade)
    {
        $idBairro = $this
            ->db
            ->query
            (
                'SELECT
                        ID
                     FROM
                        TB_BAIRROS
                     WHERE
                        BAIRRO = "' . $bairro . '"
                        AND ID_CIDADE = "' . $idCidade . '"
                     '
            )
            -> row();
        return $idBairro -> ID;
    }

    function inserirTorcedor($data)
    {
        $this->db->insert('TB_TORCEDORES', $data);
    }
    
    function atualizarTorcedor($data)
    {
        $this
            ->db
            ->query(
                '
                UPDATE TB_TORCEDORES
                SET
                    ID_BAIRRO = "'.$data['ID_BAIRRO'].'",
                    NOME = "'.$data['NOME'].'",
                    TELEFONE = "'.$data['TELEFONE'].'",
                    EMAIL = "'.$data['EMAIL'].'",
                    CEP = "'.$data['CEP'].'",
                    ATIVO = "'.$data['ATIVO'].'"
                WHERE
                    DOCUMENTO = "'.$data['DOCUMENTO'].'"
                ')
            ;
    }

    function validarEInserirTorcedor($data)
    {
        $contarTorcedor = $this
            -> db
            -> query
            (
                '
                 SELECT
                    DOCUMENTO
                 FROM
                    TB_TORCEDORES
                 WHERE
                    DOCUMENTO = "'.$data['DOCUMENTO'].'"
                 '
            )
            -> result();

            if((count($contarTorcedor) < 1))
        {
            $this->inserirTorcedor($data);
        }
        else
        {
           $this->atualizarTorcedor($data);
        }
    }
}