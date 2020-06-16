<?php

namespace Source\support;

class Helpers{
    
    public static function validaCampo255($valor){
        $qtd = strlen($valor);
        if ($qtd <= 255) {
            return true;
        }else{
            return false;
        }
    }
    public static function validaSenha($valor){
        $qtd = strlen($valor);
        if ($qtd <= 100 && $qtd >= 4) {
            return true;
        }else{
            return false;
        }
    }
    
}
