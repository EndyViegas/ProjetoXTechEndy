<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	public function getProdutos(){
		$query =$this->db->get('produto');
		return $query->result();
	}
	
	
	//Adiciona um novo produtos na tabela produto
    public function cadastrarProduto($dados=NULL)
	{
	if ($dados != NULL):
		$this->db->insert('produto', $dados);		
	endif;
	}
	
	//Pegar o codigo do produto na tabela produto
	public function getProdutoByCodigo($codigo=NULL)
    {
    if ($codigo != NULL):
        //Verifica se a codigo no banco de dados
        $this->db->where('codigo', $codigo);        
        //limita para apenas um regstro    
        $this->db->limit(1);
        //pega os produto
        $query = $this->db->get("produto");        
        //retornamos o produto
        return $query->row();   
    endif;
    } 
	
	//Atualizar um registro na tabela produtoo
    public function editarProduto($dados=NULL, $codigo=NULL)
    {
    //Verifica se foi passado $dados e $codigo   
    if ($dados != NULL && $codigo != NULL):
        //Se foi passado ele vai fazer a atualização
        $this->db->update('produto', $dados, array('codigo'=>$codigo));      
    endif;
    }   
	
	
	// Apagar um registro da tabela produto
	public function apagarProduto($codigo=NULL)
	{ //Executa a função DB DELETE para apagar o produto
		if($codigo!=NULL):
			$this->db->delete('produto',array('codigo'=>$codigo));
		endif;
	}
	public function consultarProduto($dados=NULL, $codigo=NULL)
	{
		if ($dados != NULL && $codigo != NULL):
        //Se foi passado ele vai fazer a consulta
        $this->db->select('produto', $dados, array('codigo'=>$codigo));      
    endif;
	}
	

	
}	
?>
