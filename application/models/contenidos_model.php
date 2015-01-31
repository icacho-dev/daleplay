<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenidos_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	/* --------------------------------------------------	  
	 * ------------ INSERT(S)
	 * --------------------------------------------------
	 */
	function insert_contenido($data) {
		
		$this->db->set('PK_Contenido'  , NULL );		
		$this->db->insert('Contenido');
		return $this->db->insert_id() ;
	}
	
	function insert_contenido_categoria($data)
	{
		$this->db->trans_start();
	    $this->db->insert_batch('Contenido_Categoria', $data);
	    $this->db->trans_complete();        
	    return ($this->db->trans_status() === FALSE)? FALSE:TRUE;
	}
	
	function insert_traduccion($data)
	{
		$this->db->trans_start();
	    $this->db->insert_batch('Traduccion', $data);
	    $this->db->trans_complete();        
	    return ($this->db->trans_status() === FALSE)? FALSE:TRUE;
	}
	/* --------------------------------------------------	  
	 * ------------ SELECT(S)
	 * --------------------------------------------------
	 */
	function get_view_contenidos_traducciones_AsArray()
	{
	   return $this->db->get('view_contenidos_traducciones')->result_array();	   
	}
	/* --------------------------------------------------	  
	 * ------------ DELETE(S)
	 * --------------------------------------------------
	 */
	

/*
	function get_last_item()
	{
		$this->db->order_by('PK_Contenidos', 'DESC');
		$query = $this->db->get('PK_Contenidos', 1);

		return $query->result();
	}
	

	

	function edit_contenidos($data , $id)
	{
		$this->db->where('PK_Contenidos', $id);
		$this->db->update('Contenidos', $data); 
		return $id;
	}

	function get_contenidos($id)
	{	   
	   return $this->db->where('PK_Contenidos', $id);
	}
	
	function get_contenidosAsArray($id)
	{
		$this->db->where('PK_Contenidos', $id);
		$this->db->from('Contenidos'); 
		$this->db->limit(1);
		$query = $this->db->get();	   
	   return $query->result();
	}
	
	
	function get_Contenidos()
	{	   
	   return $this->db->get('Contenidos');
	}
	
	function get_ContenidosAsArray()
	{
	   return $this->db->get('Contenidos')->result_array();	   
	}
	
	
 	function delete_contenidos($id)
  	{	
  		$this->db->where('PK_Contenidos', $id);
  		$this->db->delete('Contenidos'); 
		return true;
  	}
 */

}

/* End of file Contenidos_model.php */
/* Location: ./application/models/Contenidos_model.php */