<?php
class CidadesEBairros_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function gerarJsonCidadesEBairros($idCidade){
        return $this
            ->db
            ->query
            (
                'SELECT
                    ID AS id,
                    BAIRRO as nome_sub_categoria
                         
                FROM
                    TB_BAIRROS

                WHERE
                    ID_CIDADE = "'.$idCidade.'"

                ORDER BY
                    BAIRRO
                '
            )
            ->result();
    }
    

    function exibirCidades(){
        return $this
        ->db
        ->query
            (
            '
            SELECT
                C.ID,
            	C.ID ID_CIDADE,
            	CONCAT(U.UF, " - ", C.CIDADE) CIDADE
            	    
            FROM
            	TB_CIDADES C
                
            LEFT JOIN
            	TB_UF U ON U.ID = C.ID_UF
                
            ORDER BY
            	U.UF,
                C.CIDADE
            '
            )
        ->result();
    }
    
    function exibirUf(){
        return $this
        ->db
        ->query
        (
            '
            SELECT
               *
            
            FROM
            	TB_UF

            ORDER BY
                UF
            
           '
            )
            ->result();
    }
    
    function cadastrarCidade($data){
        return $this
        ->db
        ->insert('TB_CIDADES', $data);
    }
    
    
    function cadastrarUf($data){
        return $this
        ->db
        ->insert('TB_UF', $data);
    }
    
    function cadastrarBairro($data){
        return $this
        ->db
        ->insert('TB_BAIRROS', $data);
    }

}