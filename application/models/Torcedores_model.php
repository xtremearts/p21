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
}

