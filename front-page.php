<?php get_header(); ?>
   <div class="conteudo">
 
        <section id="destaque-home">
            <div class="container">
                <div class="row">
                    <div class="col-xs-7">

<!-- 4:3 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EHHmVbNNvHQ?controls=1&autohide=1"></iframe>
</div>




                <!--         <iframe id="ytplayer" type="text/html" width="640" height="315"
                        src="https://www.youtube.com/embed/EHHmVbNNvHQ?controls=1&autohide=1"
                        frameborder="0" allowfullscreen></iframe> -->
                    </div>
                    <div class="col-xs-4 description-destaque font-roboto">
                        <h6 class="font-roboto">Pensando o direito</h6>
                        <h2 class="font-roboto">O que é?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <p>Sed lobortis est eget tristique vestibulum. Fusce et pulvinar erat, id viverra sem. Vivamus porttitor. </p>
                    </div>
                </div>
            </div>
        </section>
    </br>    
    <div class="container">
        <h2 class="font-roboto red">Participe dos debates!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis.</p>
    </div> 


<?php get_template_part('mini-tutorial'); ?>


 <section id="destaque-home-debates">       
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="font-roboto red">Debates Abertos:</h3>
                </div>
                <div class="col-md-6 text-right">
                    <p class="mt-sm">
                        <strong class="mt-xs ml-md"><a href="#">Veja todos os debates</a></strong>
                    </p>
                </div>
            </div>
            <div class="row" id="debates-home">
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/pensandoodireito-tema/images/home/mc-home.png" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/pensandoodireito-tema/images/home/dp-home.gif" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                     <a href="#">   
                        <div class="text-center">
                            <img src="/wp-content/themes/pensandoodireito-tema/images/home/mc-home.png" class="img-adaptative" alt="Debate">
                        </div>
                        <div class="description">
                            <strong class="red">Título do Debate</strong>
                            <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. </small></p>
                        </div>
                     </a>
                    </div>

                </div>                
            </div>
        </div>
     </section>   
    </div>

    <div class="container">
            <div class="row mt-md" id="publicacoes">
                <div class="col-md-8" id="publicacao-destaque">
                        <h3 class="font-roboto red">Publicações da Série Pensando o Direito</h3>
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
                            </p>
                            <div class="row">
                             <div class="col-md-12 text-left">
                                <div class="btn-group mt-sm" role="group">
                                  <button type="button" class="btn btn-default">BAIXAR</button>
                                  <button type="button" class="btn btn-danger">VISUALIZAR</button>
                                </div>
                             </div>  
                           </div>   
                        </div>
                    </div>
                </div>
                <div class="col-md-4 well box-publicacao">
                    <h5 class="red">Saiba mais sobre a série Pensando o Direito</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus metus, nec feugiat sablandit diam facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet</p>
                    <strong><a href="#">Todas as publicações</a></strong></br>
                    <strong><a href="#">Editais de participação</a></strong>
                    </div>
                </div>
            </div>
        </div>



<?php get_footer(); ?>