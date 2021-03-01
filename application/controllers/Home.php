<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logado')) {
			if(!$this->session->userdata('logado')) {
				$this->session->set_flashdata('mensagem', 'Para acessar essa página você deve estar logado!');
				redirect('/Login');
			}
		} else {
			$this->session->set_flashdata('mensagem', 'Para acessar essa página você deve estar logado!');
			redirect('/Login');
		}
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->view('home');
	}

	public function recebeFormulario()
	{
		$array = [];
		if ($this->input->post()) {
			$escolha = $this->input->post('escolha');
			switch ($escolha) {
				case 'V':
					$this->output->set_status_header(200);
					$array = array(
						'mensagem' => 'Sucesso',
						'url' => base_url('/index.php/Home/visualizarUsuarios')
					);
					break;
				case 'A':
					$this->output->set_status_header(200);
					$array = array(
						'mensagem' => 'Sucesso',
						'url' => base_url('/index.php/Home/cadastraUsuarios')
					);
					break;
				case 'E':
					$this->output->set_status_header(200);
					$array = array(
						'mensagem' => 'Sucesso',
						'url' => base_url('/index.php/Home/editarUsuarios')
					);
					break;
				case 'D':
					$this->output->set_status_header(200);
					$array = array(
						'mensagem' => 'Sucesso',
						'url' => base_url('/index.php/Home/deletarUsuarios')
					);
					break;
				case 'L':
					$this->session->sess_destroy();
					$this->output->set_status_header(200);
					$array = array(
						'mensagem' => 'Sucesso',
						'url' => base_url('/index.php/Login')
					);
					break;
				default:
					$this->output->set_status_header(400);
					$array = array(
						'mensagem' => 'Erro! Opção inválida!',
						'url' => base_url('/index.php/Home')
					);
			}
		} else {
			$this->output->set_status_header(400);
			$array = array(
				'mensagem' => 'Erro! Dados faltantes!',
				'url' => base_url('/index.php/Home')
			);
		}

		$this->output->set_content_type('application/json', 'utf-8');
		$this->output->set_output(json_encode($array));
	}

	public function visualizarUsuarios()
	{
		$this->load->model('HomeModel');
		$resultado = $this->HomeModel->buscarUsuarios();
		$arr = array(
			"usuarios" => $resultado
		);
		$this->load->view('visualizarUsuario', $arr);
	}

	public function cadastraUsuarios()
	{
		$this->load->view('cadastrarUsuario');
	}

	public function recebeFormCadastraUsuarios()
	{
		if ($this->input->post()) {
			$array = $this->input->post();
			$this->load->model('HomeModel');
			$resultado = $this->HomeModel->cadastrarUsuario(
				$array['novoNome'], 
				$array['novoUsuario'], 
				password_hash($array['novaSenha'], PASSWORD_DEFAULT)
			);
			if ($resultado) {
				$this->session->set_flashdata('mensagem', " Cadastro efetuado com sucesso!");
				redirect("/Home");
			} else {
				echo "Erro ao cadastrar.";
				$this->load->view('cadastrarUsuario');
			}
		} else {
			echo "Dados insuficientes.";
			$this->load->view('cadastrarUsuario');
		}
	}

	public function editarUsuarios()
	{
		$this->load->model('HomeModel');
		$resultado = $this->HomeModel->buscarUsuarios();
		$arr = array(
			"usuarios" => $resultado
		);
		$this->load->view('editarUsuario', $arr);
	}

	public function editarFormUsuarios()
	{
		$this->load->model('HomeModel');
		$resultado = $this->HomeModel->buscarUsuario($this->input->get("id"));
		$arr = array(
			"usuario" => $resultado
		);
		$this->load->view('editaUsuario', $arr);
	}

	public function recebeFormEditaUsuarios()
	{
		if ($this->input->post()) {
			$array = $this->input->post();
			$this->load->model('HomeModel');
			if($array['editaSenha'] != '') {
				$array['editaSenha'] = password_hash($array['editaSenha'], PASSWORD_DEFAULT);
			} else {
				$array['editaSenha'] = false;
			}
			$resultado = $this->HomeModel->editarUsuario(
				$array['editaNome'],
				$array['editaUsuario'],
				$array['editaSenha'], 
				$array['id']
			);
			if($resultado) {
				$this->session->set_flashdata('mensagem', " Cadastro efetuado com sucesso!");
				redirect("/Home");
			}
		}
	}	
	public function deletarUsuarios()
	{
		$this->load->model('HomeModel');
		$resultado = $this->HomeModel->buscarUsuarios();
		$arr = array(
			"usuarios" => $resultado
		);
		$this->load->view('deletaUsuario', $arr);
	}
	public function deletarFormUsuarios()
	{
		if ($this->input->get()) {
			$array = $this->input->get();
			$this->load->model('HomeModel');
			$resultado = $this->HomeModel->deletarUsuario(intval($array['id']));
			if($resultado) {
				$this->session->set_flashdata('mensagem', " Usuário deletado com sucesso!");
				redirect("/Home");
			}
		}
	}	
}