<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function validaLogin() {
        $usuario = $this->input->post('loginUsuario');
        $senha = $this->input->post('loginSenha');

        $this->load->model('LoginModel');

        if($usuarioLogado = $this->LoginModel->validaLogin($usuario, $senha)) {
            $this->session->set_userdata('id', $usuarioLogado['id']);
            $this->session->set_userdata('nome', $usuarioLogado['nome']);
            $this->session->set_userdata('usuario', $usuarioLogado['usuario']);
            $this->session->set_userdata('logado', true);
            $this->session->set_flashdata('mensagem', 'Bem-vindo '.$this->session->userdata('nome').'!');
            redirect('/Home');
        } else {
            $this->session->set_flashdata('mensagem', 'Usuário ou senha incorretos!');
            redirect('/Login');
        }
    }

}