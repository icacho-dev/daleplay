<!-- content area -->
<div class="content_fullwidth less2" ng-controller="ContenidosController">
    
    <div class="container">
        <div class="one_full" >
           
            <div class="dp_form1">                
                <form  
                accept-charset="utf-8" 
                class="sky-form" id="sky-form" name="skyform"
                ng-submit="save()"> 
                <header>Agregar <strong>Contenidos</strong></header>
                                     
                <fieldset>                  
                    <!-- SELECT : CATEGORIA -->
                    <div class="row">
						<section class="col col-6">
							<label class="label">Categoria</label>
							<label class="select">
								<select ng-model="selected_categoria" ng-options="item.list_idioma[0].Label for item in list_categoria track by item.PK_Categoria">
									<option value="" disabled="true">- Categoria -</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
							
						</section>
					</div>		            
                    <!-- TEXTAREAS : TRADUCCIÓN -->
		                       	
		            <tabset justified="true">
					    <tab ng-repeat="idioma in selected_categoria.list_idioma track by idioma.FK_Idioma" heading="{{idioma.Nombre}}" ng-if="idioma.Label">
					    	<section>
								<label class="label">Titulo</label>
				              	<label class="input" > <i class="icon-append icon-tag"></i>
					                <input type="text" name="Titulo" id="Titulo"
					                ng-model="idioma.titulo"
					                placeholder="{{idioma.titulo || 'Titulo'}}"
					                >
				              	</label>	
							</section>
					    	<section>
					    		<label class="label">Texto</label>
								<label class="textarea"> <i class="icon-append icon-comment"></i>
				                	<textarea rows="15" ng-model="idioma.traduccion"></textarea>
				              	</label>
							</section>
							<div class="row">
								<section class="col col-6">
									<label class="label">Audio</label> 
									<input type="file" class="button button-secondary"
									ng-model="idioma.file"/>
								</section>
								<section class="col col-6">
									
								</section>
							</div>			    							    	
				    	</tab>
				  	</tabset>
				  	                                     
                </fieldset>   
                             
                <footer>                    
                    <button type="button" class="button button-secondary" ng-click="refresh()">Cancelar</button>            
                    <input type="submit" class="button" value="Guardar"/>
                </footer>
                </form>                
            </div>		
			
        </div>
        
        <div class="margin_top1"></div>
        <!--/tabs -->
        <!-- table -->
        <div class="one_full">                      
	        	
        	<div class="table">
        		<table border="0" cellpadding="4" cellspacing="0" class="table">
			        <thead>
			        	
			            <tr>
			            	<th>Categoria</th> 
			                <th>Contenido</th>
			                <th></th>
			            </tr> 
			        </thead>
			        <tbody>
			            <tr ng-repeat="contenido in contenidos_traducciones">
			            	<td>
			            		<p class="dp_infolabel ng-binding">
			            			{{contenido.Label}}
			            			<span class="dp_tinydetail ng-binding">CLAVE: {{contenido.ClaveCat}}</span>
			            		</p>			            		
			            	</td>
			                <td>
			                	<h5>{{contenido.Titulo}}</h5>
			                	<!--<p style=" white-space: pre-line; ">{{ contenido.Traduccion | limitTo: 200 }}{{contenido.Traduccion.length > 200 ? '...' : ''}}</p>-->
			                	<p>{{ contenido.Traduccion | limitTo: 200 }}{{contenido.Traduccion.length > 200 ? '...' : ''}}</p>
			                	<span class="dp_tinydetail2 ">PUBLICADO: {{ contenido.CT_CreatedDate | timestamp | date: 'MMM d, yyyy HH:mm:ss' }}</span>			                	
		                	</td>
			                <td class="alicent dp_actions">
			                	<a href="javascript:void(0)" class="smlinks" ng-click="edit(contenido)"><i class="fa fa-edit"></i> Editar</a>
			                	<a href="javascript:void(0)" class="smlinks" ng-click="delete(contenido)"><i class="fa fa-trash-o"></i> Borrar</a>		
			                </td>
			            </tr>
			        </tbody>
			    </table>	
        	</div>
            
        </div>        
        <!--/table -->
        <div class="margin_top1"></div> 
        <div class="one_half">
    		<pre>selected_categoria : {{selected_categoria | json}}</pre>
    		<pre>contenidos_traducciones : {{contenidos_traducciones | json}}</pre>
    	</div>
    	
    	<div class="one_half last">
    		<pre>list_categoria : {{list_categoria  | json}}</pre>
    	</div>                

    </div>

</div><!-- ./content area -->
<div class="clearfix"></div>