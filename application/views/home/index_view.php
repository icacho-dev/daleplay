<div class="site_wrapper" ng-controller="DashboardController">



<div class="clearfix"></div>

<div class="top_nav two">

    <div class="container">
        
        <div class="left">
        
             <a href="mailto:info@daleplay.com"><i class="fa fa-envelope"></i>&nbsp; info@daleplay.com</a>
            
        </div><!-- end left -->
        
        <div class="right">
        
            <i class="fa fa-phone-square"></i>&nbsp; +55 123 456 7890
            <a href="#"><i class="fa fa-sign-in"></i>&nbsp; Log In</a>
            <a href="#"><i class="fa fa-user"></i>&nbsp; Registro</a>
            
            <ul class="topsocial two">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
            
        </div><!-- end right -->
        
    </div><!-- end top links -->

</div>

<div class="clearfix"></div>

<header class="header">
 
    <div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.html" id="logo"></a></div>
        
    <!-- Navigation Menu -->
    <nav class="menu_main">
        
    <div class="navbar yamm navbar-default">
    
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>
      
      <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
      
        <ul class="nav navbar-nav">
        
        <li><a href="index.html" title="Home" class="active">Home</a><li>

        <li class="dropdown yamm-fw"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Textos</a>
            <ul class="dropdown-menu">
              <li> 
                <div class="yamm-content">
                  <div class="row">
                  
                    <ul class="col-sm-6 col-md-4 list-unstyled two" ng-repeat="cat in app.categorias">
                        <li>
                            <p>{{cat.titulo}}</p>
                        </li>
                        <li ng-repeat="item in cat.lista" ng-click="selectcategoria(cat ,item)">
                        	<a href="#"><i class="fa fa-{{item.icono}}"></i> {{item.titulo}}</a>
                    	</li>
                    </ul>
                    
                    <ul class="col-sm-6 col-md-4 list-unstyled two">
                        <li>
                            <p>Tips</p>
                        </li>
                        <li class="dart">
                            <img src="http://placehold.it/230x80" alt="" class="rimg marb1" />
                            There are many variations passages available the majority have alteration in some form, by injected humour on randomised words if you are going to use a passage of lorem anything. 
                        </li>
                    </ul>
                     
                  </div>
                </div>
              </li>
            </ul>
        </li>

        <li class="dropdown yamm-fw"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Audios</a>
            <ul class="dropdown-menu">
              <li> 
                <div class="yamm-content">
                  <div class="row">
                  
                    <ul class="col-sm-6 col-md-4 list-unstyled two">
                        <li>
                            <p>Español</p>
                        </li>
                        <li><a href="template1.html"><i class="fa fa-plus-square"></i> Accordion &amp; Toggle</a></li>
                        <li><a href="template2.html"><i class="fa fa-leaf"></i> Title Styles</a><b class="mitemnew">New</b></li>
                        <li><a href="template3.html"><i class="fa fa-bars"></i> List of Dividers</a><b class="mitemnew">New</b></li>
                        <li><a href="template4.html"><i class="fa fa-exclamation-triangle"></i> Boxes Alert</a></li>
                        <li><a href="template5.html"><i class="fa fa-hand-o-up"></i> List of Buttons</a></li>
                        <li><a href="template6.html"><i class="fa fa-cog"></i> Carousel Sliders</a></li>
                        <li><a href="template7.html"><i class="fa fa-file-text"></i> Page Columns</a></li>
                        <li><a href="template8.html"><i class="fa fa-rocket"></i> Animated Counters</a></li>
                        <li><a href="template17.html"><i class="fa fa-question"></i> Faqs Page</a></li>
                    </ul>
                    
                    <ul class="col-sm-6 col-md-4 list-unstyled two">
                        <li>
                            <p>Ingles</p>
                        </li>
                        <li><a href="template9.html"><i class="fa fa-pie-chart"></i> Pie Charts</a><b class="mitemnew">New</b></li>
                        <li><a href="template10.html"><i class="fa fa-flag"></i> Font Icons</a></li>
                        <li><a href="template11.html"><i class="fa fa-umbrella"></i> Flip Boxes</a></li>
                        <li><a href="template12.html"><i class="fa fa-picture-o"></i> Image Frames</a></li>
                        <li><a href="template13.html"><i class="fa fa-table"></i> Pricing Tables</a></li>
                    </ul>
                    
                    <ul class="col-sm-6 col-md-4 list-unstyled two">
                        <li>
                            <p>Tips</p>
                        </li>
                        <li class="dart">
                            <img src="http://placehold.it/230x80" alt="" class="rimg marb1" />
                            There are many variations passages available the majority have alteration in some form, by injected humour on randomised words if you are going to use a passage of lorem anything. 
                        </li>
                    </ul>
                     
                  </div>
                </div>
              </li>
            </ul>
        </li>

        <li><a href="#" title="Mi Prep">Mi Prep</a><li>

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contacto</a>
        <ul class="dropdown-menu two" role="menu">
          <li> <a href="contact.html">Soporte</a> </li>
          <li> <a href="contact2.html">Facturación</a> </li>
          <li> <a href="faq.html">FAQ</a> </li>
        </ul>
        </li>        
        <!--
        <li class="dropdown yamm-fw"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Perfil</a>
            <ul class="dropdown-menu">
              <li> 
                <div class="yamm-content">
                  <div class="row">
                    
                    <ul class="col-sm-12 col-md-6 list-unstyled two">
                        <li>
                            <p>Nuevos Usuarios</p>
                        </li>
                        <li class="dart">
                            <img src="http://placehold.it/50x50" alt="" class="rimg marb1" />
                            Usuario | Plan A
                        </li>
                    </ul> 

                  </div>
                </div>
              </li>
            </ul>
        </li>
        -->        
        </ul>
        
      </div>
      </div>
     </div>
     
    </nav><!-- end Navigation Menu -->
    
    <div class="menu_right"><a href="#" class="buynow">Perfil</a></div>    
    
    </div>

