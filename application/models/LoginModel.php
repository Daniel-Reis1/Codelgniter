<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function validaLogin($usuario, $senha)
    {
        $resultado = $this->db->query('SELECT id, usuario, nome, senha FROM usuario WHERE usuario=?', array($usuario));
        $resultado = $resultado->row_array();

        if($resultado) {
            if(password_verify($senha, $resultado['senha'])){
                unset($resultado['senha']);
                return $resultado;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}