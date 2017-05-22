<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	//pagina de consultar produtos
	public function index()
	{
		$this->load->view('loginUsuario');
	}
	public function cadastrar()
	{	
	$this->load->model('usuario_model', 'usuarios');

		
	$this->load->view('cadastrarusuario');
		
	}
	
	public  function entrar(){
		
		$usuario= $this->input->post('usuario');
		$senha = $this->input->post('senha');		
 		$this->load->model('usuario_model','usuarios');
 		$result = $this->usuarios->logar($usuario,$senha);
		
		//usuario e senha correta
		if($result){
			foreach($result as $results){
				$dados = array();
				$dados['usuario'] = $results->usuario;
				$dados['senha'] = $results->senha;
			}
				redirect('http://localhost/testexcommerce/index.php/produtos');
		}
		else
		{
			echo 'Dados incorretos <a href="http://localhost/testexcommerce" title="voltar">Voltar</a>';
 		} 
	}
	
	public function confirmar(){
		
 		//Verifica se os campos estão vazios.
 		if (($this->input->post('usuario') == NULL )or ($this->input->post('senha') == NULL )) {
 			echo 'O campo é obrigatório.';
 			echo '<a href="http://localhost/testexcommerce/index.php/login/cadastrar" title="voltar">Voltar</a>';
 		} else {
 
 		//Carrega o Model Usuarios			
 			$this->load->model('usuario_model', 'usuarios');
 
 			//Pega dados do post e guarda na array $dados
 			$dados['usuario'] = $this->input->post('usuario');
			$dados['senha'] = $this->input->post('senha');
					
 			
 			//Executa a função do usuarios_model adicionar
 			$this->usuarios->cadastrarUsuario($dados);
 
 			//Fazemos um redicionamento para a página 		
 			redirect("http://localhost/testexcommerce");	
 		}		
	}
	

		
		

	
	
		

	
	
}
?>