</header>


<div class="clearfix"></div>

<div class="menu_shadow">dhf</div>

<div class="clearfix margin_top10"></div>

<div class="page_title2">
<div class="container">
    
    <h1>{{filterActive}}</h1>
    <div class="pagenation">&nbsp;<a href="index.html">Textos</a> <i>/</i> <a href="#">{{catActive.titulo}}</a> <i>/</i> {{filterActive}}</div>
     
</div>
</div>
<!-- end page title -->
<div class="clearfix"></div>

<div class="content_fullwidth less2">
<div class="container">

	<div class="reg_form">
        <?= anchor('admin/categorias_controller', 'Categorias', 'title="Admin Categorias"'); ?>
        <form id="sky-form" class="sky-form">
				<header>Agregar contenido</header>
				
				<fieldset>					
					<section>
						<label class="input">
							<i class="icon-append fa-newspaper-o"></i>
							<input type="text" name="Titulo" placeholder="Titulo" required>
							<!--<b class="tooltip tooltip-bottom-right">Titulo de contenido</b>-->
						</label>
					</section>
					
					<section>		              
                        <label class="textarea"> <i class="icon-append icon-comment"></i>
                            <textarea rows="6" name="TextoNota" id="TextoNota" placeholder="Escriba aquí su texto"></textarea>
                            <!--<b class="tooltip tooltip-bottom-right">Texto del contenido</b>-->
                        </label>
		            </section>
					
				</fieldset>
					
				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="select">
								<select name="idioma" >
									<option value="0" selected disabled>Idioma</option>
									<option value="1">Español</option>
									<option value="2">Ingles</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
							<label class="select">
								<select name="categoria">
									<option value="0" selected disabled>Categoria</option>
									<option value="1">Notas Pop</option>
									<option value="2">Notas Regional Mexicano</option>
								</select>
								<i></i>
							</label>
						</section>
					</div> 
					<!--
					<section>
						<label class="select"> 
							<select name="select3">
								<option value="0" selected disabled>select3</option>
								<option value="1">opt1</option>
								<option value="2">opt2</option>
								<option value="3">opt3</option>
							</select>
							<i></i>
						</label>
					</section>
					-->
					<section>
						<label class="checkbox"><input type="checkbox" name="publicar" id="publicar"><i></i>Es borrador</label>						
					</section>
				</fieldset>
				<footer>
					<button type="submit" class="button">Guardar</button>
				</footer>
			</form>			
		</div>
    

</div>
</div><!-- end content area -->