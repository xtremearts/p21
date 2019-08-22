<?php

class Torcedores_model extends \CI_Model
{
    function listarTorcedoresHome(){
        return $this
        ->db
        ->query
        (
            '
            SELECT
            	U.UF,
            	B.BAIRRO,
                C.CIDADE,
                T.ID,
            	T.NOME,
                T.DOCUMENTO,
                T.TELEFONE,
                T.EMAIL,
                T.CEP,
                CASE
					WHEN T.ATIVO = 1 THEN "ATIVO"
					ELSE "INATIVO"
                END ATIVO,
                T.DATA_CADASTRO
            
            FROM
            	TB_TORCEDORES T
            
            INNER JOIN
            	TB_BAIRROS B ON B.ID = T.ID_BAIRRO
            
            INNER JOIN
            	TB_CIDADES C ON C.ID = B.ID_CIDADE
            
            INNER JOIN
            	TB_UF U ON U.ID = C.ID_UF
            
            ORDER BY
            	T.NOME,
                T.DOCUMENTO
            
            '
            )
            ->result();
            
    }
    
    function inserirTorcedor($data){
        $this->db->insert('TB_TORCEDORES', $data);
    }
    
    
    function listarTorcedorEdicao($id)
    {
        $this->db->where('ID', $id);
        return $this->db->get("TB_TORCEDORES")->row();
    }
    
    
    function editarTorcedor($id, $data)
    {
        $this->db->where('ID', $id);
        $this->db->update('TB_TORCEDORES', $data);
    }
    
    function gerarJsonDocumentoTorcedores($numeroDocumento){
        return $this
        ->db
        ->query
        (
            'SELECT
                DOCUMENTO as documento         
            FROM
                TB_TORCEDORES
        
            WHERE
                DOCUMENTO = "'.$numeroDocumento.'"
            '
            )
            ->row();
    }
    
    function deletarTorcedor($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('TB_TORCEDORES');
    }
    
    function contarTorcedoresAtivos(){
        return $this
        -> db
        -> from('TB_TORCEDORES')
        -> where('ATIVO', 1)
        -> count_all_results();
    }
    
    function contarTorcedoresInativos(){
        return $this
        -> db
        -> from('TB_TORCEDORES')
        -> where('ATIVO', 0)
        -> count_all_results();
    }
    
    function contarTorcedoresTotal(){
        return $this
        -> db
        -> from('TB_TORCEDORES')
        -> count_all_results();
    }
    
}

