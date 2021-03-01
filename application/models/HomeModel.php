<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{

    public function buscarUsuarios()
    {
        $resultado = $this->db->query('SELECT * FROM usuario');
        return $resultado->result_array();
    }

    public function buscarUsuario($id)
    {
        $resultado = $this->db->query('SELECT * FROM usuario WHERE id=?', array($id));
        return $resultado->row_array();
    }

    public function cadastrarUsuario($nome, $usuario, $senha)
    {
        try {
            $query = $this->db->query("INSERT INTO usuario(nome, usuario, senha) VALUES(?,?,?)", array($nome, $usuario, $senha));
        } catch (Exception $e) {
            echo 'Erro:' . $e->getMessage();
        }
        return $query;
    }
    
    public function editarUsuario($nome, $usuario, $senha, $id)
    {
        try {
            $query = '';
            if($senha) {
                $query = $this->db->query("UPDATE usuario SET nome = ?, usuario = ?, senha = ? WHERE id = ?", array($nome, $usuario, $senha, $id));
            } else {
                $query = $this->db->query("UPDATE usuario SET nome = ?, usuario = ? WHERE id = ?", array($nome, $usuario, $id));
            }
        } catch (Exception $e) {
            echo 'Erro:' . $e->getMessage();
        }
        return $query;
    }

    public function deletarUsuario($id)
    {
        try {
            $query = $this->db->query("DELETE FROM usuario WHERE id = ?", array($id));
        } catch (Exception $e) {
            echo 'Erro:' . $e->getMessage();
        }
        return $query;
    }
}
