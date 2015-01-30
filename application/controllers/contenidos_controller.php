<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenidos_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contenidos_model');
		$this->load->model('Categorias_model');	
		$this->load->model('Idiomas_model');	
		$this->load->model('Categoria_Idioma_model');
	}
	//----------------- INDEX
	public function index()
	{

		$data['main_content'] = 'admin/contenidos_view';
		$this->load->view('admin/contenidos_view');
		
	}
	
	public function get_model () {
		
		header ('Content-type: application/json; charset=utf-8');		
		 
		$categorias = $this->Categorias_model->get_categoriasAsArray_v2();
		$idiomas = $this->Idiomas_model->get_idiomasAsArray();
		//modelo base
		$result = array(
					'list_categoria' => array() ,
					'list_idioma' => array() ,
					'new_categoria' => array() ,
					'new_contenido' => array()  
		);
		//1er paso -> get/set listado de categorias
		foreach($categorias as $categoria) {
				
			$idiomas_fiter = array();			
			$traducciones = $this->Categoria_Idioma_model->get_CategoriaIdiomaByIdAsArray($categoria['PK_Categoria']);
			
			array_push($result['list_categoria'], array(
		    	'PK_Categoria' => $categoria['PK_Categoria'],
		    	'Clave' => $categoria['Clave'],	
		    	'list_idioma' => $traducciones
			));					
			
		}
		//2do paso -> get/set listado de idiomas
		foreach($idiomas as $idioma) {
			
			array_push($result['list_idioma'], array(
				'FK_Idioma' => $idioma['PK_Idioma'] ,
				    'Clave' => $idioma['Clave'] ,
				   'Nombre' => $idioma['Nombre'] 				      
				)
			);					
			
		}
		//3er paso -> set default ite usando listado de idiomas de 2do paso
		$result['new_categoria']  = array(
				
					'PK_Categoria' => 0 ,
					'Clave' => '' ,
					'list_idioma' => $result['list_idioma']
				);	/**/
		//4to paso -> set default item contenido
		$result['new_contenido']  = array(
				
					'PK_Contenido' => 0 ,
					'Clave' => '' ,
					'list_idioma' => $result['list_idioma']
					
				);
		
		echo json_encode($result);
			
	}

	public function get_contenidos_traducciones(){
		header ('Content-type: application/json; charset=utf-8');
		echo json_encode($this->Contenidos_model->get_view_contenidos_traducciones_AsArray());
	} 
	//INSERT
	public function save_contenido(){
			
		$data = json_decode(file_get_contents('php://input'), true);			
		$arr = array();		
		$PK_Contenido = (isset($data['PK_Contenido']))?$data['PK_Contenido']:NULL;
		$PK_Categoria = $data['PK_Categoria'];
		$Clave = $data['Clave'];
		$list_idioma = $data['list_idioma'];
		
		$arr = array(
			'result' => array(
				'PK_Contenido' => $PK_Contenido				
			),
			'Contenido_Categoria' => array(),
			'Traduccion' => array(),
			'errors' => array(),
			'op_contenido' => false,
			'op_contenido_categoria' => false,
			'op_traduccion' => false,
			'op' => false
		);
		
		// --- 1ER INSERT -> Contenido
		try {
		    $arr['result']['PK_Contenido'] = $this->Contenidos_model->insert_contenido($PK_Contenido);
			
			$arr['op_contenido'] = 
				(isset($arr['result']['PK_Contenido'])&&
			 	$arr['result']['PK_Contenido']>0)?true:false;
				
		} catch (Exception $e) {		    
			array_push( $arr['errors'] , $e->getMessage() );
			throw $e;
		}		
		// --- 2DO INSERT -> Contenido_Categoria 
		try {
		    	
		    if($arr['op_contenido'] && isset($data['PK_Categoria'])){
		    		
		    	$Contenido_CategoriaArr = array();				
				array_push($Contenido_CategoriaArr, array(
			    	'FK_Contenido' => (string)$arr['result']['PK_Contenido'] ,
			    	'FK_Categoria' => (string)$data['PK_Categoria'] 
				));
				
				$arr['Contenido_Categoria'] = $Contenido_CategoriaArr;
								
		    	$arr['op_contenido_categoria'] = $this->Contenidos_model->insert_contenido_categoria($Contenido_CategoriaArr);
					
		    } else {
				//delete categoria 1er insert
			}
				
		} catch (Exception $e) {		    
			array_push( $arr['errors'] , $e->getMessage() );
			throw $e;
		}
		// --- 3ER INSERT -> Traduccion
		try{
				
			$TraduccionArr = array();		
			foreach ($list_idioma as $idioma) {
										
				if(isset($idioma['titulo']) && $idioma['titulo'] != "" && strlen($idioma['titulo']) > 0) {
					
					array_push($TraduccionArr, array(
				    	'FK_Idioma' => $idioma['FK_Idioma'] ,
				    	'FK_Contenido' => $arr['result']['PK_Contenido'] ,
				    	'Titulo' => $idioma['titulo'] ,
				    	'Traduccion' => $idioma['traduccion']  			
					));
										
				}				
						
			};
			
			if(count($TraduccionArr)>0 ) {
					
				$arr['op_traduccion']  = $this->Contenidos_model->insert_traduccion($TraduccionArr);
				
				$arr['Traduccion'] = $TraduccionArr;
				
			} else {
				//Delete Categoria @1ER-Insert
			}
			
		} catch (Exception $e) {		    
			array_push( $arr['errors'] , $e->getMessage() );
			throw $e;
		}	
		
		echo json_encode($arr);				
		
	}

	
}

/* End of file contenidos_controller.php */
/* Location: ./application/controllers/contenidos_controller.php */