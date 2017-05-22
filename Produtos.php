<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller 
{
	//pagina de consultar produtos
	public function index()
	{
		//carrega o model
		$this->load->model('produtos_model','produtos');
		
		//criação da array para armazenar os produtos
		//executar a função getProdutos
		$data['produtos'] = $this->produtos->getProdutos();
		
		//carrega a view mview 
		$this->load->view('mview', $data);
	}
	//pagina de cadastrar produtos
	public function cadastrar(){
		$this->load->model('produtos_model','produtos');

		//carrega a view
		$this->load->view('cadastrarproduto');
	}
	//Função salvar no DB
	
	
	public function editar($codigo=NULL)	
	{						
		//Verifica se foi passado um codigo, se não vai para a página produtos cadastrados
		if($codigo == NULL) {
			redirect('http://localhost/testexcommerce/index.php/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByCodigo($codigo);

		//Verifica que a consulta voltar um registro, se não vai para a página produtos cadastrados
		if($query == NULL) {
			redirect('http://localhost/testexcommerce/index.php/produtos');
		}
		
		//Criamos uma array onde vai guardar os dados do produto e passamos como parametro para view;	
		$dados['produtos'] = $query;

		//Carrega a View
		$this->load->view('editarProduto', $dados);		
	}	
	
	public function salvar()
 	{
 		//Verifica se foi passado o campo nome vazio.
 		if (($this->input->post('nome') == NULL )or ($this->input->post('codigo') == NULL )) {
 			echo 'O compo é obrigatório.';
 			echo '<a href="http://localhost/testexcommerce/index.php/produtos/cadastrar" title="voltar">Voltar</a>';
 		} else {
 
 		//Carrega o Model Produtos				
 			$this->load->model('produtos_model', 'produtos');
 
 			//Pega dados do post e guarda na array $dados
 			$dados['codigo'] = $this->input->post('codigo');
			$dados['nome'] = $this->input->post('nome');
			$dados['preco'] = $this->input->post('preco');
			$dados['quantidade'] = $this->input->post('quantidade');		
 			
 			//Executa a função do produtos_model adicionar
 			$this->produtos->cadastrarProduto($dados);
 
 			//Fazemos um redicionamento para a página 		
 			redirect("http://localhost/testexcommerce/index.php/produtos");	
 		}		
 
 	}
	
	
	
	//Função salvar no DB
	public function atualizar()
	{
		//Verifica se foi passado o campo nome vazio.
		if ($this->input->post('nome') == NULL) {
			echo 'O compo nome do produto é obrigatório.';
			echo 'Voltar';
		} else {
			//Carrega o Model Produtos				
			$this->load->model('produtos_model', 'produtos');

			//Pega dados do post e guarda na array $dados
			$dados['codigo'] = $this->input->post('codigo');
			$dados['nome'] = $this->input->post('nome');
			$dados['preco'] = $this->input->post('preco');
			$dados['quantidade'] = $this->input->post('quantidade');		
						
			//Verifica se foi passado via post a id do produtos
			if ($this->input->post('codigo') != NULL) {		
				//Se foi passado ele vai fazer atualização no registro.	
				$this->produtos->editarProduto($dados, $this->input->post('codigo'));
			} else {
				//Se Não foi passado id ele adiciona um novo registro
				$this->produtos->cadastrarProduto($dados);
			}	
						
			//Fazemos um redicionamento para a página 		
			redirect("http://localhost/testexcommerce/index.php/produtos");	
		}		
		
	}
	public function apagar($codigo=NULL)
	{
		//Verifica se foi passado um codigo, se não vai para a página produtos cadastrados
		if($codigo == NULL) {
			redirect('http://localhost/testexcommerce/index.php/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByCodigo($codigo);

		//Verifica que a consulta voltar um registro, se não vai para a página produtos cadastrados
		if($query != NULL) {
			//Executa a função apagarProdutos do produtos_model
			$this->produtos->apagarProduto($query->codigo);
			redirect("http://localhost/testexcommerce/index.php/produtos");

		} else {
			//Se não encontrou nenhum registro no banco de dados com a ID passada ele volta para página produtos cadastrados
			redirect("http://localhost/testexcommerce/index.php/produtos");
		
		}	
	}
	public function consultar($codigo=NULL){
		if($codigo == NULL) {
			redirect('http://localhost/testexcommerce/index.php/produtos');
		}
		//carrega o model
		$this->load->model('produtos_model','produtos');
		
		$query = $this->produtos->getProdutoByCodigo($codigo);
		
		$dados['produtos'] = $query;

		
		//carrega a view 
		$this->load->view('consultarproduto',$dados);
	}
	
}
?>