<?php
get_header(); ?>
 
    <div class="conteudo">
        <div class="container mt-sm">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-roboto red">Publicações</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="mt-sm">
                        <button type="button" class="btn btn-danger">Participe!</button>
                        <strong class="mt-xs ml-md"><a href="#">Cadastre-se</a> | <a href="#">Já é cadastrado?</a></strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-md" id="publicacoes">
                <div class="col-md-8">
                    <div class="panel panel-default" id="publicacao-destaque">
                      <div class="panel-heading">
                        <h3 class="panel-title font-roboto red">Publicação em Destaque</h3>
                      </div>
                      <div class="panel-body">
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="nounderline">
                              <div class="destaque text-center"> 
                               <p>Título da publicação</p>       
                              </div>
                            </a>
                        </div>
                        <div class="description col-md-8">
                            <h4 class="font-roboto red">Volume 50</h4>
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. <a href="#">Leia mais</a> 
                            <p><small><a href="#">Ver autores</a></small></p>
                            </p>

                            <div class="row">
                             <div id="social-bar" class="col-md-4">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div> 
                             <div class="col-md-8 text-right">
                                <div class="btn-group mt-sm" role="group">
                                  <button type="button" class="btn btn-default">BAIXAR</button>
                                  <button type="button" class="btn btn-danger">VISUALIZAR</button>
                                </div>
                             </div>  
                           </div>   
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default" id="info-publicacao">
                      <div class="panel-heading">
                        <h3 class="panel-title font-roboto red">Sobre Publicações</h3>
                      </div>
                      <div class="panel-body">
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis.
                            </p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
               <div class="container mt-sm">
                        <div class="row">
                          <div class="col-sm-10">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Buscar publicação...">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Buscar</button>
                              </span>
                            </div><!-- /input-group -->
                        </div> <!-- /col-lg -->
                        <div class="col-sm-2">
                         <div class="input-group">
                              <select name="select" class="form-control">
                                  <option selected>Ordenar por:</option> 
                                  <option >Data</option>
                                  <option >Nome</option>
                                  <option >Downloads</option>
                              </select>
                            </div><!-- /input-group -->
                         </div> <!-- /col-lg -->
                        </div>
                </div>
        <div class="container mt-md">
            <div id="lista-publicacoes">
                <div class="row">
                    <!-- inicio card -->                    
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div>
                            </br>  
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                    <!-- inicio card -->
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div> 
                             </br>                             
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                    <!-- inicio card -->                   
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div>
                            </br>                               
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->                  
                    <!-- inicio card -->
                   <div class="col-sm-3">
                        <div class="thumbnail">   
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a> 

                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div> 
                             </br>                             
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                </div>
            </div>


              <div class="row">
                    <!-- inicio card -->                    
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div>
                            </br>  
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                    <!-- inicio card -->
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div> 
                             </br>                             
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                    <!-- inicio card -->                   
                   <div class="col-sm-3">
                        <div class="thumbnail">
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a>    
                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div>
                            </br>                               
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->                  
                    <!-- inicio card -->
                   <div class="col-sm-3">
                        <div class="thumbnail">   
                        <a href="#" class="nounderline">
                           <div class="capa"> 
                            <div class="ribbon-wrapper">
                              <div class="ribbon">Volume 50</div>
                            </div>  
                            <div class="card"> 
                            <p>Título da publicação</p>       
                            </div>
                           </div>  
                        </a> 

                          <div class="caption small">
                            <p><mark>Data da publicação: 11 de maio 2013</mark></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit
                            </p>
                             <p><small><a href="#">Ver autores</a></small></p>
                             <div id="social-bar">
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>
                                  <small>  
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                                  <small>
                                    <a href="#" class="nounderline">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-square-o fa-stack-2x"></i>
                                          <i class="fa fa-linkedin fa-stack-1x"></i>
                                        </span>
                                    </a>
                                  </small>  
                             </div> 
                             </br>                             
                            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="">
                                  <a href="#" class="btn btn-default" role="button" alt="Faça o download e formato PDF">BAIXAR</a>
                                  <a href="#" class="btn btn-default" role="button">VISUALIZAR</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- fim card -->
                </div>
                <div class="row text-center">
                  <button type="button" class="btn btn-danger">Mostrar mais publicações</button>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();