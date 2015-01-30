angular.module('Controllers',[]) 

.controller('Categoriasv2Controller',function($scope,$http,$location,$routeParams){
	
	console.info('ini->Categoriasv2Controller');
	
	$scope.list_categoria = {};	
	$scope.categoria = {};
	$scope.list_idioma = {};
	$scope.new_categoria = {};
	
	//GET 
	$http.get('http://swfideas.com/ci22/categorias_controller/get_categorias_list').then(function(response){		
		$scope.categoria = angular.copy(response.data.new_categoria);
		$scope.new_categoria = angular.copy(response.data.new_categoria);
		$scope.list_categoria = response.data.list_categoria;
		$scope.list_idioma = response.data.list_idioma;
	});
	
	//REFRESH
	$scope.refresh = function(){
		
		$http.get('http://swfideas.com/ci22/categorias_controller/get_categorias_list').then(function(response){			
			$scope.categoria = angular.copy(response.data.new_categoria);
			$scope.new_categoria = angular.copy(response.data.new_categoria);
			$scope.list_categoria = response.data.list_categoria;
			$scope.list_idioma = response.data.list_idioma;	
			
			if($scope.skyform != undefined)
				$scope.skyform.$setPristine();
		});
		
	};
	
	//SELECT ID
	$scope.edit = function (categoria) {		
		$scope.categoria = categoria;
    }
	//SAVE||UPDATE
	$scope.save = function () {
		//console.info($scope.skyform.$submitted);
		$http.post( 'http://swfideas.com/ci22/categorias_controller/save_categorias',$scope.categoria).then(function(response){
			
			if(response.data.op)
			{						
				var result = response.data.categoria;
				var insert = true;
				
				for (i in $scope.list_categoria) {
					if($scope.list_categoria[i].PK_Categoria == result.PK_Categoria){
						$scope.list_categoria[i] = result;
						insert = false;
					}				
				}
				if(insert){
					$scope.list_categoria.push(result);
				}
				$scope.categoria = angular.copy($scope.new_categoria);
				$scope.skyform.$setPristine();
				console.info("save->"+response.data.op);
			} else {
				// ver que pedo con los response.data.errors			
			}
					
		});
    }
    //DELETE
	$scope.delete = function (categoria) {
		
		$http.post( 'http://swfideas.com/ci22/categorias_controller/delete_categoria',categoria).then(function(response){
			
			if(response.data.op)
			{	
				var result = response.data.result;
				for (i in $scope.list_categoria) {
					if ($scope.list_categoria[i].PK_Categoria == result.PK_Categoria) {
	                	$scope.list_categoria.splice(i, 1);
	            	}					
				}
			} else {
				console.error(response.data);
				// ver que pedo con los response.data.errors			
			}
					
		});
    }
    // LOAD DATA
    $scope.refresh();
    
})
.service('ContenidosService', function ($location,$http,$q) {
	
	this.get_model = function (){		
		return $http.get( $location.path() + '/get_model');			
	};	
	
	this.get_contenidos_traducciones = function (){		
		return $http.get( $location.path() + '/get_contenidos_traducciones');			
	};
	
	this.save = function(contenido){
		console.info('ContenidosService:call->save');
		console.info(contenido);
		//return true;
		return $http.post( $location.path() + '/save_contenido',contenido);
	};
		
})
.controller('ContenidosController',function($scope,$http,$location,$routeParams,ContenidosService){
	
	$scope.list_categoria = {};	
	$scope.selected_categoria = {};
	$scope.contenidos_traducciones = {};
	
	//SAVE
    $scope.save = function () {
    	console.info('ContenidosController:call->save');
    	
    	ContenidosService.save($scope.selected_categoria).then(function(response){
			console.info(response.data);
			if(response.data.op)
			{		
				console.info('response.data');
				
				
			} else {
				// ver que pedo con los response.data.errors			
			}		
		});
		
    }
    
    //REFRESH
	$scope.refresh = function(){
		
		ContenidosService.get_model().then(function(d) {
		    
		    $scope.list_categoria = d.data.list_categoria;
		    
		    if($scope.skyform != undefined)
		    	$scope.skyform.$setPristine();
		    	
		});
		
		ContenidosService.get_contenidos_traducciones().then(function(d) {			
		    $scope.contenidos_traducciones = d.data;		    	
		});
		
		$scope.idioma = {};		
	};
    
    // LOAD DATA
    $scope.refresh();
})
;
