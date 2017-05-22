<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function cadastrarUsuario($dados=NULL)
	{
	if ($dados != NULL):
		$this->db->insert('usuario', $dados);		
	endif;
	}
	
	public function logar($usuario,$senha){

		$this->db->where('usuario',$usuario);
		$this->db->where('senha',$senha);
		$this->db->from('usuario');
		$query= $this->db->get();
		if($query->num_rows() ==1) {
			
			return $query->result();
		}else{
			return false;
		}
	}
	
}	
?>
